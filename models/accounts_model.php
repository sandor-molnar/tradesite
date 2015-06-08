<?php

class Accounts_Model extends Model {

    public function __construct() {
        parent::__construct();
    }


    /*
        Változtatások/Tervek:
            1. getAccounts, getOffers és getAccount összevonása.
            2. authAccount-ot átrakni statikus Auth utli-ba.

    
    */
    public function getAccount($id = null,$start = 0,$count = 6) {
        $type = ($id == null) ? 0 : ((is_numeric($id)) ? 1 : 2);
        switch ($type) {
            case 1: //Saját fiókok
                $where = " INNER JOIN user_account WHERE user_account.user_id='{$id}' AND user_account.account_id=accounts.id ";
                break;
            case 2: //Az a fiók, ahol a token egyenlő az ID-vel
                $where = " WHERE token='{$id}' ";
                break;
            default: //Minden fiók
                $where = "";
                break;
        }
        $adat = "";
        $result = $this->db->query("SELECT * FROM accounts {$where} ORDER By `date` DESC LIMIT {$start},{$count}");
        if (!$this->db->error) {
            while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                $adat[$data["id"]] = $data;
                $adat[$data["token"]] = $data["id"];
                $adat[$data["id"]]["newDescription"] = (strlen($data["description"]) > MAXDESC) ? (substr($data["description"],0,MAXDESC)."...") : $data["description"];
                $adat[$data["id"]]["newDescription"] = $adat[$data["id"]]["newDescription"]."<br><a class='button tiny' href='".URL."accounts/account/{$data["token"]}'>Részletek.</a>";
                //unset($adat[$data["id"]]["id"]);
            };
            if ($type == 2) {
                $id = $adat[$id];
                $adat = $adat[$id];
                $getTable = GET::getTypes();
                $table = $getTable[$adat["type_id1"]]["table"];
                $result = $this->db->query("SELECT * FROM accounts_{$table} WHERE id='{$adat["type_id2"]}'");
                $adat["info"] = $result->fetch_array(MYSQLI_ASSOC);
                $adat["info"]["division"] = (isset($adat["info"]["division"])) ? $this->getDivision($adat["info"]["division"]) : "Nincs megadva.";
                unset($adat["info"]["id"]);
            }   
            //Helper::varDump($adat);
            return $adat;
        } else {
            echo $this->db->error;
            exit;
        }

    }

    /*
    public function getAccounts($start = 0,$count = 6) {
    	$result = $this->db->query("SELECT * FROM accounts ORDER By `date` DESC LIMIT {$start},{$count}"); // 2,3: 2-> Honnan kezdje, 3: Mennyit jelenítsen meg
        $adat = null;
    	 while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
            $adat[$data["id"]] = $data;
            if (strlen($data["description"]) > MAXDESC):
                
                $adat[$data["id"]]["newDescription"] = substr($data["description"],0,MAXDESC)."...";
            else:
               $adat[$data["id"]]["newDescription"] = $data["description"];
            endif;
            $adat[$data["id"]]["newDescription"] = $adat[$data["id"]]["newDescription"]."<br><a href='".URL."accounts/account/{$data["token"]}'>Részletek.</a>";
        }
        return $adat;
    }
    
    public function getAccount($id) {
        $result = $this->db->query("SELECT * FROM accounts WHERE token='{$id}'");
        $data = $result -> fetch_array(MYSQLI_ASSOC);
            $adat = $data;
        $table = Auth::getAccountType($data["type_id1"])["table"];
        $result2 = $this->db->query("SELECT * FROM accounts_{$table} WHERE accounts_{$table}.id='{$data["type_id2"]}'");
        //Ha van az accountnak információ sora, akkor azt betölti. Az ellenörzés ellhanyagolható, mindig van ilyen sor.
        $data2 = ($result2) ? $result2 -> fetch_array(MYSQLI_ASSOC) : null;
        $adat["info"] = ($data2) ? $data2 : null;
        if ($adat["info"]) { 
            if ($table == "lol") {
                $adat["info"]["division"] = $this->getDivision($adat["info"]["division"]);
            }
            unset($adat["info"]["id"]);
        }

        $result = $this->db->query("SELECT * FROM user_account WHERE account_id='{$id}'");
        $userid = $result -> fetch_array(MYSQLI_ASSOC);
        $adat["userid"] = $userid["user_id"];
        return $adat; 
        
    }

    public function authAccount($account = null,$user = null) {
        if ($account) {
            $result = $this->db->query("SELECT * FROM user_account WHERE account_id='{$account["id"]}' AND user_id='{$user["id"]}'") or die($this->db->error);
            $rows = $result->num_rows;
            if ($rows == 0) {
                Alert::AlertMessage(LANG_ERROR_NOPERMISSION,"alert","index");
                exit;
            }
        }
    }

    public function getOffers($id,$start = 0,$count = 6) {
        $result = $this->db->query("SELECT * FROM accounts INNER JOIN user_account WHERE user_account.user_id={$id} AND user_account.account_id=accounts.id LIMIT {$start},{$count}") or die($this->db->error);
         $adat = null;
         while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
            $adat[$data["id"]] = $data;
            if (strlen($data["description"]) > MAXDESC):
                $adat[$data["id"]]["newDescription"] = substr($data["description"],0,MAXDESC)."...";
            else:
               $adat[$data["id"]]["newDescription"] = $data["description"];
            endif;
            $adat[$data["id"]]["newDescription"] = $adat[$data["id"]]["newDescription"]."<br><a href='".URL."accounts/account/{$data["token"]}'>Részletek.</a>";
            
        }
        return $adat;
    }
    */
    //accounts.lol: division
    public function getDivision($division) {
        if ($division != -1) {
            if ($division != 0) {
                $Tiers = array("Bronze","Silver","Gold","Platinum","Diamond","Master","Challanger");
                $Divisions = array("0","V","IV","III","II","I");
                unset($Divisions[0]);
                $Tier = floor($division/5); 
                $Div = $Divisions[$division-$Tier*5];
                if ($Tier == "Challanger") {
                    $div = "";
                }
                $return = $Tiers[$Tier]." ".$Div;
                return $return;
            } else return "Unranked";
        } else return "Nincs megadva.";
    }

    public function getPages($where = null) {
            $bonus = ($where) ? "INNER JOIN user_account WHERE user_account.user_id={$where} AND user_account.account_id=accounts.id " : "";

        $result = $this->db->query("SELECT COUNT( accounts.id ) as count FROM accounts $bonus") or die($this->db->error);
        $data = $result->fetch_array(MYSQLI_ASSOC);
        return $data["count"];
    }
    public function getCount($count = null) {
        if (isset($count)) {
            return $count;
        } else return DEFCOUNT;
    }

    public function getStart($page) {
        $pageCount = $this->getCount();
        //0-ról kezdünk!
        if ($page == 1) {
            return 0;
        } else {
            return ($page-1)*$pageCount;
        }
    }
/*

else {
                $array = array(
                    "text" => "Írjon be egy keresési értéket.",
                    "type" => "alert"
                );
                Session::Set('alert',$array);
                header('location: '.URL.'accounts');
            }
*/
    public function SearchC() {
        $sql = "";
        if (isset($_POST["submit"])) {

                //Ha van keresési érték, akkor az alapján IS keres, egyébként csak a különleges feltételnek megfelelően.
                $searchValue = $_POST["value"];
                if ($searchValue) {
                    $bonus = "title LIKE '%".$_POST["value"]."%' AND ";
                } else {
                    $bonus = "";
                }

                $essSQL = "SELECT * FROM accounts WHERE ";
                $optSQL = "";
                $ope = "AND";
                //Ha keressen a leírásban is.
                if (isset($_POST["description"])) {
                    $optSQL .= "(title LIKE '%".$_POST["value"]."%' OR description LIKE '%".$_POST["value"]."%') AND ";
                    $bonus = ""; //BugFix.
                    /* Mivel ez már egyszer kidobja azokat az elemeket, amik megfelelnek a cím keresési feltételében,
                    ezért így a fentebb beálított $bonus változót 0-ra álítom, így az alap feltétel módosul.
                    (Mivel azt vizsgálom, hogy szerepel-e a leírásban vagy a címben, így olyan feltételeket 
                    is kidobott, aminek köze nem volt a leíráshoz.) */
                }
                //Ha csak a kiválasztott típus jelenjen meg.
                if ($_POST["type"] != 0) {
                    $optSQL .= "type_id1='{$_POST["type"]}' AND ";
                }
                //Csak x-től y-nig jelenjelenek meg (Dátum).
                if ($_POST["start"] || $_POST["end"]) {
                    $start = ($_POST["start"]) ? "`date`>='".$_POST["start"]."'" : "";
                    $end = ($_POST["end"]) ? " `date`<='".$_POST["end"]."'" : "";
                    $operator = ($_POST["start"] && $_POST["end"]) ? "AND " : "";
                    $optSQL .= " {$start} {$operator} {$end} AND ";
                }

                //Befejezés
                if ($optSQL == "") { //Ha nem volt feltétel,
                    $newBonus = substr($bonus, 0, -4); //akkor 4 karaktert leveszek, mivel marad egy AND a végén.
                } else $newBonus = $bonus; //Ellenkező esetben az alap feltétel marad (Nem veszi le az AND-et, mert még jön feltétel.)
                
                $newOptSQL = $newBonus.substr($optSQL, 0, -4); //Összerakom a 2 feltételt, és leveszem a végéről az AND-et.
                $query = $essSQL.$newOptSQL; // Hozzáadom az alap SELECT-et.
                $result = $this->db->query($query); //Elküldöm a lekérést.
              
                if ($result->num_rows > 0) {
                    while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                        $adat[$data["id"]] = $data;
                        if (strlen($data["description"]) > MAXDESC):
                            $adat[$data["id"]]["newDescription"] = substr($data["description"],0,MAXDESC)."...";
                        else:
                           $adat[$data["id"]]["newDescription"] = $data["description"];
                        endif;
                        $adat[$data["id"]]["newDescription"] = $adat[$data["id"]]["newDescription"]."<br><a href='".URL."accounts/account/{$data["id"]}'>Részletek.</a>";
                    }
                    Session::set("searchResult",$adat);
                    Alert::AlertMessage(LANG_ERROR_SUCCESSSEARCH,"success","accounts/search");
                } else {
                    Alert::AlertMessage(LANG_ERROR_FAILSEARCH,"warning","accounts");
                }
        } else {
            Header("Location: ".URL."accounts");
        }
    }

    public function processNew() {
        if (isset($_POST["submit"])) {
            if ($_POST["name"] && $_POST["title"] && $_POST["type_id1"] && $_POST["trade_type"]) {
                $table = Auth::getAccountType($_POST["table"]);
                $i=0;
                $result = $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_name = 'accounts_{$_POST["table"]}'");
                while($column = $result->fetch_array(MYSQLI_ASSOC)) {
                    $alias[$i] = $column["COLUMN_NAME"];
                    $i++;
                }
                unset($alias[0]);
                $sqlSTART = "INSERT INTO accounts_{$_POST["table"]} ";
                $sqlALIAS = "( "; //Syn: (name,name,name)
                    foreach ($alias as $key => $value) {
                        $sqlALIAS .= "`{$value}`,";
                    }
                $sqlALIAS = substr($sqlALIAS,0,-1);
                $sqlALIAS .= ") ";
                $sqlVALUES = " VALUES (";//Syn: ('name','name','name')
                    foreach ($alias as $key => $value) {
                        if (!$_POST[$value]) {
                            $_POST[$value] = -1;
                        }
                        $sqlVALUES .= "'{$_POST[$value]}',";
                    }
                $sqlVALUES = substr($sqlVALUES,0,-1);
                $sqlVALUES .= ")";
                $sqlFULL = $sqlSTART.$sqlALIAS.$sqlVALUES;

                $this->db->query($sqlFULL) or die($this->db->error);

                $type_id2 = $this->db->insert_id;

                $description = (isset($_POST["description"])) ? $_POST["description"] : "Nincs leiras megadva.";
                $date = date("Y-m-d H:i:s");
                $md5 = md5(uniqid(rand(), true));
                $token = substr($md5, 16);
                $this->db->query("INSERT INTO accounts (token,name,title,description,type_id1,type_id2,trade_type,`date`) 
                   VALUES ('{$token}','{$_POST["name"]}', '{$_POST["title"]}', '{$description}' , '{$table["id"]}', '{$type_id2}' ,'{$_POST["trade_type"]}','{$date}')") or die($this->db->error);
                $type_id1 = $this->db->insert_id;
                $user = User::getUser(Session::get("username"));
                $this->db->query("INSERT INTO user_account (user_id,account_id) VALUES ('{$user["id"]}','{$type_id1}')");
                if (!$this->db->error) {
                    Alert::AlertMessage(LANG_ERROR_SUCCESSNEWACCOUNT,"success","accounts");
                } else {
                    die("Varatlan hiba tortent.:".$this->db->error);
                }
            } else {
                Alert::AlertMessage(LANG_ERROR_ALLSTARFIELD,"alert","accounts/newAccount");
            }
        } else {
            Header("Location: ".URL."accounts");
        }
    }

    public function getTypesName() {
        $result = $this->db->query("SELECT * FROM types");
        while ($types = $result->fetch_array(MYSQLI_ASSOC)) {
            $table[$types["id"]] = $types["table"];
        }
        foreach ($table as $key => $value) {
            $count = 0;
            $result = $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_name = 'accounts_{$value}'");
            while($column = $result->fetch_array(MYSQLI_ASSOC)) {
                $data[$key][$count] = $column["COLUMN_NAME"];
                $count++;
            }
            unset($data[$key][0]);
            $data[$key]["table"] = $value;
        }
        return $data;
    }
    

    public function getTradeTypes() {
        $result = $this->db->query("SELECT * FROM trade_types");
        while ($types = $result->fetch_array(MYSQLI_ASSOC)) {
            $table[$types["id"]] = $types;
        }
        return $table; 
    }

    public function getUserAccount() {
        $result = $this->db->query("SELECT * FROM user_account");
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function processEdit($token) {
        if ($_POST["submit"]) {
            if ($_POST["name"] && $_POST["title"] && $_POST["type_id1"] && $_POST["trade_type"]) {
                $result = $this->db->query("SELECT * FROM accounts WHERE token='{$token}'") or die($this->db->error);
                $rows = $result->num_rows;
                if ($rows > 0) {
                    foreach ($_POST as $key) {
                        $_POST[$key] = $this->db->real_escape_string($_POST[$key]);
                    }

                    $types = $this->getTypesName();
                    $sql = "UPDATE accounts_".$types[$_POST["type_id1"]]["table"]." SET ";
                    unset($types[$_POST["type_id1"]]["table"]);

                    foreach ($types[$_POST["type_id1"]] as $key => $value) {
                        if ($_POST[$value] == "Nincs megadva.") {
                            $_POST[$value] = -1;
                        }
                        if (!is_numeric($_POST[$value]) || $_POST[$value] < -1) {
                            $_POST[$value] = -1;
                        }
                        $sql .= "`".$value."`='".$_POST[$value]."',";
                    }
                    $sql = substr($sql, 0,-1);
                    $data = $result->fetch_array(MYSQLI_ASSOC);
                    $sql .= " WHERE id='{$data["type_id2"]}'"; 
                    $sql2 = "UPDATE accounts SET name='{$_POST["name"]}',title='{$_POST["title"]}',description='{$_POST["description"]}',trade_type='{$_POST["trade_type"]}' WHERE token='{$token}'";

                    $first = $this->db->query($sql) or die($this->db->error);
                    $second = $this->db->query($sql2) or die($this->db->error);
                    if (!$this->db->error) {
                        Alert::AlertMessage(LANG_ERROR_SUCCESSEDIT,"success","accounts/mine");
                    }
                } else {
                    Alert::AlertMessage(LANG_ERROR_FAILEDIT,"alert","accounts/edit/{$token}");
                }
            } else {
                Alert::AlertMessage(LANG_ERROR_ALLSTARFIELD,"alert","accounts/edit/{$token}");
            }
        } else {
            Alert::AlertMessage(LANG_ERROR_NOPERMISSION,"alert","index");
        }
    }
}
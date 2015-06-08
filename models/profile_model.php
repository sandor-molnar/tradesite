<?php

class Profile_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getSpecies() {
        $result = $this->db->query("SELECT * FROM species") or die($this->db->error);
        while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
            $adat[$data["id"]] = $data;
        }
        return $adat;
    }
    
    public function newChar() {
        if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["species"])) {
            $result = $this->db->query("SELECT * FROM characters WHERE firstname='{$_POST["firstname"]}' AND lastname='{$_POST["lastname"]}'");
            $rows = $result -> num_rows;
            if ($rows == 0) {
                $user = User::getUser(Session::get("username"));
                $result = $this->db->query("SELECT name FROM species WHERE id='{$_POST["species"]}'");
                $spec = $result->fetch_array(MYSQLI_ASSOC);
                $result = $this->db->query("INSERT INTO characters (userid,firstname,lastname,species) VALUES ('{$user["id"]}','{$_POST["firstname"]}','{$_POST["lastname"]}','{$_POST["species"]}')");
                $res = $this->db-> query("SELECT * FROM properties");
                $char = User::getChar();
		$sql = " ";
		while ($data = $res-> fetch_array(MYSQLI_ASSOC)) {
                    $sql .= "INSERT INTO prop_char (charid,prop_id,value) "
                            . "VALUES ('{$char["id"]}','{$data['id']}','{$data[$spec["name"]]}'); "; 
		}
                /*           SPEC
                     |TABLE| Saiyan      | Namek  |
                     |Élet | !!123!!     | 123    | DATA
                     |Pénz |   123       | 123    |
                 */
		$this->db -> multi_query($sql) or die($this->db-> error);
            }
        }
    }

    public function setLang($lang) {
        if ($lang) {
            Lang::setLang($lang);
            Header("Location:".URL);
        } else {
            Header("Location:".URL);
        }
    }
}

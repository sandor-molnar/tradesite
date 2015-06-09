<?php

class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function processLogin() {
        if ($_POST["username"] && $_POST["password"]) {
            $password = md5(HASH_PASSWORD_SALT.$_POST["password"]);
            $result = $this->db->query("SELECT * FROM users WHERE username='{$_POST["username"]}' AND password='{$password}'");
            $rows = $result->num_rows;
            if ($rows == 1) {
                Session::Set('username', $_POST["username"]);
                Alert::AlertMessage(LANG_ERROR_SUCCESSLOGIN,"success","index");
            } else {
                Alert::AlertMessage(LANG_ERROR_BADUSERORPASS,"alert","index");
            }
        } else {
           Alert::AlertMessage(LANG_ERROR_ALLFIELD,"alert","index");
        }
    }

    public function processRegister() {
        if ($_POST["username"] && $_POST["password"] && $_POST["password2"] && $_POST["password"]==$_POST["password2"] && $_POST["email"]) {
            $password = md5(HASH_PASSWORD_SALT.$_POST["password"]);
            $result = $this->db->query("INSERT INTO users (username,password,email) VALUES ('{$_POST["username"]}','{$password}','{$_POST["email"]}')") or die($this->db->error);
            Alert::AlertMessage(LANG_ERROR_SUCCESSREGISTER,"success","index");
        } else {
            Alert::AlertMessage(LANG_ERROR_ALLFIELD,"alert","login/register");
        }
    }

    public function logout() {
        if (Session::get("username") == true) {
            Session::destroy("username");
            Alert::AlertMessage(LANG_ERROR_SUCCESSLOGOUT,"success","index");
        }
    }

}

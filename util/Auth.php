<?php
/**
 * 
 */
class Auth
{
    
    public static function handleLogin()
    {
        @session_start();
        $logged = Session::get("username");
        if ($logged == false) {
            Session::destroy('all');
            header('location: '.URL.' login');
            exit;
        }
    }

    public static function getAccountType($key) {
       $db = Database::getInstance();
       $result = $db->query("SELECT * FROM types WHERE type_id='{$key}' OR `table`='{$key}'") or die($db->error);
       if ($result) {
        return $data = $result->fetch_array(MYSQLI_ASSOC);
       } else return false;
    }
    
}
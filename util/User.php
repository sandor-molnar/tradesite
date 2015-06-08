<?php

class User {

    public static function getUser($value) {
        $db = Database::getInstance();
        $result = $db->query("SELECT * FROM users WHERE username='{$value}' OR id='{$value}'") or die($db->error);
        return $result->fetch_array(MYSQLI_ASSOC);
    }
}

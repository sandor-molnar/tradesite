<?php

Class GET {
	public static function getTypes() {
		$db = Database::getInstance();
       	$result = $db->query("SELECT * FROM types");
        while ($types = $result->fetch_array(MYSQLI_ASSOC)) {
            $table[$types["id"]] = $types;
        }
        return $table; 
    }
}
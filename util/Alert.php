<?php

Class Alert {
	public static function AlertMessage($msg = "Hibás üzenet létrehozás.",$type = "info",$location = "index") {
		$array = array(
        	"text" => $msg,
        	"type" => $type
        );
        Session::Set('alert',$array);
        header('location: '.URL.$location);
	}
}
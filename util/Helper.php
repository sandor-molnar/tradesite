<?php

Class Helper {
	public static function varDump($var = null) {
		echo "<pre>";
		var_dump($var);
		echo "</pre>";
		exit;
	}
}
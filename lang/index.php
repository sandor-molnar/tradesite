<?php
Class Lang {

	public static function getLang() {
		$langs = array("hu","en");
		$lang = $_SESSION["lang"];
		if ($lang && isset($langs[$lang])) {
			return $_SESSION["lang"];
		} else return $langs[0];
	}

	public static function setLang($lang) {
		$_SESSION["lang"] = $lang;
	}

	public static function loadLang($lang) {
		require 'lang/'.$lang.'/translate.php';
	}
}
?>
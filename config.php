<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://localhost/tradesite/');
define('LIBS', 'libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'tradeit');
define('DB_USER', 'root');
define('DB_PASS', '');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'a680958aa99b56a55411860c6c6c948c');

// This is for database passwords only
define('HASH_PASSWORD_KEY', '451c1c80dbc7e71b033e5bbbc561c8d0');
define("HASH_PASSWORD_SALT","ea2438e551c7e523ee9a9527c1a57f35");

//Language
define("DEF_LANG","en");

//Theme
define("DEF_THEME","orange");
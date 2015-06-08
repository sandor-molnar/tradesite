<!doctype html>
<html>
<head>
    <title><?=(isset($this->title)) ? $this->title : 'MVC'; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/foundation.css" />
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/sunny/jquery-ui.css" />

</head>
<body style="
background-image: url('<?php echo URL ?>public/img/bg.jpg') ;
background-size: 100%;
	  font-family: 'open_sanslight';
	  font-size: 100%;
	  background-repeat: no-repeat;
	  background-attachment: fixed;
	  background-size: cover; 
">
<center>
<div id="content">
<a href='<?php echo URL ?>index'>Főoldal</a><br>
    
    
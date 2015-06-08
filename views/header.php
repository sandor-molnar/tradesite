<!doctype html>
<html>
<head>
    <title>Csere oldal - <?=(isset($this->title)) ? $this->title : '404 title'; ?></title>
    <meta charset='UTF-8'>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/foundation.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/app.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.css" />

    <!-- JS -->
    <script src="<?php echo URL; ?>public/js/vendor/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>

    <!-- CUSTOM JS -->
    <?php 
    if (isset($this->js)) 
    {
        foreach ($this->js as $js)
        {
            echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
        }
    }
    ?>
</head>
<body>
<div class="upper-top-bar">
</div>
  <div class="contain-to-grid sticky">
  <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
  <ul class="title-area">
    <li class="name">
      <h1><a href="#">Trade IT</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li><a href="#">asd</a></li>
      <li><a href="#" data-dropdown="login" data-options="align:bottom">Belépés</a></li>
    </ul>
    <div id="login" class="f-dropdown small content" data-dropdown-content>
       <h5>Log In:</h5>
    <form id="top-nav-login" action="login.xqy" method="post">
        <div class="row">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="email@example.com" tabindex="1"/>
        </div>
        <div class="row">
            <label>Password</label>
            <input type="password" name="email" placeholder="********" tabindex="2"/>
        </div>
        <div class="row">
            <input type="submit" class="button tiny success" value="Login" tabindex="3"/>
        </div>
    </form>
    </div>
    <!-- Left Nav Section -->
    <ul class="left">
      <li><a href="<?php echo URL ?>">Főoldal</a></li>
    </ul>
  </section>
</nav>
</div>

 
<div class="row" style="margin-top: 10px"> 
<div class="large-3 columns ">
<div class="panel orangeblock">
<a href="#"><img src="http://placehold.it/300x240&text=[img]"/></a>
<h5><a href="#">Your Name</a></h5>
<div class="section-container vertical-nav" data-section data-options="deep_linking: false; one_up: true">
<section class="section">
<h5 class="title"><a href="#">Section 1</a></h5>
</section>
<section class="section">
<h5 class="title"><a href="#">Section 2</a></h5>
</section>
<section class="section">
<h5 class="title"><a href="#">Section 3</a></h5>
</section>
<section class="section">
<h5 class="title"><a href="#">Section 4</a></h5>
</section>
<section class="section">
<h5 class="title"><a href="#">Section 5</a></h5>
</section>
<section class="section">
<h5 class="title"><a href="#">Section 6</a></h5>
</section>
</div>
</div>
</div>
<div class="large-6 columns">
    
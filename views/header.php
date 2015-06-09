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
    <?php if (!isset($_SESSION["username"])) { ?> 
      <li><a href="#" data-reveal-id="login">Belépés</a></li>
      <div id="login" class="reveal-modal small" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
    <h2>Belépés</h2>
    <form method="POST" action="<?php echo URL."login" ?>">
    <div class="row">
            <label>Felhasználónév</label>
            <input type="text" name="username" placeholder="email@pelda.hu" tabindex="1"/>
        </div>
        <div class="row">
            <label>Jelszó</label>
            <input type="password" name="password" placeholder="********" tabindex="2"/>
        </div>
        <div class="row">
            <input type="submit" class="button small success" value="Belépés" tabindex="3"/>
            Még nem vagy tag? Akkor <a href="#" data-reveal-id="register">regisztrálj</a>!
        </div>
    </form>
  <a class="close-reveal-modal" aria-label="Close"><i class="fa fa-times"></i></a>
</div>

<div id="register" class="reveal-modal small" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
    <h2>Regisztráció</h2>
    <form method="POST" action="<?php echo URL."login" ?>">
        <div class="row">
            <label>Felhasználónév</label>
            <input type="text" name="username" placeholder="Felhasznalonev" tabindex="1"/>
        </div>
         <div class="row">
            <label>Email</label>
            <input type="email" name="email" placeholder="email@pelda.hu" tabindex="2"/>
        </div>
        <div class="row">
            <label>Jelszó</label>
            <input type="password" name="password" placeholder="********" tabindex="3"/>
        </div>
        <div class="row">
            <label>Jelszó újra</label>
            <input type="password" name="password2" placeholder="********" tabindex="4"/>
        </div>
        <div class="row">
            <input type="submit" class="button small success" value="Regisztráció" tabindex="4"/>
            Már tag vagy? <a href="#" data-reveal-id="login">Lépj be</a>!
        </div>
    </form>
  <a class="close-reveal-modal" aria-label="Close"><i class="fa fa-times"></i></a>
</div>

<?php } else { ?>
  <li><a data-dropdown="user" aria-controls="user" aria-expanded="false"><?php echo $_SESSION["username"] ?></a></li>
    
<?php } ?>
    </ul>
    
    <!-- Left Nav Section -->
    <ul class="left">
      <li><a href="<?php echo URL ?>">Főoldal</a></li>
    </ul>
  </section>

</nav>
</div>
<ul id="user" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">
    <li><a href="<?php echo URL ?>profile"><i class="fa fa-user"></i> <?php echo LANG_USERMENU_PROFILE ?></a></li>
    <li><a href="<?php echo URL ?>login/logout"><i class="fa fa-power-off"></i> <?php echo LANG_USERMENU_LOGOUT ?></a></li>
  </ul>
<?php
$file = (isset($this->name)) ? "views/".$this->name."/custom/header.php" : "views/index/custom/header.php";
if (file_exists($file)) {
  require $file;
}
if (isset($_SESSION["alert"])) {
        $alert = $_SESSION["alert"];
        unset($_SESSION["alert"]);
        echo "
        <div data-alert class='alert-box {$alert["type"]} radius'>
          {$alert["text"]}
          <a href='#' class='close'>&times;</a>
        </div>
        ";
      }

?>
    
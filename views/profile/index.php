<center><a href='#' class='button tiny radius center'><i class='fa fa-pencil'></i> Szerkesztés</a></center>
<div class="row">
  <div class="small-6 large-6 columns text-right">Felhasználónév: </div>
  <div class="small-6 large-6 columns text-left"><?php echo $this->user["username"] ?></div>
</div>
<div class="row">
  <div class="small-6 large-6 columns text-right">E-mail cím: </div>
  <div class="small-6 large-6 columns text-left"><?php echo $this->user["email"] ?></div>
</div>
<div class="row">
  <div class="small-6 large-6 columns text-right">Skype cím: </div>
  <div class="small-6 large-6 columns text-left"><?php echo $this->user["skype"] ?></div>
</div>
<div class="row">
  <div class="small-6 large-6 columns text-right">Facebook cím: </div>
  <div class="small-6 large-6 columns text-left"><a target='_blank' href='http://facebook.com/<?php echo $this->user["facebook"] ?>'>http://facebook.com/<?php echo $this->user["facebook"] ?></a></div>
</div>
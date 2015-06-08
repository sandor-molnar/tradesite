<div class="C_myAccount">
	<h1><?php echo $this->account["title"] ?></h1>
	<hr>
	<h4>Leírás</h4>
	<p><?php echo $this->account["description"]; ?></p>
	<hr>
	<h4>A fiók megadott adatai</h4>
	<div class='row'>
		<div class='small-6 large-6 columns left'>Fiók név: <?php echo $this->account["name"] ?></div>
		<?php
			if ($this->account["info"]) {
			foreach($this->account["info"] as $key => $value) {
				$value = ($value == -1) ? 'Nincs megadva.' : $value;
				echo "<div class='small-6 large-6 columns left'>".constant("LANG_ACCOUNT_".$key).": ".$value."</div>";
			}
		}
		?>
	</div>
	<hr>
	<h4>Képek a fiókról</h4>
	<ul class="clearing-thumbs small-block-grid-4" data-clearing>
	  <li><a href="https://808boosting.com/images/unranked1.jpg"><img src="https://808boosting.com/images/unranked1.jpg"></a></li>
	  <li><a href="https://s-media-cache-ak0.pinimg.com/originals/9a/12/b9/9a12b9a84077ee45558c52cc2e1cdb42.jpg"><img src="https://s-media-cache-ak0.pinimg.com/originals/9a/12/b9/9a12b9a84077ee45558c52cc2e1cdb42.jpg"></a></li>
	  <li><a href="https://808boosting.com/images/unranked1.jpg"><img src="https://808boosting.com/images/unranked1.jpg"></a></li>
	</ul>
	<hr>
	<h4>Elérhetőségek</h4>
	<div class="row">
	  <div class="small-6 large-6 columns text-left">Felhasználónév: <?php echo $this->user["username"] ?></div>
	  <div class="small-6 large-6 columns text-left">E-mail cím: <?php echo $this->user["email"] ?></div>
	</div>
	<div class="row">
	  <div class="small-6 large-6 columns text-left">Skype cím: <?php echo $this->user["skype"] ?></div>
	  <div class="small-6 large-6 columns text-left">Facebook cím: <a target='_blank' href='http://facebook.com/<?php echo $this->user["facebook"] ?>'>http://facebook.com/<?php echo $this->user["facebook"] ?></a></div>
	</div>
</div>
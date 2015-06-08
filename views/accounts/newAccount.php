<script type="text/javascript">
function chnageDiv() {
	var select = document.getElementById("type_id1");
	var selectVal = select.value;
	var div = document.getElementById("special");
	div.innerHTML = "";

	<?php
		$innerHTML =  "";
		$columns = $this->columns;
		for ($i=1;$i<=count($columns);$i++) {
			echo "if (selectVal == '{$columns[$i]["table"]}') {";
			$innerHTML .= "<input type='hidden' name='table' value='{$columns[$i]["table"]}'>";
			for ($j=1;$j<count($columns[$i]);$j++) {
				$innerHTML .= "<div class='large-6 columns'><label>{$columns[$i][$j]}<font color='orange'>*</font><input type='text' name='{$columns[$i][$j]}'></label></div>";
			}
			echo ' div.innerHTML="'.$innerHTML.'" ';
			$innerHTML = "";
			echo "}";
		}
	?>
}
</script>
<div data-alert class='alert-box info radius'>
         <font color='red'>*</font> Kötelező kitölteni.<br>
         <font color='orange'>*</font> Opcionális, segíti a keresést.
          <a href='#' class='close'>&times;</a>
        </div>
<form method="POST" action='<?php echo URL ?>accounts/processNew'>
  <div class="row">
    <div class="large-12 columns text-center"><h3>Alap adatok</h3></div>
  </div>
  <div class="row">
    <div class="large-6 columns">
      <label>Fiók neve<font color="red">*</font>
        <input type="text" name="name"/>
      </label>
    </div>
    <div class="large-6 columns">
      <label>Hírdetés címe<font color="red">*</font>
        <input type="text" name="title"/>
      </label>
    </div>
    <div class="large-6 columns">
      <label>Fiók típusa<font color="red">*</font>
        <select name="type_id1" id="type_id1" onchange="chnageDiv()">
          <option value="steam">Steam</option>
          <option value="lol">League Of Legends</option>
          <option value="origin">Origin</option>
          <option value="uplay">UPlay</option>
        </select>
      </label>
  </div>
  <div class="large-6 columns">
      <label>Hírdetés típusa<font color="red">*</font>
        <select name="trade_type">
          <option value="1">Cserélném másik Fiókra (Pl.: Steam fiókot Origin fiókért)</option>
          <option value="2">Cserélném Tárgyra (Pl.: Cs:go skin)</option>
          <option value="3">Eladnám Valós pénzért (Pl.: Paypal)</option>
          <option value="4">Eladnám Fiók pénzért (Pl.: Riot Points)</option>
        </select>
      </label>
  	</div>
    <div class="large-12 columns">
      <label>Hírdetés leírása
        <textarea name="description"></textarea>
      </label>
    </div>
    <div class="large-12 columns text-center"><h3>Egyedi adatok</h3></div>
    <div class="large-12 columns text-center">
    <div data-alert class='alert-box info radius'>
          Division-höz segédlet: <a href="<?php echo URL ?>faq">ITT!</a>
          <a href='#' class='close'>&times;</a>
        </div>
    </div>
  <div id="special">
  </div>
  </div>
  <div class="row">
	<div class="large-12 columns">
		<input type="submit" value="Létrehozás" name="submit" class="button postfix">
	</div>
  </div>
</form>
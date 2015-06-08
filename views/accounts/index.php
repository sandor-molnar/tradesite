<dl class="sub-nav">
  <dt>Lehetőségek:</dt>
  <dd><a href="<?php echo URL ?>accounts/newAccount">Új fiók</a></dd>
</dl>
<?php
    //Table.Accounts
    /*
        //Table.{Type} (steam,origin,lol...etc)

        id
        name
        description
            type_id1 <- A Table.{type} azonosítója. {type} = {1:steam,2:origin..stb}
            type_id2 <- A sor azonosítója. {1}[1] = Steam account 1-es id-vel.

            //Table.Lol
            level
            champs
            skins
            rune_pages
            division
            lolskins_link
            elophant_link
            
            //Table.Steam
            games_number
            vac_status
            ...
    */


if($accounts = $this->accounts):
    $column = 3; //Oszlopok száma. Pl.: 2 oszlop: |x|x|, 4 oszlop: |x|x|x|x|
    $onecolumn = 12/$column; //Max szélesség egység 12, ezért 1 oszlopnak a szélessége az 12/oszlopok száma.
?>
<form method="POST" action="<?php echo URL ?>accounts/SearchC">
   <div class="row">
   <div class="large-1 columns">
        <a data-dropdown="advancedS" aria-controls="advancedS" class="button tiny" aria-expanded="false">
        <i class="fa fa-plus fa-lg"></i></a>
    </div>
    <div class="large-11 columns">
      <div class="row collapse">
        <div class="small-10 columns">
          <input type="text" name="value" placeholder="Keresés...">
        </div>
        <div class="small-2 columns">
          <input type="submit" class="button postfix" name="submit" value="Keresés">
        </div>
      </div>
    </div>
    </div>
        <div id="advancedS" data-dropdown-content  class="f-dropdown content" aria-hidden="true" tabindex="-1" style="max-width:500px">
        <h3>Haladó keresés</h3>
          <div class="row">
            <div class="large-6 columns">
                <input id="description" type="checkbox" name="description"><label style="color:black" for="description">Leírásban keresés</label>
            </div>
            <div class="large-6 columns">
                <label style="color:black">Fiók típus
                <select name="type">
                  <option value="0">Minden</option>
                  <option value="1">Steam</option>
                  <option value="2">League Of Legends</option>
                  <option value="3">Origin</option>
                  <option value="4">UPlay</option>
                </select>
              </label>
            </div>
          </div>  
          <div class="row">
            <div class="large-6 columns">
                <label style="color:black">Tól-
                    <input type="text" name="start" placeholder="Pl.: 2014.05.09, 2014.05">
                </label>
            </div>
            <div class="large-6 columns">
                <label style="color:black">-Ig.
                    <input type="text" name="end" placeholder="Pl.: 2014.10.25, 2014.10">
                </label>
            </div>
          </div>
        </div>
</form>
<pre>
<?php
foreach ($accounts as $i => &$key) {
var_dump($key);
}
var_dump($accounts);
exit;
    echo '<div class="row">';
    foreach ($accounts as $key => $value) {
        
       echo '
       <div class="small-'.$onecolumn.' columns C_account left">
        <a href="'.URL.'accounts/account/'.$value["token"].'"><img src="'.URL.'public/img/'.Auth::getAccountType($value["type_id1"])["table"].'.png" alt=""></a>
           ID: '.$value["id"].'<h3>'.$value["title"].'</h3>
            <p>'.nl2br($value["newDescription"]).'</p>
            </div>
       ';
    }
    echo '</div>';
    $currPage = $this->page;
    $next = $currPage+1;
    $prev = $currPage-1;
?>
<ul class="pagination">
    <li class="arrow <?php if ($this->page == 1) echo "unavailable"; ?>"><a <?php if ($this->page != 1) echo 'href="'.URL.'accounts/index/'.$prev.'"'; ?>>&laquo;</a></li>
<?php
    $pages = ceil($this->pages/DEFCOUNT);
    for ($i=1;$i<=$pages;$i++) {
        if ($i == $currPage) {
            $class = "class='current'";
        } else $class = "";
        echo "<li {$class}><a href='".URL."accounts/index/{$i}'>{$i}</a></li>";
    }
  ?>
    <li class="arrow <?php if ($this->page == $pages) echo "unavailable"; ?>"><a "<?php if ($this->page != $pages) echo ' href="'.URL.'accounts/index/'.$next.'"'; ?>">&raquo;</a></li>
</ul>
<?php

else: 
    echo LANG_ERROR_NOITEM;
endif; 
?>


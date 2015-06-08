<?php
if($myOffers = $this->myOffers):
    echo '<div class="row">';
    foreach ($this->myOffers as $key) {
           echo '
       <div class="small-6 large-6 columns C_account left">
       <div class="C_edit">
       <button href="#" data-dropdown="drop'.$key["token"].'" aria-controls="drop'.$key["token"].'" aria-expanded="false" class="button radius tiny dropdown"><i class="fa fa-pencil"></i></button><br>
        <ul id="drop'.$key["token"].'" data-dropdown-content class="f-dropdown" aria-hidden="true">
          <li><a href="'.URL.'accounts/edit/'.$key["token"].'"><i class="fa fa-pencil"></i> Modosítás</a></li>
          <li><a href="#2"><i class="fa fa-trash"></i> Törlés</a></li>
          <li><a href="#3"><i class="fa fa-flag"></i> Jelentés</a></li>
        </ul>
       
       </div>
        <a href="'.URL.'accounts/account/'.$key["token"].'"><img src="'.URL.'public/img/'.Auth::getAccountType($key["type_id1"])["table"].'.png" alt=""></a>
            <br>Token: '.$key["token"].'<br>ID: '.$key["id"].'<h3>'.$key["title"].'</h3>
            <p>'.$key["newDescription"].'</p>
            </div>
       ';
    }
    echo "</div>";
    $currPage = $this->page;
    $next = $currPage+1;
    $prev = $currPage-1;
?>
<ul class="pagination">
    <li class="arrow <?php if ($this->page == 1) echo "unavailable"; ?>"><a <?php if ($this->page != 1) echo 'href="'.URL.'accounts/mine/'.$prev.'"'; ?>>&laquo;</a></li>
<?php
    $pages = ceil($this->pages/DEFCOUNT);
    for ($i=1;$i<=$pages;$i++) {
        if ($i == $currPage) {
            $class = "class='current'";
        } else $class = "";
        echo "<li {$class}><a href='".URL."accounts/mine/{$i}'>{$i}</a></li>";
    }
  ?>
    <li class="arrow <?php if ($this->page == $pages) echo "unavailable"; ?>"><a "<?php if ($this->page != $pages) echo ' href="'.URL.'accounts/mine/'.$next.'"'; ?>">&raquo;</a></li>
</ul>
<?php

else: 
    echo LANG_ERROR_NOITEM;
endif; 
?>
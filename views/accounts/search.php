<?php 
$searchResult = Session::get("searchResult");
	if ($searchResult != null) {
		$column = 2; 
	    if ($column%2!=0) $column = 2;
	    $onecolumn = 12/$column;
		$c = 1;
		$accounts = Session::get("searchResult");
		echo "<div class='row'>";
	    foreach ($accounts as &$key) {
	       echo '
	       <div class="small-'.$onecolumn.' columns C_account">
	        <a href="#"><img src="'.URL.'public/img/'.Auth::getAccountType($key["type_id1"])["table"].'.png" alt=""></a>
	           <h3>ID: '.$key["id"].' '.$key["title"].'</h3>
	            <p>'.$key["newDescription"].'</p>
	            </div>
	       ';
	       if ($c%$column==0) {
	        echo "</div> <div class='row'>";
	        }
	       $c++;
	    }
	    echo "</div>";
	    Session::destroy("searchResult");
	} else {
        header('location: '.URL.'accounts');
	}
?>
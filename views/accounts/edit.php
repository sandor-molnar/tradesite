<form method="POST" action='<?php echo URL ?>accounts/processEdit/<?php echo $this->account["token"]; ?>' >
  <div class="row">
    <div class="large-12 columns text-center"><h3>Alap adatok</h3></div>
  </div>
  <div class="row">
    <div class="large-6 columns">
      <label>Fiók neve
        <input name="name" type="text" placeholder="Az account neve..." value="<?php echo $this->account['name'] ?>"/>
      </label>
    </div>
    <div class="large-6 columns">
      <label>Hírdetés címe
        <input name="title" type="text" placeholder="accounts.title..." value="<?php echo $this->account["title"] ?>"/>
      </label>
    </div>
   </div>
    <div class="row">
    <div class="large-6 columns">
      <label>Fiók típusa
        <select name="type_id1">
         <?php
         for ($i=1;$i<=count($this->types);$i++) {
          $a = ($i==$this->account["type_id1"]) ? "selected='selected'" : "";
          echo "<option {$a} value='{$i}'>{$this->types[$i]["Display_name"]}</option>";
         }
         ?>
        </select>
      </label>
      
  </div>
  <div class="large-6 columns">
      <label>Hírdetés típusa
        <select name="trade_type">
          <?php
          for ($i=1;$i<=count($this->trade_types);$i++) {
          $a = ($i==$this->account["trade_type"]) ? "selected='selected'" : "";
          echo "<option {$a} value='{$i}'>{$this->trade_types[$i]["display_name"]}</option>";
         }
          ?>
        </select>
      </label>
  	</div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <label>Hírdetés leírása
        <textarea name="description" placeholder="Leírás..."><?php echo $this->account["description"] ?></textarea>
      </label>
    </div>
  </div>   
  <div class="large-12 columns text-center"><h3>Részletek</h3></div>
  <div class='row'>
  <?php
      if ($this->account["info"]) {
      foreach($this->account["info"] as $key => $value) {
        $value = ($value == -1) ? 'Nincs megadva.' : $value;
        echo "<div class='small-6 large-6 columns left'><label>".ucfirst($key).": <input type='text' name='{$key}' value='{$value}'></div>";
      }
    }
    ?>
    <div class="small-12 large-12 columns">
          <input type="submit" name="submit" value="<?php echo LANG_TITLE_EDIT ?>" class="button postfix">
        </div>
  </div>
  </div>
</form>
<script type="text/javascript">
('#register')
  .on('invalid', function () {
    var invalid_fields = $(this).find('[data-invalid]');
    console.log(invalid_fields);
  });
  .on('valid', function () {
    console.log('valid!');
  });

</script>
<form method="POST" action="<?php echo URL ?>login/processRegister" data-abide id="register">
    <div class="row">
    <div class="large-6 columns name-field">
      <label>Felhasználónév:<font color='red'>*</font> 
    	<input type="text" name="username"  pattern="^[a-z0-9_-]{3,15}$" placeholder="Felhasználónév..." required />
      </label>
       <small class="error">
      Kötelező kitölteni.<br>
      Csak az angol ABC kis betűi és számok használhatóak.<br>
      3 és 16 karakter közé kell hogy essen.
      </small>
    </div>
    <div class="large-6 columns name-field">
      <label>E-mail: <font color='red'>*</font>
    	<input type="email" name="email" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" placeholder="E-mail cím..." required />
      </label>
      <small class="error">
      Kötelező kitölteni.<br>
      E-mail alapúnak kell lennie. (Pl.: info@csere-oldal.hu)
      </small>
    </div>
    </div>
    <div class="row">
    <div class="large-6 columns password-field">
      <label>Jelszó: <font color='red'>*</font>
    	<input type="password" name="password" id="password" pattern="^[a-zA-Z]\w{3,14}$" placeholder="Jelszó..." required  />
      </label>
      <small class="error">
      Kötelező kitölteni.<br>
      Csak az angol ABC kis-és nagy betűi illetve számok használhatóak.<br>
      3 és 16 karakter közé kell hogy essen.<br>
      Az első karakter nem lehet szám.<br>
      Eggyeznie kell a második jelszóval.
      </small>
    </div>
    <div class="large-6 columns password-confirmation-field">
      <label>Jelszó újra: <font color='red'>*</font>
    	<input type="password" name="password2" id="password" pattern="^[a-zA-Z]\w{3,14}$" placeholder="Jelszó újra..." required data-equalto="password" />
      </label>
      <small class="error">
      Kötelező kitölteni.<br>
      Eggyeznie kell az első jelszóval.
      </small>
    </div>
    </div>
    <div class="row">
    <div class="large-12 columns name-field">
    	 <button type="submit" name="submit">Regisztráció</button>
    </div>
    </div>
        
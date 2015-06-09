

<?php
$file = (isset($this->name)) ? "views/".$this->name."/custom/footer.php" : "views/index/custom/footer.php";
if (file_exists($file)) {
  require $file;
}
?>
</div> <!-- MAIN -->
<!-- FOOTER START -->
<footer class="row">
<div class="large-12 columns">
<hr/>
<div class="row">
<div class="large-6 columns">
<ul class="inline-list left">
<li><a data-dropdown="langueage" data-options="align:top" aria-controls="langueage" aria-expanded="false"><img src="<?php echo URL ?>lang/<?php echo Session::get("lang") ?>/flag.gif"></a></li>
<li><p> Csere-oldal.hu &copy; 2015. Minden jog fenntartva.</p></li>
</ul>
</div>
<div class="large-6 columns">
<ul class="inline-list right">
<li><a href="index">Főoldal</a></li>
</ul>
</div>
</div>
</div>
</footer>
<ul id="langueage" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">
  <li <?php echo (Session::get("lang")=="hu") ? 'style="background-color: #008CBA"' : ""; ?>><a href="<?php echo URL ?>profile/setLang/hu"><img src="<?php echo URL ?>lang/hu/flag.gif"> Magyar</a></li>
  <li <?php echo (Session::get("lang")=="en") ? 'style="background-color: #008CBA"' : ""; ?>><a href="<?php echo URL ?>profile/setLang/en"><img src="<?php echo URL ?>lang/en/flag.gif"> English</a></li>
  <li <?php echo (Session::get("lang")=="jpn") ? 'style="background-color: #008CBA"' : ""; ?>><a href="<?php echo URL ?>profile/setLang/jpn"><img src="<?php echo URL ?>lang/jpn/flag.gif"> 日本</a></li>
</ul>

<!-- JAVASCRIPT -->
<script>
  document.write('<script src=<?php echo URL; ?>public/js/vendor/' +
  ('__proto__' in {} ? 'zepto' : 'jquery') +
  '.js><\/script>')
  </script>
<script src="<?php echo URL; ?>public/js/jquery.js"></script>
<script src="<?php echo URL; ?>public/js/foundation.min.js"></script>
<script>
    $(document).foundation();
  </script>
<script src="<?php echo URL; ?>public/js/jquery.js"></script>
<script src="<?php echo URL; ?>public/js/foundation.js"></script>
<script>
      $(document).foundation();

      var doc = document.documentElement;
      doc.setAttribute('data-useragent', navigator.userAgent);
    </script>
<script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */

$(document).foundation({
  abide : {
    live_validate : true,
    validate_on_blur : true,
    focus_on_invalid : true,
    error_labels: true, // labels with a for="inputId" will recieve an `error` class
    timeout : 1000,
    patterns : {
      alpha: /^[a-zA-Z]+$/,
        alpha_numeric : /^[a-zA-Z0-9]+$/,
        integer: /^[-+]?\d+$/,
        number: /^[-+]?[1-9]\d*$/,

        // amex, visa, diners
        card : /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/,
        cvv : /^([0-9]){3,4}$/,

        // http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#valid-e-mail-address
        email : /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,

        url: /(https?|ftp|file|ssh):\/\/(((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?/,
        // abc.de
        domain: /^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$/,

        datetime: /([0-2][0-9]{3})\-([0-1][0-9])\-([0-3][0-9])T([0-5][0-9])\:([0-5][0-9])\:([0-5][0-9])(Z|([\-\+]([0-1][0-9])\:00))/,
        // YYYY-MM-DD
        date: /(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))/,
        // HH:MM:SS
        time : /(0[0-9]|1[0-9]|2[0-3])(:[0-5][0-9]){2}/,
        dateISO: /\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}/,
        // MM/DD/YYYY
        month_day_year : /(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/,

        // #FFF or #FFFFFF
        color: /^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/
    },
    validators: {
      diceRoll: function(el, required, parent) {
        var possibilities = [true, false];
        return possibilities[Math.round(Math.random())];
      },
      isAllowed: function(el, required, parent) {
        var possibilities = ['a@zurb.com', 'b.zurb.com'];
        return possibilities.indexOf(el.val) > -1;
      }
    }
  }
});
</script>

<script>
$(window).scroll(function(){
    $(".upper-top-bar").css("opacity", 1 - $(window).scrollTop() / 300);
  });
</script>

</body>
</html>
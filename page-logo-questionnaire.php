<div title="<?php echo $form_return; ?>" id="toTop"><div id="toTop_text"><?php echo $form_return; ?></div></div>

<form class="form_contact" id="form_quote0" action="<?php echo get_bloginfo('wpurl'); ?>/logo-questionnaire/" method="post">    

<?php  
if (isset($_POST['sub'])) $sub=$_POST['sub']; else $sub = ""; //$sub=1;
if (($sub == 1) && ($_POST['message_human'] == 2)) {
  require_once('send_logo_questionnaire.php');
}
else {
?>
<a class='back_to_quote' href="<?php echo get_bloginfo('wpurl'); ?>/quote/">
  <?php echo $questionnaire_back_link; ?>
</a>

<?php echo $ldq_quote_title; ?>

<p>
  <?php echo $ldq_intro; ?>
</p>

<p>
  <?php echo $quote_log_word; ?>
</p>

<h3>
  <?php echo $ldq_section01; ?>
</h3>

<!-- Company Name -->
<h2>
  <?php echo $ldq_title02; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text02; ?>
</p>
<input class="required" minlength="3" type="text" name="ldq_company_name" id="ldq_company_name" />

<!-- URL -->
<h2>
  <?php echo $ldq_title02y; ?><span> *</span>
</h2>  
<p>
  <?php echo $ldq_text02y; ?>
</p>
<input class="required" minlength="3" type="text" name="ldq_url" id="ldq_url" />    

<!-- Name -->
<h2>
  <?php echo $ldq_title02x; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text02x; ?>
</p>
<input class="required" minlength="3" type="text" name="ldq_contact_name" id="ldq_contact_name" />

<!-- Telephone -->
<h2>
  <?php echo $ldq_title02nx; ?>
</h2>
<p>
  <?php echo $ldq_text02nx; ?>
</p>
<input minlength="3" type="text" name="ldq_contact_telephone" id="ldq_contact_telephone" />   

<!-- Email -->
<h2>
  <?php echo $ldq_title03; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text03; ?>
</p>
<input class="required" minlength="3" type="text" name="ldq_email" id="ldq_email" />  

<h3>
  <?php echo $ldq_section02; ?>
</h3>

<!-- Logo Refresh or Tidy Up Options -->
<h2>
  <?php echo $ldq_title04; ?>
</h2>
<p>
  <?php echo $ldq_text04; ?>
</p>
<textarea name="ldq_refresh" id="ldq_refresh"></textarea>   

<!-- Logo Normal Package -->
<h2>
  <?php echo $ldq_title05; ?>
</h2>
<p>
  <?php echo $ldq_text05; ?>
</p>

<input class="q_rad" type="radio" name="ldq_basic" value="£250 or 375€"><?php echo $ldq_text05a; ?></li>
<input class="q_rad" type="radio" name="ldq_basic" value="£350 or 525€"><?php echo $ldq_text05b; ?></li>
<input class="q_rad" type="radio" name="ldq_basic" value="£500 or 750€"><?php echo $ldq_text05c; ?></li>
<input class="q_rad" type="radio" name="ldq_basic" value="£600 or 900€"><?php echo $ldq_text05d; ?></li>
<input class="q_rad" type="radio" name="ldq_basic" value="None of these"><?php echo $ldq_text05e; ?></li>

<h3 class='ldq_h3'>
  <?php echo $ldq_section022; ?>
</h3>

<!-- Schedule -->
<h2>
  <?php echo $ldq_title44; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text44; ?>
</p>

<input class="q_rad" type="radio" name="ldq_schedule" value="Within 3 weeks"><?php echo $ldq_text44a; ?></li>
<input class="q_rad" type="radio" name="ldq_schedule" value="Within 1 month"><?php echo $ldq_text44b; ?></li>
<input class="q_rad" type="radio" name="ldq_schedule" value="Within 2 months"><?php echo $ldq_text44c; ?></li>
<input class="q_rad" type="radio" name="ldq_schedule" value="Within 3 months"><?php echo $ldq_text44d; ?></li>
<input class="q_rad" type="radio" name="ldq_schedule" value="Within 4 months"><?php echo $ldq_text44e; ?></li>
<input class="q_rad" type="radio" name="ldq_schedule" value="None of these"><?php echo $ldq_text44f; ?></li>

<h3 class='ldq_h3'>
  <?php echo $ldq_section03; ?>
</h3>

<!-- About -->
<h2>
  <?php echo $ldq_title09; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text09; ?>
</p>
<textarea class="required" name="ldq_about" id="ldq_about"></textarea>

<!-- Sum up what you do -->
<h2>
  <?php echo $ldq_title10; ?>
</h2>
<p>
  <?php echo $ldq_text10; ?>
</p>
<textarea class="required" name="ldq_whatdo" id="ldq_whatdo"></textarea>

<!-- Appropriate keywords and descriptive words or phrases -->
<h2>
  <?php echo $ldq_title11; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text11; ?>
</p>
<textarea class="required" name="ldq_keywords" id="ldq_keywords"></textarea>

<!-- Perception -->
<h2>
  <?php echo $ldq_title12; ?>
</h2>
<p>
  <?php echo $ldq_text12; ?>
</p>
<textarea class="required" name="ldq_perception" id="ldq_perception"></textarea>    

<!-- What does the logo need to say about you or the company? -->
<h2>
  <?php echo $ldq_title13; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text13; ?>
</p>
<textarea class="required" name="ldq_logosays" id="ldq_logosays"></textarea>

<!-- Number of Staff -->
<h2>
  <?php echo $ldq_title14; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text14; ?>
</p>
<input class="required" minlength="1" type="text" name="ldq_staff" id="ldq_staff" />

<!-- Premises of business -->
<h2>
  <?php echo $ldq_title15; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text15; ?>
</p>
<textarea class="required" name="ldq_premises" id="ldq_premises"></textarea>

<!-- Logo Wording -->
<h2>
  <?php echo $ldq_title07; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text07; ?>
</p>
<input class="required" minlength="3" type="text" name="ldq_wording" id="ldq_wording" />

<!-- Tag Line -->
<h2>
  <?php echo $ldq_title08; ?>
</h2>
<p>
  <?php echo $ldq_text08; ?>
</p>
<input class="required" minlength="3" type="text" name="ldq_tagline" id="ldq_tagline" />    

<!-- Type of Logo required -->
<h2>
  <?php echo $ldq_title16; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text16; ?>
</p>

<input class="q_rad" type="radio" name="ldq_typelogo" value="Main company logo"><?php echo $ldq_text16a; ?></li>
<input class="q_rad" type="radio" name="ldq_typelogo" value="Personal brand logo"><?php echo $ldq_text16b; ?></li>
<input class="q_rad" type="radio" name="ldq_typelogo" value="Website logo"><?php echo $ldq_text16c; ?></li>
<input class="q_rad" type="radio" name="ldq_typelogo" value="Software/application logo"><?php echo $ldq_text16d; ?></li>
<input class="q_rad" type="radio" name="ldq_typelogo" value="Website badge"><?php echo $ldq_text16e; ?></li>
<input class="q_rad" type="radio" name="ldq_typelogo" value="Website icon"><?php echo $ldq_text16f; ?></li>
<input class="q_rad" type="radio" name="ldq_typelogo" value="None of these"><?php echo $ldq_text16g; ?></li>

<h3>
  <?php echo $ldq_section04; ?>
</h3>

<!-- Where will the logo be used? -->
<h2>
  <?php echo $ldq_title18; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text18; ?>
</p>

<input class="q_rad" type="checkbox" name="ldq_where[]" value="Website"><?php echo $ldq_text18a; ?></li>
<input class="q_rad" type="checkbox" name="ldq_where[]" value="Stationery"><?php echo $ldq_text18b; ?></li>
<input class="q_rad" type="checkbox" name="ldq_where[]" value="Vehicle livery"><?php echo $ldq_text18c; ?></li>
<input class="q_rad" type="checkbox" name="ldq_where[]" value="Exterior signs"><?php echo $ldq_text18d; ?></li>
<input class="q_rad" type="checkbox" name="ldq_where[]" value="Clothing - screen print"><?php echo $ldq_text18e; ?></li>
<input class="q_rad" type="checkbox" name="ldq_where[]" value="Clothing - embroidered"><?php echo $ldq_text18f; ?></li>
<input class="q_rad" type="checkbox" name="ldq_where[]" value="Corporate literature"><?php echo $ldq_text18g; ?></li>
<input class="q_rad" type="checkbox" name="ldq_where[]" value="Marketing merchandise"><?php echo $ldq_text18h; ?></li>

<p>Other :</p> 
<input class="required" minlength="3" type="text" name="ldq_where_other" id="ldq_where_other" />

<!-- It's all about the size -->
<h2>
  <?php echo $ldq_title19; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text19; ?>
</p>
<textarea class="required" name="ldq_size" id="ldq_size"></textarea>

<!-- What visual style of logos appeal to you -->
<h2>
  <?php echo $ldq_title20; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text20; ?>
</p>
<textarea class="required" name="ldq_style" id="ldq_style"></textarea>

<h3>
  <?php echo $ldq_section05; ?>
</h3>

<!-- Colours -->
<h2>
  <?php echo $ldq_title21; ?>
</h2>
<p>
  <?php echo $ldq_text21; ?>
</p>
<textarea class="required88" name="ldq_colours" id="ldq_colours"></textarea>

<!-- Specific visual requirements -->
<h2>
  <?php echo $ldq_title22; ?>
</h2>
<p>
  <?php echo $ldq_text22; ?>
</p>
<textarea class="required" name="ldq_require" id="ldq_require"></textarea>

<!-- Have more to say? -->
<h2>
  <?php echo $ldq_title23; ?>
</h2>
<p>
  <?php echo $ldq_text23; ?>
</p>
<textarea class="required" name="ldq_anything" id="ldq_anything"></textarea>

<!-- Anti-spam -->
<h2>
  <?php echo $contact_spam; ?><span> *</span>
</h2>
<p>
  <?php echo $contact_spam_question; ?>
</p>
<input class="required" type="text" name="message_human" id="message_human" /><span id="human_op">+ 3 = <strong>5</strong></span>

<!-- Thanks -->
<h2>
  <?php echo $ldq_title33; ?>
</h2>
<p>
  <?php echo $ldq_text43; ?>
</p>     

<input type="submit" id="questionnaire_bouton" class="bouton" value="<?php echo $quote_send; ?>"> 
<input type="hidden" name="sub" value="1" />

<?php
}
?>
</form>
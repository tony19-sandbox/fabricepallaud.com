<div title="<?php echo $form_return; ?>" id="toTop"><div id="toTop_text"><?php echo $form_return; ?></div></div>

<form class='form_contact' id='form_quote0' action="<?php echo get_bloginfo('wpurl'); ?>/general-questionnaire/" method="post">     

<?php  
if (isset($_POST['sub'])) $sub=$_POST['sub']; else $sub=""; //$sub=1;
if (($sub == 1) && ($_POST['message_human'] == 2)) {
  require_once('send_general_questionnaire.php');
}
else {
?>
<a class="back_to_quote" href="<?php echo get_bloginfo('wpurl'); ?>/quote/">
  <?php echo $questionnaire_back_link; ?>
</a>

<?php echo $gdq_quote_title; ?>

<p>
  <?php echo $gdq_intro; ?>
</p>

<h3>
  <?php echo $ldq_section01; ?>
</h3>

<!-- Company Name -->
<h2>
  <?php echo $gdq_title02; ?><span> *</span>
</h2>
<p>
  <?php echo $gdq_text02; ?>
</p>

<input class="required" minlength="3" type="text" name="wdq_company_name" id="wdq_company_name" />

<!-- URL -->
<h2>
  <?php echo $gdq_title02y; ?><span> *</span>
</h2>
<p>
  <?php echo $gdq_text02y; ?>
</p>

<input class="required" minlength="3" type="text" name="wdq_url" id="wdq_url" />        

<!-- Name -->
<h2>
  <?php echo $ldq_title02x; ?><span> *</span>
</h2>
<p>
  <?php echo $ldq_text02x; ?>
</p>
<input class="required' minlength="3" type="text" name="wdq_contact_name" id="wdq_contact_name" />

<!-- Telephone -->
<h2>
  <?php echo $ldq_title02nx; ?>
</h2>
<p>
  <?php echo $ldq_text02nx; ?>
</p>
<input class="ldq_input input_style" minlength="3" type="text" name="wdq_contact_telephone" id="wdq_contact_telephone" />   

<!-- Email -->
<h2>
  <?php echo $wdq_title03; ?><span> *</span>
</h2>
<p>
  <?php echo $wdq_text03; ?>
</p>
<input class="required" minlength="3" type="text" name="wdq_email" id="wdq_email" />        

<div class="ldq_divsec">
  <h3>
    <?php echo $wdq_section02; ?>
  </h3>
</div>   

<!-- Description -->
<h2>
  <?php echo $gdq_title06; ?><span> *</span>
</h2>
<p>
  <?php echo $gdq_text06; ?>
</p>
<textarea class="required" name="wdq_description" id="wdq_description"></textarea>

<h3 class="ldq_h3">
  <?php echo $wdq_section02; ?>
</h3>

<!-- Schedule -->
<h2>
  <?php echo $gdq_title04; ?><span> *</span>
</h2>
<p>
  <?php echo $gdq_text04; ?>
</p>

<input type="radio" name="wdq_schedule" value="Within 2 weeks"><?php echo $wdq_text04a; ?>
<input type="radio" name="wdq_schedule" value="Within 1 month"><?php echo $wdq_text04b; ?>
<input type="radio" name="wdq_schedule" value="Within 2 months"><?php echo $wdq_text04c; ?>
<input type="radio" name="wdq_schedule" value="Within 3 months"><?php echo $wdq_text04d; ?>
<input type="radio" name="wdq_schedule" value="Within 4 months"><?php echo $wdq_text04e; ?>
<input type="radio" name="wdq_schedule" value="None of these"><?php echo $wdq_text04f; ?>

<!-- Budget -->
<h2>
  <?php echo $gdq_title05; ?><span> *</span>
</h2>
<p>
  <?php echo $gdq_text05; ?>
</p>

<input type="radio" name="wdq_budget" value="£300 - £500 or 500€ - 800€"><?php echo $wdq_text05a; ?>
<input type="radio" name="wdq_budget" value="£500 - £800 or 800€ - 1200€"><?php echo $wdq_text05b; ?>
<input type="radio" name="wdq_budget" value="£1000 - £1200 or 1200€ - 1600€"><?php echo $wdq_text05c; ?>
<input type="radio" name="wdq_budget" value="£1200 - £1500 or 1600€ - 2500€"><?php echo $wdq_text05d; ?>
<input type="radio" name="wdq_budget" value="None of these"><?php echo $wdq_text05e; ?>

<!-- Anti-spam -->
<h2>
  <?php echo $contact_spam; ?><span> *</span>
</h2>
<p>
  <?php echo $contact_spam_question; ?>
</p>

<input class="required" type="text" name="message_human" id="message_human" /><span id='human_op'>+ 3 = <strong>5</strong></span>

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

<?php get_header(); ?>

<div class="wrap">
  <div class="container">

    <div title="<?php echo $form_return; ?>" id="toTop"><div id="toTop_text"><?php echo $form_return; ?></div></div>

    <form class='form_contact' id='form_quote0' action="<?php echo get_bloginfo('wpurl'); ?>/website-questionnaire/" method="post">     

    <?php  
    if (isset($_POST['sub'])) $sub=$_POST['sub']; else $sub=""; //$sub=1;
    if (($sub == 1) && ($_POST['message_human'] == 2)) {
      require_once('send_web_questionnaire.php');
    }
    else {
    ?>

    <a class="back_to_quote" href="<?php echo get_bloginfo('wpurl'); ?>/quote/">
      <?php echo $questionnaire_back_link; ?>
    </a>

    Website Questionnaire

    <p>
      Thank you for considering <strong>Baia Design</strong> for your new web project ! The idea of this questionnaire is to help you provide the information needed to give an <strong>accurate quote</strong> for your requirements. You don't have to answer all the questions now, but keep in mind that the more questions you answer, the more precise the quote will be.
    </p>

    <h3>
      Contact Information
    </h3>   

    <!-- Company Name -->
    <h2>
      Company name<span> *</span>
    </h2>
    <p>
      What is the name of your company ?
    </p>
    <input class="required" minlength="3" type="text" name="wdq_company_name" id="wdq_company_name" />

    <!-- URL -->
    <h2>
      URL
    </h2>
    <p>
      What is the current or intended web address (URL) of your company ?
    </p>
    <input minlength="3" type="text" name="wdq_url" id="wdq_url" /> 

    <!-- Name -->
    <h2>
      Name<span> *</span>
    </h2>
    <p>
      What is your name ?
    </p>
    <input class="required" minlength="3" type="text" name="wdq_contact_name" id="wdq_contact_name" />

    <!-- Telephone -->
    <h2>
      Telephone
    </h2>
    <p>
      What is your telephone number ?
    </p>
    <input minlength="3" type="text" name="wdq_contact_telephone" id="wdq_contact_telephone" />   

    <!-- Email -->
    <h2>
      Email<span> *</span>
    </h2>
    <p>
      What is your email ?
    </p>
    <input class="required" minlength="3" type="text" name="wdq_email" id="wdq_email" />        

    <h3>
      <?php echo $wdq_section02; ?>
    </h3>

    <!-- Schedule -->
    <h2>
      Schedule<span> *</span>
    </h2>
    <p>
      When does your project needs be completed ?
    </p>

    <input class="q_rad" type="radio" name="wdq_schedule" value="Within 2 weeks">Within 2 weeks
    <input class="q_rad" type="radio" name="wdq_schedule" value="Within 1 month">Within 1 month
    <input class="q_rad" type="radio" name="wdq_schedule" value="Within 2 months">Within 2 months
    <input class="q_rad" type="radio" name="wdq_schedule" value="Within 3 months">Within 3 months
    <input class="q_rad" type="radio" name="wdq_schedule" value="Within 4 months">Within 4 months
    <input class="q_rad" type="radio" name="wdq_schedule" value="None of these">None of these

    <!-- Budget -->
    <h2>
      <?php echo $wdq_title05; ?><span> *</span>
    </h2>
    <p>
      <?php echo $wdq_text05; ?>
    </p>

    <input class="q_rad" type="radio" name="wdq_budget" value="£500 - £800 ($1000 - $1600 / 800€ - 1200€)"><?php echo $wdq_text05b; ?>
    <input class="q_rad" type="radio" name="wdq_budget" value="£1000 - £1500 ($2000 - $3000 / 1200€ - 2000€)"><?php echo $wdq_text05c; ?>
    <input class="q_rad" type="radio" name="wdq_budget" value="£1500 - £2000 ($3000 - $4000 / 2000€ - 3000€)"><?php echo $wdq_text05d; ?>
    <input class="q_rad" type="radio" name="wdq_budget" value="None of these"><?php echo $wdq_text05e; ?>

    <h3>
      <?php echo $wdq_section03; ?>
    </h3>

    <!-- About -->
    <h2>
      <?php echo $wdq_title06; ?><span> *</span>
    </h2>
    <p>
      <?php echo $wdq_text06; ?>
    </p>
    <textarea class="required" name="wdq_about" id="ldq_about"></textarea>

    <!-- Number of Staff -->
    <h2>
      <?php echo $wdq_title10; ?>
    </h2>
    <p>
      <?php echo $wdq_text10; ?>
    </p>
    <input minlength="1" type="text" name="wdq_staff" id="ldq_staff" />

    <!-- How many people involved in the projet -->
    <h2>
      <?php echo $wdq_title11a; ?><span> *</span>
    </h2>
    <p>
      <?php echo $wdq_text11a; ?>
    </p>
    <textarea class="required" name="wdq_involv" id="wdq_involv"></textarea>

    <h3>
      <?php echo $wdq_section04; ?>
    </h3>

    <!-- Purpose of the website -->
    <h2>
      <?php echo $wdq_title12; ?><span> *</span>
    </h2>
    <p>
      <?php echo $wdq_text12; ?>
    </p>
    <textarea class="required" name="wdq_purpose" id="wdq_purpose"></textarea>

    <!-- Primary action -->
    <h2>
      <?php echo $wdq_title12a; ?><span> *</span>
    </h2>
    <p>
      <?php echo $wdq_text12a; ?>
    </p>
    <textarea class="required" name="wdq_action" id="wdq_action"></textarea>    

    <!-- Main sections of the site -->
    <h2>
      <?php echo $wdq_title14; ?><span> *</span>
    </h2>
    <p>
      <?php echo $wdq_text14; ?>
    </p>
    <textarea class="required" name="wdq_pages" id="wdq_pages"></textarea>

    <!-- Features -->
    <h2>
      <?php echo $wdq_title15; ?><span> *</span>
    </h2>
    <p>
      <?php echo $wdq_text15; ?>
    </p>
    <textarea class="required" name="wdq_features" id="wdq_features"></textarea>  

    <!-- Ecommerce details -->
    <h2>
      <?php echo $wdq_title15a; ?>
    </h2>
    <p>
      <?php echo $wdq_text15a; ?>
    </p>
    <textarea name="wdq_sell" id="wdq_sell"></textarea>    

    <!-- Responsive design -->
    <h2>
      <?php echo $wdq_title15b; ?><span> *</span>
    </h2>
    <p>
      <?php echo $wdq_text15b; ?>
    </p>

    <input class="q_rad" type="radio" name="wdq_responsive" value="Very important"><?php echo $wdq_text15b_a; ?>
    <input class="q_rad" type="radio" name="wdq_responsive" value="Moderately important"><?php echo $wdq_text15b_b; ?>
    <input class="q_rad" type="radio" name="wdq_responsive" value="Not important"><?php echo $wdq_text15b_c; ?>

    <!-- Content Management System -->
    <h2>
      <?php echo $wdq_title18; ?><span> *</span>
    </h2>
    <p>
      <?php echo $wdq_text18; ?>
    </p>
    <textarea class="required" name="wdq_cms" id="wdq_cms"></textarea>  

    <!-- Content copy -->
    <h2>
      <?php echo $wdq_title18a; ?><span> *</span>
    </h2>
    <p>
      <?php echo $wdq_text18a; ?>
    </p>
    <textarea class="required" name="wdq_copy" id="wdq_copy"></textarea>      

    <!-- Existing logo -->
    <h2>
      <?php echo $wdq_title18b; ?><span> *</span>
    </h2>
    <p>
      <?php echo $wdq_text18b; ?>
    </p>
    <textarea class="required" name="wdq_logo" id="wdq_logo"></textarea>      

    <h3>
      <?php echo $wdq_section04a; ?>
    </h3>

    <!-- Reasons behind redesigning your site -->
    <h2>
      <?php echo $wdq_title13; ?>
    </h2>
    <p>
      <?php echo $wdq_text13; ?>
    </p>
    <textarea class="required" name="wdq_reasons" id="wdq_reasons"></textarea>      

    <!-- Strengths and weaknesses of your current site -->
    <h2>
      <?php echo $wdq_title13b; ?>
    </h2>
    <p>
      <?php echo $wdq_text13b; ?>
    </p>
    <textarea class="required" name="wdq_shortcomings" id="wdq_shortcomings"></textarea>    

    <!-- Importance of maintaining current look -->
    <h2>
      <?php echo $wdq_title13a; ?>
    </h2>
    <p>
      <?php echo $wdq_text13a; ?>
    </p>
    <textarea class="required" name="wdq_maintain" id="wdq_maintain"></textarea>

    <h3>
      <?php echo $wdq_section05; ?>
    </h3>

    <!-- Look and feel -->
    <h2>
      <?php echo $wdq_title16; ?><span> *</span>
    </h2>
    <p>
      <?php echo $wdq_text16; ?>
    </p>
    <textarea name="wdq_look" id="wdq_look"></textarea>

    <!-- Examples -->
    <h2>
      <?php echo $wdq_title17; ?>
    </h2>
    <p>
      <?php echo $wdq_text17; ?>
    </p>
    <textarea class="required" name="wdq_examples" id="wdq_examples"></textarea>      

    <!-- Colours -->
    <h2>
      <?php echo $wdq_title21; ?>
    </h2>
    <p>
      <?php echo $wdq_text21; ?>
    </p>
    <textarea class="required" name="wdq_colours" id="ldq_colours"></textarea>

    <!-- Have more to say? -->
    <h2>
      <?php echo $wdq_title23; ?>
    </h2>
    <p>
      <?php echo $wdq_text23; ?>
    </p>
    <textarea class="required" name="wdq_anything" id="ldq_anything"></textarea>

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
      <?php echo $wdq_title33; ?>
    </h2>
    <p>
      <?php echo $wdq_text43; ?>
    </p> 

    <input type="submit" id="questionnaire_bouton" class="bouton" value="<?php echo $quote_send; ?>"> 
    <input type="hidden" name="sub" value="1" />  

    <?php
    }
    ?>
    </form>

  </div>
</div>

<?php get_footer(); ?>
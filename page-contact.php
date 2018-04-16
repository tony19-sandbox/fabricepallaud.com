<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<div class="wrap">
  <div class="container content">

    <?php 
    $not_human = "Human verification incorrect.";
    $missing_content = "Please supply all information.";
    $email_invalid = "Email Address Invalid.";
    $message_unsent = "Message was not sent. Please try Again.";

    $form_sub = (isset($_POST['form_sub']) ? $_POST['form_sub'] : '');
    $form_name = (isset($_POST['form_name']) ? $_POST['form_name'] : '');
    $form_email = (isset($_POST['form_email']) ? $_POST['form_email'] : '');
    $form_text = (isset($_POST['form_text']) ? $_POST['form_text'] : '');
    $message_human = (isset($_POST['message_human']) ? $_POST['message_human'] : '');
    $response = '';
    $message_sent = 0;

    if ($form_sub == 1) {
      if ( (empty($name)) || (empty($message)) ) {
        $response = $missing_content;
      }
      else 
      {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $response = $email_invalid;   
        }
        else 
        {
          if ($message_human == 2) {  
            ?>
            <div id='sentdiv'>
              <?php 
              $message_sent = 1;
              include ("send_normal.php"); 
              ?>
            </div>
            <?php
            
          }
          else {
            $response = $not_human;
          }
        } 
      }
    }
    ?>

    <?php
    if ($message_sent != 1) {
    ?>

      <section class="page_header page_header--contact">
        <h1 class="page_title">
          Let's talk !
        </h1>
        <p class="page_summary page_summary--contact">
          Want to talk about you next project, or maybe just to ask a question? Please fill out the contact form below, or <a class="page_header_link" href="<?php bloginfo('wpurl'); ?>/quote">request a Quote</a>.
        </p>
      </section>

      <section class="content content--contact">

        <div class="contact_form">          
          <form action="<?php the_permalink(); ?>" method="post">
            <?php if ($response != '') echo generate_response('error', $response);  ?>
            <p>
              <label for="form_name">Name<span> *</span></label>
              <input class="required" minlength="3" type="text" name="form_name" id="form_name" value="<?php echo $form_name; ?>" />
            </p>        
            <p>
              <label for="form_email">Email<span> *</span></label>
              <input class="required" type="email" name="form_email" id="form_email" value="<?php echo $form_email; ?>" />
            </p>        
            <p>
              <label for="form_text">Message<span> *</span></label>
              <textarea class="required" minlength="5" name="form_text" id="form_text"><?php echo $form_text; ?></textarea>
            </p>        
            <p>
              <label for="message_human">Robot check<span> *</span></label>
              <input class="required" type="text" name="message_human" id="message_human" /><span id="human_op">+ 3 = <strong>5</strong></span>
            </p>        
            <input type="submit" class="button" value="Send" />             
            <input type="hidden" name="form_sub" value="1" />  
          </form>
        </div>

        <div class="contact_sidebar">
          <p>
            I am best contacted by email. If you have a general enquiry, please include as much detail as possible in the message field.
          </p>
          <p>
            If you wish to request a quote for your next project, please use the <a href="<?php bloginfo('wpurl'); ?>"/quote'>Quote Request Form</a> instead.
          </p>
          <p>
            Alternatively, you can send me an email at <a href="mailto:info@baiadesign.com">info@baiadesign.com</a>. 
          </p>
          <img src='<?php bloginfo('template_url'); ?>/dist/images/contact_map.jpg' />
          <!--
          +44 753 025 9923
          <a href="mailto:info@baiadesign.com">info@baiadesign.com</a>
          -->
        </div>

      </section>
    <?php
    }
    ?>
    
  </div>
</div>

<?php get_footer(); ?>
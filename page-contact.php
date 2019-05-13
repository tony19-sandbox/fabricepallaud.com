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
    $success_message = "<div><strong>Message sent successfully!</strong>I'll be in touch ASAP.</div>";

    $form_sub = (isset($_POST['form_sub']) ? $_POST['form_sub'] : '');
    $form_name = (isset($_POST['form_name']) ? $_POST['form_name'] : '');
    $form_email = (isset($_POST['form_email']) ? $_POST['form_email'] : '');
    $form_message = (isset($_POST['form_message']) ? $_POST['form_message'] : '');
    $message_human = (isset($_POST['message_human']) ? $_POST['message_human'] : '');
    $response = '';
    $message_sent = 0;

    if ($form_sub == 1) {
      if ((empty($form_name)) || (empty($form_message))) {
        $response = $missing_content;
      }
      else {
        if(!filter_var($form_email, FILTER_VALIDATE_EMAIL)) {
          $response = $email_invalid;
        }
        else {
          if ($message_human == 2) {
            ?>
            <div>
              <?php 
              $message_sent = 1;
              send_email($form_email, $form_name, $form_message);
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
    if ($message_sent != 1) {
    ?>
      <section class="page_header page_header--contact">
        <h1 class="page_title">
          Let's talk !
        </h1>
        <p class="page_summary page_summary--contact">
          Want to talk about you next project, or maybe just to ask a question? Please fill out the contact form below.
        </p>
      </section>

      <section class="content content--contact">

        <div class="contact_form">
          <form action="<?php the_permalink(); ?>" method="post">
            <?php if ($response !== '') echo generate_response('error', $response); ?>
            <p>
              <label for="form_name">
                Name<span> *</span>
              </label>
              <input
                class="required"
                minlength="3"
                type="text"
                name="form_name"
                id="form_name"
                value="<?php echo $form_name; ?>"
              />
            </p>
            <p>
              <label for="form_email">
                Email<span> *</span>
              </label>
              <input
                class="required"
                type="email"
                name="form_email"
                id="form_email"
                value="<?php echo $form_email; ?>"
              />
            </p>        
            <p>
              <label for="form_message">
                Message<span> *</span>
              </label>
              <textarea
                class="required"
                minlength="5"
                name="form_message"
                id="form_message"
              ><?php echo $form_message; ?></textarea>
            </p>
            <p>
              <label for="message_human">
                Robot check<span> *</span>
              </label>
              <input
                class="required"
                type="text"
                name="message_human"
                id="message_human"
              />
              <span id="human_op">+ 3 = <strong>5</strong></span>
            </p>
            <input
              type="submit"
              class="button"
              value="Send"
            />
            <input
              type="hidden"
              name="form_sub"
              value="1"
            />
          </form>
        </div>

        <div class="contact_sidebar">
          <p>
            I am best contacted by email. If you have a general enquiry, please include as much detail as possible in the message field.
          </p>
          <p>
            Alternatively, you can shoot me an email to <a href="mailto:fabpallaud@gmail.com">fabpallaud@gmail.com</a>. 
          </p>
        </div>

      </section>
    <?php
    }
    ?>
    
  </div>
</div>

<?php get_footer(); ?>
<?php
/**
 * Template Name: Homepage
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MVPWP
 */

if(isset($_POST['submitted'])) {
    if(trim($_POST['contactName']) === '') {
        $nameError = true;
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }

    if(trim($_POST['email']) === '')  {
        $emailError = true;
        $hasError = true;
    } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
        $emailError = true;
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }

    if(trim($_POST['comments']) === '') {
        $commentError = true;
        $hasError = true;
    } else {
        if(function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }


    if(!isset($hasError)) {
        $emailTo = get_option('admin_email');
        if (!isset($emailTo) || ($emailTo == '') ){
            $emailTo = get_option('admin_email');
        }
        $subject = __('From ','mvpwp').$name;
        $body = __('Name: ','mvpwp').$name."\n".__('Email: ','mvpwp').$email."\n".__('Comments: ','mvpwp').$comments;
        $headers = __('From: ','mvpwp') .$name. ' <'.$emailTo.'>' . "\r\n" . __('Reply-To:','mvpwp') .$name. '<'.$email.'>';

        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }

}

get_header(); ?>

<?php get_template_part( 'template-parts/home', 'banner' ); ?>


<div class="main main-raised">
    <div class="section text-center section-landing">

      <?php 

        /* Show/Hide CTA */
        if ( get_theme_mod( 'cta_switch', true ) == true ) {
          get_template_part( 'template-parts/home', 'cta' ); 
        }

        /* Show/Hide Features */
        if ( get_theme_mod( 'features_switch', true ) == true ) {
          get_template_part( 'template-parts/home', 'features' ); 
        } ?>

    </div>


  <?php 
    /* Show/Hide Contact */
    if ( get_theme_mod( 'contact_switch', true ) == true ) : ?>
    <!-- Contact Form Section -->
      <div class="section landing-section">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

            <?php $contact_text = get_theme_mod( 'contact_text', '' ); ?>
                <?php if ($contact_text) : ?>

                <?php echo $contact_text; ?>
                 
                <?php endif; ?>

                 <?php if(isset($emailSent) && $emailSent == true) { ?>
                      <div class="alert alert-success" role="alert">
                          <p><?php _e('Thanks, your email was sent successfully.', 'mvpwp'); ?></p>
                      </div>

                      <?php } else { ?>

                        <?php if(isset($hasError) || isset($captchaError)) { ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong><?php _e('Error!', 'mvpwp'); ?></strong> <?php _e('Please try again.', 'mvpwp'); ?>
                            </div>
                        <?php } ?>

                      <form class="contact-form" action="<?php the_permalink(); ?>#contactForm" id="contactForm" method="post">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group label-floating <?php if(isset($nameError)) { echo "has-error has-feedback"; }?>">
                                <label class="control-label" for="contactName"><?php _e('Name', 'mvpwp'); ?></label>
                                <input class="form-control" type="text" name="contactName" id="contactName" value="" />
                            </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group label-floating <?php if(isset($emailError)) { echo "has-error has-feedback"; }?>">
                                  <label class="control-label" for="email"><?php _e('Email', 'mvpwp'); ?></label>
                                  <input  class="form-control" type="text" name="email" id="email" value="" />
                             </div>
                          </div>
                        </div>
                              <div class="form-group label-floating <?php if(isset($commentError)) { echo "has-error has-feedback"; }?>">
                                  <label class="control-label" for="commentsText"><?php _e('Message', 'mvpwp'); ?></label>
                                  <textarea class="form-control" name="comments" id="commentsText" rows="10" cols="20"></textarea>
                             </div>
                             <div class="row">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                  <button type="submit" class="btn btn-primary btn-raised"><?php _e('Send Message', 'mvpwp'); ?></button>
                                  <input type="hidden" name="submitted" id="submitted" value="true" />
                                </div>
                             </div>
                      </form>


                    <?php } ?>

                  </div>
                </div>
      </div> <!--contact form section -->

  <?php endif; ?>


</div> <!--main main-raised-->



<?php get_footer();

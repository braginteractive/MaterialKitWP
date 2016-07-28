<?php
/**
 * Template part for displaying CTA.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MVPWP
 */
?>


<!-- Wrapper for cta-->
    <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <?php $cta = get_theme_mod( 'cta_text', '' );

      if ($cta) : ?>

      <?php echo $cta; ?>
       
      <?php endif; ?>

     </div> <!-- col -->
    </div> <!-- .row -->
 

 



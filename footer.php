<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MVPWP
 */

?>

  	</div><!-- #content -->
  
  <footer class="footer footer-transparent">
    <div class="container">

     <?php
        $args = array(
          'theme_location' => 'footer',
          'container' => 'nav',
          'container_class' => 'pull-left'
          );
        if (has_nav_menu('footer')) {
          wp_nav_menu($args);
        }
      ?>

        <div class="social-area pull-right">

          <?php $footer_social = get_theme_mod( 'footer_social', '' );

            if (count($footer_social) > '0' ) : 
              foreach ($footer_social as $social) : 
                $social_icon = "{$social['social_icon']}"; 
                $social_url = "{$social['social_url']}";
                
              ?>

              <?php if ($social_icon != '') : ?>
                <a target="_blank" class="btn btn-social btn-just-icon" href="<?php echo $social_url; ?>">
                    <i class="fa fa-<?php echo $social_icon; ?>"></i>
                </a>
              <?php endif; ?>

             <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <div class="copyright">

        <?php $copyright_text = get_theme_mod( 'copyright_text', '' ); 
          if ($copyright_text != '') {
            echo $copyright_text;
          } else {
            printf( esc_html__( 'Theme: %1$s by %2$s.', 'mvpwp' ), 'mvpwp', '<a href="http://braginteractive.com" rel="designer">Brad Williams</a>' );
          }
         ?>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * Template part for displaying features.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MVPWP
 */
?>


<!-- Wrapper for features -->
<div class="features">
  <div class="container">
    <div class="row">

      <?php $features = get_theme_mod( 'homepage_features', '' );

      if (count($features) > '0' ) : 
        $count = 0;
        foreach ($features as $feature) : 
          $feature_icon = "{$feature['feature_icon']}"; 
          $feature_text = "{$feature['feature_text']}";
          $feature_color = "{$feature['feature_icon_color']}";
        ?>

          <div class="col-md-4">
            <div class="info">

            <?php if ($feature_icon != '') : ?>
                  <div class="icon icon-<?php echo $feature_color; ?>">
                    <i class="material-icons"><?php echo $feature_icon; ?></i>
                  </div>
              <?php endif; ?>

              <?php if ($feature_text != '') : ?>
                <?php echo $feature_text; ?>
              <?php endif; ?>
            </div>
          </div>

          <?php 
            $count++;
            if ($count % 3 == 0) {
              echo '</div><!-- row --><div class="row">';
           } ?>
         

       <?php endforeach; ?>
      <?php endif; ?>

    </div> <!-- .row -->
  </div> <!-- container -->
</div> <!-- homepage-features -->

 



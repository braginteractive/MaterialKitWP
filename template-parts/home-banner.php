<?php
/**
 * Template part for displaying banner text.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MVPWP
 */
?>

 
<?php $banner_text = get_theme_mod( 'banner_text', '' );
$banner_img = get_theme_mod( 'banner_img', '' ); 
  
?>
 <div class="header header-filter" style="background-image: url('<?php echo $banner_img;?>');">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <?php if ($banner_text) : ?>

            <?php echo $banner_text; ?>
             
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

 



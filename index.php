<?php
/**
 * The main template file.
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

get_header(); ?>

<?php $blog_text = get_theme_mod( 'blog_text', '' );
$blog_img = get_theme_mod( 'blog_img', '' ); 
  
?>
 <div class="header header-filter" style="background-image: url('<?php echo $blog_img;?>');">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php if ($blog_text) : ?>

            <?php echo $blog_text; ?>
             
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

<div class="main main-raised">
    <div class="section">

  <div class="container">
    <div id="content" class="row">
    	<div id="primary" class="col-md-8 col-md-offset-2">
    		<main id="main" class="site-main" role="main">

    		<?php
    		if ( have_posts() ) :

    			if ( is_home() && ! is_front_page() ) : ?>
    				<header>
    					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
    				</header>

    			<?php endif; ?> 
          
          <?php
    			/* Start the Loop */
    			while ( have_posts() ) : the_post();

    				/*
    				 * Include the Post-Format-specific template for the content.
    				 * If you want to override this in a child theme, then include a file
    				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
    				 */
    				get_template_part( 'template-parts/content', 'get_post_format()' ); 

    			endwhile; ?>  

        <?php 
    			the_posts_navigation();

    		else :

    			get_template_part( 'template-parts/content', 'none' );

    		endif; ?>

    		</main><!-- #main -->
    	</div><!-- #primary -->

      </div>
      </div>
      </div>
      </div>

  <?php
  get_footer();

<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MVPWP
 */

get_header(); ?>

<div class="header header-filter" style="background-image: url('<?php echo $image[0];?>');">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          
          <?php
                the_archive_title( '<h1 class="title text-center">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
              ?>
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
      		if ( have_posts() ) : ?>

      			<?php
      			/* Start the Loop */
      			while ( have_posts() ) : the_post();

      				/*
      				 * Include the Post-Format-specific template for the content.
      				 * If you want to override this in a child theme, then include a file
      				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
      				 */
      				get_template_part( 'template-parts/content', get_post_format() );

      			endwhile;

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

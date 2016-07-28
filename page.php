<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MVPWP
 */

get_header(); ?>

<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>

<div class="header header-filter" style="background-image: url('<?php echo $image[0];?>');">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <?php the_title( '<h1 class="title text-center">', '</h1>' ); ?>
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
      			while ( have_posts() ) : the_post();

      				get_template_part( 'template-parts/content', 'page' );

      				// If comments are open or we have at least one comment, load up the comment template.
      				if ( comments_open() || get_comments_number() ) :
      					comments_template();
      				endif;

      			endwhile; // End of the loop.
      			?>

      		</main><!-- #main -->
      	</div><!-- #primary -->

      </div> <!-- row -->
    </div>
  </div>
</div>


<?php
get_footer();

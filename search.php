<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package MVPWP
 */

get_header(); ?>

<div class="header header-filter" style="background-image: url('<?php echo $image[0];?>');">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h1 class="title text-center"><?php printf( esc_html__( 'Search Results for: %s', 'mvpwp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </div>
    </div>
  </div>
</div>

<div class="main main-raised">
  <div class="section">

    <div class="container">
      <div id="content" class="row">

      	<section id="primary" class="col-md-8 col-md-offset-2">
      		<main id="main" class="site-main" role="main">

      		<?php
      		if ( have_posts() ) : ?>

      			<?php
      			/* Start the Loop */
      			while ( have_posts() ) : the_post();

      				/**
      				 * Run the loop for the search to output the results.
      				 * If you want to overload this in a child theme then include a file
      				 * called content-search.php and that will be used instead.
      				 */
      				get_template_part( 'template-parts/content', 'search' );

      			endwhile;

      			the_posts_navigation();

      		else :

      			get_template_part( 'template-parts/content', 'none' );

      		endif; ?>

      		</main><!-- #main -->
      	</section><!-- #primary -->
      </div>
    </div>
  </div>
</div>

<?php
get_footer();

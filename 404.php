<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MVPWP
 */

get_header(); ?>

<div class="header header-filter" style="background-image: url('<?php echo $image[0];?>');">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h1 class="title text-center"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mvpwp' ); ?></h1>
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

      			<section class="error-404 not-found">

      				<div class="page-content">
      					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'mvpwp' ); ?></p>

      					<?php
      						get_search_form();

      						the_widget( 'WP_Widget_Recent_Posts' );

      						// Only show the widget if site has multiple categories.
      						if ( mvpwp_categorized_blog() ) :
      					?>

      					<div class="widget widget_categories">
      						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'mvpwp' ); ?></h2>
      						<ul>
      						<?php
      							wp_list_categories( array(
      								'orderby'    => 'count',
      								'order'      => 'DESC',
      								'show_count' => 1,
      								'title_li'   => '',
      								'number'     => 10,
      							) );
      						?>
      						</ul>
      					</div><!-- .widget -->

      					<?php
      						endif;

      						/* translators: %1$s: smiley */
      						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'mvpwp' ), convert_smilies( ':)' ) ) . '</p>';
      						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

      						the_widget( 'WP_Widget_Tag_Cloud' );
      					?>

      				</div><!-- .page-content -->
      			</section><!-- .error-404 -->

      		</main><!-- #main -->
      	</div><!-- #primary -->
      </div>
    </div>
  </div>
</div>

<?php
get_footer();

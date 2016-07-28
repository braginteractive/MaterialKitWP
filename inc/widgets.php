<?php
/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mvpwp_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'mvpwp' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'mvpwp' ),
    'before_widget' => '<section id="%1$s" class="widget panel panel-default %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<div class="panel-heading"><h3 class="widget-title panel-title">',
    'after_title'   => '</h3></div>',
  ) );
}
add_action( 'widgets_init', 'mvpwp_widgets_init' );
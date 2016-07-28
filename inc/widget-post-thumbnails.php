<?php
/**
 * Recent Posts Widget with Thumbnails
 * @package Plain WordPress Theme
 * @since 1.0
 * @author mvpwp Interactive
 */

class mvpwp_posts_thumb_widget extends WP_Widget {
  /** constructor */
  function __construct() {
    parent::__construct(false, 
      $name = __('Standard Posts w/ Thumbs','mvpwp'), 
      array( 'description' => __( 'Display a list of recent standard posts with featured thumbnails.', 'mvpwp' ) ) 
      );
  }

  /** @see WP_Widget::widget */
  function widget($args, $instance) {   
    extract( $args );
    $title = apply_filters('widget_title', $instance['title']);
    $category = apply_filters('widget_title', $instance['category']);
    $number = apply_filters('widget_title', $instance['number']);
    $offset = apply_filters('widget_title', $instance['offset']); ?>
    <?php echo $before_widget; ?>

    <?php if ( $title )
    echo $before_title . $title . $after_title; ?>
    <ul class="mvpwp-widget-recent-posts list-unstyled clearfix">

      <?php
      global $post;
      $tmp_post = $post;
      $args = array(
        'post_type' => 'post',
        'numberposts' => $number,
        'offset'=> $offset,
        'category' => $category
        );
      $myposts = get_posts( $args );
      foreach( $myposts as $post ) : setup_postdata($post); ?>
      
          <li>
          <?php if( has_post_thumbnail() ) {  ?>
             <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="title"><?php the_post_thumbnail('thumbnail', array('class' => 'img-rounded')); ?></a>
             <?php } ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
          </li>

        <?php endforeach;
      wp_reset_postdata();
      $post = $tmp_post; ?>
    </ul>

    <?php echo $after_widget; ?>
    <?php
  }

  /** @see WP_Widget::update */
  function update($new_instance, $old_instance) {       
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['category'] = strip_tags($new_instance['category']);
    $instance['number'] = strip_tags($new_instance['number']);
    $instance['offset'] = strip_tags($new_instance['offset']);
    return $instance;
  }

  /** @see WP_Widget::form */
  function form($instance) {  
    $instance = wp_parse_args( (array) $instance, array(
      'title' => __('Featured Posts','mvpwp'),
      'category' => '',
      'number' => '5',
      'offset'=> '0'
      ));         
    $title = esc_attr($instance['title']);
    $category = esc_attr($instance['category']);
    $number = esc_attr($instance['number']);
    $offset = esc_attr($instance['offset']); ?>

    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'mvpwp'); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title','mvpwp'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Select a Category:', 'mvpwp'); ?></label>
      <br />
      <select class='att-select' name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>">
        <option value="all-cats" <?php if($category == 'all-cats') { ?>selected="selected"<?php } ?>><?php _e('All', 'mvpwp'); ?></option>
        <?php
            //get terms
        $cat_terms = get_terms('category', array( 'hide_empty' => '1' ) );
        foreach ( $cat_terms as $cat_term) { ?>
          <option value="<?php echo $cat_term->term_id; ?>" id="<?php echo $cat_term->term_id; ?>" <?php if($category == $cat_term->term_id) { ?>selected="selected"<?php } ?>><?php echo $cat_term->name; ?></option>
          <?php } ?>
        </select>
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number to Show:', 'mvpwp'); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Offset (the number of posts to skip):', 'mvpwp'); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="text" value="<?php echo $offset; ?>" />
      </p>
      <?php
    }


} // class mvpwp_posts_thumb_widget

// Register and load the widget
function mvpwp_load_widget() {
  register_widget( 'mvpwp_posts_thumb_widget' );
}
add_action( 'widgets_init', 'mvpwp_load_widget' );
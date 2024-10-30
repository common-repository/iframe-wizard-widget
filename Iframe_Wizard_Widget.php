<?php
/*
Plugin Name: Iframe Wizard Widget
Plugin URI:
Description: Iframe Widget, responsive and easy to use.
Version: 1.0
Author: Kevin Dias
Author URI:
*/




class ITCRssWidget extends WP_Widget {


   function ITCRssWidget() {
        parent::WP_Widget( false, $name = 'Iframe Wizard Widget' );
   }



   function widget( $args, $instance ) {


   extract($args, EXTR_SKIP);
 
   echo $before_widget;
 
   $GLOBALS['title'] = $title;
   $GLOBALS['height'] = $height;
   $GLOBALS['width'] = $width;
   $GLOBALS['width'] = $width;


   $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
   $height = empty($instance['height']) ? ' ' : apply_filters('widget_title', $instance['height']);
   $width = empty($instance['width']) ? ' ' : apply_filters('widget_title', $instance['width']);


    if (!empty($title))
    echo $before_title . $after_title;;        
    echo $after_widget;
    echo '<iframe 
    src="'.$title.'"  
    height="'.$height.'" 
    width="'.$width.'"  class="frame" style=" border: solid 1px #C0C0C0;"  
    </iframe>';
    
    }

   function form($instance){  
   
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $instance = wp_parse_args( (array) $instance, array( 'height' => '' ) );
    $instance = wp_parse_args( (array) $instance, array( 'width' => '' ) );  
  
    $title = $instance['title'];
    $width = $instance['width'];
    $height = $instance['height'];


    
  ?>

 	 <p><label for="<?php echo $this->get_field_id('title'); ?>">Url: Some urls may be blocked for Iframes <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?> " type="text" value="<?php echo attribute_escape($title); ?>"/></label></p>

  	<p>
  	<label for="<?php echo $this->get_field_id('height'); ?>">Height: px, % or auto <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?> " type="text" value="<?php echo attribute_escape($height); ?>"/></label></p>

  	<p><label for="<?php echo $this->get_field_id('height'); ?>">Width: px, % or auto 
    <input class="widefat" 
   id="<?php echo $this->get_field_id('width'); ?>" 
   name="<?php echo $this->get_field_name('width'); ?> " 
   type="text" value="<?php echo attribute_escape($width); ?>"/></label></p>

  <?php
    }

    }

    function update( $instance, $old_instance ) {
      $instance = $old_instance;
      $instance['title'] = $new_instance['title'];
      $instance['height'] = $new_instance1['height'];
      $instance['width'] = $new_instance2['width'];
      return $instance;  
    }


    add_action( 'widgets_init', 'ITCRssWidgetInit' );
    
    function ITCRssWidgetInit() {
    register_widget( 'ITCRssWidget' );
    
    }


?>

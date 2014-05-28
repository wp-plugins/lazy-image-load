<?php 
/*
Plugin Name: Lazy Load Image
Plugin URI: http://pashabd.com/plugins/lazy-image-load/
Description: This plugin will enable images load when it is in  the viewport of your wordpress theme. Your wordpress website will not load all images (if it has many images). When the images come in the viewport (the part of the webpage that the user can currently see), then the image will load. It will save your time and data!!! 
Author: Pashabd
Version: 1.0
Author URI: http://pashabd.com
*/

function lazy_image_load_plugin_main_js() {
    wp_enqueue_script( 'lazy-news-js', plugins_url( '/js/jquery.lazyload.js', __FILE__ ), array('jquery'), 1.0, false);
  
}

add_action('init','lazy_image_load_plugin_main_js');


function lazy_image_load_active () {?>
			<script type="text/javascript">

			jQuery(document).ready(function(){ 
				 jQuery("img").addClass("lazy"); 
					jQuery("img").each(function() {
					jQuery(this).attr("data-src",jQuery(this).attr("src"));
					jQuery(this).removeAttr("src");
					});

			});
			

			</script>
			<script type="text/javascript">

			jQuery(function() {
				jQuery("img.lazy").lazyload({
				data_attribute  : "src",
				 skip_invisible : false,
				 effect : "fadeIn"
				});
			});

			</script>
<?php
}
add_action('wp_head','lazy_image_load_active');




?>
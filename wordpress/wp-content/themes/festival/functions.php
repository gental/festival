<?php

function load_slideshow_script() {
if (is_home() || is_front_page()) {
	wp_enqueue_script('slideshow', get_stylesheet_directory_uri() . '/js/slideshow.js', array('jquery'));
	//wp_enqueue_script('init_slideshow', get_template_stylesheet_uri(). '/js/init_slideshow.js', array('slideshow'));
	wp_enqueue_script('init_slideshow', get_stylesheet_directory_uri() . '/js/init_slideshow.js', array('slideshow'));
	}
}
add_action('get_header', 'load_slideshow_script');



// récupère les images à la une
function getSlideItem(){
    $args = array(
        'post_type' => 'post',
        'meta_value_num' => 0,
        'post_parent' => $post->ID,
        'meta_key' => '_thumbnail_id'
        );

$attachments = get_posts($args);
    if ($attachments) {
        foreach ($attachments as $attachment) {
            echo "<li>";
            echo wp_get_attachment_link(get_post_thumbnail_id($attachment->ID),'large');
            echo "</li>";
        } //fin foreach
    } // fin if
} //fin fonction getSlideItem


?>


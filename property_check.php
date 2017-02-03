<?php

//
// if ( defined( 'ABSPATH' ) && ! defined( 'RWMB_VER' ) ) {
// 	require_once dirname( __FILE__ ) . '/inc/loader.php';
// 	$loader = new RWMB_Loader;
// 	$loader->init();
// }

function create_property_post(){
  $args = array(
    'public' => True,
    'label' => 'Property Manager',
    'supports' => array
    ('')
  );

register_post_type('property_check', $args);
}

add_action('init','create_property_post');


 ?>

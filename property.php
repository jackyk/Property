<?php
/*Plugin Name: Property
*Plugin URI: https://github.com/jackyk/Property
*GitHub Plugin URI: https://github.com/jackyk/Property
*Description: Check for properties and develop or buy.
*Version: 0.0.1
*/


require (plugin_dir_path(__FILE__).'ext/meta-box/meta-box.php');

function create_property_post(){
  $args = array(
    'public' => True,
    'label' => 'Property Manager',
    'supports' => array
    ('',
    'title'),
  );

register_post_type('property_check', $args);
}

add_action('init','create_property_post');


add_filter( 'rwmb_meta_boxes', 'your_prefix_meta_boxes' );
function your_prefix_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Property Manager', 'textdomain' ),
        'post_types' => 'property_check',
        'fields'     => array(
            array(
                'id'   => 'property_name',
                'name' => __( 'Property Name', 'textdomain' ),
                'type' => 'text',
                'placeholder' =>('Add new'),
            ),
            array(
                'id'      => 'property status',
                'name'    => __( 'Property Status ', 'textdomain' ),
                'type'    => 'select',
                'placeholder' =>('Choose'),
                'options' => array(
                    'Label1' => __( 'Developed', 'textdomain' ),
                    'Label2' => __( 'Not Developed', 'textdomain' ),
                ),
            ),
            array(
                'id'   => 'size',
                'name' => __( 'Size actual Acres', 'textdomain' ),
                'type' => 'text',
                'placeholder' =>('Enter number'),
                'clone'  =>true,
            ),

        ),
    );
    return $meta_boxes;
}


 ?>

<?php
/*Plugin Name: Property
*Plugin URI: https://github.com/jackyk/Property
*GitHub Plugin URI: https://github.com/jackyk/Property
*Description: Check for properties and develop or buy.
*Version: 0.0.1
*/


require (plugin_dir_path(__FILE__).'ext/meta-box/meta-box.php');
require_once (plugin_dir_path(__FILE__).'property_check.php');

function pwp_create_property_post(){
  $args = array(
    'public' => True,
    'label' => 'Property Manager',
    'supports' => array
    ('',
    'title'),
  );
register_post_type('property_check', $args);
}


function pwp_property_owner(){
  $args = array(
    'public' => True,
    'label' => 'Property Owner',
    'supports' => array
    ('',
    'title'),
  );
register_post_type('property_owner', $args);
}

function pwp_property_post_meta( $meta_boxes ) {
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

function pwp_property_owner_meta(){
  $prefix = 'owner';
  $meta_boxes[] = array(
    'title' => __('Property Owner', $prefix),
    'post_types' => 'property_owner',
    'fields' => array(
      array(
        'name' =>__('Users',$prefix),
        'id'   => $prefix.'users',
        'type' => 'user',
        'placehoder' => 'select user',
      ),
      array(
        'name' =>__('Property',$prefix),
        'id'   => $prefix.'property_check',
        'type' => 'post',
        'post_types' => 'property_check',
        'placehoder' => 'select property',
      ),
    ),
  );
  return $meta_boxes;
}

function pwp_owner(){
  $singular = 'Owner';
  $plural   = 'Owners';

  $labels = array(
    'name' => $singular,
    'edit_item' => 'Edit'.$singular,
    'menu_name' => $plural,
  );

    $args = array(
      'hierarchical' => true,
      'labels'   =>$labels,
      'show_ui' =>true,
      'show_admin_column'=> true,
      'update_count_callback'=>'_update_post_term_count',
      'query_var' =>true,
      'rewrite' =>array(
        'slug'  =>'property_owner'
      ),
    );
  register_taxonomy('owner', 'property_check', $args);
}




add_filter( 'rwmb_meta_boxes', 'pwp_property_post_meta' );
add_filter( 'rwmb_meta_boxes', 'pwp_property_owner_meta' );


add_action('init', 'pwp_owner');
add_action('init','pwp_create_property_post');
add_action('init', 'pwp_property_owner');

 ?>

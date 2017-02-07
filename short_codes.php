<?php

function pwp_property_listing($atts, $content = null){
  $atts = shortcode_atts(
    array(
      'title' => 'All existing properties'
    ), $atts
  );
}
add_shortcode('property_lsit', 'pwp_property_listing');


 ?>

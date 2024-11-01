<?php
/* 

Plugin Name: SiteMessages

Description: Plugin add and display field in appearance 

Version: 1.0 

Author: Arcs

Author URI: http://www.arcscorp.com/

License: 

Text Domain: Arcs

*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action('customize_register', 'smsg_second_tagline');

function smsg_second_tagline($wp_customize) {

 $wp_customize->add_setting( 'second_tagline', array(
 'default' => '',
 'capability' => 'edit_theme_options'
 ) );

 $wp_customize->add_control( 'second_tagline', array(
 'label' => 'Second Tagline',
 'section' => 'title_tagline',
 'type' => 'text'
 ) );
	 $wp_customize->add_setting( 'start_second_tagline', array(
 'default' => '',
 'capability' => 'edit_theme_options'
 ) );
	 $wp_customize->add_control( 'start_second_tagline', array(
 'label' => 'Start Date',
 'section' => 'title_tagline',
 'type' => 'date'
 ) );	
	 $wp_customize->add_setting( 'end_second_tagline', array(
 'default' => '',
 'capability' => 'edit_theme_options'
 ) );

 $wp_customize->add_control( 'end_second_tagline', array(
 'label' => 'Expire Date',
 'section' => 'title_tagline',
 'type' => 'date'
 ) );	
}



function smsg_demo_shortcode() { 
  
// Things that you want to do.

	$messagestart =  get_theme_mod('start_second_tagline');
	$messageend =  get_theme_mod('end_second_tagline');
	$messagetoday =  date("Y-m-d");
	$messagestartshow = date("m-d-Y", strtotime($messagestart)); 
	
	if($messagetoday == $messagestart){
		
		$message =  get_theme_mod('second_tagline');
	}
	elseif($messagetoday < $messagestart){
		$message = "Message will be visible on &nbsp;".$messagestartshow;
	}
	elseif($messageend < $messagetoday){
		$message = "Time Expired";
	}
// Output needs to be return
return $message;
}
// register shortcode
add_shortcode('pluginoutput', 'smsg_demo_shortcode');
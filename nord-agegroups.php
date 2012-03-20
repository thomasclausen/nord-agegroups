<?php
/*
Plugin Name: NORD - agegroups
Description: Shows which ages bellongs in which groups.
Version: 0.1
License: GPLv2
Author: Thomas Clausen
Author URI: http://www.thomasclausen.dk/wordpress/
*/

// Custom callback to get current agegroups
function nord_agegroup( $atts ) {
	extract( shortcode_atts( array(
		'group' => '',
		'gender' => ''
	), $atts ) );
	
	if ( $gender == 'male') {
		$genderfactor = 2;
		$gender_name = __( 'Drenge: ', 'nord_agegroups' );
	} else {
		$genderfactor = 0;
		$gender_name = __( 'Piger: ', 'nord_agegroups' );
	}
	if ( gmdate( 'm' ) >= '9' and gmdate( 'm' ) <= '12' ) {
		$yearfactor = 1;
	} else {
		$yearfactor = 0;
	}
	
	if ( $group == 'aargang2' ) :
		$date_from = gmdate( 'Y', mktime( 0, 0, 0, 8, 31, gmdate( 'Y' )+$yearfactor-12-$genderfactor ) );
		$date_to = __( 'yngre', 'nord_agegroups' );
		
		return $gender_name . $date_from . __( ' og ' , 'nord_agegroups' ) . $date_to;
	elseif ( $group == 'aargang1' ) :
		$date_from = gmdate( 'Y', mktime( 0, 0, 0, 8, 31, gmdate( 'Y' )+$yearfactor-14-$genderfactor ) );
		$date_to = gmdate( 'Y', mktime( 0, 0, 0, 8, 31, gmdate( 'Y' )+$yearfactor-13-$genderfactor ) );
		
		return $gender_name . $date_from . __( ' og ' , 'nord_agegroups' ) . $date_to;
	elseif ( $group == 'junior' ) :
		$date_from = gmdate( 'Y', mktime( 0, 0, 0, 8, 31, gmdate( 'Y' )+$yearfactor-16-$genderfactor ) );
		$date_to = gmdate( 'Y', mktime( 0, 0, 0, 8, 31, gmdate( 'Y' )+$yearfactor-15-$genderfactor ) );
		
		return $gender_name . $date_from . __( ' og ' , 'nord_agegroups' ) . $date_to;
	elseif ( $group == 'senior' ) :
		$date_from = gmdate( 'Y', mktime( 0, 0, 0, 8, 31, gmdate( 'Y' )+$yearfactor-17-$genderfactor ) );
		$date_to = __( '&aelig;ldre', 'nord_agegroups' );
		
		return $gender_name . $date_from . __( ' og ' , 'nord_agegroups' ) . $date_to;
	else :
		return '';
	endif;
}
add_shortcode( 'agegroup', 'nord_agegroup' );

// Custom callback to get current group year
function nord_group_year( $atts ) {
	extract( shortcode_atts( array(), $atts ) );
	
	if ( gmdate( 'm' ) >= '9' and gmdate( 'm' ) <= '12' ) {
		$yearfactor = 1;
	} else {
		$yearfactor = 0;
	}
	
	return gmdate( 'Y' )+$yearfactor;
}
add_shortcode( 'group_year', 'nord_group_year' ); ?>
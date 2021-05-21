<?php

//Make fields readonly
/*
 * Zoom personales: fld_5370249 fld_9344726 fld_7931697
 */

add_filter( 'caldera_forms_field_attributes', function( $attrs, $field ) {
	if( 'fld_415804' == $field['ID'] || 'fld_9901443' == $field['ID'] || 'fld_415804' == $field['ID'] || 'fld_9901443' == $field['ID'] || 'fld_35998' == $field['ID'] || 'fld_8020720' == $field['ID'] || 'fld_9344726' == $field['ID'] || 'fld_4151071' == $field['ID'] || 'fld_5370249' == $field['ID'] || 'fld_9344726' == $field['ID'] || 'fld_7931697' == $field['ID'] ) {
		$attrs['readonly'] = 'readonly';
	}
	return $attrs;
}, 20, 3);
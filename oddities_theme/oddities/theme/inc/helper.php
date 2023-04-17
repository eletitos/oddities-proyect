<?php


function oddities_sanitize_text($input){
	$input = sanitize_text_field( $input );
	return $input;
  }

// Check if a string is a number
function oddities_is_number($string){
	return preg_match('/^[0-9]+$/', $string);
}

// Sanitize a String-number
function oddities_sanitize_number($input){
	$input = oddities_sanitize_text($input);
	if(!oddities_is_number($input)){
		$input='';
	}
	return $input;
}

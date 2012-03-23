<?php
/*
Plugin Name: Replace icelandic.
Description: Replaces icelandic characters from filenames when uploading. This prevents broken urls.
Version: 1.0
Author: Vilhjalmur Valgeirsson
Author URI: http://www.valgeirsson.is
*/
	function replace_icelandic($str) {
		$icelandic = array("á", "Á", "ð", "é", "É", "í", "Í", "ó", "Ó", "ú", "Ú", "ý", "Ý", "þ", "Þ", "æ", "Æ", "ö", "Ö");
		$replacement = array("a", "A", "d", "e", "E", "i", "I", "o", "O", "u", "U", "y", "Y", "th", "TH", "ae", "AE", "o", "O");
	
		return str_replace($icelandic, $replacement, $str);
	}
	function nonicelandic_file_name( $file ) {
		$file['name'] = replace_icelandic(utf8_decode($file['name']));
		return $file;
	}
	add_filter( 'wp_handle_upload_prefilter', 'nonicelandic_file_name', 10 );
?>
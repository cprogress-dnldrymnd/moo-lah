<?php 
class Helpers {
	function clean_string($string, $type = '-') {
		return $string = strtolower(str_replace(' ', $type, $string)); 

		if($type == '_' ) {
			return preg_replace('/[^A-Za-z0-9\-_]/', '', $string); 
		} else {
			return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
		}
	}
	function convert_to_spaces($string) {
		return $string = strtolower(str_replace('-', ' ', $string)); 

		if($type == '_' ) {
			return preg_replace('/[^A-Za-z0-9\-_]/', '', $string); 
		} else {
			return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
		}
	}

	function marks_heading($value) {

		$svg = '<svg xmlns="https://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 779.89 288.52"><defs><style>.cls-1{fill:#01006c;}.cls-2{fill:#ff5003;}</style></defs><title>Trula</title><rect class="cls-1" x="485.92" width="60.52" height="284.27" rx="7.59"/><path class="cls-2" d="M457.77,87.49H412.29c-5,0-7.58,2.77-7.58,7.58V204.9c0,21.63-14.79,31.62-34,31.62s-33.84-10-33.84-31.62V95.07c0-4.81-2.59-7.58-7.58-7.58H284.13a7.55,7.55,0,0,0-7.55,7.56v114.1c0,47.89,33.83,77.85,94.11,77.85,60.46,0,94.67-30,94.67-77.85V95.07a7.59,7.59,0,0,0-7.59-7.58"/><path class="cls-1" d="M256.61,87.49a10.58,10.58,0,0,0-1.88.17A83.71,83.71,0,0,0,204.44,116c-4.62,5.55-8.32,4.07-8.32-2.78v-17a7.58,7.58,0,0,0-7.58-7.59H146.2c-5,0-7.58,2.78-7.58,7.59v134a7.69,7.69,0,0,1-7.7,7.69H113c-12.94,0-22-7.4-22-24.77V135.19c0-4.8,2.59-7.58,7.58-7.58h15.16a7.58,7.58,0,0,0,7.58-7.58v-25c0-4.81-2.59-7.58-7.58-7.58H98.55A7.58,7.58,0,0,1,91,79.91v-39c0-4.81-2.59-7.58-7.58-7.58H37.9c-5,0-7.58,2.77-7.58,7.58v39c0,5-2.77,7.58-7.58,7.58H7.58A7.58,7.58,0,0,0,0,95.07v25c0,5,2.77,7.58,7.58,7.58H22.74a7.58,7.58,0,0,1,7.58,7.58v84.69c0,40.67,24.59,63.42,66.2,63.42h45.16a10.86,10.86,0,0,0,2.52-.31,7.33,7.33,0,0,0,2,.31h45.3a7.59,7.59,0,0,0,7.58-7.58V195.45c0-34,19.16-49.15,55.66-51.17l1.88-.06a3.34,3.34,0,0,0,3.34-3.35v-50A3.34,3.34,0,0,0,256.61,87.49Z"/><path class="cls-1" d="M611.16,275.38q-21.46-13.14-34.24-36.65T564.15,186q0-29.25,12.77-52.66t34.24-36.64A87.25,87.25,0,0,1,657.8,83.46q31.28,0,52.38,18.32,3.89,3,5.92,3c2.09,0,3.15-1.54,3.15-4.63V96a6.81,6.81,0,0,1,7.58-7.59h45.35A6.81,6.81,0,0,1,779.76,96V276.86a6.81,6.81,0,0,1-7.58,7.59H726.46a6.82,6.82,0,0,1-7.59-7.59v-2.22a12.6,12.6,0,0,0-.92-5.28,2.86,2.86,0,0,0-2.59-1.94,4.66,4.66,0,0,0-3.15,1.66q-20.54,19.44-54.41,19.44A87.7,87.7,0,0,1,611.16,275.38Zm90.5-43.59a46.21,46.21,0,0,0,18.14-18.32q6.66-11.94,6.66-27.48T719.8,158.5a46.34,46.34,0,0,0-18.14-18.32,52,52,0,0,0-25.72-6.39,53.75,53.75,0,0,0-26.28,6.39,46.18,46.18,0,0,0-18.33,18.23q-6.66,11.85-6.66,27.58t6.66,27.57a46.05,46.05,0,0,0,18.33,18.23,53.75,53.75,0,0,0,26.28,6.39A52,52,0,0,0,701.66,231.79Z"/></svg>';

		$return = str_replace("?","<questionmark>?</questionmark>",$value);
		$return = str_replace(".</h2>","<span>.</span></h2>",$return);
		$return = str_replace(".</h3>","<span>.</span></h3>",$return);
		$return = str_replace("trula", $svg,$return);
		$return = str_replace("Trula", $svg,$return);
		return  str_replace("!","<exclamation>!</exclamation>",$return);
	}

	function marks($value) {
		$return = str_replace("?</h2>","<questionmark>?</questionmark></h2>",$value);
		$return = str_replace("?</h3>","<questionmark>?</questionmark></h3>",$return);
		$return = str_replace(".</h2>","<span>.</span></h2>",$return);
		$return = str_replace(".</h3>","<span>.</span></h3>",$return);
		$return = str_replace("!</h2>","<exclamation>!</exclamation></h2>",$return);
		return  str_replace("!</h3>","<exclamation>!</exclamation></h3>",$return);
	}
	
	function get_edit_url($url, $label = 'Edit') {
		if(current_user_can( 'administrator' )) {
			return '<a target="_blank" href="'.get_site_url().'/wp-admin/'.$url.'" class="edit-contents"> '.$label.' </a>';
		}
	}
}
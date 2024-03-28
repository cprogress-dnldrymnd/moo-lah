<?php 
function action_open_header() {
	echo '<header id="header" class="background-accent">';
}
add_action('open_header', 'action_open_header');

function action_close_header() {
	echo '</header>';
}

add_action('close_header', 'action_close_header');

function action_open_footer() {
	echo '<footer>';
}
add_action('open_footer', 'action_open_footer');

function action_close_footer() {
	echo '</footer>';
}

add_action('close_footer', 'action_close_footer');


//Disable Gutenberg
function disable_gutenberg() {
	$Theme_Options = new Theme_Options();
	if($Theme_Options->disable_gutenberg) {
		add_filter( 'use_block_editor_for_post', '__return_false' );
	}
}

add_action( 'init', 'disable_gutenberg' );
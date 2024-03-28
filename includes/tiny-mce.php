<?php 
add_action( 'after_setup_theme', 'gsf_theme_setup' );
function gsf_theme_setup() {
	add_action( 'init', 'gsf_buttons' );
}
/********* TinyMCE Buttons ***********/
function gsf_buttons() {
	if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
		return;
	}

	if ( get_user_option( 'rich_editing' ) !== 'true' ) {
		return;
	}

	add_filter( 'mce_external_plugins', 'gsf_add_buttons' );
	add_filter( 'mce_buttons_3', 'gsf_register_buttons' );
}

function gsf_add_buttons( $plugin_array ) {
	$plugin_array['gsf_button'] = get_template_directory_uri().'/admin/tiny-mce/tiny-mce.js';
	$plugin_array['accordion_sc'] = get_template_directory_uri().'/admin/tiny-mce/tiny-mce.js';
	return $plugin_array;
}

function gsf_register_buttons( $buttons ) {
	array_push( $buttons, 'gsf_button_sc', 'accordions_sc', 'styleselect' );
	return $buttons;
}

add_action ( 'after_wp_tiny_mce', 'gsf_tinymce_extra_vars' );

function gsf_tinymce_extra_vars() { ?>
	<script type="text/javascript">
		var tinyMCE_object = <?php echo json_encode(
			array(
				'button_name' => esc_html__('Button', 'mythemeslug'),
				'button_title' => esc_html__('Button Shortcode', 'mythemeslug'),
			)
		);
	?>;
</script>
<script type="text/javascript">
	var tinyMCE_objectAccordion = <?php echo json_encode(
		array(
			'accordion_name' => esc_html__('Accordion', 'mythemeslug'),
			'accordion_title' => esc_html__('Accordion Shortcode', 'mythemeslug'),
		)
	);
?>;
</script><?php
}

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {  

	$style_formats = array(  
		array(  
			'title' => 'Color Primary',  
			'block' => 'span',  
			'classes' => 'color-primary',
			'wrapper' => true,
		),  
		array(  
			'title' => 'Color Secondary',  
			'block' => 'span',  
			'classes' => 'color-secondary',
			'wrapper' => true,
		), 
		array(  
			'title' => 'Color Accent',  
			'block' => 'span',  
			'classes' => 'color-accent',
			'wrapper' => true,
		),  
		array(  
			'title' => 'Color White',  
			'block' => 'span',  
			'classes' => 'color-white',
			'wrapper' => true,
		),  
	);  
	$init_array['style_formats'] = json_encode( $style_formats );  

	return $init_array;  

} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

/*-----------------------------------------------------------------------------------*/
/* Tiny MCE Editor
/*-----------------------------------------------------------------------------------*/

function editor_styles() {
	add_editor_style( 'assets/stylesheets/editor/editor4.css' );
}
add_action( 'admin_init', 'editor_styles' );
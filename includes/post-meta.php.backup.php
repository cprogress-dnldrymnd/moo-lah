<?php
use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

class PostMeta {
	use GetData;
	function _field($type, $id, $label) {
		return Field::make( $type, $id, __( $label ) );
	}
	function _text($id, $label) {
		return Field::make( 'text', $id, __( $label ) );
	}
	function _number($id, $label) {
		return Field::make( 'text', $id, __( $label ) )->set_attribute('type', 'number');
	}
	function _textarea($id, $label) {
		return Field::make( 'textarea', $id, __( $label ) );
	}
	function _rich_text($id, $label) {
		return Field::make( 'rich_text', $id, __( $label ) );
	}
	function _file($id, $label) {
		return Field::make( 'file', $id, __( $label ) );
	}
	function _image($id = 'image', $label = 'Image') {
		return Field::make( 'image', $id, __( $label ) );
	}
	function _image_gallery($id='image_gallery', $label = 'Images') {
		return Field::make( 'media_gallery', $id, __( $label ) )
		->set_type( array( 'image') );
	}
	function _complex($id, $label, $layout='tabbed-vertical') {
		return Field::make( 'complex', $id, __( $label ) )
		->set_layout( $layout );
	}
	function _checkbox($id, $label) {
		return Field::make( 'checkbox', $id, __( $label ) );
	}
	function _button($id) {
		return array(
			Field::make( 'select', $id.'_link_type', __( 'Link Type' ) )
			->set_options(array(
				'' => 'None',
				'page_link' => 'Page',
				'post_link' => 'Post',
				'service_link' => 'Service',
				'custom_link' => 'Custom',
			))
			->set_width(25),
			Field::make( 'text', $id.'_link_text', __( 'Link Text' ) )
			->set_width(25),
			Field::make( 'select', $id.'_page_link', __( 'Page Link' ) )
			->set_options($this->get_post_type_list('page'))
			->set_width(25)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => 'page_link', 
				)
			)),

			Field::make( 'select', $id.'_post_link', __( 'Post Link' ) )
			->set_options($this->get_post_type_list('post'))
			->set_width(25)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => 'post_link', 
				)
			)),
			Field::make( 'select', $id.'_service_link', __( 'Service Link' ) )
			->set_options($this->get_post_type_list('services'))
			->set_width(25)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => 'service_link', 
				)
			)),

			Field::make( 'text', $id.'_custom_link', __( 'Custom Link' ) )
			->set_width(25)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => 'custom_link', 
				)
			)),
			Field::make( 'select', $id.'_link_action', __( 'Link Action' ) )
			->set_options(array(
				'' => 'Same Window',
				'target="_blank"' => 'New Tab',
			))
			->set_width(25),

		);
	}
	function _select($id, $label, $options) {
		return Field::make( 'select', $id, __( $label ) )
		->set_options($options);
	}
	function _color($id, $label) {
		return Field::make( 'color', $id, __( $label ) );
	}
	function _html($id='html', $html = 'Please put htlm content') {
		return Field::make( 'html', $id )
		->set_html($html);
	}

	function _seperator($id='html', $html = 'Please put htlm content', $data_target = '') {
		return Field::make( 'html', $id )
		->set_html('<label class="data-parent" '.$data_target.'>'.$html.' <span class="dashicons-before dashicons-arrow-down-alt2"></span></label>')
		->set_classes('seperator ');
	} 
	
	function _contact_form($id = 'contact_form', $label = 'Contact Form') {
		return Field::make( 'select', $id, __( $label ) )
		->set_options($this->get_contact_forms());
	}
	
	
	function documentation() {
		ob_start();
		get_template_part( 'admin/documentation' );
		return ob_get_clean();
	}
}
class ModulesFields extends PostMeta {
	function __construct() {
		$this->overlay_options = array(
			'' => 'None',
			'overlay overlay-primary' => 'Overlay Primary',
			'overlay overlay-secondary' => 'Overlay Secondary',
			'overlay overlay-tertiary' => 'Overlay Tertiary',
			'overlay overlay-accent' => 'Overlay Accent',
		);
		$this->background_options = array(
			'' => 'None',
			'custom' => 'Custom Color',
			'image' => 'Image',
			'background-primary' => 'Background Primary',
			'background-secondary' => 'Background Secondary',
			'background-tertiary' => 'Background Tertiary',
			'background-accent' => 'Background Accent',
		);
		$this->container_options = array(
			'container' => 'Default',
			'container-fluid g-0' => 'Full Width',
			'container small-container' => 'Small Container',
			'container extra-small-container' => 'Extra Small Container',
		);
		$this->text_align_options = array(
			'text-left' => 'Text Left',
			'text-center' => 'Text Center',
			'text-right' => 'Text Right',
			'text-justify' => 'Text Justify',
		);
		$this->padding_top_options = array(
			'' => 'None',
			'pt-extra-small' => 'Extra Small',
			'pt-small' => 'Small',
			'pt-medium' => 'Medium',
			'pt-large' => 'Large',
			'pt-extra-large' => 'Extra Large',
		);
		$this->padding_bottom_options = array(
			'' => 'None',
			'pb-extra-small' => 'Extra Small',
			'pb-small' => 'Small',
			'pb-medium' => 'Medium',
			'pb-large' => 'Large',
			'pb-extra-large' => 'Extra Large',
		);
		$this->background_attachment_options = array(
			'' => 'Scroll',
			'background-fixed' => 'Fixed',
		);
		$this->column_layout = array(
			4 => '4-8',
			5 => '5-7',
			6 => '6-6',
			7 => '7-5',
			8 => '8-4',
		);
		$this->column_content_width = array(
			'large-width' => 'Large',
			'small-width' => 'Small',
			'medium-width' => 'Medium',
		);
		$this->column_padding_option = array(
			'p-0' => 'None',
			'extra-padding' => 'Extra Small',
			'small-padding' => 'Small',
			'medium-padding' => 'Medium',
			'large-padding' => 'Large',
			'extra-large-padding' => 'Extra Large',
		);
		$this->circle_options = array(
			'' => 'None',
			'circle top-left' => 'Top Left',
			'circle bottom-right' => 'Bottom Right'
		);
		$this->style_options = array(
			'style-1' => 'Style 1',
			'style-2' => 'Style 2',
			'style-1 style-3' => 'Style 3',
		);
	}  
	function before_module_fields($data_target = '', $class ='') { 
		return  array(
			$this->_text('title', 'Title'),
			$this->_seperator('html_styles', 'STYLES', $data_target),
			$this->_select('container', 'Container', $this->container_options)
			->set_classes($class.' collapse')
			->set_width(16.66),
			$this->_select('text_align', 'Text Align', $this->text_align_options)
			->set_classes($class.' collapse')
			->set_width(16.66),
			$this->_select('padding_top', 'Padding Top', $this->padding_top_options)
			->set_classes($class.' collapse')
			->set_width(16.66),
			$this->_select('padding_bottom', 'Padding Bottom', $this->padding_bottom_options)
			->set_classes($class.' collapse')
			->set_width(16.66),
			$this->_select('background', 'Background', $this->background_options)
			->set_classes($class.' collapse')
			->set_width(16.66),
			$this->_color('background_color_custom', 'Background Color')
			->set_conditional_logic( array(
				array(
					'field' => 'background',
					'value' => 'custom', 
				)
			))
			->set_classes($class.' collapse')
			->set_width(16.66),
			$this->_image('background_image', 'Background Image')
			->set_conditional_logic( array(
				array(
					'field' => 'background',
					'value' => 'image', 
				)
			))
			->set_classes($class.' collapse')
			->set_width(16.66),
		);
	}

	function module_fields($module_fields) {
		return $module_fields;
	}

	function complex_fields($name) {
		return $this->_complex($name, 'Column Items', 'tabbed-vertical')
		->add_fields('image', array(
			$this->_image('image', 'Image'),
			$this->_checkbox('fullwidth', 'Fullwidth')->set_width(20),
			$this->_select('circle', 'Circle', $this->circle_options)->set_width(80),
		))
		->add_fields('spacer', array(
			$this->_text('height', 'Height')->set_help_text('Defaults to 2rem (32px)'),
		))
		->add_fields('description', array(
			$this->_rich_text('description', 'Rich Text'),
		))
		->add_fields('button', $this->_button('button'))
		->set_header_template('Button '.'<% if (button_link_text) { %>[<%- button_link_text  %>] <% } %>')
		;
	}

	function hero_banner_fields() {
		return array_merge(
			$this->before_module_fields('data-target="style-hero-banner"', 'style-hero-banner'),
			$this->module_fields(array(
				$this->_seperator('html_hero', 'CONTENTS', 'data-target="hero-content"'),
				$this->_text('heading', 'Heading')->set_classes('hero-content collapse'),
				$this->_rich_text('description', 'Rich Text')->set_classes('hero-content collapse'),
				$this->_contact_form()->set_classes('hero-content collapse'),
			))
		);
	}
	function text_bar_fields() {
		return array_merge(
			$this->before_module_fields('data-target="style-text-bar"', 'style-text-bar'),
			$this->module_fields(array(
				$this->_seperator('text_bar_content', 'CONTENTS', 'data-target="text-bar-content"'),
				$this->_rich_text('description', 'Rich Text')->set_classes('text-bar-content collapse'),
			))
		);
	}
	function info_slider_fields() {
		
		return array_merge(
			$this->before_module_fields('data-target="style-info-slider"', 'style-info-slider'),
			$this->module_fields(array(
				$this->_select('info_slider_style', 'Style', $this->style_options)->set_classes('style-info-slider collapse'),
				$this->_seperator('html_info_slider', 'CONTENTS', 'data-target="info-slider-content"'),
				$this->_complex('info_slider', 'Info Slider')
				->add_fields(array_merge(
					$this->module_fields(array(
						$this->_image('icon', 'Icon'),
						$this->_text('heading', 'Heading'),
						$this->_rich_text('description', 'Rich Text'),
					)),
					$this->_button('button')
				))
				->set_classes('info-slider-content collapse')
				->set_header_template('<%- heading %>')
			))
		);
	}
	function testimonials_fields() {
		return array_merge(
			$this->before_module_fields('data-target="style-logo"', 'style-logo'),
			$this->module_fields(array(
			))
		);
	}
	function logos_fields() {
		return array_merge(
			$this->before_module_fields('data-target="style-logo"', 'style-logo'), 
			$this->module_fields(array(
				$this->_seperator('text_bar_content', 'CONTENTS', 'data-target="logos-content"'),
				$this->_text('heading', 'Heading')->set_classes('logos-content collapse'),
				$this->_image_gallery('logo_gallery', 'Logo Gallery')->set_classes('logos-content collapse'),
			))
		);
	}
	function two_column_fields() {
		return array_merge(
			$this->before_module_fields('data-target="style-two-column"', 'style-two-column'),
			$this->module_fields(array(
				$this->_select('column_layout','Column Layout', $this->column_layout)->set_classes('style-two-column collapse')->set_width(16.66),
				$this->_seperator('html_first_column', 'FIRST COLUMN', 'data-target="first_column"'),
				$this->_select('first_column_content_width','Column Content Width', $this->column_content_width)->set_classes('first_column collapse')->set_width(20),
				$this->_select('first_column_text_align','Text align', $this->text_align_options)->set_classes('first_column collapse')->set_width(20),
				$this->complex_fields('column_1_items')->set_classes('first_column collapse'),
				$this->_seperator('html_second_column', 'SECOND COLUMN', 'data-target="second_column"'),
				$this->_select('second_column_content_width','Column Content Width', $this->column_content_width)->set_classes('second_column collapse')->set_width(20),
				$this->_select('second_column_text_align','Text align', $this->text_align_options)->set_classes('second_column collapse')->set_width(20),
				$this->complex_fields('column_2_items')->set_classes('second_column collapse'),
			))
		);
	}
	function wysiwyg_fields() {
		
		return array_merge(
			$this->before_module_fields('data-target="style-wysiwyg"', 'style-wysiwyg'), 
			$this->module_fields(array(
				$this->_seperator('html_1', 'CONTENTS', 'data-target="content-wysiwyg"'),
				$this->_rich_text('description', 'Rich Text')->set_classes('content-wysiwyg collapse')
			))
		);
	}
	
}



/*$PostMeta = new PostMeta();

$documentation_fields = array(
	$PostMeta->_html('documentation', $PostMeta->documentation()),
);
*/

/*-----------------------------------------------------------------------------------*/
/* Theme Settings
/*-----------------------------------------------------------------------------------*/
class ThemeOptionsMeta extends PostMeta {
	function theme_options() {
		global $theme_settings;
		$theme_settings_container = Container::make( 'theme_options', __( 'Theme Settings' ) )->set_page_parent('themes.php');
		foreach($theme_settings as $theme_setting) {
			$theme_settings_container->add_tab($theme_setting['label'], $this->{$theme_setting['id'].'_fields'}());
		}
		return $theme_settings_container;
	}

	function general_settings_fields() {
		return array(
			$this->_checkbox('disable_gutenberg', 'Disable Gutenberg'),
		);
	}
}

$ThemeOptionsMeta = new ThemeOptionsMeta();

$ThemeOptionsMeta->theme_options();
/*
->set_page_parent('themes.php')
->add_tab('General Settings',  array())

->add_tab('Footer CTA', array())

->add_tab('Social Links', array());
*/

Container::make( 'theme_options', __( '→General Settings' ) )
->set_page_parent('themes.php')
->add_fields(array());

Container::make( 'theme_options', __( '→Footer CTA' ) )
->set_page_parent('themes.php')
->add_fields(array());

Container::make( 'theme_options', __( '→Social Links' ) )
->set_page_parent('themes.php')
->add_fields(array());

/*Container::make( 'theme_options', __( 'Documentation' ) )
->set_page_parent('themes.php')
->add_fields($documentation_fields);*/

/*Container::make( 'theme_options', __( 'Services Settings' ) )
->set_page_parent('edit.php?post_type=services')
->add_tab('Button', $Modules->custom_button('services'));*/

/*-----------------------------------------------------------------------------------*/
/* Page Options
/*-----------------------------------------------------------------------------------*/
Container::make( 'post_meta', 'Page Options' )
->where( 'post_type', '=', 'page' )
->or_where( 'post_type', '=', 'services' )
->set_context('side')
->add_fields( array(
	Field::make( 'checkbox', 'hide_banner', __( 'Hide Banner' ) ),
	Field::make( 'checkbox', 'hide_banner_button', __( 'Hide Banner Button' ) ),
	Field::make( 'checkbox', 'hide_footer_cta', __( 'Hide Footer CTA' ) ),
));

Container::make( 'post_meta', 'Default Template Page Options' )
->where( 'post_template', '=', 'default' )
->where( 'post_type', '!=', 'accordions' )
->set_context('side')
->add_fields( array(
	Field::make( 'checkbox', 'fullwidth', __( 'Page Full Width' ) ),
));
/*-----------------------------------------------------------------------------------*/
/* Modules
/*-----------------------------------------------------------------------------------*/
$Modules = new Modules();
Container::make( 'post_meta', 'Modules' )
->where( 'post_template', '=', 'templates/modules.php' )
->where( 'post_type', '!=', 'accordions' )
->add_fields( array($Modules->modules_post_meta()));


/*-----------------------------------------------------------------------------------*/
/* Accordion
/*-----------------------------------------------------------------------------------*/
$PostMeta = new PostMeta();
Container::make( 'post_meta', 'Accordion Items' )
->where( 'post_type', '=', 'accordions' )
->add_fields( array(
	$PostMeta->_complex('accordion','')
	->add_fields(array(
		$PostMeta->_text('accordion_title','Accordion Title'),
		$PostMeta->_rich_text('accordion_content','Accordion Content'),
	))
	->set_header_template('<%- accordion_title %>')
));

Container::make( 'post_meta', 'Shortcode' )
->where( 'post_type', '=', 'accordions' )
->set_context('side')
->add_fields( array(
	$PostMeta->_html('ac_html', isset($_GET['post']) ? "<code>[accordion id='".$_GET['post']."']</code>" : '')
));
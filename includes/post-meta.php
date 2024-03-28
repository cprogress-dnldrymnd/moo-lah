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
		->set_duplicates_allowed( true )
		->set_type( array( 'image') );
	}
	function _complex($id, $label, $layout='tabbed-vertical') {
		return Field::make( 'complex', $id, __( $label ) )
		->set_layout( $layout );
	}
	function _checkbox($id, $label) {
		return Field::make( 'checkbox', $id, __( $label ) );
	}
	function _documentation() {
		ob_start();
		get_template_part( 'admin/documentation' );
		return ob_get_clean();
	}
	function _button($id, $separator = '', $global = true) {
		$global_buttons[''] = 'None';
		$global_buttons = $this->get_posts_v2('globalbuttons');
		if($global == true) {
			$link_type = array_merge(
				$global_buttons,
				array(
					'page_link' => 'Page',
					'post_link' => 'Post',
					'service_link' => 'Service',
					'custom_link' => 'Custom',
				)
			);
		} else {
			$link_type = array(
				'' => 'None',
				'page_link' => 'Page',
				'post_link' => 'Post',
				'service_link' => 'Service',
				'custom_link' => 'Custom',
			);
		}

		$buttons = array(
			$this->_select( $id.'_link_type', 'Link Type', $link_type)
			->set_width(25),
			$this->_text($id.'_link_text', 'Link Text')
			->set_width(25)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => array('page_link', 'post_link', 'service_link', 'custom_link'), 
					'compare' => 'IN'
				)
			)),
			$this->_select( $id.'_page_link', 'Page Link', $this->get_post_type_list('page'))
			->set_width(25)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => 'page_link', 
				)
			)),
			$this->_select( $id.'_post_link', 'Post Link', $this->get_post_type_list('post'))
			->set_width(25)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => 'post_link', 
				)
			)),
			$this->_select( $id.'_service_link', 'Service Link', $this->get_post_type_list('services'))
			->set_width(25)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => 'service_link', 
				)
			)),

			$this->_text($id.'_custom_link', 'Custom Link')
			->set_width(25)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => 'custom_link', 
				)
			)),
			$this->_select( $id.'_link_action', 'Link Action', array(
				'' => 'Same Window',
				'target="_blank"' => 'New Tab',
			))
			->set_width(25)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => array('page_link', 'post_link', 'service_link', 'custom_link'), 
					'compare' => 'IN'
				)
			)),
		);

		if($separator) {
			return array_merge(array($this->_seperator($id.'_sep', $separator)), $buttons);
		} else {
			return $buttons;
		}
	}

	function _button_2($id, $separator = '', $global = true) {
		$global_buttons[''] = 'None';
		$global_buttons = $this->get_posts_v2('globalbuttons');
		if($global == true) {
			$link_type = array_merge(
				$global_buttons,
				array(
					'page_link' => 'Page',
					'post_link' => 'Post',
					'service_link' => 'Service',
					'custom_link' => 'Custom',
				)
			);
		} else {
			$link_type = array(
				'' => 'None',
				'page_link' => 'Page',
				'post_link' => 'Post',
				'service_link' => 'Service',
				'custom_link' => 'Custom',
			);
		}

		$buttons = array(
			$this->_select( $id.'_link_type', 'Link Type', $link_type)
			->set_width(20),
			$this->_text($id.'_link_text', 'Link Text')
			->set_width(20)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => array('page_link', 'post_link', 'service_link', 'custom_link'), 
					'compare' => 'IN'
				)
			)),
			$this->_select( $id.'_page_link', 'Page Link', $this->get_post_type_list('page'))
			->set_width(20)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => 'page_link', 
				)
			)),
			$this->_select( $id.'_post_link', 'Post Link', $this->get_post_type_list('post'))
			->set_width(20)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => 'post_link', 
				)
			)),
			$this->_select( $id.'_service_link', 'Service Link', $this->get_post_type_list('services'))
			->set_width(20)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => 'service_link', 
				)
			)),

			$this->_text($id.'_custom_link', 'Custom Link')
			->set_width(20)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => 'custom_link', 
				)
			)),
			$this->_select( $id.'_link_action', 'Link Action', array(
				'' => 'Same Window',
				'target="_blank"' => 'New Tab',
			))
			->set_width(20)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => array('page_link', 'post_link', 'service_link', 'custom_link'), 
					'compare' => 'IN'
				)
			)),
			$this->_select( $id.'_link_color', 'Button Color', array(
				'button-accent' => 'Trula Orange',
				'button-primary' => 'Trula Blue',
				'button-white' => 'White',
			))
			->set_width(20)
			->set_conditional_logic( array(
				array(
					'field' => $id.'_link_type',
					'value' => array('page_link', 'post_link', 'service_link', 'custom_link'), 
					'compare' => 'IN'
				)
			)),
		);

		if($separator) {
			return array_merge(array($this->_seperator($id.'_sep', $separator)), $buttons);
		} else {
			return $buttons;
		}
	}
	function _select($id, $label, $options) {
		return Field::make( 'select', $id, __( $label ) )
		->set_options($options);
	}
	function _radio($id, $label, $options) {
		return Field::make( 'radio', $id, __( $label ) )
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
	
	function after_banner_fields() {
		$after_banner = carbon_get_theme_option('after_banner');
		$after_banner_container_fields = array();
		foreach($after_banner as $after_banner_template) {
			$after_banner_container_fields[] = $this->_checkbox('hide_after_header_'.$after_banner_template['template'], 'Hide '.get_the_title($after_banner_template['template']));
		}
		return $after_banner_container_fields;
	}

	function before_footer_fields() {
		$after_banner = carbon_get_theme_option('before_footer');
		$after_banner_container_fields = array();
		foreach($after_banner as $after_banner_template) {
			$after_banner_container_fields[] = $this->_checkbox('hide_before_footer_'.$after_banner_template['template'], 'Hide '.get_the_title($after_banner_template['template']));
		}
		return $after_banner_container_fields;
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
		$this->number_of_columns = array(
			4 => '4',
			3 => '3',
			2 => '2',
			1 => '1',
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
			$this->_text('title', 'Title')->set_width(50),
			$this->_text('id', 'Section ID')->set_width(50),
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

	function templates_fields() {
		return array(
			$this->_text('title', 'Title'),
			$this->_select('template', 'Template', $this->get_posts('templates', 'Select Template')), 
		);
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
				$this->_text('text', 'Text')->set_classes('text-bar-content collapse'),
				$this->_complex('changing_text', 'Changing Text')
				->add_fields(array(
					$this->_text('text', 'Text'),
				))
				->set_classes('text-bar-content collapse')
				->set_header_template('<%- text %>')

			))
		);
	}
	function info_slider_fields() {
		
		return array_merge(
			$this->before_module_fields('data-target="style-info-slider"', 'style-info-slider'),
			$this->module_fields(array(
				$this->_select('number_of_columns','Number of Columns', $this->number_of_columns)->set_classes('style-info-slider collapse')->set_width(16.66),
				$this->_select('info_slider_style', 'Style', $this->style_options)->set_classes('style-info-slider collapse')->set_width(20),
				$this->_checkbox('info_is_slider', 'Slider')->set_classes('style-info-slider collapse')->set_width(20),
				$this->_checkbox('custom_button', 'Custom Buttons')->set_classes('style-info-slider collapse')->set_width(20),
				$this->_seperator('html_info_slider', 'CONTENTS', 'data-target="info-slider-content"'),
				$this->_text('heading', 'Heading')->set_classes('info-slider-content collapse'),
				$this->_complex('info_slider', 'Info Slider')
				->add_fields(array_merge(
					$this->module_fields(array(
						$this->_checkbox('use_fontawesome', 'Use Fontawesome Icon'),
						$this->_image('icon', 'Icon')
						->set_conditional_logic( array(
							array(
								'field' => 'use_fontawesome',
								'value' => false, 
							)
						)),
						$this->_text('fontawesome', 'Fontawesome')
						->set_conditional_logic( array(
							array(
								'field' => 'use_fontawesome',
								'value' => true, 
							)
						)),
						$this->_text('heading', 'Heading'),
						$this->_rich_text('description', 'Rich Text'),
					)),
					$this->_button('button')
				))
				->set_classes('info-slider-content collapse')
				->set_header_template('<%- heading %>'),
				$this->_seperator('html_info_slider_button', 'BUTTONS', 'data-target="info-slider-content-buttons"')
				->set_conditional_logic( array(	
					array(
						'field' => 'custom_button',
						'value' => true, 
					)
				)),
				$this->_complex('buttons', 'Buttons')->set_classes('info-slider-content-buttons collapse')
				->add_fields($this->_button_2('button'))
				->set_header_template('<%- button_link_text  %>')
				->set_conditional_logic( array(	
					array(
						'field' => 'custom_button',
						'value' => true, 
					)
				))
				->set_max(2)

			)),
		);
	}
	function testimonials_fields() {
		return array_merge(
			$this->before_module_fields('data-target="style-testimonial"', 'style-testimonial'),
			$this->module_fields(array(
				$this->_html('testimonial_html', '<h2> This will display the testimonial carousel. Edit <a target="_blank" href="/wp-admin/edit.php?post_type=testimonials&page=crb_carbon_fields_container_settings.php">here</a> </h2>'),
			))
		);
	}
	function logos_fields() {
		return array_merge(
			$this->before_module_fields('data-target="style-logo"', 'style-logo'), 
			$this->module_fields(array(
				$this->_seperator('text_bar_content', 'CONTENTS', 'data-target="logos-content"'),
				$this->_text('heading', 'Heading')->set_classes('logos-content collapse'),
				$this->_select('logo_gallery', 'Logo Gallery', $this->get_posts('galleries', 'Select Gallery'))->set_classes('logos-content collapse'),
			))
		);
	}
	function two_column_fields() {
		return array_merge(
			$this->before_module_fields('data-target="style-two-column"', 'style-two-column'),
			$this->module_fields(array(
				$this->_select('column_layout','Column Layout', $this->column_layout)->set_classes('style-two-column collapse')->set_width(16.66),
				$this->_seperator('html_heading', 'HEADING AND DESCRIPTION', 'data-target="heading"'),
				$this->_text('heading','Heading')->set_classes('heading collapse')->set_width(20),
				$this->_rich_text('description','Description')->set_classes('heading collapse'),
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

	function custom_html_fields() {
		return array_merge(
			$this->before_module_fields('data-target="style-html"', 'style-html'), 
			$this->module_fields(array(
				$this->_seperator('html_1', 'CONTENTS', 'data-target="content-html"'),
				$this->_textarea('custom_html', 'Custom HTML')->set_classes('content-html collapse')
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

	function theme_options_single() {
		global $theme_settings;

		foreach($theme_settings as $theme_setting) {
			$theme_settings_container = Container::make( 'theme_options', __( '→'.$theme_setting['label'] ) )->set_page_parent('themes.php');
			$theme_settings_container->add_fields($this->{$theme_setting['id'].'_fields'}());
		}
		return $theme_settings_container;
	}

	function general_settings_fields() {
		return array(
			$this->_checkbox('disable_gutenberg', 'Disable Gutenberg'),
			$this->_image('default_page_banner', 'Default Page Banner'),
		);
	}
	function company_details_fields() {
		return array(
			$this->_image('logo', 'Logo'),
			$this->_image('alt_logo', 'Alt Logo'),
			$this->_image('partner_logo', 'Partner Logo'),
			$this->_image('footer_logo', 'Footer Logo'),
			$this->_text('phone', 'Phone')
		);
	}

	function after_banner_fields() {
		return array(
			$this->_complex('after_banner', 'Template')
			->add_fields(array(
				$this->_text('title', 'Title'),
				$this->_select('template', 'Template', $this->get_posts('templates', 'Select Template')), 
			))
			->set_header_template('<%- title  %>')
		);
	}

	function before_footer_fields() {
		return array(
			$this->_complex('before_footer', 'Template')
			->add_fields(array(
				$this->_text('title', 'Title'),
				$this->_select('template', 'Template', $this->get_posts('templates', 'Select Template')), 
			))
			->set_header_template('<%- title  %>')
		);
	}

	
	function footer_fields() {
		return array_merge(
			array(
				$this->_seperator('footer_cta', 'FOOTER CTA'),
				$this->_text('footer_cta_heading', 'Heading'),
				$this->_rich_text('footer_cta_description', 'Description'),
				$this->_seperator('footer_text_html', 'Footer Text'),
				$this->_rich_text('footer_text', ''),
			),
		);
	}
}

$ThemeOptionsMeta = new ThemeOptionsMeta();

$ThemeOptionsMeta->theme_options();

$ThemeOptionsMeta->theme_options_single();

$PostMeta = new PostMeta();
/*
->set_page_parent('themes.php')
->add_tab('General Settings',  array())

->add_tab('Footer CTA', array())

->add_tab('Social Links', array());
*/


/*Container::make( 'theme_options', __( 'Documentation' ) )
->set_page_parent('themes.php')
->add_fields($documentation_fields);*/

/*Container::make( 'theme_options', __( 'Services Settings' ) )
->set_page_parent('edit.php?post_type=medicalconditions')
->add_tab('Button', $Modules->custom_button('services'));*/

/*-----------------------------------------------------------------------------------*/
/* Page Options
/*-----------------------------------------------------------------------------------*/
Container::make( 'post_meta', 'Page Options' )
->where( 'post_type', '=', 'page' )
->or_where( 'post_type', '=', 'medicalconditions' )
->set_context('side')
->add_fields( array(
	$PostMeta->_checkbox('hide_footer_cta', 'Hide Footer CTA'),
	$PostMeta->_text('alt_title', 'Alt Title'),
));
/*-----------------------------------------------------------------------------------*/
/* Page Banner
/*-----------------------------------------------------------------------------------*/
Container::make( 'post_meta', 'Page Banner' )
->where( 'post_type', '=', 'page' )
->or_where( 'post_type', '=', 'medicalconditions' )
->set_context('side')
->add_fields( array(
	$PostMeta->_checkbox('hide_page_banner', 'Hide Page Banner'),
	$PostMeta->_checkbox('hide_get_a_quote', 'Hide Get a Quote')
	->set_conditional_logic( array(
		array(
			'field' => 'hide_page_banner',
			'value' => false, 
		)
	)),
	$PostMeta->_checkbox('hide_request_callback', 'Hide Request Callback')
	->set_conditional_logic( array(
		array(
			'field' => 'hide_page_banner',
			'value' => false, 
		)
	)),
));

/*-----------------------------------------------------------------------------------*/
/* Page Banner
/*-----------------------------------------------------------------------------------*/

Container::make( 'post_meta', 'After Banner' )
->where( 'post_type', '=', 'page' )
->or_where( 'post_type', '=', 'medicalconditions' )
->set_context('side')
->add_fields($PostMeta->after_banner_fields());

Container::make( 'post_meta', 'Before Footer' )
->where( 'post_type', '=', 'page' )
->or_where( 'post_type', '=', 'medicalconditions' )
->set_context('side')
->add_fields($PostMeta->before_footer_fields());





/*Container::make( 'post_meta', 'Default Template Page Options' )
->where( 'post_template', '=', 'default' )
->where( 'post_type', '!=', 'accordions' )
->set_context('side')
->add_fields( array(
	Field::make( 'checkbox', 'fullwidth', __( 'Page Full Width' ) ),
));*/
/*-----------------------------------------------------------------------------------*/
/* Modules
/*-----------------------------------------------------------------------------------*/
$Modules = new Modules();
Container::make( 'post_meta', 'Modules' )
->where( 'post_template', '=', 'templates/modules.php' )
->where( 'post_type', '!=', 'accordions' )
->where( 'post_type', '!=', 'galleries' )
->or_where( 'post_type', '=', 'medicalconditions' )
->or_where( 'post_type', '=', 'templates' )
->add_fields( array($Modules->modules_post_meta()));


/*-----------------------------------------------------------------------------------*/
/* Accordion
/*-----------------------------------------------------------------------------------*/
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
	$PostMeta->_html('ac_html', isset($_GET['post']) ? "<code>[accordion id='".$_GET['post']."' title='".get_the_title($_GET['post'])."]</code>" : '')
));


/*-----------------------------------------------------------------------------------*/
/* Global Buttons
/*-----------------------------------------------------------------------------------*/

Container::make( 'post_meta', 'Buttons' )
->where( 'post_type', '=', 'globalbuttons' )
->add_fields($PostMeta->_button('global_button', false, false));


/*-----------------------------------------------------------------------------------*/
/* Testimonial
/*-----------------------------------------------------------------------------------*/
Container::make( 'post_meta', 'Testimonial Content' )
->where( 'post_type', '=', 'testimonials' )
->add_fields( array(
	$PostMeta->_text('testimonial_title','Testimonial Title'),
	$PostMeta->_textarea('testimonial_content','Testimonial Content'),
	$PostMeta->_radio('stars','Testimonial Stars', array(
		5 => 5,
		4 => 4,
		3 => 3,
		2 => 2,
		1 => 1,
	)),
));

Container::make( 'theme_options', __( 'Settings' ) )
->set_page_parent('edit.php?post_type=testimonials')
->add_fields(array(
	$PostMeta->_text('testimonial_heading', 'Heading'),
	$PostMeta->_text('testimonial_heading_left', 'Left Heading'),
	$PostMeta->_text('testimonial_description', 'Description'),
));

/*-----------------------------------------------------------------------------------*/
/* Services
/*-----------------------------------------------------------------------------------*/
Container::make( 'theme_options', __( 'Settings' ) )
->set_page_parent('edit.php?post_type=medicalconditions')
->add_fields(array(
	$PostMeta->_seperator('sticky_cta', 'STICKY CTA'),
	$PostMeta->_text('sticky_cta_heading', 'Heading'),
	$PostMeta->_rich_text('sticky_cta_description', 'Description'),
));

/*-----------------------------------------------------------------------------------*/
/* Gallery
/*-----------------------------------------------------------------------------------*/
Container::make( 'post_meta', 'Gallery' )
->where( 'post_type', '=', 'galleries' )
->add_fields( array(
	$PostMeta->_image_gallery('gallery', '')
));

/*-----------------------------------------------------------------------------------*/
/* CSS, Header and Footer Scripts
/*-----------------------------------------------------------------------------------*/
Container::make( 'post_meta', 'Custom CSS / Header Scripts / Footer Scripts' )
->set_priority('default')
->where( 'post_type', '=', 'post' )
->or_where( 'post_type', '=', 'page' )
->or_where( 'post_type', '=', 'medicalconditions' )
->add_fields( array(
	$PostMeta->_textarea('page_custom_css', 'Custom CSS'),
	Field::make( 'header_scripts', 'page_header_scripts', __( 'Header Scripts' ) ),
	Field::make( 'textarea', 'page_body_scripts', __( 'Body Scripts' ) ),
	Field::make( 'footer_scripts', 'page_footer_scripts', __( 'Footer Scripts' ) ),
));


/*-----------------------------------------------------------------------------------*/
/* Documentaton
/*-----------------------------------------------------------------------------------*/
Container::make( 'theme_options', __( 'Documentation' ) )
->add_fields(array(
	$PostMeta->_html('docx', $PostMeta->_documentation()),
));

Container::make( 'theme_options', __( '→Header and Footer Scripts' ) )
->set_page_parent('themes.php')
->add_fields(array(
	Field::make( 'header_scripts', 'header_scripts', __( 'Header Scripts' ) ),
	Field::make( 'footer_scripts', 'footer_scripts', __( 'Footer Scripts' ) )
));



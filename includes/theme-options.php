<?php 
class Theme_Options extends Helpers {
	function __construct() {
		$this->site_logo = wp_get_attachment_image_url(get_option('theme_logo'));
		$this->disable_gutenberg = carbon_get_theme_option('disable_gutenberg');
		$this->default_page_banner = wp_get_attachment_image_url(carbon_get_theme_option('default_page_banner'), 'full');


		$this->logo = '<a class="site-logo" href="'.get_site_url().'"> <img src="'.wp_get_attachment_image_url(carbon_get_theme_option('logo'), 'medium').'" alt="Logo"> </a>';
		$this->partner_logo = '<span class="site-logo partner" > <span>In partnership with</span><img src="'.wp_get_attachment_image_url(carbon_get_theme_option('partner_logo'), 'medium').'" alt="Logo"> </span>';
		$this->alt_logo = '<a class="site-logo" href="'.get_site_url().'"> <img src="'.wp_get_attachment_image_url(carbon_get_theme_option('alt_logo'), 'large').'" alt="Logo"></a>';
		$this->phone_number_text  = carbon_get_theme_option('phone');
		$this->phone_number_url = 'tel:'.$this->clean_string(carbon_get_theme_option('phone'), '');

		$this->footer_text = wpautop(carbon_get_theme_option('footer_text'));
		$this->footer_logo = wpautop(carbon_get_theme_option('footer_text'));
		$this->site_logo = wp_get_attachment_image_url(get_option('theme_logo'));
		$this->footer_logo = '<a class="site-logo" href="'.get_site_url().'"> <img src="'.wp_get_attachment_image_url(carbon_get_theme_option('footer_logo'), 'medium').'" alt="Logo"> </a>';

		$this->footer_cta_heading = carbon_get_theme_option('footer_cta_heading');
		$this->footer_cta_description = carbon_get_theme_option('footer_cta_description');

		$this->sticky_cta_heading = carbon_get_theme_option('sticky_cta_heading');
		$this->sticky_cta_description = carbon_get_theme_option('sticky_cta_description');

	}
}
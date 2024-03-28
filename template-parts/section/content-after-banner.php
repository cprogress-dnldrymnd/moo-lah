<?php 
$after_banner = carbon_get_theme_option('after_banner');
$Modules = new Modules();

foreach($after_banner as $after_header_template) {
	if(!carbon_get_the_post_meta('hide_after_header_'.$after_header_template['template'])) {
		$Modules->modules_section($after_header_template['template'], true);
	}
} 
?>

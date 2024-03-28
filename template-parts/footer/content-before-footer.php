<?php 
$before_footer = carbon_get_theme_option('before_footer');
$Modules = new Modules();

foreach($before_footer as $before_footer_template) {
	if(!carbon_get_the_post_meta('hide_before_footer_'.$before_footer_template['template'])) {
		$Modules->modules_section($before_footer_template['template'], true);
	}
} 
?>

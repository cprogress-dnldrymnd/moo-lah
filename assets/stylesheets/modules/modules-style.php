<?php 
$Modules = new Modules();
$Theme_Options = new Theme_Options();
$modules = $Modules->modules_section_field(get_the_ID());
?>
<style class="module-style">
	<?php 
	foreach($modules as $key => $module) {
		$section_type = $module['_type'];
		$section_id = $module['_type'].'-'.get_the_ID().'-'.$key;

		if(isset($module['id'])) {
			$id = $module['id'];
		} else {
			$id = $section_id;
		}

		$background_image = isset($module['background_image']) ? $module['background_image'] : '';
		
		if($section_type != 'two_column_two_background') {
			$background_color = isset($module['background_color_custom']) ? $module['background_color_custom'] : '';
			if($background_color) {
				$Modules->get_style($background_color, '#'.$id, 'background-color');
			}
		}

		if($background_image) {
			$Modules->get_style($background_image, '#'.$id, 'background-image');
		}
	}

	$page_banner = get_the_post_thumbnail_url( get_the_ID(), 'full' ) ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : $Theme_Options->default_page_banner;
	?>
	#page-banner {
		background-image: url(<?= $page_banner ?>);
	}
</style>	
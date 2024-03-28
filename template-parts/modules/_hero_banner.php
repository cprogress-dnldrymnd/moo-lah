<?php 
$DisplayData = new DisplayData;
$container = $module['container'];
$text_align = $module['text_align'];
$section_classes = array(
	$module['background'], 
	$module['padding_top'], 
	$module['padding_bottom'], 
);

$id = $module['id'] != '' ?  $module['id'] : $section_id;

?>
<section id="<?= $id ?>" class="hero-banner background-image-cover overlay gradient-overlay <?php $DisplayData->get_classes($section_classes) ?>">
	<div class="<?= $container ?>">
		<div class="inner content-holder <?= $text_align ?> color-white">
			<?php 
			$DisplayData->heading(array(
				'heading' => $module['heading'],
				'data_aos' => 'fade-up'
			));

			$DisplayData->description(array(
				'description' => $module['description'],
				'data_aos' => 'fade-up'
			));

			$DisplayData->contact_form($module['contact_form']);
			?>
		</div>
	</div>
</section>


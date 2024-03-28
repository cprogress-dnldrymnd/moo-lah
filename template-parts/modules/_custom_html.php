<?php
$DisplayData = new DisplayData; 
$container = $module['container'];
$text_align = $module['text_align'];
$Helpers = new Helpers();
$section_classes = array(
	$module['background'] == 'image' ?  'background-image-cover': $module['background'] , 
	$module['padding_top'], 
	$module['padding_bottom'], 
);

$id = $module['id'] != '' ?  $module['id'] : $section_id;
?>

<section id="<?= $id ?>" class="wysiwyg has-edit <?php $DisplayData->get_classes($section_classes) ?>">
	<?php if($template_class) { ?>
		<?= $Helpers->get_edit_url('post.php?post='.$postid.'&action=edit', 'Edit Template') ?>
	<?php } ?>
	<div class="<?= $container ?>">
		<div class="content-holder m-auto smaller <?= $text_align ?>" data-aos="fade-up">
			<?php 
			$DisplayData->description(array(
				'description' => $module['custom_html'],
				'wrapper' => false
			));
			?>
		</div>
	</div>
</section>
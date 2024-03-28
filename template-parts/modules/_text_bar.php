<?php
$DisplayData = new DisplayData;
$container = $module['container'];
$text_align = $module['text_align'];
$Helpers = new Helpers();
$section_classes = array(
	$module['background'], 
	$module['padding_top'], 
	$module['padding_bottom'], 
);
$id = $module['id'] != '' ?  $module['id'] : $section_id;

$text = $module['text'];
$changing_text = $module['changing_text'];

?>
<section id="<?= $id ?>" class="text-bar has-edit <?php $DisplayData->get_classes($section_classes) ?>">

	<?php if($template_class) { ?>
		<?= $Helpers->get_edit_url('post.php?post='.$postid.'&action=edit', 'Edit Template') ?>
	<?php } ?>

	<div class="<?= $container ?>">

		<div class="inner color-white <?= $text_align ?>" data-aos="slide-up">
			<?php
			$DisplayData->changing_text($text, $changing_text); 
			?>
		</div>

	</div>

</section>
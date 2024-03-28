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
?>

<section id="<?= $id ?>" class="logos has-edit <?= $template_class ?> <?php $DisplayData->get_classes($section_classes) ?>">
	<?php if($template_class) { ?>
		<?= $Helpers->get_edit_url('post.php?post='.$postid.'&action=edit', 'Edit Template') ?>
	<?php } ?>
	<div class="<?= $container ?>">

		<div class="inner <?= $text_align ?>">
			<?php
			$DisplayData->heading(array(
				'heading' => $module['heading'],
				'tag' => 'h3',
				'data_aos' => 'fade-up'
			)); 
			?>
			<div class="swiper swiper-logo-slider">
				<?php 
				$DisplayData->gallery($module['logo_gallery'], 'swiper-wrapper logo-box', 'swiper-slide logo-item centered');
				?>
			</div>
		</div>
	</div>
</section>
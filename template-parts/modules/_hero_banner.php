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
<section id="<?= $id ?>" class="hero-banner <?php $DisplayData->get_classes($section_classes) ?>">
	<div class="circle" data-aos="fade-up-right" data-aos-duration="1000"></div>
	<div class="circle-2" data-aos="fade-up" data-aos-duration="1000"></div>
	<div class="circle-3" data-aos="fade-right" data-aos-duration="1000"></div>
	<div class="<?= $container ?>">
		<div class="inner content-holder <?= $text_align ?> color-white">
			<div class="row g-4 align-items-center">
				<div class="col-lg-6">
					<div class="column-holder">
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
				<div class="col-lg-6">
					<?php
					$DisplayData->image(array(
						'image' => $module['image'],
					));
					?>
				</div>
			</div>
		</div>
	</div>
</section>
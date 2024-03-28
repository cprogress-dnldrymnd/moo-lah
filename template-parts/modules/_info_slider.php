<?php
$DisplayData = new DisplayData;
$container = $module['container'];
$text_align = $module['text_align'];
$info_slider = $module['info_slider'];
$info_slider_style = $module['info_slider_style'];
$info_is_slider = $module['info_is_slider'];
$number_of_columns = $module['number_of_columns'];
$custom_button = $module['custom_button'];
$buttons = $module['buttons'];
$Helpers = new Helpers();
$section_classes = array(
	$module['background'],
	$module['padding_top'],
	$module['padding_bottom'],
);
$number_of_columns_val = 12 / $number_of_columns;
$number_of_columns_class = 'col-lg-' . $number_of_columns_val;
$aos = (!$info_is_slider) ? 'data-aos="fade-up"' : '';

$id = $module['id'] != '' ?  $module['id'] : $section_id;

?>
<section id="<?= $id ?>" class="info-box-section has-edit <?php $DisplayData->get_classes($section_classes) ?>">
	<?php if ($template_class) { ?>
		<?= $Helpers->get_edit_url('post.php?post=' . $postid . '&action=edit', 'Edit Template') ?>
	<?php } ?>
	<?php if ($info_slider_style == 'style-1 style-3') { ?>
		<div class="circle" data-aos="zoom-in" data-aos-duration="3000"></div>
	<?php } ?>
	<div class="<?= $container ?>">
		<div class="content-holder <?= $text_align ?>">
			<?php
			$DisplayData->heading(array(
				'heading' => $module['heading'],
				'data_aos' => 'fade-up'
			));
			?>
			<?php if ($info_is_slider) { ?>
				<div class="info-slider-box" data-aos="fade-in">
					<div class="swiper swiper-info-slider">
						<div class="swiper-wrapper">
						<?php } else { ?>
							<div class="row <?= $text_align ?>">
							<?php } ?>
							<?php foreach ($info_slider as $slider) { ?>
								<div class="<?= $info_is_slider ? 'swiper-slide' : $number_of_columns_class ?>">

									<div class="column-holder" <?= $aos ?>>

										<div class="info-box content-holder <?= $slider['button_link_type'] != '' ? 'with-button' : '' ?> <?= $info_slider_style ?>">

											<?php
											if ($slider['fontawesome']) {
												$DisplayData->icon($slider['fontawesome'], 'circle-icon');
											} else {
												$DisplayData->image(array(
													'image' => $slider['icon'],
													'wrapper_class' => 'icon-box'
												));
											}
											$DisplayData->heading(array(
												'heading' => $slider['heading'],
												'tag' => 'h4'
											));

											$DisplayData->description(array(
												'description' => $slider['description'],
											));
											if ($slider['button_link_type']) {
												$DisplayData->button(array(
													'link_text' => $slider['button_link_text'],
													'link' => isset($slider['button_' . $slider['button_link_type']]) ? $slider['button_' . $slider['button_link_type']] : '',
													'link_type' => $slider['button_link_type'],
													'link_action' => $slider['button_link_action'],
													'class' => 'button-link'
												));
											}
											?>

										</div>

									</div>

								</div>

							<?php } ?>
							</div>
							<?php if ($info_is_slider) { ?>
								<div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
						</div>
					</div>
				<?php } ?>
				<?php if (!$custom_button && $info_slider_style == 'style-1 style-3') { ?>

					<div class="button-group-wrapper justify-center">
						<div class="button-box button-white button-wide-padding">
							<a href="/get-life-insurance/">
								<span>Get a Quote</span>
							</a>
						</div>
						<div class="button-box button-accent button-wide-padding">
							<a href="/#hero-banner">
								<span>Request a Callback</span>
							</a>
						</div>
					</div>

				<?php } else { ?>
					<div class="button-group-wrapper justify-center">
						<?php
						foreach ($buttons as $button) {
							if ($button['button_link_type']) {
								$DisplayData->button(array(
									'link_text' => $button['button_link_text'],
									'link' => isset($button['button_' . $button['button_link_type']]) ? $button['button_' . $button['button_link_type']] : '',
									'link_type' => $button['button_link_type'],
									'link_action' => $button['button_link_action'],
									'class' => $button['button_link_color'] . ' button-link'
								));
							}
						}
						?>
					</div>

				<?php } ?>

				</div>
		</div>
	</div>

</section>
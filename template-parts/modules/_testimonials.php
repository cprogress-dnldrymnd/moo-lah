<?php 
$DisplayData = new DisplayData;
$container = $module['container'];
$text_align = $module['text_align'];
$testimonial_heading = carbon_get_theme_option('testimonial_heading');
$testimonial_heading_left = carbon_get_theme_option('testimonial_heading_left');
$testimonial_description = carbon_get_theme_option('testimonial_description');
$section_classes = array(
	$module['background'], 
	$module['padding_top'], 
	$module['padding_bottom'], 
);

$Helpers = new Helpers();
$id = $module['id'] != '' ?  $module['id'] : $section_id;
?>

<section id="<?= $id ?>" class="testimonials has-edit <?php $DisplayData->get_classes($section_classes) ?>">
	<?= $Helpers->get_edit_url('edit.php?post_type=testimonials&page=crb_carbon_fields_container_settings.php', 'Manage Testimonials') ?>
	<div class="<?= $container ?>">
		<div class="container-holder" data-aos="fade-in">
			<?php 
			$DisplayData->heading(array(
				'heading' => $testimonial_heading,
				'tag' => 'h3',
				'data_aos' => 'fade-up',
				'class' => $text_align
			));
			?>
			<div class="row align-center">
				<div class="col-lg-3 text-left text-center-sm">
					<div class="column-holder">
						<div class="inner rating-box">
							<?php if($testimonial_heading_left) { ?>
								<div class="rating"><span><?= $Helpers->marks($testimonial_heading_left) ?></span></div>
							<?php } ?>
							<div class="stars">
								<?php $i = 0;  ?>
								<?php while($i != 5) { ?>
									<i class="fa-solid fa-star"></i>
									<?php $i++;  ?>
								<?php } ?>
							</div>
							<?php if($testimonial_description) { ?>
								<div class="text"><?= $testimonial_description ?></div>
							<?php } ?>

						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="column-holder">
						<div class="testimonial-box">
							<div class="swiper swiper-testimonial">
								<?php 
								$DisplayData->reviews();
								?>
								<div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
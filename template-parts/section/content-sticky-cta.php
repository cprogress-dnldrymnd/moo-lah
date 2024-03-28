<?php 
$Theme_Options = new Theme_Options();
$DisplayData = new DisplayData();
$Helpers = new Helpers();
?>

<section class="cta-sticky background-secondary has-edit">
	<?= $Helpers->get_edit_url('edit.php?post_type=medicalconditions&page=crb_carbon_fields_container_settings1.php', 'Edit CTA') ?>

	<div class="container">
		<div class="row align-center">
			<div class="col-lg-7">
				<div class="column-holder text-center-sm">
					<?php 
					$DisplayData->heading(array(
						'heading' => $Theme_Options->sticky_cta_heading,
						'tag' => 'h3',
						'class' => 'smaller'
					));
					$DisplayData->description(array(
						'description' => $Theme_Options->sticky_cta_description,
					));
					?>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="column-holder">
					<div class="button-group-wrapper justify-flex-end">
						<div class="button-box button-white-bordered mb-0">
							<a href="<?= do_shortcode( '[phone_number_url]' ) ?>">
								<span class="icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="25.719" height="25.766" viewBox="0 0 25.719 25.766">
										<path id="Icon_feather-phone" data-name="Icon feather-phone" d="M26.884,20.792v3.577a2.385,2.385,0,0,1-2.6,2.385,23.6,23.6,0,0,1-10.291-3.661,23.253,23.253,0,0,1-7.155-7.155A23.6,23.6,0,0,1,3.178,5.6,2.385,2.385,0,0,1,5.551,3H9.128a2.385,2.385,0,0,1,2.385,2.051A15.311,15.311,0,0,0,12.348,8.4a2.385,2.385,0,0,1-.537,2.516L10.3,12.432a19.08,19.08,0,0,0,7.155,7.155l1.514-1.514a2.385,2.385,0,0,1,2.516-.537,15.311,15.311,0,0,0,3.351.835,2.385,2.385,0,0,1,2.051,2.421Z" transform="translate(-2.167 -2)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
									</svg>
								</span>
								<span><?= do_shortcode( '[phone_number_text]' ) ?></span>
							</a>
						</div>
						<div class="button-box button-accent mb-0">
							<a href="/get-life-insurance/">
								<span>Get a Quote</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
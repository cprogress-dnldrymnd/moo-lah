<?php
$Theme_Options = new Theme_Options();
$Helpers = new Helpers();
?>
<div class="top-bar-wrapper has-edit">
	<?= $Helpers->get_edit_url('themes.php?page=crb_carbon_fields_container_company_details.php', 'Edit Logo') ?>
	<div class="container-fluid">
		<div class="top-row row align-center justify--space-between">
			<div class="col">
				<div class="top-col">
					<div class="column-holder left">
						<div class="logo-wrapper align-center">
							<?= $Theme_Options->logo ?>
						</div>
					</div>
				</div>
				<div class="navbar-wrapper">
					<nav class="navbar navbar-expand-lg">
						<div class="container">
							<?= $Theme_Options->alt_logo ?>
							<div class="collapse navbar-collapse" id="navbarMain">
								<?php
								wp_nav_menu(array(
									'theme_location' => 'header-menu',
									'container' => false,
									'menu_class' => '',
									'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
									'items_wrap' => '<ul id="%1$s" class="navbar-nav m-auto justify--space-between align--center %2$s">%3$s</ul>',
									'depth' => 2,
									'walker' => new bootstrap_5_wp_nav_menu_walker()
								));
								?>
							</div>
						</div>
					</nav>
				</div>
			</div>
			<?php if (!wp_is_mobile()) {  ?>
				<div class="top-col top-col-button col-auto">
					<div class="column-holder right">
						<div class="button-group-wrapper justify-flex-end">
							<div class="button-box button-primary">
								<a href="<?= do_shortcode('[phone_number_url]') ?>">
									<span class="icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="25.719" height="25.766" viewBox="0 0 25.719 25.766">
											<path id="Icon_feather-phone" data-name="Icon feather-phone" d="M26.884,20.792v3.577a2.385,2.385,0,0,1-2.6,2.385,23.6,23.6,0,0,1-10.291-3.661,23.253,23.253,0,0,1-7.155-7.155A23.6,23.6,0,0,1,3.178,5.6,2.385,2.385,0,0,1,5.551,3H9.128a2.385,2.385,0,0,1,2.385,2.051A15.311,15.311,0,0,0,12.348,8.4a2.385,2.385,0,0,1-.537,2.516L10.3,12.432a19.08,19.08,0,0,0,7.155,7.155l1.514-1.514a2.385,2.385,0,0,1,2.516-.537,15.311,15.311,0,0,0,3.351.835,2.385,2.385,0,0,1,2.051,2.421Z" transform="translate(-2.167 -2)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
										</svg>
									</span>
									<span><?= do_shortcode('[phone_number_text]') ?></span>
								</a>
							</div>
							<div class="button-box button-accent-2">
								<a href="/get-life-insurance/">
									<span>Get a Quote</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if (wp_is_mobile()) {  ?>
				<div class="top-col">
					<div class="column-holder right">
						<button class="navbar-toggler toggler-menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</span>
						</button>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</div>
<?php 
$Theme_Options = new Theme_Options();
$Helpers = new Helpers();
?>

<section class="footer-bottom has-edit" style="background-color: var(--primary-color)">
	<?= $Helpers->get_edit_url('themes.php?page=crb_carbon_fields_container_footer_settings.php', 'Edit Footer') ?>
	
	<div class="container">
		<div class="inner d-flex color-white justify-center-sm">
			<div class="inner-col">
				<div class="image-box">
					<?= $Theme_Options->footer_logo ?>
				</div>
			</div>
			<div class="inner-col">
				<div class="text-box">
					<?= $Theme_Options->footer_text ?>
				</div>
				<div class="link-box">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'footer',
						'container' => false,
						'menu_class' => '',
						'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
						'items_wrap' => '<ul id="%1$s" >%3$s</ul>',
						'depth' => 2,
						'walker' => new bootstrap_5_wp_nav_menu_walker()
					));
					?>
				</div>
			</div>
		</div>
	</div>
</section>
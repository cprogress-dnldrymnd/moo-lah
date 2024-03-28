<?php
$Theme_Options = new Theme_Options();
?>
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
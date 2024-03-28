<?php get_header() ?>
<main id="main" class="page-components">
	<section class="not-found text-white text-center">
		<div class="container ">
			<div class="heading-box">
				<h1 class="">404</h1>
			</div>
			<div class="description-box">
				<p>The page you are looking for either doesn't exist or has been moved</p>
			</div>
			<div class="button-box button-accent" data-aos="fade-up">
				<a href="<?= get_site_url() ?>" class="" role="button">
					<span class="icon"> <i class="fa-solid fa-arrow-left"></i> </span>

					<span class="text"> BACK TO HOME </span>
				</a>
			</div>
		</div>
	</section>
</main>
<?php get_footer() ?>
<?php
/*-----------------------------------------------------------------------------------*/
/* This template will be called by all other template files to finish 
/* rendering the page and display the footer area/content
/*-----------------------------------------------------------------------------------*/
$hide_footer_cta = carbon_get_the_post_meta('hide_footer_cta');
?>
<?php get_template_part('template-parts/footer/content', 'before-footer') ?>
<?php do_action( 'open_footer' ) ?>
<?php if(!$hide_footer_cta) { ?>
	<?php get_template_part('template-parts/footer/content', 'cta') ?>
<?php } ?>
<?php get_template_part('template-parts/footer/content', 'bottom') ?>
<?php do_action( 'close_footer' ) ?>

<div class="back-top display-none">
	<a href="#header" title="Back to Top">
		<i class="fa-solid fa-arrow-up"></i>
	</a>
</div>

<?php wp_footer();?>
</body>
</html>
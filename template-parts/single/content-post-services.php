<?php 
get_template_part('template-parts/section/content', 'banner');
get_template_part('template-parts/section/content', 'after-banner');
$Modules = new Modules();
$Modules->modules_section(get_the_ID());
get_template_part('template-parts/section/content', 'sticky-cta');
?>
<?php 
$DisplayData = new DisplayData;
$column_1_items = $module['column_1_items'];
$column_2_items = $module['column_2_items'];
$container = $module['container'];
$text_align = $module['text_align'];

$section_classes = array(
	$module['background'], 
	$module['padding_top'], 
	$module['padding_bottom'], 
);

$first_column_class = $module['column_layout'] ? 'col-lg-'.$module['column_layout'] : 'col-lg-6';
$second_column_class = $module['column_layout'] ? 'col-lg-'.(12 - $module['column_layout']) : 'col-lg-6';

$first_column_content_class = array(
	$module['first_column_content_width'] ? $module['first_column_content_width'] : '',
	$module['first_column_text_align'] ? $module['first_column_text_align'] : '',
);
$second_column_content_class = array(
	$module['second_column_content_width'] ? $module['second_column_content_width'] : '',
	$module['second_column_text_align'] ? $module['second_column_text_align'] : ''
);
$id = $module['id'] != '' ?  $module['id'] : $section_id;
?>

<section id="<?= $id ?>" class="two-columns <?php $DisplayData->get_classes($section_classes) ?>">
	<div class="<?= $container ?>">
		<div class="container-holder <?= $text_align ?>">
			<?php 
			$DisplayData->heading(array(
				'heading' => $module['heading'],
				'data_aos' => 'fade-up',
				'tag' => 'h3'
			));
			if($module['description']) {
				$DisplayData->description(array(
					'description' => $module['description'],
					'data_aos' => 'fade-up',
					'class' => 'container extra-small-container mt-4',
				));
			}
			?>
			<div class="row align-center">
				<div class="<?= $first_column_class ?>">
					<div class="column-holder content-holder <?php $DisplayData->get_classes($first_column_content_class) ?>" data-aos="fade-up">
						<?php 
						$DisplayData->multiple_complex($column_1_items, false); 
						?>
					</div>
				</div>
				<div class="<?= $second_column_class ?>">
					<div class="column-holder content-holder <?php $DisplayData->get_classes($second_column_content_class) ?>" data-aos="fade-up">
						<?php 
						$DisplayData->multiple_complex($column_2_items, false); 
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
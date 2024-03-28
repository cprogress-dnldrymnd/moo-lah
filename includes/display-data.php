<?php
class DisplayData
{
	use GetData;
	function get_classes($classes, $echo = true)
	{
		foreach ($classes as $class) {
			if ($class) {
				if ($echo) {
					echo $class . ' ';
				} else {
					return $class . ' ';
				}
			}
		}
	}
	function title()
	{
		echo $this->get_title();
	}
	function contact_form($args)
	{
		echo $this->get_contact_form_box($args);
	}
	function heading($args)
	{
		echo $this->get_heading($args);
	}
	function description($args)
	{
		echo $this->get_description($args);
	}
	function incrementing_numbers($args)
	{
		echo $this->get_incrementing_numbers($args);
	}
	function button($args, $echo = true)
	{
		$array = array('page_link', 'post_link', 'service_link', 'custom_link');
		if ($echo) {
			if (isset($args['link_type'])) {
				if (!(in_array($args['link_type'], $array))) {
					$id = (int)filter_var($args['link_type'], FILTER_SANITIZE_NUMBER_INT);
					$button_global = array(
						'link_text' => carbon_get_post_meta($id, 'global_button_link_text'),
						'link' => carbon_get_post_meta($id, 'global_button_' . carbon_get_post_meta($id, 'global_button_link_type')),
						'link_action' => carbon_get_post_meta($id, 'global_button_'),
						'class' => $args['class'],
						'data_aos' => 'fade-up'
					);
					echo $this->get_button($button_global);
				} else {
					echo $this->get_button($args);
				}
			}
		} else {
			return $this->get_button($args);
		}
	}
	function image($args)
	{
		echo $this->get_image($args);
	}
	function gallery($gallery, $class, $item_class)
	{
		echo $this->get_gallery($gallery, $class, $item_class);
	}

	function icon($icon, $class)
	{
		echo $this->get_icon($icon, $class);
	}

	function changing_text($text, $changing_text)
	{
		echo $this->get_changing_text($text, $changing_text);
	}
	function multiple_complex($fields, $wrapper = true)
	{
		foreach ($fields as $key => $field) {
			$field_type = $field['_type'];
			switch ($field_type) {
				case 'heading':
					echo $this->heading(array(
						'heading' => $field['heading'],
						'wrapper_class' => 'smaller',
						'data_aos' => 'fade-up'
					));
					break;
				case 'description':
					echo $this->description(array(
						'description' => $field['description'],
						'wrapper' => $wrapper,
						'data_aos' => 'fade-up'
					));
					break;
				case 'button':
					$array = array('page_link', 'post_link', 'service_link', 'custom_link');
					if (!in_array($field['button_link_type'], $array)) {
						echo $this->button(array(
							'link_type' => $field['button_link_type'],
						));
					} else {
						echo $this->button(array(
							'link_text' => $field['button_link_text'],
							'link' => $field['button_' . $field['button_link_type']],
							'link_action' => $field['button_link_action'],
							'class' => 'button-accent button-wide-padding',
							'data_aos' => 'fade-up'
						));
					}

					break;
				case 'image':
					echo $this->image(array(
						'image' => $field['image'],
						'size' => 'large',
						'data_aos' => 'fade-right',
						'class' => $field['fullwidth'] ? 'w100' : '',
						'wrapper_class' => $field['circle'] ? $field['circle'] : '',
						'data_aos' => 'fade-up'
					));
					break;
				case 'spacer':
					$margin = isset($field['height']) ? 'style="margin-bottom: ' . $field['height'] . '"' : '';
					echo '<div ' . $margin . ' id="spacer-' . $field_type . '-' . $key . '" class="spacer"></div>';
					break;
			}
		}
	}
	function post_type_details($post_type = 'post', $posts_per_page = -1, $post_status = 'publish', $display = true)
	{
		$post_list = $this->get_post_type_details($post_type, $posts_per_page, $post_status, $display);
		if ($post_list) { ?>
			<?php if ($display) { ?>
				<div class="row">
					<?php foreach ($post_list as $key => $post) { ?>
						<div class="col-md-4">
							<article id="post-<?= $key ?>">
								<div class="column-holder background-white">
									<div class="post-image">
										<?= $post['post_image'] ?>
									</div>
									<div class="inner-small">
										<?= $post['post_title'] ?>
										<?= $post['post_excerpt'] ?>
										<?= $post['post_button'] ?>
									</div>
								</div>
							</article>
						</div>
					<?php } ?>
				</div>
			<?php } else { ?>
				<?php return $post_list ?>
			<?php } ?>

		<?php }
	}

	function reviews()
	{
		$post_list = $this->get_trula_reviews();
		$Helpers = new Helpers();
		?>
		<?php if ($post_list) { ?>
			<div class="swiper-wrapper">
				<?php foreach ($post_list as $key => $post) { ?>

					<div class="swiper-slide">
						<div class="inner">
							<div class="review-stars">
								<?php $i = 0; ?>
								<?php while ($i != $post['review_stars']) { ?>
									<i class="fa-solid fa-star"></i>
									<?php $i++; ?>
								<?php  } ?>
							</div>
							<div class="review-title">
								<?= $Helpers->marks($post['review_title']) ?>
							</div>
							<div class="review-content">
								<?= $post['review_content'] ?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
<?php
	}
}

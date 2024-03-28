<?php 
trait GetData {
	function get_post_terms($taxonomy) {
		$terms = get_the_terms(get_the_ID(), $taxonomy);
		if(!$terms) return;
		ob_start();
		foreach($terms as $term) {
			?>
			<a class="button primary-button small" href="<?= get_term_link( $term ); ?>"><?= $term->name ?></a>
			<?php
		}
		return ob_get_clean();
	}

	function get_posts($post_type, $label = 'Select Post', $posts_per_page = -1, $post_status = 'publish') {
		$return = array();
		if($label) {
			$return[''] = $label;
		}
		$args = array(
			'post_type' => $post_type,
			'posts_per_page' => $posts_per_page,
			'post_status ' => $post_status
		);

		$posts = get_posts( $args );
		foreach ($posts as $post_val) {
			$return[$post_val->ID] = $post_val->post_title;
		}

		return $return;
	}
	function get_post_type_details($post_type, $posts_per_page, $post_status, $display) {
		$args = array(
			'numberposts' => $posts_per_page,
			'post_type'   => $post_type,
			'post_status ' => $post_status
		);

		$post_list = get_posts( $args );
		$return = array();
		foreach ( $post_list as $post ) {
			if($display) {
				$return[$post->ID] = array(
					'post_title' => '<a class="color-secondary d-block" href="'.get_permalink($post->ID).'">'.$this->get_heading(array(
						'heading' => $post->post_title,
						'tag'=>'h3',
						'data_aos' => 'fade-up',
						'class' => 'smaller'
					)).'</a>',
					'post_excerpt' => $this->get_description(array(
						'description' => get_the_excerpt( $post->ID )
					)),
					'post_image' => '<a class="color-secondary d-block" href="'.get_permalink($post->ID).'">'.$this->get_image(array(
						'image' => get_post_thumbnail_id($post->ID, 'large'),
						'data_aos' => 'fade-up',
						'wrapper_class' => 'image-absolute zoom-on-hover'
					)).'</a>',
					'post_button' => $this->get_button(array(
						'link_text' => 'READ MORE',
						'class' => 'button-secondary button-border button-smaller-padding',
					)),
				); 
			} else {
				$return[$post->ID] = array(
					'post_title' => $post->post_title,
					'post_excerpt' => get_the_excerpt( $post->ID ),
					'post_permalink' => get_permalink($post->ID),
					'post_image' => get_post_thumbnail_id($post->ID, 'large')
				); 
			}
		}

		return $return;
	}

	function get_trula_reviews() {
		$args = array(
			'numberposts' => 10,
			'post_type'   => 'testimonials',
			'post_status ' => 'publish'
		);

		$post_list = get_posts( $args );
		$return = array();
		foreach ( $post_list as $post ) {
			$return[$post->ID] = array(
				'review_title' => carbon_get_post_meta($post->ID, 'testimonial_title'),
				'review_content' => carbon_get_post_meta( $post->ID, 'testimonial_content'),
				'review_stars' => carbon_get_post_meta( $post->ID, 'stars'),
			); 
		}

		return $return;
		
	}
	function get_posts_v2($post_type, $label = 'Select Post', $posts_per_page = -1, $post_status = 'any') {
		$return = array();
		if($label) {
			$return[''] = $label;
		}
		$args = array(
			'post_type' => $post_type,
			'posts_per_page' => $posts_per_page,
			'post_status ' => $post_status
		);

		$posts = get_posts( $args );
		foreach ($posts as $post_val) {
			$return["'".$post_val->ID."'"] = $post_val->post_title;
		}

		return $return;
	}
	function get_post_type_list($post_type, $label = 'Select Post', $posts_per_page = -1, $post_status = 'any') {
		$return = array();
		$args_wp = array(
			'post_type' => $post_type,
			'numberposts' => $posts_per_page,
			'post_status ' => $post_status
		);
		$wp_query = new WP_Query($args_wp);
		if($label) {
			$return[''] = $label;
		}
		while ($wp_query->have_posts()) {

			$wp_query->the_post();

			$return[get_the_ID()] = get_the_title();

		}
		wp_reset_postdata();
		return $return;
	}
	function get_socials($socials, $class='') {
		ob_start();
		?>
		<ul class="socials list-inline mb-0 d-flex-al-center <?= $class ?>">
			<?php if($class == 'style-1') { ?>
				<li>
					<span class="item-wrapper item-label text-white">Find us on</span>
				</li>
			<?php } ?>
			<?php foreach ($socials as $social) { ?>
				<li>
					<a class="item-wrapper text-white social-icon" href="<?= $social['social_url'] ?>" target="_blank"><i class="<?= $social['social_name'] ?>"></i></a>
				</li>
			<?php } ?>
		</ul>

		<?php
		return ob_get_clean();
	}

	function get_meta_data($name, $label, $icon) {
		ob_start();
		if($this->cb($name)) {
			?>
			<li>
				<div class="icon-holder">
					<span class="label">
						<i class="<?= $icon ?>"></i>
						<?= $label ?>
					</span>
					<span class="value">
						<?= $this->cb($name); ?>
					</span>
				</div>
			</li>
			<?php
		}
		return ob_get_clean();
	}

	function get_heading($args = array()) {
		$heading = isset($args['heading']) ? $args['heading'] : '';
		if($heading) {
			$Helpers = new Helpers();
			$lastchar = substr(strip_tags($heading), -1);
			$svg_class = (str_contains($heading, 'trula') || str_contains($heading, 'Trula')) ? ' heading-svg align-center' : '';
			$hasdots = $lastchar != '.' && $lastchar != '?' && $lastchar != '!' ? ' hasdots' : '';
			$tag = isset($args['tag']) ? $args['tag'] : 'h2';
			$class = isset($args['class']) ? $args['class'].' ' : '';
			$wrapper_class = isset($args['wrapper_class']) ? $args['wrapper_class'] : '';
			$attribute = isset($args['attribute']) ? $args['attribute'] : '';
			$data_aos = isset($args['data_aos']) ? 'data-aos="'.$args['data_aos'].'"' : '';
			$tagclass = 'class="'.$class.$hasdots.$svg_class.'"';
			ob_start();
			?>
			<div class="heading-box <?= $wrapper_class ?>" <?= $attribute ?> <?= $data_aos ?>>
				<<?= $tag .' '. $tagclass ?>><?= do_shortcode($Helpers->marks_heading($heading)) ?></<?= $tag ?>>
			</div>
			<?php
			return ob_get_clean();
		}
	}

	function get_description($args) {
		$description = isset($args['description']) ? $args['description'] : '';
		if($description) {
			$Helpers = new Helpers();
			$description_val = $Helpers->marks($description);
			$class = isset($args['class']) ? $args['class'] : '';
			$attribute = isset($args['attribute']) ? $args['attribute'] : '';
			$wrapper = isset($args['wrapper']) ? $args['wrapper'] : true;
			$data_aos = isset($args['data_aos']) ? 'data-aos="'.$args['data_aos'].'"' : '';
			ob_start();
			?>
			<?php if($wrapper) { ?>
				<div class="description-box <?= $class ?>" <?= $attribute ?> <?= $data_aos ?>>
				<?php } ?>
				<?= do_shortcode( wpautop($description_val) ) ?>
				<?php if($wrapper) { ?>
				</div>
			<?php } ?>

			<?php
			return ob_get_clean();
		}
	}
	function get_link($link_type, $page, $post, $custom_link) {
		if($link_type == 'page_link') {
			return get_permalink( $page );
		} else if($link_type == 'post_link') {
			return get_permalink( $post );
		} else if($link_type == 'custom_link') {
			return $custom_link;
		}
	}

	function get_button($args) {
		$link_text = isset($args['link_text']) ? $args['link_text'] : '';
		if($link_text) {
			$class = isset($args['class']) ? $args['class'] : '';
			$attribute = isset($args['attribute']) ? $args['attribute'] : '';
			$link_action = isset($args['link_action']) ? $args['link_action'] : '';
			$link = isset($args['link']) ? $args['link'] : '';
			$link_val = get_permalink($link) ? get_permalink($link) : $link;
			$data_aos = isset($args['data_aos']) ? 'data-aos="'.$args['data_aos'].'"' : '';
			ob_start();
			?>
			<span class="button-box <?= $class ?>" <?= $attribute ?> <?= $data_aos ?>>
				<a href="<?= $link_val ?>" <?= $link_action ?>> 
					<span><?= $link_text ?> </span>
				</a>
			</span>
			<?php
			return ob_get_clean();
		}
	}

	function get_button_group($button_group, $class='') {
		if($button_group) {
			$links = '';
			foreach($button_group as $button) {
				$link_type = $button['link_type'];
				$link_text = $button['link_text'];
				$link_style = $button['link_style'];
				$link = $button[$link_type];
				$links .= $this->get_button($link_text, $link, $link_type, $link_style, false, false);
			}
			return '<span class="button-box '.$class.'"> '.$links.' </span>';
		}
	}


	function get_bg_image($val) {
		if($val) {
			return 'background-image: url('.wp_get_attachment_image_url( $val, 'full' ).')';
		}
	}

	function get_image($args) {
		$image = isset($args['image']) ? $args['image'] : '';
		if($image) {
			$alt = $this->get_image_alt($image);
			$size = isset($args['size']) ? $args['size'] : 'full'; 
			$image_url = wp_get_attachment_image_url($image, $size);
			$class = isset($args['class']) ? $args['class'] : '';
			$wrapper_class = isset($args['wrapper_class']) ? $args['wrapper_class'] : '';
			$attribute = isset($args['attribute']) ? $args['attribute'] : '';
			$data_aos = isset($args['data_aos']) ? 'data-aos="'.$args['data_aos'].'"' : '';
			ob_start();
			?>
			<div class="image-box <?= $wrapper_class ?>" role="figure" <?= $attribute ?> <?= $data_aos ?>>
				<img class="<?= $class ?>" src="<?= $image_url ?>" alt="<?= $alt ?>">
			</div>
			<?php
			return ob_get_clean();
		}

	}

	function get_size($size = 'medium', $sizedeskop='large') {
		if(wp_is_mobile()) {
			$size = $size;
		} else {
			$size = $sizedeskop;
		}
		return $size;
	}

	function get_image_alt($val) {
		$image_alt = get_post_meta($val, '_wp_attachment_image_alt', TRUE);
		$image_title = get_the_title($val);
		if($image_alt) {
			$alt = $image_alt;
		} else {
			$alt = $image_title;
		}
		return $alt;
	}

	function get_contact_forms() {
		$return = array('Select Form');
		$args_wp = array(
			'post_type' => 'wpcf7_contact_form',
			'posts_per_page' => -1,
			'post_status ' => 'publish'
		);
		$wp_query = new WP_Query($args_wp);
		while ($wp_query->have_posts()) {
			$wp_query->the_post();
			$shortcode = '[contact-form-7 id="'.get_the_ID().'" title="'.get_the_title().'"]';
			$return[$shortcode] = get_the_title();
		}
		wp_reset_postdata();
		return $return;
	}

	function get_contact_form_box($contact_form) {
		if($contact_form) {
			ob_start();
			?>
			<div class="contact-form-box" data-aos="fade-up">
				<?= do_shortcode( $contact_form )?>
			</div>
			<?php
			return ob_get_clean();
		}
	}

	function pagination( $the_query ) {
		$total_pages = $the_query->max_num_pages;
		$big = 999999999; 
		if ($total_pages > 1) {
			$current_page = max(1, get_query_var('paged'));
			echo '<div class="pagination">';
			echo paginate_links(array(
				'prev_text' => '<span><i class="fas fa-chevron-left"></i></span>',
				'next_text' => '<span><i class="fas fa-chevron-right"></i></span>',
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => $current_page,
				'total' => $total_pages,

			));
			echo '</div>';
		}
	}

	function get_title() {
		if(is_tax()) {
			$term = get_queried_object();
			$args = array(
				'heading' => $term->name
			);
			return $this->get_heading($args);
		} else {
			$alt_title = carbon_get_the_post_meta('alt_title');

			if($alt_title) {
				$args = array(
					'heading' => $alt_title
				);
				return $this->get_heading($args);
			} else {
				$args = array(
					'heading' => get_the_title()
				);
				return $this->get_heading($args);
			}
		}
	}


	function get_bg_type($background, $alt='') {
		ob_start();
		$bg_type = get_post_mime_type($background);
		if(str_contains($bg_type, 'video') == true) {
			?>
			<video autoplay loop muted>
				<?= '<source src="'.wp_get_attachment_url($background).'" type="video/mp4"/>' ?>
				Your browser does not support the video tag.
			</video>
			<?php
		} 
		if(str_contains($bg_type, 'image') == true) {
			?>
			<img width="100%" height="100%" src="<?= wp_get_attachment_image_url($background, 'large') ?>" alt="<?= $alt ?>">
			<?php
		}

		return ob_get_clean();
	}

	function get_incrementing_numbers($numbers) {
		if($numbers) {
			ob_start();
			$count = count($numbers);
			if($count == 4) {
				$class = 'col-md-3';
			} else if($count == 3) {
				$class = 'col-md-4';
			} else if($count == 2) {
				$class = 'col-md-6';
			} else if($count == 1) {
				$class = 'col-md-12';
			}
			?>
			<?php foreach($numbers as $number) {?>
				<div class="<?= $class ?>">
					<div class="column-holder">
						<div class="incrementing-number-box">
							<span class="incrementing-number main-text" style="--value: <?= $number['number'] ?>"></span>
							<span class="main-text">+</span>
							<span class="label"><?= $number['label'] ?></span>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php
			return ob_get_clean();
		}
	}
	function get_style($value, $selector, $css) {
		if($value) {
			if($css == 'background-image') {
				echo $selector.'{'.$css.': url('.wp_get_attachment_image_url($value, 'full').')}';
			} else {
				echo $selector.'{'.$css.': '.$value.'}';
			}
		}
	}



	function get_gallery($gallery_id, $class, $item_class = '') {
		$gallery = carbon_get_post_meta($gallery_id, 'gallery');
		if($gallery) {
			ob_start();
			?>
			<div class="<?= $class ?>" data-aos="fade-up">
				<?php foreach($gallery as $image) { ?>
					<?php
					$args = array(
						'image' => $image,
						'wrapper_class' => $item_class,
						'size' => 'medium',
					);
					echo $this->get_image($args);
					?>
				<?php } ?>
			</div>
			<?php
			return ob_get_clean();
		}
	}

	function get_icon($icon, $class) {
		if($icon) {
			ob_start();
			?>
			<div class="icon-box fontawesome <?= $class ?>" role="figure">
				<?= $icon ?>
			</div>
			<?php
			return ob_get_clean();
		}
	}

	function get_changing_text($text, $changing_text) {
		ob_start();
		?>
		<h3 class="mb-0 animated-heading justify-center">
			<span class="color-white main-text"><?= $text ?></span> 
			<?php if($changing_text) { ?>
				<div class="swiper changing-text">
					<span class="swiper-wrapper">
						<?php foreach($changing_text as $changingtext) { ?>
							<span class="swiper-slide">
								<?= $changingtext['text'] ?><span class="color-white">.</span>
							</span>
						<?php } ?>
					</span>
				</div>
			<?php } ?>
		</h3>
		<?php
		return ob_get_clean();
	}
}
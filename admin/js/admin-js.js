jQuery(document).ready(function($) {
	toggle();
	codemirror();
});

function toggle() {
	jQuery(document).on("click", ".data-parent", function(){
		$this = jQuery(this);

		$data_target = $this.parents('.cf-complex__group').find('.'+$this.attr('data-target'));
		if($data_target.hasClass('collapse')) {
			$data_target.removeClass('collapse');
		} else {
			$data_target.addClass('collapse');
		}
	});
}
function codemirror() {
	setTimeout(function() {
		if(jQuery('textarea[name="carbon_fields_compact_input[_page_custom_css]"').length > 0) {
			wp.codeEditor.initialize(jQuery('textarea[name="carbon_fields_compact_input[_page_custom_css]"'), cm_settings.ce_css);
		}
		if(jQuery('textarea[name="carbon_fields_compact_input[_page_header_scripts]"').length > 0) {
			wp.codeEditor.initialize(jQuery('textarea[name="carbon_fields_compact_input[_page_header_scripts]"'), cm_settings.ce_html);
		}

		if(jQuery('textarea[name="carbon_fields_compact_input[_page_footer_scripts]"').length > 0) {
			wp.codeEditor.initialize(jQuery('textarea[name="carbon_fields_compact_input[_page_footer_scripts]"'), cm_settings.ce_html);
		}

		if(jQuery('textarea[name="carbon_fields_compact_input[_header_scripts]"').length > 0) {
			wp.codeEditor.initialize(jQuery('textarea[name="carbon_fields_compact_input[_header_scripts]"'), cm_settings.ce_html);
		}

		if(jQuery('textarea[name="carbon_fields_compact_input[_footer_scripts]"').length > 0) {
			wp.codeEditor.initialize(jQuery('textarea[name="carbon_fields_compact_input[_footer_scripts]"'), cm_settings.ce_html);
		}

	}, 500);
}
/*
jQuery(document).ready(function($) {
	console.log('xxxxx');
	jQuery('.cf-complex__group-body').each(function(index, el) {
		var $this = jQuery(this);
		$this.find('.data-parent').on( "click", function() {
			$data_target = jQuery(this).attr('data-target');
			jQuery($this).find('.'+$data_target).removeClass('collapse');
			console.log($data_target);
		});
	});
});

function showfields($class) {
	if(jQuery('.'+$class).hasClass('collapse')) {
		jQuery('.'+$class).removeClass('collapse');
	} else {
		jQuery('.'+$class).addClass('collapse');
	}
}*/
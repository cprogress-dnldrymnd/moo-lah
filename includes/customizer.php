<?php 
class newCustomizer {
    function __construct($type, array $param) {
        add_action('customize_register', array( $this, $type));
        if(isset($param['type'])) {
            $this->type = $param['type'];
        }
        if(isset($param['settings'])) {
            $this->settings = $param['settings'];
        }
        if(isset($param['label'])) {
            $this->label = $param['label'];
        }
        if(isset($param['section'])) {
            $this->section = $param['section'];
        }
        if(isset($param['name'])) {
            $this->name = $param['name'];
        }
        if(isset($param['title'])) {
            $this->title = $param['title'];
        }

        if(isset($param['priority'])) {
            $this->priority = $param['priority'];
        }

        if(isset($param['panel'])) {
            $this->panel = $param['panel'];
        }

        if(isset($param['capability'])) {
            $this->capability = $param['capability'];
        }

        if(isset($param['panel_id'])) {
            $this->panel_id = $param['panel_id'];
        }
        if(isset($param['description'])) {
            $this->description = $param['description'];
        }



    }

    function create_control_image($wp_customize) {
        $wp_customize->add_setting($this->settings, array(
            'type' => 'option',
            'capability' => 'edit_theme_options'
        ));
        $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, $this->settings,
            array(
                'label' => $this->label,
                'section' => $this->section,
                'settings' => $this->settings,
                'description' => $this->description,
            )
        ));
    }

    function create_control($wp_customize) {
        $wp_customize->add_setting($this->settings, array(
            'type' => 'option',
            'capability' => 'edit_theme_options'
        ));
        $wp_customize->add_control($this->settings, array(
            'type' => $this->type,
            'label' => $this->label,
            'section' => $this->section,
            'settings' => $this->settings,
            'description' => $this->description,
        ));
    }


    function create_section($wp_customize) {
        $wp_customize->add_section( $this->name , array(
            'title'      => __( $this->title, 'tissue-paper' ),
            'priority'   => $this->priority,
            'panel'      => $this->panel_id
        ) );
    }

    function create_panel($wp_customize) {
        $wp_customize->add_panel( $this->panel_id, array(
            'priority'       => $this->priority,
            'capability'     =>  $this->capability,
            'title'          =>  __( $this->title, 'tissue-paper' ),

        ) );
    }
}

//Header
new newCustomizer('create_section', array(
    'name' => 'section_top_bar',
    'title' => 'Top Bar',
    'priority' => 105,
    'panel_id'  => 'panel_header',
));



new newCustomizer('create_section', array(
    'name' => 'section_global',
    'title' => 'Globals',
    'priority' => 115,
));

//Site Identity
new newCustomizer('create_control_image', array(
    'settings' => 'theme_logo',
    'label' => 'Site Logo',
    'section' => 'title_tagline',
));

//Header
new newCustomizer('create_panel', array(
    'priority'       => 100,
    'capability'     => 'edit_theme_options',
    'title'          => 'Header',
    'panel_id'       => 'panel_header'
));

new newCustomizer('create_section', array(
    'name' => 'section_socials',
    'title' => 'Socials',
    'priority' => 110,
));


new newCustomizer('create_control', array(
    'type' => 'text',
    'settings' => 'top_bar_site_phone',
    'label' => 'Phone',
    'section' => 'section_top_bar',
    'description' =>'Leave this blank to use default'
));


new newCustomizer('create_control', array(
    'type' => 'checkbox',
    'settings' => 'top_bar_display_google_review',
    'label' => 'Display Google Review',
    'section' => 'section_top_bar',
));

new newCustomizer('create_control', array(
    'type' => 'text',
    'settings' => 'top_bar_google_review_link',
    'label' => 'Google Review URL',
    'section' => 'section_top_bar',
));


new newCustomizer('create_control', array(
    'type' => 'checkbox',
    'settings' => 'top_bar_display_facebook_review',
    'label' => 'Display Facebook Review',
    'section' => 'section_top_bar',
));


new newCustomizer('create_control', array(
    'type' => 'text',
    'settings' => 'top_bar_facebook_review_link',
    'label' => 'Facebook Review URL',
    'section' => 'section_top_bar',
));


//Footer
new newCustomizer('create_section', array(
    'name' => 'section_footer',
    'title' => 'Footer',
    'priority' => 100,
));

new newCustomizer('create_control', array(
  'type' => 'textarea',
  'settings' => 'copyright_text',
  'label' => 'Copyright Text',
  'section' => 'section_footer',
  'description' =>'Defaults to &copy '.get_bloginfo('name')
));


new newCustomizer('create_control', array(
  'type' => 'text',
  'settings' => 'telephone',
  'label' => 'Telephone',
  'section' => 'section_global',
));


new newCustomizer('create_control', array(
  'type' => 'text',
  'settings' => 'email_address',
  'label' => 'Email Address',
  'section' => 'section_global',
));


new newCustomizer('create_control', array(
  'type' => 'textarea',
  'settings' => 'address',
  'label' => 'Addresss',
  'section' => 'section_global',
));
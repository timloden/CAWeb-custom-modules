<?php

class CACM_Content_Slider_Slide extends ET_Builder_Module {
    
    public $slug       = 'cacm_content_slider_slide';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://caweb.cdt.ca.gov/',
        'author'     => 'CAWeb Publishing',
        'author_uri' => '',
    );

    public function init() {
        $this->slug = 'cacm_content_slider_slide';
        $this->name = esc_html__( 'Slide', 'cacm-caweb-custom-modules' );
        $this->type = 'child';
        $this->child_title_var = 'title';
        $this->child_title_fallback_var = 'title';

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'slide-content'   => esc_html__('Slide Content', 'cacm-caweb-custom-modules'),
                ),
            ),
        );
    }

    public function get_fields() {
        return array(
            'title' => array(
                'label'           => esc_html__('Title', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the name of the profile.', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'slide-content',
            ),

            'background' => array(
                'label'              => esc_html__('Background Image', 'cacm-caweb-custom-modules'),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'cacm-caweb-custom-modules'),
                'choose_text'        => esc_attr__('Choose an Image', 'cacm-caweb-custom-modules'),
                'update_text'        => esc_attr__('Set As Image', 'cacm-caweb-custom-modules'),
                'description'        => esc_html__('Upload your desired image, or type in the URL to the image you would like to display.', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'slide-content',
            ),

            'content'     => array(
                'label'           => esc_html__( 'Slide Content', 'cacm-caweb-custom-modules' ),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear below the heading text.', 'cacm-caweb-custom-modules' ),
                'toggle_slug'     => 'slide-content',
            ),

            'show_button' => array(
                'label'           => esc_html__('Show Button', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('button_text', 'button_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'slide-content',
            ),

            'button_text' => array(
                'label'           => esc_html__('Button Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'slide-content',
            ),

            'button_link' => array(
                'label'           => esc_html__('Button Link', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the location.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'slide-content',
            ),

            'use_backdrop' => array(
                'label'           => esc_html__('Use Backdrop', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'description'     => esc_html__('This will add a slight opaque grey background to this slide.', 'cacm-caweb-custom-modules'),
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('button_text', 'button_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'slide-content',
            ),

            'slider_style' => array(
                'label'           => esc_html__('Title', 'cacm-caweb-custom-modules'),
                'type'            => 'hidden',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the name of the profile.', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug' => 'body',
            ),
        );
    }

    function maybe_inherit_values() {
        global $slider_style;
        $this->props['slider_style'] = $slider_style;
    }


    public function render( $unprocessed_props, $content = null, $render_slug ) {        
        $title  = $this->props['title'];
        $background = $this->props['background'];
        $content = $this->content;
        $show_button = $this->props['show_button'];
        $button_text = $this->props['button_text'];
        $button_link = $this->props['button_link'];
        $use_backdrop = $this->props['use_backdrop'];

        $slider_style = $this->props['slider_style'];
       
        $show_button = ("on" == $show_button ? sprintf('<a href="%2$s"><button class="btn btn-primary">%1$s</button></a>', $button_text, $button_link) : '');

        $content_fit = ("content_fit" == $slider_style ? sprintf('style="background-image: url(%1$s);', $background) : '');
        $image_fit = ("image_fit" == $slider_style ? sprintf('<img src="%1$s" alt="background" />', $background) : '');

        $use_backdrop = ("on" == $use_backdrop ? sprintf('backdrop') : '');

        $output = sprintf(
            '<div class="item %6$s" %4$s);">
                %5$s
                <div class="content-container">
                    <div class="content">
                        <h2>%1$s</h2>
                        <p>%2$s</p>
                        %3$s
                    </div>
                </div>
            </div>
            ',
            $title,
            $content,
            $show_button,
            $content_fit,
            $image_fit,
            $use_backdrop
        );


        return $output;
    }
}

new CACM_Content_Slider_Slide;

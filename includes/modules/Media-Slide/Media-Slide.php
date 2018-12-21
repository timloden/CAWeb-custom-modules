<?php

class CACM_Media_Slider_Slide extends ET_Builder_Module {
    
    public $slug       = 'cacm_media_slider_slide';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://caweb.cdt.ca.gov/',
        'author'     => 'Tim Loden',
        'author_uri' => '',
    );

    public function init() {
        $this->slug = 'cacm_media_slider_slide';
        $this->name = esc_html__( 'Slide', 'cacm-caweb-custom-modules' );
        $this->type = 'child';
        $this->child_title_var = 'title';
        $this->child_title_fallback_var = 'title';
    }

    public function get_fields() {
        return array(
            'title' => array(
                'label'           => esc_html__('Title', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the name of the profile.', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'body',
            ),

            'image' => array(
                'label'              => esc_html__('Image', 'cacm-caweb-custom-modules'),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'cacm-caweb-custom-modules'),
                'choose_text'        => esc_attr__('Choose an Image', 'cacm-caweb-custom-modules'),
                'update_text'        => esc_attr__('Set As Image', 'cacm-caweb-custom-modules'),
                'description'        => esc_html__('Upload your desired image, or type in the URL to the image you would like to display.', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'body',
            ),

            'content' => array(
                'label'           => esc_html__( 'Slide Description', 'cacm-caweb-custom-modules' ),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear below the image.', 'cacm-caweb-custom-modules' ),
                'toggle_slug'     => 'body',
            ),

        );
    }

    public function render( $unprocessed_props, $content = null, $render_slug ) {        
        $title  = $this->props['title'];
        $image = $this->props['image'];
        $content = $this->content;

        $output = sprintf(
            '<div class="item">
                <div class="preview-image">
                    <img src="%2$s" alt="%3$s">
                </div>
                <div class="details">
                    %3$s
                </div>
            </div>
            ',
            $title,
            $image,
            $content
        );


        return $output;
    }
}

new CACM_Media_Slider_Slide;

<?php

class CACM_Gallery_Image extends ET_Builder_Module {
    
    public $slug       = 'cacm_gallery_image';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://caweb.cdt.ca.gov/',
        'author'     => 'Tim Loden',
        'author_uri' => '',
    );

    public function init() {
        $this->slug = 'cacm_gallery_image';
        $this->name = esc_html__( 'Image', 'cacm-caweb-custom-modules' );
        $this->type = 'child';
        $this->child_title_var = 'image_title';
        $this->child_title_fallback_var = 'image_title';
         $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'image'  => esc_html__('Image', 'cacm-caweb-custom-modules'),
                ),
            ),
        );
    }

    public function get_fields() {
        return array(
            'image_title' => array(
                'label' => esc_html__('Image Title / Alt Text', 'cacm-caweb-custom-modules'),
                'type'=> 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Define the title for the Image', 'et_builder'),
                'tab_slug'  => 'general',
                'toggle_slug'   => 'image',
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
                'toggle_slug'        => 'image',
            ),

        );
    }

    public function render( $unprocessed_props, $content = null, $render_slug ) {        
        $image = $this->props['image'];
        $image_title = $this->props['image_title'];

        $output = sprintf(
            '<div class="item">
                <a class="gallery-item" href="%1$s" data-gallery="gallery-1">
                    <span class="sr-only">%2$s</span>
                    <img src="%1$s" alt="%2$s">
                </a>
            </div>
            ',
            $image,
            $image_title

        );


        return $output;
    }
}

new CACM_Gallery_Image;

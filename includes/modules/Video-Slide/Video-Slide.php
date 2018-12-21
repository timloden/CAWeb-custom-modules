<?php

class CACM_Video_Slider_Slide extends ET_Builder_Module {
    
    public $slug       = 'cacm_video_slider_slide';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://caweb.cdt.ca.gov/',
        'author'     => 'Tim Loden',
        'author_uri' => '',
    );

    public function init() {
        $this->slug = 'cacm_video_slider_slide';
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

            'video_url' => array(
                'label'           => esc_html__('Video URL', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter YouTube video url (ex: https://www.youtube.com/watch?v=2u2uaZ2rYSQ )', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),
        );
    }

    function maybe_inherit_values() {
    }


    public function render( $unprocessed_props, $content = null, $render_slug ) {        
        $title  = $this->props['title'];
        $video_url = $this->props['video_url'];

        $output = sprintf(
            '<div class="item">
                <div class="owl-video-wrapper">
                    <a href="%2$s">
                        <span class="sr-only">%1$</span>
                    </a>
                </div>
            </div>
            ',
            $title,
            $video_url
        );


        return $output;
    }
}

//new CACM_Video_Slider_Slide;

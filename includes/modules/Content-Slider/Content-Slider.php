<?php

class CACM_Content_Slider extends ET_Builder_Module {

	public $slug       = 'cacm_content_slider';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'Tim Loden',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Content Slider', 'cacm-caweb-custom-modules' );
        $this->child_slug      = 'cacm_content_slider_slide';
        $this->child_item_text = esc_html__('Slide', 'cacm-caweb-custom-modules');
	}

	public function get_fields() {
		return array(
			'slider_style' => array(
                'label'             => esc_html__('Slider Style', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'content_fit' => esc_html__('Content Fit', 'cacm-caweb-custom-modules'),
                    'image_fit'  => esc_html__('Image Fit', 'cacm-caweb-custom-modules'),
                ),
                'default' => 'content_fit',
                'tab_slug' => 'general',
                'toggle_slug'       => 'style',
            ),
		);
	}

    public function before_render() {
        global $slider_style;
         $slider_style = $this->props['slider_style'];
    }

	public function render( $unprocessed_props, $content = null, $render_slug ) {
        $content = $this->content;
        $output = sprintf(
            '<div class="carousel owl-carousel carousel-content">
                %1$s
            </div>
            ',
            $content
        );


        return $output;
	}
}

new CACM_Content_Slider;


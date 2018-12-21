<?php

class CACM_Video_Slider extends ET_Builder_Module {

	public $slug       = 'cacm_video_slider';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'Tim Loden',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Video Slider', 'cacm-caweb-custom-modules' );
        $this->child_slug      = 'cacm_video_slider_slide';
        $this->child_item_text = esc_html__('Slide', 'cacm-caweb-custom-modules');
	}

	public function get_fields() {
		return array(
		);
	}

    public function before_render() {

    }

	public function render( $unprocessed_props, $content = null, $render_slug ) {
        $content = $this->content;
        $output = sprintf(
            '<div class="carousel owl-carousel carousel-video">
                %1$s
            </div>
            ',
            $content
        );


        return $output;
	}
}

//new CACM_Video_Slider;


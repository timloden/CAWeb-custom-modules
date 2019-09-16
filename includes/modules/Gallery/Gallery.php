<?php

class CACM_Gallery extends ET_Builder_Module {

	public $slug       = 'cacm_gallery';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'Tim Loden',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Gallery', 'cacm-caweb-custom-modules' );
        $this->child_slug      = 'cacm_gallery_image';
        $this->child_item_text = esc_html__('Image', 'cacm-caweb-custom-modules');
	}

	public function get_fields() {
		return array(
			
            'row_count' => array(
                'label'             => esc_html__('Items Per Row', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'basic_option',
                'options'           => array(
                    'default' => esc_html__('Default', 'cacm-caweb-custom-modules'),
                    'three-up'  => esc_html__('3', 'cacm-caweb-custom-modules'),
                    'four-up'  => esc_html__('4', 'cacm-caweb-custom-modules'),
                ),
                'default' => 'default',
                'tab_slug' => 'general',
                'toggle_slug'       => 'style',
            ),

            'animation' => array(
                'label'             => esc_html__('Animation', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'basic_option',
                'options'           => array(
                    'default' => esc_html__('Default', 'cacm-caweb-custom-modules'),
                    'bounceInLeft'  => esc_html__('Bounce in left', 'cacm-caweb-custom-modules'),
                    'bounceInRight'  => esc_html__('Bounce in right', 'cacm-caweb-custom-modules'),
                    'bounceInUp'  => esc_html__('Bounce in up', 'cacm-caweb-custom-modules'),
                    'fadeInUp'  => esc_html__('Fade in up', 'cacm-caweb-custom-modules'),
                    'slideInLeft'  => esc_html__('Slide in left', 'cacm-caweb-custom-modules'),
                    'slideInRight'  => esc_html__('Slide in right', 'cacm-caweb-custom-modules'),
                    'slideInUp'  => esc_html__('Slide in up', 'cacm-caweb-custom-modules'),
                    'pulse'  => esc_html__('Pulse', 'cacm-caweb-custom-modules'),
                    'shake'  => esc_html__('Shake', 'cacm-caweb-custom-modules'),
                    'jello'  => esc_html__('Jello', 'cacm-caweb-custom-modules'),
                ),
                'default' => 'default',
                'tab_slug' => 'general',
                'toggle_slug'       => 'style',
            ),
		);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
        $row_count = $this->props['row_count'];
        $animation = $this->props['animation'];
        $content = $this->content;

        $row_count = ("default" != $row_count ? sprintf('%1$s', $row_count) : '');
        $animation = ("default" != $animation ? sprintf('animate-%1$s', $animation) : '');
        
        $output = sprintf(
            '<div class="gallery %2$s %3$s">
                %1$s
            </div>
            ',
            $content, 
            $row_count, 
            $animation
        );


        return $output;
	}
}

new CACM_Gallery;


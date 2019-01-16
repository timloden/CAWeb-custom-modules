<?php

class CACM_Figure_Caption extends ET_Builder_Module {

	public $slug       = 'cacm_figure_caption';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'CAWeb Publishing',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Figure with Caption', 'cacm-caweb-custom-modules' );
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'image' => esc_html__('Image', 'cacm-caweb-custom-modules'),
                    'caption'   => esc_html__('Caption', 'cacm-caweb-custom-modules'),
                ),
            ),
        );
	}

	public function get_fields() {
		return array(
            'image' => array(
                'label' => esc_html__('Image', 'cacm-caweb-custom-modules'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'cacm-caweb-custom-modules'),
                'toggle_slug'       => 'image',
            ),
            'caption_title'     => array(
                'label'           => esc_html__( 'Caption Title', 'cacm-caweb-custom-modules' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( '', 'cacm-caweb-custom-modules' ),
                'toggle_slug'     => 'caption',
            ),
			'content'     => array(
				'label'           => esc_html__( 'Caption Content', 'cacm-caweb-custom-modules' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'cacm-caweb-custom-modules' ),
				'toggle_slug'     => 'caption',
			),
			
		);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
		
        $image = $this->props['image'];
        $caption_title = $this->props['caption_title'];
		$content = $this->content;

		$output = sprintf(
            '<figure itemscope itemtype="http://schema.org/CreativeWork">
                <img alt="" src="%1$s">
                <figcaption itemprop="description">
                    <strong>%2$s</strong>
                    %3$s
                </figcaption>
            </figure>', $image, $caption_title, $content );

        return $output;
	}
}

new CACM_Figure_Caption;

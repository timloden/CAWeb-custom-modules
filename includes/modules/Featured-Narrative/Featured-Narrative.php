<?php

class CACM_Featured_Narrative extends ET_Builder_Module {

	public $slug       = 'cacm_featured_narrative';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'CAWeb Publishing',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Featured Narrative', 'cacm-caweb-custom-modules' );
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'content' => esc_html__('Content', 'cacm-caweb-custom-modules'),
                ),
            ),
        );
	}

	public function get_fields() {
		return array(
            'title'     => array(
                'label'           => esc_html__( 'Title', 'cacm-caweb-custom-modules' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( '', 'cacm-caweb-custom-modules' ),
                'toggle_slug'     => 'content',
            ),
			'content'     => array(
				'label'           => esc_html__( 'Content', 'cacm-caweb-custom-modules' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'cacm-caweb-custom-modules' ),
				'toggle_slug'     => 'content',
			),
			
		);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
		
        $title = $this->props['title'];
		$content = $this->content;

		$output = sprintf(
            '<aside class="featured-narrative">
                <strong>%1$s</strong>
                %2$s
            </aside>', $title, $content );

        return $output;
	}
}

new CACM_Featured_Narrative;

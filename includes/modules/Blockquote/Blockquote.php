<?php

class CACM_Blockquote extends ET_Builder_Module {

	public $slug       = 'cacm_blockquote';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'CAWeb Publishing',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Blockquote', 'cacm-caweb-custom-modules' );
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'body'   => esc_html__('Body', 'cacm-caweb-custom-modules'),
                ),
            ),
        );
	}

	public function get_fields() {
		return array(
            'name'     => array(
				'label'           => esc_html__( 'Author Name', 'cacm-caweb-custom-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'cacm-caweb-custom-modules' ),
				'toggle_slug'     => 'body',
			),
            'source'     => array(
                'label'           => esc_html__( 'Source', 'cacm-caweb-custom-modules' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( '', 'cacm-caweb-custom-modules' ),
                'toggle_slug'     => 'body',
            ),
			'content'     => array(
				'label'           => esc_html__( 'Content', 'cacm-caweb-custom-modules' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'cacm-caweb-custom-modules' ),
				'toggle_slug'     => 'body',
			),
            'text_align' => array(
                'label'             => esc_html__('Text Align', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'left' => esc_html__('Left', 'cacm-caweb-custom-modules'),
                    'right'  => esc_html__('Right', 'cacm-caweb-custom-modules'),
                ),
                'default' => 'left',
                'toggle_slug'       => 'body',
            ),
			
		);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
		
        $name = $this->props['name'];
        $source = $this->props['source'];
		$content = $this->content;
        $text_align = $this->props['text_align'];

        $text_align = ($text_align == 'right' ? 'class="blockquote-reverse"' : '');

		$output = sprintf(
            '<blockquote %4$s>
                %3$s
                <footer>%1$s in <cite title="%2$s">%2$s</cite></footer>
            </blockquote>', $name, $source, $content, $text_align );

        return $output;
	}
}

new CACM_Blockquote;

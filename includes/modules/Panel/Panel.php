<?php

class CACM_Panel extends ET_Builder_Module {

	public $slug       = 'cacm_panel';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'Tim Loden',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Panel', 'cacm-caweb-custom-modules' );
	}

	public function get_fields() {
		return array(
			'panel_layout' => array(
                'label'             => esc_html__('Panel Style', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'default' => esc_html__('Default', 'cacm-caweb-custom-modules'),
                    'standout'  => esc_html__('Standout', 'cacm-caweb-custom-modules'),
                    'standout highlight'  => esc_html__('Standout Highlight', 'cacm-caweb-custom-modules'),
                    'overstated'  => esc_html__('Overstated', 'cacm-caweb-custom-modules'),
                    'understated'  => esc_html__('Understated', 'cacm-caweb-custom-modules'),
                ),
                'default' => 'default',
                'tab_slug' => 'general',
                'toggle_slug'		=> 'style',
            ),
            'show_icon' => array(
                'label'           => esc_html__('Include Icon', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('featured_image'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'style',
            ),
            'header_text'     => array(
				'label'           => esc_html__( 'Header Title', 'cacm-caweb-custom-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired heading here.', 'cacm-caweb-custom-modules' ),
				'toggle_slug'     => 'header',
			),
			'content'     => array(
				'label'           => esc_html__( 'Card Content', 'cacm-caweb-custom-modules' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear below the heading text.', 'simp-simple-extension' ),
				'toggle_slug'     => 'body',
			),
			'show_button' => array(
                'label'           => esc_html__('Button', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('button_text', 'button_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'body',
            ),
            'button_text' => array(
                'label'           => esc_html__('Button Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'body',
            ),
            'button_link' => array(
                'label'           => esc_html__('Card URL', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the location.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'body',
            ),
		);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
		$panel_layout = $this->props['panel_layout'];
		$show_icon = $this->props['show_icon'];
        $header_text = $this->props['header_text'];
		$content = $this->content;
		$show_button = $this->props['show_button'];
        $button_text = $this->props['button_text'];
        $button_link = $this->props['button_link'];

		$class = sprintf('panel-%1$s', $panel_layout);

		$display_icon = ("on" == $show_icon ? sprintf('<span class="ca-gov-icon-info"></span>') : '');

        $show_button = ("on" == $show_button ? sprintf('<div class="options"><a href="%2$s" class="btn btn-default">%1$s</a></div>', $button_text, $button_link) : '');

		$output = sprintf('<div class="panel %1$s"><div class="panel-heading"><h3>%2$s %3$s</h3>%4$s</div><div class="panel-body">%5$s</div></div>', $class, $display_icon, $header_text, $show_button, $content );

        return $output;
	}
}

new CACM_Panel;

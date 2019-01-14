<?php

class CACM_Media_Slider extends ET_Builder_Module {

	public $slug       = 'cacm_media_slider';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'Tim Loden',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Media Slider', 'cacm-caweb-custom-modules' );
        $this->child_slug      = 'cacm_media_slider_slide';
        $this->child_item_text = esc_html__('Slide', 'cacm-caweb-custom-modules');
	}

	public function get_fields() {
		return array(
			'show_panel' => array(
                'label'           => esc_html__('Use Panel?', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('panel_style', 'panel_title', 'panel_show_button'),
                'tab_slug' => 'general',
                'toggle_slug' => 'style',
            ),
            'panel_style' => array(
                'label'             => esc_html__('Panel Style', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'basic_option',
                'show_if' => array('show_panel' => 'on'),
                'options'           => array(
                    'default' => esc_html__('Default', 'cacm-caweb-custom-modules'),
                    'standout'  => esc_html__('Standout', 'cacm-caweb-custom-modules'),
                    'standout highlight'  => esc_html__('Standout Highlight', 'cacm-caweb-custom-modules'),
                    'overstated'  => esc_html__('Overstated', 'cacm-caweb-custom-modules'),
                    'understated'  => esc_html__('Understated', 'cacm-caweb-custom-modules'),
                ),
                'default' => 'default',
                'tab_slug' => 'general',
                'toggle_slug'       => 'style',
            ),
            'panel_title' => array(
                'label'           => esc_html__('Panel Title', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_panel' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'style',
            ),
            'panel_show_button' => array(
                'label'           => esc_html__('Show Button?', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('panel_button_text', 'panel_button_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'style',
            ),
            'panel_button_text' => array(
                'label'           => esc_html__('Button Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('panel_show_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'style',
            ),
            'panel_button_link' => array(
                'label'           => esc_html__('Button Link', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the location.', 'cacm-caweb-custom-modules'),
                'show_if' => array('panel_show_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'style',
            ),
		);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
        $show_panel = $this->props['show_panel'];
        $panel_style = $this->props['panel_style'];
        $panel_title = $this->props['panel_title'];
        $content = $this->content;
        $show_button = $this->props['panel_show_button'];
        $button_text = $this->props['panel_button_text'];
        $button_link = $this->props['panel_button_link'];

        $show_button = ("on" == $show_button ? sprintf('<div class="options"><a href="%2$s" class="btn btn-default">%1$s</a></div>', $button_text, $button_link) : '');

        $show_panel = ("on" == $show_panel ? sprintf('<div class="panel panel-%1$s"><div class="panel-heading"><h3>%2$s </h3>%3$s</div><div class="panel-body">',$panel_style, $panel_title, $show_button) : '');

        $close_panel = ("on" == $show_panel ? sprintf('</div>') : '');
        
        $output = sprintf(
            '
            %2$s
            <div class="carousel owl-carousel carousel-media">
                %1$s
            </div>
            %3$s
            ',
            $content, 
            $show_panel, 
            $close_panel
        );


        return $output;
	}
}

new CACM_Media_Slider;


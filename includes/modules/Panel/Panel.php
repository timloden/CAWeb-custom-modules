<?php

class CA_Panel extends ET_Builder_Module {

	public $slug       = 'et_pb_ca_panel';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'CAWeb Publishing',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Panel', 'cacm-caweb-custom-modules' );
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'style'  => esc_html__('Style', 'cacm-caweb-custom-modules'),
                    'header' => esc_html__('Header', 'cacm-caweb-custom-modules'),
                    'body'   => esc_html__('Body', 'cacm-caweb-custom-modules'),
                ),
            ),
        );
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
            'show_image' => array(
                'label'           => esc_html__('Include Image', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('featured_image'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'style',
            ),
            'featured_image' => array(
                'label' => esc_html__('Image', 'cacm-caweb-custom-modules'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'cacm-caweb-custom-modules'),
                'choose_text' => esc_attr__('Choose a Background Image', 'cacm-caweb-custom-modules'),
                'update_text' => esc_attr__('Set As Background', 'cacm-caweb-custom-modules'),
                'description' => esc_html__('If defined, this image will be used as the background for this location. To remove a background image, simply delete the URL from the settings field.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_image' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'style',
            ),
            'image_layout' => array(
                'label'             => esc_html__('Align Image', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'left' => esc_html__('Left', 'cacm-caweb-custom-modules'),
                    'right'  => esc_html__('Right', 'cacm-caweb-custom-modules'),
                ),
                'default' => 'left',
                'show_if' => array('show_image' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'style',
            ),
            'title'     => array(
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
                'toggle_slug' => 'style',
            ),
            'button_text' => array(
                'label'           => esc_html__('Button Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'style',
            ),
            'button_link' => array(
                'label'           => esc_html__('Button URL', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the location.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'style',
            ),
		);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
		$panel_layout = $this->props['panel_layout'];
		$show_icon = $this->props['show_icon'];
        $header_text = $this->props['title'];
		$content = $this->content;
		$show_button = $this->props['show_button'];
        $button_text = $this->props['button_text'];
        $button_link = $this->props['button_link'];
        $show_image = $this->props['show_image'];
        $image = $this->props['featured_image'];
        $image_layout = $this->props['image_layout'];



		$class = sprintf('panel-%1$s', $panel_layout);

        $triangle = ($class == 'panel-standout hightlight' ? '<span className="triangle"></span>' : '');

		$display_icon = ("on" == $show_icon ? sprintf('<span class="ca-gov-icon-info"></span>') : '');

        $show_button = ("on" == $show_button ? sprintf('<div class="options"><a href="%2$s" class="btn btn-default">%1$s</a></div>', $button_text, $button_link) : '');

        $photo = ("on" == $show_image ? sprintf('<div class="photo" style="background-image: url(%1$s);"></div>', $image) : '');

        $photo_align =  ("on" == $show_image ? sprintf('photo-%1$s', $image_layout) : '');


		$output = sprintf('<div class="panel %1$s %7$s">
                <div class="panel-heading">%8$s<h3>%2$s %3$s</h3>%4$s</div>
                <div class="panel-body">%5$s %6$s</div>
                </div>', $class, $display_icon, $header_text, $show_button, $content, $photo, $photo_align, $triangle );

        return $output;
	}
}

new CA_Panel;

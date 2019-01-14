<?php

class CACM_Card extends ET_Builder_Module {

	public $slug       = 'cacm_card';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'CAWeb Publishing',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Card', 'cacm-caweb-custom-modules' );
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'style'  => esc_html__('Style', 'cacm-caweb-custom-modules'),
                    'header' => esc_html__('Header', 'cacm-caweb-custom-modules'),
                    'body'   => esc_html__('Body', 'cacm-caweb-custom-modules'),
                    'footer'   => esc_html__('Footer', 'cacm-caweb-custom-modules'),
                ),
            ),
        );
	}

	public function get_fields() {
		return array(
			'card_layout' => array(
                'label'             => esc_html__('Card Style', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'default' => esc_html__('Default', 'cacm-caweb-custom-modules'),
                    'standout'  => esc_html__('Standout', 'cacm-caweb-custom-modules'),
                    'overstated'  => esc_html__('Overstated', 'cacm-caweb-custom-modules'),
                    'understated'  => esc_html__('Understated', 'cacm-caweb-custom-modules'),
                    'primary' => esc_html__('Primary', 'cacm-caweb-custom-modules'),
                    'danger' => esc_html__('Danger', 'cacm-caweb-custom-modules'),
                    'inverted' => esc_html__('Inverted', 'cacm-caweb-custom-modules'),
                ),
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
                'toggle_slug'		=> 'style',
            ),
            'featured_image' => array(
                'label' => esc_html__('Featured Image', 'cacm-caweb-custom-modules'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'cacm-caweb-custom-modules'),
                'choose_text' => esc_attr__('Choose a Background Image', 'cacm-caweb-custom-modules'),
                'update_text' => esc_attr__('Set As Background', 'cacm-caweb-custom-modules'),
                'description' => esc_html__('If defined, this image will be used as the background for this location. To remove a background image, simply delete the URL from the settings field.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_image' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'style',
            ),
            'include_header' => array(
                'label'           => esc_html__('Header', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('header_title', 'text_color'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'header',
            ),
            'header_text'     => array(
				'label'           => esc_html__( 'Header Title', 'cacm-caweb-custom-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired heading here.', 'cacm-caweb-custom-modules' ),
				'toggle_slug'     => 'header',
			),
			'card_title'     => array(
				'label'           => esc_html__( 'Card Title', 'cacm-caweb-custom-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired heading here.', 'cacm-caweb-custom-modules' ),
				'toggle_slug'     => 'body',
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
            'include_footer' => array(
                'label'           => esc_html__('Footer', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('footer_text', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug' => 'footer',
            ),
            'footer_text' => array(
                'label'           => esc_html__('Footer Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the footer.', 'cacm-caweb-custom-modules'),
                'show_if' => array('include_footer' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug' => 'footer',
            ),
		);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
		$card_layout = $this->props['card_layout'];
		$show_image = $this->props['show_image'];
        $featured_image = $this->props['featured_image'];
        $include_header = $this->props['include_header'];
        $header_text = $this->props['header_text'];
		$title = $this->props['card_title'];
		$content = $this->content;
		$show_button = $this->props['show_button'];
        $button_text = $this->props['button_text'];
        $button_link = $this->props['button_link'];
        $include_footer = $this->props['include_footer'];
        $footer_text = $this->props['footer_text'];
        $card_color = '';

		$class = sprintf('card-%1$s', $card_layout);

		$display_image = ("on" == $show_image ? sprintf('<img class="card-img-top img-responsive" src="%1$s" alt="Card image cap">', $featured_image) : '');

		$display_header = ("on" == $include_header ?
					sprintf('<div class="card-header">%1$s</div>', $header_text) :
					'');

		$display_title = sprintf('<h4 class="card-title">%1$s</h4>', $title);

		$display_button = ("on" == $show_button ? sprintf('<a href="%1$s" class="btn btn-default" target="_blank">%2$s</a>', $button_link, $button_text) : '');

        $display_footer = ("on" == $include_footer ? sprintf('<div class="card-footer">%1$s</div>', $footer_text) : '');

		$output = sprintf('<div class="card %1$s">%2$s%3$s<div class="card-block">%7$s%4$s%5$s</div>%6$s</div>', $class, $display_image, $display_header, $content, $display_button, $display_footer, $display_title);

        return $output;
	}
}

new CACM_Card;

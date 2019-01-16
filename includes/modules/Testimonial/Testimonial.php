<?php

class CACM_Testimonial extends ET_Builder_Module {

	public $slug       = 'cacm_testimonial';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'CAWeb Publishing',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Testimonial', 'cacm-caweb-custom-modules' );
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'style'  => esc_html__('Style', 'cacm-caweb-custom-modules'),
                    'image' => esc_html__('Image', 'cacm-caweb-custom-modules'),
                    'body'   => esc_html__('Body', 'cacm-caweb-custom-modules'),
                ),
            ),
        );
	}

	public function get_fields() {
		return array(
			'layout' => array(
                'label'             => esc_html__('Testimonial Style', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'default' => esc_html__('Default', 'cacm-caweb-custom-modules'),
                    'standout'  => esc_html__('Standout', 'cacm-caweb-custom-modules'),
                    'danger'  => esc_html__('Danger', 'cacm-caweb-custom-modules'),
                    'overstated'  => esc_html__('Overstated', 'cacm-caweb-custom-modules'),
                    'understated'  => esc_html__('Understated', 'cacm-caweb-custom-modules'),
                ),
                'default' => 'default',
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
                'toggle_slug'       => 'image',
            ),
            'featured_image' => array(
                'label' => esc_html__('Image', 'cacm-caweb-custom-modules'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'cacm-caweb-custom-modules'),
                'choose_text' => esc_attr__('Choose a Background Image', 'cacm-caweb-custom-modules'),
                'update_text' => esc_attr__('Set As Background', 'cacm-caweb-custom-modules'),
                'description' => esc_html__('Recommended image size is 70 x 70'),
                'show_if' => array('show_image' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'image',
            ),
            'image_link'     => array(
                'label'           => esc_html__( 'Image Link', 'cacm-caweb-custom-modules' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( '', 'cacm-caweb-custom-modules' ),
                'show_if' => array('show_image' => 'on'),
                'toggle_slug'     => 'image',
            ),
            'image_layout' => array(
                'label'             => esc_html__('Align Image', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'thumbnail-top'  => esc_html__('Top', 'cacm-caweb-custom-modules'),
                    'thumbnail-left' => esc_html__('Left', 'cacm-caweb-custom-modules'),
                    'thumbnail-right'  => esc_html__('Right', 'cacm-caweb-custom-modules'),
                    'thumbnail-bottom thumbnail-left'  => esc_html__('Bottom Left', 'cacm-caweb-custom-modules'),
                    'thumbnail-bottom thumbnail-right'  => esc_html__('Bottom Right', 'cacm-caweb-custom-modules'),
                ),
                'default' => 'top',
                'show_if' => array('show_image' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'image',
            ),
            'image_style' => array(
                'label'             => esc_html__('Image Style', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'none'  => esc_html__('None', 'cacm-caweb-custom-modules'),
                    'circle'  => esc_html__('Circle Image', 'cacm-caweb-custom-modules'),
                    'rounded' => esc_html__('Rounded Corners', 'cacm-caweb-custom-modules'),
                ),
                'default' => 'none',
                'show_if' => array('show_image' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'image',
            ),
            'name'     => array(
				'label'           => esc_html__( 'Author Name', 'cacm-caweb-custom-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'cacm-caweb-custom-modules' ),
				'toggle_slug'     => 'body',
			),
            'name_link'     => array(
                'label'           => esc_html__( 'Author Link', 'cacm-caweb-custom-modules' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( '', 'cacm-caweb-custom-modules' ),
                'toggle_slug'     => 'body',
            ),
            'title'     => array(
                'label'           => esc_html__( 'Author Title', 'cacm-caweb-custom-modules' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( '', 'cacm-caweb-custom-modules' ),
                'toggle_slug'     => 'body',
            ),
			'content'     => array(
				'label'           => esc_html__( 'Author Quote', 'cacm-caweb-custom-modules' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'cacm-caweb-custom-modules' ),
				'toggle_slug'     => 'body',
			),
			
		);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
		$layout = $this->props['layout'];
		$show_image = $this->props['show_image'];
        $image = $this->props['featured_image'];
        $image_link = $this->props['image_link'];
        $image_layout = $this->props['image_layout'];
        $image_style = $this->props['image_style'];
        $name = $this->props['name'];
        $name_link = $this->props['name_link'];
        $title = $this->props['title'];
		$content = $this->content;

        $thumbnail = ("on" == $show_image ? sprintf('<div class="thumbnail %2$s"><a href="%4$s"><img class="thumbnail-img img-%3$s" src="%1$s"></a></div>', $image, $image_layout, $image_style, $image_link) : '');

        $thumbnail_top = ($image_layout == "thumbnail-top" ? $thumbnail : '');

        $thumbnail_left = ($image_layout == "thumbnail-left" || $image_layout == "thumbnail-bottom thumbnail-left" ? $thumbnail : '');

        $thumbnail_right = ($image_layout == "thumbnail-right" || $image_layout == "thumbnail-bottom thumbnail-right" ? $thumbnail : '');

		$output = sprintf(
            '<blockquote class="testimonial testimonial-%1$s">
                %2$s %8$s
                <div class="testimonial-body">
                    %3$s
                    <footer>
                        <cite>
                            <a href="%5$s">%4$s</a> %6$s
                        </cite>
                    </footer>
                </div>
                %7$s
            </blockquote>', $layout, $thumbnail_left, $content, $name, $name_link, $title, $thumbnail_right, $thumbnail_top );

        return $output;
	}
}

new CACM_Testimonial;

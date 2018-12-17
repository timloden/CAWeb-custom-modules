<?php

class CACM_Profile_Banner extends ET_Builder_Module {

	public $slug       = 'cacm_profile_banner';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'Tim Loden',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Profile Banner', 'cacm-caweb-custom-modules' );
	}

	public function get_fields() {
		return array(
			'name' => array(
                'label'           => esc_html__('Profile Name', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the name of the profile.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'header',
            ),
            'job_title' => array(
                'label'           => esc_html__('Job Title', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the job title.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'header',
            ),
            'profile_link' => array(
                'label'           => esc_html__('Profile Link', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the text for the profile link.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'body',
            ),
            'url' => array(
                'label'           => esc_html__('Profile URL', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'default' => '#',
                'description'     => esc_html__('Input the website of the profile.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'body',
            ),
            'portrait_url' => array(
                'label'              => esc_html__('Portrait Image URL', 'et_builder'),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'et_builder'),
                'choose_text'        => esc_attr__('Choose an Image', 'et_builder'),
                'update_text'        => esc_attr__('Set As Image', 'et_builder'),
                'description'        => esc_html__('Upload your desired image, or type in the URL to the image you would like to display.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'body',
            ),
            'portrait_alt' => array(
                'label'           => esc_html__('Portrait Image Alt Text', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the alt text for the portrait image.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'body',
            ),
		);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
		$name                 = $this->props['name'];
        $job_title              = $this->props['job_title'];
        $profile_link              = $this->props['profile_link'];
        $portrait_url           = $this->props['portrait_url'];
        $portrait_alt           = $this->props['portrait_alt'];
        $round                = $this->props['round_image'];
        $url                    = $this->props['url'];

        $class = sprintf(' class="%1$s" ', $this->module_classname($render_slug));

        $url = ! empty($url) ? esc_url($url) : '';

        if (empty($portrait_alt) && ! empty($portrait_url)) {
            $portrait_id = attachment_url_to_postid($portrait_url);
            $portrait_alt = get_post_meta($portrait_id, '_wp_attachment_image_alt', true);
        }

        $image = ('on' !== $round ?
            sprintf('<img src="%1$s" style="width: 90px; min-height: 90px;float: right;" alt="%2$s"/>', $portrait_url, $portrait_alt) :
            sprintf('<div class="profile-banner-img-wrapper">
                <img src="%1$s" style="width: 90px; min-height: 90px;float: right;" alt="%2$s"/>
            </div>', $portrait_url, $portrait_alt)
        );

        $output = sprintf('<div id="profile-banner-wrapper" %1$s><a href="%2$s"><div class="profile-banner%3$s">%4$s<div class="banner-subtitle">%5$s</div><div class="banner-title">%6$s</div><div class="banner-link"><p>%7$s</p></div></div></a></div>', $class, $url, 'on' !== $round ? '' : ' round-image', $image, $job_title, $name, $profile_link);

        return $output;
	}
}

new CACM_Profile_Banner;

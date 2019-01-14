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
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'profile' => esc_html__('Profile', 'cacm-caweb-custom-modules'),

                ),
            ),
        );
	}

	public function get_fields() {
		return array(
			'name' => array(
                'label'           => esc_html__('Profile Name', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the name of the profile.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'profile',
            ),
            'job_title' => array(
                'label'           => esc_html__('Job Title', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the job title.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'profile',
            ),
            'profile_link' => array(
                'label'           => esc_html__('Profile Link', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the text for the profile link.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'profile',
            ),
            'url' => array(
                'label'           => esc_html__('Profile URL', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'default' => '#',
                'description'     => esc_html__('Input the website of the profile.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'profile',
            ),
            'gender' => array(
                'label'             => esc_html__('Gender', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'male' => esc_html__('Male', 'cacm-caweb-custom-modules'),
                    'female'  => esc_html__('Female', 'cacm-caweb-custom-modules'),
                ),
                'default' => 'male',
                'tab_slug' => 'general',
                'toggle_slug'       => 'profile',
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
                'toggle_slug'           => 'profile',
            ),
            'portrait_alt' => array(
                'label'           => esc_html__('Portrait Image Alt Text', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the alt text for the portrait image.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'profile',
            ),
		);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
		$name                 = $this->props['name'];
        $job_title            = $this->props['job_title'];
        $profile_link         = $this->props['profile_link'];
        $url                  = $this->props['url'];
        $gender               = $this->props['gender'];
        $portrait_url         = $this->props['portrait_url'];
        $portrait_alt         = $this->props['portrait_alt'];

        if ($portrait_url) {
            $image = $portrait_url;
        } else {
            if ($gender == 'male') {
                $image = get_template_directory_uri() . '/images/banner/banner-guy.png';
            } elseif ($gender == 'female') {
                $image = get_template_directory_uri() . '/images/banner/banner-gal.png';
            }
        }

        $output = sprintf('<div class="profile-banner">
                                <div class="inner" style="background:url(%5$s) no-repeat right bottom">
                                    <div class="banner-subtitle">%2$s</div>
                                    <div class="banner-title">%1$s</div>
                                    <div class="banner-link"><a href="%4$s">%3$s</a></div>
                                </div>
                            </div>', $name, $job_title, $profile_link, $url, $image);

        return $output;
	}
}

new CACM_Profile_Banner;

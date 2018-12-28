<?php

class CACM_Services_Tile extends ET_Builder_Module {
    
    public $slug       = 'cacm_services_tile';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://caweb.cdt.ca.gov/',
        'author'     => 'Tim Loden',
        'author_uri' => '',
    );

    public function init() {
        $this->slug = 'cacm_services_tile';
        $this->name = esc_html__( 'Tile', 'cacm-caweb-custom-modules' );
        $this->type = 'child';
    }

    public function get_fields() {
        return array(
            'title' => array(
                'label'           => esc_html__('Tile Title', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input tile title', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'body',
            ),

            'background' => array(
                'label'              => esc_html__('Background Image', 'cacm-caweb-custom-modules'),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'cacm-caweb-custom-modules'),
                'choose_text'        => esc_attr__('Choose an Image', 'cacm-caweb-custom-modules'),
                'update_text'        => esc_attr__('Set As Image', 'cacm-caweb-custom-modules'),
                'description'        => esc_html__('Upload your desired image, or type in the URL to the image you would like to display.', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'body',
            ),

            'service_title' => array(
                'label'           => esc_html__('Service Title', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Actual service title', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'body',
            ),

            'service_link_text' => array(
                'label'           => esc_html__('Service Link Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'body',
            ),

            'service_link_url' => array(
                'label'           => esc_html__('Service Link URL', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'body',
            ),

            'show_details_button' => array(
                'label'           => esc_html__('Show Details Button', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('details_button_text', 'details_button_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'body',
            ),

            'details_button_text' => array(
                'label'           => esc_html__('Details Button Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_details_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'details_button_link' => array(
                'label'           => esc_html__('Details Button Link', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the location.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_details_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'show_locations_button' => array(
                'label'           => esc_html__('Show Location Button', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('locations_button_text', 'locations_button_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'body',
            ),

            'locations_button_text' => array(
                'label'           => esc_html__('Locations Button Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_locations_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'locations_button_link' => array(
                'label'           => esc_html__('Location Button Link', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the location.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_locations_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'show_faq_button' => array(
                'label'           => esc_html__('Show FAQs Button', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('faq_button_text', 'faq_button_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'body',
            ),

            'faq_button_text' => array(
                'label'           => esc_html__('FAQs Button Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_faq_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'faq_button_link' => array(
                'label'           => esc_html__('FAQs Button Link', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the location.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_faq_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'content'     => array(
                'label'           => esc_html__( 'Service Content', 'cacm-caweb-custom-modules' ),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Service description content', 'cacm-caweb-custom-modules' ),
                'toggle_slug'     => 'body',
            ),

            'service_image' => array(
                'label'              => esc_html__('Service Image/Logo', 'cacm-caweb-custom-modules'),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'cacm-caweb-custom-modules'),
                'choose_text'        => esc_attr__('Choose an Image', 'cacm-caweb-custom-modules'),
                'update_text'        => esc_attr__('Set As Image', 'cacm-caweb-custom-modules'),
                'description'        => esc_html__('Upload your desired image, or type in the URL to the image you would like to display for this service.', 'cacm-caweb-custom-modules'),
                'tab_slug' => 'general',
                'toggle_slug'           => 'body',
            ),

            // Four extra buttons

            'show_button_one' => array(
                'label'           => esc_html__('Show Button #1', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('button_one_text', 'button_one_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'body',
            ),

            'button_one_text' => array(
                'label'           => esc_html__('Button 1 Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button_one' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'button_one_link' => array(
                'label'           => esc_html__('Button 1 Link', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button_one' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'show_button_two' => array(
                'label'           => esc_html__('Show Button #2', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('button_two_text', 'button_two_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'body',
            ),

            'button_two_text' => array(
                'label'           => esc_html__('Button 2 Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button_two' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'button_two_link' => array(
                'label'           => esc_html__('Button 2 Link', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button_two' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'show_button_three' => array(
                'label'           => esc_html__('Show Button #3', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('button_three_text', 'button_three_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'body',
            ),

            'button_three_text' => array(
                'label'           => esc_html__('Button 3 Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button_three' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'button_three_link' => array(
                'label'           => esc_html__('Button 3 Link', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button_three' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'show_button_four' => array(
                'label'           => esc_html__('Show Button #4', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('button_four_text', 'button_four_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'body',
            ),

            'button_four_text' => array(
                'label'           => esc_html__('Button 4 Text', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button_four' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'button_four_link' => array(
                'label'           => esc_html__('Button 4 Link', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the button.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button_four' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),

            'tile_size' => array(
                'label'             => esc_html__('Size', 'cacm-caweb-custom-modules'),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'quarter' => esc_html__('Quarter', 'cacm-caweb-custom-modules'),
                    'half' => esc_html__('Half', 'cacm-caweb-custom-modules'),
                    'full'  => esc_html__('Full', 'cacm-caweb-custom-modules'),
                ),
                'description'       => esc_html__('Here you can choose the size of the tile', 'cacm-caweb-custom-modules'),
                'tab_slug'  => 'general',
                'toggle_slug'   => 'body',
            ),

            'show_social' => array(
                'label'           => esc_html__('Show Social Media Icons?', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'on'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'affects' => array('button_four_text', 'button_four_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'body',
            ),
        );
    }

    function maybe_inherit_values() {

    }


    public function render( $unprocessed_props, $content = null, $render_slug ) {        

        global $tile_count, $tiles;

        $tiles[] = array(
            'tile_title' => $this->props['title'],
            'tile_background' => $this->props['background'],
            'tile_size' => $this->props['tile_size'],
            'service_title' => $this->props['service_title'],
            'service_link_text' => $this->props['service_link_text'],
            'service_link_url' => $this->props['service_link_url'],
            'show_details_button' => $this->props['show_details_button'],
            'details_button_text' => $this->props['details_button_text'],
            'details_button_link' => $this->props['details_button_link'],
            'show_locations_button' => $this->props['show_locations_button'],
            'locations_button_text' => $this->props['locations_button_text'],
            'locations_button_link' => $this->props['locations_button_link'],
            'show_faq_button' => $this->props['show_faq_button'],
            'faq_button_text' => $this->props['faq_button_text'],
            'faq_button_link' => $this->props['faq_button_link'],
            'service_image' => $this->props['service_image'],
            'show_button_one' => $this->props['show_button_one'],
            'button_one_text' => $this->props['button_one_text'],
            'button_one_link' => $this->props['button_one_link'],
            'show_button_two' => $this->props['show_button_two'],
            'button_two_text' => $this->props['button_two_text'],
            'button_two_link' => $this->props['button_two_link'],
            'show_button_three' => $this->props['show_button_three'],
            'button_three_text' => $this->props['button_three_text'],
            'button_three_link' => $this->props['button_three_link'],
            'show_button_four' => $this->props['show_button_four'],
            'button_four_text' => $this->props['button_four_text'],
            'button_four_link' => $this->props['button_four_link'],
            'show_social' => $this->props['show_social'],
            'content' => $this->content,
        );

        $tile_count++;

    }
}

new CACM_Services_Tile;

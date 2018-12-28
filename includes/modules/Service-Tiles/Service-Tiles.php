<?php

class CACM_Services_Tiles extends ET_Builder_Module {

	public $slug       = 'cacm_services_tiles';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'Tim Loden',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Services Tiles', 'cacm-caweb-custom-modules' );
        $this->child_slug      = 'cacm_services_tile';
        $this->child_item_text = esc_html__('Tile', 'cacm-caweb-custom-modules');
        $this->fullwidth = true;
	}

	public function get_fields() {
		return array(
			'show_button' => array(
                'label'           => esc_html__('Show View More Button', 'cacm-caweb-custom-modules'),
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
                'toggle_slug'       => 'body',
            ),

            'button_link' => array(
                'label'           => esc_html__('Button Link', 'cacm-caweb-custom-modules'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the location.', 'cacm-caweb-custom-modules'),
                'show_if' => array('show_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'       => 'body',
            ),
		);
	}

    function before_render() {
        global $tile_count, $tiles;

        $tiles = array();
        $titles = array();
        $tile_images = array();
        $tile_sizes= array();
        $tile_links= array();
        $tile_urls= array();

        $tile_count = 0;
    }

	public function render( $unprocessed_props, $content = null, $render_slug ) {
        $content = $this->content;
        $show_button = $this->props['show_button'];
        $button_text = $this->props['button_text'];
        $button_link = $this->props['button_link'];

        $show_button = ("on" == $show_button ? sprintf('<div class="more-button"><div class="more-content"></div><a href="%1$s" class="btn-more inverse" target="_blank"><span class="ca-gov-icon-plus-fill" aria-hidden="true"></span><span class="more-title">%2$s</span></a></div>', esc_url($button_link), $button_text) : '');

        global $tile_count, $tiles;
        
        $output = '';

        // Loop through the tiles

        $output = sprintf(
            '<div class="section-understated collapsed">
                <div class="service-group clearfix">
            ');

        for ($i = 0; $i < $tile_count; $i++) {
            
            $title = $tiles[$i]['tile_title'];
            $tile_size = $tiles[$i]['tile_size'];
            $item_image = $tiles[$i]['tile_background'];

            $output .= sprintf(
                '<div tabindex="%1$s" class="service-tile %2$s" data-tile-id="panel-%1$s" style="background-image:url(%4$s); background-size: cover; height: 320px;">
                    <div class="teaser">
                        <h4 class="title">%3$s</h4>
                    </div>
                </div>
                ', $i + 1, $tile_size, $title, $item_image);

        }

        for ($i = 0; $i < $tile_count; $i++) {
            
            $service_title = $tiles[$i]['service_title'];
            $service_link_text = $tiles[$i]['service_link_text'];
            $service_link_url = $tiles[$i]['service_link_url'];
           
            $show_details_button = $tiles[$i]['show_details_button'];
            $details_button_text = $tiles[$i]['details_button_text'];
            $details_button_link = $tiles[$i]['details_button_link'];

            $details_button = ("on" == $show_details_button ? sprintf('<a href="%2$s" class="btn btn-default btn-block-xs"><span class="ca-gov-icon-info"></span> %1$s</a>', $details_button_text, $details_button_link) : '');

            $show_locations_button = $tiles[$i]['show_locations_button'];
            $locations_button_text = $tiles[$i]['locations_button_text'];
            $locations_button_link = $tiles[$i]['locations_button_link'];

            $locations_button = ("on" == $show_locations_button ? sprintf('<a href="%2$s" class="btn btn-default btn-block-xs"><span class="ca-gov-icon-location"></span> %1$s</a>', $locations_button_text, $locations_button_link) : '');

            $show_faq_button = $tiles[$i]['show_faq_button'];
            $faq_button_text = $tiles[$i]['faq_button_text'];
            $faq_button_link = $tiles[$i]['faq_button_link'];

            $faq_button = ("on" == $show_faq_button ? sprintf('<a href="%2$s" class="btn btn-default btn-block-xs"><span class="ca-gov-icon-location"></span> %1$s</a>', $faq_button_text, $faq_button_link) : '');

            $service_image = $tiles[$i]['service_image'];
        
            $show_button_one = $tiles[$i]['show_button_one'];
            $button_one_text = $tiles[$i]['button_one_text'];
            $button_one_link = $tiles[$i]['button_one_link'];

            $show_button_two = $tiles[$i]['show_button_two'];
            $button_two_text = $tiles[$i]['button_two_text'];
            $button_two_link = $tiles[$i]['button_two_link'];

            $show_button_three = $tiles[$i]['show_button_three'];
            $button_three_text = $tiles[$i]['button_three_text'];
            $button_three_link = $tiles[$i]['button_three_link'];

            $show_button_four = $tiles[$i]['show_button_four'];
            $button_four_text = $tiles[$i]['button_four_text'];
            $button_four_link = $tiles[$i]['button_four_link'];

            $panel_content = $tiles[$i]['content'];

            $button_one = ("on" == $show_button_one ? sprintf('<a href="%2$s" class="btn btn-default btn-xs">%1$s</a>', $button_one_text, $button_one_link) : '');

            $button_two = ("on" == $show_button_two ? sprintf('<a href="%2$s" class="btn btn-default btn-xs">%1$s</a>', $button_two_text, $button_two_link) : '');

            $button_three = ("on" == $show_button_three ? sprintf('<a href="%2$s" class="btn btn-default btn-xs">%1$s</a>', $button_three_text, $button_three_link) : '');

            $button_four = ("on" == $show_button_four ? sprintf('<a href="%2$s" class="btn btn-default btn-xs">%1$s</a>', $button_four_text, $button_four_link) : '');

            $show_social = $tiles[$i]['show_social'];

            $social_icons = ("on" == $show_social ? sprintf('<ul class="list-inline list-unstyled m-t-md social"><li><a href=""><span class="ca-gov-icon-twitter"><span class="sr-only">Twitter</span></span></a></li><li><a href=""><span class="ca-gov-icon-facebook"><span class="sr-only">Facebook</span></span></a></li><li><a href=""><span class="ca-gov-icon-google-plus"><span class="sr-only">Google+</span></span></a></li></ul>') : '');

            $output .= sprintf(
                '<div class="service-tile-panel" data-tile-id="panel-%1$s" >
                    <div class="section section-default">
                        <div class="container" style="padding-top: 0px;">
                            <div class="card card-block">
                                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="group">
                                    <div class="two-thirds">
                                        <h1 class="m-y-0 ">%2$s</h1>
                                        <p class="lead"><a href="%4$s">%3$s</a></p>

                                        <div class="btn-row m-b">
                                            %5$s
                                            %6$s
                                            %7$s
                                        </div>

                                        <div class="location" itemscope itemtype="http://schema.org/Organization">
                                            <meta itemprop="name" content="Organization Name Here">
                                            <p class="other">
                                                %8$s
                                            </p>
                                        </div>

                                        <div class="related-services m-t btn-row">
                                            %10$s
                                            %11$s
                                            %12$s
                                            %13$s
                                        </div>

                                        %14$s
                                    </div>

                                    <div class="third text-center">
                                        <img src="%9$s" class="img-responsive m-t-md hidden-xs" alt="%2$s">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ', 
                $i + 1, 
                $service_title, 
                $service_link_text, 
                $service_link_url,
                $details_button,
                $locations_button,
                $faq_button,
                $panel_content,
                $service_image,
                $button_one,
                $button_two,
                $button_three,
                $button_four,
                $social_icons
            );

        }

        $output .= sprintf(
            '</div>
                </div>
            ');
       
        $output .= sprintf(
            '</div>
                </div>
            ');

        return $output;

	}
}

new CACM_Services_Tiles;


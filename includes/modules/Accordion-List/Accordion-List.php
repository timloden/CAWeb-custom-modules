<?php

class CACM_Accordion_List extends ET_Builder_Module {

	public $slug       = 'cacm_accordion_list';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'CAWeb Publishing',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Accordion List', 'cacm-caweb-custom-modules' );
        $this->child_slug      = 'cacm_accordion_list_item';
        $this->child_item_text = esc_html__('Item', 'cacm-caweb-custom-modules');
	}

	public function get_fields() {
        return array(
            'allow_multiselect' => array(
                'label'           => esc_html__('Allow Multiselect', 'cacm-caweb-custom-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'false' => esc_html__('No', 'cacm-caweb-custom-modules'),
                    'true'  => esc_html__('Yes', 'cacm-caweb-custom-modules'),
                ),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'style',
            ),
        );
    }

	public function render( $unprocessed_props, $content = null, $render_slug ) {

		$multiselect = $this->props['allow_multiselect'];
        $content = $this->content;

  
        $output = sprintf(
            '<ul id="accordion" class="accordion-list list-overstated" role="tablist" multiselectable="%2$s">
                %1$s
            </ul>
            ',
            $content,
            $multiselect
        );


        return $output;
	}
}

new CACM_Accordion_List;


<?php

class CACM_Accordion_Item extends ET_Builder_Module {
    
    public $slug       = 'cacm_accordion_item';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://caweb.cdt.ca.gov/',
        'author'     => 'CAWeb Publishing',
        'author_uri' => '',
    );

    public function init() {
        $this->slug = 'cacm_accordion_item';
        $this->name = esc_html__( 'Item', 'cacm-caweb-custom-modules' );
        $this->type = 'child';
        $this->child_title_var = 'title';
        $this->child_title_fallback_var = 'title';
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'body'  => esc_html__('Body', 'cacm-caweb-custom-modules'),
                ),
            ),
        );
    }

    public function get_fields() {
        return array(
            'title' => array(
                'label' => esc_html__('Item Title', 'cacm-caweb-custom-modules'),
                'type'=> 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Define the title for the Image', 'et_builder'),
                'toggle_slug'   => 'body',
            ),
            'content'     => array(
                'label'           => esc_html__( 'Item Content', 'cacm-caweb-custom-modules' ),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear below the heading text.', 'simp-simple-extension' ),
                'toggle_slug'     => 'body',
            ),

        );
    }

    public function render( $unprocessed_props, $content = null, $render_slug ) {        
        $title = $this->props['title'];
        $content = $this->content;
        
        $item_id = str_replace(' ', '', $title);
        $collapse_id = 'collapse' . $item_id;

        $this->props['item_id'] = $item_id;
        $this->props['collapse_id'] = $collapse_id;

        $output = sprintf(
            '
            <div class="panel panel-default" id="accordian">
                <div class="panel-heading" role="tab" id="heading%3$s">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#%4$s" aria-expanded="true" aria-controls="%4$s">%1$s</a>
                    </h4>
                </div>
                <div id="%4$s" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading%3$s">
                    <div class="panel-body">
                        %2$s
                    </div>
                </div>
            </div>
            ',
            $title,
            $content,
            $item_id,
            $collapse_id

        );

        return $output;
    }
}

new CACM_Accordion_Item;

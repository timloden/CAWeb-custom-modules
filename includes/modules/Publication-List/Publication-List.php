<?php

class CA_Publication_List extends ET_Builder_Module {

	public $slug       = 'et_pb_ca_publication_list';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'CAWeb Publishing',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Publication List', 'cacm-caweb-custom-modules' );
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
            'title'     => array(
				'label'           => esc_html__( 'Title', 'cacm-caweb-custom-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired title here.', 'cacm-caweb-custom-modules' ),
				'toggle_slug'     => 'header',
			),
            'content'     => array(
                'label'           => esc_html__( 'Description', 'cacm-caweb-custom-modules' ),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear below the title text.', 'simp-simple-extension' ),
                'toggle_slug'     => 'body',
            ),
            'post_count'     => array(
                'label'           => esc_html__( 'Number of Posts', 'cacm-caweb-custom-modules' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input your desired number of posts to display.', 'cacm-caweb-custom-modules' ),
                'toggle_slug'     => 'body',
            ),
		);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
		$title = $this->props['title'];
		$content = $this->content;
        $post_count = $this->props['post_count'];

        global $posts_output;
        $posts_output = '';

        $args = array(
            'post_type'      => 'publications',
            'post_status'    => 'publish',
            'posts_per_page' => $post_count
        );

        $posts = get_posts( $args );
       
        if( $posts ) {
            foreach ( $posts as $post ) {
                $image = get_field( 'thumbnail', $post->ID );
                $pdf = get_field( 'publication_pdf', $post->ID );
                $alt = $image['alt'];
                if (!$image['alt']) {
                    $alt = get_the_title();
                }

                $files = '';

                if( have_rows('publication_files', $post->ID ) ) {

                    // loop through the rows of data
                    while ( have_rows('publication_files', $post->ID ) ) : the_row();

                        $language = esc_attr( get_sub_field('pdf_language') );
                        $url = esc_attr( get_sub_field('pdf_file') );
                        $modified_date = get_the_modified_date('', $post->ID);

                        $files .= sprintf('(%1$s <a href="%2$s">PDF</a>) | <span class="pub-revision-date">Revision Date <time datetime="%3$s">%3$s</time>)', $language, $url, $modified_date);

                    endwhile;


                }

                if ( $image['url'] ) {
                    $image_ouput = '<img src="' . $image['url'] . '" alt="' . $alt . '">';
                } else {
                    $image_ouput = '';
                }

                $posts_output .= sprintf('
                    <article class="pub-item">
                        <div class="thumbnail">%2$s</div>
                        <div class="pub-body">
                            <span class="pub-title">%1$s</span> <span class="pub-language">%4$s</span>
                            <div class="pub-tags"></div>
                        </div>
                    </article>
                ', $post->post_title, $image_ouput, $alt, $files);

            }

            wp_reset_postdata();
        }

		$output = sprintf('
                <p class="publication-title">%1$s</p>
                <p class="publication-description">%2$s</p>
                <div class="publication-list">
                    %3$s
                </article>
                </div>', $title, $content, $posts_output);

        return $output;


        $posts_output = $this->props['post_output'];
	}
}

new CA_Publication_List;

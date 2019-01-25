<?php

class CA_Github_Legacy extends ET_Builder_Module {

	public $slug       = 'et_pb_ca_github';
	public $vb_support = 'off';

	protected $module_credits = array(
		'module_uri' => 'https://caweb.cdt.ca.gov/',
		'author'     => 'CAWeb Publishing',
		'author_uri' => '',
	);

	function init() {
        $this->name = esc_html__('GitHub (Legacy)', 'et_builder');
        //$this->slug = 'et_pb_ca_github';

        $this->fields_defaults = array(
            'per_page' => array(100, 'add_default_setting'),
            'repo_type' => array('all', 'add_default_setting'),
        );

        $this->main_css_element = '%%order_class%%';

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'style'  => esc_html__('Style', 'et_builder'),
                    'header' => esc_html__('Header', 'et_builder'),
                    'body'   => esc_html__('Body', 'et_builder'),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'email' => esc_html__('Request Access Email', 'et_builder'),
                    'text' => array(
                        'title'    => esc_html__('Text', 'et_builder'),
                        'priority' => 49,
                    ),
                ),
            ),
            'custom_css' => array(
                'toggles' => array(
                ),
            ),
        );
    }
    function get_fields() {
        $general_fields = array(
            'per_page' => array(
                'label'       => esc_html__('Maximum # of results', 'et_builder'),
                'type'        => 'text',
                'description' => esc_html__('Enter amount to display. Default is 100.', 'et_builder'),
                'default' => 100,
                'tab_slug'  => 'general',
                'toggle_slug'   => 'style',
            ),
            'repo_type' => array(
                'label'           => esc_html__('Repository Type', 'et_builder'),
                'type'            => 'select',
                'option_category' => 'configuration',
                'options'         => array(
                    'all'  => esc_html__('All', 'et_builder'),
                    'public'  => esc_html__('Public', 'et_builder'),
                    'private' => esc_html__('Private', 'et_builder'),
                    'forks' => esc_html__('Forks', 'et_builder'),
                ),
                'default' => 'all',
                'description' => 'Choose repository type you wish to display.',
                'tab_slug'  => 'general',
                'toggle_slug' => 'style',
            ),
            'access_token' => array(
                'label'       => esc_html__('Personal Access Token', 'et_builder'),
                'type'        => 'text',
                'description' => esc_html__('This is required for Private Repositories to display.', 'et_builder'),
                'tab_slug'  => 'general',
                'toggle_slug'   => 'style',
                'show_if_not'   => array('repo_type' => 'public'),
            ),
            'request_email' => array(
                'label'       => esc_html__('Code Request Email', 'et_builder'),
                'type'        => 'text',
                'description' => esc_html__('This is the administrators email that will receive all emails requesting access to private repositories.', 'et_builder'),
                'tab_slug'  => 'general',
                'toggle_slug'   => 'style',
                'show_if_not'   => array('repo_type' => 'public'),
            ),
            'title' => array(
                'label'       => esc_html__('Title', 'et_builder'),
                'type'        => 'text',
                'description' => esc_html__('Enter a title for the list.', 'et_builder'),
                'tab_slug'  => 'general',
                'toggle_slug'   => 'header',
            ),
            'username' => array(
                'label'       => esc_html__('Username', 'et_builder'),
                'type'        => 'text',
                'description' => esc_html__('Enter GitHub Username.', 'et_builder'),
                'tab_slug'  => 'general',
                'toggle_slug'   => 'body',
            ),
            'increase_rate_limit' => array(
                'label'           => esc_html__('Increase Rate Limit', 'et_builder'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'  => esc_html__('Yes', 'et_builder'),
                    'off' => esc_html__('No', 'et_builder'),
                ),
                'description' => et_get_safe_localization(sprintf(__('Increase the maximum number of requests users are permitted to make per hour.<a href="%1$s" target="_blank" title="Rate Limiting">Rate Limiting</a>', 'et_builder'), esc_url('https://developer.github.com/v3/#rate-limiting'))),
                'tab_slug'  => 'general',
                'toggle_slug' => 'body',
            ),
            'client_id' => array(
                'label'       => esc_html__('Client ID', 'et_builder'),
                'type'        => 'text',
                'description' => esc_html__('Enter GitHub Client ID.', 'et_builder'),
                'tab_slug'  => 'general',
                'toggle_slug'   => 'body',
                'show_if'   => array('increase_rate_limit' => 'on'),
            ),
            'client_secret' => array(
                'label'       => esc_html__('Client Secret', 'et_builder'),
                'type'        => 'text',
                'description' => esc_html__('Enter GitHub Client Secret.', 'et_builder'),
                'tab_slug'  => 'general',
                'toggle_slug'   => 'body',
                'show_if'   => array('increase_rate_limit' => 'on'),
            ),
            'definitions' => array(
                'label'           => esc_html__('Definitions', 'et_builder'),
                'type'            => 'multiple_checkboxes',
                'options'         => array(
                    'name'  => esc_html__('Project Title', 'et_builder'),
                    'url'  => esc_html__('Add Link to repositories (Public Repositories Only)', 'et_builder'),
                    'desc' => esc_html__('Description', 'et_builder'),
                    'fork' => esc_html__('Fork', 'et_builder'),
                    'created_at'  => esc_html__('Creation Date', 'et_builder'),
                    'updated_at' => esc_html__('Updated Date', 'et_builder'),
                    'language' => esc_html__('Language', 'et_builder'),
                ),
                'tab_slug'  => 'general',
                'toggle_slug'   => 'body',
            ),
            'admin_label' => array(
                'label'       => esc_html__('Admin Label', 'et_builder'),
                'type'        => 'text',
                'description' => esc_html__('This will change the label of the module in the builder for easy identification.', 'et_builder'),
                'tab_slug'  => 'general',
                'toggle_slug'   => 'admin_label',
            ),
        );

        $design_fields = array(
            'email_body' => array(
                'label'           => esc_html__('Body', 'et_builder'),
                'type'            => 'textarea',
                'option_category' => 'basic_option',
                'description'     => et_get_safe_localization(sprintf(__('Here you can create the content that will be used within the body. Content must use proper URL Encoding (e.g. %%0A = line feed, %%91 = [, %%93 = ] )<a href="%1$s" target="_blank" title="URL Encoding Reference">URL Encoding Reference</a>', 'et_builder'), esc_url('https://www.w3schools.com/tags/ref_urlencode.asp'))), esc_html__(' ', 'et_builder'),
                'tab_slug'        => 'advanced',
                'toggle_slug'   => 'email',
                'show_if_not'   => array('repo_type' => 'public'),
            ),
        );

        $advanced_fields = array(
            'module_id' => array(
                'label'           => esc_html__('CSS ID', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'configuration',
                'tab_slug'        => 'custom_css',
                'toggle_slug'           => 'classes',
                'option_class'    => 'et_pb_custom_css_regular',
            ),
            'module_class' => array(
                'label'           => esc_html__('CSS Class', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'configuration',
                'tab_slug'        => 'custom_css',
                'toggle_slug'           => 'classes',
                'option_class'    => 'et_pb_custom_css_regular',
            ),
            'disabled_on' => array(
                'label'           => esc_html__('Disable on', 'et_builder'),
                'type'            => 'multiple_checkboxes',
                'options'         => array(
                    'phone'   => esc_html__('Phone', 'et_builder'),
                    'tablet'  => esc_html__('Tablet', 'et_builder'),
                    'desktop' => esc_html__('Desktop', 'et_builder'),
                ),
                'additional_att'  => 'disable_on',
                'option_category' => 'configuration',
                'description'     => esc_html__('This will disable the module on selected devices', 'et_builder'),
                'tab_slug'        => 'custom_css',
                'toggle_slug'     => 'visibility',
            ),
        );

        return array_merge($general_fields, $design_fields, $advanced_fields);
    }
    function render($unprocessed_props, $content = null, $render_slug) {
        $title            = $this->props['title'];
        $username            = $this->props['username'];
        $client_id         = $this->props['client_id'];
        $client_secret            = $this->props['client_secret'];
        $access_token            = $this->props['access_token'];
        $definitions            = $this->props['definitions'];
        $increase_rate_limit            = $this->props['increase_rate_limit'];
        $request_email            = $this->props['request_email'];
        $email_body            = $this->props['email_body'];
        $per_page            = $this->props['per_page'];
        $repo_type            = $this->props['repo_type'];

        $definitions = explode("|", $definitions);

        $class = sprintf(' class="%1$s"', $this->module_classname($render_slug));

        $content = $this->content;

        $output = '';

        if ( ! empty($username)) {
            $url = sprintf('https://api.github.com/orgs/%1$s/repos?per_page=%2$s%3$s&type=%4$s%5$s',
                                        $username, $per_page,
                    ("on" == $increase_rate_limit && ! empty($client_id) && ! empty($client_secret) ?
                     sprintf('&client_id=%1$s&client_secret=%2$s', $client_id, $client_secret) : ''), $repo_type,
                    ( ! empty($access_token) ? sprintf('&access_token=%1$s', $access_token) : ''));

            $repos =  wp_remote_get($url);
            $code = wp_remote_retrieve_response_code($repos);

            if (200 == $code) {
                $repos = json_decode(wp_remote_retrieve_body($repos));
                $repo_list = '';

                foreach ($repos as $r => $repo) {
                    $request_link = ( ! empty($request_email) && $repo->private ?
              sprintf('<p>* This is a Private Repository <a class="btn btn-default" href="mailto:%1$s?subject=%2$s&body=%3$s">Request Access</a></p>',
                       $request_email, sprintf('%1$s Repository Access Request', $repo->full_name), $email_body) : '');

                    if ("on" == $definitions[0]) {
                        if ("on" !== $definitions[1] || $repo->private) {
                            $name = sprintf('<h3>%1$s</h3>', $repo->name);
                        } elseif ("on" == $definitions[1]) {
                            $name = sprintf('<h3><a href="%1$s" target="blank">%2$s</a></h3>',
                                  $repo->html_url, $repo->name);
                        }
                    }

                    $desc = ("on" == $definitions[2] && ! empty($repo->description) ?
                                        sprintf('<p>Project Description: %1$s</p>', $repo->description) : '');

                    $fork = ("on" == $definitions[3] ?
                            sprintf('<p>Project forked by another organization: %1$s</p>', (empty($repo->fork) ? 'False' : 'True')) :
                                    '');

                    $created_at = ("on" == $definitions[4] ?
                                                sprintf('<p>Created on: %1$s</p>', date('m/d/Y', strtotime($repo->created_at))) : '');

                    $updated_at = ("on" == $definitions[5] ?
                                                sprintf('<p>Updated on: %1$s</p>', date('m/d/Y', strtotime($repo->updated_at))) : '');

                    $language =("on" == $definitions[6] && ! empty($repo->language) ?
                                            sprintf('<p>Language: %1$s</p>', $repo->language) : '');

                    $repo_list .= sprintf('<li>%1$s%2$s%3$s%4$s%5$s%6$s%7$s<hr></li>',
                                            ( ! empty($name) ? $name : ''), $desc , $fork, $created_at,
                       $updated_at, $language, ( ! empty($request_link) ? $request_link : ''));
                }
                $output = sprintf('<ul>%1$s</ul>', $repo_list);
            } else {
                $output = '<strong>No GitHub Repository Found</strong>';
            }
        }

        $output = sprintf('<div%1$s%2$s>%3$s%4$s</div>', $this->module_id(), $class, ( ! empty($title) ? sprintf('<h2>%1$s</h2>', $title) : ''), $output);

        return $output;
    }
}

new CA_Github_Legacy;

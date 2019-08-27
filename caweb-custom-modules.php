<?php
/*
Plugin Name: CAWeb Custom Modules
Plugin URI:  https://caweb.cdt.ca.gov/
Description: Custom Divi modules to use with the CAWeb theme
Version:     1.0.0
Author:      Tim Loden
Author URI:  
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: cacm-caweb-custom-modules
Domain Path: /languages
GitHub Plugin URI: https://github.com/timloden/CAWeb-custom-modules

CAWeb Custom Modules is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

CAWeb Custom Modules is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with CAWeb Custom Modules. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/timloden/CAWeb-custom-modules',
    __FILE__,
    'caweb-custom-modules'
);

//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication('your-token-here');

//Optional: Set the branch that contains the stable release.
//$myUpdateChecker->setBranch('stable-branch-name');


if (! function_exists('cacm_initialize_extension') ) :
    /**
     * Creates the extension's main class instance.
     *
     * @since 1.0.0
     */
    function cacm_initialize_extension()
    {
        include_once plugin_dir_path(__FILE__) . 'includes/CawebCustomModules.php';
    }
    add_action('divi_extensions_init', 'cacm_initialize_extension');
endif;

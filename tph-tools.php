<?php
/**
 * @package TphTools
 * 
 * @wordpress-plugin
 * Plugin Name: Tph Tools
 * Plugin URI: http://tphtools.com
 * Description: This is a simple WordPress Plugin that I am creating for testing purpose
 * Version: 1.0.0
 * Author: Mazharul Islam
 * Author URI: http://mazharsdiary.com
 * Text Domain: tph-tools
 * License: GPL v2 or Later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*
MyTools is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

MyTools is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with MyTools. If not, see http://www.gnu.org/licenses/gpl-2.0.txt.
*/

// Check if the file is access directly
if (!defined('WPINC')) {
    exit("Do not access this file directly!");
}

/**
 * define plugin constants
 * - plugin version
 * - plugin files
 * - plugin dir
 * - plugins url
 */

define("TPH_TOOLS_WP_VERSION", '1.0.0');
define("TPH_TOOLS_WP_FILE", __FILE__);
define("TPH_TOOLS_WP_DIR", dirname(TPH_TOOLS_WP_FILE));
define("TPH_TOOLS_WP_URL", plugins_url('', TPH_TOOLS_WP_FILE));

// Check if class tag_exists
if (!class_exists('TphTools')) {
    include_once TPH_TOOLS_WP_DIR . '/includes/class-tph-tools.php';
}

// run the plugin
function run_tph_tools() {
    $plugin = new TphTools();
    $plugin->run();
}
run_tph_tools();
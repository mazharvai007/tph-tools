<?php
/**
 * Plugin Name: Plugin Name
 * Plugin URI:  Plugin URL Link
 * Author:      Plugin Author Name
 * Author URI:  Plugin Author Link
 * Description: This plugin does wonders
 * Version:     0.1.0
 * License:     GPL-2.0+
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: prefix-plugin-name
*/

// Check if the file is access directly
if (!defined('WPINC')) {
    exit("Do not access this file directly!");
}

class TphTools {
    // Loader is responsible for maintaining and registering all hooks
    protected $loader;

    // Unique identifier of the plugin
    protected $tph_tools;

    // Current version of the plugin
    protected $version;


    /**
     * Define the core functionality of the plugin
     */
    public function __construct() {
        if (defined('TPH_TOOLS_WP_VERSION')) {
            $this->version = TPH_TOOLS_WP_VERSION;
        } else {
            $this->version = '1.0.0';
        }

        $this->tph_tools = 'tph_tools';

        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();

    }

    /**
     * Load the required dependencies of the plugin
     *
     * @return void
     */
    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-tph-tools-loader.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-tph-tools-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-tph-tools-public.php';

        $this->loader = new TphToolsLoader();
    }

    /**
     * Register all admin hooks
     *
     * @return void
     */
    private function define_admin_hooks() {
        $plugin_admin = new TphToolsAdmin($this->get_tph_tools(), $this->get_version());
        $plugin_settings = new TphToolsAdminSettings( $this->get_tph_tools(), $this->get_version() );

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

        $this->loader->add_action( 'admin_menu', $plugin_settings, 'setup_plugin_options_menu' );
        $this->loader->add_action( 'init', $plugin_settings, 'tpl_tools_post_type_register' );
    }

    /**
     * Register all public hooks
     *
     * @return void
     */
	private function define_public_hooks() {

		$plugin_public = new Tph_Tools_Public( $this->get_tph_tools(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}    

    public function get_tph_tools() {
        return $this->tph_tools;
    }

    public function get_loader() {
		return $this->loader;
	}

    public function get_version() {
        return $this->version;
    }

    // Run the loader to execute all of the hooks with WordPress
    public function run() {
        $this->loader->run();
    }

}
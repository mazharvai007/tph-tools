<?php

class TphToolsAdmin {

    private $plugin_name;
    private $version;
    
    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        $this->load_dependencies();
    }

    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/class-tph-tools-settings.php';
    }
    
    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tph-tools-admin.css', array(), $this->version, 'all');
        wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' );
    }

    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tph-tools-admin.js', array('jquery'), $this->version, false);
    }
}

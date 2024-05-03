<?php

class TphToolsAdminSettings 
{
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function setup_plugin_options_menu() {
        add_plugins_page(
            "TPL Tools",
            "TPL Tools",
            "manage_options",
            "tpl_tools_options",
            array($this, 'render_settings_page_content')
        );
    }

    public function tpl_tools_post_type_register() {
        $labels = [
            'name' => 'TPL Tools Post'
        ];

        $args = [
            'labels' => $labels,
            'public' => false,
            'show_ui' => true,
            'supports' => ['title', 'editor']
        ];

        register_post_type('tpl_tools_post', $args);
    }

    public function render_settings_page_content() {
        ?>
            <div id="tph-tools-wrap">
                <h2><?php _e( 'TPL Tools Options', 'tpl-tools-plugin' ); ?></h2>

                <?php 
                    $args = array(
                        'post_type' => 'tpl_tools_post',
                        'posts_per_page' => 12,
                    );
                    $loop = new WP_Query($args)
                ?>
                
                <div class="tph-tools-content-area">
                    <div class="tph-tools-block-list">
                        <?php 
                            while ($loop->have_posts()) {
                                $loop->the_post();
                               ?>
                                <div class="tph-tools-block-item">
                                    <div class="tph-tools-block-item-header">
                                        <div class="icon"><i class="fa-regular fa-file-lines"></i></div>
                                        <div class="favourite"><i class="fa-regular fa-star"></i></div>
                                    </div>
                                    <div class="tph-tools-block-item-content">
                                        <h3><?php the_title(); ?></h3>
                                        <?php the_content(); ?>
                                    </div>
                                </div>  
                               <?php
                            }
                        ?>
                        <!-- <div class="tph-tools-block-item">
                            <div class="tph-tools-block-item-header">
                                <div class="icon"><i class="fa-regular fa-file-lines"></i></div>
                                <div class="favourite"><i class="fa-regular fa-star"></i></div>
                            </div>
                            <div class="tph-tools-block-item-content">
                                <h3>Article Generator</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci minus neque repellendus</p>
                            </div>
                        </div>                        
                        <div class="tph-tools-block-item">
                            <div class="tph-tools-block-item-header">
                                <div class="icon"><i class="fa-regular fa-file-lines"></i></div>
                                <div class="favourite"><i class="fa-regular fa-star"></i></div>
                            </div>
                            <div class="tph-tools-block-item-content">
                                <h3>Article Generator</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci minus neque repellendus</p>
                            </div>
                        </div>                        
                        <div class="tph-tools-block-item">
                            <div class="tph-tools-block-item-header">
                                <div class="icon"><i class="fa-regular fa-file-lines"></i></div>
                                <div class="favourite"><i class="fa-regular fa-star"></i></div>
                            </div>
                            <div class="tph-tools-block-item-content">
                                <h3>Article Generator</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci minus neque repellendus</p>
                            </div>
                        </div>                        
                        <div class="tph-tools-block-item">
                            <div class="tph-tools-block-item-header">
                                <div class="icon"><i class="fa-regular fa-file-lines"></i></div>
                                <div class="favourite"><i class="fa-regular fa-star"></i></div>
                            </div>
                            <div class="tph-tools-block-item-content">
                                <h3>Article Generator</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci minus neque repellendus</p>
                            </div>
                        </div>                        
                        <div class="tph-tools-block-item">
                            <div class="tph-tools-block-item-header">
                                <div class="icon"><i class="fa-regular fa-file-lines"></i></div>
                                <div class="favourite"><i class="fa-regular fa-star"></i></div>
                            </div>
                            <div class="tph-tools-block-item-content">
                                <h3>Article Generator</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci minus neque repellendus</p>
                            </div>
                        </div>                        
                        <div class="tph-tools-block-item">
                            <div class="tph-tools-block-item-header">
                                <div class="icon"><i class="fa-regular fa-file-lines"></i></div>
                                <div class="favourite"><i class="fa-regular fa-star"></i></div>
                            </div>
                            <div class="tph-tools-block-item-content">
                                <h3>Article Generator</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci minus neque repellendus</p>
                            </div>
                        </div>                        
                        <div class="tph-tools-block-item">
                            <div class="tph-tools-block-item-header">
                                <div class="icon"><i class="fa-regular fa-file-lines"></i></div>
                                <div class="favourite"><i class="fa-regular fa-star"></i></div>
                            </div>
                            <div class="tph-tools-block-item-content">
                                <h3>Article Generator</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci minus neque repellendus</p>
                            </div>
                        </div>                        
                        <div class="tph-tools-block-item">
                            <div class="tph-tools-block-item-header">
                                <div class="icon"><i class="fa-regular fa-file-lines"></i></div>
                                <div class="favourite"><i class="fa-regular fa-star"></i></div>
                            </div>
                            <div class="tph-tools-block-item-content">
                                <h3>Article Generator</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci minus neque repellendus</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        <?php
    }
}
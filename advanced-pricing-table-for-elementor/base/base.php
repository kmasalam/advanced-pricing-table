<?php 
class Advanced_pricing_table_For_Elementor {
  // Activate 
  function activate(){
      flush_rewrite_rules();
  }

  // Deactivate 
  function deactivate(){
      flush_rewrite_rules();
  }

  /**
   * Creates an Action Menu
   */

  function APE_for_elementor_pro_settings_link($links, $file) {
      static $this_plugin;
   
      if (!$this_plugin) {
          $this_plugin = plugin_basename(__FILE__);
      }
      $settings_links = sprintf( '<a href="admin.php?page=APE-settings">' . __( 'Settings', 'aa_elementor' ) . '</a>' );

        if(! class_exists( 'APE_Pro' ) ) {
            // check to make sure we are on the correct plugin
            if ($file == $this_plugin) {
                // link to what ever you want
                $plugin_links['APE_Pro'] = sprintf('<a href="https://advanceaddons.com/product/APE/" target="_blank" style="color:#39a700eb; font-weight: bold;">' . __( 'Get Pro', 'aa_elementor' ) . '</a>');
                
                // add the links to the list of links already there
                foreach($plugin_links as $link) {
                    array_unshift($links,$settings_links, $link);
                }
            }
        }
   
      return $links;
  }

  // Widget register
  function __construct() {
      add_action( 'elementor/widgets/widgets_registered', array( $this, 'ap_for_elementor_widget_bundle') );
      // Register custom controls
     // add_action( 'elementor/controls/controls_registered', array( $this, 'register_controls'));
  }

 function ape_for_elementor_widget_register() {
      $this->ap_for_elementor_widget_bundle();
      $this->APE_for_elementor_script();
  }

  // APE widget bundle
  function ap_for_elementor_widget_bundle(){
    $APE_elements_keys = [
          'widget-pricingtable',

      ];

      $APE_default_settings = array_fill_keys( $APE_elements_keys, true ); 

      $check_component_active = get_option( 'APE_save_settings', $APE_default_settings );

        // Alert Elements
        if( $check_component_active['widget-pricingtable'] ) {
            require_once APE_PATH . '/modules/pricing-table/widget.php';
        }
      // helper functions
      require_once APE_PATH . '/modules/helper-functions.php';
      require_once APE_PATH . '/includes/custom-icons.php';
      
  }

  // Register style & script
  function ape_for_elementor_register(){
      add_action('wp_enqueue_scripts', array($this, 'APE_for_elementor_css'), 99);
      add_action('wp_enqueue_scripts', array($this, 'APE_for_elementor_script'), 99);
      add_action('elementor/editor/before_enqueue_scripts', array($this, 'APE_preview_script'), 0);
      add_filter('plugin_action_links', array($this, 'APE_for_elementor_pro_settings_link'),10, 2);
  }

  function APE_preview_script(){
        wp_enqueue_style(
          'advance-icon',
          APE_DIR_ASSETS . 'fonts/style.min.css',
          null,
          APE_VERSION
        );

        // font-awesome
        wp_enqueue_style(
          'font-awesome2',
          APE_DIR_ASSETS . 'vendor/css/font-awesome.min.css',
          null,
          APE_VERSION
      );

      
  }
  // Css include
  function APE_for_elementor_css(){
    $APE_elements_keys = [
      'widget-team',
  ];
    $APE_default_settings = array_fill_keys( $APE_elements_keys, true ); 
    $check_component_active = get_option( 'APE_save_settings', $APE_default_settings );
        // font-awesome
        wp_enqueue_style(
          'font-awesome',
          APE_DIR_ASSETS . 'vendor/css/font-awesome.min.css',
          null,
          APE_VERSION
      );

          // line-icon
          wp_enqueue_style(
            'line-icon',
            APE_DIR_ASSETS . 'vendor/css/line-icon.css',
            null,
            APE_VERSION
        );

          // common
          wp_enqueue_style(
            'APE-common',
            APE_DIR_ASSETS . 'css/common.css',
            null,
            APE_VERSION
        );

          // themeroots
          wp_enqueue_style(
            'themeroots',
            APE_DIR_ASSETS . 'vendor/css/themeroots.min.css',
            null,
            APE_VERSION
        );

        // inline-notice
        wp_enqueue_style(
          'pricingtable',
          APE_DIR_ASSETS . 'css/pricing-table.css',
          null,
          APE_VERSION
        );

        // animate
        wp_enqueue_style(
          'animate',
          APE_DIR_ASSETS . 'vendor/css/animate.css',
          null,
          APE_VERSION
        );


        // extra
        wp_enqueue_style(
          'extra',
          APE_DIR_ASSETS . 'extra.css',
          null,
          APE_VERSION
        );
        


  }

  // Script include
  function APE_for_elementor_script(){
      $APE_elements_keys = [
          'widget-team',
      ];
      $APE_default_settings = array_fill_keys( $APE_elements_keys, true ); 
      $check_component_active = get_option( 'APE_save_settings', $APE_default_settings );

     

      wp_enqueue_script(
        'widgetPostgrid',
        APE_DIR_ASSETS . 'js/widgetAdvancedColor.js',
        ['jquery'],
        APE_VERSION,
        true
      );

    
    
  }



}
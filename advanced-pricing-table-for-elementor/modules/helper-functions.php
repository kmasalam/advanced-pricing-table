<?php
namespace Elementor;

function APE_for_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'APE_elementor',
        [
            'title'  => esc_html__('Advanced Pricing', 'ap_elementor'),
            'icon'   => 'eicon-font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\APE_for_elementor_init');


if (!function_exists('APE_for_elementor_array_get')) {
    function APE_for_elementor_array_get($array, $key, $default = null)
    {
        if (!is_array($array)) return $default;
        return array_key_exists($key, $array) ? $array[$key] : $default;
    }
}

add_filter( 'widget_text', 'do_shortcode' );

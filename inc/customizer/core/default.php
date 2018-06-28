<?php
/**
 * Default theme options.
 *
 * @package Infinity Blog
 */

if (!function_exists('infinity_blog_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function infinity_blog_get_default_theme_options() {

	$defaults = array();

	// Slider Section.
	$defaults['show_slider_section']           = 1;
	$defaults['number_of_home_slider']         = 3;
	$defaults['number_of_content_home_slider'] = 20;
	$defaults['select_slider_from']            = 'from-category';
	$defaults['select-page-for-slider']        = 0;
	$defaults['select_category_for_slider']    = 1;
	$defaults['slider_section_layout']         = 'twp-slider';
	$defaults['button_text_on_slider']         = esc_html__('Read More', 'infinity-blog');
    $defaults['primary_font'] = 'Roboto+Condensed:400,700';
    $defaults['secondary_font'] = 'Open+Sans:400,400italic,600,700';
	/*layout*/
	$defaults['enable_overlay_option']    = 1;
	$defaults['homepage_layout_option']   = 'full-width';
	$defaults['read_more_button_text']    = esc_html__('Continue Reading', 'infinity-blog');
	$defaults['global_layout']            = 'no-sidebar';
	$defaults['excerpt_length_global']    = 50;
	$defaults['single_post_image_layout'] = 'full';
	$defaults['pagination_type']          = 'infinite_scroll_load';
	$defaults['copyright_text']           = esc_html__('Copyright All right reserved', 'infinity-blog');
	$defaults['number_of_footer_widget']  = 3;
	$defaults['breadcrumb_type']          = 'simple';
	$defaults['enable_preloader']         = 0;

	// Pass through filter.
	$defaults = apply_filters('infinity_blog_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;

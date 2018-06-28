<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function infinity_blog_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'infinity-blog'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'infinity-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title center-widget-title primary-font">',
        'after_title' => '</h5>',
    ));


    $infinity_blog_footer_widgets_number = infinity_blog_get_option('number_of_footer_widget');

    if ($infinity_blog_footer_widgets_number > 0) {
        register_sidebar(array(
            'name' => esc_html__('Footer Column One', 'infinity-blog'),
            'id' => 'footer-col-one',
            'description' => esc_html__('Displays items on footer section.', 'infinity-blog'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5 class="widget-title bordered-widget-title primary-font secondary-textcolor">',
            'after_title' => '</h5>',
        ));
        if ($infinity_blog_footer_widgets_number > 1) {
            register_sidebar(array(
                'name' => esc_html__('Footer Column Two', 'infinity-blog'),
                'id' => 'footer-col-two',
                'description' => esc_html__('Displays items on footer section.', 'infinity-blog'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title' => '<h5 class="widget-title bordered-widget-title primary-font secondary-textcolor">',
                'after_title' => '</h5>',
            ));
        }
        if ($infinity_blog_footer_widgets_number > 2) {
            register_sidebar(array(
                'name' => esc_html__('Footer Column Three', 'infinity-blog'),
                'id' => 'footer-col-three',
                'description' => esc_html__('Displays items on footer section.', 'infinity-blog'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title' => '<h5 class="widget-title bordered-widget-title primary-font secondary-textcolor">',
                'after_title' => '</h5>',
            ));
        }
    }
}

add_action('widgets_init', 'infinity_blog_widgets_init');

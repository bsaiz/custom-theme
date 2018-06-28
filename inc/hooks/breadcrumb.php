<?php

if (!function_exists('infinity_blog_add_breadcrumb')) :

    /**
     * Add breadcrumb.
     *
     * @since 1.0.0
     */
    function infinity_blog_add_breadcrumb()
    {

        // Bail if Breadcrumb disabled.
        $breadcrumb_type = infinity_blog_get_option('breadcrumb_type');
        if ('disabled' === $breadcrumb_type) {
            return;
        }
        // Bail if Home Page.
        if (is_front_page() || is_home()) {
            return;
        }
        // Render breadcrumb.
        switch ($breadcrumb_type) {
            case 'simple':
                infinity_blog_simple_breadcrumb();
                break;

            case 'advanced':
                if (function_exists('bcn_display')) {
                    bcn_display();
                }
                break;

            default:
                break;
        }
        return;

    }

endif;

add_action('infinity_blog_action_breadcrumb', 'infinity_blog_add_breadcrumb', 10);

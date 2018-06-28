<?php
/**
 * CSS related hooks.
 *
 * This file contains hook functions which are related to CSS.
 *
 * @package Infinity Blog
 */

if (!function_exists('infinity_blog_trigger_custom_css_action')):

    /**
     * Do action theme custom CSS.
     *
     * @since 1.0.0
     */
    function infinity_blog_trigger_custom_css_action()
    {
        global $infinity_blog_google_fonts;
        $infinity_blog_enable_banner_overlay = infinity_blog_get_option('enable_overlay_option');
        ?>
        <style type="text/css">
            <?php

            if ($infinity_blog_enable_banner_overlay == 1) {
                ?>
            body .inner-header-overlay,
            body .single-slide:after{
                filter: alpha(opacity=42);
                opacity: .42;
            }

            body .single-slide:after{
               content: "";
            }

            <?php
        }

        ?>
        </style>

    <?php }

endif;
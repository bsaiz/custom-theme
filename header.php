<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Infinity Blog
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php if ((infinity_blog_get_option('enable_preloader')) == 1) { ?>
    <div class="preloader">
        <div class="preloader-wrapper">
            <div class="loader">
            </div>
        </div>
    </div>
<?php } ?>
<!-- full-screen-layout/boxed-layout -->
<?php if (infinity_blog_get_option('homepage_layout_option') == 'full-width') {
    $infinity_blog_homepage_layout = 'full-screen-layout';
} elseif (infinity_blog_get_option('homepage_layout_option') == 'boxed') {
    $infinity_blog_homepage_layout = 'boxed-layout';
} ?>
<div id="page" class="site site-bg <?php echo $infinity_blog_homepage_layout; ?>">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'infinity-blog'); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div id="nav-affix" class="top-header header--fixed primary-bgcolor">
            <div class="container">
                <nav class="main-navigation" role="navigation">
                    <span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                         <span class="screen-reader-text">
                            <?php esc_html_e('Primary Menu', 'infinity-blog'); ?>
                        </span>
                        <i class="ham"></i>
                    </span>

                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => 'div',
                        'container_class' => 'menu'
                    )); ?>

                    <span class="icon-search">
                        <i class="ion-ios-search-strong"></i>
                    </span>

                    <div class="social-icons">
                        <?php
                        wp_nav_menu(
                            array('theme_location' => 'social',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                                'menu_id' => 'social-menu',
                                'fallback_cb' => false,
                                'menu_class' => false
                            )); ?>
                    </div>
                </nav><!-- #site-navigation -->
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="site-branding">
                        <div class="twp-site-branding">
                            <div class="branding-center">
                                <?php
                                infinity_blog_the_custom_logo();
                                if (is_front_page() && is_home()) : ?>
                                    <span class="site-title primary-font">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                </span>
                                <?php else : ?>
                                    <span class="site-title primary-font">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                </span>
                                <?php
                                endif;
                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) : ?>
                                    <p class="site-description">
                                        <?php echo esc_html($description); ?>
                                    </p>
                                <?php
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- .site-branding -->
                </div>
            </div>
        </div>

    </header>
    <!-- #masthead -->
    <div class="popup-search">
        <div class="table-align">
            <div class="table-align-cell v-align-middle">
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="close-popup"></div>
    </div>
    <!--    Searchbar Ends-->
    <!-- Innerpage Header Begins Here -->
    <?php
    if (is_front_page() || is_home()) {
        do_action('infinity_blog_action_slider_post');
        do_action('infinity_blog_action_intro_post');
    } else {
        do_action('infinity-blog-page-inner-title');
    }
    ?>
    <!-- Innerpage Header Ends Here -->
    <div id="content" class="site-content">
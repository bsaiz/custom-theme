<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Infinity Blog
 */
?>
</div><!-- #content -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <?php $infinity_blog_footer_widgets_number = infinity_blog_get_option('number_of_footer_widget');
    if ($infinity_blog_footer_widgets_number != 0) {?>
        <div class="footer-widget">
            <div class="container">
                <?php
                if (1 == $infinity_blog_footer_widgets_number) {
                    $col = 'col-md-12';
                } elseif (2 == $infinity_blog_footer_widgets_number) {
                    $col = 'col-md-6';
                } elseif (3 == $infinity_blog_footer_widgets_number) {
                    $col = 'col-md-4';
                } elseif (4 == $infinity_blog_footer_widgets_number) {
                    $col = 'col-md-3';
                } else {
                    $col = 'col-md-3';
                }
                if (is_active_sidebar('footer-col-one') || is_active_sidebar('footer-col-two') || is_active_sidebar('footer-col-three') || is_active_sidebar('footer-col-four')) {?>
                    <div class="row">
                        <?php if (is_active_sidebar('footer-col-one') && $infinity_blog_footer_widgets_number > 0):?>
                            <div class="contact-list <?php echo $col;?>">
                                <?php dynamic_sidebar('footer-col-one');?>
                            </div>
                        <?php endif;?>
                        <?php if (is_active_sidebar('footer-col-two') && $infinity_blog_footer_widgets_number > 1):?>
                            <div class="contact-list <?php echo $col;?>">
                                <?php dynamic_sidebar('footer-col-two');?>
                            </div>
                        <?php endif;?>
                        <?php if (is_active_sidebar('footer-col-three') && $infinity_blog_footer_widgets_number > 2):?>
                            <div class="contact-list <?php echo $col;?>">
                                <?php dynamic_sidebar('footer-col-three');?>
                            </div>
                        <?php endif;?>
                        <?php if (is_active_sidebar('footer-col-four') && $infinity_blog_footer_widgets_number > 3):?>
                            <div class="contact-list <?php echo $col;?>">
                                <?php dynamic_sidebar('footer-col-four');?>
                            </div>
                        <?php endif;?>
                    </div>
                <?php }?>
            </div>
        </div>
    <?php }?>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-info text-center">
                        <h4 class="site-copyright secondary-textcolor secondary-font">
                            <?php
                            $infinity_blog_copyright_text = wp_kses_post(infinity_blog_get_option('copyright_text'));
                            if (!empty($infinity_blog_copyright_text)) {
                                echo wp_kses_post(infinity_blog_get_option('copyright_text'));
                            }
                            ?>
                            <?php printf(esc_html__('Theme: %1$s by %2$s', 'infinity-blog'), 'Infinity Blog', '<a href="http://themeinwp.com/" target = "_blank" rel="designer">Themeinwp </a>');?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<div class="scroll-up alt-bgcolor">
    <i class="ion-ios-arrow-up text-light"></i>
</div>
<?php wp_footer();?>
</body>
</html>
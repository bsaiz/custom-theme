<?php
if (!function_exists('infinity_blog_banner_slider_args')) :
    /**
     * Banner Slider Details
     *
     * @since Infinity Blog 1.0.0
     *
     * @return array $qargs Slider details.
     */
    function infinity_blog_banner_slider_args()
    {
        $infinity_blog_banner_slider_number = absint(infinity_blog_get_option('number_of_home_slider'));
        $infinity_blog_banner_slider_from = esc_attr(infinity_blog_get_option('select_slider_from'));
        switch ($infinity_blog_banner_slider_from) {
            case 'from-page':
                $infinity_blog_banner_slider_page_list_array = array();
                for ($i = 1; $i <= $infinity_blog_banner_slider_number; $i++) {
                    $infinity_blog_banner_slider_page_list = infinity_blog_get_option('select_page_for_slider_' . $i);
                    if (!empty($infinity_blog_banner_slider_page_list)) {
                        $infinity_blog_banner_slider_page_list_array[] = absint($infinity_blog_banner_slider_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($infinity_blog_banner_slider_page_list_array)) {
                    return;
                }
                /*page query*/
                $qargs = array(
                    'posts_per_page' => absint($infinity_blog_banner_slider_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => absint($infinity_blog_banner_slider_page_list_array),
                );
                return $qargs;
                break;

            case 'from-category':
                $infinity_blog_banner_slider_category = absint(infinity_blog_get_option('select_category_for_slider'));
                $qargs = array(
                    'posts_per_page' => absint($infinity_blog_banner_slider_number),
                    'post_type' => 'post',
                    'cat' => absint($infinity_blog_banner_slider_category),
                );
                return $qargs;
                break;

            default:
                break;
        }
        ?>
        <?php
    }
endif;


if (!function_exists('infinity_blog_banner_slider')) :
    /**
     * Banner Slider
     *
     * @since Infinity Blog 1.0.0
     *
     */
    function infinity_blog_banner_slider()
    {
        $infinity_blog_slider_button_text = esc_html(infinity_blog_get_option('button_text_on_slider'));
        $infinity_blog_slider_layout = esc_attr(infinity_blog_get_option('slider_section_layout'));
        $infinity_blog_slider_excerpt_number = absint(infinity_blog_get_option('number_of_content_home_slider'));
        if (1 != infinity_blog_get_option('show_slider_section')) {
            return null;
        }
        $infinity_blog_banner_slider_args = infinity_blog_banner_slider_args();
        $infinity_blog_banner_slider_query = new WP_Query($infinity_blog_banner_slider_args); ?>
        <section class="twp-slider-wrapper pb-30">
            <div class="twp-slider <?php echo esc_attr($infinity_blog_slider_layout);
            ?>">
                <?php
                if ($infinity_blog_banner_slider_query->have_posts()) :
                    while ($infinity_blog_banner_slider_query->have_posts()) : $infinity_blog_banner_slider_query->the_post();
                        if (has_excerpt()) {
                            $infinity_blog_slider_content = get_the_excerpt();
                        } else {
                            $infinity_blog_slider_content = infinity_blog_words_count($infinity_blog_slider_excerpt_number, get_the_content());
                        }
                        ?>
                        <div class="single-slide">
                            <?php if (has_post_thumbnail()) {
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                                $url = $thumb['0'];  ?>
                                <div class="slide-bg bg-image animated">
                                    <img src="<?php echo esc_url($url); ?>">
                                </div>
                            <?php } ?>
                            <div class="slide-text animated secondary-textcolor">
                                <div class="table-align">
                                    <div class="table-align-cell v-align-middle">
                                        <h2 class="slide-title"><?php the_title(); ?></h2>
                                        <?php if ($infinity_blog_slider_excerpt_number != 0) { ?>
                                            <p class="visible hidden-xs"><?php echo wp_kses_post($infinity_blog_slider_content); ?></p>
                                        <?php } ?>
                                        <a href="<?php the_permalink(); ?>" class="btn-link btn-link-primary">
                                            <?php echo esc_html($infinity_blog_slider_button_text); ?> <i class="ion-ios-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </section>
        <!-- end slider-section -->
        <?php
    }
endif;
add_action('infinity_blog_action_slider_post', 'infinity_blog_banner_slider', 10);
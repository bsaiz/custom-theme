<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Infinity Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    $div_class = '';
    if (has_post_thumbnail()){
        $div_class = '';
    } else {
        $div_class = 'content-no-image';
    }?>
    <div class="twp-article-wrapper <?php echo esc_attr($div_class); ?>">
        <?php if (!is_single()) { ?>
            <div class="twp-infinity-article primary-bgcolor">
            <header class="article-header">
                <div class="post-category secondary-font">
                    <span class="meta-span">
                        <?php infinity_blog_entry_category(); ?>
                    </span>
                </div>
            </header>
            <?php if (has_post_thumbnail()) { ?>
                <div class="entry-content">
                    <div class='twp-content-image'>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail('infinity-blog-related-post'); ?>
                        </a>
                    </div>
                    <div class="twp-content-details">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="entry-meta text-uppercase">
                            <?php infinity_blog_posted_details(); ?>
                        </div>
                        
                        <?php the_excerpt(); ?>
                    </div>
                </div><!-- .entry-content -->
                </div>
            <?php } else{ ?>
                <div class="entry-content twp-entry-content">
                    <div class="twp-content-details">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="entry-meta text-uppercase">
                            <?php infinity_blog_posted_details(); ?>
                        </div>

                        <?php the_excerpt(); ?>
                    </div>
                </div><!-- .entry-content -->
            </div>
            <?php }?>

        <?php } else { ?>
            <div class="entry-content">
                <?php
                $image_values = get_post_meta($post->ID, 'infinity-blog-meta-image-layout', true);
                if (empty($image_values)) {
                    $values = esc_attr(infinity_blog_get_option('single_post_image_layout'));
                } else {
                    $values = esc_attr($image_values);
                }
                if ('no-image' != $values) {
                if ('left' == $values) {
                echo "<div class='image-left'>"; ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('full');
                    } elseif ('right' == $values) {
                    echo "<div class='image-right'>"; ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail('full');
                        } else {
                        echo "<div class='image-full'>"; ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail('full');
                            }
                            echo "</a></div>";/*div end */
                            }
                            ?>
                            <div class="twp-text-align">
                                <?php the_content(); ?>
                            </div>
                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'infinity-blog'),
                                'after' => '</div>',
                            ));
                            ?>
            </div><!-- .entry-content -->
        <?php } ?>
    </div>
</article><!-- #post-## -->

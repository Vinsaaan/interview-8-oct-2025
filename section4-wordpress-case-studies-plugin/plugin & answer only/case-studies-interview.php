<?php
/**
 * Plugin Name: Case Studies (Interview)
 * Description: Adds a Case Study custom post type, a shortcode [featured_case_studies] (shows the 3 most recent), and a title filter that modifies Case Study titles only on the archive page. Built without plugin builders, using core WordPress APIs—ideal for interview/demo environments.
 * Version: 1.0.0
 * Author: Vincent
 */

if (!defined('ABSPATH')) {
    exit; // no direct access
}

/**
 * 1) Register custom post type: case_study
 */
add_action('init', function () {
    $labels = [
        'name'               => __('Case Studies', 'case-studies-interview'),
        'singular_name'      => __('Case Study', 'case-studies-interview'),
        'add_new'            => __('Add New', 'case-studies-interview'),
        'add_new_item'       => __('Add New Case Study', 'case-studies-interview'),
        'edit_item'          => __('Edit Case Study', 'case-studies-interview'),
        'new_item'           => __('New Case Study', 'case-studies-interview'),
        'view_item'          => __('View Case Study', 'case-studies-interview'),
        'search_items'       => __('Search Case Studies', 'case-studies-interview'),
        'not_found'          => __('No case studies found', 'case-studies-interview'),
        'not_found_in_trash' => __('No case studies found in Trash', 'case-studies-interview'),
        'all_items'          => __('All Case Studies', 'case-studies-interview'),
        'menu_name'          => __('Case Studies', 'case-studies-interview'),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,                 // front-end archive at /case-studies/
        'rewrite'            => ['slug' => 'case-studies'],
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => ['title', 'editor', 'excerpt', 'thumbnail'],
        'show_in_rest'       => true,                 // Gutenberg + REST API
        'hierarchical'       => false,
    ];

    register_post_type('case_study', $args);
});

/**
 * 2) Shortcode: [featured_case_studies]
 *    Displays the 3 most recent published Case Studies.
 *    Usage: place [featured_case_studies] in any page/post content.
 */
add_shortcode('featured_case_studies', function ($atts) {
    // Fixed to 3 to match the assignment spec
    $query = new WP_Query([
        'post_type'      => 'case_study',
        'post_status'    => 'publish',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'no_found_rows'  => true, // small perf optimization
    ]);

    if (!$query->have_posts()) {
        return '<p>' . esc_html__('No case studies found.', 'case-studies-interview') . '</p>';
    }

    ob_start(); ?>
    <div class="featured-case-studies">
        <ul class="featured-case-studies__list" style="list-style:none;padding:0;margin:0;display:grid;gap:12px">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li class="featured-case-studies__item" style="border:1px solid #e6e6e6;border-radius:8px;overflow:hidden;background:#fff">
                    <a class="featured-case-studies__link" href="<?php echo esc_url(get_permalink()); ?>" style="display:block;text-decoration:none;color:inherit;padding:12px">
                        <?php if (has_post_thumbnail()) : ?>
                            <span class="featured-case-studies__thumb" style="display:block;margin-bottom:8px">
                                <?php the_post_thumbnail('medium'); ?>
                            </span>
                        <?php endif; ?>
                        <strong class="featured-case-studies__title" style="display:block;margin-bottom:4px">
                            <?php echo esc_html(get_the_title()); ?>
                        </strong>
                        <?php if (has_excerpt()) : ?>
                            <span class="featured-case-studies__excerpt" style="display:block;color:#666;font-size:.95em">
                                <?php echo esc_html(get_the_excerpt()); ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
});

/**
 * 3) Filter: modify titles ONLY on Case Study archive pages
 *    Prefixes "Case Study: " to titles on /case-studies/ listing, without changing stored titles.
 */
add_filter('the_title', function ($title, $post_id = 0) {
    // Never affect admin screens
    if (is_admin()) {
        return $title;
    }

    // Only apply on the Case Study archive page, in the main loop, for our post type
    if (is_post_type_archive('case_study') && in_the_loop() && get_post_type($post_id) === 'case_study') {
        return 'Case Study: ' . $title;
    }

    return $title;
}, 10, 2);

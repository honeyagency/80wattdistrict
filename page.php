<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post    = new TimberPost();

if (is_front_page() == true) {
    $context['home'] = prepareHomepageFields();
} else {
    $context['header'] = prepareHeaderFields();
    if (is_page(7)) {
        $context['about'] = prepareAboutFields();
    } elseif (is_page(9)) {
        $context['sidebar'] = prepareServiceFields();
    } elseif (is_page(13)) {

        global $paged;
        if (!isset($paged) || !$paged) {
            $paged = 1;
        }
        $args = array(
            'post_type'      => 'news',
            'posts_per_page' => 10,
            'order'          => 'DESC',
            'orderby'        => 'date',
            'paged'          => $paged,
        );
        $context['news'] = new Timber\PostQuery($args);

        // $context['news']   = getCustomPosts('news', '5', null, 'date', null, null, $paged);
        $context['events'] = getCustomPosts('event', '10', null, 'eventdate', null, null);

    }
}

$context['post'] = $post;
Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);

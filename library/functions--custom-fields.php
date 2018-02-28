<?php

function prepareSiteOptions()
{
    $social = array(
        'facebook'  => get_field('field_5a19be51866f5', 'options'),
        'instagram' => get_field('field_5a19be5b866f6', 'options'),
        'email'     => get_field('field_5a95eaee0f423', 'options'),
    );
    $defaultImageId = get_field('field_5a19bf1ee4980', 'options');
    if (!empty($defaultImageId)) {
        $defaultImage = new TimberImage($defaultImageId);
    } else {
        $defaultImage = null;
    }
    $search = array(
        'form' => get_search_form(false),
    );
    $default = array(
        'image' => $defaultImage,
    );

    if (have_rows('field_5a9457dbadb82', 'options')) {
        $links = array();
        while (have_rows('field_5a9457dbadb82', 'options')) {
            the_row();
            $links[] = get_sub_field('field_5a9457e515667', 'options');
        }
    }
    if (have_rows('field_5a945b06f25f0', 'options')) {
        $sublinks = array();
        while (have_rows('field_5a945b06f25f0', 'options')) {
            the_row();
            $sublinks[] = get_sub_field('field_5a945b1ff25f1', 'options');
        }
    }
    $footer = array(
        'schedule' => get_field('field_5a94578eadb81', 'options'),
        'links'    => $links,
        'address'  => get_field('field_5a94580115668', 'options'),
        'sublinks' => $sublinks,
    );
    $options = array(
        'social'  => $social,
        'default' => $default,
        'search'  => $search,
        'footer'  => $footer,
    );
    return $options;
}

function prepareHomepageFields()
{
    $header = array(
        'title' => get_field('field_5a19c23174235'),
        'text'  => get_field('field_5a19c23574236'),
        'link'  => get_field('field_5a19c24074237'),
    );
    $servicesImageId = get_field('field_5a19cd122b576');
    if (!empty($servicesImageId)) {
        $servicesImage = new TimberImage($servicesImageId);
    } else {
        $servicesImage = null;
    }
    $services = array(
        'image' => $servicesImage,
        'title' => get_field('field_5a19cd5f2b579'),
        'text'  => get_field('field_5a19cd662b57a'),
        'link'  => get_field('field_5a19cd712b57b'),
    );
    $news = array(
        'title' => get_field('field_5a1a0cc5d4108'),
        'text'  => get_field('field_5a1a0cd2d4109'),
    );
    $developmentImageId = get_field('field_5a1a0d52d6682');
    if (!empty($developmentImageId)) {
        $developmentImage = new TimberImage($developmentImageId);
    } else {
        $developmentImage = null;
    }
    $development = array(
        'title'        => get_field('field_5a1a0ce1d410b'),
        'image'        => $developmentImage,
        'developments' => getCustomPosts('development', '2', 'featured', 'date', null, null),
    );
    $home = array(
        'header'      => $header,
        'services'    => $services,
        'news'        => $news,
        'development' => $development,
    );
    return $home;
}
function prepareHeaderFields()
{

    $imageOneId = get_field('field_5a8c67b1c743c');
    
    $imageOne   = null;
    if (!empty($imageOneId)) {
        $imageOne = new TimberImage($imageOneId);
    }

    $imageTwoId = get_field('field_5a8c67ccac34c');
    $imageTwo   = null;
    if (!empty($imageTwoId)) {
        $imageTwo = new TimberImage($imageTwoId);
    }

    $images = array(
        'images' => get_field('field_5a8c6788c743b'),
        'one'    => $imageOne,
        'two'    => $imageTwo,
    );
    $header = array(
        'images' => $images,
    );
    return $header;
}

function prepareAboutFields()
{
    $map = get_field('field_5a946439a56d9');
    if (have_rows('field_5a946452a56da')) {
        $stat = array();
        while (have_rows('field_5a946452a56da')) {
            the_row();
            $iconType = get_sub_field('field_5a94645da56db');
            $icon     = array(
                'type' => $iconType,
            );

            if ($iconType != 'icon') {
                $imageId = get_sub_field('field_5a94651fa56e0');
                $image   = null;
                if (!empty($imageId)) {
                    $icon['image'] = new TimberImage($imageId);
                }
            } else {
                $icon['class'] = get_sub_field('field_5a946512a56df');
            }

            $stat[] = array(
                'icon'       => $icon,
                'large_text' => get_sub_field('field_5a9464c7a56dc'),
                'small_text' => get_sub_field('field_5a9464cea56dd'),
                'layout'     => get_sub_field('field_5a9464d4a56de'),
            );
        }
    }
    $about = array(
        'map'   => $map,
        'stats' => $stat,
    );

    return $about;
}

function prepareServiceFields()
{
    if (have_rows('field_5a9491ede958d')) {
        $items = array();
        while (have_rows('field_5a9491ede958d')) {
            the_row();
            $items[] = array(
                'title'   => get_sub_field('field_5a949208e958e'),
                'content' => get_sub_field('field_5a94920ee958f'),
            );
        }
    }
    $services = array(
        'title' => get_field('field_5a9491d7e958c'),
        'items' => $items,
    );
    return $services;
}
function prepareEventFields()
{

    $event = array(
        'start_date' => get_field('field_5a94970678653'),
        'start_time' => get_field('field_5a94972e78656'),
    );
    return $event;
}
function prepareNewsEventsPage()
{
    $section = array(
        'news'   => get_field('field_5a95ec41f00e9'),
        'events' => get_field('field_5a95ec58f00eb'),
        'email'  => get_field('field_5a95ec6bf00ed'),
        'signup' => get_field('field_5a95ec79f00ee'),
    );
    return $section;
}

<?php

function prepareSiteOptions()
{
    $social = array(
        'facebook'  => get_field('field_5a19be51866f5', 'options'),
        'instagram' => get_field('field_5a19be5b866f6', 'options'),
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
    $options = array(
        'social'  => $social,
        'default' => $default,
        'search'  => $search,
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
        'form'  => get_field('field_5a1a0cd8d410a'),

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

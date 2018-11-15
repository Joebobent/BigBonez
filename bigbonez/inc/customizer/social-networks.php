<?php

/**
 * Social Network Listings
**/
    // Social Networks Section
    $wp_customize->add_section( 'jbones_social_section' , array(
        'title'         => __( 'Social Networks', 'jbones' ),
        'description'   => __( 'Add the URL to your Social Networking pages.', 'jbones' ),
        'priority'      => '0',
        'panel'         => 'nav_menus',
    ) );
    $wp_customize->add_setting( 'jbones_social[facebook]' );
    $wp_customize->add_control( 'jbones_social[facebook]', array(
        'label'     => __( 'Facebook', 'jbones' ),
        'type'      => 'url',
        'section'   => 'jbones_social_section',
        'settings'  => 'jbones_social[facebook]',
    ) );
    $wp_customize->add_setting( 'jbones_social[twitter]' );
    $wp_customize->add_control( 'jbones_social[twitter]', array(
        'label'     => __( 'Twitter', 'jbones' ),
        'type'      => 'url',
        'section'   => 'jbones_social_section',
        'settings'  => 'jbones_social[twitter]',
    ) );
    $wp_customize->add_setting( 'jbones_social[googleplus]' );
    $wp_customize->add_control( 'jbones_social[googleplus]', array(
        'label'     => __( 'Google+', 'jbones' ),
        'type'      => 'url',
        'section'   => 'jbones_social_section',
        'settings'  => 'jbones_social[googleplus]',
    ) );
    $wp_customize->add_setting( 'jbones_social[linkedin]' );
    $wp_customize->add_control( 'jbones_social[linkedin]', array(
        'label'     => __( 'LinkedIn', 'jbones' ),
        'type'      => 'url',
        'section'   => 'jbones_social_section',
        'settings'  => 'jbones_social[linkedin]',
    ) );
    $wp_customize->add_setting( 'jbones_social[youtube]' );
    $wp_customize->add_control( 'jbones_social[youtube]', array(
        'label'     => __( 'YouTube', 'jbones' ),
        'type'      => 'url',
        'section'   => 'jbones_social_section',
        'settings'  => 'jbones_social[youtube]',
    ) );
    $wp_customize->add_setting( 'jbones_social[vimeo]' );
    $wp_customize->add_control( 'jbones_social[vimeo]', array(
        'label'     => __( 'Vimeo', 'jbones' ),
        'type'      => 'url',
        'section'   => 'jbones_social_section',
        'settings'  => 'jbones_social[vimeo]',
    ) );
    $wp_customize->add_setting( 'jbones_social[github]' );
    $wp_customize->add_control( 'jbones_social[github]', array(
        'label'     => __( 'Github', 'jbones' ),
        'type'      => 'url',
        'section'   => 'jbones_social_section',
        'settings'  => 'jbones_social[github]',
    ) );
    $wp_customize->add_setting( 'jbones_social[dribbble]' );
    $wp_customize->add_control( 'jbones_social[dribbble]', array(
        'label'     => __( 'Dribbble', 'jbones' ),
        'type'      => 'url',
        'section'   => 'jbones_social_section',
        'settings'  => 'jbones_social[dribbble]',
    ) );
    $wp_customize->add_setting( 'jbones_social[tumblr]' );
    $wp_customize->add_control( 'jbones_social[tumblr]', array(
        'label'     => __( 'Tumblr', 'jbones' ),
        'type'      => 'url',
        'section'   => 'jbones_social_section',
        'settings'  => 'jbones_social[tumblr]',
    ) );
    $wp_customize->add_setting( 'jbones_social[instagram]' );
    $wp_customize->add_control( 'jbones_social[instagram]', array(
        'label'     => __( 'Instagram', 'jbones' ),
        'type'      => 'url',
        'section'   => 'jbones_social_section',
        'settings'  => 'jbones_social[instagram]',
    ) );
    $wp_customize->add_setting( 'jbones_social[pinterest]' );
    $wp_customize->add_control( 'jbones_social[pinterest]', array(
        'label'     => __( 'Pinterest', 'jbones' ),
        'type'      => 'url',
        'section'   => 'jbones_social_section',
        'settings'  => 'jbones_social[pinterest]',
    ) );
    $wp_customize->add_setting( 'jbones_social[rss]' );
    $wp_customize->add_control( 'jbones_social[rss]', array(
        'label'     => __( 'RSS', 'jbones' ),
        'type'      => 'url',
        'section'   => 'jbones_social_section',
        'settings'  => 'jbones_social[rss]',
    ) );

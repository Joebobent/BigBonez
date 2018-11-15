<?php
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'bnz_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'bnz_customize_partial_blogdescription',
        ) );
    }

    $wp_customize->add_setting( 'bnz_phone'); // Phone Number
    $wp_customize->add_control( 'bnz_phone', array(
        'label'     => __( 'Phone Number', 'bnz' ),
        'type'      => 'tel',
        'section'   => 'title_tagline',
        'settings'  => 'bnz_phone',
    ) );
    $wp_customize->add_setting( 'bnz_address'); // Address Information
    $wp_customize->add_control( 'bnz_address', array(
        'label'     => __( 'Address', 'bnz' ),
        'type'      => 'textarea',
        'section'   => 'title_tagline',
        'settings'  => 'bnz_address',
    ) );
    $wp_customize->add_setting( 'bnz_copyright'); // Copyright Information
    $wp_customize->add_control( 'bnz_copyright', array(
        'label'     => __( 'Copyright', 'bnz' ),
        'section'   => 'title_tagline',
        'settings'  => 'bnz_copyright',
    ) );

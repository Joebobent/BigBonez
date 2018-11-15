<?php
/*
 * Site Header / Footer Settings
*/
    // Site Header Section
    $wp_customize->add_section( 'site_header_conf' , array(
        'title'         => __( 'Site Header / Footer', 'jbones' ),
        'priority'      => '30',
    ) );

    $wp_customize->add_setting( 'site_top_bar' ); // Enable Top Bar
    $wp_customize->add_control( 'site_top_bar', array(
        'label'         => 'Top Bar',
        'section'       => 'site_header_conf',
        'settings'      => 'site_top_bar',
        'type'          => 'select',
        'default'       => '',
        'choices'       => array(
            ''              => 'Disabled',
            'top-bar'       => 'Top Bar',
            'top-overlap'   => 'Overlapping',
        ),

    ) );
    $wp_customize->add_setting( 'site_search_bar' ); // Enable Search Bar
    $wp_customize->add_control( 'site_search_bar', array(
        'label'         => 'Enable Search Bar',
        'section'       => 'site_header_conf',
        'settings'      => 'site_search_bar',
        'type'          => 'checkbox',
    ) );
    // $wp_customize->add_setting( 'sticky_header' ); // Disable Sticky Header
    // $wp_customize->add_control( 'sticky_header', array(
    //     'label'         => 'Disable Sticky Header',
    //     'section'       => 'site_header_conf',
    //     'settings'      => 'sticky_header',
    //     'type'          => 'checkbox',
    // ) );
    $wp_customize->add_setting( 'site_header_contrast', array(
        'default'       => 'light'
    ) ); // Header Contrast
    $wp_customize->add_control( 'site_header_contrast', array(
        'label'         => __( 'Site Header Contrast', 'jbones' ),
        'section'       => 'site_header_conf',
        'settings'      => 'site_header_contrast',
        'type'          => 'radio',
        'default'       => 'light',
        'choices'       => array(
            'light'     => 'Light',
            'dark'      => 'Dark',
        ),
    ) );
    $wp_customize->add_setting( 'site_header_layout', array(
        'default'       => 'compact'
    ) ); // Header Layout
    $wp_customize->add_control( 'site_header_layout', array(
        'label'         => __( 'Site Header Layout', 'jbones' ),
        'description'   => __( 'Define your header layout.', 'jbones' ),
        'section'       => 'site_header_conf',
        'settings'      => 'site_header_layout',
        'type'          => 'radio',
        'default'       => 'compact',
        'choices'       => array(
            'compact'       => 'Compact',
            'stacked'       => 'Center Stacked',
            // 'side-panel'    => 'Side Panel (Coming Soon)',
        ),
    ) );
    $wp_customize->add_setting( 'site_header_bgcolor' ); // Site Header BG Color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,  'site_header_bgcolor', array(
        'label'         => __( 'Site Header Background Color', 'jbones' ),
        'section'       => 'site_header_conf',
        'setting'       => 'site_header_bgcolor',
        // 'transport'     => 'postMessage',
    ) ) );
    $wp_customize->add_setting( 'header_pattern' ); //Site Header Pattern Image
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_pattern', array(
        'label'         => __( 'Site Header Pattern Image', 'jbones' ),
        'section'       => 'site_header_conf',
        'settings'      => 'header_pattern',
    ) ) );
    $wp_customize->add_setting( 'center_logo' ); // Center Logo
    $wp_customize->add_control( 'center_logo', array(
        'label'         => __( 'Center Logo', 'jbones' ),
        'description'   => 'This will split the site title with the logo image.',
        'section'       => 'site_header_conf',
        'settings'      => 'center_logo',
        'type'          => 'checkbox',
        'active_callback' => 'site_header_stacked',
    ) );
    function site_header_stacked( $control ) {
        if ( $control->manager->get_setting('site_header_layout')->value() == 'stacked' ) :
            return true; else : return false; endif;
    } // site_header_stacked

    $wp_customize->add_setting( 'site_footer_contrast', array(
        'default'       => 'light'
    ) ); // Header Contrast
    $wp_customize->add_control( 'site_footer_contrast', array(
        'label'         => __( 'Site Footer Contrast', 'jbones' ),
        'section'       => 'site_header_conf',
        'settings'      => 'site_footer_contrast',
        'type'          => 'radio',
        'default'       => 'light',
        'choices'       => array(
            'light'     => 'Light',
            'dark'      => 'Dark',
        ),
    ) );

    $wp_customize->add_setting( 'footer_socials' ); // Enable Back To Top Button
    $wp_customize->add_control( 'footer_socials', array(
        'label'         => __( 'Enable Social Buttons in Footer', 'jbones' ),
        'section'       => 'site_header_conf',
        'settings'      => 'footer_socials',
        'type'          => 'checkbox',
    ) );
    $wp_customize->add_setting( 'footer_background' ); // Site Logo
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_background', array(
        'label'    => __( 'Footer Background', 'jbones' ),
        'section'  => 'site_header_conf',
        'settings' => 'footer_background',
    ) ) );

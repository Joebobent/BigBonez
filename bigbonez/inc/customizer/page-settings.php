<?php
/*
 * Custom Top Level Panel
 */
$wp_customize->add_panel( 'page_conf_panel' , array(
    'title'         => __( 'Page / Blog Options', 'bnz' ),
    'description'   => __('Edit settings to the site pages.', bnz ),
    'priority'      => '40',
) );

/*
 * Page Configurations
 */
    // Page Configurations Section
    $wp_customize->add_section( 'content_conf' , array( // General Settings
        'title'         => __( 'General Settings', 'jbones' ),
        'priority'      => '10',
        'panel'         => 'page_conf_panel',
    ) );

    $wp_customize->add_setting( 'back_to_top' ); // Enable Back To Top Button
    $wp_customize->add_control( 'back_to_top', array(
        'label'         => 'Enable Back To Top Button',
        'section'       => 'content_conf',
        'settings'      => 'back_to_top',
        'type'          => 'checkbox',
    ) );
    // $wp_customize->add_setting( 'page_type' ); // Page Width Type
    // $wp_customize->add_control( 'page_type', array(
    //     'label'         => __( 'Page Width Type', 'jbones' ),
    //     'description'   => __( 'Choose the type of page width.', 'jbones' ),
    //     'section'       => 'content_conf',
    //     'settings'      => 'page_type',
    //     'type'          => 'radio',
    //     'choices'       => array(
    //         ''              => 'Full Width',
    //         'boxed'         => 'Boxed Width',
    //     ),
    // ) );
    // $wp_customize->add_setting( 'page_sidebar' ); // Enable Page Sidebar
    // $wp_customize->add_control( 'page_sidebar', array(
    //     'label'         => 'Enable Page Sidebar',
    //     'section'       => 'content_conf',
    //     'settings'      => 'page_sidebar',
    //     'type'          => 'checkbox',
    // ) );
    $wp_customize->add_setting( 'blog_formats' ); // Enable Blog Formats
    $wp_customize->add_control( 'blog_formats', array(
        'label'             => 'Enable Formats',
        'section'           => 'content_conf',
        'settings'          => 'blog_formats',
        'type'              => 'checkbox',
    ) );
    $wp_customize->add_setting( 'blog_formats_icons' ); // Enable Blog Formats Icons
    $wp_customize->add_control( 'blog_formats_icons', array(
        'label'             => 'Enable Format Icons',
        'section'           => 'content_conf',
        'settings'          => 'blog_formats_icons',
        'type'              => 'checkbox',
        'active_callback'   => 'blog_formats_enabled',
    ) );
    function blog_formats_enabled( $control ) {
        if ( $control->manager->get_setting('blog_formats')->value() == true ) :
            return true; else : return false; endif;
    } // site_header_stacked


    $wp_customize->add_setting( 'blog_type' ); // Header layout
    $wp_customize->add_control( 'blog_type', array(
        'label'         => __( 'Blog Width Type', 'jbones' ),
        'description'   => __( 'Choose the type of page width.', 'jbones' ),
        'section'       => 'content_conf',
        'settings'      => 'blog_type',
        'type'          => 'radio',
        'choices'       => array(
            ''          => 'Full Width',
            'sections'  => 'Sections',
        ),
    ) );
    // $wp_customize->add_setting( 'blog_sidebar' ); // Enable Blog Sidebar
    // $wp_customize->add_control( 'blog_sidebar', array(
    //     'label'         => 'Enable Blog Sidebar',
    //     'section'       => 'content_conf',
    //     'settings'      => 'blog_sidebar',
    //     'type'          => 'checkbox',
    // ) );



    // Background Settings Section
    $wp_customize->add_section( 'background_image', array(
        'title'         => __( 'Background Settings', 'jbones' ),
        'panel'         => 'page_conf_panel',
        'priority'      => '20',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array( // Background Color
        'label'         => __( 'Background Color', jbones ),
        'section'       => 'background_image',
        'priority'      => '0',
    ) ) );


    /*
     * Header Settings Section
    */
    $wp_customize->add_section( 'header_image', array(
        'title'         => __( 'Header Settings', 'jbones' ),
        'panel'         => 'page_conf_panel',
        'priority'      => '30',
    ) );
    $wp_customize->add_setting( 'header_txtalign' ); // Header Text Align
    $wp_customize->add_control( 'header_txtalign', array(
        'label'         => __( 'Content Header Text Align', 'jbones' ),
        'description'   => __( 'Align content header text.', 'jbones' ),
        'section'       => 'header_image',
        'settings'      => 'header_txtalign',
        'priority'      => '4',
        'type'          => 'select',
        'choices'       => array(
            ''          => 'Default',
            'left'      => 'Left',
            'center'    => 'Center',
            'right'     => 'Right',
        ),
    ) );
    // Header Text Color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
        'label'         => __( 'Header Text Color', jbones ),
        'section'       => 'header_image',
        'priority'      => '6',
    ) ) );

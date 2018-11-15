<?php

/*
 * Custom Top Level Panel
 */
	$wp_customize->add_panel( 'theme_conf_panel' , array(
		'title'			=> __( 'Theme Options', 'bnz' ),
		'description'	=> __('Edit settings to the theme options.', bnz ),
		'priority'		=> '45',
	) );

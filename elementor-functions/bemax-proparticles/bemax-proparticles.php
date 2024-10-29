<?php

add_action(
    'elementor/element/section/section_typo/after_section_end',
    function ( $section, $args ) {
    $onlypro = '';
    if ( bemax_fs()->is_not_paying() ) {
        $onlypro = ' <span style="color:#f1087a;">(GET PRO)</span>';
    }
    $bemaxlogo = plugin_dir_url( __DIR__ ) . 'images/icon-128x128.png';
    $section->start_controls_section( 'bemax_proparticles_section', [
        'label' => __( 'BEMAX PRO Particles' . $onlypro, 'elementor' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    ] );
    if ( bemax_fs()->is_not_paying() ) {
        $section->add_control( 'proparticles_important_note', [
            'show_label'      => false,
            'type'            => \Elementor\Controls_Manager::RAW_HTML,
            'content_classes' => 'bemax_advertise',
            'raw'             => __( '
          <div style="text-align:center;" class="bemax_get_pro_wrapper">
            <h3 style="font-size: 22px; font-weight: 600;">BEMAX PRO Particles</h3>
            <a href="https://miguras.com/elementor_bemax" target="_blank"><img style="width: 60px; margin-top: 20px;" src="' . $bemaxlogo . '" alt="bemax logo"/></a>
            <p style="margin: 20px 0 30px 0;">Pro Particles adds animated geometry shapes to section that responses to mouse movements. 
            this options can be applied over any kind of background. It has a better performance than the free one, also it has more options,
            like shapes kind, speed, movements and more.<p>
            <h4 style="font-size: 12px; margin-bottom: 5px">Available with</h4>
            <h4 style="font-size: 18px; font-weight: 600;">Elementor BEMAX PRO</h4>
            <a style="background-color:#f1087a;color:#ffffff;font-weight: 600;padding: 6px 10px;text-align: center;display: inline-block;margin: 30px auto 10px; border-radius: 3px;" href="https://miguras.com/elementor_bemax" target="_blank">GET PRO</a>
          </div>
          ', 'elementor-bemax' ),
        ] );
    }
    $section->end_controls_section();
},
    10,
    2
);
add_action( 'elementor/frontend/section/before_render', function ( $element ) {
    // Make sure we are in a section element
    if ( 'section' !== $element->get_name() ) {
        return;
    }
    // get the settings
    $settings = $element->get_settings();
} );
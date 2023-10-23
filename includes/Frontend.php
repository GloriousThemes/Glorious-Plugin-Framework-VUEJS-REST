<?php
namespace GLFRM\Includes;

class Frontend {

    public function __construct() {
        add_shortcode( 'glfrm-app', [ $this, 'render_frontend' ] );
    }

    /**
     * Render Frontend
     * @since 1.0.0
     */
    public function render_frontend( $atts, $content = '' ) {
        wp_enqueue_style( 'glfrm-frontend' );
        wp_enqueue_script( 'glfrm-frontend' );

        $content .= '<div id="glfrm-frontend-app"></div>';

        return $content;
    }

}
<?php
/**
 * Plugin Name: IDL Menu
 */
function idlmenu_register_widget() {
    register_widget( 'hstngr_widget' );
}

add_action( 'widgets_init', 'idlmenu_register_widget' );

class hstngr_widget extends WP_Widget {

    public $widgetid = "idlmenu_widget";

    function __construct() {

        parent::__construct(

            $this->widgetid, //widget id
            __('IDL Menu', $this->widgetid), //widget name
            array( 'description' => __( 'Widget to improve wp menu', $this->widgetid ), ) // widget description

        );

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );

    }

    public function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}

        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css' );
        wp_enqueue_style( 'fontawesome-iconpicker', plugin_dir_url( __FILE__ ).'css/fontawesome-iconpicker.min.css' );
        wp_enqueue_script( 'bootstrap-js', '//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), false );
        wp_enqueue_script( 'fontawesom-icon-picker', plugin_dir_url( __FILE__ ).'js/fontawesome-iconpicker.min.js', array('jquery'), false );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );
    }
    
    public function print_scripts() {
		?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.color-picker' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					});

                    widget.find('.awesomiconpicker').iconpicker();
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
                    $('.awesomiconpicker').iconpicker();
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
                    $('.awesomiconpicker').iconpicker();
				} );
			}( jQuery ) );
		</script>
		<?php
	}

    public function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', $instance['title'] );
            $heading = esc_attr( $instance['heading'] );
            $fontcolor = esc_attr( $instance[ 'fontcolor' ] );
            $fonthovercolor = esc_attr( $instance[ 'fonthovercolor' ] );
            $bgcolor = esc_attr( $instance[ 'bgcolor' ] );
            $bgcolorhover = esc_attr( $instance[ 'bgcolorhover' ] );
            $borderwidth = esc_attr( $instance[ 'borderwidth' ] );
            $bordercolor = esc_attr( $instance[ 'bordercolor' ] );
            $borderadius = esc_attr( $instance[ 'borderadius' ] );
            $menuwidth = esc_attr( $instance[ 'menuwidth' ] );
            
            $margintop = esc_attr( $instance[ 'margintop' ] );
            $marginleft = esc_attr( $instance[ 'marginleft' ] );
            $marginright = esc_attr( $instance[ 'marginright' ] );
            $marginbottom = esc_attr( $instance[ 'marginbottom' ] );

            $paddingtop = esc_attr( $instance[ 'paddingtop' ] );
            $paddingleft = esc_attr( $instance[ 'paddingleft' ] );
            $paddingright = esc_attr( $instance[ 'paddingright' ] );
            $paddingbottom = esc_attr( $instance[ 'paddingbottom' ] );
            
            $iconfontawsm = esc_attr( $instance[ 'iconfontawsm' ] );
            $iconalignment = esc_attr( $instance[ 'iconalignment' ] );

            echo '<div class="widget widget_nav_menu widget-idlmneu"><div class="widget-content">';
            if ( $title )
                echo '<'.$heading.' class="widget-title subheading heading-size-3">'. $title .'</'.$heading.'>';
            
            $menuid = ( ! empty( $instance['selectedmenu'] ) ) ? $instance['selectedmenu'] : '';
            wp_enqueue_style( 'idl-font-awesome', plugin_dir_url( __FILE__ ). 'partials/all.min.css');
            include_once('partials/idlmenucss.php');
            include_once('partials/menuoutput.php');
            echo '</div></div>';

    }

    public function form( $instance ) {

        $title = ( isset( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : __( 'Default Title', 'hstngr_widget_domain' );
        $heading = esc_attr($instance['heading']);
        $selectedmenu = esc_attr($instance['selectedmenu']);
        $fontcolor = esc_attr( $instance[ 'fontcolor' ] );
        $fonthovercolor = esc_attr( $instance[ 'fonthovercolor' ] );
        $bgcolor = esc_attr( $instance[ 'bgcolor' ] );
        $bgcolorhover = esc_attr( $instance[ 'bgcolorhover' ] );
        $borderwidth = esc_attr( $instance[ 'borderwidth' ] );
        $bordercolor = esc_attr( $instance[ 'bordercolor' ] );
        $borderadius = esc_attr( $instance[ 'borderadius' ] );
        $menuwidth = esc_attr( $instance[ 'menuwidth' ] );
        
        $margintop = esc_attr( $instance[ 'margintop' ] );
        $marginleft = esc_attr( $instance[ 'marginleft' ] );
        $marginright = esc_attr( $instance[ 'marginright' ] );
        $marginbottom = esc_attr( $instance[ 'marginbottom' ] );

        $paddingtop = esc_attr( $instance[ 'paddingtop' ] );
        $paddingleft = esc_attr( $instance[ 'paddingleft' ] );
        $paddingright = esc_attr( $instance[ 'paddingright' ] );
        $paddingbottom = esc_attr( $instance[ 'paddingbottom' ] );
        
        $iconfontawsm = esc_attr( $instance[ 'iconfontawsm' ] );
        $iconalignment = esc_attr( $instance[ 'iconalignment' ] );

        include 'partials/form.php';

    }

    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['heading'] = ( ! empty( $new_instance['heading'] ) ) ? strip_tags( $new_instance['heading'] ) : '';
        $instance['selectedmenu'] = ( ! empty( $new_instance['selectedmenu'] ) ) ? strip_tags( $new_instance['selectedmenu'] ) : '';
        $instance['fontcolor'] = ( ! empty( $new_instance['fontcolor'] ) ) ? strip_tags( $new_instance['fontcolor'] ) : '';
        $instance['fonthovercolor'] = ( ! empty( $new_instance['fonthovercolor'] ) ) ? strip_tags( $new_instance['fonthovercolor'] ) : '';
        $instance['bgcolor'] = ( ! empty( $new_instance['bgcolor'] ) ) ? strip_tags( $new_instance['bgcolor'] ) : '';
        $instance['bgcolorhover'] = ( ! empty( $new_instance['bgcolorhover'] ) ) ? strip_tags( $new_instance['bgcolorhover'] ) : '';

        $instance['borderwidth'] = ( ! empty( $new_instance['borderwidth'] ) ) ? strip_tags( $new_instance['borderwidth'] ) : '';
        $instance['bordercolor'] = ( ! empty( $new_instance['bordercolor'] ) ) ? strip_tags( $new_instance['bordercolor'] ) : '';
        $instance['borderadius'] = ( ! empty( $new_instance['borderadius'] ) ) ? strip_tags( $new_instance['borderadius'] ) : '';

        $instance['menuwidth'] = ( ! empty( $new_instance['menuwidth'] ) ) ? strip_tags( $new_instance['menuwidth'] ) : '';

        $instance['margintop'] = ( ! empty( $new_instance['margintop'] ) ) ? strip_tags( $new_instance['margintop'] ) : '';
        $instance['marginleft'] = ( ! empty( $new_instance['marginleft'] ) ) ? strip_tags( $new_instance['marginleft'] ) : '';
        $instance['marginright'] = ( ! empty( $new_instance['marginright'] ) ) ? strip_tags( $new_instance['marginright'] ) : '';
        $instance['marginbottom'] = ( ! empty( $new_instance['marginbottom'] ) ) ? strip_tags( $new_instance['marginbottom'] ) : '';

        $instance['paddingtop'] = ( ! empty( $new_instance['paddingtop'] ) ) ? strip_tags( $new_instance['paddingtop'] ) : '';
        $instance['paddingleft'] = ( ! empty( $new_instance['paddingleft'] ) ) ? strip_tags( $new_instance['paddingleft'] ) : '';
        $instance['paddingright'] = ( ! empty( $new_instance['paddingright'] ) ) ? strip_tags( $new_instance['paddingright'] ) : '';
        $instance['paddingbottom'] = ( ! empty( $new_instance['paddingbottom'] ) ) ? strip_tags( $new_instance['paddingbottom'] ) : '';
        
        $instance['iconfontawsm'] = ( ! empty( $new_instance['iconfontawsm'] ) ) ? strip_tags( $new_instance['iconfontawsm'] ) : '';
        $instance['iconalignment'] = ( ! empty( $new_instance['iconalignment'] ) ) ?  $new_instance['iconalignment'] : '';

        return $instance;

    }

}
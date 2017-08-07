<?php
/**
 * Goetemp Widget
 *
 * @package   Goetemp_Widget
 * @author    Marc Lettau-Poelchen <contact@emelpe.de>
 * @license   GPL-2.0+
 * @link      http://www.emelpe.de
 * @copyright 2014 emelpe webdesign
 *
 * @wordpress-plugin
 * Plugin Name:       Goetemp Widget
 * Plugin URI:        http://emelpe.de/project/goetemp-wordpress-widget/
 * Description:       Dieses Widget ruft die stündlich aktuellen Daten der Wetterstation Nohlstraße in Göttingen ab und zeigt sie an.
 * Version:           1.1.0
 * Author:            Marc Lettau-Poelchen
 * Author URI:        http://www.emelpe.de
 * Text Domain:       goetemp-widget
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /lang
 */
 
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

class GoetempWidget extends WP_Widget {

    /**
     * Unique identifier for your widget.
     */
    protected $widget_slug = 'goetemp-widget';

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Specifies the classname and description, instantiates the widget,
	 * loads localization files, and includes necessary stylesheets and JavaScript.
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'widget_textdomain' ) );

		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

		parent::__construct(
			$this->get_widget_slug(),
			__( 'Goetemp Widget', $this->get_widget_slug() ),
			array(
				'classname'  => $this->get_widget_slug().'-class',
				'description' => __( 'Dieses Widget ruft die stündlich aktuellen Daten der Wetterstation Nohlstraße in Göttingen ab und zeigt sie an.', $this->get_widget_slug() )
			)
		);

		// Register admin styles and scripts
		add_action( 'admin_print_styles', array( $this, 'register_admin_styles' ) );

		// Register site styles and scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_styles' ) );

		// Refreshing the widget's cached output with each new post
		add_action( 'save_post',    array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );

	}


    /**
     * Return the widget slug.
     */
    public function get_widget_slug() {
        
        return $this->widget_slug;
        
    }

	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/

	public function widget( $args, $instance ) {
		
		$cache = wp_cache_get( $this->get_widget_slug(), 'widget' );

		if ( !is_array( $cache ) )
			$cache = array();

		if ( ! isset ( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset ( $cache[ $args['widget_id'] ] ) )
			return print $cache[ $args['widget_id'] ];
		
		extract( $args, EXTR_SKIP );

		$widget_string = $before_widget;

		ob_start();
		include( plugin_dir_path( __FILE__ ) . 'views/widget.php' );
		$widget_string .= ob_get_clean();
		$widget_string .= $after_widget;


		$cache[ $args['widget_id'] ] = $widget_string;

		wp_cache_set( $this->get_widget_slug(), $cache, 'widget' );

		print $widget_string;

	}
	
	public function flush_widget_cache() {
	
    	wp_cache_delete( $this->get_widget_slug(), 'widget' );
	
	}

	public function update( $new_instance, $old_instance ) {

		$old_instance['title']                  = strip_tags( stripslashes( $new_instance['title'] ) );
		$old_instance['show-fine-dust']         = $new_instance['show-fine-dust'];
		$old_instance['show-nitrogen-dioxide']  = $new_instance['show-nitrogen-dioxide'];
		$old_instance['show-sulphur']           = $new_instance['show-sulphur'];
		$old_instance['show-temp']              = $new_instance['show-temp'];
		$old_instance['show-air-pressure']      = $new_instance['show-air-pressure'];
		$old_instance['show-wind-direction']    = $new_instance['show-wind-direction'];
		$old_instance['show-wind-speed']        = $new_instance['show-wind-speed'];
		$old_instance['show-air-moisture']      = $new_instance['show-air-moisture'];
		$old_instance['show-rainfall-duration'] = $new_instance['show-rainfall-duration'];
		$old_instance['show-global-irradiance'] = $new_instance['show-global-irradiance'];
		$old_instance['show-uv-index']          = $new_instance['show-uv-index'];
		$old_instance['show-ozone']             = $new_instance['show-ozone'];
		$old_instance['show-powered-by']        = $new_instance['show-powered-by'];
		$old_instance['show-last-update']       = $new_instance['show-last-update'];

		return $old_instance;

	}

	public function form( $instance ) {

		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'                  => '',
				'show-fine-dust'         => '',
				'show-nitrogen-dioxide'  => '',
				'show-sulphur'           => '',
				'show-temp'              => '',
				'show-air-pressure'      => '',
				'show-wind-direction'    => '',
				'show-wind-speed'        => '',
				'show-air-moisture'      => '',
				'show-rainfall-duration' => '',
				'show-global-irradiance' => '',
				'show-uv-index'          => '',
				'show-ozone'             => '',
				'show-powered-by'        => '',
				'shoe-last-update'       => ''
			)
		);

		include( plugin_dir_path(__FILE__) . 'views/admin.php' );

	}

	/*--------------------------------------------------*/
	/* Public Functions
	/*--------------------------------------------------*/

	/**
	 * Registers and enqueues admin-specific styles.
	 */
	public function register_admin_styles() {

		wp_enqueue_style( $this->get_widget_slug().'-admin-styles', plugins_url( 'css/admin.min.css', __FILE__ ) );

	}

	/**
	 * Registers and enqueues widget-specific styles.
	 */
	public function register_widget_styles() {

		wp_enqueue_style( $this->get_widget_slug().'-widget-styles', plugins_url( 'css/widget.min.css', __FILE__ ) );
		wp_enqueue_style( $this->get_widget_slug().'-widget-fonts', plugins_url( 'css/font-awesome.min.css', __FILE__ ) );

	}

}

add_action( 'widgets_init', create_function( '', 'register_widget("GoetempWidget");' ) );
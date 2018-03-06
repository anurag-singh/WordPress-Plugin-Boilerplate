<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// Define WP Menu
		$customWPMenu = new WordPressMenu( array(
			'slug' => 'wpmenu',
			'title' => 'WP Menu',
			'desc' => 'Settings for theme custom WordPress Menu',
			'icon' => 'dashicons-welcome-widgets-menus',
			'position' => 99,
		));

		$customWPMenu->add_field(array(
			'name' => 'text',
			'title' => 'Text Input',
			'desc' => 'Input Description',
			));

		$customWPMenu->add_field(array(
			'name' => 'checkbox',
			'title' => 'Checkbox Example',
			'desc' => 'Check it to wake it',
			'type' => 'checkbox'));

		// Creating tab with our custom wordpress menu
		$customTab = new WordPressMenuTab(
			array(
				'slug' => 'example_tab',
				'title' => 'Example Tab' ),
			$customWPMenu );

		$customTab->add_field(array(
			'name' => 'select',
			'title' => 'Select Example',
			'type' => 'select',
			'options' => array(
				'one' => 'Option one',
				'two' => 'Option two' ) ) );

		$customWPSubMenu = new WordPressSubMenu( array(
			'slug' => 'wpsubmenu',
			'title' => 'WP SubMenu',
			'desc' => 'Settings for custom WordPress SubMenu',
		), $customWPMenu);
		// Define WP Menu

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );

	}

}

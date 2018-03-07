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

		// add menu, sub-menu & tabs
		$this->setup_menu_and_tabs();

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

	/**
	 * Create custom  menu, sub-menu and tabs for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function setup_menu_and_tabs() {

		$parent_menu_title 	= 'WordPress Menu';
		$field_title_1		= 'Field 1';
		$field_title_2		= 'Field 2';
		$field_title_3		= 'Field 3';
		$field_title_4		= 'Field 4';
		$field_title_5		= 'Field 5';
		$field_title_6		= 'Field 6';
		$custom_tab_title 	= 'Another Tab';

		$child_menu_title 	= 'WordPress SubMenu';

		// Custom WordPress Parent Menu
		$parentMenu = new WordPressMenu( array(
			'title' => $parent_menu_title,
			'slug' 	=> sanitize_title( $parent_menu_title ),
			'desc' 	=> 'Settings for theme custom WordPress Menu',
			'icon' 	=> 'dashicons-welcome-widgets-menus',
			'position' => 99,
		));

		//Add field in parent menu
		$parentMenu->add_field(array(
			'name' => 'text',
			'title' => $field_title_1,
			'desc' => 'Input Description',
		));

		//Add field in parent menu
		$parentMenu->add_field(array(
			'name' => 'checkbox',
			'title' => $field_title_2,
			'desc' => 'Check it to wake it',
			'type' => 'checkbox'
		));

		// Creating tab with our custom wordpress menu
		$customTab = new WordPressMenuTab(
			array(
				'title' => $custom_tab_title,
				'slug'	=> sanitize_title( $custom_tab_title ),
				 ),
			$parentMenu
		);


		//Add field in parent menu - Custom Tab
		$customTab->add_field(array(
			'title' => $field_title_1,
			'name' => sanitize_title( $field_title_1 ),
			'desc' => 'Input Description',
		));

		//Add field in parent menu - Custom Tab
		$customTab->add_field(array(
			'title' => $field_title_2,
			'name' => sanitize_title( $field_title_2 ),
			'desc' => 'Input Description',
			'type' => 'textarea'
		));

		//Add field in parent menu - Custom Tab
		$customTab->add_field(array(
			'title' => $field_title_3,
			'name' => sanitize_title( $field_title_3 ),
			'desc' => 'Input Description',
			'type' => 'wpeditor'
		));

		//Add field in parent menu - Custom Tab
		$customTab->add_field(array(
			'title' => $field_title_4,
			'name' => sanitize_title( $field_title_4 ),
			'desc' => 'Check it to wake it',
			'type' => 'checkbox'
		));

		//Add field in parent menu - Custom Tab
		$customTab->add_field(array(
			'title' => $field_title_5,
			'name' => sanitize_title( $field_title_5 ),
			'desc' => 'Check it to wake it',
			'type' => 'radio',
			'options' => array(
				'one' => 'Option one',
				'two' => 'Option two' )
		));

		//Add field in parent menu - Custom Tab
		$customTab->add_field(array(
			'title' => $field_title_6,
			'name' => sanitize_title( $field_title_6 ),
			'type' => 'select',
			'options' => array(
				'one' => 'Option one',
				'two' => 'Option two' ) ) );
		// Custom WordPress Parent Menu

		// Custom WordPress Sub Menu
		$subMenu = new WordPressSubMenu( array(
			'title' => $child_menu_title,
			'slug' => sanitize_title( $child_menu_title ),
			'desc' => 'Settings for custom WordPress SubMenu',
		), $parentMenu);

		$subMenu->add_field(array(
			'name' => 'checkbox',
			'title' => $field_title_2,
			'desc' => 'Check it to wake it',
			'type' => 'checkbox'
		));
		// Custom WordPress Sub Menu

	}

}

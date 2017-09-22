<?php

/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);    // Right Now Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // Activity Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Comments Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  // Incoming Links Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         // Plugins Widget

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);    	 // Quick Press Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     // Recent Drafts Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           //
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);         //

	// remove 3rd-part plugins dashboard boxes
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);           // Yoast's SEO Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);        // Gravity Forms Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);   // bbPress Plugin Widget

}

// calling all custom dashboard widgets
function the_theme_custom_dashboard_widgets() {
	/*
	Be sure to drop any other created Dashboard Widgets
	in this function and they will all load.
	*/
}


// removing the dashboard widgets
add_action( 'wp_dashboard_setup', 'disable_default_dashboard_widgets' );
// adding any custom widgets
add_action( 'wp_dashboard_setup', 'the_theme_custom_dashboard_widgets' );





/************* CUSTOMIZING LOGIN PAGE *****************/

// calling your own login css so you can style it
function the_theme_login_css() {
	wp_enqueue_style( 'the_theme_login_css', get_template_directory_uri() . '/assets/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function the_theme_login_url() { return home_url(); }

// changing the alt text on the logo to show your site name
function the_theme_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'the_theme_login_css', 10 );
add_filter( 'login_headerurl', 'the_theme_login_url' );
add_filter( 'login_headertitle', 'the_theme_login_title' );





/************* CUSTOMIZING ADMIN *******************/

// Custom Backend Footer
function the_theme_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Desenvolvido por <a href="http://feliperodopoulos.com" target="_blank">Rodopoulos</a></span>. Built using <a href="http://themble.com/bones" target="_blank">Bones</a>.', 'thetheme' );
}
add_filter( 'admin_footer_text', 'the_theme_custom_admin_footer' );

?>

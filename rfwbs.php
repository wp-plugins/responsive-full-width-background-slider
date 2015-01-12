<?php
/*
Plugin Name: Responsive Full Width Background Slider
Plugin URI: http://wptreasure.com
Description: Responsive Full Width Background Slider is very attractive full width background slider for pages and posts as well as custom post types
Author: wptreasure
Version: 1.0.6
Author URI: http://wptreasure.com
*/
/*-------------------------------------------------*/
include_once('inc/rfwbs-settings.php');
include_once('inc/rfwbsFrontClass.php');
/*-------------------------------------------------*/
$rfwbsgobj = new rfwbsFront(); 

//ADD STYLE AND SCRIPT IN HEAD SECTION
add_action('admin_init','rfwbs_backend_script'); 
add_action('wp_enqueue_scripts','rfwbs_frontend_script');

// BACKEND SCRIPT
function rfwbs_backend_script(){
	if(is_admin()){
		if(isset($_GET['page']) && $_GET['page'] === 'rfwbs_slider') {
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_script('jquery-ui-core');	
			wp_enqueue_script('jquery-ui-dialog');
			wp_enqueue_script('rfwbs-admin-script', plugins_url('js/rfwbs_admin.js', __FILE__ ) );
			wp_enqueue_style('thickbox');	
			wp_enqueue_style('rfwbs-admin-style',plugins_url('css/rfwbs-admin.css',__FILE__));
		}
	}
}

function rfwbs_frontend_script(){
	if(!is_admin()){
		wp_enqueue_script('jquery');
		wp_enqueue_script('rfwbs-easing', plugins_url('js/jquery.easing.1.3.js', __FILE__ ),array('jquery'),'',1 );
		wp_enqueue_script('rfwbs-animate', plugins_url('js/jquery.animate-enhanced.min.js', __FILE__ ),array('jquery'),'',1  );
		wp_enqueue_script('rfwbs-superslides', plugins_url('js/jquery.superslides.js', __FILE__ ),array('jquery'),'',1  );
		wp_enqueue_style('rfwbs-front-style',plugins_url('css/rfwbs_slider.css',__FILE__));
	}
}

// 'ADMIN_MENU' FOR ADDING MENU IN ADMIN SECTION 
add_action('admin_menu', 'rfwbs_plugin_admin_menu');
function rfwbs_plugin_admin_menu() {
    add_menu_page('Responsive Full Width Background Slider', 'RFWB Slider','administrator', 'rfwbs_slider', 'rfwbs_backend_menu',plugins_url('inc/images/rfwbs-icon.png',__FILE__));
}

function rfwbs_settings()
{
	$defaultSettings  = array(
	'rfwbs_pages'     => 1,
	'rfwbs_posts'     => 1,
	'rfwbs_frontpg'   => 1,
	'rfwbs_blogpg'    => 1,
	'rfwbs_cats'      => 1,
	'rfwbs_ctax'      => 1,
	'rfwbs_cposts'    => 1,
	'rfwbs_tags'      => 1,
	'rfwbs_date'      => 1,
	'rfwbs_author'    => 1,
	'rfwbs_search'    => 1,		
	'rfwbs_sduration' => 8000,
	'rfwbs_tspeed'    => 700,
	'rfwbs_play'      => 'true',
	'rfwbs_navigation'=> 1,
	'rfwbs_toggle'    => 1,
	'rfwbs_bullet' 	  => 1,
	'rfwbs_controlpos'=> 0,
	'rfwbs_animation' => 'fade',
	'rfwbs_overlay'   => 1,
	'rfwbs_random'    => 1,
	'rfwbs_img'		  => array(
			plugins_url('inc/images/slide1.jpg',__FILE__),
			plugins_url('inc/images/slide2.jpg',__FILE__),
			plugins_url('inc/images/slide3.jpg',__FILE__),
			plugins_url('inc/images/slide4.jpg',__FILE__),
		)
	);
	return $defaultSettings;
}
	
// RUNS WHEN PLUGIN IS ACTIVATED AND ADD OPTION IN wp_option TABLE -
//------------------------------------------------------------------
register_activation_hook(__FILE__,'rfwbs_plugin_install');
function rfwbs_plugin_install() {
    add_option('rfwbs_settings', rfwbs_settings());
}	

// GET RFWBS VERSION
function rfwbs_plugin_version(){
	if ( ! function_exists( 'get_plugins' ) )
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$plugin_file = basename( ( __FILE__ ) );
	return $plugin_folder[$plugin_file]['Version'];
}

//ADD META BOX ---------------------
//----------------------------------
add_action('admin_init','rfwbsp_meta_box');
function rfwbsp_meta_box(){
	if( function_exists( 'add_meta_box' ) ) {
		$post_types=get_post_types(); 
		foreach($post_types as $post_type) {
			add_meta_box('rfwbsp_page', 'Responsive Full Width Background Slider', 'rfwbsp_status_meta_box', $post_type, 'side','high');
		}
	}
	else{}
}

function rfwbsp_status_meta_box() {

	global $post;
	$custom = get_post_custom($post->ID);
	$_rfwbsp_status = (isset($custom["_rfwbsp_status"][0])) ? $custom["_rfwbsp_status"][0] : 0;
	?>
		<input type="checkbox" name="_rfwbsp_status" id="_rfwbsp_status" <?php checked('true', $_rfwbsp_status); ?> value="true"/>&nbsp;<label for="_rfwbsp_status" style="color:#F90000;"><?php _e('Check it, to deactive RFWB Slider.','rfwbs'); ?> </label><br/>
	<?php
	
}

// SAVE META BOX -------------------
//----------------------------------
add_action( 'save_post', 'rfwbsp_status_meta_box_save' );
function rfwbsp_status_meta_box_save()
{
	$post_id = isset($_REQUEST['post_ID'])?$_REQUEST['post_ID']:'';
	// Verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	$nonce = isset($_REQUEST['_wpnonce'])?$_REQUEST['_wpnonce']:'';
	/*if (!wp_verify_nonce($nonce)) {
	return $post_id;
	}*/

	// Verify if this is an auto save routine. If it is our form has not been submitted, so we dont want
	// to do anything
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
	return $post_id;

	// Check permissions to edit pages and/or posts
	if ( isset($_POST['post_type']) && ('page' == $_POST['post_type'] ||  'post' == $_POST['post_type'])) {
		if ( !current_user_can( 'edit_page', $post_id ) || !current_user_can( 'edit_post', $post_id ))
		return $post_id;
	} 

	//we're authenticated: we need to find and save the data
	$status = isset($_POST['_rfwbsp_status'])?$_POST['_rfwbsp_status']:'';
	// save data in INVISIBLE custom field (note the "_" prefixing the custom fields' name
	update_post_meta($post_id, '_rfwbsp_status', $status); 
}

// DISPLAY CONDITIONS --------------
//----------------------------------
function rfwbs_responsiveslider()
{
	global $rfwbsgobj,$post;
	$rfwbs_settingOpts = get_option('rfwbs_settings');
	
	if((is_page() && $rfwbs_settingOpts['rfwbs_pages'] && !is_front_page()) || (is_single() && $rfwbs_settingOpts['rfwbs_posts'] && !($rfwbsgobj->rfwbs_is_customPostTtype())) || ($rfwbsgobj->rfwbs_is_customPostTtype() && $rfwbs_settingOpts['rfwbs_cposts'])){
		global $wp_query;
		$rfwbs_pageId = $wp_query->post->ID;
		$_rfwbsp_status = get_post_meta($rfwbs_pageId, '_rfwbsp_status', true);
		if(!$_rfwbsp_status){
			$rfwbsgobj->rfwbs_display();
		}
	}
	elseif(is_front_page() && $rfwbs_settingOpts['rfwbs_frontpg']){
		$rfwbsgobj->rfwbs_display();
	}
	elseif(is_home() && $rfwbs_settingOpts['rfwbs_blogpg']){
		$rfwbsgobj->rfwbs_display();
	}
	elseif(is_category() && $rfwbs_settingOpts['rfwbs_cats']){
		$rfwbsgobj->rfwbs_display();
	}
	elseif(is_tax() && $rfwbs_settingOpts['rfwbs_cposts']){
		$rfwbsgobj->rfwbs_display();
	}
	elseif(is_tag() && $rfwbs_settingOpts['rfwbs_tags']){
		$rfwbsgobj->rfwbs_display();
	}		
	elseif(is_date() && $rfwbs_settingOpts['rfwbs_date']){
		$rfwbsgobj->rfwbs_display();
	}
	elseif(is_author() && $rfwbs_settingOpts['rfwbs_author']){
		$rfwbsgobj->rfwbs_display();
	}
	elseif(is_search() && $rfwbs_settingOpts['rfwbs_search']){
		$rfwbsgobj->rfwbs_display();
	}
}
add_action('wp_footer', 'rfwbs_responsiveslider');
?>

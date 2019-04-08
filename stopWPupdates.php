

this code is used for stop all wordPress update with plugins also
just placed it into the themes functions.php file


/* stop all updates */
add_action('after_setup_theme','remove_core_updates');
function remove_core_updates()
{
 if(! current_user_can('update_core')){return;}
 add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
 add_filter('pre_option_update_core','__return_null');
 add_filter('pre_site_transient_update_core','__return_null');
}
remove_action('load-update-core.php','wp_update_plugins');
add_filter('pre_site_transient_update_plugins','__return_null');
//close all updates with this code
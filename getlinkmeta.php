<?php
/*
Plugin Name: Get Link Meta
Plugin URI: http://www.lioman.de/plugins-scripte/wordpress-plugin-getlinkmeta/
Description: Get Description from Site meta-data for links and add it to your LinkDB
Author: Elias Kirchgässner
Version: 0.1.2
License: GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Author URI: http://www.lioman.de/
Min WP Version: 2.5
Max WP Version: 3.3
*/

//enqeue Script to link-editor
function getlinkmeta_enqueue($hook) {
    	if( 'link-add.php' != $hook )
	if( 'link.php' != $hook )
        return;
    wp_enqueue_script( 'getURL', plugins_url('/geturl.js', __FILE__) );
}
add_action( 'admin_enqueue_scripts', 'getlinkmeta_enqueue' );   



//Render Box on link-pages
global $wp_version;
if (version_compare($wp_version,"3.0","<")) /*provides the current WordPress version in standard format*/
{
 add_action('admin_init', 'addMetaBox', 1); /*for versions < 3.0*/
}
else
{
 add_action('add_meta_boxes', 'addMetaBox'); /*for versions >=3.0*/
}
 
function addMetaBox()
{
 add_meta_box( 'boxId', __( 'Get Link Meta', 'myplugin_textdomain' ), 'renderHtml', 'link', 'normal', 'high', array('showbutton'=>true) );
}


function renderHtml($post, $params)
{
 $myParams = $params['args'];
 
 if($myParams['showbutton'])
 {
?>

<form>
  
  <input type="Hidden" name="versteckt"> 
  <input type="Button" onclick="getURL('<?php echo plugins_url( 'getdescription.php', __FILE__ ); ?>')" value=GetDescription>
   </form>
<div id="descriptionframe">Click on button to get description</div>
  



 

<?php
 }
 
 // Use nonce for verification
 wp_nonce_field( plugin_basename(__FILE__), 'myNonce' );
}
?>

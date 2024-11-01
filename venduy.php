<?php
/**
 * Plugin Name:     Cotizar un producto
 * Plugin URI:      https://venduy.com/venduy-for-woocommerce/
 * Description:     Permite los comerciantes recibir cotizaciones a través de WhatsApp en la página de producto (PDP) y así aumentar la conversión.
 * Author:          Rodrigo Cayul
 * License:         GPL v2 or later
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 * Author URI:      https://venduy.com/author/rodrigocayul/
 * Text Domain:     venduy-for-woocommerce
 * Domain Path:     /languages/es
 * Version:         0.0.1
 *
 * @package         VenduyCommerce
 */

defined( 'ABSPATH' ) || exit;

function initialization_venduy() {
  if(is_admin()){
    add_option( 'venduy_cotizar_whatsapp','' , '', false);
    add_option( 'venduy_cotizar_image','', '', false);  
    add_option('venduy_cotizar_whatsapp_activar', 'no', '', false);
  }  
}
add_action('init','initialization_venduy');


function about_venduy_render() {  
  include plugin_dir_path( __FILE__ ).'/admin/venduy-about.php';
}

function venduy_cotizar_render() {
    include plugin_dir_path( __FILE__ ).'/admin/venduy-cotizar.php';
}

add_action('admin_menu', 'venduyAddCustomMenuMain');

function venduyAddCustomMenuMain() { 
 
  add_menu_page( 
      'Venduy', 
      'Venduy', 
      'edit_posts', 
      'venduy', 
      'about_venduy_render', 
      'dashicons-block-default',
      20 
     );
  
    add_submenu_page( 
      'venduy',
      'Cotizar WhatsApp', 
      'Cotizar WhatsApp', 
      'edit_posts', 
      'venduy-cotizar', 
      'venduy_cotizar_render' 
     );
}

add_action( 'woocommerce_product_meta_end', 'venduyAddCustomButtonQuoteInPageProduct' );
function venduyAddCustomButtonQuoteInPageProduct(){
  include plugin_dir_path( __FILE__ ).'/store/page-product-cotizar-wsp.php';
}
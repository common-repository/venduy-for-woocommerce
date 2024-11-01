<?php
defined( 'ABSPATH' ) || exit;
global $product;
$venduy_cotizar_whatsapp_activar = get_option('venduy_cotizar_whatsapp_activar');
$venduy_cotizar_whatsapp = get_option( 'venduy_cotizar_whatsapp' );
$venduy_cotizar_image = get_option('venduy_cotizar_image');
$text_wsp = "Hola, quisiera cotizar en siguiente producto, ID:".$product->get_id()." Nombre: ".$product->get_name() ." SKU: ". $product->get_sku(). " Link: ".get_permalink($product->get_id());

$url_btn_wsp = "https://wa.me/".$venduy_cotizar_whatsapp;

?>

<?php if($venduy_cotizar_whatsapp_activar === "yes"): ?>
  <?php if($venduy_cotizar_image !== ""){ ?>  
    <a href="<?php echo esc_url($url_btn_wsp); ?>?text=<?php esc_html_e($text_wsp,'text_wsp'); ?>" id="venduy_cotizar_whatsapp" target="_bank" >
      <img src="<?php echo esc_url($venduy_cotizar_image); ?>" />
    </a>
  <?php }else{ ?>
    <a href="<?php echo esc_url($url_btn_wsp); ?>?text=<?php esc_html_e($text_wsp,'text_wsp'); ?>" id="venduy_cotizar_whatsapp" target="_bank" >
      Cotizar por WhatsApp
    </a>
  <?php } ?>
<?php endif; ?>

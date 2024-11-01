<?php
defined( 'ABSPATH' ) || exit;

$venduy_cotizar_whatsapp_activar = get_option('venduy_cotizar_whatsapp_activar');
$venduy_cotizar_whatsapp = get_option('venduy_cotizar_whatsapp');
$venduy_cotizar_image = get_option('venduy_cotizar_image');

if(!empty($_POST)){

  $form_venduy_cotizar_whatsapp = sanitize_text_field($_POST['venduy_cotizar_whatsapp']);
  $form_venduy_cotizar_image = sanitize_text_field($_POST['venduy_cotizar_image']);
  $form_venduy_cotizar_whatsapp_activar = sanitize_text_field($_POST['venduy_cotizar_whatsapp_activar']);

  if(isset($form_venduy_cotizar_whatsapp) && $form_venduy_cotizar_whatsapp != "")
  {
    $venduy_cotizar_whatsapp = $form_venduy_cotizar_whatsapp;      
    update_option( 'venduy_cotizar_whatsapp', $venduy_cotizar_whatsapp,false );  
  }
  
  if(isset($form_venduy_cotizar_image))
  {
    $venduy_cotizar_image = $form_venduy_cotizar_image;      
    update_option( 'venduy_cotizar_image', $venduy_cotizar_image,false );  
  }
  
  if(isset($form_venduy_cotizar_whatsapp_activar) && $form_venduy_cotizar_whatsapp_activar == "yes")
  {
    $venduy_cotizar_whatsapp_activar = $form_venduy_cotizar_whatsapp_activar;      
    update_option('venduy_cotizar_whatsapp_activar', 'yes',false );  
  }else{    
    update_option('venduy_cotizar_whatsapp_activar', 'no',false );      
  } 
  
  $venduy_cotizar_whatsapp_activar = get_option('venduy_cotizar_whatsapp_activar');
}

$value_venduy_cotizar_whatsapp_activar = ($venduy_cotizar_whatsapp_activar == "yes") ? "checked":""; 
?>
<div class="wrap">
  <h1>
    <?php _e('Cotización por WhatsApp', 'venduy-cotizar-wsp'); ?> 
  </h1>

  <h1>
    <?php _e('Configuración:', 'venduy-cotizar-wsp'); ?> 
  </h1>

  <form method="POST">
    <div id="universal-message-container">      
      
      <div class="titlewrap">
        <label for="venduy_cotizar_whatsapp_activar">Activar</label>
        <br />
        <input type="checkbox" id="venduy_cotizar_whatsapp_activar" name="venduy_cotizar_whatsapp_activar" value="yes" <?php echo esc_attr($value_venduy_cotizar_whatsapp_activar); ?>>
      </div>
      
      <div class="options">
        <label for="venduy_cotizar_whatsapp">Número WSP (ej: 56912345678)</label>
        <br />
        <input type="text" id="venduy_cotizar_whatsapp" name="venduy_cotizar_whatsapp" value="<?php echo esc_attr($venduy_cotizar_whatsapp); ?>">
      </div>
      
      <div class="options">
        <label for="venduy_cotizar_image">URL de imagen (personalizar)</label>
        <br />
        <input type="text" id="venduy_cotizar_image" name="venduy_cotizar_image" value="<?php echo esc_attr($venduy_cotizar_image); ?>">
      </div>
      
        <br />
      <input type="submit" value="Guardar">
    </div>
  </form>
</div>
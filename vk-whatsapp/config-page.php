<?php
    global $chk;

    if(isset($_POST['wphw_submit'])){
            wphw_opt();
    }

    function wphw_opt(){
        $hellotxt = $_POST['footertextname'];
        global $chk;
        if( get_option('footer_text') != trim($hellotxt)){
            $chk = update_option( 'footer_text', trim($hellotxt));
        }
    }
?>
<h1><center>Viskoo WhatsApp - Configurações</center></h1>
<div class="wrap">
  <div id="icon-options-general" class="icon32"> <br>
  </div>
  <h2>Configurações do Whatsapp</h2>
  <?php if(isset($_POST['wphw_submit']) && $chk):?>
  <div id="message" class="updated below-h2">
    <p>Salvo!</p>
  </div>
  <?php endif;?>
  <div class="metabox-holder">
    <div class="postbox">
      <h3><strong>Enter footer text and click on save button.</strong></h3>
      <form method="post" action="">
        <table class="form-table">
          <tr>
            <th scope="row">Footer Text</th>
            <td><input type="text" name="footertextname"
value="<?php echo get_option('footer_text');?>" style="width:350px;" /></td>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td style="padding-top:10px;  padding-bottom:10px;">
<input type="submit" name="wphw_submit" value="Save changes" class="button-primary" />
</td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>

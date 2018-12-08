<?php
$piereg = get_option( 'pie_register_2' );
?>
<style type="text/css">
.pieregister-admin .piereg-plugin-rate {background: none repeat scroll 0 0 rgb(255, 255, 255);box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05);float: right;margin: 0 10px 0 0;position: relative;width: 280px;}
.pieregister-admin .piereg-plugin-rate h3 {border-bottom: 1px solid rgb(238, 238, 238);font-size: 14px;line-height: 1.4;margin: 0;padding: 15px 12px 10px 15px;}
.pieregister-admin .piereg-plugin-rate h3 img {margin:-2px 10px 0px 0px;float:left;}
.pieregister-admin .piereg-plugin-rate .piereg_inner {padding:0px 20px;}
.pieregister-admin .piereg-plugin-rate .piereg_inner a{color:rgb(1, 45, 127); text-decoration:none;}
.pieregister-admin .piereg-plugin-rate .piereg_inner a:hover{color:rgb(255, 0, 0);}
.pieregister-admin .piereg-plugin-rate .piereg_inner .piereg_inner_message span{line-height:2;}
.pieregister-admin .piereg-plugin-rate .piereg_inner .piereg_created_by{margin:0px;}
.pieregister-admin .piereg-plugin-rate .piereg_inner .piereg_created_by span {margin: 0;padding-bottom: 10px;float:left;margin-top:10px;}
.pieregister-admin .piereg-plugin-rate .piereg_inner .piereg_created_by a img{width:145px;}
</style>

<script type="text/javascript">
var piereg = jQuery.noConflict();
piereg(document).ready(function(){
	piereg( document ).tooltip({
		track: true
	});
});
 
</script>

<div id="container" class="pieregister-admin">
  <div class="right_section">
    <div class="settings" style="padding-bottom:0px;">
      <h2><?php _e("Help",'piereg') ?></h2>
    </div>
    
    <p class="pieHelpPara">
    <div style="clear:both;">
	
    
    
    <div class="pieHelpTicket">
    	<style type="text/css">
		.PR_short_code_input,.PR_short_code_input:hover,.PR_short_code_input:focus,.PR_short_code_input:active{
			background-color:transparent !important;border:none !important;font-weight:bold;width:240px; box-shadow:none !important;
		}
		table#PR_table_Short_Code tr:nth-child(1){
			background: none repeat scroll 0 0 rgb(73, 73, 73);
			color: rgb(255, 255, 255);
			font-size: 15px;
			text-align: center;
		}
		</style>
    	<h2><?php _e("Embedding Forms/Shortcodes","piereg"); ?></h2>
		<p class="pieHelpPara">
			<?php _e("Now, you can easily embed your Login, Registration, Forgot Password forms and Profile pages anywhere inside a post, page or a custom post type or even into the widgets through the use of following shortcodes","piereg"); ?></p>
            <div style="display:inline-block;">
			<table id="PR_table_Short_Code" cellspacing="0" cellpadding="10" >
				<tr>
					<td><strong><?php _e("Usage","piereg"); ?></strong></td>
					<td><strong><?php _e("Short Code","piereg"); ?></strong></td>
				</tr>
				<tr>
					<!--<td><label for="F_L_F_U"><?php //_e("For login form use","piereg"); ?> : </label></td>-->
<!--					<td>
                    <input type="text" id="F_L_F_U" value="[custom_register_login]" readonly="readonly" class="PR_short_code_input" onkeypress="this.select();" onfocus="this.select();" /></td>
				</tr>-->
			
				<!--<tr>
					<td><label for="F_F_P_F_U"><?php _e("For forgot password form use","piereg"); ?> : </label></td>
					<td>
                    <input type="text" id="F_F_P_F_U" value="[custom_register_forgot_password]" readonly="readonly" class="PR_short_code_input" onkeypress="this.select();" onfocus="this.select();" /></td>
				</tr>-->
				<tr>
					<td><label for="F_P_P_U"><?php _e("For profile page use","piereg"); ?> : </label></td>
					<td>
                    <input type="text" id="F_P_P_U" value="[custom_register_profile]" readonly="readonly" class="PR_short_code_input" onkeypress="this.select();" onfocus="this.select();" /></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
			</table>
            
            
        	
        </div>
            
		
    </div>
    
    

  </div>
</div>
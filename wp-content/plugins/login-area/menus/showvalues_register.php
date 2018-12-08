<?php 

$addurl = admin_url()."admin.php?page=pie-register"	;



?>

<div class="wrap"><h1>Create Form <a href="<?php echo $addurl ?>" class="page-title-action">Add New</a></h1>

<script type="text/javascript">



function leadform_row_check_bulk_action() {



	var params = '';

	if (jQuery("#action").val() != '') {

		jQuery(".deletecheck").each(function() {

			if (jQuery(this).attr('checked') == true) {

		

				if (params == '') {

					params += jQuery(this).val();

				} else {

					params += ';' + jQuery(this).val();

				}

			}

		});

     

		jQuery("#selected_values").val(params);



		return true;

	}



	return false;

}function leadform_row_check_bulk_action1() {

document.leadform.submit();

}

</script>



<?php



	/**

	* delete game

	**/

	function leadform_row_admin_delete($dataid) {

		

		global $wpdb;

       

		  

		//delete property meta values

		//echo "DELETE FROM $table_name WHERE orderdataid='" . $dataid . "'";

		

		

	

		$wpdb->query("DELETE FROM $wpdb->options WHERE option_id='" . $dataid . "'");

		

	



	}



	function leadform_get_admin_pages($keyword = '') {



		global $wpdb;

	
		$self_url =  get_bloginfo("url")."/wp-admin/admin.php?page=Campaign";



		

		if(!$_GET['end'])

		{

		$_GET['end'] = $_GET['start'];

		}

		

			if ($_GET['start'] != '') {

        $search_query .= " and  com_date between '".$_GET['start']."' and   '".$_GET['end']."'";



		}



		

		$page = null;



		$per_page = 15;



		if($_GET['pageno'] > 0) {

			$page = intval($_GET['pageno']);

		} else {

			$page = 1;

		}



		 $num_row = $wpdb->get_var("SELECT COUNT(g.dataid) FROM $table_name g where dataid!=0  $search_query");

		

		if (isset($per_page)) {

			$num_pages = ceil($num_row / $per_page);

		}

		

		if($page !== null) {

			$page_links = paginate_links( array(

				'base' => $self_url . '&pageno=%#%',

				'format' => '',

				'prev_text' => __('&laquo;'),

				'next_text' => __('&raquo;'),

				'total' => $num_pages,

				'current' => $page

			));



			if ($page_links) {



	?>

			

					<div class="tablenav-pages">

					<?php echo $page_links; ?>

					</div>

				



	<?php

			}

		}

	}



	/**

	* get mochi row

	**/

	function get_localShortcode($keyword = '') {



		global $wpdb;

		

		


		$page = null;



		$per_page = 15;



		if($_GET['pageno'] > 0) {

			$page = intval($_GET['pageno']);

		} else {

			$page = 1;

		}



		$start = (int)($page * $per_page) - $per_page;



	 	   $sql = "SELECT  * FROM $wpdb->options  where option_name	like 'pie_fields%' and  option_name not in('pie_fields_default','pie_fields','pie_fields_meta') $search_query LIMIT $start, $per_page";

		

		$row = $wpdb->get_results($sql, ARRAY_A);

		//print_r($row );

		if (!empty($row)) {

			foreach($row as $data) {

			global $wpdb;

	 	 $addurl = admin_url()."admin.php?page=pie-register&formid=".str_replace("pie_fields","",$data['option_name'])	;

			

	?>

			<tr id="local-<?php echo $data['option_id']; ?>">

				

				<th class="check-column" scope="row"><input type='checkbox' name='leadform[]' class='deletecheck' id="<?php echo $data['option_id']; ?>" value='<?php echo $data['option_id']; ?>' /></th>

				

				

			

				

				 

				 <td class="game-width column-width"> Form <?php echo $data['option_id']; ?></td>

                 <td class="game-category column-category">[custom_register_form formid="<?php echo str_replace("pie_fields","",$data['option_name']) ?>"]</td>
                   <td class="game-category column-category"><a href="<?php echo  $addurl; ?>">Edit</a></td>

                 </tr>

	<?php

			}

		} else {

	?>

		<tr>

			<td colspan="3"><?php _e('No Values') ?></td>

		</tr>

        

	<?php

		}	

		

		

	}



?>









<?php 



	$columns = array(

	  'cb' => '<input type="checkbox" />',

	  'com_name' => 'Registration Name',

	  'client_name' => 'Shortcode',

	 'action' => 'Action',

	);



	register_column_headers('display-leadform-list', $columns);



	



	$search_keyword = $_POST['search_keyword'];

	

	// bulk action



	if (!empty($_POST['leadform'] )) {

		foreach($_POST['leadform'] as $selected_value) {

			if ($_POST['action'] == 'delete') {

			

				leadform_row_admin_delete($selected_value);

			}

		}

	}

?>



	

<script>

jQuery(document).ready(function($) {











$(".deletemasterrow").click(function()

{

	var data = {

			'action': 'delete_deletemasterrow',

			'id': jQuery(this).attr("data-id")

		};

		jQuery(this).children().show();

	    jQuery.post(ajaxurl, data, function(response) {

		

	

	jQuery("#local-"+data.id).hide();

	

			

			

		

});





});







 });jQuery( document ).ready(function() {

 jQuery(".viewchart").click(function() { jQuery(this).attr("date-id")

 jQuery("#"+jQuery(this).attr("date-id")).toggle();

 chart.render();

    })

 

       jQuery('.datetimepicker').datetimepicker({

	formatTime:'',

	format:'Y-m-d',

	formatDate:'Y-m-d',

	

});

});



</script>

<style>

.canvasjs-chart-credit {display:none !important;}

</style>

	<div class="tablenav top">



		<div  class="alignleft actions">

			<form method="post" onsubmit="return leadform_row_check_bulk_action1();">

				<input type="hidden" name="selected_values" id="selected_values" />

				<select id="action" name="action">

					<option value="" selected="selected"><?php _e('Bulk Actions'); ?></option>

					<option value="delete"><?php _e('Delete'); ?></option>

				</select>

				<input type="button" value="<?php esc_attr_e('Apply'); ?>" name="doaction" id="doaction" onclick="leadform_row_check_bulk_action1()" class="button-secondary action" />

				<?php wp_nonce_field('bulk-posts'); ?>

			</form>

		</div>



	<?php echo leadform_get_admin_pages($search_args, $search_keyword); ?>	



	

	</div>



	<table id="mspt_property_list" class="widefat post fixed" cellspacing="0">

		<thead>

			<tr>

				<?php print_column_headers('display-leadform-list'); ?>

			</tr>

		</thead>

		<tbody>	<form method="post" name="leadform" id="leadform" onsubmit="return leadform_row_check_bulk_action();">

			<?php get_localShortcode($search_keyword); ?>

			<input type="hidden" id="action" name="action" value="delete">

			</form>

		</tbody>

		<tfoot>

			<tr>

				<?php print_column_headers('display-leadform-list'); ?>

			</tr>

		</tfoot>

	</table>

</div>
<?php
// register custom post type to work with
function intervenant_create_post_type(){
	// set up labels
	
	$labels = array(
 		'name' => 'Intervenants AG 2017',
    	'singular_name' => 'Intervenant AG 2017',
    	'add_new' => 'Add New Intervenant',
    	'add_new_item' => 'Add New Intervenant',
    	'edit_item' => 'Edit Intervenant',
    	'new_item' => 'New Intervenant',
    	'all_items' => 'All Intervenants',
    	'view_item' => 'View Intervenant',
    	'search_items' => 'Search Intervenants',
    	'not_found' =>  'No Intervenant Found',
    	'not_found_in_trash' => 'No Intervenant found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Intervenants AG 2017',
		'name_admin_bar' => 'Intervenants AG 2017',
		'search_items' => 'Search Intervenants'
    );
	
    //register post type
	register_post_type( 'intervenant-ca-2017', array(
		'labels' => $labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor',  'thumbnail' ),			
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'intervenant-ag-2017' ),
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => null,
		'menu_icon' => 'dashicons-groups',
		'register_meta_box_cb' => 'fc_meta_box_intervenant',
		)
	);
}

add_action( 'init', 'intervenant_create_post_type' );

function fc_meta_box_intervenant(){	
	add_meta_box('infos_intervenant', 'Informations complémentaires', 'fc_intervenant_metabox_content');
}

function fc_intervenant_metabox_content($postIntervenant){
	$fonction= get_post_meta($postIntervenant->ID, 'fc_intervenant_fonction', true);
	$organisation= get_post_meta($postIntervenant->ID, 'fc_intervenant_organisation', true);
	?>
		<table>
			
			<tr>
				<th><label for="fc_intervenant_fonction">Fonction</label></th>
				<td><input id="fc_intervenant_fonction" class="widefat" type="text" name="fc_intervenant_fonction" value="<?php echo $fonction;?>"></td>
			</tr>
		</table>
		<table>
			
			<tr>
				<th><label for="fc_intervenant_organisation">Organisation</label></th>
				<td><input id="fc_intervenant_organisation" class="widefat" type="text" name="fc_intervenant_organisation" value="<?php echo $organisation;?>"></td>
			</tr>
		</table>
	
	<?php
}

add_action('save_post','fc_save_post_intervenant');

function fc_save_post_intervenant($post_id){
	
	if(isset($_POST['fc_intervenant_fonction'])){
		$fonction = sanitize_text_field($_POST['fc_intervenant_fonction']);
		update_post_meta($post_id, 'fc_intervenant_fonction', $fonction);
	}
	if(isset($_POST['fc_intervenant_organisation'])){
		$organisation = sanitize_text_field($_POST['fc_intervenant_organisation']);
		update_post_meta($post_id, 'fc_intervenant_organisation', $organisation);
	}
}
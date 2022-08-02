<?php
// register custom post type to work with
function intervenants_create_post_type(){
	// set up labels
	
	$labels = array(
 		'name' => 'Intervenants AG 2018',
    	'singular_name' => 'Intervenant AG 2018',
    	'add_new' => 'Add New Intervenant AG 2018',
    	'add_new_item' => 'Add New Intervenant AG 2018',
    	'edit_item' => 'Edit Intervenant AG 2018',
    	'new_item' => 'New Intervenant AG 2018',
    	'all_items' => 'All Intervenants AG 2018',
    	'view_item' => 'View Intervenant AG 2018',
    	'search_items' => 'Search Intervenants AG 2018',
    	'not_found' =>  'No Intervenant AG 2018 Found',
    	'not_found_in_trash' => 'No Intervenant AG 2018 found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Intervenants AG 2018',
		'name_admin_bar' => 'Intervenants AG 2018',
		'search_items' => 'Search Intervenants AG 2018'
    );
	
    //register post type
	register_post_type( 'intervenant-ca-2018', array(
		'labels' => $labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor',  'thumbnail' ),			
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'intervenant-ag-2018' ),
		'show_ui' => true,
		'show_in_menu' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-groups',
		'register_meta_box_cb' => 'fc_meta_box_intervenants',
		)
	);
}

add_action( 'init', 'intervenants_create_post_type' );

function fc_meta_box_intervenants(){	
	add_meta_box('infos_intervenant', 'Informations complémentaires', 'fc_intervenants_metabox_content');
}

function fc_intervenants_metabox_content($postIntervenants){
	$fonction= get_post_meta($postIntervenants->ID, 'fc_intervenants_fonction', true);
	$organisation= get_post_meta($postIntervenants->ID, 'fc_intervenants_organisation', true);
	?>
		<table>
			
			<tr>
				<th><label for="fc_intervenants_fonction">Fonction</label></th>
				<td><input id="fc_intervenants_fonction" class="widefat" type="text" name="fc_intervenants_fonction" value="<?php echo $fonction;?>"></td>
			</tr>
		</table>
		<table>
			
			<tr>
				<th><label for="fc_intervenants_organisation">Organisation</label></th>
				<td><input id="fc_intervenants_organisation" class="widefat" type="text" name="fc_intervenants_organisation" value="<?php echo $organisation;?>"></td>
			</tr>
		</table>
	
	<?php
}

add_action('save_post','fc_save_post_intervenants');

function fc_save_post_intervenants($post_id){
	
	if(isset($_POST['fc_intervenants_fonction'])){
		$fonction = sanitize_text_field($_POST['fc_intervenants_fonction']);
		update_post_meta($post_id, 'fc_intervenants_fonction', $fonction);
	}
	if(isset($_POST['fc_intervenants_organisation'])){
		$organisation = sanitize_text_field($_POST['fc_intervenants_organisation']);
		update_post_meta($post_id, 'fc_intervenants_organisation', $organisation);
	}
}
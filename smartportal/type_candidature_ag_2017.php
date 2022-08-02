<?php

// register custom post type to work with
function Candidature_create_post_type(){
	// set up labels
	
	$labels = array(
 		'name' => 'Candidatures AG 2017',
    	'singular_name' => 'Candidature AG 2017',
    	'add_new' => 'Add New Candidature',
    	'add_new_item' => 'Add New Candidature',
    	'edit_item' => 'Edit Candidature',
    	'new_item' => 'New Candidature',
    	'all_items' => 'All Candidatures',
    	'view_item' => 'View Candidature',
    	'search_items' => 'Search Candidatures',
    	'not_found' =>  'No Candidature Found',
    	'not_found_in_trash' => 'No Candidature found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Candidatures AG 2017',
		'name_admin_bar' => 'Candidatures AG 2017',
		'search_items' => 'Search Candidatures'
    );
	
    //register post type
	register_post_type( 'Candidature-ca-2017', array(
		'labels' => $labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor',  'thumbnail' ),			
		'exclude_from_search' => false,
		'capability_type' => 'post',
		//'rewrite' => array( 'slug' => 'candidature-ag-2017' ),
		'show_ui' => true,
		'show_in_menu' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-groups',
		)
	);
}

add_action( 'init', 'Candidature_create_post_type' );
/*
function fc_meta_box_Candidature(){	
	add_meta_box('infos_Candidature', 'Informations complémentaires', 'fc_Candidature_metabox_content');
}

function fc_Candidature_metabox_content($postCandidature){
	$fonction= get_post_meta($postCandidature->ID, 'fc_Candidature_fonction', true);
	$organisation= get_post_meta($postCandidature->ID, 'fc_Candidature_organisation', true);
	?>
		<table>
			
			<tr>
				<th><label for="fc_Candidature_fonction">Fonction</label></th>
				<td><input id="fc_Candidature_fonction" class="widefat" type="text" name="fc_Candidature_fonction" value="<?php echo $fonction;?>"></td>
			</tr>
		</table>
		<table>
			
			<tr>
				<th><label for="fc_Candidature_organisation">Organisation</label></th>
				<td><input id="fc_Candidature_organisation" class="widefat" type="text" name="fc_Candidature_organisation" value="<?php echo $organisation;?>"></td>
			</tr>
		</table>
	
	<?php
}

add_action('save_post','fc_save_post_Candidature');

function fc_save_post_Candidature($post_id){
	
	if(isset($_POST['fc_Candidature_fonction'])){
		$fonction = sanitize_text_field($_POST['fc_Candidature_fonction']);
		update_post_meta($post_id, 'fc_Candidature_fonction', $fonction);
	}
	if(isset($_POST['fc_Candidature_organisation'])){
		$organisation = sanitize_text_field($_POST['fc_Candidature_organisation']);
		update_post_meta($post_id, 'fc_Candidature_organisation', $organisation);
	}
}*/
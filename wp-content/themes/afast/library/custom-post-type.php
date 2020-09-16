<?php

// let's create the function for the produit
function references() { 
	// creating (registering) the produit 
	register_post_type( 'references', /* (http://codex.wordpress.org/Function_Produit/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Références', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Référence', 'jointstheme'), /* This is the individual type */
			'all_items' => __('Toutes les références', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Ajouter', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Ajouter une référence', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Éditer', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Éditer les références', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('Nouvelle référence', 'jointstheme'), /* New Display Title */
			'view_item' => __('Voir la référence', 'jointstheme'), /* View Display Title */
			'search_items' => __('Rechercher une référence', 'jointstheme'), /* Search produit Title */ 
			'not_found' =>  __('Aucune référence trouvée.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Aucune référence dans la corbeille', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			// 'description' => __( 'This is the example custom post type', 'jointstheme' ), /* produit Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			// 'rewrite'	=> array( 'slug' => 'references', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' =>true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'category', 'thumbnail','editor' /*,'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky'*/)
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type('category', 'references');
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'custom_type');
} 
// adding the function to the Wordpress init
	add_action( 'init', 'references');

// let's create the function for the produit
function produits() { 
	// creating (registering) the produit 
	register_post_type( 'produit', /* (http://codex.wordpress.org/Function_Produit/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Produits', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Produit', 'jointstheme'), /* This is the individual type */
			'all_items' => __('Tous les Produits', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Ajouter', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Ajouter une produit', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Éditer', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Éditer les Produits', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('Nouveau produit', 'jointstheme'), /* New Display Title */
			'view_item' => __('Voir le produit', 'jointstheme'), /* View Display Title */
			'search_items' => __('Rechercher un produit', 'jointstheme'), /* Search produit Title */ 
			'not_found' =>  __('Aucune produit trouvée.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Aucun produit dans la corbeille', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			// 'description' => __( 'This is the example custom post type', 'jointstheme' ), /* produit Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			// 'rewrite'	=> array( 'slug' => 'produit', 'with_front' => true ), /* you can specify its url slug */
			// 'has_archive' => 'produit', /* you can rename the slug here */
			'capability_type' => 'post',
			// 'hierarchical' => true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'category', 'thumbnail',/*'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky'*/)
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type('category', 'produits');
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'custom_type');
} 

?>
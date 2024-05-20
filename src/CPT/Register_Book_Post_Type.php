<?php

namespace BookInfo\CPT;

class Register_Book_Post_Type
{
    public static function rewrite_flush(string $cptName)
    {
        (new self)->register_post_type($cptName);
        flush_rewrite_rules();
    }
    public static function register_post_type(string $cptName)
    {
        $labels = array(
            'name' => __('Books', 'book_info'),
            'singular_name' => __('Book', 'book_info'),
            'add_new' => __('Add New', 'book_info'),
            'add_new_item' => __('Add New Book', 'book_info'),
            'edit_item' => __('Edit Book', 'book_info'),
            'new_item' => __('New Book', 'book_info'),
            'view_item' => __('View Book', 'book_info'),
            'search_items' => __('Search Books', 'book_info'),
            'not_found' =>  __('No Books found', 'book_info'),
            'not_found_in_trash' => __('No Books found in Trash', 'book_info'),
            'parent_item_colon' => ''
          );
          
        register_post_type($cptName, array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array(
				'slug' => $cptName,
				'with_front' => true,
				'feeds' => true,
				'pages' => true,
			),
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => 5,
            'menu_icon'=>'dashicons-book-alt',
            'taxonomies' => array( 'post_tag'),
            'can_export' => true,
            'supports' => array('title','editor','thumbnail','custom-fields', 'comments', 'excerpt'),
        ));
    }
}
<?php

namespace BookInfo\CPT;

class Register_Book_Post_Type
{
    public static function rewrite_flush()
    {
        (new self)->register_post_type(true);
        flush_rewrite_rules();
    }
    public static function register_post_type(bool $rewrite=false)
    {
        $labels = array(
            'name' => __('Book', 'book_info'),
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
          
        register_post_type('book', array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array(
				'slug' => 'book',
				'with_front' => true,
				'feeds' => true,
				'pages' => true,
			),
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => 5,
            'taxonomies' => array( 'post_tag'),
            'can_export' => true,
            'supports' => array('title','editor','thumbnail','custom-fields', 'comments', 'excerpt'),
        ));
    }
}
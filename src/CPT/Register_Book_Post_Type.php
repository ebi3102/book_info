<?php

namespace BookInfo\CPT;

class Register_Book_Post_Type
{
    public function __construct()
    {
        $this->register_post_type();
    }

    public function register_post_type()
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
          
        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => 5,
            'taxonomies' => array( 'post_tag'),
            'can_export' => true,
            'supports' => array('title','editor','thumbnail','custom-fields', 'comments', 'excerpt'),
        );
          
          register_post_type('book',$args);
    }
}
<?php

namespace BookInfo\CPT;
use stdClass;

class Register_Book_Authors_Taxonomy
{
    private stdClass $cptConfig;
    public function __construct(stdClass $cptConfig)
    {
        $this->cptConfig = $cptConfig;
        $this->register();
    }
    private function register()
    {
        register_taxonomy( $this->cptConfig->authors_taxo_name, $this->cptConfig->name, 
		array(
			'labels' => array(
				'name' => __('Authors', 'book_info'),
				'singular_name' => __('Author', 'book_info'),
				'add_new' => __('Add New' , 'book_info'),
				'add_new_item' => __('Add New Author', 'book_info'),
				'search_item' => __('Search Authors', 'book_info'),
				'all_items' => __('All Authors', 'book_info'),
				'parent_item' => __('Parent Author', 'book_info'),
				'parent_item_colon' => __('Parent Author', 'book_info')
			),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'rewrite' => array('slug' => $this->cptConfig->authors_taxo_name),
			'capabilities' => array(
				'manage_terms' => 'manage_categories',
				'edit_terms'   => 'edit_categories',
				'delete_terms' => 'delete_categories',
				'assign_terms' => 'assign_categories',
			),
			'show_in_rest' => true,
		));
    }
}
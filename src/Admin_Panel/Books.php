<?php
namespace BookInfo\Admin_Panel;


class Books
{
    protected $menuSlug;
    public function __construct($menuSlug)
    {
        $this->menuSlug = $menuSlug;
        add_action( 'admin_menu', array($this, 'add_admin_page') );
    }

    public function add_admin_page()
    {
        add_menu_page( 
            __( 'Books Info', 'book_info' ), 
            __( 'Books Informtion', 'book_info' ),
            'manage_options', 
            $this->menuSlug, 
            array($this, 'create_page'), 
            'dashicons-groups', 
            2
        );
    }

    public function create_page()
    {
        echo "Hello World";
    }
}
<?php

namespace BookInfo\CPT;
use BookInfo\Controllers\Books_Info_Controller;
use Rabbit\Plugin;

class Isbn_Meta_Box
{
    private string $cptName;
    private Books_Info_Controller $booksInfo;
    public function __construct(Plugin $application)
    {
        $this->cptName = $application->config('book_post_type')->name;
        $this->booksInfo = new Books_Info_Controller($application->config('table_name'));
        add_action( 'add_meta_boxes', [$this, 'add'] );
        add_action('save_post' , [$this, 'save']);
    }

    public function add()
    {
        add_meta_box( 
            'isbn-mata-box', 
            'ISBN', [$this, 'isbn_form'], 
            $this->cptName, 
            'normal', 
            'high' 
        );
    }

    public function isbn_form($post)
    {
        $isbn = $this->booksInfo->get($post->ID);
        $isbn = isset ($isbn) ? esc_attr( $isbn->isbn): '';
        echo "<label for='isbn'>".__('ISBN', 'book_info')."</label>
        <input type='text' name='isbn' id='isbn' value='$isbn'>";
        wp_nonce_field( 'save_isbn', 'isbn_nonce_field' );
        
    }

    public function save($post_id)
    {
        if ( ! isset( $_POST['isbn_nonce_field'] ) 
            || ! wp_verify_nonce( $_POST['isbn_nonce_field'], 'save_isbn' ) 
        ) {
           return;
        }

        if($_POST['isbn'] ){
            $this->booksInfo->set($post_id, esc_attr( $_POST['isbn']));
        }else{
            $this->booksInfo->delete($post_id);
        }
    }
}
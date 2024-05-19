<?php
/**
 * Book_Info setup
 *
 * @package Book_Info
 * @since   1.0.0
 */
namespace BookInfo;
use BookInfo\CPT\Isbn_Meta_Box;
use BookInfo\CPT\Register_Book_Authors_Taxonomy;
use BookInfo\CPT\Register_Book_Post_Type;
use BookInfo\CPT\Register_Book_Publisher_Taxonomy;
use BookInfo\DB\Create_Book_Info_Table;
use Rabbit\Plugin;

final class Book_Info
{
    private Plugin $application;

    public function __construct(Plugin $application)
    {
        $this->application = $application;
    }
    public function onActivation()
    {
        new Create_Book_Info_Table($this->application->config('table_name'));
        Register_Book_Post_Type::rewrite_flush($this->application->config('book_post_type')->name);
    }

    public function init_loading()
    {
        Register_Book_Post_Type::register_post_type($this->application->config('book_post_type')->name);
        new Register_Book_Publisher_Taxonomy($this->application->config('book_post_type'));
        new Register_Book_Authors_Taxonomy($this->application->config('book_post_type'));
    }

    public function plugin_loading()
    {
        new Isbn_Meta_Box($this->application);
    }
}
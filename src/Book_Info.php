<?php
/**
 * Book_Info setup
 *
 * @package Book_Info
 * @since   1.0.0
 */
namespace BookInfo;
use BookInfo\CPT\Register_Book_Post_Type;
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
        Register_Book_Post_Type::rewrite_flush();
    }

    public function plugin_loading()
    {
        Register_Book_Post_Type::register_post_type();
    }
}
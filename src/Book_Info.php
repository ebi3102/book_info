<?php
/**
 * Book_Info setup
 *
 * @package Book_Info
 * @since   1.0.0
 */
namespace BookInfo;
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
    }
}
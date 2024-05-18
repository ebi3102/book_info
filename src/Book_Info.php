<?php
/**
 * Book_Info setup
 *
 * @package Book_Info
 * @since   1.0.0
 */
namespace BookInfo;
use BookInfo\Repositories\Create_Book_Info_Table;

final class Book_Info
{
    public function onActivation()
    {
        new Create_Book_Info_Table();
    }
}
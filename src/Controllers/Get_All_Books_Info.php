<?php
namespace BookInfo\Controllers;
use BookInfo\DB\Get_Book_Info;


class Get_All_Books_Info
{
    private string $tableName;
    public function __construct(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function total_items()
    {
        return Get_Book_Info::total_items($this->tableName);
    }

    public function get_limited_items(int $current_page, int $per_page)
    {
        return Get_Book_Info::get_limited_items($this->tableName, $current_page, $per_page);
    }
}

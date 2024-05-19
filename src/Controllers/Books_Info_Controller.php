<?php
namespace BookInfo\Controllers;
use BookInfo\DB\Delete_Book_info;
use BookInfo\DB\Get_Book_Info;
use BookInfo\DB\Set_Book_Info;
use BookInfo\DB\Update_Book_Info;

class Books_Info_Controller
{
    private string $tableName;
    public function __construct(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function set($post_id, $isbn)
    {
        $currentIsbn = $this->get($post_id);
        if($currentIsbn){
            return Update_Book_Info::update(
                $this->tableName,
                $post_id,
                $isbn
            );
        }else{
            return Set_Book_Info::set(
                $this->tableName,
                $post_id,
                $isbn
            );
        }
    }

    public function get($post_id)
    {
        return Get_Book_Info::get( $this->tableName, $post_id);
    }

    public function delete($post_id)
    {
        return Delete_Book_info::delete($this->tableName, $post_id);
    }
}
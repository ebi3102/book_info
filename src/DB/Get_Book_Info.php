<?php
/**
 *
 * This class provides a method for get a row of the database table.
 */
namespace BookInfo\DB;

class Get_Book_Info extends DB_Init
{
    public function __construct($tableName)
    {
        parent::__construct($tableName);
    }

    /**
     * Insert a new row into the database table.
     *
     *
     * @return int|false The ID of the inserted row or false if the row insertion fails.
     */
    public static function get(string $tableName, string $post_id)
    {
        $instance = new self($tableName);
        return $instance->db_class->get_row($instance->db_prepare("SELECT * FROM {$instance->table} WHERE post_id = $post_id" ));
         
    }

}
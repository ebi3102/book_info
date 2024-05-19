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
     * get a row from database table.
     *
     *
     * @return object|false The The row object or false if the row not found.
     */
    public static function get(string $tableName, string $post_id)
    {
        $instance = new self($tableName);
        return $instance->db_class->get_row($instance->db_prepare("SELECT * FROM {$instance->table} WHERE post_id = $post_id" ));
         
    }

    public static function get_all(string $tableName)
    {
        $instance = new self($tableName);
        return $instance->db_class->
            get_results(
                $instance->db_prepare(
                    "SELECT * FROM {$instance->table}"
                )
            );
    }

}
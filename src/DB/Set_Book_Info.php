<?php
/**
 *
 * This class provides a method for inserting new row into the database table.
 */
namespace BookInfo\DB;

class Set_Book_Info extends DB_Init
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
    public static function set(string $tableName, string $post_id, string $isbn)
    {
        $instance = new self($tableName);
        $newRow =$instance->db_class->insert(
            $instance->table,
            array(
                'post_id'=>$post_id,
                'isbn'=>$isbn,
            )
        );
        return ($instance->db_class->insert_id)?$instance->db_class->insert_id:false;
    }

}
<?php
/**
 * Class Delete_Book_info
 *
 * This class provides a method for deleting a row from WordPress database.
 */
namespace BookInfo\DB;

class Delete_Book_info extends DB_Init
{
    public function __construct($tableName)
    {
        parent::__construct($tableName);
    }

    /**
     * Delete a row with specific post id from database table.
     *  
     * @return int|false The the number of rows that were deleted  or false if there is an error.
     */
    public static function delete(string $tableName, string $post_id)
    {
        $instance = new self($tableName);
        $deletedRows =$instance->db_class->delete(
            $instance->table,
            array(
                'post_id'=>$post_id
            )
        );
        return $deletedRows;
    }

}
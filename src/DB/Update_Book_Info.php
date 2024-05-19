<?php
/**
 * Class Update_Book_Info
 *
 * This class provides a method for updating specific columns in the WordPress database.
 */
namespace BookInfo\DB;

class Update_Book_Info extends DB_Init
{
    public function __construct($tableName)
    {
        parent::__construct($tableName);
    }

    /**
     * Update isbn column of a table in the database.
     *
     * @return int|false The number of rows affected by the update or false if the update fails.
     */
    public static function update(string $tableName, int $post_id, string $value)
    {
        $instance = new self($tableName);
        $rowNumber = $instance->db_class->update(
            $instance->table,
            array(
                'isbn' => $value
            ),
            array('post_id'=> $post_id)
        );

        return $rowNumber;
    } 
}
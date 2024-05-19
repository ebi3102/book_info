<?php
/**
 * Abstract Class DB_Init
 *
 * This abstract class serves as a foundation for initializing and interacting with the WordPress database.
 * It provides common methods for executing queries and preparing statements.
 */
namespace BookInfo\DB;
abstract class DB_Init {
    protected $db_class;
    protected $query;
    protected $table;

    protected function  __construct($table)
    {
        global $wpdb;
        $this->db_class = $wpdb; // Initialize the database object
        $this->table = $this->db_class->prefix . $table;

    }

    /**
     * Execute the query and return the results.
     *
     * @return array|null An array of query results or null if no results are found.
     */
    protected function results()
    {
        return $this->db_class->get_results($this->db_prepare($this->query));
    }

    /**
     * Prepare a query statement for execution.
     *
     * @param string $query The SQL query to prepare.
     *
     * @return object|false A prepared query statement object or false on failure.
     */
    protected function db_prepare($query)
    {
        return $this->db_class->prepare($query);
    }
}

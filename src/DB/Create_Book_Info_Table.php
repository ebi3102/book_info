<?php
namespace BookInfo\DB;
/**
 * Class Create_Book_Info_Table
 *
 * This class is responsible for creating books_info database table in WordPress.
 */

class Create_Book_Info_Table
{
    private $wp_db;
    private  string $tableName;

    /**
     * Constructor for the class.
     */
    public function __construct($tableName)
    {
        global $wpdb;
        $this->wp_db = $wpdb;
        $this->tableName = $this->wp_db->prefix . $tableName;
        $this->create();
    }

    /**
     * Create the books_info table in the WordPress database.
     */
    public function create()
    {
        $postsTable = $this->wp_db->prefix . 'posts';

        $charset_collate = $this->wp_db->get_charset_collate();
        $sql = "CREATE TABLE IF NOT EXISTS {$this->tableName} (
            ID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            post_id bigint(20) UNSIGNED NOT NULL,
            isbn varchar(200) NOT NULL,
            PRIMARY KEY (ID),
            FOREIGN KEY (post_id) REFERENCES {$postsTable}(ID) ON DELETE CASCADE ON UPDATE CASCADE
        )$charset_collate";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

    }
}
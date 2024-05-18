<?php
namespace BookInfo\Repositories;
/**
 * Class Create_Book_Info_Table
 *
 * This class is responsible for creating books_info database table in WordPress.
 */

class Create_Book_Info_Table
{
    private $wp_db;

    /**
     * Constructor for the class.
     */
    public function __construct()
    {
        global $wpdb;
        $this->wp_db = $wpdb;
        $this->create();
    }

    /**
     * Create the books_info table in the WordPress database.
     */
    public function create()
    {
        $tableName = $this->wp_db->prefix .'books_info';
        $postsTable = $this->wp_db->prefix . 'posts';

        $charset_collate = $this->wp_db->get_charset_collate();
        $sql = "CREATE TABLE IF NOT EXISTS $tableName (
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
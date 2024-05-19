<?php
namespace BookInfo\Admin_Panel;
if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Books_Info_List_Table extends \WP_List_Table {

    function __construct() {
        parent::__construct([
            'singular' => 'Book Info',
            'plural'   => 'Books Info',
            'ajax'     => false 
        ]);
    }

    function get_columns() {
        return [
            'cb'      => '<input type="checkbox" />',
            'ID'      => 'ID',
            'post_id' => 'Post ID',
            'isbn'    => 'ISBN'
        ];
    }

    function column_default($item, $column_name) {
        switch ($column_name) {
            case 'ID':
            case 'post_id':
            case 'isbn':
                return $item[$column_name];
            default:
                return print_r($item, true);
        }
    }

    function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="book[]" value="%s" />',
            $item['ID']
        );
    }

    function get_sortable_columns() {
        return [
            'ID'      => ['ID', true],
            'post_id' => ['post_id', false],
            'isbn'    => ['isbn', false]
        ];
    }

    function prepare_items($per_page=10) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'books_info';

        $query = "SELECT * FROM $table_name";
        $total_items = $wpdb->query($query);

        $per_page = 10;
        $current_page = $this->get_pagenum();
        $total_pages = ceil($total_items / $per_page);

        $this->set_pagination_args([
            'total_items' => $total_items,
            'per_page'    => $per_page,
            'total_pages' => $total_pages
        ]);

        $query .= " LIMIT " . (($current_page - 1) * $per_page) . ", $per_page";
        $this->items = $wpdb->get_results($query, ARRAY_A);
        // var_dump($this->items);
    }
}

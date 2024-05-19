<?php
namespace BookInfo\Admin_Panel;
use BookInfo\Controllers\Get_All_Books_Info;
if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Books_Info_List_Table extends \WP_List_Table {

    public string $table_name;
    public int $per_page;

    function __construct(string $table_name, int $per_page=10) {
        parent::__construct([
            'singular' => 'Book Info',
            'plural'   => 'Books Info',
            'ajax'     => false 
        ]);
        $this->table_name = $table_name;
        $this->per_page = $per_page;
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

    function prepare_items() {
        $booksInfoObj = new Get_All_Books_Info($this->table_name);
        $total_items = $booksInfoObj->total_items();

        $current_page = $this->get_pagenum();
        $total_pages = ceil($total_items / $this->per_page);

        $this->set_pagination_args([
            'total_items' => $total_items,
            'per_page'    => $this->per_page,
            'total_pages' => $total_pages
        ]);

        $this->items = $booksInfoObj->get_limited_items($current_page, $this->per_page);
    }
}

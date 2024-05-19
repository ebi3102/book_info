<?php
namespace BookInfo\Admin_Panel;


class Books
{
    protected $menuSlug;
    private string $tableName;
    private int $perPage;
    public function __construct($menuSlug, $tableName, $perPage)
    {
        $this->menuSlug = $menuSlug;
        $this->tableName = $tableName;
        $this->perPage = $perPage;

        add_action( 'admin_menu', array($this, 'add_admin_page') );
    }

    public function add_admin_page()
    {
        add_menu_page( 
            __( 'Books Info', 'book_info' ), 
            __( 'Books Informtion', 'book_info' ),
            'manage_options', 
            $this->menuSlug, 
            array($this, 'create_page'), 
            'dashicons-groups', 
            2
        );
    }

    public function create_page()
    { ?>
        <div class="wrap">
        <h2>Books Info</h2>
        <?php
        $booksListTable = new Books_Info_List_Table( $this->tableName, $this->perPage);
        $booksListTable->prepare_items();
        ?>
        <form method="post">
            <input type="hidden" name="page" value="books-info">
            <?php
            $booksListTable->display();
            ?>
        </form>
    </div>
    <?php }
}
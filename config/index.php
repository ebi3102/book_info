<?php

$config = [
    /**
     * Template config
     */
    'views_path'       => 'views',

    /**
     * Logger config
     */
    'logs_path'        => 'storage/logs',
    'logs_days'        => 30,

    /**
     * books_info table name
     */
    'table_name'=> 'books_info',
    'book_post_type' => (object)[
        'name'=> 'book',
        'publisher_taxo_name'=> 'publisher',
        'authors_taxo_name'=> 'authors'
    ]

];

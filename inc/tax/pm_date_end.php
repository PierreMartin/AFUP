<?php

add_action('init', 'pm_create_date_end');

function pm_create_date_end() {
    $labels = [
        'name'          => 'Date end',
        'singular_name' => 'date end',
        'search_items'  => 'recherche date de fin',
        'all_items'     => 'Toutes les date de fin',
        'edit_item'     => 'Editer une date de fin',
        'update_item'   => 'mettre à jour une date de fin',
        'add_new_item'  => 'ajouter uns date de fin',
        'menu_name'     => 'date de fin'
    ];

    register_taxonomy('pm_date_end', ['post', 'date_end'], [
        'hierarchical'  => false,
        'public'        => true,
        'labels'        => $labels,
        'show_ui'       => true,
        'query_var'     => true,
        'rewrite'       => ['slug' => 'date_end']
    ]);
}

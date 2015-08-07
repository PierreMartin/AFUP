<?php

add_action('init', 'pm_create_country_tax');

function pm_create_country_tax() {
    $labels = [
        'name'          => 'Date start',
        'singular_name' => 'date start',
        'search_items'  => 'recherche date de debut',
        'all_items'     => 'Toutes les dates de debut',
        'edit_item'     => 'Editer uns date de debut',
        'update_item'   => 'mettre à jour uns date de debut',
        'add_new_item'  => 'ajouter uns date de debut',
        'menu_name'     => 'date de debut'
    ];

    register_taxonomy('pm_date_start', ['post', 'date_start'], [
        'hierarchical'  => false,
        'public'        => true,
        'labels'        => $labels,
        'show_ui'       => true,
        'query_var'     => true,
        'rewrite'       => ['slug' => 'date_start']
    ]);
}

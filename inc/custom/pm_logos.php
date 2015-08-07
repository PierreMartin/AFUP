<?php

add_action('init', 'pm_create_logos');

function pm_create_logos() {
    $labels = [
        'name'          => 'Logos',
        'singular_name' => 'logo',
        'search_items'  => 'recherche logo',
        'all_items'     => 'Tous les logo',
        'edit_item'     => 'Editer un logo',
        'update_item'   => 'mettre à jour un logo',
        'add_new_item'  => 'ajouter un logo',
        'menu_name'     => 'logos',
        'new_item'      => 'nouveau logo',
        'view'          => 'voir',
        'not_found'     => 'auncun logo trouvé',
        'not_found_in_trash' => 'auncun logo trouvé dans la poubelle'
    ];

    register_post_type('logo', [
        'labels'        => $labels,
        'public'        => true,
        'show_in_menu'  => true,            // visible dans la tool bar
        'exclude_form_search' => fasle,     // exlure du moteur de recherche
        'rewrite'       => true,
        'has_archive'   => 'logos',
        'menu_icon'     => get_template_directory_uri() . '/assets/images/logo.png',
        'menu_position' => 5,
        'supports'      => ['title', 'excerpt', 'thumbnail']
    ]);

}

<?php

/* ------------------- BACKOFFICE => ACTIVER 'IMAGE A LA UNE' + MENUS + POST FORMAT ------------------- */

add_action('after_setup_theme', 'pm_setup_theme');

function pm_setup_theme() {
    add_theme_support('post-thumbnails');
    add_image_size('thumbnail-column', 90, 90, true);

    // MENU :
    register_nav_menus([
        'main'      => 'Mon menu principal',
        'footer'    => 'Mon menu dans footer'
    ]);

    // POST-FORMAT :
    add_theme_support('post-formats', ['link']);
}

/* ------------------- BACKOFFICE => DANS LA LISTE DES CATEGORY => AFFICHER LES 'GROUPE DE TAGS' + 'MINIATURE' DANS LA LISTE DES CATEGORY ------------------- */

// hook pour afficher le titre du label
add_filter('manage_post_posts_columns', 'pm_add_post_columns');

function pm_add_post_columns($columns) {
    $newColumns = [];
    foreach ($columns as $name => $label) {
        if ($name == 'author') {
            $newColumns['thumbnail'] = 'Miniature';
        }
        if ($name == 'comments') {
            $newColumns['pm_date_start'] = 'Date debut';
            $newColumns['pm_date_end'] = 'Date fin';
        }
        $newColumns[$name] = $label;
    }
    return $newColumns;
}

// hook pour afficher les liens vers les articles
add_action('manage_post_posts_custom_column', 'pm_add_post_column', 10, 2);

function pm_add_post_column($column, $postId) {
    if (has_post_thumbnail($postId) && $column == 'thumbnail') {
        the_post_thumbnail('thumbnail-column');
    }
    if ($column == 'pm_date_start') pm_get_terms_list($postId, $column);
    if ($column == 'pm_date_end') pm_get_terms_list($postId, $column);
}

function pm_get_terms_list($postId, $name) {
    $terms = get_the_terms($postId, $name);
    if ($terms && !is_wp_error($terms)) {
        $termsNames = [];
        foreach ($terms as $term) {
            $termsNames[] = sprintf('<a href="edit.php?%s=%s">%s</a>', $column, $term->slug, $term->name);
        }
        echo implode(", ", $termsNames);
    }
}



/* ------------------- CHARGEMENT DES CSS / JS  ------------------- */
add_action('wp_enqueue_scripts', 'pm_setup_scripts');

function pm_setup_scripts() {
    wp_enqueue_style('reset-css', get_template_directory_uri() . '/css/reset.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-1.11.2.min.js');
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', [], '1.0', true);

}


/* ------------------- READ MORE  ------------------- */
add_filter('excerpt_more', 'pm_read_more');

function pm_read_more($more) {
    global $post;
    return '<br><a class="link" href="' . get_permalink($post->id) . '">Lire la suite...<a><br>';
}

/* ------------------ WALKER ------------------- */
// Permet de maitrise le html des menu
require_once ABSPATH . 'wp-content/themes/my_theme/inc/pm_Walker_nav_menu.php';

/* ------------------ TAXONOMY ------------------- */
require_once ABSPATH . 'wp-content/themes/my_theme/inc/tax/pm_date_start.php';
require_once ABSPATH . 'wp-content/themes/my_theme/inc/tax/pm_date_end.php';

/* ------------------ CUSTOM POST TYPE : LOGO DANS SIDEBAR ------------------- */
require_once ABSPATH . 'wp-content/themes/my_theme/inc/custom/pm_logos.php';


/* ------------------ META BOX : GESTION DES LIENS ------------------- */
require_once ABSPATH . 'wp-content/themes/my_theme/inc/metabox/pm_liens.php';

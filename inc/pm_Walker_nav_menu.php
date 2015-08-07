<?php

class pm_Walker_nav_menu extends Walker {

    public $db_fields = [
        'parent' => 'menu_item_parent',
        'id'     => 'db_id'
    ];

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= sprintf( "\n<a href='%s'%s>%s</a>\n",
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );
    }
}

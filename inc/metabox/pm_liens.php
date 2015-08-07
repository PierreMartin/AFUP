<?php
add_action('add_meta_boxes', 'pm_AddMetaMap');

function pm_AddMetaMap() {
    add_meta_box('id_ma_meta', 'Option : lien vers un autre site', 'pm_FieldsMap', 'post', 'normal', 'high');
}

// On construit notre metabox :
function pm_FieldsMap($post) {
    $_pm_metamap_link   = get_post_meta($post->ID, '_pm_meta_link', true);
    $link               = isset($_pm_metamap_link['link'])? $_pm_metamap_link['link'] : '';

    echo 'site du conférencier :';
    ?>
    <p>ajoutez un lien vers un site : <input type="text" name="input_lien" value="<?php echo esc_attr($link); ?>" /></p>

    <?php wp_nonce_field('pm_metamap_field', 'pm_metamap_field_nonce'); ?>

    <?php
    if ($_pm_metamap_link) { ?>
        <p>link: <?php echo esc_attr($_pm_metamap_link['link']); ?></p>
    <?php

    }
}

// sauvegarder les données de la metabox :
add_action('save_post', 'pm_MetamapSave');

function pm_MetamapSave($postId) {
    $nonce = $_POST['pm_metamap_field_nonce'];
    if ( !wp_verify_nonce($nonce, 'pm_metamap_field') )
        return ;

    if ( !current_user_can('edit_post', $postId) )
        return ;

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return ;

    // on sauvegarde les données :
    if ( isset($_POST['input_lien']) ) {
        $input_lien = sanitize_text_field($_POST['input_lien']);
        update_post_meta($postId, '_pm_meta_link', ['link' => $input_lien]);
    }
}

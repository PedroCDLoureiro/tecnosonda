<?php 
    // Taxonomia "Destaques" para posts
    function taxonomia_destaques() {

        $labels = array(
            'name'              => 'Destaques',
            'singular_name'     => 'Destaque',
            'search_items'      => 'Buscar Destaques',
            'all_items'         => 'Todos os Destaques',
            'edit_item'         => 'Editar Destaque',
            'update_item'       => 'Atualizar Destaque',
            'add_new_item'      => 'Adicionar Novo Destaque',
            'new_item_name'     => 'Novo Destaque',
            'menu_name'         => 'Destaques',
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => true,
            'show_tagcloud'     => false,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'destaque'),
            'show_in_rest'      => true,
        );

        register_taxonomy('destaque', array('post'), $args);
    }
    add_action('init', 'taxonomia_destaques');

?>
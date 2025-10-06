<?php 

//  Slider
function create_slider_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Slider Topo',
            'singular_name'      => 'Slider Topo',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo Slider Topo',
            'edit_item'          => 'Editar Slider Topo',
            'new_item'           => 'Novo Slider Topo',
            'view_item'          => 'Ver Slider Topo',
            'search_items'       => 'Procurar Slider Topo',
            'not_found'          => 'Nenhum Slider Topo encontrado',
            'not_found_in_trash' => 'Nenhum Slider Topo encontrado na lixeira',
            'all_items'          => 'Todos os Slider Topo',
            'archives'           => 'Arquivos de Slider Topo',
            'attributes'         => 'Atributos de Slider Topo',
            'insert_into_item'   => 'Inserir no Slider Topo',
            'uploaded_to_this_item' => 'Carregado para este Slider Topo',
            'filter_items_list'  => 'Filtrar lista de Slider Topo',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array( 'title', 'editor' ),
        'rewrite' => array( 'slug' => 'slider' ), 
    );

    register_post_type( 'slider', $args );
}
add_action( 'init', 'create_slider_post_type' );

// Sobre a Tecnosonda
function create_sobre_a_tecnosonda_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Sobre a Tecnosonda',
            'singular_name'      => 'Sobre a Tecnosonda',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo',
            'edit_item'          => 'Editar Sobre a Tecnosonda',
            'new_item'           => 'Novo Sobre a Tecnosonda',
            'view_item'          => 'Ver Sobre a Tecnosonda',
            'search_items'       => 'Procurar',
            'not_found'          => 'Nenhum Sobre a Tecnosonda encontrado',
            'not_found_in_trash' => 'Nenhum Sobre a Tecnosonda encontrado na lixeira',
            'all_items'          => 'Todos',
            'archives'           => 'Arquivos de Sobre a Tecnosonda',
            'attributes'         => 'Atributos de Sobre a Tecnosonda',
            'insert_into_item'   => 'Inserir no Sobre a Tecnosonda',
            'uploaded_to_this_item' => 'Carregado para este Sobre a Tecnosonda',
            'filter_items_list'  => 'Filtrar lista de Sobre a Tecnosonda',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array( 'title'),
        'rewrite' => array( 'slug' => 'sobre_a_tecnosonda' ), 
    );

    register_post_type( 'sobre_a_tecnosonda', $args );
}
add_action( 'init', 'create_sobre_a_tecnosonda_post_type' );

// Dados Rodapé
function create_dados_rodape_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Dados Rodapé',
            'singular_name'      => 'Dados Rodapé',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo',
            'edit_item'          => 'Editar Dados Rodapé',
            'new_item'           => 'Novo Dados Rodapé',
            'view_item'          => 'Ver Dados Rodapé',
            'search_items'       => 'Procurar',
            'not_found'          => 'Nenhum Dados Rodapé encontrado',
            'not_found_in_trash' => 'Nenhum Dados Rodapé encontrado na lixeira',
            'all_items'          => 'Todos',
            'archives'           => 'Arquivos de Dados Rodapé',
            'attributes'         => 'Atributos de Dados Rodapé',
            'insert_into_item'   => 'Inserir no Dados Rodapé',
            'uploaded_to_this_item' => 'Carregado para este Dados Rodapé',
            'filter_items_list'  => 'Filtrar lista de Dados Rodapé',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array( 'title' ),
        'rewrite' => array( 'slug' => 'dados_rodape' ), 
    );

    register_post_type( 'dados_rodape', $args );
}
add_action( 'init', 'create_dados_rodape_post_type' );

// Nossos Serviços
function create_nossos_servicos_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Nossos Serviços',
            'singular_name'      => 'Nossos Serviços',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo',
            'edit_item'          => 'Editar Nossos Serviços',
            'new_item'           => 'Novo Nossos Serviços',
            'view_item'          => 'Ver Nossos Serviços',
            'search_items'       => 'Procurar',
            'not_found'          => 'Nenhum Nossos Serviços encontrado',
            'not_found_in_trash' => 'Nenhum Nossos Serviços encontrado na lixeira',
            'all_items'          => 'Todos',
            'archives'           => 'Arquivos de Nossos Serviços',
            'attributes'         => 'Atributos de Nossos Serviços',
            'insert_into_item'   => 'Inserir no Nossos Serviços',
            'uploaded_to_this_item' => 'Carregado para este Nossos Serviços',
            'filter_items_list'  => 'Filtrar lista de Nossos Serviços',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'rewrite' => array( 'slug' => 'nossos-servicos' ), 
    );

    register_post_type( 'nossos_servicos', $args );
}
add_action( 'init', 'create_nossos_servicos_post_type' );

// Nossos Clientes
function create_nossos_clientes_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Nossos Clientes',
            'singular_name'      => 'Nossos Clientes',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo',
            'edit_item'          => 'Editar Nossos Clientes',
            'new_item'           => 'Novo Nossos Clientes',
            'view_item'          => 'Ver Nossos Clientes',
            'search_items'       => 'Procurar',
            'not_found'          => 'Nenhum Nossos Clientes encontrado',
            'not_found_in_trash' => 'Nenhum Nossos Clientes encontrado na lixeira',
            'all_items'          => 'Todos',
            'archives'           => 'Arquivos de Nossos Clientes',
            'attributes'         => 'Atributos de Nossos Clientes',
            'insert_into_item'   => 'Inserir no Nossos Clientes',
            'uploaded_to_this_item' => 'Carregado para este Nossos Clientes',
            'filter_items_list'  => 'Filtrar lista de Nossos Clientes',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array( 'title' ),
        'rewrite' => array( 'slug' => 'nossos_clientes' ), 
    );

    register_post_type( 'nossos_clientes', $args );
}
add_action( 'init', 'create_nossos_clientes_post_type' );

// Fale conosco
function create_fale_conosco_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Fale conosco',
            'singular_name'      => 'Fale conosco',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo',
            'edit_item'          => 'Editar Fale conosco',
            'new_item'           => 'Novo Fale conosco',
            'view_item'          => 'Ver Fale conosco',
            'search_items'       => 'Procurar',
            'not_found'          => 'Nenhum Fale conosco encontrado',
            'not_found_in_trash' => 'Nenhum Fale conosco encontrado na lixeira',
            'all_items'          => 'Todos',
            'archives'           => 'Arquivos de Fale conosco',
            'attributes'         => 'Atributos de Fale conosco',
            'insert_into_item'   => 'Inserir no Fale conosco',
            'uploaded_to_this_item' => 'Carregado para este Fale conosco',
            'filter_items_list'  => 'Filtrar lista de Fale conosco',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array( 'title' ),
        'rewrite' => array( 'slug' => 'fale-conosco' ), 
    );

    register_post_type( 'fale-conosco', $args );
}
add_action( 'init', 'create_fale_conosco_post_type' );

?>
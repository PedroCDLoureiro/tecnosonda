<?php 
    get_header(); 

    $pagina_servicos = get_page_by_path('nossos-servicos');

    if ($pagina_servicos) {
        $banner = get_field('banner', $pagina_servicos->ID);
    }

    $titulo_pagina = get_the_title();
    $thumbnail_id = get_post_thumbnail_id();
    $thumbnail_servico = wp_get_attachment_image_src($thumbnail_id, 'full');
    $thumbnail_url = $thumbnail_servico[0];
    $altura_thumbnail  = $thumbnail_servico[2];
?>
<section id="single-nossos-servicos" class="single">
    <!-- Banner -->
    <div id="banner" class="container-fluid">
        <img src="<?= $banner; ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
        <div class="texts">
            <h1 class="broken-title"><?= $titulo_pagina; ?></h1>
        </div>
    </div>
    <!-- Slider de imagens -->
    <?php if (have_rows('slider_de_imagens')): ?>
        <div class="container-fluid container-slider-imagens-servico">
            <div class="container">
                <div id="slider-imagens-servico" class="small-arrows py-5">
                    <?php 
                        while (have_rows('slider_de_imagens')): the_row(); 
                        $imagem_slider = get_sub_field("imagem_slider");
                        $texto_slider = get_sub_field("texto_slider");
                    ?>
                        <div class="item">
                            <img src="<?= esc_url($imagem_slider); ?>" alt="<?= esc_attr($texto_slider); ?>" class="thumbnail w-100">
                            <h3><?= $texto_slider; ?></h3>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Descrição -->
    <div class="container-fluid container-text-image show-before black-mask-mob" 
        style="background-image: url('<?= esc_url($thumbnail_url); ?>');
                background-repeat: no-repeat;
                background-position: top right;">
        <div class="container">
            <div class="col-lg-6 col-12 offset-xxl-3 d-flex flex-column pt-5 text-white sobre" 
                style="height: <?= esc_attr($altura_thumbnail); ?>px;">
                <div class="section-title white-title mb-4">
                    <?= wpautop(the_content()); ?>
                </div>
                <a href="<?= WP_URL; ?>/orcamento" class="btn btn-large secondary-btn mt-lg-2 mb-lg-0 mb-4 w-max-content">Saber mais</a>
            </div>
        </div>
    </div>
    <!-- Ícones -->
    <?php if (have_rows('icones_servico')): ?>
        <div id="icones" class="container-fluid show-after">
            <div class="container">
                <div id="lista-icones">
                    <?php 
                        while (have_rows('icones_servico')): the_row(); 
                        $imagem_icone_servico = get_sub_field("imagem_icone_servico");
                        $texto_icone_servico = get_sub_field("texto_icone_servico");
                    ?>
                        <div class="item">
                            <img src="<?= esc_url($imagem_icone_servico); ?>" alt="<?= esc_attr($texto_icone_servico); ?>" class="thumbnail w-100">
                            <h3 class="mb-0"><?= $texto_icone_servico; ?></h3>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Subserviços -->
    <?php if (have_rows('subservicos')): ?>
        <div id="subservicos" class="container-fluid bg-gray">
            <div class="container">
                <div class="section-title">
                    <h2 class="mb-4">Subserviços</h2>
                    <div class="options-subservicos w-100">
                        <?php 
                            $i = 0;
                            while (have_rows('subservicos')): the_row(); 
                            $titulo_subservico = get_sub_field("titulo_subservico");
                        ?>
                            <button class="btn btn-subservico<?= $i == 0 ? ' active' : '' ?>" data-index="<?= $i; ?>">
                                <?= esc_html($titulo_subservico); ?>
                            </button>
                        <?php 
                            $i++;
                            endwhile; 
                        ?>
                    </div>
                </div>
                <div class="content-subservico pt-5">
                    <?php 
                        $j = 0;
                        while (have_rows('subservicos')): the_row(); 
                        $imagem_subservico = get_sub_field("imagem_subservico");
                        $texto_subservico = get_sub_field("texto_subservico");
                        $case_modelo = get_sub_field("case_modelo");
                    ?>
                        <div class="subservico-item" data-index="<?= $j; ?>" style="<?= $j === 0 ? '' : 'display:none;'; ?>">
                            <!-- Imagem -->
                            <?php if($imagem_subservico) : ?>
                                <img src="<?= esc_url($imagem_subservico); ?>" alt="" class="w-100">
                            <?php endif; ?>
                            <!-- Descrição -->
                            <?php if($texto_subservico) : ?>
                                <div class="texto-subservico py-4">
                                    <?= wp_kses_post($texto_subservico); ?>
                                </div>
                            <?php endif; ?>
                            <!-- Case Modelo -->
                            <?php if ($case_modelo && have_rows('cases')):
                                while (have_rows('cases')): the_row();
                                    $titulo_case = get_sub_field('titulo_case');

                                    if ($titulo_case === $case_modelo):
                                        $chapeu_case = get_sub_field('chapeu_case');
                                        $imagem_case = get_sub_field('imagem_case');
                                        $cidade_case = get_sub_field('cidade_case');
                                        $logo_modal_case   = get_sub_field('logo_modal_case');
                                        $conteudo_case   = get_sub_field('conteudo_case');
                                        ?>
                                        <div class="section-title mt-2 mb-5">
                                            <h2>Case Modelo</h2>
                                        </div>
                                        <div class="case-modelo">
                                            <img src="<?= esc_url($imagem_case); ?>" alt="<?= esc_attr($titulo_case); ?>" class="thumbnail w-100">
                                            <div class="content-case">
                                                <span class="chapeu-case"><?= $chapeu_case; ?></span>
                                                <div class="mt-3 texts">
                                                    <div class="d-flex flex-column">
                                                        <h3><?= esc_html($titulo_case); ?></h3>
                                                        <span class="d-flex align-items-center cidade">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#000" d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/></svg>
                                                            <?= esc_html($cidade_case); ?>
                                                        </span>
                                                        <span class="d-flex align-items-center mt-3 cliente">
                                                            Cliente: 
                                                            <img src="<?= esc_url($logo_modal_case); ?>" alt="<?= esc_attr($titulo_case); ?>">
                                                        </span>
                                                    </div>
                                                    <div class="conteudo-item">
                                                        <?= $conteudo_case; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endif;
                                endwhile;
                            endif; ?>
                        </div>
                    <?php 
                        $j++;
                        endwhile; 
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Cases -->
    <?php if (have_rows('cases')): ?>
        <div id="cases" class="container-fluid bg-gray">
            <div class="container">
                <div class="section-title mb-5">
                    <h2>Cases</h2>
                </div>
                <div class="lista-cases">
                    <?php 
                        $indice = 0; 
                    
                        while (have_rows('cases')): the_row();
                        $chapeu = get_sub_field('chapeu_case');
                        $imagem = get_sub_field('imagem_case');
                        $titulo = get_sub_field('titulo_case');
                        $cidade = get_sub_field('cidade_case');
                        $logo   = get_sub_field('logo_case');
                    ?>
                        <div class="case-item" data-indice="<?= $indice; ?>">
                            <img src="<?= esc_url($imagem); ?>" alt="<?= esc_attr($titulo); ?>" class="thumbnail w-100">
                            <span class="chapeu-case"><?= $chapeu; ?></span>
                            <div class="texts">
                                <h3><?= esc_html($titulo); ?></h3>
                                <div class="bottom-texts d-flex justify-content-between">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/></svg>
                                        <?= esc_html($cidade); ?>
                                    </span>
                                    <img src="<?= esc_url($logo); ?>" alt="<?= esc_attr($titulo); ?>">
                                </div>
                            </div>
                        </div>
                        <?php $indice++; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (have_rows('cases')): ?>
        <div class="caseModal modal scroll-slider">
            <div class="modal-content">
                <span class="close-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/></svg>
                </span>
                <div class="modal-body">
                    <div class="items-slider small-arrows">
                        <?php while (have_rows('cases')): the_row();
                            $imagem = get_sub_field('imagem_case');
                            $titulo = get_sub_field('titulo_case');
                            $cidade = get_sub_field('cidade_case');
                            $logo_modal = get_sub_field('logo_modal_case');
                            $conteudo   = get_sub_field('conteudo_case');
                        ?>
                            <div class="slider-item">
                                <img src="<?= esc_url($imagem); ?>" alt="<?= esc_attr($titulo); ?>" class="thumbnail w-100">
                                <div class="texts">
                                    <div class="d-flex flex-column">
                                        <h3><?= esc_html($titulo); ?></h3>
                                        <span class="d-flex align-items-center cidade">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#000" d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/></svg>
                                            <?= esc_html($cidade); ?>
                                        </span>
                                        <span class="d-flex align-items-center mt-3 cliente">
                                            Cliente: 
                                            <img src="<?= esc_url($logo_modal); ?>" alt="<?= esc_attr($titulo); ?>">
                                        </span>
                                    </div>
                                    <div class="conteudo-item">
                                        <?= $conteudo; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Clientes -->
    <?php
        $args = [
            'post_type'      => 'nossos_clientes',
            'posts_per_page' => 1,
        ];
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
            $clientes  = get_field('clientes');
            $imagem_cliente  = get_sub_field('imagem_cliente');
            $nome_cliente  = get_sub_field('nome_cliente');
    ?>
        <div id="nossos-clientes" class="container">
            <div id="slider-nossos-clientes" class="w-100">
                <?php if (have_rows('clientes')): ?>
                    <?php while (have_rows('clientes')): the_row();
                        $imagem_cliente = get_sub_field('imagem_cliente');
                        $nome_cliente = get_sub_field('nome_cliente');
                    ?>
                        <div class="item">
                            <img src="<?= esc_url($imagem_cliente); ?>" alt="<?= esc_attr($nome_cliente); ?>" class="w-100">
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; endif; ?>
    <!-- Compromisso -->
     <?php
        $args = array(
            'post_type' => 'sobre_nos',
            'posts_per_page' => 1,
            
        );
        $query = new WP_Query($args);
        
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); 
            $compromisso = get_field('compromisso');
    ?>
        <div id="compromisso" class="container-fluid show-after">
            <div class="container">
                <div class="col-12 d-flex flex-column justify-content-center text-white">
                    <div class="section-title white-title mb-5">
                        <h2>
                            <span>Compromisso</span>
                        </h2>
                    </div>
                    <div class="compromisso">
                        <?= $compromisso; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile;
    wp_reset_postdata();
    endif; ?>
    <!-- Fale conosco -->
     <?php get_template_part('content/entre-em-contato') ?>
</section>

<?php get_footer(); ?>

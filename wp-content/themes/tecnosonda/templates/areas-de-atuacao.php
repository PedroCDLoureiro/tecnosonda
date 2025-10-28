<?php 
    /**
        * Template Name: Página Áreas de Atuação
    */
    get_header();
?>
<section id="page-areas-de-atuacao" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $subtitulo_banner = get_field('subtitulo_banner');
        $banner = get_field('banner');
        $texto_topo = get_field('texto_topo');
        $imagem_topo = get_field('imagem_topo');
    ?>
    <div id="banner" class="container-fluid">
        <img src="<?= $banner; ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
        <div class="texts">
            <h1><?= $titulo_pagina; ?></h1>
            <p class="mb-0"><?= $subtitulo_banner; ?></p>
        </div>
    </div>
    <div class="container-fluid container-text-image show-before" style="background-image: url(<?= $imagem_topo['url']; ?>);background-repeat: no-repeat;background-position: top right;">
        <div class="container-fluid black-mask-mob">
            <div class="container">
                <div class="col-md-6 col-12 d-flex flex-column justify-content-center text-white sobre" style="height: <?= $imagem_topo['height'] . 'px'; ?>">
                    <?= $texto_topo; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="engenharia-civil" class="container-fluid">
        <div class="container">
            <?php if (have_rows('itens_engenharia_civil_e_fundacoes_e_geotecnia')): ?>
                <h2 class="mb-5">Engenharia Civil E <span>Fundações E Geotecnia</span></h2>
                <div class="lista-engenharia-civil">
                    <?php 
                        while (have_rows('itens_engenharia_civil_e_fundacoes_e_geotecnia')): the_row(); 
                        $imagem_item = get_sub_field("imagem_item");
                        $titulo_item = get_sub_field("titulo_item");
                    ?>
                        <div class="item">
                            <img src="<?= esc_url($imagem_item); ?>" alt="<?= esc_attr($titulo_item); ?>" class="thumbnail w-100">
                            <h3><?= $titulo_item; ?></h3>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php get_template_part('content/nossos-servicos'); ?>
    <?php get_template_part('content/entre-em-contato'); ?>
</section>
<?php get_footer(); ?>
<?php 
    /**
        * Template Name: Página Soluções Integradas
    */
    get_header();
?>
<section id="page-solucoes-integradas" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $banner = get_field('banner');
        $titulo_topo = get_field('titulo_topo');
        $texto_topo = get_field('texto_topo');
        $imagem_topo = get_field('imagem_topo');
        $background_nossos_servicos = get_field('background_nossos_servicos');
        $texto_nossos_servicos = get_field('texto_nossos_servicos');
        $imagem_nossos_servicos = get_field('imagem_nossos_servicos');
    ?>
    <div id="banner" class="container-fluid">
        <img src="<?= $banner; ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
        <div class="texts">
            <h1><?= $titulo_pagina; ?></h1>
        </div>
    </div>
    <div id="descricao" class="container-fluid bg-primary show-before">
        <div class="container-fluid container-text-image" style="background-image: url(<?= $imagem_topo['url']; ?>);background-repeat: no-repeat;background-position: top right;">
            <div class="container">
                <div class="col-6 d-flex flex-column justify-content-center text-white sobre" style="height: <?= $imagem_topo['height'] . 'px'; ?>">
                    <div class="section-title white-title">
                        <h2 class="mb-3"><?= $titulo_topo; ?></h2>
                        <?= $texto_topo; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-image: url(<?= $background_nossos_servicos; ?>);background-repeat: no-repeat;background-position: center;">
        <div class="container">
            <div class="col-md-6 col-12 d-flex flex-column justify-content-center text-white sobre">
                <div class="section-title white-title mb-3">
                    <h2>
                        Nossos <span>SERVIÇOS</span>
                    </h2>
                </div>
                <?= $texto_nossos_servicos; ?>
            </div>
        </div>
        <div class="col-md-6 col-12 image-nossos-servicos">
            <img src="<?= $imagem_nossos_servicos; ?>" alt="Nossos serviços" class="w-100">
        </div>
    </div>
    <?php get_template_part('content/nossos-servicos'); ?>

    <?php get_template_part('content/entre-em-contato'); ?>
</section>
<?php get_footer(); ?>
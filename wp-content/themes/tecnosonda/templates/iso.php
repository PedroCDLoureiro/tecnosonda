<?php 
    /**
        * Template Name: Página ISO
    */
    get_header();
?>
<section id="page-iso" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $texto_topo = get_field('texto_topo');
    ?>
    <div id="banner" class="container-fluid bg-primary show-after after-top">
        <div id="top-page" class="container">
            <div class="row">
                <div class="col-md-7 col-12 left-top">
                    <div class="section-title white-title">
                        <h1 class="mb-4"><?= $titulo_pagina; ?></h1>
                        <div class="descricao">
                            <?= $texto_topo; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="container-listas" class="container-fluid bg-primary">
        <div class="container">
            <?php if (have_rows('isos')) : ?>
                <div id="listas" class="d-grid pt-lg-0 pt-5">
                    <?php while (have_rows('isos')) : the_row(); 
                        $titulo_lista = get_sub_field('titulo_lista');
                        $subtitulo_lista = get_sub_field('subtitulo_lista');
                        $texto_lista = get_sub_field('texto_lista');
                        $imagem_lista = get_sub_field('imagem_lista');
                    ?>
                        <div class="d-flex flex-column justify-content-between text-white lista">
                            <div class="title-list">
                                <h3 class="mb-0"><?= $titulo_lista; ?></h3>
                                <span class="subtitulo"><?= $subtitulo_lista; ?></span>
                            </div>
                            <p><?= $texto_lista; ?></p>
                            <img src="<?= $imagem_lista; ?>" class="w-max-content">
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
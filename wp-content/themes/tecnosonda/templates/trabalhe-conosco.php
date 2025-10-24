<?php 
    /**
        * Template Name: Página Trabalhe Conosco
    */
    get_header();
?>
<section id="page-trabalhe-conosco" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $texto_topo = get_field('texto_topo');
        $imagem_topo = get_field('imagem_topo');
        $texto_final = get_field('texto_final');
    ?>
    
    <div id="banner" class="container-fluid bg-primary show-after after-top">
        <div id="top-page" class="container">
            <div class="row">
                <div class="col-md-7 col-12 left-top">
                    <div class="section-title white-title">
                        <h1 class="text-uppercase fw-bold"><?= $titulo_pagina; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="tecnosonda-valoriza" class="col-lg-6 offset-lg-6 col-12">
            <?php if($imagem_topo) : ?>
                <img src="<?= $imagem_topo ?>" alt="<?= $titulo_pagina ?>">
            <?php endif; ?>
            <div class="section-title white-title">
                <h2 class="text-uppercase mb-0">Nós da <span>Tecnosonda valorizamos</span></h2>
            </div>
            <?php if($texto_topo) : ?>
                <div class="text-white mt-4">
                    <?= $texto_topo ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div id="entrar-em-contato" class="container-fluid bg-primary show-after">
        <div class="container">
            <div class="col-lg-7 col-12 d-flex flex-column justify-content-center align-items-center box-contato">
                <?php if($texto_final) : ?>
                    <div class="text-white text-center mb-1">
                        <?= $texto_final ?>
                    </div>
                <?php endif; ?>
                <button id="form-contato" class="btn btn-large white-btn w-max-content">Entrar em contato</button>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('content/form-contato') ?>
<?php get_footer(); ?>
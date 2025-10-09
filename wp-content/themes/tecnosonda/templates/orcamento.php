<?php 
    /**
        * Template Name: Página Orçamento
    */
    get_header();
?>
<section id="page-orcamento" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $banner = get_field('banner');
    ?>
    <div id="banner" class="container-fluid">
        <img src="<?= $banner; ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
        <div class="texts">
            <h1><?= $titulo_pagina; ?></h1>
        </div>
    </div>
    <div id="container-form" class="container-fluid container-text-image show-after">
        <div class="container show-before">
            <div class="col-md-8 offset-md-2 col-12 d-flex flex-column justify-content-center text-white sobre">
                <div id="form-orcamento">
                    <?= do_shortcode('[contact-form-7 id="d656771" title="Formulário de Orçamento"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
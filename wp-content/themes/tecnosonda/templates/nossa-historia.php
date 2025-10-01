<?php 
    /**
        * Template Name: Página Nossa história
    */
    get_header();
?>
<section id="page-nossa-historia" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $banner = get_field('banner');
        $texto_topo = get_field('texto_topo');
        $imagem_topo = get_field('imagem_topo');
        $nossos_diferenciais = get_field('nossos_diferenciais');
        $compromisso = get_field('compromisso');
        $imagem_diferenciais_compromisso = get_field('imagem_diferenciais_compromisso');
    ?>
    <div id="banner" class="container-fluid">
        <img src="<?= $banner; ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
        <div class="texts">
            <h1><?= $titulo_pagina; ?></h1>
        </div>
    </div>
    <div class="container-fluid container-sobre" style="background-image: url(<?= $imagem_topo['url']; ?>);background-repeat: no-repeat;background-position: right;">
        <div class="container">
            <div class="col-6 d-flex flex-column justify-content-center text-white sobre" style="height: <?= $imagem_topo['height'] . 'px'; ?>">
                <?= $texto_topo; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
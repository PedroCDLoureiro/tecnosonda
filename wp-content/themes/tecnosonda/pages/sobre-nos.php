<section id="page-sobre-nos" class="page">
    <?php
    $args = array(
        'post_type' => 'sobre_nos',
        'posts_per_page' => 1,
    );
    $query = new WP_Query($args);
    
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); 
            $titulo_pagina = get_the_title();
            $subtitulo_banner = get_field('subtitulo_banner');
            $banner = get_field('banner');
            $sobre_nos = get_field('sobre_nos');
            $imagem_sobre_nos = get_field('imagem_sobre_nos');
            $nossos_diferenciais = get_field('nossos_diferenciais');
            $compromisso = get_field('compromisso');
            $imagem_diferenciais_compromisso = get_field('imagem_diferenciais_compromisso');
        ?>
            <div id="banner" class="container-fluid">
                <img src="<?= $banner; ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
                <div class="texts">
                    <h1><?= $titulo_pagina; ?></h1>
                    <p class="mb-0"><?= $subtitulo_banner; ?></p>
                </div>
            </div>
            <div class="container-fluid container-sobre" style="background-image: url(<?= $imagem_sobre_nos['url']; ?>);background-repeat: no-repeat;background-position: right;">
                <div class="container">
                    <div class="col-6 d-flex flex-column justify-content-center text-white sobre" style="height: <?= $imagem_sobre_nos['height'] . 'px'; ?>">
                        <?= $sobre_nos; ?>
                    </div>
                </div>
            </div>
       <?php endwhile;
        wp_reset_postdata();
    endif; ?>
<?php get_template_part('content/nossos-servicos'); ?>

<?php get_template_part('content/entre-em-contato'); ?>
</section>
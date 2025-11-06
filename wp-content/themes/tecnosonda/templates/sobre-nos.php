<?php 
    /**
        * Template Name: Página Sobre nós
    */
    get_header();
?>
<section id="page-sobre-nos" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $subtitulo_banner = get_field('subtitulo_banner');
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
            <p class="mb-0"><?= $subtitulo_banner; ?></p>
        </div>
    </div>
    <div class="container-fluid container-text-image show-before" style="background-image: url(<?= $imagem_topo['url']; ?>);background-repeat: no-repeat;background-position: top right;">
        <div class="container">
            <div class="col-md-6 col-12 d-flex flex-column justify-content-center text-white sobre" style="height: <?= $imagem_topo['height'] . 'px'; ?>">
                <?= $texto_topo; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid d-lg-none col-12 img-mobile">
        <img src="<?= esc_url($imagem_topo['url']); ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
    </div>
    <div class="container-fluid container-text-image" style="background-image: url(<?= $imagem_diferenciais_compromisso['url']; ?>);background-repeat: no-repeat;background-position: top right;">
        <div class="container-fluid">
            <div class="container">
                <div class="col-md-6 col-12 d-flex flex-column justify-content-center text-white sobre" style="height: <?= $imagem_diferenciais_compromisso['height'] . 'px'; ?>">
                    <div class="section-title white-title mb-3">
                        <h2>
                            Nossos <span>Diferenciais</span>
                        </h2>
                    </div>
                    <?= $nossos_diferenciais; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid d-lg-none col-12 img-mobile">
        <img src="<?= esc_url($imagem_diferenciais_compromisso['url']); ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
    </div>
    <div class="container-fluid container-text-image show-after pt-4" style="padding-bottom: 100px;">
        <div class="container">
            <div class="col-12 d-flex flex-column justify-content-center text-white">
                <div class="section-title white-title mb-4">
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
    <?php get_template_part('content/nossos-servicos'); ?>

    <?php
                
        $midia = get_field('imagem_video_sobre_nos');
        $thumb = get_field('thumbnail_video');
    
        if( $midia ): ?>
            <section id="video" class="bg-gray">
                <div class="container">
                    <div class="col-12 midia">
                        <div class="video-wrapper" style="position: relative;">
                            <video 
                                id="video-nossos-valores"
                                class="w-100"
                                playsinline
                                muted
                                preload="metadata"
                                <?php if ($thumb): ?>
                                    poster="<?php echo esc_url($thumb); ?>"
                                <?php endif; ?>
                            >
                                <source 
                                    src="<?php echo esc_url($midia['url']); ?>" 
                                    type="<?php echo esc_attr($midia['mime_type']); ?>"
                                >
                                Seu navegador não suporta vídeos.
                            </video>
                            <button 
                                id="play-midia"
                                aria-label="Reproduzir vídeo"
                            ></button>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

    <?php get_template_part('content/entre-em-contato'); ?>
</section>
<?php get_footer(); ?>
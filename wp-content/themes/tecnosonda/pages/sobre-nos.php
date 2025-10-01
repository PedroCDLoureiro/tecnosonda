<section id="page-sobre-nos" class="page">
    <?php
    $args = array(
        'post_type' => 'sobre_nos',
        'posts_per_page' => 1,
    );
    $query_sobre_nos = new WP_Query($args);
    
    if ($query_sobre_nos->have_posts()) :
        while ($query_sobre_nos->have_posts()) : $query_sobre_nos->the_post(); 
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

    <?php 
        $query_sobre_nos->rewind_posts();
        
        if ($query_sobre_nos->have_posts()) :
            while ($query_sobre_nos->have_posts()) : $query_sobre_nos->the_post();
                
                $midia = get_field('imagem_video_sobre_nos');
            
                if( $midia ): ?>
                    <section id="video">
                        <div class="container">
                            <div class="midia">
                                <?php if (strpos($midia['mime_type'], 'image') !== false): ?>
                                    <img src="<?php echo esc_url($midia['url']); ?>" alt="<?php echo esc_attr($midia['alt']); ?>" class="img-fluid w-100" />
                                <?php
                                elseif (strpos($midia['mime_type'], 'video') !== false): ?>
                                    <video id="video-nossos-valores" class="w-100">
                                        <source src="<?php echo esc_url($midia['url']); ?>" type="<?php echo esc_attr($midia['mime_type']); ?>">
                                        Seu navegador não suporta vídeos.
                                    </video>
                                    <button id="play-midia"></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

    <?php get_template_part('content/entre-em-contato'); ?>
</section>
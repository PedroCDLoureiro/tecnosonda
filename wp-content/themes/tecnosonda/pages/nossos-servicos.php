<?php 
    /**
        * Template Name: Página Nossos Serviços
    */
    get_header();
?>
<section id="page-nossos-servicos" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $banner = get_field('banner');;
    ?>
    <div id="banner" class="container-fluid">
        <img src="<?= $banner; ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
        <div class="texts">
            <h1><?= $titulo_pagina; ?></h1>
        </div>
    </div>
    <?php
    $args = array(
        'post_type' => 'servicos',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        $i = 0;
        $total_posts = $query->post_count;

        while ($query->have_posts()) : $query->the_post(); 
            $i++;

            $post_url = get_the_permalink();
            $titulo_servico = get_the_title();
            $subtitulo_servico = get_field('subtitulo_servico');
            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail_servico = wp_get_attachment_image_src($thumbnail_id, 'full');
            $thumbnail_url = $thumbnail_servico[0];
            $altura_thumbnail  = $thumbnail_servico[2];
            $texto_servico = get_the_content();

            if ($i % 2 == 0) {
                $posicao_background = 'top left';
                $coluna_class = 'col-6 offset-6 d-flex flex-column justify-content-center text-white sobre';
                $container_class = 'container-fluid container-text-image py-5';
            } else {
                $posicao_background = 'top right';
                $coluna_class = 'col-6 d-flex flex-column pt-5 text-white sobre';
                $container_class = 'container-fluid container-text-image';
            }

            if ($i === 1) {
                $container_class .= ' show-before';
            } elseif ($i === $total_posts) {
                $container_class .= ' show-after';
            }
    ?>
            <div class="<?= esc_attr($container_class); ?>" 
                style="background-image: url('<?= esc_url($thumbnail_url); ?>');
                        background-repeat: no-repeat;
                        background-position: <?= esc_attr($posicao_background); ?>;">
                <div class="container">
                    <div class="<?= esc_attr($coluna_class); ?>" 
                        style="height: <?= esc_attr($altura_thumbnail); ?>px;">
                        <div class="section-title white-title mb-4">
                            <h2 class="title_servico mb-2"><?= esc_html($titulo_servico); ?></h2>
                            <h3 class="mb-0"><?= esc_html($subtitulo_servico); ?></h3>
                        </div>
                        <?= wp_kses_post(wpautop($texto_servico)); ?>
                        <a href="<?= esc_url($post_url); ?>" class="btn btn-large secondary-btn mt-4 w-max-content">Saber mais</a>
                    </div>
                </div>
            </div>
    <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>

    <?php get_template_part('content/entre-em-contato') ?>
</section>
<?php get_footer(); ?>
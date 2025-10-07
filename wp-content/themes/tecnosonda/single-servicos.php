<?php 
    get_header(); 

    $pagina_servicos = get_page_by_path('nossos-servicos');

    if ($pagina_servicos) {
        $banner = get_field('banner', $pagina_servicos->ID);
    }

    $titulo_pagina = get_the_title();
    $thumbnail_id = get_post_thumbnail_id();
    $thumbnail_servico = wp_get_attachment_image_src($thumbnail_id, 'full');
    $thumbnail_url = $thumbnail_servico[0];
    $altura_thumbnail  = $thumbnail_servico[2];
?>
<section id="single-nossos-servicos" class="single">
    <div id="banner" class="container-fluid">
        <img src="<?= $banner; ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
        <div class="texts">
            <h1><?= $titulo_pagina; ?></h1>
        </div>
    </div>
    <?php if (have_rows('slider_de_imagens')): ?>
        <div class="container-fluid container-slider-imagens-servico">
            <div class="container">
                <div id="slider-imagens-servico" class="small-arrows py-5">
                    <?php 
                        while (have_rows('slider_de_imagens')): the_row(); 
                        $imagem_slider = get_sub_field("imagem_slider");
                        $texto_slider = get_sub_field("texto_slider");
                    ?>
                        <div class="item">
                            <img src="<?= esc_url($imagem_slider); ?>" alt="<?= esc_attr($texto_slider); ?>" class="thumbnail w-100">
                            <h3><?= $texto_slider; ?></h3>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="container-fluid container-text-image show-before" 
        style="background-image: url('<?= esc_url($thumbnail_url); ?>');
                background-repeat: no-repeat;
                background-position: top right;">
        <div class="container">
            <div class="col-6 offset-xxl-3 d-flex flex-column pt-5 text-white sobre" 
                style="height: <?= esc_attr($altura_thumbnail); ?>px;">
                <div class="section-title white-title mb-4">
                    <?= wpautop(the_content()); ?>
                </div>
                <a href="<?= WP_URL; ?>/orcamento" class="btn btn-large secondary-btn mt-4 w-max-content">Saber mais</a>
            </div>
        </div>
    </div>
    
    <div class="container">        
        <div class="single-post">
            
        </div>
    </div>
</section>

<?php get_footer(); ?>

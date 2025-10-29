<?php 
    /**
        * Template Name: Página Certificações
    */
    get_header();
?>
<section id="page-certificacoes" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $texto_topo = get_field('texto_topo');
        $banner = get_field('banner');
        $logo_banner = get_field('logo_banner');
        $texto_iso = get_field('texto_iso');
        $texto_esg = get_field('texto_esg');
        $imagem_esg = get_field('imagem_esg');
    ?>
    <div id="banner" class="container-fluid bg-primary show-after after-top">
        <div class="texts">
            <div class="section-title white-title">
                <h1><?= $titulo_pagina; ?></h1>
                <?= $texto_topo; ?>
            </div>
        </div>
    </div>
    <?php if($banner) : ?>
        <div id="banner-certificacao" class="container-fluid">
            <img src="<?= $banner ?>" alt="<?= $titulo_pagina ?>" class="img-banner w-100">
            <?php if($logo_banner) : ?>
                <img src="<?= $logo_banner ?>" alt="<?= $titulo_pagina ?>" class="logo-banner">
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div id="certificacoes" class="container-fluid bg-primary show-after">
        <div class="container">
            <?php if($texto_iso) : ?>
                <div id="iso" class="col-12 mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="text-white mb-0">ISO</h2>
                        <a href="<?= WP_URL ?>/iso" class="btn btn-large white-btn">Mais informações</a>
                    </div>
                    <div class="text-white">
                        <?= $texto_iso; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($texto_esg) : ?>
                <div id="esg" class="col-12 pt-4">
                    <div class="row">
                        <div class="col-md-6 col-12 d-flex flex-column justify-content-end pb-4 text-esg">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h2 class="text-white mb-0">ESG</h2>
                                <a href="<?= WP_URL ?>/esg" class="btn btn-large white-btn d-lg-none d-block">Mais informações</a>
                            </div>
                            <div class="text-white mb-4">
                                <?= $texto_esg; ?>
                            </div>
                            <a href="<?= WP_URL ?>/esg" class="btn btn-large white-btn w-max-content d-lg-block d-none">Mais informações</a>
                        </div>
                        <?php if($imagem_esg) : ?>
                            <div class="col-md-6 col-12 text-end image-esg">
                                <img src="<?= $imagem_esg ?>" alt="ESG">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php get_template_part('content/entre-em-contato'); ?>
</section>
<?php get_footer(); ?>
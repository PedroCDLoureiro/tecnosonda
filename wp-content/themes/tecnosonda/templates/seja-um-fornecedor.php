<?php 
    /**
        * Template Name: Página Seja um Fornecedor
    */
    get_header();
?>
<section id="page-seja-um-fornecedor" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $texto_topo = get_field('texto_topo');
        $imagem_1_topo = get_field('imagem_1_topo');
        $imagem_2_topo = get_field('imagem_2_topo');
        $imagem_3_topo = get_field('imagem_3_topo');
        $texto_meio = get_field('texto_meio');
        $imagem_1_meio = get_field('imagem_1_meio');
        $imagem_2_meio = get_field('imagem_2_meio');
        $background_proximos_passos = get_field('background_proximos_passos');
    ?>
    
    <div id="banner" class="container-fluid bg-primary show-after after-top">
        <div id="top-page" class="container mb-5">
            <div class="row">
                <div class="col-md-7 col-12 left-top">
                    <div class="section-title white-title">
                        <h1 class="text-uppercase fw-bold"><?= $titulo_pagina; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="seja-nosso-parceiro">
            <div class="d-grid images-text">
                <div class="image1 pt-lg-5">
                    <img src="<?= $imagem_1_topo ?>" alt="<?= $titulo_pagina ?>" class="w-100">
                </div>
                <div class="d-flex flex-column image23">
                    <img src="<?= $imagem_2_topo ?>" alt="<?= $titulo_pagina ?>" class="w-100 pb-3">
                    <img src="<?= $imagem_3_topo ?>" alt="<?= $titulo_pagina ?>" class="w-100">
                </div>
                <div class="text mt-lg-4">
                    <div class="section-title white-title">
                        <h2 class="text-uppercase mb-0">Seja nosso parceiro: Torne-se <span>um fornecedor de excelência</span></h2>
                    </div>
                    <?php if($texto_topo) : ?>
                        <div class="text-white mt-4">
                            <?= $texto_topo ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="pre-cadastro" class="container-fluid bg-primary">
        <div class="d-grid images-text">
            <div class="text mt-4">
                <div class="section-title white-title">
                    <h2 class="text-uppercase mb-0">Pré-cadastro de <br><span>fornecedores</span></h2>
                </div>
                <?php if($texto_meio) : ?>
                    <div class="text-white mt-4">
                        <?= $texto_meio ?>
                    </div>
                <?php endif; ?>
                <button id="form-contato" class="btn btn-large white-btn w-max-content mt-3">Fazer pré-cadastro</button>
            </div>
            <div class="image1 pt-5 mt-5">
                <img src="<?= $imagem_1_meio ?>" alt="<?= $titulo_pagina ?>" class="w-100">
            </div>
            <div class="d-flex flex-column image2">
                <img src="<?= $imagem_2_meio ?>" alt="<?= $titulo_pagina ?>" class="w-100">
            </div>
        </div>
    </div>
    <div id="proximos-passos" class="container-fluid" style="background-image: url('<?= esc_url($background_proximos_passos); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">
        <div class="container">
            <div class="col-lg-8 col-12 passos">
                <div class="section-title">
                    <h2 class="text-uppercase mb-0">Próximos <span>passos</span></h2>
                </div>
                <?php if (have_rows('proximos_passos')): ?>
                    <div class="d-flex flex-column lista-passos">
                        <?php 
                            while (have_rows('proximos_passos')): the_row();
                            $index = get_row_index();
                            $titulo_passo = get_sub_field('titulo_passo');
                            $texto_passo = get_sub_field('texto_passo');
                        ?>
                            <div class="d-flex item-passo">
                                <span class="fw-bold index-passo">
                                    <?= $index . '.'; ?>
                                </span>
                                <div class="d-flex flex-column pt-3">
                                    <h4 class="fw-bold"><?= $titulo_passo ?></h4>
                                    <span><?= $texto_passo ?></span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('content/form-contato') ?>
<?php get_footer(); ?>
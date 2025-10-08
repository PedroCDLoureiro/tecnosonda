<?php 
    /**
        * Template Name: Página Soluções Integradas
    */
    get_header();
?>
<section id="page-solucoes-integradas" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $banner = get_field('banner');
        $titulo_topo = get_field('titulo_topo');
        $texto_topo = get_field('texto_topo');
        $imagem_topo = get_field('imagem_topo');
        $background_nossos_servicos = get_field('background_nossos_servicos');
        $texto_nossos_servicos = get_field('texto_nossos_servicos');
        $titulo_circulo = get_field('titulo_circulo');
        $texto_circulo = get_field('texto_circulo');
    ?>
    <div id="banner" class="container-fluid">
        <img src="<?= $banner; ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
        <div class="texts">
            <h1><?= $titulo_pagina; ?></h1>
        </div>
    </div>
    <div id="descricao" class="container-fluid bg-primary show-before">
        <div class="container-fluid container-text-image" style="background-image: url(<?= $imagem_topo['url']; ?>);background-repeat: no-repeat;background-position: top right;">
            <div class="container">
                <div class="col-6 d-flex flex-column justify-content-center text-white sobre" style="height: <?= $imagem_topo['height'] . 'px'; ?>">
                    <div class="section-title white-title">
                        <h2 class="mb-3"><?= $titulo_topo; ?></h2>
                        <?= $texto_topo; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="container-circulo" class="container-fluid" style="background-image: url(<?= $background_nossos_servicos; ?>);background-repeat: no-repeat;background-position: center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12 d-flex flex-column justify-content-center text-white sobre">
                    <div class="section-title white-title mb-3">
                        <h2>
                            Nossos <span>SERVIÇOS</span>
                        </h2>
                    </div>
                    <?= $texto_nossos_servicos; ?>
                </div>
                <div id="circulo-nossos-servicos" class="col-md-8 col-12 d-flex align-items-center justify-content-center">
                    <div id="circulo" class="d-flex flex-column align-items-center">
                        <div class="d-flex flex-column align-items-center content-circulo">
                            <h2><?= $titulo_circulo; ?></h2>
                            <svg id="aspas-inicio" data-name="Aspas início" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="12.641" height="10.865" viewBox="0 0 12.641 10.865">
                                <defs>
                                    <clipPath id="clip-path">
                                    <rect id="Rectangle_309" data-name="Rectangle 309" width="12.641" height="10.865" fill="#006635"/>
                                    </clipPath>
                                </defs>
                                <g id="Group_237" data-name="Group 237" clip-path="url(#clip-path)">
                                    <path id="Path_233" data-name="Path 233" d="M224.06,10.865c-.053,0-.106-.01-.159-.01q-2.554,0-5.108,0c-.122,0-.158-.027-.158-.155,0-1.732-.02-3.464.009-5.2A5.322,5.322,0,0,1,221.908.463,4.852,4.852,0,0,1,223.827.02c.078,0,.155-.013.232-.02V1.827a3.576,3.576,0,0,0-3.589,3.605h3.589Z" transform="translate(-211.419)" fill="#006635"/>
                                    <path id="Path_234" data-name="Path 234" d="M5.414,2.239a3.621,3.621,0,0,0-3.6,3.61h3.6v5.415H0v-.133Q0,8.5,0,5.873A5.417,5.417,0,0,1,3.555.764,5.288,5.288,0,0,1,5.339.435a.653.653,0,0,1,.075.008Z" transform="translate(0 -0.42)" fill="#006635"/>
                                </g>
                            </svg>
                            <p class="mb-0"><?= $texto_circulo; ?></p>
                            <svg id="aspas-fim" data-name="Aspas fim" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="12.641" height="10.865" viewBox="0 0 12.641 10.865">
                                <defs>
                                    <clipPath id="clip-path">
                                    <rect id="Rectangle_309" data-name="Rectangle 309" width="12.641" height="10.865" fill="#006635"/>
                                    </clipPath>
                                </defs>
                                <g id="Group_237" data-name="Group 237" clip-path="url(#clip-path)">
                                    <path id="Path_233" data-name="Path 233" d="M218.629,0c.053,0,.106.01.159.01q2.554,0,5.108,0c.122,0,.158.027.158.155,0,1.732.02,3.464-.009,5.2A5.322,5.322,0,0,1,220.78,10.4a4.852,4.852,0,0,1-1.919.443c-.078,0-.155.013-.232.02V9.038a3.576,3.576,0,0,0,3.589-3.605h-3.589Z" transform="translate(-218.629 0)" fill="#006635"/>
                                    <path id="Path_234" data-name="Path 234" d="M0,9.46a3.621,3.621,0,0,0,3.6-3.61H0V.435H5.414V.567q0,2.629,0,5.258a5.417,5.417,0,0,1-3.555,5.109,5.288,5.288,0,0,1-1.784.329A.653.653,0,0,1,0,11.256Z" transform="translate(7.227 -0.413)" fill="#006635"/>
                                </g>
                            </svg>
                        </div>

                        <?php 
                            $index = 0;
                            while (have_rows('itens_circulo')): the_row();
                            $titulo_item_circulo = get_sub_field('titulo_item_circulo');
                            $icone_item_circulo = get_sub_field('icone_item_circulo');
                        ?>
                            <div class='item-circulo item-$index'>
                                <span><?= $titulo_item_circulo; ?></span>
                                <span class='icone-item'><img src="<?= $icone_item_circulo; ?>" alt="<?= $titulo_item_circulo; ?>" class="w-100"></span>
                            </div>
                        <?php 
                            $index++;
                            endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part('content/nossos-servicos'); ?>

    <?php get_template_part('content/entre-em-contato'); ?>
</section>
<?php get_footer(); ?>
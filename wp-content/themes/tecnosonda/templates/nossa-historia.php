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
        $marcos = get_field('marcos_dos_ultimos_anos');
    ?>
    <div id="banner" class="container-fluid">
        <img src="<?= $banner; ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
        <div class="texts">
            <h1><?= $titulo_pagina; ?></h1>
        </div>
    </div>
    <div class="container-fluid container-text-image" style="background-image: url(<?= $imagem_topo['url']; ?>);background-repeat: no-repeat;background-position: top right;">
        <div class="container-fluid">
            <div class="container">
                <div class="col-md-6 col-12 d-flex flex-column justify-content-center text-white sobre" style="height: <?= $imagem_topo['height'] . 'px'; ?>">
                    <?= $texto_topo; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid d-lg-none col-12 img-mobile">
        <img src="<?= esc_url($imagem_topo['url']); ?>" alt="<?= $titulo_pagina; ?>" class="w-100">
    </div>
    <?php if (have_rows('marcos_dos_ultimos_anos')): ?>
        <div class="container-fluid container-marcos">
            <div class="container mb-5">
                <div class="d-flex align-items-center justify-content-between top-marcos">
                    <div class="section-title white-title">
                        <h2>Marcos Dos <span>Últimos 25 Anos:</span></h2>
                    </div>
                    <div class="controls-slider controls-white">
                        <button id="prev-marcos">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M201.4 297.4C188.9 309.9 188.9 330.2 201.4 342.7L361.4 502.7C373.9 515.2 394.2 515.2 406.7 502.7C419.2 490.2 419.2 469.9 406.7 457.4L269.3 320L406.6 182.6C419.1 170.1 419.1 149.8 406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3L201.3 297.3z"/></svg>
                        </button>
                        <button id="next-marcos">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M439.1 297.4C451.6 309.9 451.6 330.2 439.1 342.7L279.1 502.7C266.6 515.2 246.3 515.2 233.8 502.7C221.3 490.2 221.3 469.9 233.8 457.4L371.2 320L233.9 182.6C221.4 170.1 221.4 149.8 233.9 137.3C246.4 124.8 266.7 124.8 279.2 137.3L439.2 297.3z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="marcos">
                <div class="marcos-wrapper scroll-slider">
                    <?php 
                        $indice = 0; 
                    
                        while (have_rows('marcos_dos_ultimos_anos')): the_row();
                        $imagem = get_sub_field('imagem_marco');
                        $periodo = get_sub_field('periodo_marco');
                        $texto_curto = get_sub_field('texto_curto_marco');
                    ?>
                        <div class="d-flex marco-item">
                            <div class="d-flex content-marco" data-indice="<?= $indice; ?>">
                                <div class="dot-top"></div>
                                <div class="d-flex flex-column texts">
                                    <h3 class="text-white fw-bold"><?= esc_html($periodo); ?></h3>
                                    <div class="d-flex flex-column mb-4 itens-marco">
                                        <?php while (have_rows('itens_marco')): the_row();
                                            $titulo_item = get_sub_field('titulo_item_marco');
                                        ?>
                                            <span class="text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.791" height="10.05" viewBox="0 0 11.791 10.05">
                                                    <path id="icon_valores" data-name="Icon Valores" d="M119.075,1080.594v8.7c5.193,3.885,4.708,4.259,10.05.223v-6.351c-5.6,1.275-7.809-.182-10.049-2.574Z" transform="translate(-1080.594 129.125) rotate(-90)" fill="#cae098" fill-rule="evenodd"/>
                                                </svg>
                                                <?= esc_html($titulo_item); ?>
                                            </span>
                                        <?php endwhile; ?>
                                    </div>
                                    <p class="text-white">
                                        <?= $texto_curto; ?>
                                    </p>
                                </div>
                                <img src="<?= esc_url($imagem); ?>" alt="<?= esc_attr($periodo); ?>" class="thumbnail w-100">
                                <div class="dot-bottom"></div>
                            </div>
                        </div>
                        <?php $indice++; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (have_rows('marcos_dos_ultimos_anos')): ?>
        <div class="marcoModal modal scroll-slider">
            <div class="modal-content">
                <span class="close-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/></svg>
                </span>
                <div class="modal-body">
                    <div class="items-slider small-arrows">
                        <?php if (have_rows('marcos_dos_ultimos_anos')): ?>
                            <?php 
                                $periodos = [];
                                while (have_rows('marcos_dos_ultimos_anos')): the_row();
                                    $periodos[] = get_sub_field('periodo_marco');
                                endwhile; 
                                
                                reset_rows();
                            ?>

                            <?php while (have_rows('marcos_dos_ultimos_anos')): the_row(); 
                                $imagem = get_sub_field('imagem_marco');
                                $periodo = get_sub_field('periodo_marco');
                                $texto_completo = get_sub_field('texto_completo_marco');
                                $itens = get_sub_field('itens_marco');

                                $index = get_row_index() - 1; 
                                
                                $proximo_periodo = isset($periodos[$index + 1]) ? $periodos[$index + 1] : null;
                            ?>
                                <div class="slider-item" data-thumb="<?= esc_url($imagem); ?>">
                                    <img src="<?= esc_url($imagem); ?>" alt="<?= esc_attr($periodo); ?>" class="thumbnail w-100">
                                    <div class="texts">
                                        <div class="d-flex flex-column itens-marco">
                                            <h3 class="mb-2"><?= esc_html($periodo); ?></h3>
                                            <?php if ($itens): ?>
                                                <?php foreach ($itens as $item): ?>
                                                    <span class="mt-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="11.791" height="10.05" viewBox="0 0 11.791 10.05">
                                                            <path id="icon_valores" data-name="Icon Valores" d="M119.075,1080.594v8.7c5.193,3.885,4.708,4.259,10.05.223v-6.351c-5.6,1.275-7.809-.182-10.049-2.574Z" transform="translate(-1080.594 129.125) rotate(-90)" fill="#cae098" fill-rule="evenodd"/>
                                                        </svg>
                                                        <?= esc_html($item['titulo_item_marco']); ?>
                                                    </span>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="conteudo-item"><?= $texto_completo; ?></div>
                                        <?php if ($proximo_periodo): ?>
                                            <span class="text-end mt-2 next-slide">
                                                <?= esc_html($proximo_periodo); ?>
                                                <span class="arrow-next">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M471.1 297.4C483.6 309.9 483.6 330.2 471.1 342.7L279.1 534.7C266.6 547.2 246.3 547.2 233.8 534.7C221.3 522.2 221.3 501.9 233.8 489.4L403.2 320L233.9 150.6C221.4 138.1 221.4 117.8 233.9 105.3C246.4 92.8 266.7 92.8 279.2 105.3L471.2 297.3z"/></svg>
                                                </span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php get_template_part('content/entre-em-contato') ?>
</section>
<?php get_footer(); ?>
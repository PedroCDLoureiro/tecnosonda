<?php 
    /**
        * Template Name: Página Política de Integridade
    */
    get_header();
?>
<section id="page-politica-de-integridade" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $texto_politica_de_integridade = get_field('texto_politica_de_integridade');
    ?>
    <div id="banner" class="container-fluid bg-primary show-after after-top pb-4">
        <div id="top-page" class="container">
            <div class="col-12">
                <div class="section-title white-title">
                    <h1 class="mb-0 text-uppercase fw-bold">Política de <span>Integridade</span></h1>
                </div>
                <div class="text-white mt-lg-3 mt-4">
                    <?= $texto_politica_de_integridade; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if (have_rows('secoes')) : ?>
        <div id="secoes">
            <?php 
            $total_rows = count(get_field('secoes'));
            while (have_rows('secoes')) : the_row(); 
                $texto_secao = get_sub_field('texto_secao');
                $index = get_row_index();
                $is_odd = $index % 2 !== 0;
                $is_last = $index === $total_rows;
            ?>
                <div class="container-fluid <?= $is_odd ? 'bg-gray text-black' : 'bg-primary text-white'; ?> py-3 <?= $is_last ? 'show-after pb-5' : ''; ?>">
                    <div class="container">
                        <div class="col-12">
                            <?= $texto_secao; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>
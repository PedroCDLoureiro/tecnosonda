<?php 
    /**
        * Template Name: Página ESG
    */
    get_header();
?>
<section id="page-esg" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $texto_topo = get_field('texto_topo');
        $imagem_topo = get_field('imagem_topo');
        $imagem_dados = get_field('imagem_dados');
        $imagem_dados_2 = get_field('imagem_dados_2');
        $imagem_dados_3 = get_field('imagem_dados_3');
        $empregos_diretos = get_field('empregos_diretos');
        $empregos_diretos_nivel_operacional = get_field('empregos_diretos_nivel_operacional');
        $familias_impactadas = get_field('familias_impactadas');
        $empregos_diretos_nivel_medias_liderancas = get_field('empregos_diretos_nivel_medias_liderancas');
        $destinados_a_comunidades = get_field('destinados_a_comunidades');
        $banner_final = get_field('banner_final');
        $logo_banner_final = get_field('logo_banner_final');
        $texto_banner_final = get_field('texto_banner_final');
    ?>
    <div id="banner" class="container-fluid bg-primary show-after after-top">
        <div id="top-page" class="container">
            <div class="row">
                <div class="col-md-7 col-12 left-top">
                    <div class="section-title white-title">
                        <h1 class="mb-4"><?= $titulo_pagina; ?></h1>
                        <div class="descricao">
                            <?= $texto_topo; ?>
                        </div>
                        <?php if (have_rows('pdfs_topo')) : ?>
                            <div id="pdfs" class="d-grid mt-5">
                                <?php while (have_rows('pdfs_topo')) : the_row(); 
                                    $arquivo = get_sub_field('arquivo');
                                    $nome_arquivo = get_sub_field('nome_arquivo');
                                ?>
                                    <div class="pdf-item">
                                        <a href="<?= esc_url($arquivo['url']); ?>" target="_blank" rel="noopener noreferrer" class="d-flex">
                                            <svg class="icone-pdf" xmlns="http://www.w3.org/2000/svg" width="29.571" height="38" viewBox="0 0 29.571 38">
                                                <g id="_86fd73da156fdfe761e331988feb73a2" data-name="86fd73da156fdfe761e331988feb73a2" transform="translate(-32.485 -23.5)">
                                                    <path id="Path_3807" data-name="Path 3807" d="M37.9,23.5a5.4,5.4,0,0,0-5.4,5.4v9.148a1.173,1.173,0,1,0,2.346,0V28.9A3.049,3.049,0,0,1,37.9,25.846h13.84V31.71a2.58,2.58,0,0,0,2.58,2.58h5.4V56.1a3.049,3.049,0,0,1-3.049,3.049H37.9A3.049,3.049,0,0,1,34.846,56.1V54.7a1.173,1.173,0,1,0-2.346,0V56.1a5.4,5.4,0,0,0,5.4,5.4H56.66a5.4,5.4,0,0,0,5.4-5.4V33.57a4.457,4.457,0,0,0-1.194-3.036l-1.442-1.549-.018-.02-.019-.019-4.256-4.172a4.457,4.457,0,0,0-3.12-1.274ZM58.97,31.944,57.721,30.6l-3.64-3.568V31.71a.235.235,0,0,0,.235.235Z" fill="#fff" fill-rule="evenodd"/>
                                                    <path id="Path_3808" data-name="Path 3808" d="M33,71.916V65.367a.185.185,0,0,1,.056-.15.191.191,0,0,1,.141-.056h3.012a1.924,1.924,0,0,1,.873.2,2.173,2.173,0,0,1,.685.516,2.313,2.313,0,0,1,.45.732,2.251,2.251,0,0,1,.16.835,2.227,2.227,0,0,1-.16.826,2.289,2.289,0,0,1-.432.722,2.207,2.207,0,0,1-.676.516,2,2,0,0,1-.873.188H34.8v2.224q0,.206-.216.206H33.2Q33,72.122,33,71.916Zm2.815-5.273H34.8V68.21h1.013a.645.645,0,0,0,.535-.235.871.871,0,0,0,.188-.544.753.753,0,0,0-.056-.281.776.776,0,0,0-.141-.253.584.584,0,0,0-.225-.178A.594.594,0,0,0,35.815,66.643Z" transform="translate(-0.265 -22.116)" fill="#fff"/>
                                                    <path id="Path_3809" data-name="Path 3809" d="M46.614,71.916V65.367q0-.206.2-.206H49.25a3.141,3.141,0,0,1,1.276.272,3.74,3.74,0,0,1,1.116.741,3.578,3.578,0,0,1,.779,1.107,3.156,3.156,0,0,1,.3,1.36,3.274,3.274,0,0,1-.272,1.314,3.742,3.742,0,0,1-.741,1.117,3.66,3.66,0,0,1-1.107.769,3.268,3.268,0,0,1-1.351.281H46.811Q46.614,72.122,46.614,71.916ZM50.9,68.641a1.767,1.767,0,0,0-.141-.7,1.665,1.665,0,0,0-.375-.582,1.781,1.781,0,0,0-.582-.385,1.716,1.716,0,0,0-.722-.15h-.657v3.64h.657a1.815,1.815,0,0,0,.722-.141,1.912,1.912,0,0,0,.582-.394,1.686,1.686,0,0,0,.375-.572A1.835,1.835,0,0,0,50.9,68.641Z" transform="translate(-7.493 -22.116)" fill="#fff"/>
                                                    <path id="Path_3810" data-name="Path 3810" d="M61.966,71.916V65.367q0-.206.2-.206h4.476q.2,0,.2.206v1.2q0,.206-.2.206H63.777v1.445h2.092q.206,0,.206.216V69.57a.182.182,0,0,1-.206.206H63.777v2.139a.182.182,0,0,1-.206.206H62.163Q61.966,72.122,61.966,71.916Z" transform="translate(-15.643 -22.116)" fill="#fff"/>
                                                    <path id="Path_3811" data-name="Path 3811" d="M33,71.916V65.367a.185.185,0,0,1,.056-.15.191.191,0,0,1,.141-.056h3.012a1.924,1.924,0,0,1,.873.2,2.173,2.173,0,0,1,.685.516,2.313,2.313,0,0,1,.45.732,2.251,2.251,0,0,1,.16.835,2.227,2.227,0,0,1-.16.826,2.289,2.289,0,0,1-.432.722,2.207,2.207,0,0,1-.676.516,2,2,0,0,1-.873.188H34.8v2.224q0,.206-.216.206H33.2Q33,72.122,33,71.916Zm2.815-5.273H34.8V68.21h1.013a.645.645,0,0,0,.535-.235.871.871,0,0,0,.188-.544.753.753,0,0,0-.056-.281.776.776,0,0,0-.141-.253.584.584,0,0,0-.225-.178A.594.594,0,0,0,35.815,66.643Z" transform="translate(-0.265 -22.116)" fill="none" stroke="#707070" stroke-width="0.5"/>
                                                    <path id="Path_3812" data-name="Path 3812" d="M46.614,71.916V65.367q0-.206.2-.206H49.25a3.141,3.141,0,0,1,1.276.272,3.74,3.74,0,0,1,1.116.741,3.578,3.578,0,0,1,.779,1.107,3.156,3.156,0,0,1,.3,1.36,3.274,3.274,0,0,1-.272,1.314,3.742,3.742,0,0,1-.741,1.117,3.66,3.66,0,0,1-1.107.769,3.268,3.268,0,0,1-1.351.281H46.811Q46.614,72.122,46.614,71.916ZM50.9,68.641a1.767,1.767,0,0,0-.141-.7,1.665,1.665,0,0,0-.375-.582,1.781,1.781,0,0,0-.582-.385,1.716,1.716,0,0,0-.722-.15h-.657v3.64h.657a1.815,1.815,0,0,0,.722-.141,1.912,1.912,0,0,0,.582-.394,1.686,1.686,0,0,0,.375-.572A1.835,1.835,0,0,0,50.9,68.641Z" transform="translate(-7.493 -22.116)" fill="none" stroke="#707070" stroke-width="0.5"/>
                                                    <path id="Path_3813" data-name="Path 3813" d="M61.966,71.916V65.367q0-.206.2-.206h4.476q.2,0,.2.206v1.2q0,.206-.2.206H63.777v1.445h2.092q.206,0,.206.216V69.57a.182.182,0,0,1-.206.206H63.777v2.139a.182.182,0,0,1-.206.206H62.163Q61.966,72.122,61.966,71.916Z" transform="translate(-15.643 -22.116)" fill="none" stroke="#707070" stroke-width="0.5"/>
                                                </g>
                                            </svg>
                                            <?= esc_html($nome_arquivo); ?>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-5 col-12 right-top">
                    <?php if($imagem_topo) : ?>
                        <img src="<?= $imagem_topo ?>" alt="<?= $titulo_pagina ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="container-listas" class="container-fluid bg-primary show-after">
        <div class="container">
            <?php if (have_rows('listas')) : ?>
                <div id="listas" class="d-grid">
                    <?php while (have_rows('listas')) : the_row(); 
                        $titulo_lista = get_sub_field('titulo_lista');
                        $subtitulo_lista = get_sub_field('subtitulo_lista');
                    ?>
                        <div class="d-flex flex-column justify-content-between text-white lista">
                            <div class="top-list">
                                <div class="title-list">
                                    <h3 class="mb-0"><?= $titulo_lista; ?></h3>
                                    <span class="subtitulo"><?= $subtitulo_lista; ?></span>
                                </div>
                                <?php if (have_rows('itens_lista')) : ?>
                                    <div class="d-flex flex-column itens_lista mt-5">
                                        <?php while (have_rows('itens_lista')) : the_row(); 
                                            $item_lista = get_sub_field('item_lista');
                                        ?>
                                            <span class="item-list">
                                                <?= $item_lista; ?>
                                            </span>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if (have_rows('icones_lista')) : ?>
                                <div class="bottom-list">
                                    <div class="d-flex flex-wrap icones_lista mt-5">
                                        <?php while (have_rows('icones_lista')) : the_row(); 
                                            $icone_lista = get_sub_field('icone_lista');
                                        ?>
                                            <img src="<?= $icone_lista; ?>">
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div id="container-images" class="bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 image">
                    <img src="<?= $imagem_dados; ?>" class="w-100">
                </div>
                <div class="col-md-5 offset-md-1 col-12 d-flex align-items-center">
                    <div class="d-grid dados">
                        <h3 class="d-flex flex-column empregos-diretos">
                            <span>+<?= $empregos_diretos; ?></span>
                            <span>empregos diretos</span>
                        </h3>
                        <h3 class="d-flex flex-column empregos-diretos-nivel-operacional">
                            <span>+<?= $empregos_diretos_nivel_operacional; ?></span>
                            <span>empregos diretos <br> nível operacional*</span>
                        </h3>
                        <h3 class="d-flex flex-column familias-impactadas">
                            <span>+<?= $familias_impactadas; ?></span>
                            <span>famílias impactadas</span>
                        </h3>
                        <h3 class="d-flex flex-column empregos-diretos-nivel-medias-liderancas">
                            <span>+<?= $empregos_diretos_nivel_medias_liderancas; ?></span>
                            <span>empregos diretos <br> nível médias lideranças*</span>
                        </h3>
                        <h3 class="d-flex flex-column full destinados-a-comunidades">
                            <span>+R$ <?= $destinados_a_comunidades; ?></span>
                            <span>destinados a comunidades</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-start mt-3 images-dados">
                <img src="<?= $imagem_dados_2 ?>" alt="<?= $titulo_pagina ?>">
                <img src="<?= $imagem_dados_3 ?>" alt="<?= $titulo_pagina ?>" class="ms-4">
            </div>
        </div>
    </div>
    <div id="banner-certificacao" class="container-fluid black-mask" style="background-image: url(<?= $banner_final['url']; ?>);background-repeat: no-repeat;background-position: top center;background-size: cover;">
        <div class="container d-flex align-items-center justify-content-center" style="height: <?= $banner_final['height'] . 'px'; ?>">
            <div class="d-flex align-items-center justify-content-center text-white content">
                <img src="<?= $logo_banner_final ?>">
                <div class="text">
                    <?= $texto_banner_final; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
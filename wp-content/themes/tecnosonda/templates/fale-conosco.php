<?php 
    /**
        * Template Name: Página Fale Conosco
    */
    get_header();
?>
<section id="page-fale-conosco" class="page">
    <?php
    $titulo_pagina = get_the_title();
    $args = array(
        'post_type' => 'dados-fale-conosco',
        'posts_per_page' => 1,
    );
    $query = new WP_Query($args);
    
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); 
        $texto_pagina = get_field('texto_pagina');
        $telefone = get_field('telefone_contato');
        $email = get_field('email_contato');
        $localizacao = get_field('localizacao');
    ?>
        <div id="banner" class="container-fluid bg-primary show-after after-top">
            <div id="top-page" class="container">
                <div class="row">
                    <div class="col-lg-7 col-12 left-top">
                        <div class="section-title white-title">
                            <h1 class="mb-4"><?= $titulo_pagina; ?></h1>
                            <div class="descricao">
                                <?= $texto_pagina; ?>
                                <button id="form-contato" class="btn btn-large white-btn">Enviar mensagem</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 email mt-5 mb-md-4 mb-0">
                        <div class="content-dados bg-gray">
                            <div class="d-flex flex-column title-dados">
                                <h3 class="d-flex align-items-center mb-1 fw-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#006635" d="M125.4 128C91.5 128 64 155.5 64 189.4C64 190.3 64 191.1 64.1 192L64 192L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 192L575.9 192C575.9 191.1 576 190.3 576 189.4C576 155.5 548.5 128 514.6 128L125.4 128zM528 256.3L528 448C528 456.8 520.8 464 512 464L128 464C119.2 464 112 456.8 112 448L112 256.3L266.8 373.7C298.2 397.6 341.7 397.6 373.2 373.7L528 256.3zM112 189.4C112 182 118 176 125.4 176L514.6 176C522 176 528 182 528 189.4C528 193.6 526 197.6 522.7 200.1L344.2 335.5C329.9 346.3 310.1 346.3 295.8 335.5L117.3 200.1C114 197.6 112 193.6 112 189.4z"/></svg>
                                    E-mail
                                </h3>
                                <?= $email ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 telefone mt-md-5 mt-4 mb-4">
                        <div class="content-dados bg-gray">
                            <div class="d-flex flex-column justify-content-between title-dados">
                                <h3 class="d-flex align-items-center mb-1 fw-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                        <path id="Path_3816" data-name="Path 3816" d="M13.832,16.568a1,1,0,0,0,1.213-.3L15.4,15.8A2,2,0,0,1,17,15h3a2,2,0,0,1,2,2v3a2,2,0,0,1-2,2A18,18,0,0,1,2,4,2,2,0,0,1,4,2H7A2,2,0,0,1,9,4V7a2,2,0,0,1-.8,1.6l-.468.351a1,1,0,0,0-.292,1.233,14,14,0,0,0,6.392,6.384" transform="translate(-1 -1)" fill="none" stroke="#006635" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    </svg>
                                    Telefone
                                </h3>
                                <?= $telefone ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 pb-5 localizacao">
                        <div class="content-dados bg-gray">
                            <div class="d-flex flex-column justify-content-between mb-4 title-dados">
                                <h3 class="d-flex align-items-center mb-1 fw-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.167" height="22.266" viewBox="0 0 18.167 22.266">
                                        <g id="_8ddc7f72650eb2cec7872afae9d1e38a" data-name="8ddc7f72650eb2cec7872afae9d1e38a" transform="translate(-3)">
                                            <path id="Path_3819" data-name="Path 3819" d="M12.084,1A8,8,0,0,0,4,8.915c0,2.305,1.985,5.289,3.937,7.768A53.489,53.489,0,0,0,11.852,21.1a.337.337,0,0,0,.463,0,53.539,53.539,0,0,0,3.915-4.421c1.952-2.478,3.937-5.463,3.937-7.768A8,8,0,0,0,12.084,1Z" fill="none" stroke="#006635" stroke-width="2"/>
                                            <path id="Path_3820" data-name="Path 3820" d="M17.736,11.368A3.368,3.368,0,1,1,14.368,8a3.368,3.368,0,0,1,3.368,3.368Z" transform="translate(-2.285 -2.285)" fill="none" stroke="#006635" stroke-width="2"/>
                                        </g>
                                    </svg>
                                    Onde Estamos
                                </h3>
                                <?= $localizacao ?>
                            </div>
                            <?php
                                $endereco_mapa = urlencode($localizacao);
                                $map_url = "https://www.google.com/maps?q={$endereco_mapa}&output=embed";
                            ?>
                            <div class="mapa-google">
                                <iframe
                                    src="<?= $map_url ?>"
                                    width="100%"
                                    height="450"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php endwhile;
        wp_reset_postdata();
    endif; ?>
</section>
<?php get_template_part('content/form-contato') ?>
<?php get_footer(); ?>
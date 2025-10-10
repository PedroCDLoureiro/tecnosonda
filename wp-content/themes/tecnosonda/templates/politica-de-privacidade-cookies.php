<?php 
    /**
        * Template Name: Página Política de Privacidade e Cookies
    */
    get_header();
?>
<section id="page-politica-de-privacidade-cookies" class="page">
    <?php
        $titulo_pagina = get_the_title();
        $texto_politica_de_privacidade = get_field('texto_politica_de_privacidade');
        $texto_politica_de_cookies = get_field('texto_politica_de_cookies');
    ?>
    <div id="banner" class="container-fluid bg-primary show-after after-top pb-4">
        <div id="top-page" class="container">
            <div class="col-12">
                <div class="section-title white-title">
                    <h1 class="mb-0 text-uppercase fw-bold">Política de <span>Privacidade</span></h1>
                </div>
                <div class="text-white mt-3">
                    <?= $texto_politica_de_privacidade; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="politica-cookies" class="container-fluid bg-gray py-5">
        <div class="container">
            <div class="col-12">
                <div class="section-title black-title">
                    <h2 class="mb-0 text-uppercase fw-bold">Política de <span>Cookies</span></h1>
                </div>
                <div class="text-black mt-3">
                    <?= $texto_politica_de_cookies; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
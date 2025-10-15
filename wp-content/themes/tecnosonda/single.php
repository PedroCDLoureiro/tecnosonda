<?php 
    get_header(); 
    $titulo_pagina = get_the_title();
    $categories = get_the_category();
    $category_post = !empty($categories) ? $categories[0]->name : 'Tecnosonda';
?>
<section id="single-page" class="container-fluid bg-primary show-after after-top single">
    <div class="container-fluid show-before">
        <div class="container">
            <div id="banner" class="mb-5">
                <div id="top-page" class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="text-white fw-bold mb-0"><?= $category_post; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:history.back()" class="mb-3 btn-voltar">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M199.7 299.8C189.4 312.4 190.2 330.9 201.9 342.6L329.9 470.6C339.1 479.8 352.8 482.5 364.8 477.5C376.8 472.5 384.6 460.9 384.6 447.9L384.6 191.9C384.6 179 376.8 167.3 364.8 162.3C352.8 157.3 339.1 160.1 329.9 169.2L201.9 297.2L199.7 299.6z"/></svg>    
                Voltar
            </a>
            <div id="thumbnail">
                <?php the_post_thumbnail('full', array('class' => 'w-100')); ?>
            </div>
            <div class="col-8 offset-2 py-5 text-white content-post">
                <div class="section-title white-title mb-5">
                    <h1 class="text-white fw-bold mb-0"><?php the_title(); ?></h1>
                    <span class="mt-2 text-white data-publicacao">
                        Publicado em <?= get_the_date('d \d\e F \d\e Y'); ?>
                    </span>
                </div>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

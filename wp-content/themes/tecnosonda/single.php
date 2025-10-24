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
            <button type="button" class="mb-3 btn-voltar">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M199.7 299.8C189.4 312.4 190.2 330.9 201.9 342.6L329.9 470.6C339.1 479.8 352.8 482.5 364.8 477.5C376.8 472.5 384.6 460.9 384.6 447.9L384.6 191.9C384.6 179 376.8 167.3 364.8 162.3C352.8 157.3 339.1 160.1 329.9 169.2L201.9 297.2L199.7 299.6z"/></svg>    
                Voltar
            </button>
            <div id="thumbnail">
                <?php the_post_thumbnail('full', array('class' => 'w-100')); ?>
            </div>
            <div class="col-lg-8 offset-lg-2 col-12 py-5 text-white content-post">
                <div class="section-title white-title mb-5">
                    <h1 class="text-white fw-bold mb-0"><?php the_title(); ?></h1>
                    <span class="mt-2 text-white data-publicacao">
                        Publicado em <?= get_the_date('d \d\e F \d\e Y'); ?>
                    </span>
                </div>
                <?php the_content(); ?>
                <div class="d-flex justify-content-end mt-4 share-post">
                    <button id="btn-share-post">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22">
                            <g id="Group_263" data-name="Group 263" transform="translate(-2 -1)">
                                <circle id="Ellipse_33" data-name="Ellipse 33" cx="3" cy="3" r="3" transform="translate(15 2)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <circle id="Ellipse_34" data-name="Ellipse 34" cx="3" cy="3" r="3" transform="translate(3 9)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <circle id="Ellipse_35" data-name="Ellipse 35" cx="3" cy="3" r="3" transform="translate(15 16)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <line id="Line_8" data-name="Line 8" x2="6.83" y2="3.98" transform="translate(8.59 13.51)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                <line id="Line_9" data-name="Line 9" x1="6.82" y2="3.98" transform="translate(8.59 6.51)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
            <?php 
                $category_id = !empty($categories) ? $categories[0]->term_id : 0;

                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post__not_in'   => array(get_the_ID()),
                    'cat'            => $category_id,
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );

                $other_posts = new WP_Query($args);

                if ($other_posts->have_posts()) : ?>
                    <section id="outras-noticias" class="container section-category show-after px-0 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-5 top-category">
                            <div class="section-title white-title">
                                <h2>Outras <span>Notícias</span></h2>    
                            </div>
                            <a href="<?= WP_URL ?>/todas-as-noticias" class="fw-bold">Mostrar tudo</a>
                        </div>
                        <div class="row">
                            <?php while ($other_posts->have_posts()) : $other_posts->the_post();
                                $post_id      = $post->ID;
                                $post_url     = get_the_permalink();
                                $post_title   = get_the_title();
                                $thumbnail    = get_the_post_thumbnail_url($post_id, 'full');
                                $data_formatada = get_the_date('d/m/Y');
                            ?>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <a href="<?= esc_url($post_url); ?>">
                                        <article class="d-flex flex-column">
                                            <figure>
                                                <img src="<?= esc_url($thumbnail); ?>" alt="<?= $post_title; ?>" class="w-100">
                                            </figure>
                                            <div class="d-flex flex-column justify-content-between content-post">
                                                <h3 class="mb-0"><?= esc_html($post_title); ?></h3>
                                                <span class="post-time"><?= $data_formatada ?></span>
                                            </div>
                                        </article>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </section>
                <?php 
                endif; 
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<section id="page-noticias" class="page">
    <?php
        $titulo_pagina = get_the_title();
    ?>
    
    <div id="banner" class="container-fluid bg-primary show-after after-top">
        <div id="top-page" class="container">
            <div class="row">
                <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                    <h1 class="text-white fw-bold"><?= $titulo_pagina; ?></h1>
                    <form id="search-notices" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" name="s" placeholder="Pesquisar notícia" />
                        <input type="hidden" name="post_type" value="post" />
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#636363" d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $recent_post = get_posts(array(
        'posts_per_page' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'destaque',
                'field'    => 'slug',
                'terms'    => 'destaque-topo',
            ),
        ),
    ));

    if ($recent_post) :
        $post = $recent_post[0];
        setup_postdata($post);
        $post_id   = get_the_ID();
        $post_url  = get_the_permalink();
        $thumbnail = get_field('banner_horizontal');
        $title     = get_the_title();
    ?>
        <a href="<?= esc_url($post_url); ?>">
            <div id="post-mais-recente" class="container-fluid d-flex align-items-end pb-5"
                style="background-image: url('<?= esc_url($thumbnail); ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">
                <div class="container">
                    <div class="post-title">
                        <h2><?= esc_html($title); ?></h2>
                    </div>
                </div>
            </div>
        </a>
    <?php
        wp_reset_postdata();
    endif;
    ?>

    <div id="destaques" class="container-fluid bg-primary show-before">
        <div class="container">
            <div class="section-title mb-5 white-title">
                <h2>Destaques</h2>    
            </div>
            <div class="row">
                <?php
                    $destaques = get_posts(array(
                        'post_type'      => 'post',
                        'posts_per_page' => 3,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'destaque',
                                'field'    => 'slug',
                                'terms'    => 'destaques',
                            ),
                        ),
                    ));

                    if ($destaques):
                ?>
                    <?php foreach ($destaques as $index => $post): 
                        setup_postdata($post);
                        $post_id      = $post->ID;
                        $post_url     = get_the_permalink();
                        $post_title   = get_the_title();
                        $resumo       = get_field('resumo');
                        $thumbnail    = get_the_post_thumbnail_url($post_id, 'full');
                        $categories   = get_the_category($post_id);
                        $category_name = $categories ? esc_html($categories[0]->name) : '';
                        $post_time = get_the_time('U');
                        $current_time = current_time('timestamp');                    
                        $data_formatada = get_the_date('d/m/Y');                    
                        $tempo_correto = human_time_diff($post_time, $current_time);
                        
                        if ($index === 0): ?>
                            <div class="col-lg-5 col-md-6 col-12 left-post">
                                <a href="<?= esc_url($post_url); ?>">
                                    <article class="h-100" style="--bg-img: url('<?= esc_url($thumbnail); ?>');">
                                        <?php if ($category_name): ?>
                                            <span class="categoria-post"><?= $category_name; ?></span>
                                        <?php endif; ?>
                                        <div class="content-post">
                                            <span class="post-time"><?= $data_formatada . ' | Há ' . $tempo_correto; ?></span>
                                            <h2 class="mt-2 mb-0"><?= esc_html($post_title); ?></h2>
                                            <?php if ($resumo): ?>
                                                <p class="mt-3 mb-0 resumo"><?= $resumo; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </article>
                                </a>
                            </div>
                            <div class="col-lg-7 col-md-6 col-12 d-flex flex-column right-post">
                        <?php else: ?>
                            <a href="<?= esc_url($post_url); ?>">
                                <article class="h-100" style="--bg-img: url('<?= esc_url($thumbnail); ?>');">
                                    <?php if ($category_name): ?>
                                        <span class="categoria-post"><?= $category_name; ?></span>
                                    <?php endif; ?>
                                    <div class="content-post">
                                        <span class="post-time"><?= $data_formatada . ' | Há ' . $tempo_correto; ?></span>
                                        <h2 class="mt-2 mb-0"><?= esc_html($post_title); ?></h2>
                                    </div>
                                </article>
                            </a>
                        <?php endif; 
                    endforeach; ?>
                        </div>
                <?php
                wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-primary show-before section-category">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5 top-category">
                <div class="section-title white-title">
                    <h2>Tecnologia <span>E Inovação</span></h2>    
                </div>
                <?php 
                    $category = get_category_by_slug('tecnologia-e-inovacao');
                    $category_link = get_category_link($category->term_id);
                ?>
                <a href="<?= $category_link ?>" class="fw-bold">Mostrar tudo</a>
            </div>
            <div class="row">
                <?php
                    $tecnologia_inovacao = get_posts(array(
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'tecnologia-e-inovacao',
                            ),
                        ),
                    ));

                    if ($tecnologia_inovacao):
                ?>
                    <?php foreach ($tecnologia_inovacao as $index => $post): 
                        setup_postdata($post);
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
                                        <h2 class="mb-0"><?= esc_html($post_title); ?></h2>
                                        <span class="post-time"><?= $data_formatada ?></span>
                                    </div>
                                </article>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php
                wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-primary show-before section-category">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5 top-category">
                <div class="section-title white-title">
                    <h2>Sustentabilidade</span></h2>    
                </div>
                <?php 
                    $category = get_category_by_slug('sustentabilidade');
                    $category_link = get_category_link($category->term_id);
                ?>
                <a href="<?= $category_link ?>" class="fw-bold">Mostrar tudo</a>
            </div>
            <div class="row">
                <?php
                    $sustentabilidade = get_posts(array(
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'sustentabilidade',
                            ),
                        ),
                    ));

                    if ($sustentabilidade):
                ?>
                    <?php foreach ($sustentabilidade as $index => $post): 
                        setup_postdata($post);
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
                                        <h2 class="mb-0"><?= esc_html($post_title); ?></h2>
                                        <span class="post-time"><?= $data_formatada ?></span>
                                    </div>
                                </article>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php
                wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
    
    <?php
        $noticias_page = get_page_by_path('noticias');

        if ($noticias_page) {
            $bg_parallax = get_field('background_parallax', $noticias_page->ID);
            $titulo_final = get_field('titulo_final', $noticias_page->ID);
            $texto_final = get_field('texto_final', $noticias_page->ID);
        }
    ?>

    <div id="parallax" class="container-fluid py-5" style="background-image: url('<?= esc_url($bg_parallax['url']); ?>');">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h2 class="text-white mb-3"><?= $titulo_final ?></h2>
            <p class="text-white mb-0"><?= $texto_final ?></p>
        </div>
    </div>

    <div id="outras-noticias" class="container-fluid bg-primary show-after section-category">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5 top-category">
                <div class="section-title white-title">
                    <h2>Outras <span>Notícias</span></h2>    
                </div>
                <a href="<?= WP_URL ?>/todas-as-noticias" class="fw-bold">Mostrar tudo</a>
            </div>
            <div class="row">
                <?php
                    $sustentabilidade = get_posts(array(
                        'post_type'      => 'post',
                        'posts_per_page' => 8,
                    ));

                    if ($sustentabilidade):
                ?>
                    <?php foreach ($sustentabilidade as $index => $post): 
                        setup_postdata($post);
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
                                        <h2 class="mb-0"><?= esc_html($post_title); ?></h2>
                                        <span class="post-time"><?= $data_formatada ?></span>
                                    </div>
                                </article>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php
                wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>

</section>
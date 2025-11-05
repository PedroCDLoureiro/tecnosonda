<?php get_header(); ?>
<section id="page-search" class="search">
    <div id="banner" class="container-fluid bg-primary show-after after-top">
        <div id="top-page" class="container">
            <div class="row">
                <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                    <?php if ( have_posts() ) : ?>
                        <h1 class="text-white fw-bold mb-4">Resultados para a pesquisa: <span><?php echo get_search_query(); ?></span></h1>
                    <?php else : ?>
                        <h1 class="text-white fw-bold">Nenhum resultado encontrado.</h1>
                        <button type="button" class="mt-3 btn-voltar">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M199.7 299.8C189.4 312.4 190.2 330.9 201.9 342.6L329.9 470.6C339.1 479.8 352.8 482.5 364.8 477.5C376.8 472.5 384.6 460.9 384.6 447.9L384.6 191.9C384.6 179 376.8 167.3 364.8 162.3C352.8 157.3 339.1 160.1 329.9 169.2L201.9 297.2L199.7 299.6z"/></svg>    
                            Voltar
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if ( have_posts() ) : ?>
        <div id="todas-as-noticias" class="container-fluid bg-primary show-after section-category">
            <div class="container">
                <div class="row">
                    <?php while (have_posts()) : the_post();
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
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>
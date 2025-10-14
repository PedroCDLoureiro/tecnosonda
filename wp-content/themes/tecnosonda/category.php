<?php 
    get_header();
    $current_category = get_queried_object();    
?>

<section id="page-category" class="page">    
    <div id="banner" class="container-fluid bg-primary show-after after-top">
        <div id="top-page" class="container">
            <div class="row">
                <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                    <h1 class="text-white fw-bold mb-4"><?php single_cat_title(); ?></h1>
                    <div class="box-category">
                        <form id="search-notices" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <input type="search" name="s" placeholder="Pesquisar notícia" />
                            <input type="hidden" name="post_type" value="post" />
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#636363" d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                            </button>
                        </form>
                        <div class="d-flex mt-4 others-categories">
                            <?php
    
                            $categories = get_categories(array(
                                'exclude' => $current_category->term_id,
                                'orderby' => 'name',
                                'order' => 'ASC'
                            ));
    
                            foreach ($categories as $category) :
                                $link = esc_url(get_category_link($category->term_id));
                                $name = esc_html($category->name);
                            ?>
                                <a href="<?= $link; ?>" class="btn white-btn"><?= $name; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="todas-as-noticias" class="container-fluid bg-primary show-before section-category">
        <div class="container-fluid show-after">
            <div class="container">
                <?php if (have_posts()) : ?>
                    <div class="row">
                        <?php while (have_posts()) : the_post(); 
                            $post_id      = $post->ID;
                            $post_url     = get_the_permalink();
                            $post_title   = get_the_title();
                            $thumbnail    = get_the_post_thumbnail_url($post_id, 'full');
                            $data_formatada = get_the_date('d/m/Y');
                        ?>
                            <div class="col-3">
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
    
                <?php else : ?>
                    <p>Nenhum post encontrado nesta categoria.</p>
                <?php endif; ?>
    
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
<section id="nossos-servicos">
    <div class="container">
        <div class="row">
            <div class="col-6 title">
                <h2>Nossos <span>Serviços</span></h2>
                <p>Serviços entregados de engenharia</p>
            </div>
            <div class="col-6 controls-slider">
                <button id="prev-nossos-servicos">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M201.4 297.4C188.9 309.9 188.9 330.2 201.4 342.7L361.4 502.7C373.9 515.2 394.2 515.2 406.7 502.7C419.2 490.2 419.2 469.9 406.7 457.4L269.3 320L406.6 182.6C419.1 170.1 419.1 149.8 406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3L201.3 297.3z"/></svg>
                </button>
                <button id="next-nossos-servicos">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M439.1 297.4C451.6 309.9 451.6 330.2 439.1 342.7L279.1 502.7C266.6 515.2 246.3 515.2 233.8 502.7C221.3 490.2 221.3 469.9 233.8 457.4L371.2 320L233.9 182.6C221.4 170.1 221.4 149.8 233.9 137.3C246.4 124.8 266.7 124.8 279.2 137.3L439.2 297.3z"/></svg>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="slider-nossos-servicos">
            <div class="row row-items-servicos scroll-slider">
                <?php
                $args = [
                    'post_type'      => 'nossos_servicos',
                    'posts_per_page' => -1,
                ];
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $post_id   = get_the_ID();
                        $post_url  = get_the_permalink();
                        $thumbnail = get_the_post_thumbnail_url($post_id, 'full');
                        $title     = get_the_title();
                        $subtitle  = get_field('subtitulo_nossos_servicos');
                ?>
                        <!-- Item -->
                        <div class="item" data-id="<?= $post_id ?>">
                            <div class="left-title">
                                <h3><?= esc_html($title); ?></h3>
                            </div>
                            <div class="content-item">
                                <?php if ($thumbnail): ?>
                                    <img src="<?= esc_url($thumbnail); ?>" alt="<?= esc_attr($title); ?>">
                                <?php endif; ?>
                                <div class="titles">
                                    <h3><?= esc_html($title); ?></h3>
                                    <?php if ($subtitle): ?>
                                        <h4><?= esc_html($subtitle); ?></h4>
                                    <?php endif; ?>
                                </div>
                                <span class="btn saiba-mais">Saiba mais</span>
                            </div>
                        </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
    <div class="container py-3">
        <?php
        $query->rewind_posts();

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $post_id = get_the_ID();
                $subservicos = get_field('subservicos');
        ?>
                <!-- Conteúdo -->
                <div class="content-servico" data-id="<?= $post_id; ?>" style="display:none;">
                    <?php the_content(); ?>

                    <?php if (have_rows('subservicos')): ?>
                        <div class="subservicos py-3">
                            <div class="d-flex align-items-center justify-content-between top-subservicos mb-2">
                                <h2>Subserviços</h2>
                                <?php if($subservicos && count($subservicos) > 6) : ?>
                                    <div class="controls-slider">
                                        <button class="prev-subservicos" data-id="<?= $post_id; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M201.4 297.4C188.9 309.9 188.9 330.2 201.4 342.7L361.4 502.7C373.9 515.2 394.2 515.2 406.7 502.7C419.2 490.2 419.2 469.9 406.7 457.4L269.3 320L406.6 182.6C419.1 170.1 419.1 149.8 406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3L201.3 297.3z"/></svg>
                                        </button>
                                        <button class="next-subservicos" data-id="<?= $post_id; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M439.1 297.4C451.6 309.9 451.6 330.2 439.1 342.7L279.1 502.7C266.6 515.2 246.3 515.2 233.8 502.7C221.3 490.2 221.3 469.9 233.8 457.4L371.2 320L233.9 182.6C221.4 170.1 221.4 149.8 233.9 137.3C246.4 124.8 266.7 124.8 279.2 137.3L439.2 297.3z"/></svg>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="subservicos-wrapper scroll-slider" data-id="<?= $post_id; ?>">
                                <?php while (have_rows('subservicos')): the_row();
                                    $imagem = get_sub_field('imagem_subservico');
                                    $titulo = get_sub_field('titulo_subservico');
                                ?>
                                    <div class="subservico-item">
                                        <?php if ($imagem): ?>
                                            <img src="<?= esc_url($imagem); ?>" alt="<?= esc_attr($titulo); ?>" class="w-100">
                                        <?php endif; ?>
                                        <?php if ($titulo): ?>
                                            <h3><?= esc_html($titulo); ?></h3>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
</section>

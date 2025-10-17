<section id="nossos-servicos" class="bg-gray">
    <div id="title-controls" class="container d-flex justify-content-between">
        <div class="section-title">
            <h2>Nossos <span>Serviços</span></h2>
            <p>Serviços entregados de engenharia</p>
        </div>
        <div class="controls-slider">
            <button id="prev-nossos-servicos">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M201.4 297.4C188.9 309.9 188.9 330.2 201.4 342.7L361.4 502.7C373.9 515.2 394.2 515.2 406.7 502.7C419.2 490.2 419.2 469.9 406.7 457.4L269.3 320L406.6 182.6C419.1 170.1 419.1 149.8 406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3L201.3 297.3z"/></svg>
            </button>
            <button id="next-nossos-servicos">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M439.1 297.4C451.6 309.9 451.6 330.2 439.1 342.7L279.1 502.7C266.6 515.2 246.3 515.2 233.8 502.7C221.3 490.2 221.3 469.9 233.8 457.4L371.2 320L233.9 182.6C221.4 170.1 221.4 149.8 233.9 137.3C246.4 124.8 266.7 124.8 279.2 137.3L439.2 297.3z"/></svg>
            </button>
        </div>
    </div>
    <div class="container-fluid">
        <div id="slider-nossos-servicos">
            <div class="row row-items-servicos scroll-slider">
                <?php
                $args = [
                    'post_type'      => 'servicos',
                    'posts_per_page' => -1,
                ];
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $post_id   = get_the_ID();
                        $post_url  = get_the_permalink();
                        $thumbnail = get_the_post_thumbnail_url($post_id, 'full');
                        $title     = get_the_title();
                        $subtitle  = get_field('subtitulo_servico');
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
                $post_url  = get_the_permalink();
                $subservicos = get_field('subservicos');
                $cases = get_field('cases');
        ?>
                <!-- Conteúdo -->
                <div class="content-servico" data-id="<?= $post_id; ?>" style="display:none;">
                    <?php the_content(); ?>
                    <!-- Subserviços -->
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
                                    $thumbnail = get_sub_field('thumbnail_subservico');
                                    $titulo = get_sub_field('titulo_subservico');
                                ?>
                                    <div class="subservico-item">
                                        <?php if ($thumbnail): ?>
                                            <img src="<?= esc_url($thumbnail); ?>" alt="<?= esc_attr($titulo); ?>" class="w-100">
                                        <?php endif; ?>
                                        <?php if ($titulo): ?>
                                            <h3><?= esc_html($titulo); ?></h3>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Cases -->
                    <?php if (have_rows('cases')): ?>
                        <div class="cases py-3">
                            <div class="top-cases mb-4">
                                <h2>Cases</h2>
                            </div>
                            <div class="lista-cases" data-id="<?= $post_id; ?>">
                                <?php 
                                    $indice = 0; 
                                
                                    while (have_rows('cases')): the_row();
                                    $chapeu = get_sub_field('chapeu_case');
                                    $imagem = get_sub_field('imagem_case');
                                    $titulo = get_sub_field('titulo_case');
                                    $cidade = get_sub_field('cidade_case');
                                    $logo   = get_sub_field('logo_case');
                                ?>
                                    <div class="case-item" data-id="<?= $post_id; ?>" data-indice="<?= $indice; ?>">
                                        <img src="<?= esc_url($imagem); ?>" alt="<?= esc_attr($titulo); ?>" class="thumbnail w-100">
                                        <span class="chapeu-case"><?= $chapeu; ?></span>
                                        <div class="texts">
                                            <h3><?= esc_html($titulo); ?></h3>
                                            <div class="bottom-texts d-flex justify-content-between">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/></svg>
                                                    <?= esc_html($cidade); ?>
                                                </span>
                                                <img src="<?= esc_url($logo); ?>" alt="<?= esc_attr($titulo); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php $indice++; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (have_rows('cases')): ?>
                        <div class="caseModal modal scroll-slider" data-id="<?= $post_id; ?>">
                            <div class="modal-content">
                                <span class="close-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/></svg>
                                </span>
                                <div class="modal-body">
                                    <div class="items-slider small-arrows">
                                        <?php while (have_rows('cases')): the_row();
                                            $imagem = get_sub_field('imagem_case');
                                            $titulo = get_sub_field('titulo_case');
                                            $cidade = get_sub_field('cidade_case');
                                            $logo_modal = get_sub_field('logo_modal_case');
                                            $conteudo   = get_sub_field('conteudo_case');
                                        ?>
                                            <div class="slider-item">
                                                <img src="<?= esc_url($imagem); ?>" alt="<?= esc_attr($titulo); ?>" class="thumbnail w-100">
                                                <div class="texts">
                                                    <div class="d-flex flex-column">
                                                        <h3><?= esc_html($titulo); ?></h3>
                                                        <span class="d-flex align-items-center cidade">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#000" d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/></svg>
                                                            <?= esc_html($cidade); ?>
                                                        </span>
                                                        <span class="d-flex align-items-center mt-3 cliente">
                                                            Cliente: 
                                                            <img src="<?= esc_url($logo_modal); ?>" alt="<?= esc_attr($titulo); ?>">
                                                        </span>
                                                    </div>
                                                    <div class="conteudo-item">
                                                        <?= $conteudo; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-center mt-5 acessar-mais-infos">
                        <a href="<?= $post_url ?>" class="btn btn-large primary-btn">Acessar mais informações</a>
                    </div>
                </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
</section>

<section id="sobre-anos-mercados">
    <div class="container">
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'sobre_a_tecnosonda',
                'posts_per_page' => 1,
            );
            $query = new WP_Query($args);
            
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); 
                    $anos = get_field('anos');
                    $texto_topo = get_field('texto_topo');
                ?>
                    <div class="col-md-4 col-12 anos">
                        <div class="section-title white-title">
                            <h2>Sobre A <span>Tecnosonda</span></h2>
                        </div>
                        <p class="text-white mb-0 anos">+ de <span><?= $anos; ?></span> anos</p>
                        <p class="text-white mb-0">garantindo qualidade e segurança.</p>
                    </div>
                    <div class="col-md-5 offset-md-1 col-12 mercados-de-atuacao">
                        <?php if($texto_topo) : ?>
                            <p class="text-white mb-5">
                                <?= $texto_topo; ?>
                            </p>
                        <?php endif; ?>
                        <?php if (have_rows('mercados_de_atuacao')): ?>
                            <h3 class="mb-5">Mercados de <span>atuação</span></h3>
                            <div class="lista-mercados-de-atuacao">
                                    <?php 
                                        while (have_rows('mercados_de_atuacao')): the_row(); 
                                        $imagem_mercado_atuacao = get_sub_field("imagem_mercado_atuacao");
                                        $titulo_mercado_atuacao = get_sub_field("titulo_mercado_atuacao");
                                    ?>
                                        <div class="item">
                                            <img src="<?= esc_url($imagem_mercado_atuacao); ?>" alt="<?= esc_attr($titulo_mercado_atuacao); ?>" class="thumbnail w-100">
                                            <h3><?= $titulo_mercado_atuacao; ?></h3>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                        <?php endif; ?>
                    </div>
               <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</section>
<section id="nossos-valores">
    <div class="container">
        <div class="row">
            <?php 
                $query->rewind_posts(); 
                
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                    $post_id = get_the_ID();
                    $anos_de_experiencia = get_field('anos_de_experiencia');
                    $projetos_executados = get_field('projetos_executados');
                    $clientes_satisfeitos = get_field('clientes_satisfeitos');
                    $nossa_missao = get_field('nossa_missao');
                    $temos_como_visao = get_field('temos_como_visao');
            ?>
                <div class="col-12 mb-5 title">
                    <div class="section-title white-title">
                        <h2>Sobre A <span>Tecnosonda</span></h2>
                    </div>
                </div>
                <div class="col-12 mb-5 dados">
                    <h3 class="anos-experiencia">
                        +<?= $anos_de_experiencia ?>
                        <span>anos de <br> experiência</span>
                    </h3>
                    <h3 class="projetos-executados">
                        +<?= $projetos_executados ?>
                        <span>projetos <br> executados</span>
                    </h3>
                    <h3 class="clientes-satisfeitos">
                        +<?= $clientes_satisfeitos ?>
                        <span>clientes <br> satisfeitos</span>
                    </h3>
                </div>
                <div class="col-md-5 col-12 mb-5 missao-visao">
                    <div class="missao">
                        <h3>Nossa <span>missão</span></h3>
                        <?= $nossa_missao ?>
                    </div>
                    <div class="visao">
                        <h3>Temos como <span>visão</span></h3>
                        <?= $temos_como_visao ?>
                    </div>
                </div>
                <div class="col-md-7 col-12 mb-5 nossos-valores">
                    <?php if (have_rows('nossos_valores')): ?>
                        <div class="valores">
                            <h3 class="mb-4">Nossos <span>valores</span></h3>
                            <div class="lista-nossos-valores">
                                <?php 
                                    while (have_rows('nossos_valores')): the_row(); 
                                    $item_nossos_valores = get_sub_field("item_nossos_valores");
                                ?>
                                    <div class="d-flex align-items-center item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11.791" height="10.05" viewBox="0 0 11.791 10.05">
                                            <path id="icon_valores" data-name="Icon Valores" d="M119.075,1080.594v8.7c5.193,3.885,4.708,4.259,10.05.223v-6.351c-5.6,1.275-7.809-.182-10.049-2.574Z" transform="translate(-1080.594 129.125) rotate(-90)" fill="#cae098" fill-rule="evenodd"/>
                                        </svg>
                                        <h4 class="mb-0"><?= $item_nossos_valores; ?></h4>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12 midia">
                    <?php 
                    $midia = get_field('imagem_video'); 

                    if( $midia ):
                        if (strpos($midia['mime_type'], 'image') !== false): ?>
                            <img src="<?php echo esc_url($midia['url']); ?>" alt="<?php echo esc_attr($midia['alt']); ?>" class="img-fluid w-100" />
                        <?php
                        elseif (strpos($midia['mime_type'], 'video') !== false): ?>
                            <video id="video-nossos-valores" class="w-100">
                                <source src="<?php echo esc_url($midia['url']); ?>" type="<?php echo esc_attr($midia['mime_type']); ?>">
                                Seu navegador não suporta vídeos.
                            </video>
                            <button id="play-midia"></button>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_template_part('content/nossos-clientes'); ?>
<section id="sobre-noticias">
    <div class="container">
        <div class="row">
            <div class="col-6 section-title white-title">
                <h2>Sobre A <span>Tecnosonda</span></h2>
            </div>
            <div class="col-6 controls-slider">
                <button id="prev-sobre-noticias">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M201.4 297.4C188.9 309.9 188.9 330.2 201.4 342.7L361.4 502.7C373.9 515.2 394.2 515.2 406.7 502.7C419.2 490.2 419.2 469.9 406.7 457.4L269.3 320L406.6 182.6C419.1 170.1 419.1 149.8 406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3L201.3 297.3z"/></svg>
                </button>
                <button id="next-sobre-noticias">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M439.1 297.4C451.6 309.9 451.6 330.2 439.1 342.7L279.1 502.7C266.6 515.2 246.3 515.2 233.8 502.7C221.3 490.2 221.3 469.9 233.8 457.4L371.2 320L233.9 182.6C221.4 170.1 221.4 149.8 233.9 137.3C246.4 124.8 266.7 124.8 279.2 137.3L439.2 297.3z"/></svg>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="slider-sobre-noticias">
            <div class="row row-items-noticias scroll-slider">
                <?php
                $args = [
                    'post_type'      => 'post',
                    'posts_per_page' => -1,
                ];
                $query_posts = new WP_Query($args);

                if ($query_posts->have_posts()) :
                    while ($query_posts->have_posts()) : $query_posts->the_post();
                        $post_id   = get_the_ID();
                        $post_url  = get_the_permalink();
                        $thumbnail = get_the_post_thumbnail_url($post_id, 'full');
                        $title     = get_the_title();
                        $data      = get_the_date('d/m/Y');
                ?>
                        <!-- Item -->
                        <div class="item" data-id="<?= $post_id ?>">
                            <a href="<?= $post_url; ?>">
                                <div class="content-item">
                                    <?php if ($thumbnail): ?>
                                        <figure>
                                            <img src="<?= esc_url($thumbnail); ?>" alt="<?= esc_attr($title); ?>" class="w-100">
                                        </figure>
                                    <?php endif; ?>
                                    <div class="texts">
                                        <h3 class="mb-0"><?= esc_html($title); ?></h3>
                                        <span class="data-post"><?= $data; ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</section>
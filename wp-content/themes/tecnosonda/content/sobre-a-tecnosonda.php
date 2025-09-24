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
                            <h3 class="mb-4">Mercados de <span>atuação</span></h3>
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
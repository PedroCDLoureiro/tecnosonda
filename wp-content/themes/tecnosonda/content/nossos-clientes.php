<section id="nossos-clientes">
    <?php
    $args = [
        'post_type'      => 'nossos_clientes',
        'posts_per_page' => 1,
    ];
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $clientes  = get_field('clientes');
            $imagem_cliente  = get_sub_field('imagem_cliente');
            $nome_cliente  = get_sub_field('nome_cliente');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-6 section-title">
                <h2>Conheça Nossos <span>Clientes</span></h2>
            </div>
            <?php if($clientes && count($clientes) > 6) : ?>
                <div class="col-6 controls-slider">
                    <button id="prev-nossos-clientes" data-id="<?= $post_id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M201.4 297.4C188.9 309.9 188.9 330.2 201.4 342.7L361.4 502.7C373.9 515.2 394.2 515.2 406.7 502.7C419.2 490.2 419.2 469.9 406.7 457.4L269.3 320L406.6 182.6C419.1 170.1 419.1 149.8 406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3L201.3 297.3z"/></svg>
                    </button>
                    <button id="next-nossos-clientes" data-id="<?= $post_id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M439.1 297.4C451.6 309.9 451.6 330.2 439.1 342.7L279.1 502.7C266.6 515.2 246.3 515.2 233.8 502.7C221.3 490.2 221.3 469.9 233.8 457.4L371.2 320L233.9 182.6C221.4 170.1 221.4 149.8 233.9 137.3C246.4 124.8 266.7 124.8 279.2 137.3L439.2 297.3z"/></svg>
                    </button>
                </div>
            <?php endif; ?>
        </div>
        <div class="row row-items-nossos-clientes scroll-slider mt-5">
            <?php if (have_rows('clientes')): ?>
                <?php while (have_rows('clientes')): the_row();
                    $imagem_cliente = get_sub_field('imagem_cliente');
                    $nome_cliente = get_sub_field('nome_cliente');
                ?>
                    <div class="item">
                        <img src="<?= esc_url($imagem_cliente); ?>" alt="<?= esc_attr($nome_cliente); ?>" class="w-100">
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; endif; ?>
</section>
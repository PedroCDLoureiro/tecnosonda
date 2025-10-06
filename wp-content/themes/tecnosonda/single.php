<?php get_header(); ?>
<section id="single" class="sec-m">
    <div class="container">
        <div class="single-post-header">
            <a href="javascript:history.back()" class="btn-voltar"><i class="fa-solid fa-left-long"></i>Voltar</a>
            <a href="#" class="btn-compartilhar btn primary-button m-0" data-url="<?= get_permalink(); ?>" data-title="<?php the_title(); ?>"><i class="fa-solid fa-share-nodes"></i>Compartilhar</a>
        </div>
        
        <div class="single-post">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    
                    <div class="post-image">
                        <?php
                        if (has_post_thumbnail()) :
                            the_post_thumbnail('full');
                        endif;
                        ?>
                    </div>
                                        
                    <?php
                endwhile;
            else :
                echo '<p>Este post não foi encontrado.</p>';
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

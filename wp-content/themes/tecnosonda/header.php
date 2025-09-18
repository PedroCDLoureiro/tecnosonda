<?php
if (!defined('ABSPATH')) exit;
?>
<?php
// Garante que o WordPress está sendo carregado corretamente
if (!defined('ABSPATH')) exit; 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/sliders.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/main.min.js"></script>
<script>
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
    <?php wp_body_open(); ?>
<header>
    <div class="container">
       <div class="row">
            <div class="col-2 logo">
                <a href="<?= WP_URL ?>">
                    <img src="<?= WP_TEMPLATE ?>/assets/images/logo-tecnosonda-branca.png" alt="">
                </a>
            </div>
            <div class="col-10 menu-header">
                <a id="btn-header-orcamento" href="<?= WP_URL ?>/contato" class="btn transparent-btn">Solicite um orçamento</a>
                <?= do_shortcode('[gtranslate]'); ?>
                <div id="icon-search">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#ffffff" d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                </div>
                <div id="secondary-menu-header" style="display: none;">
                    <nav id="nav-desk" class="main-navigation">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'main_menu', 
                                'menu_class' => 'menu',
                            ));
                        ?>
                    </nav>
                    <a id="secondary-btn-header-orcamento" href="<?= WP_URL ?>/contato" class="btn secondary-btn">Solicite um orçamento</a>
                </div>
                <div id="icon-menu">
                    <span id="icon-menu-top"></span>
                    <span id="icon-menu-bottom"></span>
                </div>
            </div>
        </div> 
        <div id="div-search">
            <input type="text" name="search" id="input-search" placeholder="Buscar...">
        </div>
    </div>
</header>
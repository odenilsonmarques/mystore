<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta <?php bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <? wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="">
        <nav class="main-menu navbar navbar-expand-lg navbar-light py-2 fixed-top">
            <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">
                <!-- LOGO À ESQUERDA -->
                <a class="navbar-brand me-3 fw-bold" href="<?php echo home_url(); ?>">Loja Virtual
                    <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.webp" alt="Logo" height="40" class="d-inline-block align-text-top"> -->
                </a>

                <!-- BOTÃO TOGGLE PARA MOBILE -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- FORMULÁRIO DE BUSCA -->
                <form role="search" method="get" class="d-flex flex-grow-1 mx-3 pt-3" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="input-group">
                        <input type="search" class="form-control custom-busca-borda" placeholder="Buscar produtos..." value="<?php echo get_search_query(); ?>" name="s" />
                        <button class="btn btn-outline-secondary btn-custom-buscar" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.397h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.242 1.156a5 5 0 1 1 0-10 5 5 0 0 1 0 10z" />
                            </svg>
                        </button>
                    </div>
                    <input type="hidden" name="post_type" value="product" />
                </form>

                <!-- MENU À DIREITA -->
                <div class="collapse navbar-collapse flex-grow-0 justify-content-end" id="navbarNav">
                    <ul class="navbar-nav main-menu d-flex align-items-center">
                        <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'top_menu',
                            'container'       => false,
                            'menu_class'      => 'navbar-nav',
                            'fallback_cb'     => '__return_false',
                            'items_wrap'      => '%3$s',
                        ));
                        ?>

                        <?php if (is_user_logged_in()) : ?>
                            <li class="nav-item d-flex align-items-center">

                                <a class="" href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                    Minha Conta
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center gap-1">
                                <a class="" href="<?php echo esc_url(wp_logout_url(home_url())); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                    </svg>
                                    Sair
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="" href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg>
                                    Entrar
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>

                    <!-- <li class="nav-item list-unstyled ms-3">
                        <a href="#" class="btn btn-custom fw-bold border-0 text-white">Entrar em Contato</a>
                    </li> -->


                </div>
            </div>
        </nav>
    </header>

    <!-- essas tag estao sendo fechadas no footer.php -->
    <main class="container mt-5 pt-5">
        <div class="row">

        
        
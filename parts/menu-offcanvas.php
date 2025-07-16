<div class="offcanvas offcanvas-end" id="offcanvasNavbar" tabindex="-1" aria-labelledby="offcanvasNavbarLabel" style="background-color:#b4d518;">
    <div class="offcanvas-header" style="background-color: #565b68;">
        <a class="navbar-brand me-3 fw-bold text-light" href="<?php echo home_url(); ?>">Loja Virtual</a>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    

    <div class="offcanvas-body">
        <?php
        wp_nav_menu([
            'theme_location' => 'top_menu',
            'container' => false,
            'menu_class' => 'navbar-nav main-menu-mobile d-flex flex-column',
            'fallback_cb' => '__return_false',
        ]);
        ?>

        <ul class="navbar-nav">
            <?php if (is_user_logged_in()) : ?>
                <li class="nav-item">
                    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="nav-link">
                        <i class="bi bi-person-circle"></i> Minha Conta
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="nav-link">
                        <i class="bi bi-box-arrow-right"></i> Sair
                    </a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="nav-link">
                        <i class="bi bi-person-fill"></i> Entrar
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
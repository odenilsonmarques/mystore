</div>
</main>
<footer class="bg-dark text-light pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row">

            <!-- coluna 1 -->
            <div class="col-md mb-4">
                <h6 class="text-uppercase"><?php echo get_theme_mod('title_footer_column_1', 'Loja Virtual'); ?></h6>
                <p class="small w-75">
                    <?php echo get_theme_mod('footer_col1_description', 'Produtos selecionados com carinho para você. Qualidade, confiança e entrega rápida.'); ?>
                </p>
                <!--  -->
                <div class="d-flex gap-2">
                    <a href="#"><i class="bi bi-facebook text-light"></i></a>
                    <a href="#"><i class="bi bi-instagram text-light"></i></a>
                    <a href="#"><i class="bi bi-whatsapp text-light"></i></a>
                </div>
            </div>

            <!-- coluna 2 -->
            <div class="col-md mb-4">
                <h6 class="text-uppercase"><?php echo get_theme_mod('title_footer_column_2', 'Links'); ?></h6>
                <ul class="list-unstyled nav-menu-footer small ms-0 text-decoration-none text-white">
                    <?php
                    $menuParameters = array(
                        'theme_location'  => 'footer_2',
                        'echo'            => false,
                        'fallback_cb'       => 'wp_list_pages',
                        'depth'           => 2,
                        'items_wrap'      => '%3$s',

                    );
                    echo wp_nav_menu($menuParameters);
                    ?>
                </ul>
            </div>

            <!-- Coluna 3-->
            <div class="col-md mb-4">
                <h6 class="text-uppercase">
                    <?php echo get_theme_mod('title_footer_column_3', 'Atendimento'); ?>
                </h6>
                <p class="small mb-1">
                    <i class="bi bi-envelope-fill me-1"></i>
                    <?php echo get_theme_mod('footer_col3_email', 'contato@loja.com.br'); ?>
                </p>
                <p class="small mb-1">
                    <i class="bi bi-whatsapp me-1"></i>
                    <?php echo get_theme_mod('footer_col3_whatsapp', '(11) 99999-9999'); ?>
                </p>
                <p class="small mb-0">
                    <?php echo get_theme_mod('footer_col3_horario', 'Seg a Sex – 9h às 18h'); ?>
                </p>
            </div>

            <!-- coluna 4 -->
            <!-- <div class="col-md-3 mb-4">
                <h6 class="text-uppercase"><?php echo get_theme_mod('title_footer_column_4', 'Links'); ?></h6>
                <ul class="list-unstyled small ms-0 text-decoration-none text-white">
                    <?php
                    $menuParameters = array(
                        'theme_location'  => 'footer_2',
                        'echo'            => false,
                        'fallback_cb'       => 'wp_list_pages',
                        'depth'           => 2,
                        'items_wrap'      => '%3$s',
                    );
                    echo wp_nav_menu($menuParameters);
                    ?>
                </ul>
            </div> -->
        </div>

        <hr class="border-secondary">

        <div class="text-center small text-muted">
            © <?php echo date('Y'); ?> Loja Virtual – Todos os direitos reservados.
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
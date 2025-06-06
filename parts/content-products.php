<section class="products">
    <div class="container">

        <div class="row">
            <?php wc_print_notices(); ?>
            <!-- <h3 class="py-4">Todos os Produtos</h3> -->

            <!-- Botões para filtrar por categoria-->
            <div class="mb-4 text-center mt-4">
                <button class="btn btn-category filter-btn active  me-1" data-category="all">Todos</button>
                <?php
                $categories = get_terms(array(
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => true,
                ));

                foreach ($categories as $category) {
                    echo '<button class="btn btn-category filter-btn me-2 fs-6" data-category="' . $category->term_id . '" 
                onmouseover="console.log(\'Categoria: ' . $category->name . ' (ID: ' . $category->term_id . ')\')">
                ' . $category->name . '
              </button>';
                }
                ?>
            </div>
        </div>


        <!-- Loop para exibir os produtos -->
        <div class="row mt-2" id="product-list">
            <?php
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => -1, // Todos os produtos
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    global $product;
            ?>
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                           
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                                <?php else : ?>
                                    <img src="<?php echo wc_placeholder_img_src(); ?>" class="card-img-top" alt="Imagem padrão">
                                <?php endif; ?>
                            </a>
                            <div class="card-body text-center">
                                <h6 class="card-title"><?php the_title(); ?></h6>
                                <p class="text-primary fw-bold"><?php echo wc_price($product->get_price()); ?></p>

                                <!-- Exibir categorias do produto -->
                                <p class="text-muted small">
                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'product_cat');
                                    if ($terms && !is_wp_error($terms)) {
                                        $category_links = array();
                                        foreach ($terms as $term) {
                                            $category_links[] = '<a href="' . get_term_link($term) . '" class="text-decoration-none text-dark fw-bold">' . $term->name . '</a>';
                                        }
                                        // echo implode(', ', $category_links);
                                    }
                                    ?>
                                </p>

                                <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="btn btn-sm btn-primary">
                                    Adicionar ao Carrinho
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-center">Nenhum produto encontrado.</p>';
            endif;
            ?>
        </div>
    </div>
</section>
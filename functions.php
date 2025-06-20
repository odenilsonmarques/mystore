<?php

function load_scripts()
{

    // Carregar o CSS do tema pai (Storefront)
    // O parâmetro 'storefront-style' é o identificador do CSS do tema pai.
    wp_enqueue_style('storefront-parent-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');

    // Carregar o CSS do tema filho. O parametro array('storefront-parent-style') é para garantir que o CSS do tema pai seja carregado antes do CSS do tema filho.
    //Assim, qualquer personalização que você fizer no CSS do tema filho irá sobrescrever corretamente o do Storefront.
    wp_enqueue_style('storefront-child-style', get_stylesheet_directory_uri() . '/style.css', array('storefront-parent-style'), '1.0', 'all');

    // usamos o get_stylesheet_directory_uri() para pegar o diretório do tema filho e concatenamos com /assets/css/bootstrap.min.css para pegar o arquivo CSS do Bootstrap.
    wp_enqueue_style('bootstrap-min-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0.2', 'all');
    wp_enqueue_script('bootstrap-min-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '5.0.2', 'all', true);
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css');

    wp_enqueue_script('script-ajax', get_stylesheet_directory_uri() . '/assets/js/script-ajax.js', array(), true);
}
add_action('wp_enqueue_scripts', 'load_scripts');


//Remove o sidebar padrão do tema pai Storefront
function remove_storefront_sidebar()
{
    remove_action('storefront_sidebar', 'storefront_get_sidebar', 10);
}
add_action('get_header', 'remove_storefront_sidebar');


register_nav_menus(array(

    'top_menu' => __('Top Menu'),
    'footer_1' => __('Rodapé coluna 1'),
    'footer_2' => __('Rodapé coluna 2'),
    'footer_3' => __('Rodapé coluna 3'),
    'footer_4' => __('Rodapé coluna 4'),
));

// add_action('init', 'register_nab_menus');
add_action('customize_register', 'theme_customizer');
function theme_customizer($wp_customize)
{
    // Cria a seção no Customizer
    $wp_customize->add_section('footer_settings_section', array(
        'title'       => __('Configurações do Rodapé'),
        'priority'    => 30,
        'description' => 'Altere os títulos das colunas do rodapé',
    ));


    // coluna 1
    $wp_customize->add_setting('title_footer_column_1');
    $wp_customize->add_control('title_footer_column_1', array(
        'label'   => 'Título Coluna 1',
        'section' => 'footer_settings_section',
        'type'    => 'text',
    ));

    // Descrição da Coluna 1
    $wp_customize->add_setting('footer_col1_description');
    $wp_customize->add_control('footer_col1_description', array(
        'label' => 'Descrição Coluna 1',
        'section' => 'footer_settings_section',
        'type' => 'textarea',
    ));

    // coluna 2
    $wp_customize->add_setting('title_footer_column_2');
    $wp_customize->add_control('title_footer_column_2', array(
        'label'   => 'Título Coluna 2',
        'section' => 'footer_settings_section',
        'type'    => 'text',

    ));

    // coluna 3
    $wp_customize->add_setting('title_footer_column_3');
    $wp_customize->add_control('title_footer_column_3', array(
        'label'   => 'Título Coluna 3',
        'section' => 'footer_settings_section',
        'type'    => 'text',
    ));

    // Atendimento - Email
    $wp_customize->add_setting('footer_col3_email');
    $wp_customize->add_control('footer_col3_email', array(
        'label' => 'Email de Atendimento',
        'section' => 'footer_settings_section',
        'type' => 'text',
    ));

    // Atendimento - WhatsApp
    $wp_customize->add_setting('footer_col3_whatsapp');
    $wp_customize->add_control('footer_col3_whatsapp', array(
        'label' => 'WhatsApp de Atendimento',
        'section' => 'footer_settings_section',
        'type' => 'text',
    ));

    // Atendimento - Horário
    $wp_customize->add_setting('footer_col3_horario');
    $wp_customize->add_control('footer_col3_horario', array(
        'label' => 'Horário de Atendimento',
        'section' => 'footer_settings_section',
        'type' => 'text',
    ));

    // coluna 4
    $wp_customize->add_setting('title_footer_column_4');
    $wp_customize->add_control('title_footer_column_4', array(
        'label'   => 'Título Coluna 4',
        'section' => 'footer_settings_section',
        'type'    => 'text',

    ));
}

















// este código para tratar a requisição AJAX e buscar os produtos da categoria selecionada:
function filter_products()
{
    $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
    );

    if ($category_id && $category_id !== "all") {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $category_id,
            ),
        );
    }

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

    wp_die(); // Importante para o AJAX
}

add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');


// esse código  garante que o JS tenha acesso à URL do AJAX
function pass_ajax_url_to_script()
{
    wp_localize_script('jquery', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'pass_ajax_url_to_script');





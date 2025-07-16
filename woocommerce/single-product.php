<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */



defined('ABSPATH') || exit;
get_header();

?>

<div class="container">

	<div class="row">
		<p class="mt-2"><?php wc_print_notices(); ?></p>

		<!-- Coluna da esquerda: título, referência, avaliação, detalhes -->
		<div class="col-md-3 mt-4 details-bg rounded-3">
			<h3 class="product_title mt-4 mt-md-2 fw-bold"><?php the_title(); ?></h3>

			<p class="text-dark"><strong>Referência:</strong> <?php echo get_post_meta(get_the_ID(), '_sku', true); ?></p>

			<?php
			global $product;
			if (! is_a($product, 'WC_Product')) {
				$product = wc_get_product(get_the_ID());
			}
			woocommerce_template_single_rating();
			?>

			<div class="product-meta" style="margin-top: -15px;">
				<p class="text-dark"><strong>Categoria:</strong> <?php echo wc_get_product_category_list(get_the_ID()); ?></p>
				<!-- <p><strong>Tags:</strong> <?php echo wc_get_product_tag_list(get_the_ID()); ?></p> -->
			</div>
			<p class="text-dark" style="margin-top: -15px; margin-bottom:1px"><strong>Descrição:</strong><?php the_excerpt(); ?></p>
		</div>

		<!-- Coluna do meio: imagem principal e galeria -->
		<div class="col-md-6 mt-4 rounded-3 text-center">
			<div class="d-flex product-gallery-wrapper rounded-3 bg-ligth border ps-5 pe-5 pt-4 shadow">
				<?php woocommerce_show_product_images(); ?>
			</div>
		</div>

		<!-- Coluna da direita: preço, variações, botão de comprar -->
		<div class="col-md-3 mt-4 details-bg rounded-3 ml-3">
			<div class="mt-2 ">
				<span class="fw-bolder fs-5 text-dark"><?php woocommerce_template_single_price(); ?></span>
			</div>

			<div class="mt-2">
				<?php woocommerce_template_single_add_to_cart(); ?>
			</div>

			<div class="mt-3">
				<small class="text-muted">Vendido e entregue por <?php echo get_bloginfo('name'); ?></small>
			</div>
		</div>
	</div>
</div>

<?php
get_footer('shop');
?>

<style>
	/* Esconde apenas o ícone da lupa, mantendo o zoom/lightbox */
	.woocommerce div.product div.images .woocommerce-product-gallery__trigger {
		display: none !important;
	}
</style>
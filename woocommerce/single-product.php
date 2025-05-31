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
		<?php wc_print_notices(); ?>

		<!-- Coluna da esquerda: título, referência, avaliação, detalhes -->
		<div class="col-md-3 border mt-2">
			<h1 class="product_title mt-2"><?php the_title(); ?></h1>
			<p><strong>Referência:</strong> <?php echo get_post_meta(get_the_ID(), '_sku', true); ?></p>

			<?php
			global $product;

			if (! is_a($product, 'WC_Product')) {
				$product = wc_get_product(get_the_ID());
			}

			woocommerce_template_single_rating();
			?>


			<div class="product-meta mt-2">
				<p><strong>Categoria:</strong> <?php echo wc_get_product_category_list(get_the_ID()); ?></p>
				<p><strong>Tags:</strong> <?php echo wc_get_product_tag_list(get_the_ID()); ?></p>
			</div>

			<?php the_excerpt(); ?>
		</div>

		<!-- Coluna do meio: imagem principal e galeria -->
		<div class="col-md-5 border mt-2">
			<div class="d-flex align-items-start product-gallery-wrapper mt-2">
				<?php woocommerce_show_product_images(); ?>
			</div>
		</div>



		<!-- Coluna da direita: preço, variações, botão de comprar -->
		<div class="col-md-4 border mt-2">
			<div class="mt-2">
				<?php woocommerce_template_single_price(); ?>
			</div>

			<div class="mt-2">
				<?php woocommerce_template_single_add_to_cart(); ?>
			</div>

			<div class="mt-3">
				<small class="text-muted">Vendido e entregue por sua loja</small>
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
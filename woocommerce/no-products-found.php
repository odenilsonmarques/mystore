<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="woocommerce-notice woocommerce-info" style="text-align: center; padding: 30px;">
    <p style="font-size: 18px; margin-bottom: 10px;">Ops! Não encontramos nenhum item para sua busca.</p>
    <p style="margin-bottom: 20px;">Tente outro termo ou volte para a página inicial.</p>
    <a href="<?php echo esc_url( home_url() ); ?>" style="display: inline-block; padding: 10px 20px; background-color: #b4d518; color: #fff; border-radius: 6px; text-decoration: none;">Ir para a página inicial</a>
</div>

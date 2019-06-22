<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( $woocommerce_loop['columns'] == 4):
	$classes[] = 'col-md-3 bottom-30';
else:
	$classes[] = 'col-md-4 bottom-30';
endif;
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<li <?php post_class( $classes ); ?>>
	
	<div class="product-item-area">
		<div class="product-item">

			<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

			<div class="product-images">
				<div class="product-mark">
					<div class="product-mark-inner">
						<div class="product-mark-inner-content">
							<a href="<?php the_permalink();?>"><?php _e('Quick view','erange');?></a>
						</div><!-- // .product-mark-inner-content -->
					</div><!-- // .product-mark-inner -->
				</div><!-- // .product-mark -->

				<?php echo get_the_post_thumbnail($post->ID,'shop_catalog',array('class'	=> 'front-end img-responsive')); ?>
				
				<?php if(erange_second_product_image()): ?>
				<img class="back-end img-responsive" src="<?php echo erange_second_product_image(); ?>" alt="" />
				<?php else: ?>
				<?php echo get_the_post_thumbnail($post->ID,'shop_catalog',array('class'	=> 'back-end img-responsive')); ?>
				<?php endif; ?>

			</div><!-- // .product-images -->

			<div class="product-info">
				<div class="product-title-area clearfix">
					<h4 class="product-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>

					<?php if ( $price_html = $product->get_price_html() ) : ?>
					<span class="product-price"><?php echo $price_html; ?></span>
					<?php endif; ?>

				</div><!-- // .product-title -->
				<div class="product-action clearfix">

					<?php
						echo apply_filters( 'woocommerce_loop_add_to_cart_link',
							sprintf( '<span class="addtocart"><a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s product_type_%s"><i class="fa fa-shopping-cart icon-left"></i>%s</a></span>',
								esc_url( $product->add_to_cart_url() ),
								esc_attr( $product->id ),
								esc_attr( $product->get_sku() ),
								$product->is_purchasable() ? 'add_to_cart_button' : '',
								esc_attr( $product->product_type ),
								esc_html( $product->add_to_cart_text() )
							),
						$product );
					?>
					<!-- <span class="like"><a href="#"><i class="fa fa-heart-o"></i></a></span> -->
					<!-- <span class="compare"><a href="#"><i class="fa fa-exchange"></i></a></span> -->
				</div><!-- // .product-action -->

			</div><!-- // .product-info -->

			<?php //do_action( 'woocommerce_after_shop_loop_item' ); ?>

		</div><!-- // .product-item -->
	</div>

</li>
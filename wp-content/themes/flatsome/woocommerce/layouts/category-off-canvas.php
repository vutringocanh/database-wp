<div class="row category-page-row">

		<div class="col large-12">
		<?php
			 do_action('flatsome_products_before');

			/**
			 * woocommerce_before_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>

		<div class="clearfix" style="margin-bottom: 30px">
			<?php do_action( 'woocommerce_archive_description' ); ?>
		</div>

		<?php if ( have_posts() ) : ?>

			<?php
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

			<?php
			$product_categories = get_categories(array(
				'parent'       => get_queried_object_id(),
				'menu_order'   => 'ASC',
				'hide_empty'   => 0,
				'hierarchical' => 1,
				'taxonomy'     => 'product_cat',
				'pad_counts'   => 1,
			));
			if (empty($product_categories)) {
				while ( have_posts() ) : the_post();
					wc_get_template_part( 'content', 'product' );
				endwhile; // end of the loop.
			}
			else {
				foreach ( $product_categories as $category ): ?>
					<div class="product-archive-header">
						<div class="clearfix vi-header">
							<h3 class="vi-left-title pull-left"><a href="<?php echo get_category_link( $category ) ?>"><?php echo $category->name ?></a></h3>
							<div class="vi-right-link pull-right">
								<a class="vi-more" href="<?php echo get_category_link( $category ) ?>">Xem tất cả</a>
							</div>
						</div>
					</div>
					<?php
					query_posts( array(
						'post_type' => 'product',
						'posts_per_page' => -1,
						'product_cat' => $category->slug,
						'tax_query' => array( array( 'taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => $category->slug, 'include_children' => false  ) )
					) );
					if (have_posts()) while ( have_posts() ) : the_post();
						wc_get_template_part( 'content', 'product' );
					endwhile; // end of the loop.
					wp_reset_query();
					endforeach;
			}
			?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

		<?php
			 do_action('flatsome_products_after');
			/**
			 * woocommerce_after_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

		</div><!-- col-fit  -->

		<div id="shop-sidebar" class="mfp-hide">
			<div class="sidebar-inner">
				<?php
				  $no_widgets_msg = '<p>You need to assign Widgets to <strong>"Shop Sidebar"</strong> in <a href="'.get_site_url().'/wp-admin/widgets.php">Appearance > Widgets</a> to show anything here</p>';
				  if(is_active_sidebar('shop-sidebar')) { dynamic_sidebar('shop-sidebar'); } else{ echo $no_widgets_msg; }
				?>
			</div><!-- .sidebar-inner -->
		</div><!-- large-3 -->
</div>

<?php 

$class1 = $class2 = '';

if( is_page() || is_single() || is_singular('product' )):

	if(rwmb_meta('erange_heading_bg')):

		$out = '';
		$heading_images = rwmb_meta( 'erange_heading_bg', 'type=file' );
	    foreach ( $heading_images as $img ) {
	    	if($img['url'] != '')
	    	$out =  $img['url'];
	    };

	    $class1 = ' bg '.rwmb_meta('erange_heading_bg_repeat');
	    $class2 = ' data-bg="'.$out.'"';

	endif;
endif;
?>

<div class="heading bottom-40 section<?php echo $class1;?>"<?php echo $class2;?>>
	<div class="container">
		<h2 class="heading-title bottom-0">
			<?php
				if( is_home() ) :
					printf( __( 'Homepage', 'erange' ));
				elseif ( is_404() ):
					printf( __( 'Content not found', 'erange' ) );
				elseif ( is_day() ) :
					printf( __( 'Daily Archives: %s', 'erange' ), get_the_date() );
				elseif ( is_month() ) :
					printf( __( 'Monthly Archives: %s', 'erange' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'erange' ) ) );
				elseif ( is_year() ) :
					printf( __( 'Yearly Archives: %s', 'erange' ), get_the_date( _x( 'Y', 'yearly archives date format', 'erange' ) ) );
				elseif ( is_singular() ) :
					echo rwmb_meta('erange_custom_heading_title') ? rwmb_meta('erange_custom_heading_title') : the_title('', '', $echo = false ) ;
				elseif ( is_category() ) :
					printf( __( 'Category Archives: %s', 'erange' ), single_cat_title( '', false ) );
				elseif ( is_tag() ) :
					printf( __( 'Tag Archives: %s', 'erange' ), single_tag_title( '', false ) );
				elseif ( is_search() ) :
					printf( __( 'Search Results for: %s', 'erange' ), get_search_query() );
				elseif ( is_tax() ) :
					printf( __( '%s', 'erange' ), single_cat_title( '', false ) );
				else :
					_e( 'Archives', 'erange' );
				endif;
			?>
		</h2>
	</div><!-- // .container -->
	
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="breacrumb">
					<?php erange_breadcrumb(); ?>
				</div><!-- // .breadcrumb -->
			</div>
			<div class="col-md-6 col-xs-12">
				
				<?php 
					if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )
					get_template_part( 'woocommerce/loop/orderby' ); 
				?>
				
				<?php if(is_page()): if(rwmb_meta('erange_portfolio_enable_filter') == 1 && is_page_template('page-portfolio-filter.php')):?>
				<div class="option-list pull-right">
					<ul class="sf-menu">
						<li>
							<span class="title"><?php _e('Select Portfolio Type','erange');?> <i class="fa fa-chevron-down"></i></span>
							<ul class="list-unstyled option-set" id="options" data-option-key="filter">
								<li><a class="selected" data-title="Portfolio" href="#filter" data-option-value="*">All <span class="count">12</span></a></li>
								<?php
									$terms = get_terms('portfolio_category');
									if($terms) {
									    foreach ( $terms as $term ) {
									       echo '<li><a class="round" data-title="'. $term->name .'" data-option-value=".'.$term->slug.'" href="#filter">' . $term->name . '<span class="count">'.erange_term_post_count('portfolio',$term->slug).'</span></a></li>';
									    }
									}
								?>
							</ul>
						</li>
					</ul><!-- .sf-menu -->
				</div><!-- // .option-list -->

				<div class="option-list pull-right hidden-xs hidden-sm">
					<ul class="sf-menu">
						<li>
							<span class="title"><?php _e('Select Portfolio Width','erange');?> <i class="fa fa-chevron-down"></i></span>
							<ul class="list-unstyled option-portfolio" id="layout-changes">
								<li><span data-width="6">2 Columns</span></li>
								<li><span data-width="4">3 Columns</span></li>
								<li><span class="selected" data-width="3">4 Columns</span></li>
							</ul>
						</li>
					</ul><!-- .sf-menu -->
				</div><!-- // .option-list -->
				<?php endif; endif;?>
			</div>
		</div>
		
	</div><!-- // .container -->
	
</div><!-- // .heading -->
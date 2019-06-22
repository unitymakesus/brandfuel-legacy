<?php 
/**
 * The template for displaying sidebar widgets for blog.
 *
 * @author 		EverisLabs
 * @package 	Erange
 * @version     1.0
 */
?>
<div id="sidebar" class="sidebar col-md-4 top-sm-30">
	<div class="sidebar-content">
	<?php 
		if(is_page()):
			dynamic_sidebar(rwmb_meta('erange_page_sidebar_widget'));
		else:
			dynamic_sidebar( 'default-sidebar' );
		endif;
	?>
	</div>
</div>
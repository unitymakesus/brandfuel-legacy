<?php 
/**
 * The template for displaying 404 page content.
 *
 * @author 		EverisLabs
 * @package 	Erange
 * @version     1.0
 */

get_header();
?>

<div class="container top-30" >
	
		
		<div id="content" class="bottom-sm-30">

			<div class="text-center">
				<span class="fof"><?php _e('404','erange');?></span>
				
				<span class="top-30"><?php _e('The page your are looking for is not avaiable. Please search another','erange');?></span>

				<div class="serch-form top-30">
		            <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		            	<span class="field">
		              		<input class="header-search-input" placeholder="<?php _e('Type to search...','erange');?>" type="text" value="" name="s" id="s"/>
		            	</span>
		              	<span class="field">
		              		<input class="button form" type="submit" id="go" value="<?php _e('Search','erange');?>">
		          		</span>
		            </form><!-- // #searchform -->
		      	</div><!-- // .header-search -->
		    </div><!-- .text-center -->

		</div><!-- // #content -->

</div><!-- // .container -->

<?php
get_footer();
?>
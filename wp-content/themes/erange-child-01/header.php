<?php
if (get_theme_mod('media_logo_retina')):
	$logo_size = getimagesize(do_shortcode(get_theme_mod('media_logo_retina')));
endif;
if(is_front_page()){
	$logo_wrap = 'h1';
} else {
	$logo_wrap = 'p';
};

$class_img = 'no-bg';
$link_img = '';

if ( ! empty($post) && is_a($post, 'WP_Post') ):
if(rwmb_meta('erange_header_bg')):

	$out = '';
	$header_images = rwmb_meta( 'erange_header_bg', 'type=file' );
    foreach ( $header_images as $img ) {
    	if($img['url'] != '')
    	$out =  $img['url'];
    };

    $link_img = ' data-bg="'.$out.'"';
    $class_img = 'section';

endif;endif;

?>
<!DOCTYPE html>
<html>
<head <?php language_attributes(); ?>>
<!--<meta http-equiv="x-ua-compatible" content="IE=edge">-->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if(is_front_page() ) { ?>
<meta name="keywords" content="Promotional Branding Branded Promo products giveaways swag stuff trade show company stores print t-shirt tee  imprint events event logoed apparel screenprinting embossing gifts shwag schwag">
<?php } ?>
<title><?php wp_title( '|', true, 'right' );?></title>

<!-- Favicons -->
<?php if(get_theme_mod('media_favicon') != "") { ?>
<link rel="shortcut icon" href="<?php echo do_shortcode(get_theme_mod('media_favicon')); ?>">
<?php } ?>
<?php if(get_theme_mod('media_favicon_iphone') != "") { ?>
<link rel="apple-touch-icon" href="<?php echo do_shortcode(get_theme_mod('media_favicon_iphone')); ?>">
<?php } ?>
<?php if(get_theme_mod('media_favicon_iphone_retina') != "") { ?>
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo do_shortcode(get_theme_mod('media_favicon_iphone_retina')); ?>">
<?php } ?>
<?php if(get_theme_mod('media_favicon_ipad') != "") { ?>
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo do_shortcode(get_theme_mod('media_favicon_ipad')); ?>">
<?php } ?>
<?php if(get_theme_mod('media_favicon_ipad_retina') != "") { ?>
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo do_shortcode(get_theme_mod('media_favicon_ipad_retina')); ?>">
<?php } ?>
<?php echo get_theme_mod('textarea_trackingcode') ? get_theme_mod('textarea_trackingcode') : '' ;?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.min.js"></script>
    <script src="//respond.js"></script>
  <![endif]-->

<!-- WordPress -->
<?php wp_head(); ?>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
jQuery(document).ready(function($){
  //jQuery("li#menu-item-1196 a").attr("href", "#mm-m0-p1");
  //jQuery("li#menu-item-1196 a").removeClass("sf-with-ul");
  //jQuery("li#menu-item-1196 a").addClass("mm-subopen");
});
</script>
</head>

<body <?php body_class();?>>
<div id="wrap" <?php layout_class();?>>

	<header id="header" class="<?php echo $class_img;?>" <?php echo $link_img;?>>

		<div class="topheader">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12 text-sm-center">
						<div class="contactblock">
							<?php echo get_theme_mod('text_callus');?>
						</div>
					</div><!-- // end column -->

					<div class="col-md-6 col-sm-6 text-sm-center hidden-xs hidden-sm">
						<div class="topsocial">

<a href=https://www.zoomcats.com/catalog/brand-fuel-holiday-look-book#/1/" class="products-with-soul" style="position:relative;left:0px;">Products With Soul</a><a href="https://www.promoplace.com/brandfuel" class="search-product" style="position:relative;left:10px;">Search More Products</a>
	<ul class="list-unstyled bottom-0 social border">
<?php if(get_theme_mod('social_facebook')!= "") { ?><li class="facebook"><a target="_blank" href="<?php echo get_theme_mod('social_facebook'); ?>" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a></li><?php } ?>
<?php if(get_theme_mod('social_twitter') != "") { ?><li class="twitter"><a target="_blank" href="https://twitter.com/<?php echo get_theme_mod('social_twitter'); ?>" data-toggle="tooltip" data-placement="bottom" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a></li><?php } ?>
 <?php if(get_theme_mod('social_linkedin')!= "") { ?><li class="linkedin"><a target="_blank" href="<?php echo get_theme_mod('social_linkedin'); ?>" data-toggle="tooltip" data-placement="bottom" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li><?php } ?>
 <?php if(get_theme_mod('social_youtube')!= "") { ?><li class="youtube"><a target="_blank" href="<?php echo get_theme_mod('social_youtube'); ?>" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a></li><?php } ?>
<!--<li class="spotify"><a href="https://play.spotify.com/user/dannyrosin/playlist/6prBVvGzbOnTY2hEOTGomO?play=true&utm_source=open.spotify.com&utm_medium=open" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Spotify"><i class="fa fa-spotify"></i></a></li>-->
<li class="spotify"><a href="https://play.spotify.com/user/dannyrosin/playlist/6prBVvGzbOnTY2hEOTGomO?play=true&utm_source=open.spotify.com&utm_medium=open" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Spotify"><img src="//www.brandfuel.com/wp-content/uploads/2014/06/Spotify.png" runat="server" width="24" /></a></li>
            <?php if(get_theme_mod('social_google')!= "") { ?><li class="googleplus"><a target="_blank" href="<?php echo get_theme_mod('social_google'); ?>" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a></li><?php } ?>
					            <?php if(get_theme_mod('social_pinterest')!= "") { ?><li class="pinterest"><a target="_blank" href="<?php echo get_theme_mod('social_pinterest'); ?>" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a></li><?php } ?>
					            <?php if(get_theme_mod('social_dribbble')!= "") { ?><li class="dribbble"><a target="_blank" href="<?php echo get_theme_mod('social_dribbble'); ?>" data-toggle="tooltip" data-placement="bottom" title="Dribbble"><i class="fa fa-dribbble"></i></a></li><?php } ?>
					            <?php if(get_theme_mod('social_flickr')!= "") { ?><li class="flickr"><a target="_blank" href="<?php echo get_theme_mod('social_flickr'); ?>" data-toggle="tooltip" data-placement="bottom" title="Flickr"><i class="fa fa-flickr"></i></a></li><?php } ?>
					            <?php if(get_theme_mod('social_instagram')!= "") { ?><li class="flickr"><a target="_blank" href="<?php echo get_theme_mod('social_instagram'); ?>" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a></li><?php } ?>
					            <?php if(get_theme_mod('social_vimeo')!= "") { ?><li class="spotify"><a target="_blank" href="<?php echo get_theme_mod('social_vimeo'); ?>" data-toggle="tooltip" data-placement="bottom" title="Spotify"><i class="fa fa-spotify"></i></a></li><?php } ?>
					            <?php if(get_theme_mod('social_rss') == 1) { ?><li class="rss"><a target="_blank" href="<?php echo get_bloginfo( 'rss2_url' ); ?>" data-toggle="tooltip" data-placement="bottom" title="RSS"><i class="fa fa-rss"></i></a></li><?php } ?>
							</ul>
						</div><!-- // .topsocial -->
					</div><!-- // end column -->

				</div><!-- // .row -->
			</div><!-- // .container -->
		</div><!-- // .topheader -->

		<div class="mainheader fixedmenu" role="banner">
			<div class="container">
				<div class="header-inner clearfix">

					<div class="logo pull-left text-sm-center">

						<<?php echo $logo_wrap;?> class="logo-wrap top-10 bottom-10">
							<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php if(get_theme_mod('select_logo' ) == "logo"): ?>
									<?php if(get_theme_mod('media_logo_retina') != '') : ?>
										<img class="logo_retina" src="<?php echo do_shortcode(get_theme_mod('media_logo_retina')); ?>" width="<?php echo $logo_size[0]/2; ?>" height="<?php echo $logo_size[1]/2; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
									<?php else: ?>
									<img class="logo_standard" src="<?php echo get_theme_mod('media_logo') ? do_shortcode(get_theme_mod('media_logo')) : get_template_directory_uri().'/images/logo.png'; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
									<?php endif; ?>
								<?php else: ?>
								<span class="site-title">
									<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
								</span>
								<?php endif; ?>
							</a>
						</<?php echo $logo_wrap;?>>

						<p class="site-desc"><?php bloginfo( 'description' ); ?></p>
					</div><!-- // .logo -->

					<div class="header-search-form pull-right hidden-xs hidden-sm">
						<div class="header-search" style="margin: 0 0 9px;">
							<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

<div class="header-search-input-wrap">

<input class="header-search-input" placeholder=" Search Website" type="text" value="" name="s" style="float:right;"/>
</div>

						<input class="header-search-submit" type="submit" value=""><span class="header-icon-search"><i class="fa fa-search"></i></span>
							</form><!-- // #searchform -->
						</div><!-- // .header-search -->
					</div>

					<div class="site-menu border-style pull-right hidden-sm hidden-xs">
						<nav role="navigation">
							<?php

									if(is_page() && rwmb_meta('erange_page_advance_menu') != ''){
											wp_nav_menu( array(
												'menu'            => rwmb_meta('erange_page_advance_menu'),
												'container'       => 'ul',
												'menu_class' => 'sf-menu nav nav-tabs clearfix'
											) );
									} elseif (has_nav_menu('header')){
										wp_nav_menu( array(
											'theme_location'  => 'header',
											'container'       => 'ul',
											'menu_class' => 'sf-menu nav nav-tabs clearfix'
										) );
									}

							?>
						</nav>
					</div><!-- // .site-menu -->
				</div><!-- // .header-inner -->
			</div><!-- // .container -->
		</div><!-- // .mainheader -->

		<?php
			if ( is_page() ) echo do_shortcode(rwmb_meta('erange_page_header_content'));
			if ( is_page() && rwmb_meta('erange_page_heading') == 0 ):
				echo '<div class="no-heading bottom-30"></div>';
			else:
				get_template_part( 'heading' );
			endif;
		?>

	</header>

	<div id="main" role="main">

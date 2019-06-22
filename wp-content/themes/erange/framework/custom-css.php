<?php

/**
* Get custom CSS data
*
*/
	function hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);

	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   return $rgb; 
	}

	function rgb2hex($r, $g, $b) {
		$hex = "#";
		$hex.= str_pad(dechex($r), 2, "0", STR_PAD_LEFT);
		$hex.= str_pad(dechex($g), 2, "0", STR_PAD_LEFT);
		$hex.= str_pad(dechex($b), 2, "0", STR_PAD_LEFT);
		 
		return $hex;
	}

	function erange_custom_style(){ 
		$color = get_theme_mod('custom_theme_color');
		$color_aj = hex2rgb($color);
	?>

<?php 
	$body_font = get_theme_mod('font_body');

	$heading1 = get_theme_mod('font_h1');
	$heading2 = get_theme_mod('font_h2');
	$heading3 = get_theme_mod('font_h3');
	$heading4 = get_theme_mod('font_h4');
	$heading5 = get_theme_mod('font_h5');
	$heading6 = get_theme_mod('font_h6');

	$heading1_large = get_theme_mod('font_large_h1');
	$heading2_large = get_theme_mod('font_large_h2');
	$heading3_large = get_theme_mod('font_large_h3');
	$heading4_large = get_theme_mod('font_large_h4');
	$heading5_large = get_theme_mod('font_large_h5');
	$heading6_large = get_theme_mod('font_large_h6');

?>

<?php echo erange_google_font(); ?>

.logo{
	margin-top: <?php echo get_theme_mod('style_logotopmargin');?>;
	margin-bottom: <?php echo get_theme_mod('style_logobottommargin');?>;
}

<?php if(get_theme_mod('select_layoutstyle') == 'boxed'): ?>
/* Background */
body{
<?php if(get_theme_mod('color_bg')): ?>
background-color: <?php echo get_theme_mod('color_bg');?>;
<?php endif;?>

<?php if(get_theme_mod('media_bg')): ?>
background-image: url('<?php echo do_shortcode(get_theme_mod('media_bg'));?>');
<?php elseif(get_theme_mod('custom_bg' )):?>
background-image: url('<?php echo do_shortcode(get_theme_mod('custom_bg' ));?>');
<?php endif;?>

<?php if(get_theme_mod('select_bg') == 'Cover' && get_theme_mod('media_bg')):?>
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
<?php elseif(get_theme_mod('select_bg') == 'no-repeat' && get_theme_mod('media_bg')):?>
background-repeat = no-repeat;
<?php elseif(get_theme_mod('select_bg') == 'repeat-x' && get_theme_mod('media_bg')):?>
background-repeat = repeat-x;
<?php elseif(get_theme_mod('select_bg') == 'repeat-y' && get_theme_mod('media_bg')):?>
background-repeat = repeat-y;
<?php else: ?>
background-repeat: repeat repeat;
<?php endif;?>
}

<?php endif; ?>

<?php if(get_theme_mod('custom_theme_color') != '#31A3DD'): ?>

body{
<?php if( $body_font['face'] || $body_font['size'] || $body_font['style'] || $body_font['color'] ) { ?>
<?php if($body_font['face']): ?>
font-family: <?php echo $body_font['face']; ?>, Arial, Helvetica, sans-serif;;
<?php endif;?>
<?php if($body_font['size']): ?>
font-size: <?php echo $body_font['size']; ?>; 
<?php endif;?>
<?php if($body_font['style']): ?>
font-weight: <?php echo $body_font['style']; ?>; 
<?php endif;?>
<?php if($body_font['color']): ?>
color: <?php echo $body_font['color']; ?>;
<?php endif; ?>
<?php } ?>
}

/* Style Generation */


/* Heading */
h1{ font-family: <?php echo $heading1['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $heading1['size']; ?>; font-weight: <?php echo $heading1['style']; ?>; color: <?php echo $heading1['color']; ?>; }
h2{ font-family: <?php echo $heading2['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $heading2['size']; ?>; font-weight: <?php echo $heading2['style']; ?>; color: <?php echo $heading2['color']; ?>; }
h3{ font-family: <?php echo $heading3['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $heading3['size']; ?>; font-weight: <?php echo $heading3['style']; ?>; color: <?php echo $heading3['color']; ?>; }
h4{ font-family: <?php echo $heading4['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $heading4['size']; ?>; font-weight: <?php echo $heading4['style']; ?>; color: <?php echo $heading4['color']; ?>; }
h5{ font-family: <?php echo $heading5['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $heading5['size']; ?>; font-weight: <?php echo $heading5['style']; ?>; color: <?php echo $heading5['color']; ?>; }
h6{ font-family: <?php echo $heading6['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $heading6['size']; ?>; font-weight: <?php echo $heading6['style']; ?>; color: <?php echo $heading6['color']; ?>; }

/* Heading large */
h1.large{ font-family: <?php echo $heading1_large['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $heading1_large['size']; ?>; font-weight: <?php echo $heading1_large['style']; ?>; color: <?php echo $heading1_large['color']; ?>; }
h2.large{ font-family: <?php echo $heading2_large['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $heading2_large['size']; ?>; font-weight: <?php echo $heading2_large['style']; ?>; color: <?php echo $heading2_large['color']; ?>; }
h3.large{ font-family: <?php echo $heading3_large['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $heading3_large['size']; ?>; font-weight: <?php echo $heading3_large['style']; ?>; color: <?php echo $heading3_large['color']; ?>; }
h4.large{ font-family: <?php echo $heading4_large['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $heading4_large['size']; ?>; font-weight: <?php echo $heading4_large['style']; ?>; color: <?php echo $heading4_large['color']; ?>; }
h5.large{ font-family: <?php echo $heading5_large['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $heading5_large['size']; ?>; font-weight: <?php echo $heading5_large['style']; ?>; color: <?php echo $heading5_large['color']; ?>; }
h6.large{ font-family: <?php echo $heading6_large['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $heading6_large['size']; ?>; font-weight: <?php echo $heading6_large['style']; ?>; color: <?php echo $heading6_large['color']; ?>; }

/* Link */
a{color:<?php echo get_theme_mod('color_link'); ?>; }
a:hover{ color: <?php echo get_theme_mod('color_hover'); ?>; }

h1 a:hover,
h2 a:hover,
h3 a:hover,
h4 a:hover,
h5 a:hover,
h6 a:hover,
a:hover,
#header .mainheader .logo .site-title a,
#header .site-menu .menu-mega .sf-mega ul li a:hover,
.team-member .team-member-info .desc,
.callout.border .callout-content .head,
.heading-title span,
.heading-title strong,
.heading-second .heading::first-letter,
.portfolio-item .portfolio-mark .portfolio-mark-content .portfolio-mark-icon,
.recent-comment ul li a.title:hover,
.affix-widget ul li.active a,
.hoverbox .hover-mark-content-inner .heading-title,
.jobboard li .jobtype,
.option-list ul li li .selected,
.product-review .star-rating,
.entry-relate .relate-post h4 a:hover,
#header .site-menu li.active > a,
#header .site-menu li.sfHover > a,
#header .site-menu li a:hover,
#header .site-menu li.current-menu-item > a,
.quotes-post-info a:hover,
.blog-item.quote-post .quote-post-info a:hover,
.iconbox .icon,
.timeline .timelinenav li.active a{
	color: <?php echo $color; ?>
}
.header-icon-search,
.sliderbox .heading,
.border .heading-title:after,
.portfolio-item .portfolio-mark .portfolio-mark-content .portfolio-mark-inner,
.portfolio-sub-info .portfolio-sub-info-list,
.portfolio-short-filter .portfolio-filter-nav li a.selected,
.widget.tags-cloud a:hover,
.iconsmall .icon,
.pricingitem.feature .pricing-detail,
.iconbox.center .iconbox-heading:after,
.iconbox.solid .icon,
.accordion.solid .accordion-title .icon,
.tabs.main .tabNavigation li.active a,
.tabs.left .tabNavigation li.active a,
.tabs.right .tabNavigation li.active a,
.callout,
.carouselbox .nav a:hover,
.iconpage li:hover,
.blog-item .action-link,
.entry-item .entry-boxinfo .entry-icon,
.pagenavi ul li a:hover,
.pagenavi ul li span,
.sidebar-content .widget .widget-title h4 span,
.option-list ul li li .selected span,
#product-detail .product-amount span,
.flex-direction-nav li a:hover,
.flex-control-nav li a.flex-active,
.iconlist li.active a,
.tabs.left.second .tabNavigation li.active a,
.button,
button,
input[type="submit"],
input[type="button"],
input[type="reset"],
.map-container.actived .title span,
.map-container .title span:hover,
.team-member .team-member-info .team-member-social li a,
.roundicon .icon,
.timeline .timelinenav li a:before,
.largeicon.active a{
  background: <?php echo $color; ?>
}
.timeline .timelinenav li a:before,
.timeline .timelinenav li.active a:before,
.iconlist li.active a,
.tabs.left.second .tabNavigation li.active a,
.largeicon.active a{
	border-color: <?php echo $color; ?>
}
#header .site-menu li.active > a,
#header .site-menu li.sfHover > a,
#header .site-menu li a:hover,
#header .site-menu li.current-menu-item > a,
#header.no-bg .breacrumb,
.tabs.main .tabNavigation li.active a:after,
.tabs.main.border .tabNavigation li.active a,
#header,
.entry-meta,
.entry-author,
.option-list ul span.title{
	border-top-color: <?php echo $color; ?>
}
.tabs.left .tabNavigation li.active a:after{
	border-left-color: <?php echo $color; ?>
}
.team-member,
.quotes-post-info a:hover,
.blog-item.quote-post .quote-post-info a:hover{
	border-bottom-color: <?php echo $color; ?>
}
.entry-item .entry-boxinfo .entry-date{
	background-color: <?php echo rgb2hex($color_aj[0]+'3',$color_aj[1]+'3',$color_aj[2]+'3');?>;
}

/* Media Element Player */
.mejs-container .mejs-controls .mejs-time,
.mejs-container .mejs-controls .mejs-time span,
.mejs-controls .mejs-captions-button .mejs-captions-selector ul li,
.mejs-chapters .mejs-chapter .mejs-chapter-block,
.mejs-captions-layer,
.mejs-captions-layer  a,
.me-cannotplay a,
.mejs-contextmenu .mejs-contextmenu-item:hover,
.mejs-controls .mejs-sourcechooser-button .mejs-sourcechooser-selector ul li,
.mejs-postroll-close{
	color: <?php echo $color; ?>
}
.mejs-controls .mejs-time-rail .mejs-time-current,
.mejs-controls .mejs-time-rail .mejs-time-handle,
.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
.mejs-contextmenu{
	background: <?php echo $color; ?>
}
.mejs-chapters{
	-xborder-right: solid 1px <?php echo $color; ?>;
}

<?php endif; ?>

/* Custom CSS */
<?php echo get_theme_mod('textarea_csscode') ? get_theme_mod('textarea_csscode') : '' ; ?>

<?php }

add_filter('query_vars','erange_query_trigger');
function erange_query_trigger($vars) {
    $vars[] = 'load';
    return $vars;
}

add_action('template_redirect', 'erange_trigger_check');
function erange_trigger_check() {
	if(get_query_var('load') == 'custom.css') { 
		header('Content-type: text/css');header("Cache-Control: must-revalidate");
		erange_custom_style();
	exit; }
}
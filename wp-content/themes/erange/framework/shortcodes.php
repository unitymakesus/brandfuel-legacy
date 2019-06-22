<?php

/**
* Erange shortcodes
*
* @since erange 1.0
*/

/*-----------------------------------------------------------------------------------*/
/*  Alert
/*-----------------------------------------------------------------------------------*/
function erange_alert( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'class' => '',
    'style' => '', // erros, info, success, warning
    'close'  => '', 
    ), $atts));

  if($close == 'yes'){
    $close_out = '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>';
  } else {
    $close_out = '';
  }

  if($style){
    $title_out = '<span class="title">'.$style.'</span>';
  } else {
    $title_out = '<span class="title">'.__('alert','erange').'</span>';
  }
  
  return '<div class="alert '.$style.' '.$class.' fade in">'.$title_out.$close_out.'<div class="alert-info"><p>'.do_shortcode( $content ).'</p></div></div>';

}

/*-----------------------------------------------------------------------------------*/
/*  Button
/*-----------------------------------------------------------------------------------*/
function erange_buttons( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'link'      => '#',
    'target'    => '_self',
    'color'     => 'color',
    'style'     => 'normal',
    'class'     => '',
    'icon'      => '',
    'title'     => '',
    ), $atts));

  if($icon == '') {
    $return2 = "";
  }
  else{
    $return2 = "<i class='fa fa-".erange_icon_format($icon)." icon-right'></i>";
  }

  $out = '<a href="'. $link.'" target="'.$target.'" class="button '.$color.' '.$style.' '.$class.'">'. $title. $return2 .'</a>';

  return $out;
}


/*-----------------------------------------------------------------------------------*/
/*  Container
/*-----------------------------------------------------------------------------------*/
function erange_container( $atts, $content = null ) {
  return '<div class="container">'.do_shortcode( $content ).'</div>';
}


/*-----------------------------------------------------------------------------------*/
/*  Columns
/*-----------------------------------------------------------------------------------*/
function erange_column_row( $atts, $content = null){
  return '<div class="row">'.do_shortcode( $content ).'</div>';
}
function erange_column_child_row( $atts, $content = null){
  return '<div class="row">'.do_shortcode( $content ).'</div>';
}

function erange_column( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'large' => '',
    'medium' => '',
    'small' => '',
    'mobile'  => '',
    'class' => '',
    ), $atts));

  $large_out = '';
  $medium_out = '';
  $small_out = '';
  $mobile_out = '';
  $class_out = '';

  if($large){
    $large_out = 'col-lg-'.$large;
  }
  if($medium){
    $medium_out = 'col-md-'.$medium;
  }
  if($small){
    $small_out = 'col-sm-'.$small;
  }
  if($mobile){
    $mobile_out = 'col-xs-'.$medium;
  }
  if($class){
    $class_out = $class;
  }

  return '<div class="'.$large_out.' '.$medium_out.' '.$small_out.' '.$mobile_out.' '.$class_out.'">'.do_shortcode( $content ).'</div>';
}

function erange_child_column( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'large' => '',
    'medium' => '',
    'small' => '',
    'mobile'  => '',
    'class' => '',
    ), $atts));

  $large_out = '';
  $medium_out = '';
  $small_out = '';
  $mobile_out = '';
  $class_out = '';

  if($large){
    $large_out = 'col-lg-'.$large;
  }
  if($medium){
    $medium_out = 'col-md-'.$medium;
  }
  if($small){
    $small_out = 'col-sm-'.$small;
  }
  if($mobile){
    $mobile_out = 'col-xs-'.$medium;
  }
  if($class){
    $class_out = $class;
  }

  return '<div class="'.$large_out.' '.$medium_out.' '.$small_out.' '.$mobile_out.' '.$class_out.'">'.do_shortcode( $content ).'</div>';
}


/*-----------------------------------------------------------------------------------*/
/*  Heading
/*-----------------------------------------------------------------------------------*/
function erange_heading($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'title' => '',
    'desc'  => '',
    'animation' => 0,
    'animation_style' => '',
    'style' => 'normal',
    'position' => 1
    ), $atts));

  if($desc){
    $desc_out = '<h5 class="heading-subtitle bottom-0 '.$style.'">'.$desc.'</h5>';
  } else {
    $desc_out = '';
  }

  if($animation){
    $at = '<div class="wow '.$animation_style.'" data-wow-duration="0.6s" data-wow-delay="0.3s">';
    $ab = '</div>';
  } else {
    $at = '';
    $ab = '';
  }

  $title_out = '<h4 class="large bottom-0 heading-title '.$style.'">'.do_shortcode($title).'</h4>';

  if($position == 1){
    $out = '<div class="title-area '.$class.'">'.$at.$title_out.$desc_out.$ab.'</div>';
  } else {
    $out = '<div class="title-area '.$class.'">'.$at.$desc_out.$title_out.$ab.'</div>';
  }
  return $out;
}

function erange_subheading($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'title' => '',
    ), $atts));

  return '<div class="heading-second '.$class.'"><h4 class="heading large">'.do_shortcode( $content ).$title.'</h4></div>';

}

/*-----------------------------------------------------------------------------------*/
/*  Counter Box
/*-----------------------------------------------------------------------------------*/
function erange_counter($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'number' => '',
    'title' => ''
    ), $atts));

  return '<div class="counterbox actionhere '.$class.'"><span class="number counter" data-to="'.$number.'">0</span><span class="desc">'.$title.'</span></div>';
}

/*-----------------------------------------------------------------------------------*/
/*  Counter Box
/*-----------------------------------------------------------------------------------*/
function erange_counterbox($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'number' => '',
    'icon' => '',
    'title' => '',
    'style' => '',
    ), $atts));

    if($icon){
      $icon_out = '<div class="icon '.$style.'"><i class="'.erange_icon_format($icon).'"></i></div>';    
    } else {
      $icon_out = '';
    }

    return '<div class="counterbox clearfix '.$class.'">'.$icon_out.'<div class="counter-content"><h4 class="number '.$style.' counter" data-to="'.$number.'">'.$number.'</h4><span class="desc '.$style.'">'.$title.'</span></div></div>';
}

/*-----------------------------------------------------------------------------------*/
/*  Skillbar
/*-----------------------------------------------------------------------------------*/
function erange_skillbar($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'title' => '',
    'percent' => '',
    'color' => '#EF4A43',
    'style' => 'normal', // strip, strip active
    ), $atts));

  return '<div class="progress-trigger '.$class.'"><span class="prgress-small-title">'.$title.'</span><div class="progress '.$style.' clearfix"><div class="progress-bar" data-bgcolor="'.$color.'" data-percentage="'.$percent.'"><span class="percent">'.$percent.'%</span></div></div></div>';
}

/*-----------------------------------------------------------------------------------*/
/*  Chart
/*-----------------------------------------------------------------------------------*/
function erange_chart($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'bgcolor' => '',
    'percent' => '',
    'barcolor' => '',
    'title' => '',
    ), $atts));

  if($title){
    $title_out = $title;
  } else {
    $title_out = '<span>'.$percent.'</span>%';
  }

  return '<div class="chart-trigger"><div class="chart '.$class.'" data-bgcolor="'.$bgcolor.'" data-barcolor="'.$barcolor.'" data-percent="'.$percent.'">'.$title_out.'</div></div>';

}


/*-----------------------------------------------------------------------------------*/
/*  Testimonial
/*-----------------------------------------------------------------------------------*/
function erange_testimonial($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'name'  => '',
    'company' => '',
    'avatar'  => '',
    ), $atts));

  return  '<div class="testimonial-item '.$class.' clearfix">
                <div class="testimonial-border">
                  <div class="testimonial-item-inner clearfix">
                    <div class="testimonial-avatar">
                      <img src="'.wp_get_attachment_url($avatar).'" alt="">
                    </div>
                    <div class="testimonial-content">
                       <p>'.do_shortcode( $content ).'</p>
                    </div>
                  </div>
                </div>
                <div class="testimonial-info text-right">
                  <span class="name">'.$name.'</span>
                  <span class="company">'.$company.'</span>
                </div>
              </div>';
}


/*-----------------------------------------------------------------------------------*/
/*  Element
/*-----------------------------------------------------------------------------------*/
function erange_element($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'margin'  => '',
    'padding' => '',
    ), $atts));

  $data_margin = $data_padding = '';

  if($margin){
    $data_margin = 'data-margin="'.$margin.'"';
  }
  if($padding){
    $data_padding = 'data-padding="'.$padding.'"';
  }

  return '<div class="element '.$class.'" '.$data_margin.' '.$data_padding.'><div>'.do_shortcode( $content ).'</div></div>';
}


/*-----------------------------------------------------------------------------------*/
/*  Team
/*-----------------------------------------------------------------------------------*/
function erange_team($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'name' => '',
    'position' => '',
    'avatar'  => '',
    'facebook'  => '',
    'twitter' => '',
    'googleplus'  => '',
    'linkedin'  => '',
    ), $atts));

  $social = '';

  if($facebook){
    $social .= '<li class="facebook"><a href="'.$facebook.'"><i class="fa fa-facebook"></i></a></li>';
  }
  if($twitter){
    $social .= '<li class="twitter"><a href="'.$twitter.'"><i class="fa fa-twitter"></i></a></li>';
  }
  if($googleplus){
    $social .= '<li class="googleplus"><a href="'.$googleplus.'"><i class="fa fa-google-plus"></i></a></li>';
  }
  if($linkedin){
    $social .= '<li class="linkedin"><a href="'.$linkedin.'"><i class="fa fa-linkedin"></i></a></li>';
  }

  if($social){
    $before = '<ul class="list-unstyled social bottom-0">';
    $after = '</ul>';
  } else {
    $before = '';
    $after = '';
  }

  return '<div class="team-member clearfix '.$class.'">
              <div class="avatar">
                <img src="'.wp_get_attachment_url($avatar).'" alt="" class="img-responsive">
              </div>
              <div class="team-member-info">
                <h4 class="heading bottom-0">'.$name.'</h4>
                <span class="desc bottom-10">'.$position.'</span>
                <p>'.do_shortcode( $content ).'</p>
                <div class="team-member-social">
                  <ul class="social list-unstyled bottom-0 clearfix">'.$social.'</ul>
                </div>
              </div>
            </div>';
}


/*-----------------------------------------------------------------------------------*/
/*  Callout
/*-----------------------------------------------------------------------------------*/
function erange_callout($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'title' => '',
    'desc'  => '',
    'link' => '',
    'button_color'  => '',
    'button_name' => '',
    'button_style'  => 'normal', // border
    'target'  => '_blank',
    'style' => 'normal'
    ), $atts));

  if($link){
    $link_out = '<a target="'.$target.'" href="'.$link.'" class="button '.$button_style.' '.$button_color.'">'.$button_name.'</a>';
  } else {
    $link_out = '';
  }

  if($title){
    $title_out = '<h2 class="bottom-0 head">'.$title.'</h2>';
  } else {
    $title_out = '';
  }

  if($desc){
    $desc_out = '<span>'.$desc.'</span>';
  } else {
    $desc_out = '';
  }

  return '<div class="'.$style. ' callout '.$class.'"><div class="callout-content"><div class="row"><div class="col-md-8">'.$title_out.$desc_out.'</div><div class="col-md-4 text-right">'.$link_out.'</div></div></div></div>';
}

/*-----------------------------------------------------------------------------------*/
/*  Toggle
/*-----------------------------------------------------------------------------------*/

/* Toggle Wrap*/
function erange_toggle_wrap($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'style' => '',
    ), $atts));

  if($style = 1){
    $style_out = ' solid';
  } else {
    $style_out = ' border';
  }

  $GLOBALS['toggle_id'] = erange_rand_string(8);

  return '<div id="acc-'.$GLOBALS['toggle_id'].'" class="accordion '.$class.$style_out.'">'.do_shortcode( $content ).'</div>';

}


/* Toggle Item */
function erange_toggle_item($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'open' => '',
    'title' => ''
    ), $atts));

  if($open == "yes"){
    $class_open = 'in';
    $class_open_1 = '';
  } else {
    $class_open = '';
    $class_open_1 = 'class="collapsed"';
  }

  $toggle_item_id = erange_rand_string(8);

  return '<div class="panel accordion-item"><div class="accordion-heading"><h5 class="accordion-title"><a '.$class_open_1.' data-toggle="collapse" data-parent="#acc-'.$GLOBALS['toggle_id'].'" href="#collapse-'.$toggle_item_id.'"><span class="icon"><i class="fa-icon"></i></span>'.$title.'</a></h5></div>
  <div id="collapse-'.$toggle_item_id.'" class="accordion-collapse collapse '.$class_open.'"><div class="accordion-body">'.do_shortcode( $content ).'</div></div></div>';
}


/*-----------------------------------------------------------------------------------*/
/*  Pricing Table
/*-----------------------------------------------------------------------------------*/
/* Pricing Table */
function erange_pricing($atts, $content = null){
  extract(shortcode_atts(array(
    'desc'  => '',
    'button_name'  => '',
    'title' => '',
    'color' => '',
    'price' => '',
    'price_ext' => '',
    'currency'  => '',
    'price_text'  => '',
    'button_url' => '',
    'button_name' => 'Action',
    'featured_text' => '',
    'featured_bg' => 'e2480c'
    ), $atts));

  $out = '';

  if($featured_text){
    $featured_out = '<div class="feature-badge" data-bgcolor="#'.$featured_bg.'"><span>'.$featured_text.'</span></div>';
    $featured_class = ' feature';
  } else {
    $featured_out = '';
    $featured_class = '';
  }

  $out = '<div class="pricingitem'.$featured_class.'">'.$featured_out.'<div class="heading"><h4 class="bottom-0">'.$title.'</h4></div><div class="pricing-content">'.do_shortcode( $content ).'</div><div class="pricing-detail"><div class="price"><div class="price-first">'.$price.'<span class="price-second">'.$price_ext.'</span><i class="currency">'.$currency.'</i><span class="price-desc">'.$price_text.'</span></div></div></div><div class="pricing-action"><a href="'.$button_url.'" class="no-round">'.$button_name.'<i class="fa fa-angle-double-right"></i></a></div></div>';

  return $out;
}

/*-----------------------------------------------------------------------------------*/
/*  Google Fonts
/*-----------------------------------------------------------------------------------*/
function erange_googlefont( $atts, $content = null) {
  extract( shortcode_atts( array(
    'font' => 'Swanky and Moo Moo',
    'size' => '42px',
    'margin' => '0px'
    ), $atts ) );

  $google = preg_replace("/ /","+",$font);

  return '<link href="http://fonts.googleapis.com/css?family='.$google.'" rel="stylesheet" type="text/css">
  <div class="googlefont" style="font-family:\'' .$font. '\', serif !important; font-size:' .$size. ' !important; margin: ' .$margin. ' !important;">' . do_shortcode($content) . '</div>';
}


/*-----------------------------------------------------------------------------------*/
/*  Video
/*-----------------------------------------------------------------------------------*/
function erange_video($atts) {
  extract(shortcode_atts(array(
    'type'  => '',
    'id'  => '',
    'width'   => false,
    'height'  => false,
    'autoplay'  => ''
    ), $atts));
  
  if ($height && !$width) $width = intval($height * 16 / 9);
  if (!$height && $width) $height = intval($width * 9 / 16);
  if (!$height && !$width){
    $height = 380;
    $width = 760;
  }
  
  $autoplay = ($autoplay == 'yes' ? '1' : false);

  if($type == "vimeo") $return = "<div class='video-embed'><iframe src='http://player.vimeo.com/video/$id?autoplay=$autoplay&amp;title=0&amp;byline=0&amp;portrait=0' width='$width' height='$height' class='iframe'></iframe></div>";
  
  else if($type == "youtube") $return = "<div class='video-embed'><iframe src='http://www.youtube.com/embed/$id?HD=1;rel=0;showinfo=0' width='$width' height='$height' class='iframe'></iframe></div>";

  if (!empty($id)){
    return $return;
  }
}


/*-----------------------------------------------------------------------------------*/
/*  Google Maps
/*-----------------------------------------------------------------------------------*/
function erange_map($atts) {

  // default atts
  $atts = shortcode_atts(array( 
    'lat'   => '0', 
    'lon'    => '0',
    'id' => 'map',
    'z' => '1',
    'w' => '400',
    'h' => '300',
    'maptype' => 'ROADMAP',
    'address' => '',
    'kml' => '',
    'kmlautofit' => 'yes',
    'marker' => '',
    'markerimage' => '',
    'traffic' => 'no',
    'bike' => 'no',
    'fusion' => '',
    'start' => '',
    'end' => '',
    'infowindow' => '',
    'infowindowdefault' => 'yes',
    'directions' => '',
    'hidecontrols' => 'false',
    'scale' => 'false',
    'scrollwheel' => 'true',
    'drag' => 'false',
    'pan' => 'false',
    'style' => '',
    'api' => 'AIzaSyDR4cw6rWrtnk81cg87GE-Z6RNy8VVcamM'
    ), $atts);

  $returnme = '<div id="' .$atts['id'] . '" style="width:' . $atts['w'] . 'px;height:' . $atts['h'] . 'px;" class="google_map ' . $atts['style'] . '"></div>';
  
  //directions panel
  if($atts['start'] != '' && $atts['end'] != '') 
  {
    $panelwidth = $atts['w']-20;
    $returnme .= '<div id="directionsPanel" style="width:' . $panelwidth . 'px;height:' . $atts['h'] . 'px;border:1px solid gray;padding:10px;overflow:auto;"></div><br>';
  }

  $returnme .= '
  <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places,geometry,visualization&amp;v=3.exp&amp;key='.$atts['api'].'"></script>
  <script type="text/javascript">
  var latlng = new google.maps.LatLng(' . $atts['lat'] . ', ' . $atts['lon'] . ');
  var myOptions = {
    zoom: ' . $atts['z'] . ',
    center: latlng,
    mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
    zoomControl: true,
    panControl: ' . $atts['pan'] .',
    zoomControlOptions: {
      style: google.maps.ZoomControlStyle.SMALL
    },
    draggable: ' . $atts['drag'] .',
    scrollwheel: ' . $atts['scrollwheel'] .',
    scaleControl: ' . $atts['scale'] .',
    disableDefaultUI: ' . $atts['hidecontrols'] .',
    mapTypeId: google.maps.MapTypeId.' . $atts['maptype'] . '
  };
  var ' . $atts['id'] . ' = new google.maps.Map(document.getElementById("' . $atts['id'] . '"),
    myOptions);
';

    //kml
if($atts['kml'] != '') 
{
  if($atts['kmlautofit'] == 'no') 
  {
    $returnme .= '
    var kmlLayerOptions = {preserveViewport:true};
    ';
  }
  else
  {
    $returnme .= '
    var kmlLayerOptions = {preserveViewport:false};
    ';
  }
  $returnme .= '
  var kmllayer = new google.maps.KmlLayer(\'' . html_entity_decode($atts['kml']) . '\',kmlLayerOptions);
  kmllayer.setMap(' . $atts['id'] . ');
  ';
}

    //directions
if($atts['start'] != '' && $atts['end'] != '') 
{
  $returnme .= '
  var directionDisplay;
  var directionsService = new google.maps.DirectionsService();
  directionsDisplay = new google.maps.DirectionsRenderer();
  directionsDisplay.setMap(' . $atts['id'] . ');
  directionsDisplay.setPanel(document.getElementById("directionsPanel"));

  var start = \'' . $atts['start'] . '\';
  var end = \'' . $atts['end'] . '\';
  var request = {
    origin:start, 
    destination:end,
    travelMode: google.maps.DirectionsTravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });


';
}

    //traffic
if($atts['traffic'] == 'yes')
{
  $returnme .= '
  var trafficLayer = new google.maps.TrafficLayer();
  trafficLayer.setMap(' . $atts['id'] . ');
  ';
}

    //bike
if($atts['bike'] == 'yes')
{
  $returnme .= '      
  var bikeLayer = new google.maps.BicyclingLayer();
  bikeLayer.setMap(' . $atts['id'] . ');
  ';
}

    //fusion tables
if($atts['fusion'] != '')
{
  $returnme .= '      
  var fusionLayer = new google.maps.FusionTablesLayer(' . $atts['fusion'] . ');
  fusionLayer.setMap(' . $atts['id'] . ');
  ';
}

    //address
if($atts['address'] != '')
{
  $returnme .= '
  var geocoder_' . $atts['id'] . ' = new google.maps.Geocoder();
  var address = \'' . $atts['address'] . '\';
  geocoder_' . $atts['id'] . '.geocode( { \'address\': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      ' . $atts['id'] . '.setCenter(results[0].geometry.location);
      ';

      if ($atts['marker'] !='')
      {
            //add custom image
        if ($atts['markerimage'] !='')
        {
          $returnme .= 'var image = "'. $atts['markerimage'] .'";';
        }
        $returnme .= '
        var marker = new google.maps.Marker({
          map: ' . $atts['id'] . ', 
          ';
          if ($atts['markerimage'] !='')
          {
            $returnme .= 'icon: image,';
          }
          $returnme .= '
          position: ' . $atts['id'] . '.getCenter()
        });
';

            //infowindow
if($atts['infowindow'] != '') 
{
              //first convert and decode html chars
  $thiscontent = htmlspecialchars_decode($atts['infowindow']);
  $returnme .= '
  var contentString = \'' . $thiscontent . '\';
  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

google.maps.event.addListener(marker, \'click\', function() {
  infowindow.open(' . $atts['id'] . ',marker);
});
';

              //infowindow default
if ($atts['infowindowdefault'] == 'yes')
{
  $returnme .= '
  infowindow.open(' . $atts['id'] . ',marker);
  ';
}
}
}
$returnme .= '
} else {
  alert("Geocode was not successful for the following reason: " + status);
}
});
';
}

    //marker: show if address is not specified
if ($atts['marker'] != '' && $atts['address'] == '')
{
      //add custom image
  if ($atts['markerimage'] !='')
  {
    $returnme .= 'var image = "'. $atts['markerimage'] .'";';
  }

  $returnme .= '
  var marker = new google.maps.Marker({
    map: ' . $atts['id'] . ', 
    ';
    if ($atts['markerimage'] !='')
    {
      $returnme .= 'icon: image,';
    }
    $returnme .= '
    position: ' . $atts['id'] . '.getCenter()
  });
';

      //infowindow
if($atts['infowindow'] != '') 
{
  $returnme .= '
  var contentString = \'' . $atts['infowindow'] . '\';
  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

google.maps.event.addListener(marker, \'click\', function() {
  infowindow.open(' . $atts['id'] . ',marker);
});
';
        //infowindow default
if ($atts['infowindowdefault'] == 'yes')
{
  $returnme .= '
  infowindow.open(' . $atts['id'] . ',marker);
  ';
}       
}
}

$returnme .= '</script>';


return $returnme;
}


/*-----------------------------------------------------------------------------------*/
/*  Icons & Lists
/*-----------------------------------------------------------------------------------*/

// Icons
function erange_miniicon( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'icon'      => 'ok'
    ), $atts));

  $out = '<i class="'. erange_icon_format($icon) .'"></i>';
  return $out;
}

// List Wrap
function erange_list( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'style' => 'normal', //seperate
    'class' => '',
    ), $atts));

  if($style){
    $class_out = ' '.$style;
  } else {
    $class_out = '';
  }

  $out = '<ul class="'.$class.' list-unstyled icon-list'.$class_out.'">'. do_shortcode($content) . '</ul>';

  return $out;
}

// List Items
function erange_list_item( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'icon'      => 'ok',
    'title' => '',
    'desc' => '',
    'class' => '',
    'style' => 1
    ), $atts));


  if($icon){
    $icon_out = '<i class="'.erange_icon_format($icon).'"></i>';
  } else {
    $icon_out = '';
  }

  if($style == 1) {
    $out = '<li class="'.$class.'">'.$icon_out. do_shortcode($content) . '</li>';
  } else {
    $out = '<li class="'.$class.' bottom-20"><i class="'.erange_icon_format($icon).' top-5"></i><div class="icon-content"><h4 class="white bottom-0">'.$title.'</h4><span>'.$desc.'</span></div></li>';
  }

  return $out;
}

/*-----------------------------------------------------------------------------------*/
/*  Icon Box
/*-----------------------------------------------------------------------------------*/

/* Icon Box*/
function erange_iconbox( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'icon' => '',
    'class' => '',
    'title' => '',
    'style' => 'normal',
    'url' => '',
    'button_name' => '',
    ), $atts));

  if($url){
    $action = '<div class="icon-action"><a href="'.$url.'" class="button">'.$button_name.'</a></div>';
  } else {
    $action = '';
  }

  return '<div class="'.$style.' iconbox '.$class.'"><div class="icon"><i class="'.erange_icon_format($icon).'"></i></div><div class="iconbox-content"><h3 class="iconbox-heading bottom-10">'.$title.'</h3><p>'.do_shortcode( $content ).'</p></div>'.$action.'</div>';

}

/* Icon Box*/
function erange_smallbox( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'icon' => '',
    'class' => '',
    'title' => '',
    'desc' => '',
    ), $atts));
  
  return '<div class="iconsmall '.$class.'"><div class="icon"><i class="'.erange_icon_format($icon).'"></i></div><div class="icon-content"><h4 class="bottom-0">'.$title.'</h4><span>'.$desc.'</span></div></div>';
}

/* Slider Box*/
function erange_sliderbox( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'class' => '',
    'title' => '',
    'url' => '',
    'img' => '',
    ), $atts));

  return '<div class="sliderbox text-center '.$class.'"><div class="sliderbox-header"><div class="heading"><h4 class="bottom-0"><a href="'.$url.'">'.$title.'</a></h4></div><div class="sliderbox-media"><img src="'.wp_get_attachment_url($img).'" alt="" class="img-responsive"></div></div><div class="sliderbox-content"><p>'.do_shortcode( $content ).'</p></div></div>';
}

/* Icon List*/
function erange_large_icon( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'class' => '',
    'style' => 'left',
    'title' => '',
    'url' => '',
    'icon' => '',
    'position' => '',
    'animation' => '',
    'animation_style' => '',
    'animation_time' => '',
    'animation_delay' => '',
    ), $atts));

    if($animation == 1){
      $a_t = '<div class="wow '.$animation_style.'" data-wow-duration="'.$animation_time.'s" data-wow-delay="'.$animation_delay.'s">';
      $a_b = '</div>';
    } else {
      $a_t = $a_b = '';
    }

    return $a_t.'<div class="'.$style.' largeicon '.$class.' '.$position.'"><a href="'.$url.'" class="icon"><i class="'.erange_icon_format($icon).'"></i></a><div class="iconlist-content text-'.$style.'"><h3 class="bottom-5">'.$title.'</h3><p>'.do_shortcode( $content ).'</p></div></div>'.$a_b;

}

/* Round Icon*/
function erange_roundicon( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'class' => '',
    'title' => '',
    'desc' => '',
    'icon' => '',
    'animation' => '',
    'animation_style' => '',
    'animation_time' => '',
    'animation_delay' => '',
    ), $atts));

    if($animation == 1){
      $a_t = '<div class="wow '.$animation_style.'" data-wow-duration="'.$animation_time.'s" data-wow-delay="'.$animation_delay.'s">';
      $a_b = '</div>';
    } else {
      $a_t = $a_b = '';
    }

return $a_t.'<div class="roundicon '.$class.'"><div class="icon"><i class="'.erange_icon_format($icon).'"></i></div><div class="roundicon-content"><h4 class="heading">'.$title.'</h4><span>'.$desc.'</span></div></div>'.$a_b;

}

/*-----------------------------------------------------------------------------------*/
/*  Tabs
/*-----------------------------------------------------------------------------------*/

/* Tab Group*/
function erange_tabgroup( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'style' => 1,
    'icon' => '',
    'class' => '',
    ), $atts));

  if ($style == 2){
    $class1 = 'tabs left clearfix';
  } elseif ($style == 3){
    $class1 = 'tabs right clearfix';
  } else{
    $class1 = 'tabs main clearfix';
  }

  $GLOBALS['tab_count'] = 0;
  $i = 1;
  $randomid = rand();
  $tabid = rand();

  do_shortcode( $content );

  if( is_array( $GLOBALS['tabs'] ) ){

    foreach( $GLOBALS['tabs'] as $tab ){  
      if( $tab['icon'] != '' ){
        $icon = '<i class="'.erange_icon_format($tab['icon']).'"></i>';
      }
      else{
        $icon = '';
      }

      $tabs[] = '<li class="tab"><a data-toggle="tab" href="#panel'.$randomid.$i.'">'.$icon . $tab['title'].'</a></li>';
      $panes[] = '<div class="tabs-container" id="panel'.$randomid.$i.'"><p>'.$tab['content'].'</p></div>';
      $i++;
      $icon = '';
    }

    $script = '<script type="text/javascript">jQuery(document).ready(function($){jQuery("#tab-'.$tabid.' a:first").tab("show");})</script>';

    $return = '<div id="tab-'.$tabid.'" class="clearfix '.$class1.' '.$class.'"><ul class="tabNavigation clearfix list-unstyled bottom-0">'.implode( "\n", $tabs ).'</ul>'.implode( "\n", $panes ).'</div>'.$script;
  }
  return $return;
}

/* Tab */
function erange_tab( $atts, $content = null) {
  extract(shortcode_atts(array(
    'title' => '',
    'icon'  => ''
    ), $atts));
  
  $x = $GLOBALS['tab_count'];
  $GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'icon' => $icon, 'content' =>  $content );
  $GLOBALS['tab_count']++;
}

/*-----------------------------------------------------------------------------------*/
/*  Twitter
/*-----------------------------------------------------------------------------------*/
function erange_twitter_section($atts, $content = null){
  extract(shortcode_atts(array(
    'username' => ''
    ), $atts));

  $randomid = rand();

  $out = '<div class="heading-icon text-center"><div class="icon"><i class="fa fa-twitter"></i></div></div><div id="latest-tweet-'.$randomid.'" class="tweet-section text-center"></div>';
  $script = '<script type="text/javascript">jQuery(document).ready(function(){jQuery("#latest-tweet-'.$randomid.'").tweet({modpath:"'. get_template_directory_uri().'/js/twitter/",count:1,username:"'.$username.'",loading_text:"loading twitter feed...",template:"{text}{time}{join}"});})</script>';

  return $out.$script;
}


/*-----------------------------------------------------------------------------------*/
/*  Dropcap
/*-----------------------------------------------------------------------------------*/
function erange_dropcap($atts, $content = null){
  extract(shortcode_atts(array(
    'style' => ''
    ), $atts));

  return '<span class="dropcap '.$style.'">'.do_shortcode( $content ).'</span>';
}

/*-----------------------------------------------------------------------------------*/
/*  High Light
/*-----------------------------------------------------------------------------------*/
function erange_highlight($atts, $content = null){
  extract(shortcode_atts(array(
    'color' => ''
    ), $atts));

  return '<span class="highlight '.$color.'">'.do_shortcode( $content ).'</span>';
}

/*-----------------------------------------------------------------------------------*/
/*  Useful HTML Tags
/*-----------------------------------------------------------------------------------*/

// Break Tag
function erange_br() {
  return '<br />';
}

// Clear Tag
function erange_clear() {
  return '<div class="clear"></div>';
}


/*-----------------------------------------------------------------------------------*/
/*  Divider
/*-----------------------------------------------------------------------------------*/
function erange_divider( $atts, $content = null ){
  extract(shortcode_atts(array(
    'style'      => 'simple',
    'class'      => '',
    ), $atts));

  $out = '<div class="'.$class.' divider '.$style.'"></div>';

  return $out;
}

/*-----------------------------------------------------------------------------------*/
/*  Portfolio
/*-----------------------------------------------------------------------------------*/
function erange_portfolio_list($atts, $content = null){
  extract(shortcode_atts(array(
    'number'      => '4',
    'carousel'    => '1',
    'column'      => '4',
    'title'       => '',
    'desc'  => '',
    'sub_title' => '',
    ), $atts));

  $blog_list_id = erange_rand_string(8);

  if($column == 3){
    $col = 4;
  }else {
    $col = 3;
  }

  if ($carousel == 1){
    $before_item = '<li>';
    $end_item = '</li>';
    $nav = '';
    $before = '<div class="carouselbox"><div class="row"><div class="col-md-3 bottom-sm-30"><div class="heading-area"><h5 class="large bottom-0 heading-title">'.$title.'</h5><h6 class="heading-subtitle bottom-20">'.$sub_title.'</h6></div><p>'.$desc.'</p><div class="carouselbox nav"><a href="#" class="prev"><i class="fa fa-angle-left"></i></a><a href="#" class="next"><i class="fa fa-angle-right"></i></a></div></div><div class="col-md-9"><div class="row"><ul class="list-unstyled carousel-area">';
    $after = '</ul></div></div></div></div>';

  } else {
    $before_item = '<div class="col-md-'.$col.' col-sm-6 bottom-30">';
    $end_item = '</div>';
    $nav = '';
    $before = '<div class="row">';
    $after = '</div>';
  }

  $my_args=array(
    'showposts' => $number,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'portfolio',
  );
  $out = '';

  $er_portfolio_shortcode_query = new WP_Query($my_args);
  if ( $er_portfolio_shortcode_query->have_posts() ) :
  $out .= $before;
  while ( $er_portfolio_shortcode_query->have_posts() ) : $er_portfolio_shortcode_query->the_post();
  $id = get_the_id();
  $out .= $before_item;
  $out .= '<div class="portfolio-item"><div class="portfolio-mark"><div class="portfolio-mark-content"><div class="portfolio-mark-inner">
        <div class="portfolio-mark-icon"><span class="icon"><i class="fa fa-camera"></i></span><span class="likes"><i class="fa fa-heart"></i>';
  $out .= get_post_meta( get_the_id(), "_post_like_count", true ) ? get_post_meta( get_the_id(), "_post_like_count", true ) : 0;
  $out .= '</span></div><h4 class="bottom-0"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>
       '.erange_custom_taxonomies_terms_links('portfolio_category').'
      </div></div></div><div class="portfolio-img">'.get_the_post_thumbnail($id,'portfolio' ).'</div></div>';
  $out .= $end_item;
  endwhile;

  $out .= $nav;
  $out .= $after;
  endif;wp_reset_query();
  return $out;

}

/*-----------------------------------------------------------------------------------*/
/*  Portfolio Filter
/*-----------------------------------------------------------------------------------*/
function erange_portfolio_filter($atts, $content = null){
  extract(shortcode_atts(array(
    'number'      => '4',
    'column'      => '4',
    ), $atts));

  $blog_list_id = erange_rand_string(8);

  if($column == 3){
    $col = 4;
  }else {
    $col = 3;
  }

  $nav = '';
  $nav .= '<div class="portfolio-filter-nav"><ul class="list-unstyled option-set" id="options" data-option-key="filter">';
  $terms = get_terms('portfolio_category');
  if($terms) {
      foreach ( $terms as $term ) {
         $nav .= '<li><a class="round" data-option-value=".'.$term->slug.'" href="#filter">' . $term->name . '</a></li>';
      }
  }            
  $nav .= '</ul></div>';

  $before = '<div class="portfolio-short-filter">'.$nav.'<div id="filter" class="row portfolio-filter short-filter top-40">';
  $after = '</div></div>';

  $my_args=array(
    'showposts' => $number,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'portfolio',
  );
  $out = '';

  $er_portfolio_shortcode_query = new WP_Query($my_args);
  if ( $er_portfolio_shortcode_query->have_posts() ) :
  $out .= $before;
  while ( $er_portfolio_shortcode_query->have_posts() ) : $er_portfolio_shortcode_query->the_post();
  $id = get_the_id();
  $out .= '<div class="col-md-'.$col.' col-sm-6 col-xs-12 element bottom-30 '.erange_custom_taxonomies_terms_slug('portfolio_category').'">';
  $out .= '<div class="portfolio-item"><div class="portfolio-mark"><div class="portfolio-mark-content"><div class="portfolio-mark-inner">
        <div class="portfolio-mark-icon"><span class="icon"><i class="fa fa-camera"></i></span><span class="likes"><i class="fa fa-heart"></i>';
  $out .= get_post_meta( get_the_id(), "_post_like_count", true ) ? get_post_meta( get_the_id(), "_post_like_count", true ) : 0;
  $out .= '</span></div><h4 class="bottom-0"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>
       '.erange_custom_taxonomies_terms_links('portfolio_category').'
      </div></div></div><div class="portfolio-img">'.get_the_post_thumbnail($id,'portfolio' ).'</div></div>';
  $out .= '</div>';
  endwhile;
  $out .= $after;
  endif;wp_reset_query();
  return $out;

}

/*-----------------------------------------------------------------------------------*/
/*  Blog
/*-----------------------------------------------------------------------------------*/
function erange_blog_list($atts, $content = null){
  extract(shortcode_atts(array(
    'number'      => '4',
    'carousel'    => '1',
    'column'      => '4',
    'title'       => '',
    'cat' => '',
    'tag' => '',
    'desc'  => '',
    'sub_title' => '',
    ), $atts));

  $blog_list_id = erange_rand_string(8);

  if($column == 3){
    $col = 4;
  }else {
    $col = 3;
  }

  if ($carousel == 1){
    $before_item = '<li>';
    $end_item = '</li>';
    $nav = '';
    $before = '<div class="carouselbox"><div class="row"><div class="col-md-3 bottom-sm-30"><div class="heading-area"><h5 class="large bottom-0 heading-title">'.$title.'</h5><h6 class="heading-subtitle bottom-20">'.$sub_title.'</h6></div><p>'.$desc.'</p><div class="carouselbox nav"><a href="#" class="prev"><i class="fa fa-angle-left"></i></a><a href="#" class="next"><i class="fa fa-angle-right"></i></a></div></div><div class="col-md-9"><div class="row"><ul class="list-unstyled carousel-area">';
    $after = '</ul></div></div></div></div>';

  } else {
    $before_item = '<div class="col-md-'.$col.' col-sm-6 bottom-30">';
    $end_item = '</div>';
    $before = '<div class="row'.$c_class.'">';
    $after = '</div>';
  }

  $my_args=array(
    'showposts' => $number,
    'orderby' => 'date',
    'order' => 'DESC',
    'cat' => $cat,
    'tag' => $tag,
    'ignore_sticky_posts' => 1
  );
  $out = '';

  $er_portfolio_shortcode_query = new WP_Query($my_args);
  if ( $er_portfolio_shortcode_query->have_posts() ) :
  $out .= $before;
  while ( $er_portfolio_shortcode_query->have_posts() ) : $er_portfolio_shortcode_query->the_post();
  ob_start();  
  get_template_part('framework/templates/content', 'list');  
  $ret = ob_get_contents();  
  ob_end_clean();  
  $out .= $ret;    
  
  endwhile;
  $out .= $after;
  endif;wp_reset_query();
  return $out;

}

/*-----------------------------------------------------------------------------------*/
/*  Short Blog
/*-----------------------------------------------------------------------------------*/
function erange_short_blog_list($atts, $content = null){
  extract(shortcode_atts(array(
    'number'      => '4',
    'cat' => '',
    'tag' => '',
    ), $atts));

  $blog_list_id = erange_rand_string(8);

  $my_args=array(
    'showposts' => $number,
    'orderby' => 'date',
    'order' => 'DESC',
    'cat' => $cat,
    'tag' => $tag,
    'ignore_sticky_posts' => 1
  );
  $out = '';

  $er_portfolio_shortcode_query = new WP_Query($my_args);
  if ( $er_portfolio_shortcode_query->have_posts() ) :
    $out .= '<ul class="blog-list bottom-0 list-unstyled">';
  while ( $er_portfolio_shortcode_query->have_posts() ) : $er_portfolio_shortcode_query->the_post();
 
  $out .= '<li class="entry-item bottom-30 clearfix"><div class="entry-boxinfo top-0"><div class="entry-icon">'.er_post_format_icon().'</div><div class="entry-date"><span class="date">22</span><span class="month">mar</span></div></div><div class="entry-short-info"><h4 class="entry-title bottom-10"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>'.get_the_excerpt().'</div></li>';
  endwhile;
  $out .= '</ul>';
  endif;wp_reset_query();
  return $out;

}


/*-----------------------------------------------------------------------------------*/
/*  Masonry Blog
/*-----------------------------------------------------------------------------------*/
function erange_blog_masonry($atts, $content = null){
  extract(shortcode_atts(array(
    'number'      => '4',
    'animation' => 0,
    'animation_style' => 'fadeIn',
    'cat' => '',
    'tag' => '',
    ), $atts));

  $blog_list_id = erange_rand_string(8);

  $my_args=array(
    'showposts' => $number,
    'orderby' => 'date',
    'order' => 'DESC',
    'cat' => $cat,
    'tag' => $tag,
    'ignore_sticky_posts' => 1
  );
  $out = '';
  $count = 1;
  $er_portfolio_shortcode_query = new WP_Query($my_args);
  if ( $er_portfolio_shortcode_query->have_posts() ) :
  $out .= '<div class="blog-archive-list"><div id="masonry" class="row">';
  while ( $er_portfolio_shortcode_query->have_posts() ) : $er_portfolio_shortcode_query->the_post(); $count++;
  $time = $count*.3;
  $out .= '<div class="col-md-4 col-sm-4 col-xs-12 bottom-30">';
  if($animation == 1)
    $out .= '<div class="wow '.$animation_style.'" data-wow-duration="0.6s" data-wow-delay="'.$time.'s">';
  ob_start();  
  get_template_part('framework/templates/content-masonry');  
  $ret = ob_get_contents();  
  ob_end_clean();  
  $out .= $ret;    
  if($animation == 1)
  $out .= '</div>';
  $out .= '</div>';
  endwhile;
  $out .= '</div></div>';
  wp_enqueue_script( 'jquery.masonry', get_template_directory_uri(). '/js/masonry.js', array(), false, true );
  endif;wp_reset_query();
  return $out;

}

/*-----------------------------------------------------------------------------------*/
/*  List Blog
/*-----------------------------------------------------------------------------------*/
function erange_blog_archive($atts, $content = null){
  extract(shortcode_atts(array(
    'number'      => '4',
    'layout'     => 'medium',
    'class' => '',
    ), $atts));

  $my_args=array(
    'showposts' => $number,
    'orderby' => 'date',
    'order' => 'DESC',
    'ignore_sticky_posts' => 1
  );

  $er_portfolio_shortcode_query = new WP_Query($my_args);

  $out = '';
  if ( $er_portfolio_shortcode_query->have_posts() ) :
  $out .= '<div class="content '.$class.'">';
  $out .= '<div id="blog-archive">';
  while ( $er_portfolio_shortcode_query->have_posts() ) : $er_portfolio_shortcode_query->the_post();
  ob_start();  
  get_template_part('content', $layout);  
  $ret = ob_get_contents();  
  ob_end_clean();  
  $out .= $ret;    
  endwhile;
  $out .= '</div></div>';
  endif;wp_reset_query();
  return $out;

}

/*-----------------------------------------------------------------------------------*/
/*  List Job
/*-----------------------------------------------------------------------------------*/
function erange_job_list($atts, $content = null){
  extract(shortcode_atts(array(
    'number'      => '4',
    'class' => '',
    ), $atts));

  $my_args=array(
    'showposts' => $number,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'job',
  );

  $er_portfolio_shortcode_query = new WP_Query($my_args);

  $out = '';
  if ( $er_portfolio_shortcode_query->have_posts() ) :
  $out .= '<div class="job-board '.$class.'">';
  $out .= '<ul class="list-unstyled bottom-0 jobboard">';
  while ( $er_portfolio_shortcode_query->have_posts() ) : $er_portfolio_shortcode_query->the_post();
  $out .= '<li class="clearfix"><div class="clearfix"><div class="job-content"><h4 class="bottom-0"><a href="'.get_permalink().'">'.get_the_title().'</a></h4></div></div><div class="job-info"><span class="jobtype">'.erange_custom_taxonomies_terms_links('job_type').'</span><span class="city">'.erange_custom_taxonomies_terms_links('job_place').'</span></div></li>';    
  endwhile;
  $out .= '</ul></div>';
  endif;wp_reset_query();
  return $out;

}

/*-----------------------------------------------------------------------------------*/
/*  Section
/*-----------------------------------------------------------------------------------*/
function erange_section($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => '',
    'width' => '',
    'height' => '',
    'bg'  => '',
    'bg_color' => '',
    'margin' => '',
    'padding' => '',
    ), $atts));


    if($bg){
      $bg_out = ' data-bg="'.$bg.'"';
    } else {
      $bg_out = '';
    }

    if($bg_color){
      $bg_color = ' data-bgcolor=#'.$bg_color;
    } else {
      $bg_color = '';
    }

    if($margin){
      $m_out = ' data-margin="'.$margin.'"';
    } else{
      $m_out = '';
    }

    if($padding){
      $p_out = ' data-padding="'.$padding.'"';
    } else{
      $p_out = '';
    }

  return '<div class="section '.$class.'"'.$bg_out.$bg_color.$margin.$padding.'>'.do_shortcode( $content ).'</div>';

}

/*-----------------------------------------------------------------------------------*/
/*  Testimonail Slide Item
/*-----------------------------------------------------------------------------------*/
function erange_short_testimonial($atts, $content = null){
  extract(shortcode_atts(array(
    'name' => '',
    'desc' => '',
    'class' => '',
    'avatar'  => '',
    'company' => '',
    ), $atts));


  $out = '<li><div class="row '.$class.'"><div class="col-md-4 col-sm-4 testimonial-columns hidden-xs"><div class="testimonial-avatar"><img src="'.$avatar.'" alt="" class="img-responsive"></div></div><div class="col-md-8 col-sm-8 testimonial-columns"><div class="testimonial-content"><div class="testimonial-content-detail"><p>'.do_shortcode( $content ).'</p></div><div class="testimonial-author"><span class="name">'.$name.'</span><span><i>'.$desc.'</i> of  <strong>'.$company.'</strong></span></div></div></div></div></li>';

  return $out;
}

/*-----------------------------------------------------------------------------------*/
/*  Slider
/*-----------------------------------------------------------------------------------*/
function erange_slider_wrap($atts, $content = null){

  extract(shortcode_atts(array(
    'class' => 'slider',
    ), $atts));

  return '<div class="flexslider '.$class.'"><ul class="slides">'.do_shortcode( $content ).'</ul></div>';
}
function erange_slider($atts, $content = null){
  extract(shortcode_atts(array(
    'img' => '',
    'link' => '',
    ), $atts));

  if($link){
    $before = '<a href="'.$link.'" title="">';
    $after = '</a>';
  } else {
    $before = '';
    $after = '';
  }

  return '<li>'.$before.'<img src="'.$img.'" alt="" />'.$after.'</li>';
}

/*-----------------------------------------------------------------------------------*/
/*  Sidebar
/*-----------------------------------------------------------------------------------*/
function erange_sidebar_special_area($atts, $content = null){
  extract(shortcode_atts(array(
    'name' => '',
    ), $atts));

  ob_start();
  dynamic_sidebar($name);
  $output = ob_get_contents();
  ob_end_clean();
  return '<div class="sidebar">'.$output.'</div>';
}

/*-----------------------------------------------------------------------------------*/
/*  Get Site Info
/*-----------------------------------------------------------------------------------*/
function erange_site_url( $atts ){
  return site_url();
}
function erange_site_name( $atts ){
  return '<a href="'.home_url( '/' ).'" title="'.esc_attr( get_bloginfo( 'description', 'display' )).'">'.esc_attr( get_bloginfo( 'name', 'display' )).'</a>';
}
function erange_years( $atts ){
  return date('Y');
}
function erange_theme_uri( $atts ){
  return get_template_directory_uri();
}


/*-----------------------------------------------------------------------------------*/
/*  Portfolio Infomation Fields
/*-----------------------------------------------------------------------------------*/
function erange_portfolio_field( $atts, $content = null ){
  extract(shortcode_atts(array(
      'title' => '',
  ), $atts));

  $out = '<li><span class="title">'.$title.'</span><span class="value">'.do_shortcode( $content ).'</span></li>';

  return $out;
}

function erange_center_text( $atts, $content = null ){

  $out = '<div class="text-center"><div>'.do_shortcode( $content ).'</div></div>';

  return $out;
}

function erange_span_text( $atts, $content = null ){

  $out = '<span>'.$content.'</span>';

  return $out;
}

function erange_cilent( $atts, $content = null ){

   extract(shortcode_atts(array(
      'logo' => '',
      'logo_hover' => '',
      'link' => '',
  ), $atts));

  $out = '<div class="cilent-item"><a href="'.$link.'"><img class="cilent img-resonsive" data-hover="'.wp_get_attachment_url($logo_hover).'" alt="" src="'.wp_get_attachment_url($logo).'"></a></div>';

  return $out;
}

function erange_hoverbox( $atts, $content = null ){

   extract(shortcode_atts(array(
      'title' => '',
      'desc' => '',
      'logo' => '',
      'class' => '',
  ), $atts));

  $out = '<div class="hoverbox '.$class.'"><div class="hoverbox-mark"><div class="hover-mark-content"><div class="hover-mark-content-inner"><h4 class="heading-title">'.$title.'</h4><span class="desc">'.$desc.'</span></div></div></div><img src="'.wp_get_attachment_url($logo).'" alt="" class="img-responsive"></div>';

  return $out;
}

/*-----------------------------------------------------------------------------------*/
/*  Register Shortcode
/*-----------------------------------------------------------------------------------*/
add_shortcode( 'alert', 'erange_alert' );
add_shortcode( 'button', 'erange_buttons' );
add_shortcode( 'counterbox', 'erange_counterbox' );
add_shortcode( 'counter', 'erange_counter' );
add_shortcode( 'portfolio_list', 'erange_portfolio_list' );
add_shortcode( 'portfolio_filter', 'erange_portfolio_filter' );
add_shortcode( 'blog', 'erange_blog_list' );
add_shortcode( 'blog-archive', 'erange_blog_archive' );
add_shortcode( 'blog-list', 'erange_short_blog_list' );
add_shortcode( 'blog-masonry', 'erange_blog_masonry' );
add_shortcode( 'highlight', 'erange_highlight' );
add_shortcode( 'dropcap', 'erange_dropcap' );
add_shortcode( 'tab', 'erange_tab' );
add_shortcode( 'tabgroup', 'erange_tabgroup' );
add_shortcode( 'slider', 'erange_slider_wrap' );
add_shortcode( 'slide', 'erange_slider' );
add_shortcode( 'icon', 'erange_miniicon' );
add_shortcode( 'video', 'erange_video' );
add_shortcode( 'googlefont', 'erange_googlefont' );
add_shortcode( 'team', 'erange_team' );
add_shortcode( 'testimonial', 'erange_testimonial' );
add_shortcode( 'chart', 'erange_chart' );
add_shortcode( 'skillbar', 'erange_skillbar' );
add_shortcode( 'heading', 'erange_heading' );
add_shortcode( 'br', 'erange_br' );
add_shortcode( 'clear', 'erange_clear' );
add_shortcode( 'divider', 'erange_divider' );
add_shortcode( 'site_url', 'erange_site_url' );
add_shortcode( 'theme_uri', 'erange_theme_uri' );
add_shortcode( 'sitename', 'erange_site_name' );
add_shortcode( 'years', 'erange_years' );
add_shortcode( 'iconbox', 'erange_iconbox' );
add_shortcode( 'hoverbox', 'erange_hoverbox' );
add_shortcode( 'map', 'erange_map');
add_shortcode( 'element', 'erange_element' );
add_shortcode( 'memlist', 'erange_member_list');
add_shortcode( 'partnerlist', 'erange_partner_list');
add_shortcode( 'testimonail_slide', 'erange_short_testimonial' );
add_shortcode( 'sidebar_area', 'erange_sidebar_special_area' );
add_shortcode( 'cilent', 'erange_cilent' );
add_shortcode( 'smallbox', 'erange_smallbox' );
add_shortcode( 'job-list', 'erange_job_list' );
add_shortcode( 'sliderbox', 'erange_sliderbox' );
add_shortcode( 'largeicon', 'erange_large_icon' );
add_shortcode( 'roundicon', 'erange_roundicon' );
add_shortcode( 'twitter_section', 'erange_twitter_section' );

/*-----------------------------------------------------------------------------------*/
/*  Process Shortcode
/*-----------------------------------------------------------------------------------*/
function pre_process_shortcode($content) {
  global $shortcode_tags;

    // Backup current registered shortcodes and clear them all out
  $orig_shortcode_tags = $shortcode_tags;

  remove_all_shortcodes();
  add_shortcode( 'container', 'erange_container' );
  add_shortcode( 'row', 'erange_column_row' );
  add_shortcode( 'column', 'erange_column' );
  add_shortcode( 'child_row', 'erange_column_child_row' );
  add_shortcode( 'child_column', 'erange_child_column' );
  add_shortcode( 'list-item', 'erange_list_item' );
  add_shortcode( 'list', 'erange_list' );
  add_shortcode( 'field', 'erange_portfolio_field');
  add_shortcode( 'section', 'erange_section' );
  add_shortcode( 'heading', 'erange_heading' );
  add_shortcode( 'subheading', 'erange_subheading' );
  add_shortcode( 'pricing', 'erange_pricing' );
  add_shortcode( 'toggle-item', 'erange_toggle_item' );
  add_shortcode( 'toggle', 'erange_toggle_wrap' );
  add_shortcode( 'callout', 'erange_callout' );
  add_shortcode( 'year', 'erange_timeline_year' );
  add_shortcode( 'event', 'erange_timeline_item' );
  add_shortcode( 'center', 'erange_center_text' );
  add_shortcode( 'span', 'erange_span_text' );
  add_shortcode( 'theme_uri', 'erange_theme_uri' );
  
    // Do the shortcode (only the one above is registered)
  $content = do_shortcode($content);

    // Put the original shortcodes back
  $shortcode_tags = $orig_shortcode_tags;

  return $content;
}
add_filter('the_content', 'pre_process_shortcode', 7);
add_filter('widget_text', 'pre_process_shortcode', 7);

?>
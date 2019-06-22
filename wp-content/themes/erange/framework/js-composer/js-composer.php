<?php

/*Row*/
function vc_theme_vc_row($atts, $content = null) {

  extract(shortcode_atts(array(
    'class' => '',
    'id' => '',
    'bg'  => '',
    'bg_color' => '',
    'margin' => '',
    'padding' => '',
    'border_top' => '',
    'border_bottom' => '',
    'top_content' => '',
    'bottom_content' => '',
    'bg_repeat' => 'cover',
    ), $atts));

  $out = $before_wrap = $after_wrap = $divider_top = $divider_bottom = '';

  if ($border_top == 'top'){
    $divider_top = '<div class="divider top top-30 bottom-30"></div>';
  } elseif ($border_top == 'bottom'){
    $divider_top = '<div class="divider bottom top-30 bottom-30"></div>';
  } else {
    $divider_top = '';
  }

  if ($border_bottom == 'top'){
    $divider_bottom = '<div class="divider top top-30 bottom-30"></div>';
  } elseif ($border_bottom == 'bottom'){
    $divider_bottom = '<div class="divider bottom top-30 bottom-30"></div>';
  } else {
    $divider_bottom = '';
  }

  global $post;

    if(rwmb_meta('erange_page_sidebar') == 'fullwidth' && rwmb_meta('erange_force_fw') == 1 && is_page() ){
      $before_wrap = '<div class="container">';
      $after_wrap = '</div>';
    }

    if($bg){
      $bg_out = ' data-bg="'.wp_get_attachment_url( $bg ).'"';
    } else {
      $bg_out = '';
    }

    if($bg_color){
      $bg_color = ' data-bgcolor='.$bg_color;
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

    if($id){
      $id_out = 'id="'.$id.'" ';
    } else {
      $id_out = '';
    }

  $out .= '<div '.$id_out.'class="'.$bg_repeat.' section '.$class.'"'.$bg_out.$bg_color.$m_out.$p_out.'>';
  $out .= $divider_top;
  $out .= $top_content;
  $out .= $before_wrap;
  $out .= '<div class="row">';
  $out .= wpb_js_remove_wpautop($content);
  $out .= '</div>';
  $out .= $after_wrap;
  $out .= $bottom_content;
  $out .= $divider_bottom;
  $out .= '</div>';

  return $out;

}

/*Row Inner*/
function vc_theme_vc_row_inner($atts, $content = null) {

  extract(shortcode_atts(array(
    'el_class' => '',
    'pt' => '',
    'pb' => ''
  ), $atts));

  $el_class = $el_class? ' '.$el_class:'';

  $output = '<div class="row clearfix'.$el_class.'">';
  $output .= wpb_js_remove_wpautop($content);
  $output .= '</div>';

  return $output;
}

/*Column*/
function vc_theme_vc_column($atts, $content = null) {

  $style = $animation = $animation_time = '';

  extract(shortcode_atts(array(
    'el_class' => '',
    'pt' => '',
    'pb' => '',
    'width' => '1/1',
    'animation' => '0',
    'animation_style' => 'fadeInDown',
    'animation_time' => '0.6',
    'animation_delay' => '0.3',
    'inner_class' => '',
    'inner_margin' => '',
    'inner_padding' => '',
  ), $atts));

  $width = wpb_translateColumnWidthToSpan($width);
  $el_class = $el_class? ' '.$el_class:'';
  $class = $width.$el_class;

  if($animation == 1){
    $a_t = '<div class="wow '.$animation_style.'" data-wow-duration="'.$animation_time.'s" data-wow-delay="'.$animation_delay.'s">';
    $a_b = '</div>';
  } else {
    $a_t = $a_b = '';
  }

  $m_out = $p_out = '';

  if($inner_margin)
  $m_out = ' data-margin="'.$inner_margin.'"';

  if($inner_padding)
  $p_out = ' data-padding="'.$inner_padding.'"';

  $output = '<div class="'.$class.'">';
  $output .= '<div class="element '.$inner_class.'" '.$m_out.' '.$p_out.'>';
  $output .= $a_t;
  $output .= wpb_js_remove_wpautop($content);
  $output .= $a_b;
  $output .= '</div>';
  $output .= '</div>';

  return $output;
}

/*Column Inner*/
function vc_theme_vc_column_inner($atts, $content = null) {

  $style = $animation = '';

  extract(shortcode_atts(array(
    'el_class' => '',
    'pt' => '',
    'pb' => '',
    'width' => '1/1',
    'animation' => '0',
    'animation_style' => 'fadeInDown',
    'animation_time' => '0.6',
    'animation_delay' => '0.3',
    'inner_class' => '',
    'inner_margin' => '',
    'inner_padding' => '',
  ), $atts));

  $width = wpb_translateColumnWidthToSpan($width);
  $el_class = $el_class? ' '.$el_class:'';
  $class = $width.' wpb_column column_container'.$el_class;

  if($animation == 1){
    $a_t = '<div class="wow '.$animation_style.'" data-wow-duration="'.$animation_time.'s" data-wow-delay="'.$animation_delay.'s">';
    $a_b = '</div>';
  } else {
    $a_t = $a_b = '';
  }

  $m_out = $p_out = '';

  if($inner_margin)
  $m_out = ' data-margin="'.$margin.'"';

  if($inner_padding)
  $p_out = ' data-padding="'.$padding.'"';

  $output = '<div class="'.$class.'">';
  $output .= '<div class="element '.$inner_class.'" '.$m_out.' '.$p_out.'>';
  $output .= $a_t;
  $output .= wpb_js_remove_wpautop($content);
  $output .= $a_b;
  $output .= '</div>';
  $output .= '</div>';

  return $output;
}

/*Accordion*/
function vc_theme_vc_accordion($atts, $content = null) {

	extract(shortcode_atts(array(
    'class' => '',
    'style' => 'solid',
    ), $atts));

  $GLOBALS['toggle_id'] = erange_rand_string(8);

  return '<div id="acc-'.$GLOBALS['toggle_id'].'" class="'.$style.' accordion '.$class.'">'.wpb_js_remove_wpautop($content).'</div>';
}


function vc_theme_vc_accordion_tab($atts, $content = null) {

	extract(shortcode_atts(array(
    'class' => '',
    'open' => '',
    'title' => ''
    ), $atts));

  if($open == 1){
    $class_open = 'in';
    $class_open_1 = '';
  } else {
    $class_open = '';
    $class_open_1 = 'class="collapsed"';
  }

  $toggle_item_id = erange_rand_string(8);

  return '<div class="panel accordion-item"><div class="accordion-heading"><h5 class="accordion-title"><a '.$class_open_1.' data-toggle="collapse" data-parent="#acc-'.$GLOBALS['toggle_id'].'" href="#collapse-'.$toggle_item_id.'">'.$title.'<span class="icon"><i class="fa-icon"></i></span></a></h5></div>
  <div id="collapse-'.$toggle_item_id.'" class="accordion-collapse collapse '.$class_open.'"><div class="accordion-body">'.wpb_js_remove_wpautop($content).'</div></div></div>';
}


/*Tabs*/
function vc_theme_vc_tabs($atts, $content = null) {

	extract(shortcode_atts(array(
    'style' => 'main',
    'class' => '',
    ), $atts));


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

      if($style != 'timeline'){
        $tabs[] = '<li class="tab"><a data-toggle="tab" href="#panel'.$randomid.$i.'">'.$icon . $tab['title'].'</a></li>';
        $panes[] = '<div class="tabs-container" id="panel'.$randomid.$i.'"><p>'.wpb_js_remove_wpautop($tab['content']).'</p></div>';
      } else {
        $tabs[] = '<li class="col-md-'.$tab['column'].' col-sm-'.$tab['column'].' col-xs-'.$tab['column'].'"><a href="#panel'.$randomid.$i.'" data-toggle="tab"><span>'.$tab['year'].'</span></a></li>';
        $panes[] = '<div class="timeline-content fade" id="panel'.$randomid.$i.'"><span class="timeline-icon">'.$icon.'</span>'.wpb_js_remove_wpautop($tab['content']).'</div>';
      };

      $i++;
      $icon = '';
    }

    $script = '<script type="text/javascript">jQuery(document).ready(function($){jQuery("#tab-'.$tabid.' a:first").tab("show");})</script>';

    if($style != 'timeline'){

      $return = '<div id="tab-'.$tabid.'" class="clearfix tabs '.$style.' '.$class.'"><ul class="tabNavigation clearfix list-unstyled bottom-0">'.implode( "\n", $tabs ).'</ul>'.implode( "\n", $panes ).'</div>'.$script;
    } else {
      $return = '<div id="tab-'.$tabid.'" class="clearfix '.$style.' '.$class.'">'.implode( "\n", $panes ).'<ul class="timelinenav row list-unstyled bottom-0">'.implode( "\n", $tabs ).'</ul></div>'.$script;
    };
  }
  return $return;
}

/*Tab*/
function vc_theme_vc_tab($atts, $content = null) {

	extract(shortcode_atts(array(
    'title' => '',
    'icon'  => '',
    'year'  => '',
    'column'  => '',
    ), $atts));
  
  $x = $GLOBALS['tab_count'];
  $GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'icon' => $icon, 'content' =>  $content, 'year' => $year, 'column' => $column, );
  $GLOBALS['tab_count']++;
}

?>
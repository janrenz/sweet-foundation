<?php

// shortcodes

// Gallery shortcode
// !TODO, rewrite and test this
// remove the standard shortcode
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'sf_gallery_shortcode');

function sf_gallery_shortcode($attr) {
	global $post, $wp_locale;
    $attachments = array();
    $output = $outputCaptions = '';
extract( shortcode_atts( array(
    'class' => 'featured', /* radius, round */
    'slidesize' => 'sf_slider_gallery'
    ), $attr ) );
	$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
	//check if there is a post thumbnail
    if ( has_post_thumbnail() ) {
		
		$attachments[] = get_post(get_post_thumbnail_id());
	} 
	array_merge($attachments, get_posts($args));
	if ($attachments) {
	//$output = '<div >';
		$output .= '<div class="row"><div class="twelve columns"><div id="featured" class="'.$class.'">';
		foreach ( $attachments as $attachment ) {
			$output .= '<div data-caption="#orbit_'.$post->ID.'_'.$attachment->ID.'">';
			//var_dump($attachment);  
			$att_title = apply_filters( 'the_title' , $attachment->post_title );
			$output .= wp_get_attachment_image( $attachment->ID , $slidesize);
			$output .= '</div>';
			$outputCaptions .= '<span class="orbit-caption" id="orbit_'.$post->ID.'_'.$attachment->ID.'">'.$attachment->post_excerpt.'</span>';
    
		}
		//$output .= '</ul>';
    $output .= '</div></div></div>';
        
	}
    
    $output .= $outputCaptions;
	return $output;
}



// Buttons
function sf_buttons( $atts, $content = null ) {
    extract( shortcode_atts( array(
    'type' => null, /* radius, round */
    'size' => null, /* tiny, small, medium, large */
    'style' => null, /* success, alert, secondary */
    'target' => '_self',
    'url'  => '',
    'classes' => false,      
    ), $atts ) );
    $cssclasses = array ( 'button' );
    if ($size)  $cssclasses[] = $size;
    if ($type)  $cssclasses[] = $type;
    if ($style) $cssclasses[] = $style;
    
    $output = '<a href="' . $url . '" target="' . $target . '" class="'. implode (' ', $cssclasses);
    if( $classes ){ $output .= ' '.$classes; }
    $output .= '">';
    $output .= do_shortcode($content);
    $output .= '</a>';
    
    return $output;
}

add_shortcode('button', 'sf_buttons'); 


// Alerts
// http://foundation.zurb.com/docs/elements.php

function sf_alerts( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => '	', /* [success alert secondary] */
	'close' => FALSE, /* display close link */
	), $atts ) );

	$output = '<div class="fade in alert-box '. $type . '">';
	$output .= do_shortcode(trim($content));
	if($close == 'true') {
		$output .= '<a class="close" href="#">×</a>';
	}
	$output .='</div>';
	return $output;
}

add_shortcode('alert', 'sf_alerts');

// Panels
// http://foundation.zurb.com/docs/elements.php

function sf_panels( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'callout' => FALSE,
	'classes' => NULL,
	), $atts ) );
	$cssclasses = array ( 'panel' );
    
    if ($callout)  $cssclasses[] = 'callout';
    if ($classes)  $cssclasses[] = $classes;
    
	$output = '<div class="'.implode (' ', $cssclasses).'">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	
	return $output;
}

add_shortcode('panel', 'sf_panels');

//divider

function sf_divider	( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'classes' => NULL,
	), $atts ) );
	$cssclasses = array ( 'divide-space' );
	$output = '<div class="'.implode (' ', $cssclasses).'"></div>';


	return $output;
}

add_shortcode('divider', 'sf_divider');

//divider

function sf_spacer	( $atts, $content = null ) {

	$output = '<div style="padding-top:'.$atts[0].'px"></div>';

	return $output;
}

add_shortcode('spacer', 'sf_spacer');




//Grid Stuff


//rows
function sf_rows( $atts, $content = null ) {
    extract( shortcode_atts( array(
    'classes' => NULL,
    ), $atts ) );
    $cssclasses = array ( 'row' );
    
    if ($classes)  $cssclasses[] = $classes;
    
    $output = '<div class="'.implode (' ', $cssclasses).'">';
    $output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
}

add_shortcode('row', 'sf_rows');

//columns
function sf_cols ( $atts, $content = null ) {
    extract( shortcode_atts( array(
    'count' => 12,		
    'classes' => NULL,
    ), $atts ) );
    $cssclasses = array ( 'columns' );
    switch ($count) {
          case 1:
            $cssclasses[] = 'one';
            break;
          case 2:
            $cssclasses[] = 'two';
            break;
          case 3:
            $cssclasses[] = 'three';
            break;
          case 4:
            $cssclasses[] = 'four';
            break;
          case 5:
            $cssclasses[] = 'five';
            break;
          case 6:
            $cssclasses[] = 'six';
            break;
          case 7:
            $cssclasses[] = 'seven';
            break;
          case 8:
            $cssclasses[] = 'eight';
            break;
          case 9:
            $cssclasses[] = 'nine';
            break;
        case 10:
            $cssclasses[] = 'ten';
            break;
        case 11:
            $cssclasses[] = 'eleven';
            break;
        case 12:
            $cssclasses[] = 'twelve';
            break;
        
        default:
            break;
    }
    if ($classes)  $cssclasses[] = $classes;
    
    $output = '<div class="'.implode (' ', $cssclasses).'">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    
    return $output;
}

add_shortcode('col', 'sf_cols');
?>
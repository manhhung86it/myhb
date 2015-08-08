<?php
/*==============================
Bootstrap Tooltip
================================
Options
=======
animation -	boolean	true	apply a css fade transition to the tooltip
html -	boolean	true	Insert html into the tooltip. If false, jquery's text method will be used to insert content into the dom. Use text if you're worried about XSS attacks.
placement -	string|function	'top'	how to position the tooltip - top | bottom | left | right
selector -	string	false	If a selector is provided, tooltip objects will be delegated to the specified targets.
title -	string | function	''	default title value if `title` tag isn't present
trigger -	string	'hover'	how tooltip is triggered - click | hover | focus | manual
delay -	number | object	0	delay - showing and hiding the tooltip (ms) - does not apply to manual trigger type. If a number is supplied, delay is applied to both hide/show, Object structure is: delay: { show: 500, hide: 100 }
*/
if (!function_exists('tp_bs_tooltip')) {
	function tp_bs_tooltip( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'animation' => 'true',
			'html' => 'true',
			'placement' => 'top',
			'selector' => 'false',
			'title' => '',
			'trigger' => 'hover',
			'delayshow' => '0',
			'delayhide' => '0'
		), $atts));
		$content = parse_shortcode_content( $content );
		$unique = uniqid("bs_tooltip_");
	   return '<span id="'.$unique.'" data-animation='.$animation.' data-html='.$html.' data-placement="'.$placement.'" data-selector="'.$selector.'" data-title="'.$title.'" data-trigger="'.$trigger.'">' . do_shortcode($content) . '</span><script>jQuery(document).ready(function(){jQuery("#'.$unique.'").tooltip({delay:{show:'.$delayshow.' , hide:'.$delayhide.'}})});</script>';
	}
	add_shortcode('bs_tooltip', 'tp_bs_tooltip');
}

/*==============================
Bootstrap Popover
================================
Options
=======
animation	boolean	true	apply a css fade transition to the tooltip
html	boolean	true	Insert html into the popover. If false, jquery's text method will be used to insert content into the dom. Use text if you're worried about XSS attacks.
placement	string|function	'right'	how to position the popover - top | bottom | left | right
selector	string	false	if a selector is provided, tooltip objects will be delegated to the specified targets
trigger	string	'click'	how popover is triggered - click | hover | focus | manual
title	string | function	''	default title value if `title` attribute isn't present
content	string | function	''	default content value if `data-content` attribute isn't present
delay	number | object	0
delay showing and hiding the popover (ms) - does not apply to manual trigger type, If a number is supplied, delay is applied to both hide/show Object structure is: delay: { show: 500, hide: 100 }*/
if (!function_exists('tp_bs_popover')) {
	function tp_bs_popover( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'animation' => 'true',
			'html' => 'true',
			'placement' => 'top',
			'selector' => 'false',
			'title' => '',
			'trigger' => 'hover',
			'delayshow' => '0',
			'delayhide' => '0',
			'body' => ''
		), $atts));
		$content = parse_shortcode_content( $content );
		$unique = uniqid("bs_popover_");
	   return '<span id="'.$unique.'" data-animation='.$animation.' data-html='.$html.' data-placement="'.$placement.'" data-selector="'.$selector.'" data-title="'.$title.'" data-content="'.$body.'" data-trigger="'.$trigger.'" data-delayShow='.$delayshow.' data-delayHide='.$delayhide.'>' . do_shortcode($content) . '</span><script>jQuery(document).ready(function(){jQuery("#'.$unique.'").popover({delay:{show:'.$delayshow.' , hide:'.$delayhide.'}})});</script>';	}
	add_shortcode('bs_popover', 'tp_bs_popover');
}

/*==============================
Bootstrap Button
================================
Options
=======
type - string '' Default is normal button, possible toggle or stateful
id - string uniqueID ID could be set to use in JavaScript (e. g. for the type "stateful")
url - string javascript:void('0'); Use a link, a javascript function or # if the type is "state" the called function should reset the button to jQuery("#yourbuttonID").button('reset') after completition
target - string '' if button has a link url you could use this target
state - string '' if type = state the state text
class - string '' possible -> primary,info,success,warning,danger,inverse,link
size - string '' large, small, mini
}*/
if (!function_exists('tp_bs_button')) {
	function tp_bs_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '',
			'target' => '',
			'type' => '',
			'state' => '',
			'class' => '',
			'size' => '',
			'block' => '',
			'disabled' => '',
			'extra_class' => '',
			'id' => uniqid("bs_button_")
		), $atts));


		if(!empty($atts["content"]) && empty($content) ) $content = $atts["content"];
		if($class!="") $class = "btn-".$class;
		if($size!="") $size = "btn-".$size;
		if($block!="") $block = "btn-block";
		if($disabled!="") $disabled = "disabled";

		switch ($type) {
			case "stateful":
				$button = '<div id="'.$id.'" class="btn '.$class.' '.$size.' '.$block.' '.$disabled.' '.$extra_class.'" data-loading-text="'.$state.'" onclick="javascript:jQuery(\'#'.$id.'\').button(\'loading\');">'.$content.'</div>';
			break;
		  	case "toggle":
		  		$button = '<div id="'.$id.'" class="btn '.$class.' '.$size.' '.$block.' '.$disabled.' '.$extra_class.'" data-toggle="button">'.$content.'</div>';
		  	break;
		  	default:
		  	   $button = '<div id="'.$id.'" class="btn '.$class.' '.$size.' '.$block.' '.$disabled.' '.$extra_class.'">'.$content.'</div>';
		    break;
	    }

	    if($url!=""){
	    	if($target!="") $target="target='$target'";
	    	$button = '<a href="'.$url.'" '.$target.'>'.$button.'</a>';
	    }

	   	return $button;
	}
	add_shortcode('bs_button', 'tp_bs_button');
}

/*==============================
Bootstrap Button Group
================================
Options
=======
type - string radio  Checkbox behaviour or Radio behaviour
}*/
if (!function_exists('tp_bs_button_group')) {
	function tp_bs_button_group( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'type' => 'radio'
		), $atts));

		$button_group = '<div class="btn-group" data-toggle="buttons-'.$type.'">'.do_shortcode($content).'</div>';
	   	return $button_group;
	}
	add_shortcode('bs_button_group', 'tp_bs_button_group');
}


/*==============================
Bootstrap Alerts
================================
Options
=======
type - string '' empty = default, error, success, info
close - string 'x' Closing Char
}*/
if (!function_exists('tp_bs_alert')) {
	function tp_bs_alert( $atts, $content = null ) {
			extract(shortcode_atts(array(
				'type' => '',
				'close' => 'x'
			), $atts));

			if(!empty($atts["content"]) && empty($content) ) $content = $atts["content"];

			if($close!="") $close='<button class="close" type="button" data-dismiss="alert">'.$close.'</button>';

			$box='<div class="alert alert-'.$type.' fade in">'.$close.do_shortcode($content).'</div>';

		    return $box;
		}
		add_shortcode('bs_alert', 'tp_bs_alert');
}

/*==============================
Bootstrap Tabs
================================
Options
=======
'title' string ''
*/
if (!function_exists('tp_bs_tabs')) {
	function tp_bs_tabs( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

		$output = '<div class="bs-docs-example">';

		$uniq = uniqid("tabs_");

		if( count($tab_titles) ){
		   $output .= '<ul id="'.$uniq.'" class="nav nav-tabs">';

			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#tab-'. sanitize_title( $tab[0] ) .'"  data-toggle="tab">' . $tab[0] . '</a></li>';
			}

		    $output .= '</ul><div id="myTabContent" class="tab-content">';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div><script>jQuery("#myTabContent div:first , #'.$uniq.' li:first").addClass("active in");</script>';
		} else {
			$output .= do_shortcode( $content );
		}

		return $output;
	}
	add_shortcode( 'bs_tabs', 'tp_bs_tabs' );
}
if (!function_exists('tp_bs_tab')) {
	function tp_bs_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );

		return '<div id="tab-'. sanitize_title( $title ) .'" class="tab-pane fade">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'bs_tab', 'tp_bs_tab' );
}

/*==============================
Bootstrap Toggles
================================
Options
=======
'toggles' string ''
*/
$parent_acc = uniqid("_");
if (!function_exists('tp_bs_collapse')) {
	function tp_bs_collapse( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		global $parent_acc;
		$output = '<div id="accordion'.$parent_acc.'" class="accordion">'.do_shortcode($content)."</div>";

		return $output;
	}
	add_shortcode( 'bs_collapse', 'tp_bs_collapse' );
	add_shortcode( 'vc_accordion', 'tp_bs_collapse' );
}
if (!function_exists('tp_bs_collapse_item')) {
	function tp_bs_collapse_item( $atts, $content = null ) {
		$defaults = array( 'title' => 'Toggle', 'active' => '' );
		extract( shortcode_atts( $defaults, $atts ) );
		global $parent_acc;
		$unique = uniqid();

		if($active=="active")$active_in="in";
		else $active_in = "";

		$returnlist = '<div class="accordion-group '.$active.'">
			            <div class="accordion-heading">
			                <a class="accordion-toggle collapsed" href="#collapse'.$unique.'" data-parent="#accordion'.$parent_acc.'" data-toggle="collapse"><div class="showicon icon-plus"></div><div class="hideicon icon-minus"></div>'.$title.'</a>
		            </div>

		            <div id="collapse'.$unique.'" class="accordion-body collapse '.$active_in.'">
		                <div class="accordion-inner">'.do_shortcode($content).'</div>
		            </div>
		        </div>';
		 return $returnlist;
	}
	add_shortcode( 'bs_collapse_item', 'tp_bs_collapse_item' );
	add_shortcode( 'vc_accordion_tab' , 'tp_bs_collapse_item' );
}

/*==============================
Bootstrap Labels
================================
Options
=======
type - string '' (empty = )default, warning, inverse, success, info, important
}*/
if (!function_exists('tp_bs_label')) {
	function tp_bs_label( $atts, $content = null ) {
			extract(shortcode_atts(array(
				'type' => ''
			), $atts));

			$label='<span class="label label-'.$type.'">'.do_shortcode($content).'</span>';

		    return $label;
		}
		add_shortcode('bs_label', 'tp_bs_label');
}

/*==============================
Bootstrap Badges
================================
Options
=======
type - string '' (empty = )default, warning, inverse, success, info, important
}*/
if (!function_exists('tp_bs_badge')) {
	function tp_bs_badge( $atts, $content = null ) {
			extract(shortcode_atts(array(
				'type' => ''
			), $atts));

			$label='<span class="badge badge-'.$type.'">'.do_shortcode($content).'</span>';

		    return $label;
		}
		add_shortcode('bs_badge', 'tp_bs_badge');
}

?>
<?php
// Register Shortcode -------------------------------------------------------------------------- >
if ( !function_exists('vcex_icon_shortcode')) {
	function vcex_icon_shortcode( $atts, $content = NULL ) {
		
		extract( shortcode_atts( array(
				'unique_id'		=> '',
				'icon'				=> 'cloud',
				'style'				=> 'circle',
				'float'				=> 'left',
				'size'				=> 'normal',
				'color'				=> '#000',
				'add_background'	=> '',
				'background'		=> '',
				'border_radius'	=> '99px',
				'css_animation'	=> '',
		), $atts ) );
		
		$color_css = 'color:'. $color .';';
		
		$background_css=$border_radius_css='';
		if ( $add_background == 'yes' ) {
			$background_css = 'background-color:'. $background .';';
			$border_radius_css = 'border-radius:'. $border_radius .';';
		}
		
		$unique_id = $unique_id ? ' id="'. $unique_id .'"' : NULL;
		
		$css_animation_classes = '';
		if ( $css_animation !== '' ) {
			$css_animation_classes = 'wpb_animate_when_almost_visible wpb_'. $css_animation .'';
		}
		
		$remove_dimensions = '';
		if ( $add_background !== 'yes' ) {
			$remove_dimensions = 'remove-dimensions';
		}
			
		$output = '<div class="vcex-icon vcex-icon-'. $style.' vcex-icon-'. $size .' vcex-icon-float-'. $float .' '. $css_animation_classes .' '. $remove_dimensions .'"'. $unique_id.' style="'. $background_css . $color_css . $border_radius_css .'"><span class="fa fa-'. $icon .'"></span></div>';
		
		return $output;
	}
}
add_shortcode( 'vcex_icon', 'vcex_icon_shortcode' );




// Add to visual composer -------------------------------------------------------------------------- >
vc_map( array(
	"name"					=> __( "Icon", 'vcex' ),
	"base"					=> "vcex_icon",
	"class"					=> "",
	"category"				=> __( "Icons", "wpex" ),
	'admin_enqueue_js'		=> "",
	'admin_enqueue_css'	=> "",
	"icon" 					=> "icon-wpb-vcex-icon",
	"params"				=> array(
		array(
			"type"			=> "dropdown",
			"class"			=> "",
			"heading"		=> __( "Icon", 'vcex' ),
			"param_name"	=> "icon",
			"admin_label"	=> true,
			"description"	=> sprintf( __( 'Select a FontAwesome icon. See all the icons at %s', 'vcex' ), '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' ),
			"value"			=> vcex_font_icons_array(),
		),
		array(
		  "type"			=> "dropdown",
		  "heading"		=> __("CSS Animation", "wpex"),
		  "param_name"		=> "css_animation",
		  "admin_label"	=> true,
		  "value"			=> array(
		  		__("No", "wpex")					=> '',
				__("Top to bottom", "wpex")		=> "top-to-bottom",
				__("Bottom to top", "wpex")		=> "bottom-to-top",
				__("Left to right", "wpex")		=> "left-to-right",
				__("Right to left", "wpex")		=> "right-to-left",
				__("Appear from center", "wpex")	=> "appear"),
		  "description"	=> __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "wpex"),
		 "dependency" => Array('element'	=> "icon", 'not_empty' => true )
		),
		array(
			"type"			=> "dropdown",
			"class"			=> "",
			"heading"		=> __( "Icon Size", 'vcex' ),
			"param_name"	=> "size",
			"description"	=> __( "Select an icon size.", 'vcex' ),
			"value"			=> array(
				 __( "Extra Large", "wpex" )	=> "xlarge",
				 __( "Large", "wpex" )			=> "large",
				 __( "Normal", "wpex" )		=> "normal",
				 __( "Small", "wpex")			=> "small",
				 __( "Tiny", "wpex" )			=> "tiny",
			),
			"dependency" => Array('element'	=> "icon", 'not_empty' => true )
		),
		
		array(
			"type"			=> "dropdown",
			"class"			=> "",
			"heading"		=> __( "Float", 'vcex' ),
			"param_name"	=> "float",
			"value"			=> array(
				 __( "Center", "wpex" )	=> "center",
				 __( "Left", "wpex")		=> "left",
				 __( "Right", "wpex" )		=> "right",
			),
			"dependency" => Array('element'	=> "icon", 'not_empty' => true ),
		),
		array(
			"type"			=> "colorpicker",
			"class"			=> "",
			"heading"		=> __( "Icon Color", 'vcex' ),
			"param_name"	=> "color",
			"value"			=> "#000000",
			"dependency"	=> Array('element'	=> "icon", 'not_empty' => true )
		),
		 array(
			"type"			=> 'checkbox',
			"heading"		=> __("Add Background Color?", "wpex"),
			"param_name"	=> "add_background",
			"description"	=> __("If selected, your icon will have a background color and display as a block.", "wpex"),
			"value"			=> Array(__("Yes, please", "wpex") => 'yes' ),
			"dependency"	=> Array('element'	=> "icon", 'not_empty' => true )
		),
		array(
			"type"			=> "colorpicker",
			"class"			=> "",
			"heading"		=> __( "Background Color", 'vcex' ),
			"param_name"	=> "background",
			"value"			=> "",
			"dependency"	=> Array( 'element'	=> "add_background", 'not_empty' => true ),
		),
		array(
			"type"			=> "textfield",
			"class"			=> "",
			"heading"		=> __( "Border Radius", 'vcex' ),
			"param_name"	=> "border_radius",
			"value"			=> "99px",
			"description"	=> __( "Change the background border radius (99px for a circle, down to 0px for a square)", 'vcex' ),
			"dependency"	=> Array( 'element'	=> "add_background", 'not_empty' => true ),
		),
	)
) );
?>
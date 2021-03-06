<?php
$output = $el_class = $image = $img_size = $img_link = $img_link_target = $img_link_large = $title = $alignment = $css_animation = '';

extract(shortcode_atts(array(
    'title' => '',
    'image' => $image,
    'img_size' => 'thumbnail',
    'img_link_large' => false,
    'img_link' => '',
    'img_link_target' => '_self',
    'alignment' => 'left',
    'el_class' => '',
    'css_animation' => '',
	'img_hover' => '',
	'img_caption' => '',
), $atts));

$img_id = preg_replace('/[^\d]/', '', $image);
$img = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => $img_size ));
if ( $img == NULL ) $img['thumbnail'] = '<img src="http://placekitten.com/g/400/300" /> <small>'.__('This is image placeholder, edit your page to replace it.', 'js_composer').'</small>';

$el_class = $this->getExtraClass($el_class);

$link_to = '';
$a_class='';
if ( $img_hover ) { 
	$a_class .= 'vcex-img-hover-parent vcex-img-hover-'. $img_hover;
}
if ($img_link_large==true) {
    $link_to = wp_get_attachment_image_src( $img_id, 'large');
    $link_to = $link_to[0];
	$a_class .= ' vcex-lightbox';
}
else if (!empty($img_link)) {
    $link_to = $img_link;
}

$image_string = '';
if(!empty($link_to) && !preg_match('/^(https?\:\/\/|\/\/)/', $link_to)) $link_to = 'http://'.$link_to;
if ( !empty($link_to) ) {
	$image_string .= '<a class="'.$a_class.'" href="'.$link_to.'"'.($img_link_target!='_self' ? ' target="'.$img_link_target.'"' : '').'>';
}
if ( $img_caption ) {
	$image_string .='<span class="wpb_single_image_caption">'. $img_caption .'</span>';
}
$image_string .= $img['thumbnail'];
if ( !empty($link_to) ) {
	$image_string .='</a>';
}

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_single_image wpb_content_element'.$el_class, $this->settings['base']);
$css_class .= $this->getCSSAnimation($css_animation);

$css_class .= ' vc_align_'.$alignment;

$output .= "\n\t".'<div class="'.$css_class.'">';
$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= "\n\t\t\t".wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_singleimage_heading'));
$output .= "\n\t\t\t".$image_string;
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_single_image');

echo $output;
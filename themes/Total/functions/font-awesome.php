<?php
/**
 * Creates an array of Font Awesome Icons v3.0
 *
 * Learn more: http://fortawesome.github.io/Font-Awesome/
 *
 * @package WordPress
 * @subpackage Total
 * @since Total 1.0
 */

if ( ! function_exists( 'wpex_get_awesome_icons' ) ) { 
	function wpex_get_awesome_icons() {
			$awesome_icons = array('none','adjust','adn','align-center','align-justify','align-left','align-right','ambulance','anchor','android','angle-double-down','angle-double-left','angle-double-right','angle-double-up','angle-down','angle-left','angle-right','angle-up','apple','archive','arrow-circle-down','arrow-circle-left','arrow-circle-o-down','arrow-circle-o-left','arrow-circle-o-right','arrow-circle-o-up','arrow-circle-right','arrow-circle-up','arrow-down','arrow-left','arrow-right','arrow-up','arrows','arrows-alt','arrows-h','arrows-v','asterisk','backward','ban','bar-chart-o','barcode','bars','beer','bell','bell-o','bitbucket','bitbucket-square','bitcoin','bold','book','bookmark','bookmark-o','briefcase','bug','building-o','bullhorn','bullseye','calendar','calendar-o','camera','camera-retro','caret-down','caret-left','caret-right','caret-up','certificate','chain','check','check-circle','check-circle-o','check-square','check-square-o','chevron-circle-down','chevron-circle-left','chevron-circle-right','chevron-circle-up','chevron-down','chevron-left','chevron-right','chevron-up','circle','circle-o','clock-o','cloud','cloud-download','cloud-upload','cny','code','code-fork','coffee','columns','comment','comment-o','comments','comments-o','compass','compress','copy','credit-card','crop','crosshairs','css3','cut','cutlery','dashboard','dedent','desktop','dollar','dot-circle-o','download','dribbble','dropbox','edit','eject','ellipsis-h','ellipsis-v','envelope','envelope-o','eraser','euro','exchange','exclamation','exclamation-circle','expand','external-link','external-link-square','eye','eye-slash','facebook','facebook-square','fast-backward','fast-forward','female','fighter-jet','file','file-o','file-text','file-text-o','film','filter','fire','fire-extinguisher','flag','flag-checkered','flag-o','flash','flask','flickr','folder','folder-o','folder-open','folder-open-o','font','forward','foursquare','frown-o','gamepad','gbp','gear','gears','gift','github','github-alt','github-square','gittip','globe','google-plus','google-plus-square','group','h-square','hand-o-down','hand-o-left','hand-o-right','hand-o-up','hdd-o','headphones','heart','heart-o','home','hospital-o','html5','inbox','indent','info','info-circle','instagram','italic','key','keyboard-o','laptop','leaf','legal','lemon-o','level-down','level-up','lg{font-size','lightbulb-o','linkedin','linkedin-square','linux','list','list-alt','list-ol','list-ul','location-arrow','lock','long-arrow-down','long-arrow-left','long-arrow-right','long-arrow-up','magic','magnet','mail-forward','mail-reply','mail-reply-all','male','map-marker','maxcdn','medkit','meh-o','microphone','microphone-slash','minus','minus-circle','minus-square','minus-square-o','mobile-phone','money','moon-o','music','pagelines','paperclip','paste','pause','pencil','pencil-square','phone','phone-square','picture-o','pinterest','pinterest-square','plane','play','play-circle','play-circle-o','plus','plus-circle','plus-square','plus-square-o','power-off','print','puzzle-piece','qrcode','question','question-circle','quote-left','quote-right','random','refresh','renren','reply-all','retweet','road','rocket','rotate-left','rotate-right','rss','rss-square','ruble','rupee','save','search','search-minus','search-plus','share-square','share-square-o','shield','shopping-cart','sign-in','sign-out','signal','sitemap','skype','smile-o','sort-alpha-asc','sort-alpha-desc','sort-amount-asc','sort-amount-desc','sort-down','sort-numeric-asc','sort-numeric-desc','sort-up','spinner','square','square-o','stack-exchange','stack-overflow','star','star-half','star-half-empty','star-o','step-backward','step-forward','stethoscope','stop','strikethrough','subscript','suitcase','sun-o','superscript','table','tablet','tag','tags','tasks','terminal','text-height','text-width','th','th-large','th-list','thumb-tack','thumbs-down','thumbs-o-down','thumbs-o-up','thumbs-up','ticket','times','times-circle','times-circle-o','tint','toggle-down','toggle-left','toggle-right','toggle-up','trash-o','trello','trophy','truck','tumblr','tumblr-square','turkish-lira','twitter','twitter-square','umbrella','underline','unlink','unlock','unlock-alt','unsorted','upload','user','user-md','video-camera','vimeo-square','vk','volume-down','volume-off','volume-up','warning','weibo','wheelchair','windows','won','wrench','xing','xing-square','youtube','youtube-play','youtube-square','cog','cogs');
		$awesome_icons = array_combine( $awesome_icons, $awesome_icons );
		return apply_filters( 'wpex_get_awesome_icons', $awesome_icons );
	}
}


// This array is used for meta options
if ( ! function_exists( 'wpex_get_meta_awesome_icons' ) ) { 
	function wpex_get_meta_awesome_icons() {
		$awesome_icons = wpex_get_awesome_icons();
		$return_array = array();
		foreach ( $awesome_icons as $awesome_icon ) :
			$return_array[] = array( 'name' => $awesome_icon, 'value' => $awesome_icon );
		endforeach;		
		return $return_array;
	}
}
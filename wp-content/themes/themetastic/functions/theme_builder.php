<?php

// Targets
	$target_arr = array(__("Same window", "js_composer") => "_self", __("New window", "js_composer") => "_blank");

// Portfolios
	$portfolios = get_option("themetastic_theme_portfolios_options");
	$portfolio_slugs = array();
	$portfolio_name = array();
	$j = 1;
	if(is_array($portfolios)){
		foreach($portfolios as $key => $value){
			if($j%2==0){
	            array_push($portfolio_slugs,$value);
	            $j = 0 ;
	        }
	        else{
	            array_push($portfolio_name,$value);
	        }
	    	$j++;
		}
	}
	
	$portfolio_counter = 0;
	$portfolio_arr = array();
	if(is_array($portfolio_slugs))
		foreach ( $portfolio_slugs as $slug ){
				$portfolio_arr[$portfolio_name[$portfolio_counter++]] = "$slug";
		}

// Blog Categories
$category_arr = array("All"=>"");
$cat_args=array(
  'orderby' => 'name',
  'order' => 'ASC'
   );
$categories=get_categories($cat_args);
  foreach($categories as $category) {
	  $category_arr[$category->name] = $category->slug;
  }

$style_array = array("info"=>"info", "warning"=>"warning", "success"=>"success", "danger"=>"danger");
$button_style_array = array("default"=>"","primary"=>"primary","info"=>"info", "warning"=>"warning", "success"=>"success", "danger"=>"danger","inverse"=>"inverse");
$box_style_array = array("default"=>"","info"=>"info", "success"=>"success", "error"=>"error");

$reticonarray = array("plus" => "plus",
"plus-1" => "plus-1",
"minus" => "minus",
"minus-1" => "minus-1",
"info" => "info",
"left-thin" => "left-thin",
"left-1" => "left-1",
"up-thin" => "up-thin",
"up-1" => "up-1",
"right-thin" => "right-thin",
"right-1" => "right-1",
"down-thin" => "down-thin",
"down-1" => "down-1",
"level-up" => "level-up",
"level-down" => "level-down",
"switch" => "switch",
"infinity" => "infinity",
"plus-squared" => "plus-squared",
"minus-squared" => "minus-squared",
"home" => "home",
"home-1" => "home-1",
"keyboard" => "keyboard",
"erase" => "erase",
"pause" => "pause",
"pause-1" => "pause-1",
"fast-forward" => "fast-forward",
"fast-fw" => "fast-fw",
"fast-backward" => "fast-backward",
"fast-bw" => "fast-bw",
"to-end" => "to-end",
"to-end-1" => "to-end-1",
"to-start" => "to-start",
"to-start-1" => "to-start-1",
"hourglass" => "hourglass",
"stop" => "stop",
"stop-1" => "stop-1",
"up-dir" => "up-dir",
"up-dir-1" => "up-dir-1",
"play" => "play",
"play-1" => "play-1",
"right-dir" => "right-dir",
"right-dir-1" => "right-dir-1",
"down-dir" => "down-dir",
"down-dir-1" => "down-dir-1",
"left-dir" => "left-dir",
"left-dir-1" => "left-dir-1",
"adjust" => "adjust",
"cloud" => "cloud",
"cloud-1" => "cloud-1",
"umbrella" => "umbrella",
"star" => "star",
"star-1" => "star-1",
"star-empty" => "star-empty",
"star-empty-1" => "star-empty-1",
"check-1" => "check-1",
"cup" => "cup",
"left-hand" => "left-hand",
"up-hand" => "up-hand",
"right-hand" => "right-hand",
"down-hand" => "down-hand",
"menu" => "menu",
"th-list" => "th-list",
"moon" => "moon",
"heart-empty" => "heart-empty",
"heart-empty-1" => "heart-empty-1",
"heart" => "heart",
"heart-1" => "heart-1",
"note" => "note",
"note-beamed" => "note-beamed",
"music-1" => "music-1",
"layout" => "layout",
"th" => "th",
"flag" => "flag",
"flag-1" => "flag-1",
"tools" => "tools",
"cog" => "cog",
"cog-1" => "cog-1",
"attention" => "attention",
"attention-1" => "attention-1",
"flash" => "flash",
"flash-1" => "flash-1",
"record" => "record",
"cloud-thunder" => "cloud-thunder",
"cog-alt" => "cog-alt",
"scissors" => "scissors",
"tape" => "tape",
"flight" => "flight",
"flight-1" => "flight-1",
"mail" => "mail",
"mail-1" => "mail-1",
"edit" => "edit",
"pencil" => "pencil",
"pencil-1" => "pencil-1",
"feather" => "feather",
"check" => "check",
"ok" => "ok",
"ok-circle" => "ok-circle",
"cancel" => "cancel",
"cancel-1" => "cancel-1",
"cancel-circled" => "cancel-circled",
"cancel-circle" => "cancel-circle",
"asterisk" => "asterisk",
"cancel-squared" => "cancel-squared",
"help" => "help",
"attention-circle" => "attention-circle",
"quote" => "quote",
"plus-circled" => "plus-circled",
"plus-circle" => "plus-circle",
"minus-circled" => "minus-circled",
"minus-circle" => "minus-circle",
"right" => "right",
"direction" => "direction",
"forward" => "forward",
"forward-1" => "forward-1",
"ccw" => "ccw",
"cw" => "cw",
"cw-1" => "cw-1",
"left" => "left",
"up" => "up",
"down" => "down",
"resize-vertical" => "resize-vertical",
"resize-horizontal" => "resize-horizontal",
"eject" => "eject",
"list-add" => "list-add",
"list" => "list",
"left-bold" => "left-bold",
"right-bold" => "right-bold",
"up-bold" => "up-bold",
"down-bold" => "down-bold",
"user-add" => "user-add",
"star-half" => "star-half",
"ok-circle2" => "ok-circle2",
"cancel-circle2" => "cancel-circle2",
"help-circled" => "help-circled",
"help-circle" => "help-circle",
"info-circled" => "info-circled",
"info-circle" => "info-circle",
"th-large" => "th-large",
"eye" => "eye",
"eye-1" => "eye-1",
"eye-off" => "eye-off",
"tag" => "tag",
"tag-1" => "tag-1",
"tags" => "tags",
"camera-alt" => "camera-alt",
"upload-cloud" => "upload-cloud",
"reply" => "reply",
"reply-all" => "reply-all",
"code" => "code",
"export" => "export",
"export-1" => "export-1",
"print" => "print",
"print-1" => "print-1",
"retweet" => "retweet",
"retweet-1" => "retweet-1",
"comment" => "comment",
"comment-1" => "comment-1",
"chat" => "chat",
"chat-1" => "chat-1",
"vcard" => "vcard",
"address" => "address",
"location" => "location",
"location-1" => "location-1",
"map" => "map",
"compass" => "compass",
"trash" => "trash",
"trash-1" => "trash-1",
"doc" => "doc",
"doc-text-inv" => "doc-text-inv",
"docs" => "docs",
"doc-landscape" => "doc-landscape",
"archive" => "archive",
"rss" => "rss",
"share" => "share",
"basket" => "basket",
"basket-1" => "basket-1",
"shareable" => "shareable",
"login" => "login",
"login-1" => "login-1",
"logout" => "logout",
"logout-1" => "logout-1",
"volume" => "volume",
"resize-full" => "resize-full",
"resize-full-1" => "resize-full-1",
"resize-small" => "resize-small",
"resize-small-1" => "resize-small-1",
"popup" => "popup",
"publish" => "publish",
"window" => "window",
"arrow-combo" => "arrow-combo",
"zoom-in" => "zoom-in",
"chart-pie" => "chart-pie",
"zoom-out" => "zoom-out",
"language" => "language",
"air" => "air",
"database" => "database",
"drive" => "drive",
"bucket" => "bucket",
"thermometer" => "thermometer",
"down-circled" => "down-circled",
"down-circle2" => "down-circle2",
"left-circled" => "left-circled",
"right-circled" => "right-circled",
"up-circled" => "up-circled",
"up-circle2" => "up-circle2",
"down-open" => "down-open",
"down-open-1" => "down-open-1",
"left-open" => "left-open",
"left-open-1" => "left-open-1",
"right-open" => "right-open",
"right-open-1" => "right-open-1",
"up-open" => "up-open",
"up-open-1" => "up-open-1",
"down-open-mini" => "down-open-mini",
"arrows-cw" => "arrows-cw",
"left-open-mini" => "left-open-mini",
"play-circle2" => "play-circle2",
"right-open-mini" => "right-open-mini",
"to-end-alt" => "to-end-alt",
"up-open-mini" => "up-open-mini",
"to-start-alt" => "to-start-alt",
"down-open-big" => "down-open-big",
"left-open-big" => "left-open-big",
"right-open-big" => "right-open-big",
"up-open-big" => "up-open-big",
"progress-0" => "progress-0",
"progress-1" => "progress-1",
"progress-2" => "progress-2",
"progress-3" => "progress-3",
"back-in-time" => "back-in-time",
"network" => "network",
"inbox" => "inbox",
"inbox-1" => "inbox-1",
"install" => "install",
"font" => "font",
"bold" => "bold",
"italic" => "italic",
"text-height" => "text-height",
"text-width" => "text-width",
"align-left" => "align-left",
"align-center" => "align-center",
"align-right" => "align-right",
"align-justify" => "align-justify",
"list-1" => "list-1",
"indent-left" => "indent-left",
"indent-right" => "indent-right",
"lifebuoy" => "lifebuoy",
"mouse" => "mouse",
"dot" => "dot",
"dot-2" => "dot-2",
"dot-3" => "dot-3",
"suitcase" => "suitcase",
"off" => "off",
"road" => "road",
"flow-cascade" => "flow-cascade",
"list-alt" => "list-alt",
"flow-branch" => "flow-branch",
"qrcode" => "qrcode",
"flow-tree" => "flow-tree",
"barcode" => "barcode",
"flow-line" => "flow-line",
"ajust" => "ajust",
"flow-parallel" => "flow-parallel",
"tint" => "tint",
"brush" => "brush",
"paper-plane" => "paper-plane",
"magnet" => "magnet",
"magnet-1" => "magnet-1",
"gauge" => "gauge",
"traffic-cone" => "traffic-cone",
"cc" => "cc",
"cc-by" => "cc-by",
"cc-nc" => "cc-nc",
"cc-nc-eu" => "cc-nc-eu",
"cc-nc-jp" => "cc-nc-jp",
"cc-sa" => "cc-sa",
"cc-nd" => "cc-nd",
"cc-pd" => "cc-pd",
"cc-zero" => "cc-zero",
"cc-share" => "cc-share",
"cc-remix" => "cc-remix",
"move" => "move",
"link-ext" => "link-ext",
"check-empty" => "check-empty",
"bookmark-empty" => "bookmark-empty",
"phone-squared" => "phone-squared",
"twitter" => "twitter",
"facebook" => "facebook",
"github" => "github",
"rss-1" => "rss-1",
"hdd" => "hdd",
"certificate" => "certificate",
"left-circled-1" => "left-circled-1",
"right-circled-1" => "right-circled-1",
"up-circled-1" => "up-circled-1",
"down-circled-1" => "down-circled-1",
"tasks" => "tasks",
"filter" => "filter",
"resize-full-alt" => "resize-full-alt",
"beaker" => "beaker",
"docs-1" => "docs-1",
"blank" => "blank",
"menu-1" => "menu-1",
"list-bullet" => "list-bullet",
"list-numbered" => "list-numbered",
"strike" => "strike",
"underline" => "underline",
"table" => "table",
"magic" => "magic",
"pinterest-circled-1" => "pinterest-circled-1",
"pinterest-squared" => "pinterest-squared",
"gplus-squared" => "gplus-squared",
"gplus" => "gplus",
"money" => "money",
"columns" => "columns",
"sort" => "sort",
"sort-down" => "sort-down",
"sort-up" => "sort-up",
"mail-alt" => "mail-alt",
"linkedin" => "linkedin",
"gauge-1" => "gauge-1",
"comment-empty" => "comment-empty",
"chat-empty" => "chat-empty",
"sitemap" => "sitemap",
"paste" => "paste",
"user-md" => "user-md",
"s-github" => "s-github",
"github-squared" => "github-squared",
"github-circled" => "github-circled",
"s-flickr" => "s-flickr",
"twitter-squared" => "twitter-squared",
"s-vimeo" => "s-vimeo",
"vimeo-circled" => "vimeo-circled",
"facebook-squared-1" => "facebook-squared-1",
"s-twitter" => "s-twitter",
"twitter-circled" => "twitter-circled",
"s-facebook" => "s-facebook",
"linkedin-squared" => "linkedin-squared",
"facebook-circled" => "facebook-circled",
"s-gplus" => "s-gplus",
"gplus-circled" => "gplus-circled",
"s-pinterest" => "s-pinterest",
"pinterest-circled" => "pinterest-circled",
"s-tumblr" => "s-tumblr",
"tumblr-circled" => "tumblr-circled",
"s-linkedin" => "s-linkedin",
"linkedin-circled" => "linkedin-circled",
"s-dribbble" => "s-dribbble",
"dribbble-circled" => "dribbble-circled",
"s-stumbleupon" => "s-stumbleupon",
"stumbleupon-circled" => "stumbleupon-circled",
"s-lastfm" => "s-lastfm",
"lastfm-circled" => "lastfm-circled",
"rdio" => "rdio",
"rdio-circled" => "rdio-circled",
"spotify" => "spotify",
"s-spotify-circled" => "s-spotify-circled",
"qq" => "qq",
"s-instagrem" => "s-instagrem",
"dropbox" => "dropbox",
"s-evernote" => "s-evernote",
"flattr" => "flattr",
"s-skype" => "s-skype",
"skype-circled" => "skype-circled",
"renren" => "renren",
"sina-weibo" => "sina-weibo",
"s-paypal" => "s-paypal",
"s-picasa" => "s-picasa",
"s-soundcloud" => "s-soundcloud",
"s-behance" => "s-behance",
"google-circles" => "google-circles",
"vkontakte" => "vkontakte",
"smashing" => "smashing",
"db-shape" => "db-shape",
"sweden" => "sweden",
"logo-db" => "logo-db",
"picture" => "picture",
"picture-1" => "picture-1",
"globe" => "globe",
"globe-1" => "globe-1",
"leaf-1" => "leaf-1",
"lemon" => "lemon",
"glass" => "glass",
"gift" => "gift",
"graduation-cap" => "graduation-cap",
"mic" => "mic",
"videocam" => "videocam",
"headphones" => "headphones",
"palette" => "palette",
"ticket" => "ticket",
"video" => "video",
"video-1" => "video-1",
"target" => "target",
"target-1" => "target-1",
"music" => "music",
"trophy" => "trophy",
"award" => "award",
"thumbs-up" => "thumbs-up",
"thumbs-up-1" => "thumbs-up-1",
"thumbs-down" => "thumbs-down",
"thumbs-down-1" => "thumbs-down-1",
"bag" => "bag",
"user" => "user",
"user-1" => "user-1",
"users" => "users",
"users-1" => "users-1",
"lamp" => "lamp",
"alert" => "alert",
"water" => "water",
"droplet" => "droplet",
"credit-card" => "credit-card",
"credit-card-1" => "credit-card-1",
"monitor" => "monitor",
"briefcase" => "briefcase",
"briefcase-1" => "briefcase-1",
"floppy" => "floppy",
"floppy-1" => "floppy-1",
"cd" => "cd",
"folder" => "folder",
"folder-1" => "folder-1",
"folder-open" => "folder-open",
"doc-text" => "doc-text",
"doc-1" => "doc-1",
"calendar" => "calendar",
"calendar-1" => "calendar-1",
"chart-line" => "chart-line",
"chart-bar" => "chart-bar",
"chart-bar-1" => "chart-bar-1",
"clipboard" => "clipboard",
"pin" => "pin",
"attach" => "attach",
"attach-1" => "attach-1",
"bookmarks" => "bookmarks",
"book" => "book",
"book-1" => "book-1",
"book-open" => "book-open",
"phone" => "phone",
"phone-1" => "phone-1",
"megaphone" => "megaphone",
"megaphone-1" => "megaphone-1",
"upload" => "upload",
"upload-1" => "upload-1",
"download" => "download",
"download-1" => "download-1",
"box" => "box",
"newspaper" => "newspaper",
"mobile" => "mobile",
"signal" => "signal",
"signal-1" => "signal-1",
"camera" => "camera",
"camera-1" => "camera-1",
"shuffle" => "shuffle",
"shuffle-1" => "shuffle-1",
"loop" => "loop",
"arrows-ccw" => "arrows-ccw",
"light-down" => "light-down",
"light-up" => "light-up",
"mute" => "mute",
"volume-off" => "volume-off",
"volume-down" => "volume-down",
"sound" => "sound",
"volume-up" => "volume-up",
"battery" => "battery",
"search" => "search",
"search-1" => "search-1",
"key" => "key",
"key-1" => "key-1",
"lock" => "lock",
"lock-1" => "lock-1",
"lock-open" => "lock-open",
"lock-open-1" => "lock-open-1",
"bell" => "bell",
"bell-1" => "bell-1",
"bookmark" => "bookmark",
"bookmark-1" => "bookmark-1",
"link" => "link",
"link-1" => "link-1",
"back" => "back",
"fire" => "fire",
"flashlight" => "flashlight",
"wrench" => "wrench",
"hammer" => "hammer",
"chart-area" => "chart-area",
"clock" => "clock",
"clock-1" => "clock-1",
"rocket" => "rocket",
"truck" => "truck",
"block" => "block",
"block-1" => "block-1");

wpb_map( array(
		   "name" => __("Service", "js_composer"),
		   "base" => "service_block",
		   "class" => "",
		   "icon"      => "icon-wpb-service",
		   "controls" => "full",
		   "category" => __('Content', "js_composer"),
		   'admin_enqueue_js' => '',
		   'admin_enqueue_css' => '',
		   "params" => array(
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Title", "js_composer"),
		         "param_name" => "title",
		         "value" => __("Head Title", "js_composer"),
		         "description" => __("The big Head Title.", "js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("SubTitle", "js_composer"),
		         "param_name" => "subtitle",
		         "value" => __("Sub Title", "js_composer"),
		         "description" => __("The smaller Headline under the title (optional).","js_composer")
		      ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Icon", "js_composer", "js_composer"),
		            "param_name" => "icon",
		            "admin_label" => true,
		            "value" => $reticonarray,
		            "description" => __("Select Icon type.", "js_composer")
		      ),
		       array(
		            "type" => "textfield",
		            "heading" => __("URL (Link)", "js_composer"),
		            "param_name" => "href",
		            "value" => "",
		            "description" => __("Service Block link.", "js_composer")
		        ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Link target", "js_composer"),
		            "param_name" => "target",
		            "value" => $target_arr
		        ),
		      array(
		         "type" => "textarea_html",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content", "js_composer"),
		         "param_name" => "content",
		         "value" => __("<p>I am test text block. Click edit button to change this text.</p>", "js_composer"),
		         "description" => __("Enter your content.", "js_composer")
		      )
		   )
		) );
		
		wpb_map( array(
		   "name" => __("Headline", "js_composer"),
		   "base" => "themetastic_headline",
		   "class" => "",
		   "icon"      => "icon-wpb-headline",
		   "controls" => "full",
		   "category" => __('Content', "js_composer"),
		   'admin_enqueue_js' => '',
		   'admin_enqueue_css' => '',
		   "params" => array(
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Title", "js_composer"),
		         "param_name" => "title",
		         "value" => __("Head Title", "js_composer"),
		         "description" => __("The Headline itself.", "js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Linktext", "js_composer"),
		         "param_name" => "linktext",
		         "value" => __("","js_composer"),
		         "description" => __("The Link Text appearing on the right.", "js_composer")
		      ),
		      array(
		            "type" => "textfield",
		            "heading" => __("URL (Link)", "js_composer"),
		            "param_name" => "link",
		            "value" => "",
		            "description" => __("URL to link to.", "js_composer")
		        ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Link target", "js_composer"),
		            "param_name" => "target",
		            "value" => $target_arr
		        ),
		   )
		) );
		
		
		wpb_map( array(
		   "name" => __("Latest Projects", "js_composer"),
		   "base" => "latest_projects",
		   "class" => "",
		   "icon"      => "icon-wpb-projects",
		   "category" => __('Content', "js_composer"),
		   "params" => array(
		   	  array(
		            "type" => "dropdown",
		            "heading" => __("Portfolio", "js_composer"),
		            "param_name" => "portfolio",
		            "value" => $portfolio_arr ,
		            "admin_label" => true,
		            "description" => __("Select Portfolio. Please use the Latest Projects only in a full row.", "js_composer")
		        ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Columns count", "js_composer"),
		            "param_name" => "columns",
		            "value" => array(5, 4, 3),
		            "admin_label" => true,
		            "description" => __("Select columns count.", "js_composer")
		        ),
		        array(
		            "type" => "dropdown",
		            "heading" => __("Items count", "js_composer"),
		            "param_name" => "items",
		            "value" => array(10,9,8,7,6,5,4,3),
		            "admin_label" => true,
		            "description" => __("Select items count.", "js_composer")
		        ),
		        array(
		            "type" => "textfield",
		            "heading" => __("Lock Height (px)", "js_composer"),
		            "param_name" => "height",
		            "value" => "",
		            "description" => __("Lock the height to this (Please enter a height in respect to the width of 400px).", "js_composer")
		        )
		   )
		) );
		
		
		wpb_map( array(
		   "name" => __("Latest Blog Posts", "js_composer"),
		   "base" => "latest_posts",
		   "class" => "",
		   "controls" => "full",
		   "icon"      => "icon-wpb-posts",
		   "category" => __('Content', "js_composer"),
		   'admin_enqueue_js' => '',
		   'admin_enqueue_css' => '',
		   "params" => array(
		      array(
		            "type" => "dropdown",
		            "heading" => __("Category", "js_composer"),
		            "param_name" => "category",
		            "value" => $category_arr ,
		            "admin_label" => true,
		            "description" => __("Select Category.", "js_composer")
		        ),
		     array(
		            "type" => "dropdown",
		            "heading" => __("Items count", "js_composer"),
		            "param_name" => "number",
		            "value" => array(6,5,4,3,2,1),
		            "admin_label" => true,
		            "description" => __("Select items count.", "js_composer")
		        ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Excerpt Words", "js_composer"),
		            "param_name" => "excerpt_words",
		            "value" => array(55,40,30,20,10),
		            "admin_label" => true,
		            "description" => __("Display how many words?", "js_composer")
		        ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Display Category Info?", "js_composer"),
		            "param_name" => "category_info",
		            "value" => array(""=>"off","on"=>"on"),
		            "admin_label" => true,
		            //"description" => __("Select items count.", "js_composer")
		        ),
		       array(
		            "type" => "dropdown",
		            "heading" => __("Display Date Info?", "js_composer"),
		            "param_name" => "date_info",
		            "value" => array(""=>"off","on"=>"on"),
		            "admin_label" => true,
		            //"description" => __("Select items count.", "js_composer")
		        ),
		        array(
		            "type" => "dropdown",
		            "heading" => __("Display Comment Info?", "js_composer"),
		            "param_name" => "comments_info",
		            "value" => array(""=>"off","on"=>"on"),
		            "admin_label" => true,
		            //"description" => __("Select items count.", "js_composer")
		        ),
		   )
		) );

		wpb_map( array(
		   "name" => __("Spacer", "js_composer"),
		   "base" => "spacer",
		   "class" => "",
		   "icon"      => "icon-wpb-spacer",
		   "controls" => "full",
		   "category" => __('Content','js_composer'),
		   'admin_enqueue_js' => '',
		   'admin_enqueue_css' => '',
		   "params" => array(
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Height in px",'js_composer'),
		         "param_name" => "height",
		         "value" => "35",
		         "description" => __("Spacer of this height.",'js_composer')
		      ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Hide in Mobile View?", "js_composer"),
		            "param_name" => "hidemobile",
		            "value" => array("off"=>"","on"=>"on"),
		            "admin_label" => true,
		            //"description" => __("Select items count.", "js_composer")
		        ),
		     array(
		            "type" => "dropdown",
		            "heading" => __("Show only in Mobile View?", "js_composer"),
		            "param_name" => "visiblemobile",
		            "value" => array("off"=>"","on"=>"on"),
		            "admin_label" => true,
		            //"description" => __("Select items count.", "js_composer")
		        ),
		   )
		) );	
		
		wpb_map( array(
		   "name" => __("Progress Bar",'js_composer'),
		   "base" => "progressbar",
		   "class" => "",
		   "icon"      => "icon-wpb-progress",
		   "controls" => "full",
		   "category" => __('Content','js_composer'),
		   'admin_enqueue_js' => '',
		   'admin_enqueue_css' => '',
		   "params" => array(
		   	array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Title",'js_composer'),
		         "param_name" => "title",
		         "value" => __("","js_composer"),
		         "description" => __("Title to display on the Progressbar",'js_composer')
		      ),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Progress in %",'js_composer'),
		         "param_name" => "percent",
		         "value" => __("50",'js_composer'),
		         "description" => __("Progress to display in %",'js_composer')
		      ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Style", "js_composer"),
		            "param_name" => "style",
		            "value" => $style_array ,
		            "admin_label" => true,
		            "description" => __("Select Color style.", "js_composer")
		        ),
		   )
		) );		
		
		wpb_map( array(
		   "name" => __("Highlight Box",'js_composer'),
		   "base" => "highlightbox",
		   "class" => "",
		   "icon"      => "icon-wpb-highlightbox",
		   "controls" => "full",
		   "category" => __('Content','js_composer'),
		   'admin_enqueue_js' => '',
		   'admin_enqueue_css' => '',
		   'default_content' => '
		        [vc_column width="1/1"][/vc_column]
		    ',
		   "params" => array(
		      array(
		         "type" => "textarea_html",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content",'js_composer'),
		         "param_name" => "content",
		         "value" => __('This is the highlight box text.','js_composer'),
		         "description" => __("Enter your content.",'js_composer')
		      )
		   )
		) );
		
		wpb_map( array(
		   "name" => __("Checklist",'js_composer'),
		   "base" => "checklist",
		   "class" => "",
		   "icon"      => "icon-wpb-checklist",
		   "controls" => "full",
		   "category" => __('Content','js_composer'),
		    "wrapper_class" => "clearfix",
		      "controls"	=> "full",
		   'admin_enqueue_js' => '',
		   'admin_enqueue_css' => array(get_template_directory_uri().'/css/theme_builder.css'),
		   'default_content' => '
		        [vc_column width="1/1"][/vc_column]
		    ',
		   "params" => array(
		      array(
		         "type" => "textarea_html",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Include List here",'js_composer'),
		         "param_name" => "content",
		         "value" => __('<ul><li>1 item</li><li>2 item</li></ul>','js_composer'),
		         "description" => __("Enter your content.",'js_composer')
		      )
		   )
		) );	
		
		wpb_map( array(
		    "name"		=> __("Clients List", "js_composer"),
		    "base"		=> "clients_list",
		    "class"		=> "wpb_vc_gallery_widget",
			"icon"		=> "icon-wpb-clients",
		    "category"  => __('Content', 'js_composer'),
		    "params"	=> array(
		        array(
		            "type" => "attach_images",
		            "heading" => __("Images", "js_composer"),
		            "param_name" => "images",
		            "value" => "",
		            "description" => ""
		        ),
		        array(
		            "type" => "exploded_textarea",
		            "heading" => __("Tooltips", "js_composer"),
		            "param_name" => "tooltips",
		            "description" => __('Enter tooltips (no ","(comma) please) for each slide here. Divide links with linebreaks (Enter).', 'js_composer')
		        ),
		        array(
		            "type" => "exploded_textarea",
		            "heading" => __("Links", "js_composer"),
		            "param_name" => "links",
		            "description" => __('Enter links for each slide here. Divide links with linebreaks (Enter).', 'js_composer')
		        ),
		        array(
		            "type" => "dropdown",
		            "heading" => __("Custom link target", "js_composer"),
		            "param_name" => "custom_links_target",
		            "description" => __('Select where to open  custom links.', 'js_composer'),
		            'value' => $target_arr
		        ),
		        array(
		            "type" => "textfield",
		            "heading" => __("Extra class name", "js_composer"),
		            "param_name" => "el_class",
		            "value" => "",
		            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
		        )
		    )
		) );
		
	//	class WPBakeryShortCode_Team extends WPBakeryShortCode_VC_Row {}

		wpb_map( array(
		   "name" => __("Team Row",'js_composer'),
		   "base" => "team",
		   "class" => "",
		   "icon"      => "icon-wpb-team",
		   "controls" => "full",
		   "category" => __('Content','js_composer'),
		   'admin_enqueue_js' => '',
		   'admin_enqueue_css' => '',
		   "params" => array(
		   	array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("<h2>Member 1</h2>Name",'js_composer'),
		         "param_name" => "name_1",
		         "value" => __("",'js_composer'),
		         "description" => __("Name of the Person.",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Position",'js_composer'),
		         "param_name" => "position_1",
		         "value" => __("",'js_composer'),
		         "description" => __("Position description or an other sub headline.",'js_composer')
		      ),
		     array(
	  			"type" => "attach_image",
	  			"heading" => __("Image", "js_composer"),
	  			"param_name" => "image_id_1",
	  			"value" => "",
	  
	  			"description" => ""
	  		),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Mail",'js_composer'),
		         "param_name" => "mail_1",
		         "value" => __("",'js_composer'),
		         "description" => __("The e-Mail address.",'js_composer')
		      ),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Phone",'js_composer'),
		         "param_name" => "phone_1",
		         "value" => __("",'js_composer'),
		         "description" => __("Phone Number",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Facebook",'js_composer'),
		         "param_name" => "facebook_1",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Facebook profile",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Twitter",'js_composer'),
		         "param_name" => "twitter_1",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Twitter profile",'js_composer')
		      ),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Google Plus",'js_composer'),
		         "param_name" => "gplus_1",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Google Plus profile",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("LinkedIn",'js_composer'),
		         "param_name" => "linkedin_1",
		         "value" => __("","js_composer"),
		         "description" => __("Link to LinkedIn profile",'js_composer')
		      ),
		      array(
		         "type" => "textarea",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Description",'js_composer'),
		         "param_name" => "content_1",
		         "value" => __('','js_composer'),
		         "description" => __("Enter your content.",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("<h2>Member 2</h2>Name",'js_composer'),
		         "param_name" => "name_2",
		         "value" => __("",'js_composer'),
		         "description" => __("Name of the Person.",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Position",'js_composer'),
		         "param_name" => "position_2",
		         "value" => __("",'js_composer'),
		         "description" => __("Position description or an other sub headline.",'js_composer')
		      ),
		     array(
	  			"type" => "attach_image",
	  			"heading" => __("Image", "js_composer"),
	  			"param_name" => "image_id_2",
	  			"value" => "",
	  
	  			"description" => ""
	  		),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Mail",'js_composer'),
		         "param_name" => "mail_2",
		         "value" => __("",'js_composer'),
		         "description" => __("The e-Mail address.",'js_composer')
		      ),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Phone",'js_composer'),
		         "param_name" => "phone_2",
		         "value" => __("",'js_composer'),
		         "description" => __("Phone Number",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Facebook",'js_composer'),
		         "param_name" => "facebook_2",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Facebook profile",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Twitter",'js_composer'),
		         "param_name" => "twitter_2",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Twitter profile",'js_composer')
		      ),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Google Plus",'js_composer'),
		         "param_name" => "gplus_2",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Google Plus profile",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("LinkedIn",'js_composer'),
		         "param_name" => "linkedin_2",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to LinkedIn profile",'js_composer')
		      ),
		      array(
		         "type" => "textarea",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Description",'js_composer'),
		         "param_name" => "content_2",
		         "value" => __('','js_composer'),
		         "description" => __("Enter your content.",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("<h2>Member 3</h2>Name",'js_composer'),
		         "param_name" => "name_3",
		         "value" => __("",'js_composer'),
		         "description" => __("Name of the Person.",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Position",'js_composer'),
		         "param_name" => "position_3",
		         "value" => __("",'js_composer'),
		         "description" => __("Position description or an other sub headline.",'js_composer')
		      ),
		     array(
	  			"type" => "attach_image",
	  			"heading" => __("Image", "js_composer",'js_composer'),
	  			"param_name" => "image_id_3",
	  			"value" => "",
	  
	  			"description" => ""
	  		),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Mail",'js_composer'),
		         "param_name" => "mail_3",
		         "value" => __("",'js_composer'),
		         "description" => __("The e-Mail address.",'js_composer')
		      ),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Phone",'js_composer'),
		         "param_name" => "phone_3",
		         "value" => __("",'js_composer'),
		         "description" => __("Phone Number",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Facebook",'js_composer'),
		         "param_name" => "facebook_3",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Facebook profile",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Twitter",'js_composer'),
		         "param_name" => "twitter_3",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Twitter profile",'js_composer')
		      ),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Google Plus",'js_composer'),
		         "param_name" => "gplus_3",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Google Plus profile",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("LinkedIn",'js_composer'),
		         "param_name" => "linkedin_3",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to LinkedIn profile",'js_composer')
		      ),
		      array(
		         "type" => "textarea",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Description",'js_composer'),
		         "param_name" => "content_3",
		         "value" => __('','js_composer'),
		         "description" => __("Enter your content.",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("<h2>Member 4</h2>Name",'js_composer'),
		         "param_name" => "name_4",
		         "value" => __("",'js_composer'),
		         "description" => __("Name of the Person.",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Position",'js_composer'),
		         "param_name" => "position_4",
		         "value" => __("",'js_composer'),
		         "description" => __("Position description or an other sub headline.",'js_composer')
		      ),
		     array(
	  			"type" => "attach_image",
	  			"heading" => __("Image", "js_composer"),
	  			"param_name" => "image_id_4",
	  			"value" => "",
	  
	  			"description" => ""
	  		),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Mail",'js_composer'),
		         "param_name" => "mail_4",
		         "value" => __("",'js_composer'),
		         "description" => __("The e-Mail address.",'js_composer')
		      ),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Phone",'js_composer'),
		         "param_name" => "phone_4",
		         "value" => __("",'js_composer'),
		         "description" => __("Phone Number",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Facebook",'js_composer'),
		         "param_name" => "facebook_4",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Facebook profile",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Twitter",'js_composer'),
		         "param_name" => "twitter_4",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Twitter profile",'js_composer')
		      ),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Google Plus",'js_composer'),
		         "param_name" => "gplus_4",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Google Plus profile",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("LinkedIn",'js_composer'),
		         "param_name" => "linkedin_4",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to LinkedIn profile",'js_composer')
		      ),
		      array(
		         "type" => "textarea",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Description",'js_composer'),
		         "param_name" => "content_4",
		         "value" => __('','js_composer'),
		         "description" => __("Enter your content.",'js_composer')
		      )
		   )
		) );
		
		wpb_map( array(
		   "name" => __("Team Member",'js_composer'),
		   "base" => "team_member",
		   "class" => "",
		   "icon"      => "icon-wpb-team_member",
		   "controls" => "full",
		   "category" => __('Content','js_composer'),
		   'admin_enqueue_js' => '',
		   'admin_enqueue_css' => '',
		   "params" => array(
		   	array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Name",'js_composer'),
		         "param_name" => "name",
		         "value" => __("",'js_composer'),
		         "description" => __("Name of the Person.",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Position",'js_composer'),
		         "param_name" => "position",
		         "value" => __("",'js_composer'),
		         "description" => __("Position description or an other sub headline.",'js_composer')
		      ),
		     array(
	  			"type" => "attach_image",
	  			"heading" => __("Image", "js_composer"),
	  			"param_name" => "image_id",
	  			"value" => "",
	  
	  			"description" => ""
	  		),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Mail",'js_composer'),
		         "param_name" => "mail",
		         "value" => __("",'js_composer'),
		         "description" => __("The e-Mail address.",'js_composer')
		      ),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Phone",'js_composer'),
		         "param_name" => "phone",
		         "value" => __("",'js_composer'),
		         "description" => __("Phone Number",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Facebook",'js_composer'),
		         "param_name" => "facebook",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Facebook profile",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Twitter",'js_composer'),
		         "param_name" => "twitter",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Twitter profile",'js_composer')
		      ),
		     array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Google Plus",'js_composer'),
		         "param_name" => "gplus",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to Google Plus profile",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("LinkedIn",'js_composer'),
		         "param_name" => "linkedin_1",
		         "value" => __("",'js_composer'),
		         "description" => __("Link to LinkedIn profile",'js_composer')
		      ),
		      array(
		         "type" => "textarea",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Description",'js_composer'),
		         "param_name" => "content",
		         "value" => __('','js_composer'),
		         "description" => __("Enter your content.",'js_composer')
		      )
		   )
		) );

		wpb_map( array(
		    "name"		=> __("Price Table", "js_composer"),
		    "base"		=> "pricetable_columns",
		    "class"		=> "wpb_vc_gallery_widget",
			"icon"		=> "icon-wpb-pricetable",
		    "category"  => __('Content', 'js_composer'),
		    "params"	=> array(
			  array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("<h2>Column 1</h2>Title",'js_composer'),
		         "param_name" => "title1",
		         "value" => __("","js_composer"),
		         "description" => __("Headline of this Column",'js_composer')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Title Subline","js_composer"),
		         "param_name" => "titlesubline1",
		         "value" => __("","js_composer"),
		         "description" => __("Subline below the Headline","js_composer")
		      ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Column Type", "js_composer"),
		            "param_name" => "highlight1",
		            "admin_label" => true,
		            "value" => array("normal"=>"normal","highlight"=>"highlight"),
		            "description" => __("Select Button type.", "js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Price","js_composer"),
		         "param_name" => "price1",
		         "value" => __("","js_composer"),
		         "description" => __("Price to display here","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Price Currency Symbol","js_composer"),
		         "param_name" => "price_currency1",
		         "value" => __("","js_composer"),
		         "description" => __("Currency to display","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Button Url","js_composer"),
		         "param_name" => "button_url1",
		         "value" => __("","js_composer"),
		         "description" => __("Button Linking Address","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Button Text","js_composer"),
		         "param_name" => "button_text1",
		         "value" => __("","js_composer"),
		         "description" => __("Text on the link button","js_composer")
		      ),
		       array(
		            "type" => "dropdown",
		            "heading" => __("Button Type", "js_composer"),
		            "param_name" => "button_type1",
		            "admin_label" => true,
		            "value" => $button_style_array,
		            "description" => __("Select Button type.", "js_composer")
		      ),
			  array(
		         "type" => "exploded_textarea",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content","js_composer"),
		         "param_name" => "content1",
		         "value" => __("","js_composer"),
		         "description" => __("Enter the content of the price table body. Each line will become a small border in frontend. Please do not use comma &lsquo;,&lsquo; inside","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("<h2>Column 2</h2>Title","js_composer"),
		         "param_name" => "title2",
		         "value" => __("","js_composer"),
		         "description" => __("Headline of this Column","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Title Subline","js_composer"),
		         "param_name" => "titlesubline2",
		         "value" => __("","js_composer"),
		         "description" => __("Subline below the Headline","js_composer")
		      ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Column Type", "js_composer"),
		            "param_name" => "highlight2",
		            "admin_label" => true,
		            "value" => array("normal"=>"normal","highlight"=>"highlight"),
		            "description" => __("Select Button type.", "js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Price","js_composer"),
		         "param_name" => "price2",
		         "value" => __("","js_composer"),
		         "description" => __("Price to display here","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Price Currency Symbol","js_composer"),
		         "param_name" => "price_currency2",
		         "value" => __("","js_composer"),
		         "description" => __("Currency to display","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Button Url","js_composer"),
		         "param_name" => "button_url2",
		         "value" => __("","js_composer"),
		         "description" => __("Button Linking Address","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Button Text","js_composer"),
		         "param_name" => "button_text2",
		         "value" => __("","js_composer"),
		         "description" => __("Text on the link button","js_composer")
		      ),
		       array(
		            "type" => "dropdown",
		            "heading" => __("Button Type", "js_composer"),
		            "param_name" => "button_type2",
		            "admin_label" => true,
		            "value" => $button_style_array,
		            "description" => __("Select Button type.", "js_composer")
		      ),
			  array(
		         "type" => "exploded_textarea",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content","js_composer"),
		         "param_name" => "content2",
		         "value" => __("","js_composer"),
		         "description" => __("Enter the content of the price table body. Each line will become a small border in frontend. Please do not use comma &lsquo;,&lsquo; inside","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("<h2>Column 3</h2>Title","js_composer"),
		         "param_name" => "title3",
		         "value" => __("","js_composer"),
		         "description" => __("Headline of this Column","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Title Subline","js_composer"),
		         "param_name" => "titlesubline3",
		         "value" => __("","js_composer"),
		         "description" => __("Subline below the Headline","js_composer")
		      ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Column Type", "js_composer"),
		            "param_name" => "highlight3",
		            "admin_label" => true,
		            "value" => array("normal"=>"normal","highlight"=>"highlight"),
		            "description" => __("Select Button type.", "js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Price","js_composer"),
		         "param_name" => "price3",
		         "value" => __("","js_composer"),
		         "description" => __("Price to display here","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Price Currency Symbol","js_composer"),
		         "param_name" => "price_currency3",
		         "value" => __("","js_composer"),
		         "description" => __("Currency to display","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Button Url","js_composer"),
		         "param_name" => "button_url3",
		         "value" => __("","js_composer"),
		         "description" => __("Button Linking Address","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Button Text","js_composer"),
		         "param_name" => "button_text3",
		         "value" => __("","js_composer"),
		         "description" => __("Text on the link button","js_composer")
		      ),
		       array(
		            "type" => "dropdown",
		            "heading" => __("Button Type", "js_composer"),
		            "param_name" => "button_type3",
		            "admin_label" => true,
		            "value" => $button_style_array,
		            "description" => __("Select Button type.", "js_composer")
		      ),
			  array(
		         "type" => "exploded_textarea",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content","js_composer"),
		         "param_name" => "content3",
		         "value" => __("","js_composer"),
		         "description" => __("Enter the content of the price table body. Each line will become a small border in frontend. Please do not use comma &lsquo;,&lsquo; inside","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("<h2>Column 4</h2>Title","js_composer"),
		         "param_name" => "title4",
		         "value" => __("","js_composer"),
		         "description" => __("Headline of this Column","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Title Subline","js_composer"),
		         "param_name" => "titlesubline4",
		         "value" => __("","js_composer"),
		         "description" => __("Subline below the Headline","js_composer")
		      ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Column Type", "js_composer"),
		            "param_name" => "highlight4",
		            "admin_label" => true,
		            "value" => array("normal"=>"normal","highlight"=>"highlight"),
		            "description" => __("Select Button type.", "js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Price","js_composer"),
		         "param_name" => "price4",
		         "value" => __("","js_composer"),
		         "description" => __("Price to display here","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Price Currency Symbol","js_composer"),
		         "param_name" => "price_currency4",
		         "value" => __("","js_composer"),
		         "description" => __("Currency to display","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Button Url","js_composer"),
		         "param_name" => "button_url4",
		         "value" => __("","js_composer"),
		         "description" => __("Button Linking Address","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Button Text","js_composer"),
		         "param_name" => "button_text4",
		         "value" => __("","js_composer"),
		         "description" => __("Text on the link button","js_composer")
		      ),
		       array(
		            "type" => "dropdown",
		            "heading" => __("Button Type", "js_composer"),
		            "param_name" => "button_type4",
		            "admin_label" => true,
		            "value" => $button_style_array,
		            "description" => __("Select Button type.", "js_composer")
		      ),
			  array(
		         "type" => "exploded_textarea",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content","js_composer"),
		         "param_name" => "content4",
		         "value" => __("","js_composer"),
		         "description" => __("Enter the content of the price table body. Each line will become a small border in frontend. Please do not use comma &lsquo;,&lsquo; inside","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("<h2>Column 5</h2>Title","js_composer"),
		         "param_name" => "title5",
		         "value" => __("","js_composer"),
		         "description" => __("Headline of this Column","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Title Subline","js_composer"),
		         "param_name" => "titlesubline5",
		         "value" => __("","js_composer"),
		         "description" => __("Subline below the Headline","js_composer")
		      ),
		      array(
		            "type" => "dropdown",
		            "heading" => __("Column Type", "js_composer"),
		            "param_name" => "highlight5",
		            "admin_label" => true,
		            "value" => array("normal"=>"normal","highlight"=>"highlight"),
		            "description" => __("Select Button type.", "js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Price","js_composer"),
		         "param_name" => "price5",
		         "value" => __("","js_composer"),
		         "description" => __("Price to display here","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Price Currency Symbol","js_composer"),
		         "param_name" => "price_currency5",
		         "value" => __("","js_composer"),
		         "description" => __("Currency to display","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Button Url","js_composer"),
		         "param_name" => "button_url5",
		         "value" => __("","js_composer"),
		         "description" => __("Button Linking Address","js_composer")
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Button Text","js_composer"),
		         "param_name" => "button_text5",
		         "value" => __("","js_composer"),
		         "description" => __("Text on the link button","js_composer")
		      ),
		       array(
		            "type" => "dropdown",
		            "heading" => __("Button Type", "js_composer"),
		            "param_name" => "button_type5",
		            "admin_label" => true,
		            "value" => $button_style_array,
		            "description" => __("Select Button type.", "js_composer")
		      ),
			  array(
		         "type" => "exploded_textarea",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content","js_composer"),
		         "param_name" => "content5",
		         "value" => __("","js_composer"),
		         "description" => __("Enter the content of the price table body. Each line will become a small border in frontend. Please do not use comma &lsquo;,&lsquo; inside","js_composer")
		      )

		    )
		) );

		wpb_map( array(
		   "name" => __("Testimonial","js_composer"),
		   "base" => "testimonial",
		   "class" => "",
		   "icon"      => "icon-wpb-testimonial",
		   "controls" => "full",
		   "category" => __('Content','js_composer'),
		   'admin_enqueue_js' => '',
		   'admin_enqueue_css' => '',
		   "params" => array(
		   	array(
		         "type" => "exploded_textarea",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Names","js_composer"),
		         "param_name" => "names",
		         "value" => __("","js_composer"),
		         "description" => __("Names of the Person, Enter Names for each slide here. Divide links with linebreaks (Enter). Please use no Comma.","js_composer")
		      ),
		      array(
		         "type" => "exploded_textarea",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Quotes","js_composer"),
		         "param_name" => "quotes",
		         "value" => __("","js_composer"),
		         "description" => __("Enter Quotes for each slide here. Divide links with linebreaks (Enter). Please use no Comma.","js_composer")
		      )
		   )
		) );

	wpb_map( array(
	    "name"		=> __("themetastic Button", "js_composer"),
	    "base"		=> "bs_button",
	    "class"		=> "wpb_vc_button wpb_controls_top_right",
		"icon"		=> "icon-wpb-ui-button",
		"category"  => __('Content', 'js_composer'),
	    "controls"	=> "edit_popup_delete",
	    "params"	=> array(
	        array(
	            "type" => "textfield",
	            "heading" => __("Text on the button", "js_composer"),
	            "holder" => "button",
	            "class" => "wpb_button",
	            "param_name" => "content",
	            "value" => __("Text on the button", "js_composer"),
	            "description" => __("Text on the button.", "js_composer")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("URL (Link)", "js_composer"),
	            "param_name" => "url",
	            "value" => "",
	            "description" => __("Button link.", "js_composer")
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Style", "js_composer"),
	            "param_name" => "class",
	            "value" => $button_style_array,
	            "description" => __("Button color.", "js_composer")
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Size", "js_composer"),
	            "param_name" => "size",
	            "value" => array(""=>"normal","large"=>"large"),
	            "description" => __("Button size.", "js_composer")
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Target", "js_composer"),
	            "param_name" => "target",
	            "value" => $target_arr
	        ),
	        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "js_composer"),
            "param_name" => "extra_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
	    ),
	    //"js_callback" => array("init" => "wpbButtonInitCallBack", "save" => "wpbButtonSaveCallBack")
	    //"js_callback" => array("init" => "wpbCallToActionInitCallBack", "shortcode" => "wpbCallToActionShortcodeCallBack")
	) );
		
	wpb_map( array(
		"name"		=> __("Lightbox Image", "js_composer"),
		"base"		=> "lightbox",
		"class"		=> "wpb_vc_single_image_widget",
		"icon"		=> "icon-wpb-single-image",
	    "category"  => __('Content', 'js_composer'),
	    "params"	=> array(
	      array(
	        "type" => "textfield",
	        "heading" => __("Caption", "js_composer"),
	        "param_name" => "title",
	        "value" => "",
	        "description" => __("What text use as image title. Leave blank if no title is needed.", "js_composer")
	      ),
	  		array(
	  			"type" => "attach_image",
	  			"heading" => __("Image", "js_composer"),
	  			"param_name" => "thumb",
	  			"value" => "",
	  
	  			"description" => ""
	  		),
	      array(
	        "type" => "textfield",
	        "heading" => __("Image Width", "js_composer"),
	        "param_name" => "thumbwidth",
	        "value" => "",
	        "description" => __("Enter image width.", "js_composer")
	      ),
	      array(
	        "type" => "textfield",
	        "heading" => __("Image Height", "js_composer"),
	        "param_name" => "thumbheight",
	        "value" => "",
	        "description" => __("Enter image height.", "js_composer")
	      ),
	      array(
	        "type" => "textfield",
	        "heading" => __("Image link", "js_composer"),
	        "param_name" => "lightbox_link",
	        "value" => "",
	        "description" => __("Leave empty if you will show a lightbox version of the image. You can also include a link to a video or link an other image.", "js_composer")
	      )
	    )
	));

	wpb_map( array(
	    "name"		=> __("themetastic Message Box", "js_composer"),
	    "base"		=> "bs_alert",
	    "class"		=> "",
		"icon"		=> "icon-wpb-information-white",
	    "controls"	=> "edit_popup_delete",
	    "category"  => __('Content', 'js_composer'),
	    "params"	=> array(
	        array(
	            "type" => "textfield",
	            "heading" => __("Text inside the Box", "js_composer"),
	            "holder" => "button",
	            "class" => "wpb_button",
	            "param_name" => "content",
	            "value" => __("Text inside the Box", "js_composer"),
	            "description" => __("Text inside the Box.", "js_composer")
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Style", "js_composer"),
	            "param_name" => "type",
	            "value" => $box_style_array,
	            "description" => __("Box Message Style.", "js_composer")
	        )
	    ),
	) );

?>
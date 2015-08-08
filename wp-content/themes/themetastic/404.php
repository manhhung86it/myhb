<?php
// Themeoptions
	$themeoptions = getThemeOptions();
	
// Redirect	
	$redirect_link = empty($themeoptions['themetastic_404page']) ? home_url() : get_permalink($themeoptions['themetastic_404page']);
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: ".$redirect_link);
	exit();
?>

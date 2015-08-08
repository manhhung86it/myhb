<?php
	global $wp_query;
    $content_array = $wp_query->get_queried_object();
	if(isset($content_array->ID)){
    	$post_id = $content_array->ID;
	}
	else $post_id=0;
	
	// Themeoptions
	$themeoptions = getThemeOptions();
	
	/* Default Background */
	$themetastic_default_bgimage = empty($themeoptions['themetastic_img_bgdefault']) ? "" : $themeoptions['themetastic_img_bgdefault'];
	/* Theme Layout */
	$themetastic_themelayout = $themeoptions['themetastic_themelayout'];
	if($themetastic_themelayout=="Full-Width"){ $themetastic_wideclass = "wide"; } else { $themetastic_wideclass = ""; }
	
	$themetastic_bgimage = "";
	
	if (isset($post_id)){
		$pagecustoms = getOptions($post_id);
		//Custom Background
		if(isset($pagecustoms["themetastic_custom_background"])){
			$image = wp_get_attachment_image_src($pagecustoms["themetastic_custom_background"], 'full');	$image = $image[0];
			$themeoptions['themetastic_img_bgdefault'] = $image;
			$themeoptions['themetastic_img_bgtype'] = $pagecustoms["themetastic_custom_background_type"];
		}
	}
	

?>
</section>

<!-- Footer -->  
<footer>

		<?php if(!isset($themeoptions["themetastic_footerwidgetsactive"]) && isset($themeoptions["themetastic_subfooterwidgetsactive"])){ 
			$footermodding = "style='background: #fff !important;padding-top: 0 !important;'";	
		} else { 
			$footermodding = "";
		}
		?>

		<section class="footerwrap <?php echo $themetastic_wideclass ?>" <?php echo $footermodding ?>>
		
			<?php if(isset($themeoptions["themetastic_footerwidgetsactive"])){ ?>
		
			<section class="footer">
				<div class="row">
				<article class="span3 widget">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget Slot 1") ) : ?>
						
						
							<div class="footertitle"><h4>Footer Widget Slot 1</h4></div>
							<div class="widgetclass">
							Please configure this Widget in the Admin Panel under Appearance -> Widgets -> Footer Widget Slot 1
							</div><div class="clear"></div>
				
					
					<?php endif; ?>
				</article>				
				<article class="span3 widget">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget Slot 2") ) : ?>
					
						
							<div class="footertitle"><h4>Footer Widget Slot 2</h4></div>
							<div class="widgetclass">
							Please configure this Widget in the Admin Panel under Appearance -> Widgets -> Footer Widget Slot 2
							</div><div class="clear"></div>
					
					<?php endif; ?>
				</article>
				<article class="span3 widget">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget Slot 3") ) : ?>
					
							<div class="footertitle"><h4>Footer Widget Slot 3</h4></div>
							<div class="widgetclass">
							Please configure this Widget in the Admin Panel under Appearance -> Widgets -> Footer Widget Slot 3
							</div><div class="clear"></div>
						
					<?php endif; ?>
				</article>
				<article class="span3 widget">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget Slot 4") ) : ?>
					
							<div class="footertitle"><h4>Footer Widget Slot 4</h4></div>
							<div class="widgetclass">
							Please configure this Widget in the Admin Panel under Appearance -> Widgets -> Footer Widget Slot 4
							</div><div class="clear"></div>
					
					<?php endif; ?>
				</article>	
				</div>
			</section>
			
			<?php } ?>
			
			<?php if(isset($themeoptions["themetastic_subfooterwidgetsactive"])){ ?>
			
			<!-- Sub Footer -->  
			<section class="subfooterwrap <?php echo $themetastic_wideclass ?>">
				<div class="subfooter">
					<div class="row">
						<article class="span6 lefttext"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("SubFooter Widget Slot Left") ) : ?>
							Configure this Widget in the Admin Panel under Appearance -> Widgets -> SubFooter Widget Slot Left
						<?php endif; ?></article>
						<article class="span6 righttext"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("SubFooter Widget Slot Right") ) : ?>
							Configure this Widget in the Admin Panel under Appearance -> Widgets -> SubFooter Widget Slot Right
						<?php endif; ?></article>
					</div>
				</div>
			</section>
			
			<section style="height:30px;"></section>
			
			<?php } ?>			
			
		</section> 

</footer>

<!--<section class="poswrapper <?php echo $themetastic_wideclass ?>"><div class="whitebackground"></div></section>  -->
<?php if (!empty($themeoptions['themetastic_img_bgdefault']) && $themeoptions['themetastic_themelayout']=="Boxed" && $themeoptions['themetastic_img_bgtype']=="full"){ ?><script>jQuery.backstretch("<?php echo $themeoptions['themetastic_img_bgdefault']; ?>", {speed: 500});</script><?php } ?>
<?php wp_footer(); ?></body></html>
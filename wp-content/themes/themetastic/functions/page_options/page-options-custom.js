jQuery("document").ready(function(){
     		
     		//Submitbutton
     		if(jQuery("#publish"))
     			jQuery(".tp_publish_buttons").each(function(){
     				jQuery(this).val(jQuery("#publish").val());
     			});


     		jQuery(".tp_publish_buttons").click(function(){
     			jQuery("#publish").click();
     		});

     		//change page template options show/hide
     		jQuery("#page_template").change(function(){
     			jQuery(".tp_options").each(function(){
     				if(!jQuery(this).hasClass(jQuery("#page_template").val().replace(".php", ""))){
     					jQuery(this).hide(200);
     				}
     				else {
     					jQuery(this).show(200);
                         }
     			});
     			//show/hide portfolio tab
				if(jQuery("#page_template").val().replace(".php", "")!="portfolio" && jQuery("#page_template").val().replace(".php", "")!="home_page")
					jQuery("#portfolio-options").hide(200);
				else {
					jQuery("#portfolio-options").show(200);
				}
                    if(jQuery("#themetastic_activate_sidebar").attr("checked")) {
                         
                          jQuery(".sidebar").show();
                         }
                         else{
                              jQuery(".sidebar").hide();
                         }

                     if(jQuery("#themetastic_activate_sidebar_woo").attr("checked")) {
                         
                          jQuery(".sidebar_woo").show();
                         }
                         else{
                              jQuery(".sidebar_woo").hide();
                         }

                    if(jQuery("#themetastic_background_active").attr("checked")) {
                         jQuery(".page_background").show();
                    }
                    else{
                         jQuery(".page_background").hide();
                    }

     		});

               
     		//on load page template options show/hide
     		jQuery(".tp_options").each(function(){
	     		//general page options
                    if(jQuery("#page_template").length){
	     			if(!jQuery(this).hasClass(jQuery("#page_template").val().replace(".php", ""))){
	     				jQuery(this).hide();
	     			}
	     			else {
	     				jQuery(this).show();	
	     			}
	     		}
     		});

               jQuery(".tp_options_head").hide();

               //special page options
               
               //Headline
               jQuery("#themetastic_headline_active").click(function(){
                    if(jQuery("#themetastic_headline_active").attr("checked")){
                         jQuery(".headline").show(200);                    
                    }
                    else{
                         jQuery(".headline").hide(200);
                    }
               });

               if(jQuery("#themetastic_headline_active").attr("checked")){
                    jQuery(".headline").show();                    
               }
               else{
                    jQuery(".headline").hide();
               }
               

     		//on load show/hide portfolio tab
     		if(jQuery("#page_template").length){
	     		if(jQuery("#page_template").val().replace(".php", "")!="portfolio" && jQuery("#page_template").val().replace(".php", "")!="home_page"){
	     			jQuery("#portfolio-options").hide();
	     		}
	     		else {
	     			jQuery("#portfolio-options").show();
	     		}
	     	}
     		

               //Defaults Headline and breadcrumbs active for new pages
               if(location.href.lastIndexOf("post-new")>0){
                    jQuery("#themetastic_headline_active").click();
                    jQuery("#themetastic_breadcrumbs_active").click();
               }

               //on load show/hide sidebar options
               if(jQuery("#themetastic_activate_sidebar").attr("checked")) {
                    jQuery(".sidebar").show();
               }
               else{
                    jQuery(".sidebar").hide();
               }
               
                //on load show/hide sidebar options
               if(jQuery("#themetastic_activate_sidebar_woo").attr("checked")) {
                    jQuery(".sidebar_woo").show();
               }
               else{
                    jQuery(".sidebar_woo").hide();
               }

               //show/hide sidebar options
               jQuery("#themetastic_activate_sidebar").click(function() {
                    $this=jQuery(this).attr("checked");
                    if($this){
                         jQuery(".sidebar").show(200);
                         
                    }
                    else{
                         jQuery(".sidebar").hide(200);
                        
                    }
               });


               //show/hide sidebar options
               jQuery("#themetastic_activate_sidebar_woo").click(function() {
                    $this=jQuery(this).attr("checked");
                    if($this){
                         jQuery(".sidebar_woo").show(200);
                         
                    }
                    else{
                         jQuery(".sidebar_woo").hide(200);
                        
                    }
               });


               //on load background image
               if(jQuery("#themetastic_background_active").attr("checked")) {
                    jQuery(".page_background").show();
               }
               else{
                    jQuery(".page_background").hide();
               }

               //show/hide background image options
               jQuery("#themetastic_background_active").click(function() {
                    $this=jQuery(this).attr("checked");
                    if($this){
                         jQuery(".page_background").show(200);
                         
                    }
                    else{
                         jQuery(".page_background").hide(200);
                        
                    }
               });

               //on load portfolio style view
               if(jQuery("input[name=themetastic_detail_view_style]").length){
                    detailView = jQuery("input[name=themetastic_detail_view_style]:checked").val();
                    if(detailView=="columns")     
                         jQuery(".columns").hide();
               }

               //onclick portfolio style view
               jQuery("input[name=themetastic_detail_view_style]").click(function(){
                    detailView = jQuery("input[name=themetastic_detail_view_style]:checked").val();
                    if(detailView=="columns")
                         jQuery(".columns").hide();
                    else{ 
                         jQuery(".columns").show();
                         if(jQuery("#themetastic_activate_sidebar").attr("checked")) {
                              jQuery(".sidebar").show();
                         }
                         else{
                              jQuery(".sidebar").hide();
                         }
                    }
               });


          // POSTS

     		//post type options onclick
     		jQuery("input[name=\"themetastic_post_type\"]").click(function(){
     			postType = jQuery(this).val();
     			jQuery(".post_type").each(function(){
     				$this=jQuery(this);
     				if($this.hasClass(postType)) $this.show();
     				else $this.hide();
     			});
     		});

     		//post video options onclick
			jQuery("input[name=\"themetastic_video_type\"]").click(function(){
     			postType = jQuery(this).val();
     			jQuery(".post_type").each(function(){
     				$this=jQuery(this);
     				if($this.hasClass(postType)) $this.show();
     				else $this.hide();
     			});
     		});
			
			//post video options onclick
			jQuery("input[name=\"themetastic_image_type\"]").click(function(){
     			postType = jQuery(this).val();
     			jQuery(".post_type").each(function(){
     				$this=jQuery(this);
     				if($this.hasClass(postType)) $this.show();
     				else $this.hide();
     			});
     		});

			//onload post type options
     		postType = jQuery("input[name=themetastic_post_type]:checked").val();
     		jQuery(".post_type").each(function(){
 				$this=jQuery(this);
 				if($this.hasClass(postType)) $this.show();
 				else $this.hide();
     		});

     		if(postType=="video"){
     			postType = jQuery("input[name=themetastic_video_type]:checked").val();
	     		jQuery(".post_type").each(function(){
	 				$this=jQuery(this);
	 				if($this.hasClass(postType)) $this.show();
	 				else $this.hide();
	     		});
			}

			if(postType=="image"){
     			postType = jQuery("input[name=themetastic_image_type]:checked").val();
	     		jQuery(".post_type").each(function(){
	 				$this=jQuery(this);
	 				if($this.hasClass(postType)) $this.show();
	 				else $this.hide();
	     		});
			}

			//post external link onclick
			jQuery("input[name=\"themetastic_portfolio_link\"]").click(function(){
     			postType = jQuery(this).val();
     			jQuery(".post_link").each(function(){
     				$this=jQuery(this);
     				if($this.hasClass(postType)) $this.show();
     				else $this.hide();
     			});
     		});
			
			//onload external link
     		postType = jQuery("input[name=themetastic_portfolio_link]:checked").val();
     		jQuery(".post_link").each(function(){
 				$this=jQuery(this);
 				if($this.hasClass(postType)) $this.show();
 				else $this.hide();
     		});

			if(jQuery("input[name=themetastic_video_width]").val()==""){
				jQuery("input[name=themetastic_video_width]").val("640");
			}

			if(jQuery("input[name=themetastic_video_height]").val()==""){
				jQuery("input[name=themetastic_video_height]").val("360");
			}

               jQuery("#themetastic_activate_slider").click(function() {
                    $this=jQuery(this).attr("checked");
                    if($this){
                         jQuery(".slider_content").show();
                    }
                    else{
                         jQuery(".slider_content").hide();
                    }
               });

                  $this=jQuery("#themetastic_activate_slider").attr("checked");
                    if($this){
                         jQuery(".slider_content").show();
                    }
                    else{
                         jQuery(".slider_content").hide();
                    }


}); //End jquery document ready
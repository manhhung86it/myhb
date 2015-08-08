<?php
	/* ------------------------------------- */
	/* PORTFOLIO POST TYPES */
	/* ------------------------------------- */
	
	
	//Get Portfolio Slugs & Names
		$portfolios = get_option("themetastic_theme_portfolios_options");
		$portfolio_slugs = array();
		$portfolio_names = array();
		$j = 1;
		if(is_array($portfolios)){
			foreach($portfolios as $key => $value){
				if($j%2==0){
		            array_push($portfolio_slugs,$value);
		            $j = 0 ;
		        }
		        else{
		            array_push($portfolio_names,$value);
		        }
		    	$j++;
			}

			//Create Post Types
			$portfolio_counter = 0;
			foreach ( $portfolio_slugs as $slug ){
					add_action('init', 'create_portfolio');
					register_taxonomy("category_".$slug, array($slug), array("hierarchical" => true, "label" => $portfolio_names[$portfolio_counter++]." Categories", "singular_label" => "$slug Category", "rewrite" => true));
			}
		}		
		
	function create_portfolio() {
		global $portfolio_slugs,$portfolio_names;
		
		$portfolio_counter = 0;
		foreach ( $portfolio_slugs as $slug ){
			$portfolio_args = array(
				'label' => "Portfolio '".$portfolio_names[$portfolio_counter]."'",
				'singular_label' => $portfolio_names[$portfolio_counter++],
				'public' => true,
				'show_ui' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array('slug' => $slug, 'with_front' => true),
				'supports' => array('title', 'editor', 'thumbnail', 'author', 'comments', 'excerpt'),
				'taxonomies' => array('category_'.$slug,'post_tag') // this is IMPORTANT
			);
			register_post_type($slug,$portfolio_args);
			
		}
	}
	
	
	function portfolioSingleRedirect(){
	    global $wp_query;
	    $queryptype = $wp_query->query_vars["post_type"];
		global $portfolio_slugs,$portfolio_names;
		if(is_array($portfolio_slugs))
			foreach ( $portfolio_slugs as $slug ){
				if ($queryptype == $slug){
					if (have_posts()){
						global $pcat;
						$pcat = "category_".$slug;
						require(TEMPLATEPATH . '/single_portfolio.php');
						die();
					}else{
						$wp_query->is_404 = true;
					}
				}
			}
	}
	add_action("template_redirect", 'portfolioSingleRedirect'); ?>
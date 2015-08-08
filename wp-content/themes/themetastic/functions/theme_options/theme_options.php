<?php
	// Theme Options		
		$theme_sections = array(
			array(
				'label' => 'Layout',
				'desc' => '',
				'sections' => array(
					'style' => 'Layout Style',
					'responsive' => 'Responsive'
				),
				'fields' => array(
								//Layout Style
									array(
										'id' => 'themelayout',
										'label' => 'Set theme layout to',
										'description' => '',
										'type' => 'radio',
										'options' => array("Boxed"=>"Boxed","Full-Width"=>"Full-Width"),
										'section' => 'style'
									),
									array(
										'id' => 'custom_css',
										'label' => 'Custom CSS',
										'description' => 'Insert some custom CSS here (fast hack for quick CSS changes without Child Theme)',
										'size' => '',
										'type' => 'textarea',
										'section' => 'style'
									),
								//Responsive
									array(
										'id' => 'responsive',
										'label' => 'Responsive Theme behavior?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'responsive'
									),
							), 				
				'slug' => 'layout'
			),
			array(
				'label' => 'Header',
				'desc' => '',
				'slug' => 'header',
				'sections' => array(
					'logo' => 'Logo',
					'headertopline' => 'Top Header Line',
					'search' => 'Header Search',
					'submenu' => 'Menu',
					'slider' => 'Head Slider'
				),
				'fields' => array(
								//Logo	
									array(
										'id' => 'img_logo',
										'label' => 'Logo Image',
										'description' => 'The logo used in the left header area.',
										'type' => 'image',
										'section' => 'logo'
									),
									array(
										'id' => 'resp_img_logo',
										'label' => 'Logo Image Responsive',
										'description' => 'Please create an image twice the size as the main logo and name it like the normal logo but with @2x as extension of the base name. 
															Assuming your logo is named "logo.png" please name it "logo@2x.png"',
										'type' => 'image',
										'section' => 'logo'
									),  
									array(
										'id' => 'margin_top',
										'label' => 'Logo Margin Top',
										'description' => 'Margin above the Logo (in px)',
										'size' => '',
										'type' => 'input',
										'section' => 'logo'
									),
									array(
										'id' => 'margin_bottom',
										'label' => 'Logo Margin Bottom',
										'description' => 'Margin beneath the Logo (in px)',
										'size' => '',
										'type' => 'input',
										'section' => 'logo'
									),

								//Top Header Line
									array(
										'id' => 'headertopline',
										'label' => 'Header Top Line Active?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'headertopline'
									),
									array(
										'id' => 'headertopline_color',
										'label' => 'Top Line Color Set',
										'description' => 'Display the headline in highlight color or a minimal grey version',
										'type' => 'radio',
										'options' => array("grey"=>"Minimal Grey","highlight"=>"Highlight"),
										'section' => 'headertopline'
									),
								//Header Search
									array(
										'id' => 'headersearch',
										'label' => 'Header Search Active?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'search'
									),	
								//Menu  
									array(
										'id' => 'submenuwidth',
										'label' => 'Submenu Width',
										'description' => 'The width of the submenu items.',
										'size' => '',
										'type' => 'input',
										'section' => 'submenu'
									),
								//Home Slider
									array(
										'id' => 'parallax_effects',
										'label' => 'Head Slider with Parallax effect?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'slider'
									),
				)
			),
			array(
				'label' => 'Footer',
				'desc' => '',
				'sections' => array(
					'footer' => 'Footers'
				),
				'fields' => array(
								//Footer
									array(
										'id' => 'footerwidgetsactive',
										'label' => 'Footer Active?',
										'description' => 'Display the Footer widget area',
										'type' => 'checkbox',
										'section' => 'footer'
									),
									array(
										'id' => 'subfooterwidgetsactive',
										'label' => 'Sub Footer Active?',
										'description' => 'Display the Sub Footer widget area',
										'type' => 'checkbox',
										'section' => 'footer'
									)
				), 				
				'slug' => 'footer'
			),
			array(
				'label' => 'FavIcons',
				'desc' => '',
				'slug' => 'favicons',
				'sections' => array(
					'favicons' => 'Favicon Settings',
				),
				'fields' => array(
								//Logo	
									array(
										'id' => 'favicon16',
										'label' => 'Favicon Regular 16x16',
										'description' => 'The regular favicon. Must be 16 x 16 in .ico format.',
										'type' => 'image',
										'section' => 'favicons'
									),
									array(
										'id' => 'favicon57',
										'label' => 'Favicon Regular 57x57',
										'description' => 'The apple touch 57 x 57 .png format favicon.',
										'type' => 'image',
										'section' => 'favicons'
									),
									array(
										'id' => 'favicon72',
										'label' => 'Favicon Regular 72x72',
										'description' => 'The apple touch 72 x 72 .png format favicon.',
										'type' => 'image',
										'section' => 'favicons'
									),
									array(
										'id' => 'favicon114',
										'label' => 'Favicon Regular 114x114',
										'description' => 'The apple touch 114 x 114 .png format favicon.',
										'type' => 'image',
										'section' => 'favicons'
									),
									
									
				)
			),
				array(
				'label' => 'Fonts',
				'desc' => '',
				'slug' => 'font',
				'sections' => array(
					'font' => 'Headline Font',
				),
				'fields' => array(
								//Font									
									array(
										'id' => 'font_headlineurl',
										'label' => 'Headline Google Web Font URL',
										'description' => '<strong>Optional</strong> - The google web font URL of the font used for the headlines. Example: <strong>http://fonts.googleapis.com/css?family=PT+Sans:400,700</strong>',
										'size' => '500',
										'type' => 'input',
										'section' => 'font'
									),
									array(
										'id' => 'font_headlinefamily',
										'label' => 'Headline Font Family',
										'description' => 'The font family string for the headlines (could be google font from above). Example: \'PT Sans\', sans-serif',
										'size' => '500',
										'type' => 'input',
										'section' => 'font'
									),
				) 
			),
			array(
				'label' => 'Highlight Color',
				'desc' => '',
				'slug' => 'color',
				'sections' => array(
					'highlight' => 'Highlight'
				),
				'fields' => array(
								//Main Color
									array(
										'id' => 'color_highlight',
										'label' => 'Theme Main Highlight Color',
										'description' => 'The highlight color used in the theme. (Everything that is green in the theme preview)',
										'type' => 'color',
										'section' => 'highlight'
										
									)
				)
			),
			array(
				'label' => 'Background',
				'desc' => '',
				'slug' => 'background',
				'sections' => array(
					'background' => 'Background Settings'
				),
				'fields' => array(
									array(
										'id' => 'img_bgdefault',
										'label' => 'Default Site Background Image',
										'description' => 'This is the default background image for the site. Leave blank for no background image.',
										'type' => 'image',
										'section' => 'background'
									),
									array(
										'id' => 'img_bgtype',
										'label' => 'Background Image Type',
										'description' => '',
										'type' => 'radio',
										'options' => array("tiled"=>"Tiled","full"=>"Full"),
										'section' => 'background'
									),
				)
			),
			array(
				'label' => 'Search & 404',
				'desc' => '',
				'slug' => 'search',
				'sections' => array(
					'search' => 'Search Settings',
					'fourofour' => '404 Page'
				),
				'fields' => array(
								//Main Color
									array(
										'id' => 'searchresultsnumber',
										'label' => 'Results Per Page',
										'description' => 'The number of maximum search results you want to see on one page.',
										'type' => 'input',
										'section' => 'search'
										
									),
									array(
										'id' => '404page',
										'label' => '404 Page',
										'description' => 'Set the page you want to redirect your view if he reaches a dead link.',
										'type' => 'selectpage',
										'section' => 'fourofour'
										
									)
				)
			),
			array(
				'label' => 'Sidebars',
				'desc' => '',
				'sections' => array(
					'sidebars' => 'Sidebars'
				),
				'fields' => array(
								//Sidebars
									array(
										'id' => 'sidebar_builder',
										'label' => 'Sidebars',
										'description' => 'Which one?',
										'type' => 'sidebar_build',
										'section' => 'sidebars'
									)
				), 				
				'slug' => 'sidebars'
			),
			array(
				'label' => 'Portfolios',
				'desc' => '',
				'sections' => array(
					'portfolios' => 'Portfolios'
				),
				'slug' => 'portfolios',
				'fields' => array(
								//Sidebars
									array(
										'id' => 'portfolio_builder',
										'label' => 'Portfolios',
										'description' => 'Which one?',
										'type' => 'portfolio_build',
										'section' => 'portfolios'
									)
				)
			),
			
			array(
				'label' => 'Portfolio Settings',
				'desc' => '',
				'sections' => array(
					'overview' => 'Overview',
					'entry' => 'Single Entry'
				),
				'fields' => array(
								//Overview
									array(
										'id' => 'portfoliolock',
										'label' => 'Lock Portfolio Thumb Heights (in px)',
										'description' => 'Set to the height you want to lock all portfolio thumbs to proportional. Leave blank for automatic proportional height. This value can be overwritten in the Portfolio Pages.',
										'type' => 'input',
										'section' => 'overview'
										
									),
									array(
										'id' => 'portfolioarchivesidebar',
										'label' => 'Category Page Layout',
										'description' => 'This setting determines the site layout of the portfolio category page.',
										'type' => 'radio',
										'options' => array("Full-Width"=>"Full-Width","Sidebar Left"=>"Sidebar Left","Sidebar Right"=>"Sidebar Right"),
										'section' => 'overview'
									),
									array(
										'id' => 'portfolioarchivenumber',
										'label' => 'Category Items on Page',
										'description' => 'How many items to display on one Category page?',
										'type' => 'input',
										'section' => 'overview'
										
									),
								//Entry
									array(
										'id' => 'portfoliopostlayout',
										'label' => 'Post Layout',
										'description' => 'Select which layout you want for single portfolio posts.',
										'type' => 'radio',
										'options' => array("Large Media"=>"Large Media","Small Media"=>"Small Media"),
										'section' => 'entry'
									),
									array(
										'id' => 'portfoliorelated',
										'label' => 'Display Related Posts?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'entry'
									),
									array(
										'id' => 'portfoliopostinfo_date',
										'label' => 'Display Date in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'entry'
									),
									array(
										'id' => 'portfoliopostinfo_author',
										'label' => 'Display Author in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'entry'
									),
									array(
										'id' => 'portfoliopostinfo_category',
										'label' => 'Display Category in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'entry'
									),
									array(
										'id' => 'portfoliopostinfo_comments',
										'label' => 'Display Comments in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'entry'
									),
									
							), 				
				'slug' => 'portfoliodef'
			),
			
			array(
				'label' => 'Blog Settings',
				'desc' => '',
				'sections' => array(
					'overview' => 'Overview',
					'single' => 'Single Post',
					'archive' => 'Category & Archive'
				),
				'fields' => array(
								//Overview
									array(
										'id' => 'blogoverviewpostlayout',
										'label' => 'Post Layout',
										'description' => 'Select which layout you want for single portfolio posts.',
										'type' => 'radio',
										'options' => array("Large Media"=>"Large Media","Small Media"=>"Small Media"),
										'section' => 'overview'
									),
									array(
										'id' => 'blogoverviewsingledate',
										'label' => 'Display Date Box?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'overview'
									),
									array(
										'id' => 'blogoverviewpostinfo_date',
										'label' => 'Display Date in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'overview'
									),
									array(
										'id' => 'blogoverviewpostinfo_author',
										'label' => 'Display Author in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'overview'
									),
									array(
										'id' => 'blogoverviewpostinfo_category',
										'label' => 'Display Category in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'overview'
									),
									array(
										'id' => 'blogoverviewpostinfo_comments',
										'label' => 'Display Comments in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'overview'
									),
									array(
										'id' => 'blogoverviewpostinfo_tags',
										'label' => 'Display Tags in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'overview'
									),
								//Entry
									array(
										'id' => 'blogpostlayout',
										'label' => 'Post Layout',
										'description' => 'Select which layout you want for single portfolio posts.',
										'type' => 'radio',
										'options' => array("Large Media"=>"Large Media","Small Media"=>"Small Media"),
										'section' => 'single'
									),
									array(
										'id' => 'blogrelated',
										'label' => 'Display Related Posts?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'single'
									),
									array(
										'id' => 'blogpostinfo_date',
										'label' => 'Display Date in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'single'
									),
									array(
										'id' => 'blogpostinfo_author',
										'label' => 'Display Author in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'single'
									),
									array(
										'id' => 'blogpostinfo_category',
										'label' => 'Display Category in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'single'
									),
									array(
										'id' => 'blogpostinfo_comments',
										'label' => 'Display Comments in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'single'
									),
									array(
										'id' => 'blogpostinfo_tags',
										'label' => 'Display Tags in Infoline?',
										'description' => 'Yes',
										'type' => 'checkbox',
										'section' => 'single'
									),
								//Cat & Arch
									array(
										'id' => 'blogarchivesidebar',
										'label' => 'Page Layout',
										'description' => 'This setting determines the site layout of the blog\'s category & archive page.',
										'type' => 'radio',
										'options' => array("Full-Width"=>"Full-Width","Sidebar Left"=>"Sidebar Left","Sidebar Right"=>"Sidebar Right"),
										'section' => 'archive'
									),
									array(
										'id' => 'blogarchivesidebar_select',
										'label' => 'Sidebar (optional, see previous)',
										'description' => 'Which Sidebar to display with Category/Archive?',
										'type' => 'sidebar_mandotory_choose',
										'section' => 'archive'
									),
							), 				
				'slug' => 'blog'
			),
			array(
				'label' => 'Support',
				'desc' => '',
				'slug' => 'support',
				'sections' => array('support' => ''),
				'fields' => array(
								//Support Text
									array(
										'id' => 'support',
										'label' => '<strong>Get Support</strong>',
										'description' => '<p>In case you face any problems feel free to contact us via the "Item Discussion" or the ticketing system 
															"ticksy"</p><p><a href="http://damojo.ticksy.com"><img src="'.get_template_directory_uri().'/img/ticksy.png"></a></p>
															<style> #wpbody .submit {display:none;}</style>',
										'type' => 'html',
										'section' => 'support'
									)

			)
		)
		);
?>
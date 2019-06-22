<?php

add_action('init', 'of_options');

if (!function_exists('of_options')) {
    function of_options()
    {
        //Access the WordPress Categories via an Array
        $of_categories     = array();
        $of_categories_obj = get_categories('hide_empty=0');
        foreach ($of_categories_obj as $of_cat) {
            $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
        }
        $categories_tmp = array_unshift($of_categories, "Select a category:");
        
        //Access the WordPress Pages via an Array
        $of_pages     = array();
        $of_pages_obj = get_pages('sort_column=post_parent,menu_order');
        foreach ($of_pages_obj as $of_page) {
            $of_pages[$of_page->ID] = $of_page->post_name;
        }
        $of_pages_tmp = array_unshift($of_pages, "Select a page:");
        
        
        
        /*-----------------------------------------------------------------------------------*/
        /* TO DO: Add options/functions that use these */
        /*-----------------------------------------------------------------------------------*/
        
        //Background Images Reader
        $bg_images_path = get_stylesheet_directory() . '/images/bg/';
        $bg_images_url  = get_template_directory_uri() . '/images/bg/';
        $bg_images      = array();
        
        if (is_dir($bg_images_path)) {
            if ($bg_images_dir = opendir($bg_images_path)) {
                while (($bg_images_file = readdir($bg_images_dir)) !== false) {
                    if (stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                        natsort($bg_images); //Sorts the array into a natural order
                        $bg_images[] = $bg_images_url . $bg_images_file;
                    }
                }
            }
        }
        
        $column = array(
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10,
            11,
            12,
            'Disable'
        );
        
        
        /*-----------------------------------------------------------------------------------*/
        /* The Options Array */
        /*-----------------------------------------------------------------------------------*/
        
        // Set the Options Array
        global $of_options;
        $of_options = array();
        
        /* ------------------------------------------------------------------------ */
        /* General
        /* ------------------------------------------------------------------------ */
        $of_options[] = array(
            "name" => "General",
            "type" => "heading"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("General", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Tracking Code", "erange"),
            "desc" => __("Paste your Google Analytics Code (or other) here.", "erange"),
            "id" => "textarea_trackingcode",
            "std" => "",
            "type" => "textarea"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Favicons", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Favicon Upload (16x16)", "erange"),
            "desc" => __("Upload your Favicon (16x16px ico/png - use <a href='http://www.favicon.cc/' target='_blank'>favicon.cc</a> to make sure it's fully compatible)", "erange"),
            "id" => "media_favicon",
            "std" => "",
            "mod" => "min",
            "type" => "media"
        );
        
        $of_options[] = array(
            "name" => __("Apple iPhone Icon Upload (57x57)", "erange"),
            "desc" => __("Upload your Apple Touch Icon (57x57px png)", "erange"),
            "id" => "media_favicon_iphone",
            "std" => "",
            "mod" => "min",
            "type" => "media"
        );
        
        $of_options[] = array(
            "name" => __("Apple iPhone Retina Icon Upload (114x114)", "erange"),
            "desc" => __("Upload your Apple Touch Retina Icon (114x114px png)", "erange"),
            "id" => "media_favicon_iphone_retina",
            "std" => "",
            "mod" => "min",
            "type" => "media"
        );
        
        $of_options[] = array(
            "name" => __("Apple iPad Icon Upload (72x72)", "erange"),
            "desc" => __("Upload your Apple Touch Retina Icon (144x144px png)", "erange"),
            "id" => "media_favicon_ipad",
            "std" => "",
            "mod" => "min",
            "type" => "media"
        );
        
        $of_options[] = array(
            "name" => __("Apple iPad Retina Icon Upload (144x144px)", "erange"),
            "desc" => __("Upload your Apple Touch Retina Icon (144x144px png)", "erange"),
            "id" => "media_favicon_ipad_retina",
            "std" => "",
            "mod" => "min",
            "type" => "media"
        );
        
        /* ------------------------------------------------------------------------ */
        /* Layout
        /* ------------------------------------------------------------------------ */
        $of_options[] = array(
            "name" => "Layout",
            "type" => "heading"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Layout Options", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => "Layout Style",
            "desc" => __("Choose your Layout Style", "erange"),
            "id" => "select_layoutstyle",
            "std" => "fullwidth",
            "type" => "select",
            "options" => array(
                'fullwidth' => __('Fullwidth',"erange"),
                'boxed' => __('Boxed Layout',"erange"),
                'boxed_margin' => __('Boxed Margin Layout',"erange"),
            )
        );
        
        $of_options[] = array(
            "name" => __("Enable Fixed Header", "erange"),
            "id" => "check_fixed_header",
            "std" => 1,
            "on" => __("Enable", "erange"),
            "off" => __("Disable", "erange"),
            "type" => "switch"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Boxed Layout Options (only work when Boxed Layout is enabled)", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Background Images", "erange"),
            "desc" => __("Select a background pattern.", "erange"),
            "id" => "custom_bg",
            "std" => $bg_images_url . "argyle.png",
            "type" => "tiles",
            "options" => $bg_images
        );
        
        $of_options[] = array(
            "name" => __("Custom Background Image", "erange"),
            "desc" => __("Upload default Background or paste Image URL", "erange"),
            "id" => "media_bg",
            "std" => "",
            "mod" => "min",
            "type" => "media"
        );
        
        $of_options[] = array(
            "name" => __("Theme Stylesheet", "erange"),
            "desc" => __("Select Background Repeat Option for the default Background.", "erange"),
            "id" => "select_bg",
            "std" => __("Stretch Image", "erange"),
            "type" => "select",
            "options" => array(
                'Cover',
                'repeat',
                'no-repeat',
                'repeat-x',
                'repeat-y'
            )
        );
        
        $of_options[] = array(
            "name" => __("Default Background Color", "erange"),
            "desc" => __("Select Color for default Background", "erange"),
            "id" => "color_bg",
            "std" => "#1111",
            "type" => "color"
        );
        
        /* ------------------------------------------------------------------------ */
        /* Header
        /* ------------------------------------------------------------------------ */
        $of_options[] = array(
            "name" => "Header",
            "type" => "heading"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Header Options", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Display Logo", "erange"),
            "desc" => __("Display logo or text ?", "erange"),
            "id" => "select_logo",
            "std" => "logo",
            "type" => "select",
            "options" => array(
                'text' => 'Text',
                'logo' => 'Logo'
            )
        );
        
        $of_options[] = array(
            "name" => __("Call Us Text", "erange"),
            "desc" => __("Enter your Call us Text (HTML allowed)", "erange"),
            "id" => "text_callus",
            "std" => __("Call Us: (1)118 234 678 - Mail info@example.com", "erange"),
            "type" => "textarea"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Logo Options", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Header Height (without px)", "erange"),
            "desc" => __("Header Height (Default: auto)", "erange"),
            "id" => "style_headerheight",
            "std" => "auto",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Logo Upload", "erange"),
            "desc" => __("Upload your Logo", "erange"),
            "id" => "media_logo",
            "std" => "",
            "mod" => "min",
            "type" => "media"
        );
        
        $of_options[] = array(
            "name" => __("Logo Top Margin", "erange"),
            "desc" => __("Enter your Top margin value for the Logo in pixels (Default: 0px)", "erange"),
            "id" => "style_logotopmargin",
            "std" => "0",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Logo Bottom Margin", "erange"),
            "desc" => __("Enter your Bottom margin value for the Logo in pixels (Default: 0px)", "erange"),
            "id" => "style_logobottommargin",
            "std" => "0px",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Optional: Retina Logo Options", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Logo Upload Retina", "erange"),
            "desc" => __("Upload your Retina Logo. This should be your Logo in double size (If your logo is 100 x 20px, it should be 200 x 40px)", "erange"),
            "id" => "media_logo_retina",
            "std" => "",
            "mod" => "min",
            "type" => "media"
        );
        
        /* ------------------------------------------------------------------------ */
        /* Footer
        /* ------------------------------------------------------------------------ */
        $of_options[] = array(
            "name" => __("Footer", "erange"),
            "type" => "heading"
        );
        
        $of_options[] = array(
            "name" => __("Footer Row", "erange"),
            "desc" => __("Select number of row of Footer", "erange"),
            "id" => "select_footer_row",
            "std" => "1",
            "type" => "select",
            "options" => array(
                'one' => 'One Row',
                'two' => 'Two Row'
            )
        );

        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Footer Widgets Options", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Footer Widget 1 Width", "erange"),
            "desc" => __("Select width of Widget 1", "erange"),
            "id" => "footer_widget_1_width",
            "std" => "3",
            "type" => "select",
            "options" => $column
        );
        
        $of_options[] = array(
            "name" => __("Footer Widget 2 Width", "erange"),
            "desc" => __("Select width of Widget 2", "erange"),
            "id" => "footer_widget_2_width",
            "std" => "3",
            "type" => "select",
            "options" => $column
        );
        
        $of_options[] = array(
            "name" => __("Footer Column 3 Width", "erange"),
            "desc" => __("Select width of Widget 3", "erange"),
            "id" => "footer_widget_3_width",
            "std" => "3",
            "type" => "select",
            "options" => $column
        );
        
        $of_options[] = array(
            "name" => __("Footer Column 4 Width", "erange"),
            "desc" => __("Select width of Widget 4", "erange"),
            "id" => "footer_widget_4_width",
            "std" => "3",
            "type" => "select",
            "options" => $column
        );

        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Footer 2nd Row Widgets Options", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Footer Widget 5 Width", "erange"),
            "desc" => __("Select width of Widget 5", "erange"),
            "id" => "footer_widget_5_width",
            "std" => "3",
            "type" => "select",
            "options" => $column
        );
        
        $of_options[] = array(
            "name" => __("Footer Widget 6 Width", "erange"),
            "desc" => __("Select width of Widget 6", "erange"),
            "id" => "footer_widget_6_width",
            "std" => "3",
            "type" => "select",
            "options" => $column
        );
        
        $of_options[] = array(
            "name" => __("Footer Column 7 Width", "erange"),
            "desc" => __("Select width of Widget 7", "erange"),
            "id" => "footer_widget_7_width",
            "std" => "3",
            "type" => "select",
            "options" => $column
        );
        
        $of_options[] = array(
            "name" => __("Footer Column 8 Width", "erange"),
            "desc" => __("Select width of Widget 8", "erange"),
            "id" => "footer_widget_8_width",
            "std" => "3",
            "type" => "select",
            "options" => $column
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Credit Options", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Copyright Text", "erange"),
            "desc" => __("Enter your Copyright Text (HTML allowed)", "erange"),
            "id" => "textarea_copyright",
            "std" => __("Copyright [years] by [sitename]. Powered by WordPress", "erange"),
            "type" => "textarea"
        );
        
        /* ------------------------------------------------------------------------ */
        /* Typography
        /* ------------------------------------------------------------------------ */
        $of_options[] = array(
            "name" => __("Typography", "erange"),
            "type" => "heading"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Body", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Body Text Font", "erange"),
            "desc" => __("Specify the Body font properties", "erange"),
            "id" => "font_body",
            "std" => array(
                'size' => '13px',
                'face' => 'Open Sans',
                'style' => 'normal',
                'color' => '#999999'
            ),
            "type" => "typography"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Headlines", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("H1 - Headline Font", "erange"),
            "desc" => __("Specify the H1 Headline font properties", "erange"),
            "id" => "font_h1",
            "std" => array(
                'size' => '22px',
                'face' => 'Lato',
                'style' => 'bold',
                'color' => '#555555'
            ),
            "type" => "typography"
        );
        
        $of_options[] = array(
            "name" => __("H2 - Headline Font", "erange"),
            "desc" => __("Specify the H2 Headline font properties", "erange"),
            "id" => "font_h2",
            "std" => array(
                'size' => '20px',
                'face' => 'Lato',
                'style' => 'bold',
                'color' => '#555555'
            ),
            "type" => "typography"
        );
        
        $of_options[] = array(
            "name" => __("H3 - Headline Font", "erange"),
            "desc" => __("Specify the H3 Headline font properties", "erange"),
            "id" => "font_h3",
            "std" => array(
                'size' => '18px',
                'face' => 'Lato',
                'style' => 'bold',
                'color' => '#555555'
            ),
            "type" => "typography"
        );
        
        $of_options[] = array(
            "name" => __("H4 - Headline Font", "erange"),
            "desc" => __("Specify the H4 Headline font properties", "erange"),
            "id" => "font_h4",
            "std" => array(
                'size' => '16px',
                'face' => 'Lato',
                'style' => 'bold',
                'color' => '#555555'
            ),
            "type" => "typography"
        );
        
        $of_options[] = array(
            "name" => __("H5 - Headline Font", "erange"),
            "desc" => __("Specify the H5 Headline font properties", "erange"),
            "id" => "font_h5",
            "std" => array(
                'size' => '14px',
                'face' => 'Lato',
                'style' => 'bold',
                'color' => '#555555'
            ),
            "type" => "typography"
        );
        
        $of_options[] = array(
            "name" => __("H6 - Headline Font", "erange"),
            "desc" => __("Specify the H6 Headline font properties", "erange"),
            "id" => "font_h6",
            "std" => array(
                'size' => '12px',
                'face' => 'Lato',
                'style' => 'bold',
                'color' => '#555555'
            ),
            "type" => "typography"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Headlines Large", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("H1 - Headline Large Font", "erange"),
            "desc" => __("Specify the H1 Headline Large Font properties", "erange"),
            "id" => "font_large_h1",
            "std" => array(
                'size' => '33px',
                'face' => 'Lato',
                'style' => 'light',
                'color' => '#555555'
            ),
            "type" => "typography"
        );
        
        $of_options[] = array(
            "name" => __("H2 - Headline Large Font", "erange"),
            "desc" => __("Specify the H2 Headline Large Font properties", "erange"),
            "id" => "font_large_h2",
            "std" => array(
                'size' => '30px',
                'face' => 'Lato',
                'style' => 'light',
                'color' => '#555555'
            ),
            "type" => "typography"
        );
        
        $of_options[] = array(
            "name" => __("H3 - Headline Large Font", "erange"),
            "desc" => __("Specify the H3 Headline Large Font properties", "erange"),
            "id" => "font_large_h3",
            "std" => array(
                'size' => '27px',
                'face' => 'Lato',
                'style' => 'light',
                'color' => '#555555'
            ),
            "type" => "typography"
        );
        
        $of_options[] = array(
            "name" => __("H4 - Headline Large Font", "erange"),
            "desc" => __("Specify the H4 Headline Large Font properties", "erange"),
            "id" => "font_large_h4",
            "std" => array(
                'size' => '24px',
                'face' => 'Lato',
                'style' => 'light',
                'color' => '#555555'
            ),
            "type" => "typography"
        );
        
        $of_options[] = array(
            "name" => __("H5 - Headline Large Font", "erange"),
            "desc" => __("Specify the H5 Headline Large Font properties", "erange"),
            "id" => "font_large_h5",
            "std" => array(
                'size' => '22px',
                'face' => 'Lato',
                'style' => 'light',
                'color' => '#555555'
            ),
            "type" => "typography"
        );
        
        $of_options[] = array(
            "name" => __("H6 - Headline Large Font", "erange"),
            "desc" => __("Specify the H6 Headline Large Font properties", "erange"),
            "id" => "font_large_h6",
            "std" => array(
                'size' => '18px',
                'face' => 'Lato',
                'style' => 'light',
                'color' => '#555555'
            ),
            "type" => "typography"
        );
        
        /* ------------------------------------------------------------------------ */
        /* Styling
        /* ------------------------------------------------------------------------ */
        $of_options[] = array(
            "name" => "Styling",
            "type" => "heading"
        );
        
        /* ------------------------------------------------------------------------ */
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("General", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $url          = ADMIN_DIR . 'assets/images/color/';
        $of_options[] = array(
            "name" => __("Pre-Define Theme Color", "erange"),
            "desc" => __("Select your theme color.", "erange"),
            "id" => "theme_color",
            "std" => "default.css",
            "type" => "images",
            "options" => array(
                'amethyst.css' => $url . 'amethyst.png',
                'emerald.css' => $url . 'emerald.png',
                'orange.css' => $url . 'orange.png',
                'petterriver.css' => $url . 'petterriver.png',
                'turquoise.css' => $url . 'turquoise.png',
                'wetasphalt.css' => $url . 'wetasphalt.png',
                'default.css' => $url . 'red.png',
            )
        );
        
        /* Theme Color */
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Custom Theme Color", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Theme Color", "erange"),
            "desc" => __("Default: #EF4A43", "erange"),
            "id" => "custom_theme_color",
            "std" => "#EF4A43",
            "type" => "color"
        );
        
        
        /* ------------------------------------------------------------------------ */
        /* Post & Page
        /* ------------------------------------------------------------------------ */
        $of_options[] = array(
            "name" => __("Post and Page", "erange"),
            "type" => "heading"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Post and Page Options", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Blog Layout", "erange"),
            "desc" => __("Choose your Default Blog Layout", "erange"),
            "id" => "select_bloglayout",
            "std" => "large",
            "type" => "select",
            "options" => array(
                'large' => __('Blog Normal', "erange"),
                'medium' => __('Blog Medium', "erange"),
                'masonry' => __('Blog Masonry', "erange"),
            )
        );
        
        $of_options[] = array(
            "name" => __("Blog Sidebar Position", "erange"),
            "desc" => __("Blog Listing Sidebar Position", "erange"),
            "id" => "select_blogsidebar",
            "std" => "content-sidebar",
            "type" => "select",
            "options" => array(
                'content-sidebar' => 'Sidebar Right',
                'sidebar-content' => 'Sidebar Left',
            )
        );
        
        $of_options[] = array(
            "name" => __("Enable Share-Box on Post Detail", "erange"),
            "desc" => __("Check to enable Share-Box", "erange"),
            "id" => "check_sharebox",
            "std" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array(
            "name" => __("Blog Excerpt Length", "erange"),
            "desc" => __("Default: 30. Used for blog page, archives & search results.", "erange"),
            "id" => "text_excerptlength",
            "std" => "30",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Enable Author-Box on Post Detail", "erange"),
            "desc" => __("Check to enable Author-Box", "erange"),
            "id" => "check_authorbox",
            "std" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array(
            "name" => __("Enable Relate Post on Post Detail", "erange"),
            "desc" => __("Check to enable Relate Post on Post Detail", "erange"),
            "id" => "check_relatepost",
            "std" => 1,
            "type" => "switch"
        );
        
        $of_options[] = array(
            "name" => __("Permanently Disable Page Comments", "erange"),
            "desc" => __("Check to disable page comments", "erange"),
            "id" => "check_disable_page_comment",
            "std" => 0,
            "type" => "switch"
        );
        
        $of_options[] = array(
            "name" => __("Permanently Disable Post Comments", "erange"),
            "desc" => __("Check to disable post comments", "erange"),
            "id" => "check_disable_post_comment",
            "std" => 0,
            "type" => "switch"
        );
        
        /* ------------------------------------------------------------------------ */
        /* Sidebar
        /* ------------------------------------------------------------------------ */
        $of_options[] = array(
            "name" => "Sidebar",
            "type" => "heading"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Creat Sidebar", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Create Sidebar Area", "erange"),
            "desc" => __("Unlimited slider with drag and drop sortings.", "erange"),
            "id" => "unlimited_sidebar",
            "std" => "",
            "type" => "sidebar"
        );
        
        /* ------------------------------------------------------------------------ */
        /* Portfolio
        /* ------------------------------------------------------------------------ */
        $of_options[] = array(
            "name" => __("Portfolio", "erange"),
            "type" => "heading"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Portfolio Options", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Portfolio Slug", "erange"),
            "desc" => __("Enter the URL Slug for your Portfolio (Default: portfolio-item) <br /><strong>Go save your permalinks after changing this.</strong>", "erange"),
            "id" => "text_portfolioslug",
            "std" => "portfolio-item",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Custom Category Slug", "erange"),
            "desc" => __("Enter the Category Taxonomy Slug for your Portfolio (Default: portfolio_category) <br /><strong>Go save your permalinks after changing this.</strong>", "erange"),
            "id" => "text_portfolio_category_slug",
            "std" => "portfolio_category",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Custom Tag Slug", "erange"),
            "desc" => __("Enter the Tag Taxonomy Slug for your Portfolio (Default: portfolio_tag) <br /><strong>Go save your permalinks after changing this.</strong>", "erange"),
            "id" => "text_portfolio_tag_slug",
            "std" => "tag_category",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Portfolio Archive Columns", "erange"),
            "desc" => __("Choose number columns of Potfolio archive", "erange"),
            "id" => "select_portfolio_archive",
            "std" => "3",
            "type" => "select",
            "options" => array(
                '4' => __('3 Columns', "erange"),
                '3' => __('4 Columns', "erange")
            )
        );

        $of_options[] = array(
            "name" => __("Create new project URl", "erange"),
            "desc" => __("Enter create new project URL.", "erange"),
            "id" => "text_portfolio_new_project_url",
            "std" => "",
            "type" => "text"
        );

        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Recent Portfolio", "erange"),
            "icon" => false,
            "type" => "info"
        );

        $of_options[] = array(
            "name" => __("Recent Portfolio Heading", "erange"),
            "desc" => __("Enter Recent Portfolio Title", "erange"),
            "id" => "text_portfolio_recent_heading",
            "std" => "Recent Projects",
            "type" => "text"
        );

        $of_options[] = array(
            "name" => __("Recent Portfolio Sub-heading", "erange"),
            "desc" => __("Enter Recent Portfolio Title", "erange"),
            "id" => "text_portfolio_recent_subheading",
            "std" => "same project you are viewing",
            "type" => "text"
        );

        $of_options[] = array(
            "name" => __("Recent Portfolio Description", "erange"),
            "desc" => __("Enter Recent Portfolio Desc", "erange"),
            "id" => "text_portfolio_recent_desc",
            "std" => "",
            "type" => "textarea"
        );
        
        /* ------------------------------------------------------------------------ */
        /* Social
        /* ------------------------------------------------------------------------ */
        $of_options[] = array(
            "name" => __("Social Media", "erange"),
            "type" => "heading"
        );
        
        $of_options[] = array(
            "name" => __("Hello there!", "erange"),
            "desc" => "",
            "id" => "introduction",
            "std" => __("Enter your username / URL to show or leave blank to hide Social Media Icons", "erange"),
            "icon" => true,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Twitter Username", "erange"),
            "desc" => __("Enter your Twitter username", "erange"),
            "id" => "social_twitter",
            "std" => "everislabs",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Dribbble URL", "erange"),
            "desc" => __("Enter URL to your Dribbble Account", "erange"),
            "id" => "social_dribbble",
            "std" => "",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Flickr URL", "erange"),
            "desc" => __("Enter URL to your Flickr Account", "erange"),
            "id" => "social_flickr",
            "std" => "",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Facebook URL", "erange"),
            "desc" => __("Enter URL to your Facebook Account", "erange"),
            "id" => "social_facebook",
            "std" => "",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Google+ URL", "erange"),
            "desc" => __("Enter URL to your Google+ Account", "erange"),
            "id" => "social_google",
            "std" => "",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("LinkedIn URL", "erange"),
            "desc" => __("Enter URL to your LinkedIn Account", "erange"),
            "id" => "social_linkedin",
            "std" => "",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("YouTube URL", "erange"),
            "desc" => __("Enter URL to your YouTube Account", "erange"),
            "id" => "social_youtube",
            "std" => "",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Pinterest URL", "erange"),
            "desc" => __("Enter URL to your Pinterest Account", "erange"),
            "id" => "social_pinterest",
            "std" => "",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Vimeo URL", "erange"),
            "desc" => __("Enter URL to your Vimeo Account", "erange"),
            "id" => "social_vimeo",
            "std" => "",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Instargram URL", "erange"),
            "desc" => __("Enter URL to your Instagram Account", "erange"),
            "id" => "social_instagram",
            "std" => "",
            "type" => "text"
        );
        
        $of_options[] = array(
            "name" => __("Show RSS", "erange"),
            "desc" => __("Check to Show RSS Icon", "erange"),
            "id" => "social_rss",
            "std" => 1,
            "type" => "checkbox"
        );
        
        /* ------------------------------------------------------------------------ */
        /* Custom CSS
        /* ------------------------------------------------------------------------ */
        $of_options[] = array(
            "name" => __("Custom CSS", "erange"),
            "type" => "heading"
        );
        
        $of_options[] = array(
            "name" => "",
            "desc" => "",
            "id" => "general_heading",
            "std" => __("Insert your custom CSS", "erange"),
            "icon" => false,
            "type" => "info"
        );
        
        $of_options[] = array(
            "name" => __("Custom CSS", "erange"),
            "desc" => __("Advanced CSS Options. Paste your CSS Code.", "erange"),
            "id" => "textarea_csscode",
            "std" => "",
            "type" => "textarea"
        );
        
        /* ------------------------------------------------------------------------ */
        /* Backup
        /* ------------------------------------------------------------------------ */
        $of_options[] = array(
            "name" => __("Backup Options", "erange"),
            "type" => "heading"
        );
        
        $of_options[] = array(
            "name" => __("Backup and Restore Options", "erange"),
            "id" => "of_backup",
            "std" => "",
            "type" => "backup",
            "desc" => __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', "erange")
        );
        
        $of_options[] = array(
            "name" => __("Transfer Theme Options Data", "erange"),
            "id" => "of_transfer",
            "std" => "",
            "type" => "transfer",
            "desc" => __('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".', "erange")
        );
        
    } //End function: of_options()
} //End chack if function exists: of_options()
?>

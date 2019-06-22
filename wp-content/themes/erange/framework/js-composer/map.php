<?php
/**
 * The custom map for Visual Page Builder Plugin
 *
 * @author    EverisLabs
 * @package   Erange
 * @version   1.0
 */

$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;

$colors_arr = array(
    __("Default", "erange") => "color",
    __("Green", "erange") => "green",
    __("Red", "erange") => "red",
    __("Orange", "erange") => "orange",
    __("Yellow", "erange") => "yellow",
    __("Blue", "erange") => "blue",
    __("Black", "erange") => "black",
    __("Gray", "erange") => "gray",
    __("White", "erange") => "white",
    __("Color", "erange") => "color"
);

$animate_style = array(
    __('bounce', 'erange') => 'bounce',
    __('flash', 'erange') => 'flash',
    __('pulse', 'erange') => 'pulse',
    __('rubberBand', 'erange') => 'rubberBand',
    __('shake', 'erange') => 'shake',
    __('swing', 'erange') => 'swing',
    __('tada', 'erange') => 'tada',
    __('wobble', 'erange') => 'wobble',
    __('bounceIn', 'erange') => 'bounceIn',
    __('bounceInDown', 'erange') => 'bounceInDown',
    __('bounceInLeft', 'erange') => 'bounceInLeft',
    __('bounceInRight', 'erange') => 'bounceInRight',
    __('bounceInUp', 'erange') => 'bounceInUp',
    __('bounceOut', 'erange') => 'bounceOut',
    __('bounceOutDown', 'erange') => 'bounceOutDown',
    __('bounceOutLeft', 'erange') => 'bounceOutLeft',
    __('bounceOutRight', 'erange') => 'bounceOutRight',
    __('bounceOutUp', 'erange') => 'bounceOutUp',
    __('fadeIn', 'erange') => 'fadeIn',
    __('fadeInDown', 'erange') => 'fadeInDown',
    __('fadeInDownBig', 'erange') => 'fadeInDownBig',
    __('fadeInLeft', 'erange') => 'fadeInLeft',
    __('fadeInLeftBig', 'erange') => 'fadeInLeftBig',
    __('fadeInRight', 'erange') => 'fadeInRight',
    __('fadeInRightBig', 'erange') => 'fadeInRightBig',
    __('fadeInUp', 'erange') => 'fadeInUp',
    __('fadeInUpBig', 'erange') => 'fadeInUpBig',
    __('fadeOut', 'erange') => 'fadeOut',
    __('fadeOutDown', 'erange') => 'fadeOutDown',
    __('fadeOutDownBig', 'erange') => 'fadeOutDownBig',
    __('fadeOutLeft', 'erange') => 'fadeOutLeft',
    __('fadeOutLeftBig', 'erange') => 'fadeOutLeftBig',
    __('fadeOutRight', 'erange') => 'fadeOutRight',
    __('fadeOutRightBig', 'erange') => 'fadeOutRightBig',
    __('fadeOutUp', 'erange') => 'fadeOutUp',
    __('fadeOutUpBig', 'erange') => 'fadeOutUpBig',
    __('flip', 'erange') => 'flip',
    __('flipInX', 'erange') => 'flipInX',
    __('flipInY', 'erange') => 'flipInY',
    __('flipOutX', 'erange') => 'flipOutX',
    __('flipOutY', 'erange') => 'flipOutY',
    __('lightSpeedIn', 'erange') => 'lightSpeedIn',
    __('lightSpeedOut', 'erange') => 'lightSpeedOut',
    __('rotateIn', 'erange') => 'rotateIn',
    __('rotateInDownLeft', 'erange') => 'rotateInDownLeft',
    __('rotateInDownRight', 'erange') => 'rotateInDownRight',
    __('rotateInUpLeft', 'erange') => 'rotateInUpLeft',
    __('rotateInUpRight', 'erange') => 'rotateInUpRight',
    __('rotateOut', 'erange') => 'rotateOut',
    __('rotateOutDownLeft', 'erange') => 'rotateOutDownLeft',
    __('rotateOutDownRight', 'erange') => 'rotateOutDownRight',
    __('rotateOutUpLeft', 'erange') => 'rotateOutUpLeft',
    __('rotateOutUpRight', 'erange') => 'rotateOutUpRight',
    __('slideInDown', 'erange') => 'slideInDown',
    __('slideInLeft', 'erange') => 'slideInLeft',
    __('slideInRight', 'erange') => 'slideInRight',
    __('slideOutLeft', 'erange') => 'slideOutLeft',
    __('slideOutRight', 'erange') => 'slideOutRight',
    __('slideOutUp', 'erange') => 'slideOutUp',
    __('hinge', 'erange') => 'hinge',
    __('rollIn', 'erange') => 'rollIn',
    __('rollOut', 'erange') => 'rollOut'
);

// List all define sidebar
$sidebarposition = array();
$sidebarposition['default-sidebar'] = 'Default Sidebar';
$sidebar = get_theme_mod('unlimited_sidebar' );

if ($sidebar){
    foreach ( $sidebar as $sidebar_area ) {
        $sidebarposition[$sidebar_area['id']] = $sidebar_area['name'];
    }
}

// Used in "Button" and "Call to Action" blocks
$size_arr = array(
    __("Regular size", "erange") => "normal",
    __("Medium", "erange") => "medium",
    __("Small", "erange") => "small",
    __("Large", "erange") => "large",
);

$target_arr = array(
    __("Same window", "erange") => "_self",
    __("New window", "erange") => "_blank"
);

vc_map(array(
    "name" => __("Row", "erange"),
    "base" => "vc_row",
    "is_container" => true,
    "show_settings_on_create" => false,
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "colorpicker",
            "heading" => __("Custom Background Color", 'erange'),
            "param_name" => "bg_color",
            "description" => __("Select backgound color for your row", 'erange')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Padding', 'erange'),
            "param_name" => "padding",
            "description" => __("You can use px, em, %, etc. or enter just number and it will use pixels. ", 'erange')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Margin', 'erange'),
            "param_name" => "margin",
            "description" => __("You can use px, em, %, etc. or enter just number and it will use pixels. ", 'erange')
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Border Top", "erange"),
            "param_name" => "border_top",
            "value" => array(
                __('None', "erange") => '',
                __('Top', "erange") => 'top',
                __('Bottom', "erange") => 'bottom'
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Border Bottom", "erange"),
            "param_name" => "border_bottom",
            "value" => array(
                __('None', "erange") => '',
                __('Top', "erange") => 'top',
                __('Bottom', "erange") => 'bottom'
            )
        ),
        array(
            "type" => "attach_image",
            "heading" => __('Background Image', 'erange'),
            "param_name" => "bg",
            "description" => __("Select background image for your row", 'erange')
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Background Repeat', 'erange'),
            "param_name" => "bg_repeat",
            "value" => array(
                __('Cover', "erange") => "cover",
                __('Fullwidth', "erange") => "fullwidth",
                __('Repeat', "erange") => "repeat",
                __('Repeat-X', "erange") => "repeat-x",
                __('Repeat-Y', "erange") => "repeat-y"
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra id name", "erange"),
            "param_name" => "id",
            "description" => __("If you wish to style particular content element differently, then use this field to add a id name and then refer to it in your css file.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    ),
    "js_view" => 'VcRowView'
));
vc_map(array(
    "name" => __("Row", "erange"), //Inner Row
    "base" => "vc_row_inner",
    "content_element" => false,
    "is_container" => true,
    "weight" => 1000,
    "show_settings_on_create" => false,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    ),
    "js_view" => 'VcRowView'
));
vc_map(array(
    "name" => __("Column", "erange"),
    "base" => "vc_column",
    "is_container" => true,
    "content_element" => false,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Animation", "erange"),
            "param_name" => "animation",
            "value" => array(
                __('No', "erange") => 0,
                __('Yes', "erange") => 1
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animation Style", "erange"),
            "param_name" => "animation_style",
            "value" => $animate_style,
        ),
        array(
            "type" => "textfield",
            "heading" => __("Animation Time", "erange"),
            "param_name" => "animation_time",
            "description" => __("The time that column will be appear.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Animation Delay Time", "erange"),
            "param_name" => "animation_delay",
            "description" => __("The time before column will be appear.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Inner Class", "erange"),
            "param_name" => "inner_class",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Inner Padding", "erange"),
            "param_name" => "inner_padding",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Inner Margin", "erange"),
            "param_name" => "inner_margin",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    ),
    "js_view" => 'VcColumnView'
));
vc_map(array(
    "name" => __("Column", "erange"),
    "base" => "vc_column_inner",
    "is_container" => true,
    "content_element" => false,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Animation", "erange"),
            "param_name" => "animation",
            "value" => array(
                __('No', "erange") => 0,
                __('Yes', "erange") => 1
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animation Style", "erange"),
            "param_name" => "animation_style",
            "value" => $animate_style,
        ),
        array(
            "type" => "textfield",
            "heading" => __("Animation Time", "erange"),
            "param_name" => "animation_time",
            "description" => __("The time that column will be appear.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Animation Delay Time", "erange"),
            "param_name" => "animation_delay",
            "description" => __("The time before column will be appear.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Inner Class", "erange"),
            "param_name" => "inner_class",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Inner Padding", "erange"),
            "param_name" => "inner_padding",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Inner Margin", "erange"),
            "param_name" => "inner_margin",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    ),
    "js_view" => 'VcColumnView'
));

/* Text Block
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Text Block", "erange"),
    "base" => "vc_column_text",
    "wrapper_class" => "clearfix",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Text", "erange"),
            "param_name" => "content",
            "value" => __("<p>I am text block. Click edit button to change this text.</p>", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));


/* Divider
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Divider", "erange"),
    "base" => "divider",
    "show_settings_on_create" => false,
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Style", "erange"),
            "param_name" => "style",
            "value" => array(
                __('Top', "erange") => 'top',
                __('Bottom', "erange") => 'bottom',
                __('Simple', "erange") => 'simple',
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));


/* Counter Box
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Counter Box", "erange"),
    "base" => "counterbox",
    "wrapper_class" => "clearfix",
    "category" => __('Content', 'erange'),
    "params" => array(
        
        array(
            "type" => "textfield",
            "heading" => __("Number", "erange"),
            "param_name" => "number"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon", "erange"),
            "param_name" => "icon"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Color", "erange"),
            "param_name" => "style",
            "value" => array(
                __('Normal', "erange") => "normal",
                __('White', "erange") => "white",
                __('Black', "erange") => "black",
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));


/* Element
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Element", "erange"),
    "base" => "element",
    "wrapper_class" => "clearfix",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Margin", "erange"),
            "param_name" => "margin"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Padding", "erange"),
            "param_name" => "padding"
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "messagebox_text",
            "heading" => __("Content", "erange"),
            "param_name" => "content",
            "value" => __("<p>Click edit button to change this text.</p>", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/* Team User
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Team User", "erange"),
    "base" => "team",
    "wrapper_class" => "clearfix",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Name", "erange"),
            "param_name" => "name"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Position", "erange"),
            "param_name" => "position"
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "messagebox_text",
            "heading" => __("Content", "erange"),
            "param_name" => "content",
            "value" => __("<p>Click edit button to change this text.</p>", "erange")
        ),
        array(
            "type" => "attach_image",
            "heading" => __("Avatar", "erange"),
            "param_name" => "avatar",
            "value" => "",
            "description" => __("Select image from media library.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Facebook URL", "erange"),
            "param_name" => "facebook"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Twitter URL", "erange"),
            "param_name" => "twitter"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Google Plus", "erange"),
            "param_name" => "googleplus"
        ),
        array(
            "type" => "textfield",
            "heading" => __("LinkedIn", "erange"),
            "param_name" => "linkedin"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/* Testimonial
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Testimonial", "erange"),
    "base" => "testimonial",
    "wrapper_class" => "clearfix",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Name", "erange"),
            "param_name" => "name"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Company", "erange"),
            "param_name" => "company"
        ),
        array(
            "type" => "textarea",
            "heading" => __("Content", "erange"),
            "param_name" => "content",
            "value" => "Edit testimonail content here"
        ),
        array(
            "type" => "attach_image",
            "heading" => __("Avatar", "erange"),
            "param_name" => "avatar",
            "value" => "",
            "description" => __("Select image from media library.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/* Posts list
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Post List", "erange"),
    "base" => "blog",
    "wrapper_class" => "clearfix",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Number of post", "erange"),
            "param_name" => "number"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Category ID", "erange"),
            "param_name" => "cat"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Tag ID", "erange"),
            "param_name" => "tag"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Carousel", "erange"),
            "param_name" => "carousel",
            "value" => array(
                __('Yes', "erange") => "1",
                __('No', "erange") => "0"
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Columns", "erange"),
            "param_name" => "column",
            "value" => array(
                __('Three Columns', "erange") => "3",
                __('Four Columns', "erange") => "4"
            )
        )
    )
));

/* Short Posts list
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Short Post List", "erange"),
    "base" => "blog-list",
    "wrapper_class" => "clearfix",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Number of post", "erange"),
            "param_name" => "number"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Category ID", "erange"),
            "param_name" => "cat"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Tag ID", "erange"),
            "param_name" => "tag"
        )
    )
));

/* Short Posts list
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Masonry Post List", "erange"),
    "base" => "blog-masonry",
    "wrapper_class" => "clearfix",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Number of post", "erange"),
            "param_name" => "number"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Category ID", "erange"),
            "param_name" => "cat"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Tag ID", "erange"),
            "param_name" => "tag"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animation", "erange"),
            "param_name" => "animation",
            "value" => array(
                __('No', "erange") => 0,
                __('Yes', "erange") => 1
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animation Style", "erange"),
            "param_name" => "animation_style",
            "value" => $animate_style,
        ),
    )
));

/* Short Posts list
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Blog Archive", "erange"),
    "base" => "blog-archive",
    "wrapper_class" => "clearfix",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Posts Per Page", "erange"),
            "param_name" => "number"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Layout", "erange"),
            "param_name" => "layout",
            "value" => array(
                __('Medium', "erange") => "medium",
                __('Large', "erange") => "large"
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Class", "erange"),
            "param_name" => "class"
        )
    )
));

/* Short Posts list
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Job List", "erange"),
    "base" => "job-list",
    "wrapper_class" => "clearfix",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Posts Per Page", "erange"),
            "param_name" => "number"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Class", "erange"),
            "param_name" => "class"
        )
    )
));
/* Message box
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Message Box", "erange"),
    "base" => "alert",
    "wrapper_class" => "alert",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Message box type", "erange"),
            "param_name" => "style",
            "value" => array(
                __('Informational', "erange") => "info",
                __('Warning', "erange") => "warning",
                __('Success', "erange") => "success",
                __('Error', "erange") => "error"
            ),
            "description" => __("Select message type.", "erange")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Close", "erange"),
            "param_name" => "close",
            "value" => array(
                __('Yes', "erange") => "yes",
                __('No', "erange") => "no"
            ),
            "description" => __("Select", "erange")
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "messagebox_text",
            "heading" => __("Message text", "erange"),
            "param_name" => "content",
            "value" => __("<p>I am message box. Click edit button to change this text.</p>", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    ),
    "js_view" => 'VcMessageView'
));

/* Single image */
vc_map(array(
    "name" => __("Single Image", "erange"),
    "base" => "vc_single_image",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Widget title", "erange"),
            "param_name" => "title",
            "description" => __("What text use as a widget title. Leave blank if no title is needed.", "erange")
        ),
        array(
            "type" => "attach_image",
            "heading" => __("Image", "erange"),
            "param_name" => "image",
            "value" => "",
            "description" => __("Select image from media library.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Image size", "erange"),
            "param_name" => "img_size",
            "description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", "erange")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Image alignment", "erange"),
            "param_name" => "alignment",
            "value" => array(
                __("Align left", "erange") => "",
                __("Align right", "erange") => "right",
                __("Align center", "erange") => "center"
            ),
            "description" => __("Select image alignment.", "erange")
        ),
        array(
            "type" => 'checkbox',
            "heading" => __("Link to large image?", "erange"),
            "param_name" => "img_link_large",
            "description" => __("If selected, image will be linked to the bigger image.", "erange"),
            "value" => Array(
                __("Yes, please", "erange") => 'yes'
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Image link", "erange"),
            "param_name" => "img_link",
            "description" => __("Enter url if you want this image to have link.", "erange"),
            "dependency" => Array(
                'element' => "img_link_large",
                'is_empty' => true,
                'callback' => 'wpb_single_image_img_link_dependency_callback'
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Link Target", "erange"),
            "param_name" => "img_link_target",
            "value" => $target_arr,
            "dependency" => Array(
                'element' => "img_link",
                'not_empty' => true
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/* Heading */
vc_map(array(
    "name" => __("Heading", "erange"),
    "base" => "heading",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Heading Title", "erange"),
            "param_name" => "title"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Heading Description", "erange"),
            "param_name" => "desc"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", "erange"),
            "param_name" => "style",
            "description" => __("Choose your heading style", "erange"),
            "value" => array(
                __("Normal", "erange") => 'normal',
                __("Black", "erange") => 'black',
                __("White", "erange") => 'white',
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Position", "erange"),
            "param_name" => "position",
            "description" => __("Choose your heading style", "erange"),
            "value" => array(
                __("Heading-Subheading", "erange") => 1,
                __("Subheading-Heading", "erange") => 2
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animation", "erange"),
            "param_name" => "animation",
            "value" => array(
                __('No', "erange") => 0,
                __('Yes', "erange") => 1
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animation Style", "erange"),
            "param_name" => "animation_style",
            "value" => $animate_style,
        ),
        array(
            "type" => "textfield",
            "heading" => __("Custom Class", "erange"),
            "param_name" => "class"
        ),
    )
));

vc_map(array(
    "name" => __("Sub Heading", "erange"),
    "base" => "subheading",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Heading Title", "erange"),
            "param_name" => "title"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Custom Class", "erange"),
            "param_name" => "class"
        ),
        array(
            'type' => 'textarea_html',
            'holder' => 'div',
            'heading' => __('Content'),
            'param_name' => 'content',
            'value' => __('')
        )
    )
));

/* Pricing Table */
vc_map(array(
    "name" => __("Pricing Table", "erange"),
    "base" => "pricing",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "description" => __("Enter title of pricing table element", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description", "erange"),
            "param_name" => "desc",
            "description" => __("Enter description of pricing table element", "erange")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Color", "erange"),
            "param_name" => "color",
            "description" => __("Select background color", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Price", "erange"),
            "param_name" => "price"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Price Extend", "erange"),
            "param_name" => "price_ext"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Price Text", "erange"),
            "param_name" => "price_text",
            "description" => __("Display text replace price number", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Currency", "erange"),
            "param_name" => "currency"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Feature Text", "erange"),
            "param_name" => "featured_text"
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Feature Background", "erange"),
            "param_name" => "featured_bg",
            "description" => __("Select feature background color", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button Name", "erange"),
            "param_name" => "button_name"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button link", "erange"),
            "param_name" => "button_url"
        ),
        array(
            'type' => 'textarea_html',
            'holder' => 'div',
            'heading' => __('Content'),
            'param_name' => 'content',
            'value' => __('<p>I am text block. Click edit button to change this text.</p>')
        )
    )
));

/* Tabs
---------------------------------------------------------- */
$tab_id_1 = time() . '-1-' . rand(0, 100);
$tab_id_2 = time() . '-2-' . rand(0, 100);
vc_map(array(
    "name" => __("Tabs & Timeline", "erange"),
    "base" => "vc_tabs",
    "show_settings_on_create" => false,
    "is_container" => true,
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Style", "erange"),
            "param_name" => "style",
            "description" => __("Choose your tab style", "erange"),
            "value" => array(
                __("Normal", "erange") => 'main',
                __("Left Side", "erange") => 'left',
                __("Right Side", "erange") => 'right',
                __("Timeline", "erange") => 'timeline',
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    ),
    "custom_markup" => '
  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>',
    'default_content' => '
  [vc_tab title="' . __('Tab 1', 'erange') . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
  [vc_tab title="' . __('Tab 2', 'erange') . '" tab_id="' . $tab_id_2 . '"][/vc_tab]
  ',
    "js_view" => ($vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35')
));

vc_map(array(
    "name" => __("Tab", "erange"),
    "base" => "vc_tab",
    "allowed_container_element" => 'vc_row',
    "is_container" => true,
    "content_element" => false,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "description" => __("Tab title.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon", "erange"),
            "param_name" => "icon",
            "description" => __("Enter icon class", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Year", "erange"),
            "param_name" => "year",
            "description" => __("Only apply on Timeline Tab", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Column Width", "erange"),
            "param_name" => "column",
            "description" => __("Only apply on Timeline Tab", "erange")
        )
    ),
    'js_view' => ($vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35')
));

/* Accordion block
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Accordion", "erange"),
    "base" => "vc_accordion",
    "show_settings_on_create" => false,
    "is_container" => true,
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "dropdown",
            'admin_label' => true,
            "heading" => __("Style", "erange"),
            "param_name" => "style",
            "value" => array(
                __("Border", "erange") => "border",
                __("Solid", "erange") => "solid"
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    ),
    "custom_markup" => '
<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
%content%
</div>
<div class="tab_controls">
<button class="add_tab" title="' . __("Add accordion section", "erange") . '">' . __("Add accordion section", "erange") . '</button>
</div>
',
    'default_content' => '
[vc_accordion_tab title="' . __('Section 1', "erange") . '"][/vc_accordion_tab]
[vc_accordion_tab title="' . __('Section 2', "erange") . '"][/vc_accordion_tab]
',
    'js_view' => 'VcAccordionView'
));
vc_map(array(
    "name" => __("Accordion Section", "erange"),
    "base" => "vc_accordion_tab",
    "allowed_container_element" => 'vc_row',
    "is_container" => true,
    "content_element" => false,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "description" => __("Accordion section title.", "erange")
        ),
        array(
            "type" => 'checkbox',
            "heading" => __("Open", "erange"),
            "param_name" => "open",
            "description" => __("If selected, the toggle will be open.", "erange"),
            "value" => Array(
                __("Yes, please", "erange") => true
            )
        )
    ),
    'js_view' => 'VcAccordionTabView'
));

/* Button
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Button", "erange"),
    "base" => "button",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Text on the button", "erange"),
            "holder" => "button",
            "class" => "wpb_button",
            "param_name" => "title",
            "value" => __("Text on the button", "erange"),
            "description" => __("Text on the button.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("URL (Link)", "erange"),
            "param_name" => "link",
            "description" => __("Button link.", "erange")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Target", "erange"),
            "param_name" => "target",
            "value" => $target_arr,
            "dependency" => Array(
                'element' => "href",
                'not_empty' => true
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Color", "erange"),
            "param_name" => "color",
            "value" => $colors_arr,
            "description" => __("Button color.", "erange")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Size", "erange"),
            "param_name" => "style",
            "value" => $size_arr,
            "description" => __("Button size.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    ),
    "js_view" => 'VcButtonView'
));

/* Call to Action Button
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Call to Action", "erange"),
    "base" => "callout",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "dropdown",
            'admin_label' => true,
            "heading" => __("Style", "erange"),
            "param_name" => "style",
            "value" => array(
                __("Normal", "erange") => "normal",
                __("Border", "erange") => "border",
                __("Solid", "erange") => "solid"
            )
        ),
        array(
            "type" => "textfield",
            'admin_label' => true,
            "heading" => __("Title", "erange"),
            "param_name" => "title"
        ),
        array(
            "type" => "textarea",
            'admin_label' => true,
            "heading" => __("Text", "erange"),
            "param_name" => "desc",
            "value" => __("Call to action content", "erange"),
            "description" => __("Enter your content.", "erange")
        ),
        array(
            "type" => "dropdown",
            'admin_label' => true,
            "heading" => __("Button Color", "erange"),
            "param_name" => "button_color",
            "value" => $colors_arr
        ),
        array(
            "type" => "textfield",
            'admin_label' => true,
            "heading" => __("Button Title", "erange"),
            "param_name" => "button_name"
        ),
        array(
            "type" => "textfield",
            'admin_label' => true,
            "heading" => __("Button Link", "erange"),
            "param_name" => "link"
        ),
        array(
            "type" => "dropdown",
            'admin_label' => true,
            "heading" => __("Button Style", "erange"),
            "param_name" => "button_style",
            "value" => array(
                __("Normal", "erange") => "normal",
                __("Border", "erange") => "border"
            )
        ),
        array(
            "type" => "dropdown",
            'admin_label' => true,
            "heading" => __("Target", "erange"),
            "param_name" => "target",
            "value" => array(
                __("Blank", "erange") => "_blank",
                __("Self", "erange") => "_self"
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    ),
    "js_view" => 'VcCallToActionView'
));

/* Video element
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Video Player", "erange"),
    "base" => "vc_video",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Widget title", "erange"),
            "param_name" => "title",
            "description" => __("What text use as a widget title. Leave blank if no title is needed.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Video link", "erange"),
            "param_name" => "link",
            "admin_label" => true,
            "description" => sprintf(__('Link to the video. More about supported formats at %s.', "erange"), '<a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/* Google maps element
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Google Maps", "erange"),
    "base" => "vc_gmaps",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Widget title", "erange"),
            "param_name" => "title",
            "description" => __("What text use as a widget title. Leave blank if no title is needed.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Google map link", "erange"),
            "param_name" => "link",
            "admin_label" => true,
            "description" => sprintf(__('Link to your map. Visit %s find your address and then click "Link" button to obtain your map link.', "erange"), '<a href="http://maps.google.com" target="_blank">Google maps</a>')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Map height", "erange"),
            "param_name" => "size",
            "description" => __('Enter map height in pixels. Example: 200.', "erange")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Map type", "erange"),
            "param_name" => "type",
            "value" => array(
                __("Map", "erange") => "m",
                __("Satellite", "erange") => "k",
                __("Map + Terrain", "erange") => "p"
            ),
            "description" => __("Select map type.", "erange")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Map Zoom", "erange"),
            "param_name" => "zoom",
            "value" => array(
                __("14 - Default", "erange") => 14,
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
                13,
                15,
                16,
                17,
                18,
                19,
                20
            )
        ),
        array(
            "type" => 'checkbox',
            "heading" => __("Remove info bubble", "erange"),
            "param_name" => "bubble",
            "description" => __("If selected, information bubble will be hidden.", "erange"),
            "value" => Array(
                __("Yes, please", "erange") => true
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/* Raw HTML
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Raw HTML", "erange"),
    "base" => "vc_raw_html",
    "category" => __('Structure', 'erange'),
    "wrapper_class" => "clearfix",
    "params" => array(
        array(
            "type" => "textarea_raw_html",
            "holder" => "div",
            "heading" => __("Raw HTML", "erange"),
            "param_name" => "content",
            "value" => base64_encode("<p>I am raw html block.<br/>Click edit button to change this html</p>"),
            "description" => __("Enter your HTML content.", "erange")
        )
    )
));

/* Raw JS
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Raw JS", "erange"),
    "base" => "vc_raw_js",
    "category" => __('Structure', 'erange'),
    "wrapper_class" => "clearfix",
    "params" => array(
        array(
            "type" => "textarea_raw_html",
            "holder" => "div",
            "heading" => __("Raw js", "erange"),
            "param_name" => "content",
            "value" => __(base64_encode("<script type='text/javascript'> alert('Enter your js here!'); </script>"), "erange"),
            "description" => __("Enter your JS code.", "erange")
        )
    )
));

/* Graph
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Progress Bar", "erange"),
    "base" => "skillbar",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Percent", "erange"),
            "param_name" => "percent",
            "admin_label" => true
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Bar custom color", "erange"),
            "param_name" => "color",
            "description" => __("Select custom background color for bars.", "erange"),
            "dependency" => Array(
                'element' => "bgcolor",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", "erange"),
            "param_name" => "style",
            "value" => array(
                __("Normal", "erange") => "nornal",
                __("Strip", "erange") => "progress-striped",
                __("Active", "erange") => "progress-striped active"
            ),
            "description" => __("Select skillbar stype.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/**
 * Pie chart
 */
vc_map(array(
    "name" => __("Pie chart", "erange"),
    "base" => "chart",
    "class" => "",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Pie value", "erange"),
            "param_name" => "percent",
            "description" => __('Input graph value here. Witihn a range 0-100.', 'erange'),
            "value" => "50",
            "admin_label" => true
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Background Color", "erange"),
            "param_name" => "bgcolor",
            "description" => __("Select custom background color for this element.", "erange")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Bar Color", "erange"),
            "param_name" => "barcolor",
            "description" => __("Select custom background color for bars.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
        
    )
));

/**
 * Member List
 */
vc_map(array(
    "name" => __("Member List", "erange"),
    "base" => "memlist",
    "class" => "",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Number", "erange"),
            "param_name" => "number",
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Carousel", "erange"),
            "param_name" => "carousel",
            "value" => array(
                __("Yes", "erange") => 1,
                __("No", "erange") => 2
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Columns", "erange"),
            "param_name" => "column",
            "value" => array(
                __("3 Columns", "erange") => 3,
                __("4 Columns", "erange") => 4
            )
        )
    )
));

/**
 * Partner List
 */
vc_map(array(
    "name" => __("Partner List", "erange"),
    "base" => "partnerlist",
    "class" => "",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Number", "erange"),
            "param_name" => "number",
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Carousel", "erange"),
            "param_name" => "carousel",
            "value" => array(
                __("Yes", "erange") => 1,
                __("No", "erange") => 2
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Columns", "erange"),
            "param_name" => "column",
            "value" => array(
                __("3 Columns", "erange") => 3,
                __("4 Columns", "erange") => 4
            )
        )
    )
));

/**
 * Sidebar
 */
vc_map(array(
    "name" => __("Sidebar", "erange"),
    "base" => "sidebar_area",
    "class" => "",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Name", "erange"),
            "param_name" => "name",
            'value' => $sidebarposition,
            "admin_label" => true
        ),
    )
));

/* Icon Box
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Icon Box", "erange"),
    "base" => "iconbox",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon", "erange"),
            "param_name" => "icon",
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", "erange"),
            "param_name" => "style",
            "value" => array(
                __("Normal", "erange") => "nornal",
                __("Solid", "erange") => "solid",
                __("Center", "erange") => "center",
            )
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "messagebox_text",
            "heading" => __("Message text", "erange"),
            "param_name" => "content",
            "value" => __("<p>I am message box. Click edit button to change this text.</p>", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("URL", "erange"),
            "param_name" => "url",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button Name", "erange"),
            "param_name" => "button_name",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/* Small Icon Box
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Small Box", "erange"),
    "base" => "smallbox",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description", "erange"),
            "param_name" => "desc",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon", "erange"),
            "param_name" => "icon",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("URL", "erange"),
            "param_name" => "url",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/* Slider Box
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Slider Box", "erange"),
    "base" => "sliderbox",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("URL", "erange"),
            "param_name" => "url",
            "admin_label" => true
        ),
        array(
            "type" => "attach_image",
            "heading" => __("Image", "erange"),
            "param_name" => "img",
            "value" => "",
            "description" => __("Select image from media library.", "erange")
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "messagebox_text",
            "heading" => __("Message text", "erange"),
            "param_name" => "content",
            "value" => __("<p>I am message box. Click edit button to change this text.</p>", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/* Round Icon
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Round Icon", "erange"),
    "base" => "roundicon",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon", "erange"),
            "param_name" => "icon",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Descriptions", "erange"),
            "param_name" => "desc",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/* Portfolio
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Portfolio List", "erange"),
    "base" => "portfolio_list",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Number", "erange"),
            "param_name" => "number",
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Carousel", "erange"),
            "param_name" => "carousel",
            "value" => array(
                __("Yes", "erange") => 1,
                __("No", "erange") => 0,
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Columns", "erange"),
            "param_name" => "column",
            "value" => array(
                __("3 Columns", "erange") => 3,
                __("4 Columns", "erange") => 4,
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Sub Title", "erange"),
            "param_name" => "sub_title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Descriptions", "erange"),
            "param_name" => "desc",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/* Portfolio Filter
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Portfolio Filter", "erange"),
    "base" => "portfolio_filter",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Number", "erange"),
            "param_name" => "number",
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Columns", "erange"),
            "param_name" => "column",
            "value" => array(
                __("3 Columns", "erange") => 3,
                __("4 Columns", "erange") => 4,
            )
        )
    )
));

/* Blog
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Blog", "erange"),
    "base" => "blog",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Number", "erange"),
            "param_name" => "number",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Categories", "erange"),
            "param_name" => "cat",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Tags", "erange"),
            "param_name" => "tag",
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Carousel", "erange"),
            "param_name" => "carousel",
            "value" => array(
                __("Yes", "erange") => 1,
                __("No", "erange") => 0,
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Columns", "erange"),
            "param_name" => "column",
            "value" => array(
                __("3 Columns", "erange") => 3,
                __("4 Columns", "erange") => 4,
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Sub Title", "erange"),
            "param_name" => "sub_title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Descriptions", "erange"),
            "param_name" => "desc",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "erange"),
            "param_name" => "class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
        )
    )
));

/* Hover Box
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Hoverbox", "erange"),
    "base" => "hoverbox",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => __("Image", "erange"),
            "param_name" => "logo",
            "value" => "",
            "description" => __("Select image from media library.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Descriptions", "erange"),
            "param_name" => "desc",
            "admin_label" => true
        ),
         array(
            "type" => "textfield",
            "heading" => __("Class", "erange"),
            "param_name" => "class",
            "admin_label" => true
        ),
    )
));

/* Large Icon
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Large Icon", "erange"),
    "base" => "largeicon",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon", "erange"),
            "param_name" => "icon",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("URL", "erange"),
            "param_name" => "url",
            "admin_label" => true
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "messagebox_text",
            "heading" => __("Message text", "erange"),
            "param_name" => "content",
            "value" => __("<p>I am message box. Click edit button to change this text.</p>", "erange")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", "erange"),
            "param_name" => "style",
            "value" => array(
                __("Left", "erange") => 'left',
                __("Right", "erange") => 'right',
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Show Dotted", "erange"),
            "param_name" => "position",
            "value" => array(
                __("Yes", "erange") => 'first',
                __("No", "erange") => 'last',
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animation", "erange"),
            "param_name" => "animation",
            "value" => array(
                __('No', "erange") => 0,
                __('Yes', "erange") => 1
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animation Style", "erange"),
            "param_name" => "animation_style",
            "value" => $animate_style,
        ),
        array(
            "type" => "textfield",
            "heading" => __("Animation Time", "erange"),
            "param_name" => "animation_time",
            "description" => __("The time that column will be appear.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Animation Delay Time", "erange"),
            "param_name" => "animation_delay",
            "description" => __("The time before column will be appear.", "erange")
        ),
         array(
            "type" => "textfield",
            "heading" => __("Class", "erange"),
            "param_name" => "class",
            "admin_label" => true
        ),
    )
));

/* Rounder Icon
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Round Icon", "erange"),
    "base" => "roundicon",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "erange"),
            "param_name" => "title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon", "erange"),
            "param_name" => "icon",
            "admin_label" => true
        ),
        array(
            "type" => "textarea",
            "heading" => __("Description", "erange"),
            "param_name" => "desc",
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animation", "erange"),
            "param_name" => "animation",
            "value" => array(
                __('No', "erange") => 0,
                __('Yes', "erange") => 1
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animation Style", "erange"),
            "param_name" => "animation_style",
            "value" => $animate_style,
        ),
        array(
            "type" => "textfield",
            "heading" => __("Animation Time", "erange"),
            "param_name" => "animation_time",
            "description" => __("The time that column will be appear.", "erange")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Animation Delay Time", "erange"),
            "param_name" => "animation_delay",
            "description" => __("The time before column will be appear.", "erange")
        ),
         array(
            "type" => "textfield",
            "heading" => __("Class", "erange"),
            "param_name" => "class",
            "admin_label" => true
        ),
    )
));

/* Cilents
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Cilent", "erange"),
    "base" => "cilent",
    "category" => __('Content', 'erange'),
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => __("Image", "erange"),
            "param_name" => "logo",
            "value" => "",
            "description" => __("Select image from media library.", "erange")
        ),
        array(
            "type" => "attach_image",
            "heading" => __("Image Hover", "erange"),
            "param_name" => "logo_hover",
            "value" => "",
            "description" => __("Select image from media library.", "erange")
        ),
         array(
            "type" => "textfield",
            "heading" => __("Link", "erange"),
            "param_name" => "link",
            "admin_label" => true
        ),
    )
));

/* Twitter
---------------------------------------------------------- */
vc_map(array(
    "name" => __("Twitter", "erange"),
    "base" => "twitter_section",
    "category" => __('Content', 'erange'),
    "params" => array(
         array(
            "type" => "textfield",
            "heading" => __("Username", "erange"),
            "param_name" => "username",
            "admin_label" => true
        ),
    )
));

/* Support for 3rd Party plugins
---------------------------------------------------------- */
// Contact form 7 plugin
include_once(ABSPATH . 'wp-admin/includes/plugin.php'); // Require plugin.php to use is_plugin_active() below
if (is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
    global $wpdb;
    $cf7           = $wpdb->get_results("
    SELECT ID, post_title 
    FROM $wpdb->posts
    WHERE post_type = 'wpcf7_contact_form' 
    ");
    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->post_title] = $cform->ID;
        }
    } else {
        $contact_forms["No contact forms found"] = 0;
    }
    vc_map(array(
        "base" => "contact-form-7",
        "name" => __("Contact Form 7", "erange"),
        "category" => __('Content', 'erange'),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Form title", "erange"),
                "param_name" => "title",
                "admin_label" => true,
                "description" => __("What text use as form title. Leave blank if no title is needed.", "erange")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Select contact form", "erange"),
                "param_name" => "id",
                "value" => $contact_forms,
                "description" => __("Choose previously created contact form from the drop down list.", "erange")
            )
        )
    ));
} // if contact form7 plugin active

if (is_plugin_active('LayerSlider/layerslider.php')) {
    global $wpdb;
    $ls            = $wpdb->get_results("
    SELECT id, name, date_c
    FROM " . $wpdb->prefix . "layerslider
    WHERE flag_hidden = '0' AND flag_deleted = '0'
    ORDER BY date_c ASC LIMIT 999
    ");
    $layer_sliders = array();
    if ($ls) {
        foreach ($ls as $slider) {
            $layer_sliders[$slider->name] = $slider->id;
        }
    } else {
        $layer_sliders["No sliders found"] = 0;
    }
    vc_map(array(
        "base" => "layerslider_vc",
        "name" => __("Layer Slider", "erange"),
        "icon" => "icon-wpb-layerslider",
        "category" => __('Content', 'erange'),
        "description" => __('Place LayerSlider', 'erange'),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Widget title", "erange"),
                "param_name" => "title",
                "description" => __("What text use as a widget title. Leave blank if no title is needed.", "erange")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("LayerSlider ID", "erange"),
                "param_name" => "id",
                "admin_label" => true,
                "value" => $layer_sliders,
                "description" => __("Select your LayerSlider.", "erange")
            ),
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "erange"),
                "param_name" => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
            )
        )
    ));
} // if layer slider plugin active

if (is_plugin_active('revslider/revslider.php')) {
    global $wpdb;
    $rs         = $wpdb->get_results("
    SELECT id, title, alias
    FROM " . $wpdb->prefix . "revslider_sliders
    ORDER BY id ASC LIMIT 999
    ");
    $revsliders = array();
    if ($rs) {
        foreach ($rs as $slider) {
            $revsliders[$slider->title] = $slider->alias;
        }
    } else {
        $revsliders["No sliders found"] = 0;
    }
    vc_map(array(
        "base" => "rev_slider_vc",
        "name" => __("Revolution Slider", "erange"),
        "category" => __('Content', 'erange'),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Widget title", "erange"),
                "param_name" => "title",
                "description" => __("What text use as a widget title. Leave blank if no title is needed.", "erange")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Revolution Slider", "erange"),
                "param_name" => "alias",
                "admin_label" => true,
                "value" => $revsliders,
                "description" => __("Select your Revolution Slider.", "erange")
            ),
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "erange"),
                "param_name" => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "erange")
            )
        )
    ));
} // if revslider plugin active

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
    vc_map(array(
        "name" => __("Recent Product", "erange"),
        "base" => "recent_products",
        "category" => __("WooCommerce", "erange"),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Per Page", "erange"),
                "param_name" => "per_page",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Column", "erange"),
                "param_name" => "columns",
                "value" => array(
                    __("3 Columns", "erange") => '3',
                    __("4 Columns", "erange") => '4'
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order by", "erange"),
                "param_name" => "orderby",
                "value" => array(
                    __("None", "erange") => 'none',
                    __("ID", "erange") => 'id',
                    __("Title", "erange") => 'title',
                    __("Name", "erange") => 'name',
                    __("Date", "erange") => 'date',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order", "erange"),
                "param_name" => "order",
                "value" => array(
                    __("Desc", "erange") => 'desc',
                    __("ASC", "erange") => 'asc',
                ),
            ),
        )
    ));

    vc_map(array(
        "name" => __("Feature Product", "erange"),
        "base" => "featured_products",
        "category" => __("WooCommerce", "erange"),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Per Page", "erange"),
                "param_name" => "per_page",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Column", "erange"),
                "param_name" => "columns",
                "value" => array(
                    __("3 Columns", "erange") => '3',
                    __("4 Columns", "erange") => '4'
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order by", "erange"),
                "param_name" => "orderby",
                "value" => array(
                    __("None", "erange") => 'none',
                    __("ID", "erange") => 'id',
                    __("Title", "erange") => 'title',
                    __("Name", "erange") => 'name',
                    __("Date", "erange") => 'date',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order", "erange"),
                "param_name" => "order",
                "value" => array(
                    __("Desc", "erange") => 'desc',
                    __("ASC", "erange") => 'asc',
                ),
            ),
        )
    ));

    vc_map(array(
        "name" => __("Product", "erange"),
        "base" => "products",
        "category" => __("WooCommerce", "erange"),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => __("Column", "erange"),
                "param_name" => "columns",
                "value" => array(
                    __("3 Columns", "erange") => '3',
                    __("4 Columns", "erange") => '4'
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order by", "erange"),
                "param_name" => "orderby",
                "value" => array(
                    __("None", "erange") => 'none',
                    __("ID", "erange") => 'id',
                    __("Title", "erange") => 'title',
                    __("Name", "erange") => 'name',
                    __("Date", "erange") => 'date',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order", "erange"),
                "param_name" => "order",
                "value" => array(
                    __("Desc", "erange") => 'desc',
                    __("ASC", "erange") => 'asc',
                ),
            ),
        )
    ));

    vc_map(array(
        "name" => __("Product Category", "erange"),
        "base" => "product_category",
        "category" => __("WooCommerce", "erange"),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Per Page", "erange"),
                "param_name" => "per_page",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Column", "erange"),
                "param_name" => "columns",
                "value" => array(
                    __("3 Columns", "erange") => '3',
                    __("4 Columns", "erange") => '4'
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order by", "erange"),
                "param_name" => "orderby",
                "value" => array(
                    __("None", "erange") => 'none',
                    __("ID", "erange") => 'id',
                    __("Title", "erange") => 'title',
                    __("Name", "erange") => 'name',
                    __("Date", "erange") => 'date',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order", "erange"),
                "param_name" => "order",
                "value" => array(
                    __("Desc", "erange") => 'desc',
                    __("ASC", "erange") => 'asc',
                ),
            ),
            array(
                "type" => "textfield",
                "heading" => __("Category", "erange"),
                "param_name" => "category",
            ),
        )
    ));

    vc_map(array(
        "name" => __("Product Categories", "erange"),
        "base" => "product_categories",
        "category" => __("WooCommerce", "erange"),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Number", "erange"),
                "param_name" => "number",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Column", "erange"),
                "param_name" => "columns",
                "value" => array(
                    __("3 Columns", "erange") => '3',
                    __("4 Columns", "erange") => '4'
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order by", "erange"),
                "param_name" => "orderby",
                "value" => array(
                    __("None", "erange") => 'none',
                    __("ID", "erange") => 'id',
                    __("Title", "erange") => 'title',
                    __("Name", "erange") => 'name',
                    __("Date", "erange") => 'date',
                ),
            ),
            array(
                "type" => "textfield",
                "heading" => __("Parent", "erange"),
                "param_name" => "parent",
            ),
            array(
                "type" => "textfield",
                "heading" => __("IDs", "erange"),
                "param_name" => "ids",
            ),
        )
    ));

    vc_map(array(
        "name" => __("Sale Product", "erange"),
        "base" => "sale_products",
        "category" => __("WooCommerce", "erange"),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Per Page", "erange"),
                "param_name" => "per_page",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Column", "erange"),
                "param_name" => "columns",
                "value" => array(
                    __("3 Columns", "erange") => '3',
                    __("4 Columns", "erange") => '4'
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order by", "erange"),
                "param_name" => "orderby",
                "value" => array(
                    __("None", "erange") => 'none',
                    __("ID", "erange") => 'id',
                    __("Title", "erange") => 'title',
                    __("Name", "erange") => 'name',
                    __("Date", "erange") => 'date',
                ),
            ),
        )
    ));

    vc_map(array(
        "name" => __("Best Selling Products", "erange"),
        "base" => "best_selling_products",
        "category" => __("WooCommerce", "erange"),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Per Page", "erange"),
                "param_name" => "per_page",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Column", "erange"),
                "param_name" => "columns",
                "value" => array(
                    __("3 Columns", "erange") => '3',
                    __("4 Columns", "erange") => '4'
                ),
            ),
        )
    ));

    vc_map(array(
        "name" => __("Top Rated Product", "erange"),
        "base" => "top_rated_products",
        "category" => __("WooCommerce", "erange"),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Per Page", "erange"),
                "param_name" => "per_page",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Column", "erange"),
                "param_name" => "columns",
                "value" => array(
                    __("3 Columns", "erange") => '3',
                    __("4 Columns", "erange") => '4'
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order by", "erange"),
                "param_name" => "orderby",
                "value" => array(
                    __("None", "erange") => 'none',
                    __("ID", "erange") => 'id',
                    __("Title", "erange") => 'title',
                    __("Name", "erange") => 'name',
                    __("Date", "erange") => 'date',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order", "erange"),
                "param_name" => "order",
                "value" => array(
                    __("Desc", "erange") => 'desc',
                    __("ASC", "erange") => 'asc',
                ),
            ),
        )
    ));

    vc_map(array(
        "name" => __("Related Products", "erange"),
        "base" => "related_products",
        "category" => __("WooCommerce", "erange"),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Per Page", "erange"),
                "param_name" => "per_page",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Column", "erange"),
                "param_name" => "columns",
                "value" => array(
                    __("3 Columns", "erange") => '3',
                    __("4 Columns", "erange") => '4'
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Order by", "erange"),
                "param_name" => "orderby",
                "value" => array(
                    __("None", "erange") => 'none',
                    __("ID", "erange") => 'id',
                    __("Title", "erange") => 'title',
                    __("Name", "erange") => 'name',
                    __("Date", "erange") => 'date',
                ),
            ),
        )
    ));
}

if (is_plugin_active('gravityforms/gravityforms.php')) {
    $gravity_forms_array[__("No Gravity forms found.", "erange")] = '';
    if (class_exists('RGFormsModel')) {
        $gravity_forms = RGFormsModel::get_forms(1, "title");
        if ($gravity_forms) {
            $gravity_forms_array = array(
                __("Select a form to display.", "erange") => ''
            );
            foreach ($gravity_forms as $gravity_form) {
                $gravity_forms_array[$gravity_form->title] = $gravity_form->id;
            }
        }
    }
    vc_map(array(
        "name" => __("Gravity Form", "erange"),
        "base" => "gravityform",
        "icon" => "icon-wpb-vc_gravityform",
        "category" => __("Content", "erange"),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => __("Form", "erange"),
                "param_name" => "id",
                "value" => $gravity_forms_array,
                "description" => __("Select a form to add it to your post or page.", "erange"),
                "admin_label" => true
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Display Form Title", "erange"),
                "param_name" => "title",
                "value" => array(
                    __("No", "erange") => 'false',
                    __("Yes", "erange") => 'true'
                ),
                "description" => __("Would you like to display the forms title?", "erange"),
                "dependency" => Array(
                    'element' => "id",
                    'not_empty' => true
                )
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Display Form Description", "erange"),
                "param_name" => "description",
                "value" => array(
                    __("No", "erange") => 'false',
                    __("Yes", "erange") => 'true'
                ),
                "description" => __("Would you like to display the forms description?", "erange"),
                "dependency" => Array(
                    'element' => "id",
                    'not_empty' => true
                )
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Enable AJAX?", "erange"),
                "param_name" => "ajax",
                "value" => array(
                    __("No", "erange") => 'false',
                    __("Yes", "erange") => 'true'
                ),
                "description" => __("Enable AJAX submission?", "erange"),
                "dependency" => Array(
                    'element' => "id",
                    'not_empty' => true
                )
            ),
            array(
                "type" => "textfield",
                "heading" => __("Tab Index", "erange"),
                "param_name" => "tabindex",
                "description" => __("(Optional) Specify the starting tab index for the fields of this form. Leave blank if you're not sure what this is.", "erange"),
                "dependency" => Array(
                    'element' => "id",
                    'not_empty' => true
                )
            )
        )
    ));
} // if gravityforms active
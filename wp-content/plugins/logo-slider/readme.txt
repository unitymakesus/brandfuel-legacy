=== Logo Slider ===
Contributors: EnigmaWeb
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CEJ9HFWJ94BG4
Tags: logo slide, logo slideshow, logo slide show, logo carousel, image carousel, logo slider, sponsors, logo showcase
Requires at least: 3.1
Tested up to: 4.9.5
Stable tag: trunk
License: GPLv2 or later

Showcase logos in stylish slideshow carousel.

== Description ==

Add a responsive logo slideshow carousel to your site quickly and easily. Embed in any post/page using shortcode or in your theme.

Perfect for displaying a list of sponsor or client logos.

= Features =
*	Simple and light weight
*	Fully responsive
*	Drag & Drop to reorder slider
*	Nice selection of arrow icons
*	Easy to customise (height, width, transition type etc)
*	Easy image uploader
*	Ability to add links to each logo if you want
*	Auto-slide option
*	Multiple Slideshows - create as many sliders as you like across your site


= Demo =

[Click here](http://demo.enigmaweb.com.au/logo-slider/) to see Logo Slider in action.

== Installation ==

1. Upload the `logo-slider` folder to the `/wp-content/plugins/` directory
1. Activate Logo Slider plugin through the 'Plugins' menu in WordPress
1. Configure the plugin by going to the `Logo Slider` tab that appears in your admin menu.
1. Add to any page using shortcode
 
== Frequently Asked Questions ==

= How can I use this in a widget? =

Just place the shortcode into a text widget. If that doesn't work (it just renders [logo-slider] in text) then that means your theme isn't 'widgetized' which you can fix easily by adding 1 tiny piece of code to your theme functions.php:

`add_filter('widget_text', 'do_shortcode');`

Add this code above to fuctions.php between the `<?php` and `?>` tags. A good place would be either at the very top or the very bottom of the file. Once you've done this you should be able to use shortcode in widgets now.

= Can I do multiple slideshows? =

Yes

= Can I add a logo slider directly to one of my theme templates? =

Yes. Use `<?php echo do_shortcode("[shortcode]"); ?>`. Make sure to replace `[shortcode]` with the shortcode for your own logo slider (which you can find in Logo Slider > Manage Sliders)

= How can I customise the design? =

You can do some basic presentation adjustments via Logo Slider tab on the admin menu. Beyond this, you can completely customise the design using CSS in the Custom CSS field on settings screen.

= The layout is broken =

It's most likely just a matter of tweaking the css.

= Description says it's responsive but I'm testing and logos stack on top of each other =

Check it on an actual mobile device. The logos appear stacked in browser console / simulators, but on an actual device it works fine.

= Where can I get support for this plugin? =

If you've tried all the obvious stuff and it's still not working please request support via the forum.

== Screenshots ==

1. An example of Logo Slider in action
2. The settings screen in WP-Admin

== Changelog ==

= 1.4.8 =
* Adds support for multiple sliders (merging pro features)
* Images are now stored in media library
* Fix for filepaths on https
* Fix for when plugin directory name has been modified
* CSS precedence improvements
* jQuery Cycle logging issue fixed

= 1.4.7 =
* Animation issue fixed.

= 1.4.6 =
* Updated text domain for the plugin repository's new translations

= 1.4.5 =
* Off Buttons issue - Fixed.
* Function renamed for admin styles.
* Function for loading plugin text domain fixed.
* Some code indentation.

= 1.4.4 =
* Number of logos to be displayed in iPad - Fixed

= 1.4.3 =
* Conflict with other slider plugins - Fixed
* Upgrade jQuery.cycle To jQuery.cycle2 - New
* conflict with wpc pro - Fixed
* Updated 'Size' text and added explanatory note so it is clear it applies to whole slider, not just a single slide

= 1.4.2 =
* Fix for IE 11
* Added option for 1 or 2 images per slide (so 3 is no longer lowest option)

= 1.4.1 =
* Fixed number of slides bug (was stuck on 4). Field is now re-implemented so you can set number of logos per slide on desktop layout.

= 1.4 =
* Now fully responsive
* Drag & Drop to reorder slider
* Open slide link in new window
* Turn arrows On/Off
* Fade transition as an option
* Internationalization

= 1.3 =
* Fixed background colour setting

= 1.2 =
* Bug fix for configuration menu display and image resize function. Thanks to Grant Kimball for this fix.

= 1.1 =
* Added auto-slide options

= 1.0 =
* Initial release

== Upgrade Notice ==

= 1.4.8 =
* Adds support for multiple sliders (merging pro features)
* Images are now stored in media library
* Fix for filepaths on https
* Fix for when plugin directory name has been modified
* CSS precedence improvements
* jQuery Cycle logging issue fixed

= 1.4.6 =
* Updated text domain for the plugin repository's new translations

= 1.4.5 =
* Off Buttons issue - Fixed.
* Function renamed for admin styles.
* Function for loading plugin text domain fixed.
* Some code indentation.

= 1.4.4 =
* Number of logos to be displayed in iPad - Fixed

= 1.4.3
* Conflict with other slider plugins - Fixed
* Upgrade jQuery.cycle To jQuery.cycle2 - New
* conflict with wpc pro - Fixed
* Updated 'Size' text and added explanatory note so it is clear it applies to whole slider, not just a single slide

= 1.4.2 =
* Fix for IE 11
* Added option for 1 or 2 images per slide (so 3 is no longer lowest option)

= 1.4.1 =
* Fixed number of slides bug (was stuck on 4). Field is now re-implemented so you can set number of logos per slide on desktop layout.

= 1.4 =
* Now fully responsive
* Drag & Drop to reorder slider
* Open slide link in new window
* Turn arrows On/Off
* Fade transition as an option
* Internationalization

= 1.3 =
* Fixed background colour setting

= 1.2 =
* Bug fix for configuration menu display and image resize function. Thanks to Grant Kimball for this fix.

= 1.1 =
* Added auto-slide options

= 1.0 =
* Initial release



 
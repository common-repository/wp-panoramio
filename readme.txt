 === Plugin Name ===
Contributors: 		ryansutana
Donate link: 		https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&SESSION=E2VJULJAtQi7Ncy4umbvN0BuA4d5XQ7giPP0bIWopu2ShQuZFyxZf3uo9Wu&dispatch=5885d80a13c0db1f8e263663d3faee8d4026841ac68a446f69dad17fb2afeca3
Tags: 				slider, slideshow, gallery, photo list, photo, list, panoramio
Requires at least: 	3.0.0
Tested up to: 		4.8
Stable tag: 		1.5.0
License: 			GPLv2 or later
License 			URI: http://www.gnu.org/licenses/gpl-2.0.html

A very simple plugin that display photos worldwide in gallery, slideshow, photo and list style.

== Description ==
Panoramio module is a simple plugin that display best photos worldwide, this plugin get all photos from http://www.panoramio.com site, all photos that served and uploaded in that site are viewable in this module, you can select which city or country to get the images from.

For more updated details and support please visit plugin site at <a href="http://www.sutanaryan.com/freebies/plugins/wp-panoramio/">WP Panoramio</a>.

* Style
	1. Photo List
	1. Slideshow
	1. Photo
	1. List
* Editable Photo List thumbnail position
	1. Top
	1. Right
	1. Bottom
	1. Left
* Editable number of thumbnail to display
* Editable list orientation
	1. Vertical
	1. Horizontal
* Editable width and height
* Editable bacgkround color

= Important links =
* My portfolio: http://www.sutanaryan.com/portfolio/
* My Blog: http://www.sutanaryan.com/
* Twitter: @ryansutana
* Need a Web Developer [visit http://www.sutanryan.com/services/]

== Installation ==
= Method 1. =
1. Download the "WP Panoramio" plug-in for your WordPress version.
2. Unzip the downloaded file and extract the code to to your /wp-content/plugins/ folder OR simply choose upload in the upper left corder and in the upload box select the wp-rslogin.zip file you downloaded.
3. To complete installation you should activate the plugin in the plug-ins section of your administration panel.

= Method 2. =
1. Go to your WordPress admin account.
2. Open Plug-Ins in the left-side bar menu, choose Add New, and search for WP Panoramio plug-in. Choose the available "WP Panoramio".
3. Install the plug-in and activate it in your account.

== Frequently Asked Questions ==

= How do I add WP Panoramio into my site? =
You can add this plugin in two easist way, by

= shortcode =
[wp_panoramio]

or

do_shortcode('[wp_panoramio]');

For more updated details and support please visit plugin site at <a href="http://www.sutanaryan.com/freebies/plugins/wp-panoramio/">WP Panoramio</a>.

= Can I use this plugin into my site sidebar? =
Yes, just use the shortcode [wp_panoramio], 
if this does not work, then you need to add a little trick into the function.php file of your site.

add_filter('widget_text', 'do_shortcode'); // add this code anywhere in your function.php file

== Screenshots ==
To see the working plugin and screenshots please visit this page <a href="http://www.sutanaryan.com/freebies/plugins/wp-panoramio/" rel="follow">Wordpress WP Panoramio</a>

== Changelog ==
= 1.5.0 =
* Add new shortcode place attribute for individual posts.

= 1.0.0 =
* Initial release version


== Upgrade Notice ==
= 1.5.0 =
Add new functionality which you can add place on shortcode, e.g. [wp_panoramio place="philippines"]

= 1.0.0 =
This is the initial release, no upgrade notice yet at the moment, all you need to do is download and install the plugin.
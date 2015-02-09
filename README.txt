=== Instagram Feed ===
Contributors: smashballoon
Tags: Instagram, Instagram feed, Instagram photos, Instagram plugin, Instagram stream, Custom Instagram Feed, responsive Instagram, mobile Instagram, Instagram posts, Instagram wall, Instagram account
Requires at least: 3.0
Tested up to: 4.1
Stable tag: 1.3.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display beautifully clean, customizable, and responsive feeds from multiple Instagram accounts

== Description ==

Display Instagram photos from any non-private Instagram accounts, either in the same single feed or in multiple different ones.

= Features =
* Super **simple to set up**
* Display photos from **multiple Instagram accounts** in the same feed or in separate feeds
* Completely **responsive** and mobile ready - layout looks great on any screen size and in any container width
* **Completely customizable** - Customize the width, height, number of photos, number of columns, image size, background color, image spacing and more!
* Display **multiple Instagram feeds** on the same page or on different pages throughout your site
* Use the built-in **shortcode options** to completely customize each of your Instagram feeds
* Display thumbnail, medium or **full-size photos** from your Instagram feed
* **Infinitely load more** of your Instagram photos with the 'Load More' button
* Includes a **Follow on Instagram button** at the bottom of your feed
* Display a **beautiful header** at the top of your feed
* Display your Instagram photos chronologically or in random order
* Add your own Custom CSS and JavaScript for even deeper customizations

= Benefits =
* **Increase Social Engagement** - Increase engagement between you and your Instagram followers. Increase your number of followers by displaying your Instagram content directly on your site.
* **Save Time** - Don't have time to update your photos on your site? Save time and increase efficiency by only posting your photos to Instagram and automatically displaying them on your website
* **Display Your Content Your Way** - Customize your Instagram feeds to look exactly the way you want, so that they blend seemlessly into your site or pop out at your visitors!
* **Keep Your Site Looking Fresh** - Automatically push your new Instagram content straight to your site to keep it looking fresh and keeping your audience engaged.
* **Super simple to set up** - Once installed, you can be displaying your Instagram photos within 30 seconds! No confusing steps or Instagram Developer account needed.

= Featured Review =
"**Simple and concise** - Excellent plugin. Simple and non-bloated. I had a couple small issues with the plugin when I first started using it, but a quick comment on the support forums got a new version pushed out the next day with the fix.

Awesome support!" - [Josh Jones](https://wordpress.org/support/topic/simple-and-concise-3 'Simple and concise Instagram plugin')

= Feedback or Support =
We're dedicated to providing the most customizable, robust and well supported Instagram feed plugin in the world, so if you have an issue or have any feedback on how to improve the plugin then please open a ticket in the [Support forum](http://wordpress.org/support/plugin/instagram-feed 'Instagram Feed Support Forum').

For a pop-up photo **lightbox**, to display posts by **hashtag**, show photo **captions**, **video** support + more, check out the [Pro version](http://smashballoon.com/instagram-feed/ 'Instagram Feed Pro').

== Installation ==

1. Install the Instagram plugin either via the WordPress plugin directory, or by uploading the files to your web server (in the `/wp-content/plugins/` directory).
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Navigate to the 'Instagram Feed' settings page to obtain your Instagram Access Token and User ID and configure your settings.
4. Use the shortcode `[instagram-feed]` in your page, post or widget to display your photos.
5. You can display multiple Instagram feeds by using shortcode options, for example: `[instagram-feed num=6 cols=3]`

For simple step-by-step directions on how to set up the Instagram Feed plugin please refer to our [setup guide](http://smashballoon.com/instagram-feed/free/ 'Instagram Feed setup guide').

= Shortcode Options =
* **General Options**
* **id** - An Instagram User ID - Example: `[instagram-feed id=1234567]`
* **width** - The width of your feed. Any number - Example: `[instagram-feed width=50]`
* **widthunit** - The unit of the width. 'px' or '%' - Example: `[instagram-feed widthunit=%]`
* **height** - The height of your feed. Any number - Example: `[instagram-feed height=250]`
* **heightunit** - The unit of the height. 'px' or '%' - Example: `[instagram-feed heightunit=px]`
* **background** - The background color of the feed. Any hex color code - Example: `[instagram-feed background=#ffff00]`
* **class** - Add a CSS class to the feed container - Example: `[instagram-feed class=feedOne]`
*
* **Photo Options**
* **sortby** - Sort the posts by Newest to Oldest (none) or Random (random) - Example: `[instagram-feed sortby=random]`
* **num** - The number of photos to display initially. Maximum is 33 - Example: `[instagram-feed num=10]`
* **cols** - The number of columns in your feed. 1 - 10 - Example: `[instagram-feed cols=5]`
* **imagepadding** - The spacing around your photos - Example: `[instagram-feed imagepadding=10]`
* **imagepaddingunit** - The unit of the padding. 'px' or '%' - Example: `[instagram-feed imagepaddingunit=px]`
* **disablemobile** - Disable the mobile layout. 'true' or 'false' - Example: `[instagram-feed disablemobile=true]`
*
* **Header Options**
* **showheader** - Whether to show the feed Header. 'true' or 'false' - Example: `[instagram-feed showheader=false]`
* **headercolor** - The color of the Header text. Any hex color code - Example: `[instagram-feed headercolor=#333]`
*
* **'Load More' Button Options**
* **showbutton** - Whether to show the 'Load More' button. 'true' or 'false' - Example: `[instagram-feed showbutton='false']`
* **buttoncolor** - The background color of the button. Any hex color code - Example: `[instagram-feed buttoncolor=#000]`
* **buttontextcolor** - The text color of the button. Any hex color code - Example: `[instagram-feed buttontextcolor=#fff]`
* **imageres** - The resolution/size of the photos. 'full', 'medium' or 'thumb' - Example: `[instagram-feed imageres=full]`
*
* **'Follow on Instagram' Button Options**
* **showfollow** - Whether to show the 'Follow on Instagram' button. 'true' or 'false' - Example: `[instagram-feed showfollow=true]`
* **followcolor** - The background color of the button. Any hex color code - Example: `[instagram-feed followcolor=#ff0000]`
* **followtextcolor** - The text color of the button. Any hex color code - Example: `[instagram-feed followtextcolor=#fff]`
* **followtext** - The text used for the button - Example: `[instagram-feed followtext="Follow me"]`

For more shortcode options, check out the [Pro version](http://smashballoon.com/instagram-feed/ 'Instagram Feed Pro').

== Frequently Asked Questions ==

= Can I display multiple Instagram feeds on my site or on the same page? =

Yep. You can display multiple Instagram feeds by using our built-in shortcode options, for example: `[instagram-feed id="12986477" cols=3]`.

= Can I display photos from more than one Instagram account in one single feed? =

Yep. You can just separate the IDs by commas, either in the User ID(s) field on the plugin's Settings page, or directly in the shortcode like so: `[instagram-feed id="12986477,13460080"]`.

= How do I find my Instagram Access Token and User ID =

We've made it super easy. Simply click on the big blue button on the Instagram Feed Settings page and log into your Instagram account. The plugin will then retrieve and display both your Access Token and User ID from Instagram.

You can also display photos from other peoples Instagram accounts. To find their Instagram User ID you can use [this tool](http://www.otzberg.net/iguserid/).

= Are there any security issues with using an Access Token on my site? =

Nope. The Access Token used in the plugin is a "read only" token, which means that it could never be used maliciously to manipulate your Instagram account.

= My Instagram feed isn't displaying. Why not!? =

There are a few common reasons for this:

* Your Instagram account may be set to private. Instagram doesn't allow photos from private Instagram accounts to be displayed publicly.
* Your Access Token may not be valid. Try clicking on the blue Instagram login button on the plugin's Settings page again and copy and paste the Instagram token it gives you into the plugin's Access Token field.
* Your User ID may not be valid. Be sure you're not using your Instagram username instead of your User ID. You can find your Instagram User ID by using [this tool](http://www.otzberg.net/iguserid/).
* Your website may contain a JavaScript error which is preventing JavaScript from running. The plugin uses JavaScript to load the Instagram photos into your page and so needs JavaScript to be running in order to work. You would need to remove any existing JavaScript errors on your website for the plugin to be able to load in your feed.

If you're still having an issue displaying your feed then please open a ticket in the [Support forum](http://wordpress.org/support/plugin/instagram-feed 'Instagram Feed Support Forum') with a link to the page where you're trying to display the Instagram feed and, if possible, a link to your Instagram account.

= Can I view the full-size photos or play Instagram videos directly on my website?  =

This is a feature of the [Pro version](http://smashballoon.com/instagram-feed/ 'Instagram Feed Pro') of the plugin, which allows you to view the photos in a pop-up lightbox, support videos, display captions, display photos by hashtag + more!

= How do I embed my Instagram Feed directly into a WordPress page template? =

You can embed your Instagram feed directly into a template file by using the WordPress [do_shortcode](http://codex.wordpress.org/Function_Reference/do_shortcode) function: `<?php echo do_shortcode('[instagram-feed]'); ?>`.

= What are the available shortcode options that I can use to customize my Instagram feed? =

The below options are available on the Instagram Feed Settings page but can also be used directly in the `[instagram-feed]` shortcode to customize individual Instagram feeds on a feed-by-feed basis.

* **General Options**
* **id** - An Instagram User ID - Example: `[instagram-feed id=1234567]`
* **width** - The width of your feed. Any number - Example: `[instagram-feed width=50]`
* **widthunit** - The unit of the width. 'px' or '%' - Example: `[instagram-feed widthunit=%]`
* **height** - The height of your feed. Any number - Example: `[instagram-feed height=250]`
* **heightunit** - The unit of the height. 'px' or '%' - Example: `[instagram-feed heightunit=px]`
* **background** - The background color of the feed. Any hex color code - Example: `[instagram-feed background=#ffff00]`
* **class** - Add a CSS class to the feed container - Example: `[instagram-feed class=feedOne]`
*
* **Photo Options**
* **sortby** - Sort the posts by Newest to Oldest (none) or Random (random) - Example: `[instagram-feed sortby=random]`
* **num** - The number of photos to display initially. Maximum is 33 - Example: `[instagram-feed num=10]`
* **cols** - The number of columns in your feed. 1 - 10 - Example: `[instagram-feed cols=5]`
* **imagepadding** - The spacing around your photos - Example: `[instagram-feed imagepadding=10]`
* **imagepaddingunit** - The unit of the padding. 'px' or '%' - Example: `[instagram-feed imagepaddingunit=px]`
* **disablemobile** - Disable the mobile layout. 'true' or 'false' - Example: `[instagram-feed disablemobile=true]`
*
* **Header Options**
* **showheader** - Whether to show the feed Header. 'true' or 'false' - Example: `[instagram-feed showheader=false]`
* **headercolor** - The color of the Header text. Any hex color code - Example: `[instagram-feed headercolor=#333]`
*
* **'Load More' Button Options**
* **showbutton** - Whether to show the 'Load More' button. 'true' or 'false' - Example: `[instagram-feed showbutton='false']`
* **buttoncolor** - The background color of the button. Any hex color code - Example: `[instagram-feed buttoncolor=#000]`
* **buttontextcolor** - The text color of the button. Any hex color code - Example: `[instagram-feed buttontextcolor=#fff]`
* **imageres** - The resolution/size of the photos. 'full', 'medium' or 'thumb' - Example: `[instagram-feed imageres=full]`
*
* **'Follow on Instagram' Button Options**
* **showfollow** - Whether to show the 'Follow on Instagram' button. 'true' or 'false' - Example: `[instagram-feed showfollow=true]`
* **followcolor** - The background color of the button. Any hex color code - Example: `[instagram-feed followcolor=#ff0000]`
* **followtextcolor** - The text color of the button. Any hex color code - Example: `[instagram-feed followtextcolor=#fff]`
* **followtext** - The text used for the button - Example: `[instagram-feed followtext="Follow me"]`

For more shortcode options, check out the [Pro version](http://smashballoon.com/instagram-feed/ 'Instagram Feed Pro').

== Screenshots ==

1. Default plugin styling
2. Your Instagram Feed is completely customizable
3. Display multiple Instagram feeds from any non-private Instagram account
4. Your Instagram feeds are completely responsive and look great on any device
5. Display your Instagram photos in multiple columns, with or without a scrollbar
6. Just copy and paste the shortcode into any page, post or widget on your site
7. The Instagram Feed plugin Settings pages

== Changelog ==
= 1.3.3 =
* Fix: Fixed an issue with the 'Load more' button not always showing when displaying Instagram photos from multiple User IDs
* Fix: Moved the initiating sbi_init function outside of the jQuery ready function so that it can be called externally if needed by Ajax powered themes/plugins

= 1.3.2 =
* New: Added an option to disable the mobile layout
* New: Added an setting which allows you to use the plugin with an Ajax powered theme
* New: Added a 'class' shortcode option which allows you to add a CSS to class to each individual feed: `[instagram-feed class=feedOne]`
* New: Added a Support tab which contains System Info to help with troubleshooting
* New: Added friendly error messages which display only to WordPress admins
* New: Added validation to the User ID field to prevent usernames being entered instead of IDs
* Tweak: Made the Access Token field slightly wider to prevent tokens being copy and pasted incorrectly
* Fix: Fixed a JavaScript bug which caused the feed not to load photos correctly in IE8

= 1.3.1 =
* Fix: Fixed an issue with the Instagram icon not appearing in the 'Follow on Instagram' button or in the header
* Fix: Addressed a few CSS issues which were causing some minor formatting issues on certain themes

= 1.3 =
* New: You can now display photos from multiple Instagram User IDs. Simply separate your IDs by commas.
* New: Added an optional header to the feed which contains your Instagram profile picture, username and bio. You can activate this on the Customize page.
* New: The plugin now includes an 'Auto-detect' option for the Image Resolution setting which will automatically set the correct image resolution based on the size of your feed.
* New: Added an optional 'Follow on Instagram' button which can be displayed at the bottom of your feed. You can activate this on the Customize page.
* New: Added the ability to use your own custom text for the 'Load More' button
* New: Added a loader icon to indicate that the photos are loading
* New: Added a unique ID to each Instagram photo so that they can be targeted individually via CSS
* Tweak: Added a subtle fade effect to the photos when hovering over them
* Tweak: Improved the responsive layout behavior of the feed
* Tweak: Improved the documentation within the plugin settings pages
* Tweak: Included a link to [step-by-step setup directions](http//:smashballoon.com/instagram-feed/free/ 'Instagram feed setup directions') for the plugin
* Fix: Fixed an issue with the feed not clearing other widgets correctly

= 1.2.3 =
* Fix: Replaced the 'on' function with the 'click' function to increase compatibility with themes using older versions of jQuery

= 1.2.2 =
* Tweak: Added an initialize function to the plugin
* Fix: Fixed an occasional issue with the 'Sort Photos By' option being undefined

= 1.2.1 =
* Fix: Fixed a minor issue with the Custom JavaScript being run before the photos are loaded
* Fix: Removed stray PHP notices
* Fix: Changed the double quotes to single quotes on the 'data-options' attribute

= 1.2 =
* New: Added Custom CSS and Custom JavaScript sections which allow you to add your own custom CSS and JavaScript to the plugin
* New: Added an option to display your Instagram photos in random order
* New: A new tabbed layout has been implemented on the plugin's settings pages
* New: Added an option to preserve your settings when uninstalling the plugin
* New: Added a [Pro version](http://smashballoon.com/instagram-feed/ 'Instagram Feed Pro') of the plugin which allows you to display photos by hashtag, display captions, view photos in a pop-up lightbox, show the number of likes & comments and more
* Tweak: The 'Load More' button now automatically hides if there are no more photos to load
* Tweak: Added a small gap to the top of the 'Load More' button
* Tweak: Added a icon to the Instagram Feed menu item

= 1.1.6 =
* Fix: A maximum width is now only applied to the feed when the photos are displayed in one column

= 1.1.5 =
* Fix: Added a line of code which enables shortcodes to be used in widgets for themes which don't have it enabled

= 1.1.4 =
* Fix: Fixed an issue with the Instagram Access Token and User ID retrieval functionality in certain web browsers

= 1.1.3 =
* Fix: Fixed an issue with the maximum Instagram image width
* Fix: Corrected a typo in the Shortcode Options table

= 1.1.1 =
* Pre-tested for the upcoming WordPress 4.0 update
* Fix: Fixed an uncommon issue related to the output of the Instagram content

= 1.1 =
* New: Added an option to set the number of Instagram photos to be initially displayed
* New: Added an option to show or hide the 'Load More' button
* New: Added 'Step 3' to the Instagram Feed Settings page explaining how to display your feed using the [instagram-feed] shortcode
* New: Added a full list of all available shortcode options to help you if customizing multiple Instagram feeds

= 1.0.2 =
* Fix: Fixed an issue with the Instagram login URL on the Settings page

= 1.0.1 =
* Fix: Fixed an issue with the Instagram Feed 'Load More' button opening an empty browser window in Firefox

= 1.0 =
* Launched the Instagram Feed plugin!
=== Plugin Name ===
Contributors: gayadesign
Donate link: http://www.gayadesign.com/
Tags: language switch, language, locale, lang, xili, xili-language
Requires at least: 3.3
Tested up to: 3.3

Switch between languages with ease using xili-language plugin. Displaying only the posts in the set language.

== Description ==

Complete Language Switcher is a plugin that allows you to setup your blog with multilingual support.

It also allows you to switch between languages with a nice list of flag which are easily styled.

Complete Language Switcher filters out the posts tagged with a certain language to displayed. Other languages will be hidden in the listings.

	Note that this plugin requires the xili-language plugin in order to work.

== Installation ==

Installing this plugin is easy.

1. Install and activate the **xili-language** plugin
1. Upload the `complete-language-switch` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php cls_langs_html(); ?>` in anywhere your templates or hook it in your template using `<?php add_action('hook_name', 'cls_langs_html'); ?>`.

A few notes:

*	Make sure you put en_US.mo files in the language folders when using the default language.
*	Check the /flags/ directory in the plugin to see if your flag is in there. Naming is the 2 last characters of the locale (eg. en_US) in lowercase in PNG format. So en_US would be: us.png

== Changelog ==

= 0.4 =
* first stable version is online
<?php
/*
	Plugin Name: Complete Language Switcher
	Description: Switch between languages with ease using xili-language plugin. Displaying only the posts in the set language.
	Version: 0.4
	Author: Gaya Kessler
	Author URI: http://www.gayadesign.com
*/

//first check if xili-language has been installed
add_action("plugins_loaded", "check_xili");

function check_xili() {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if (!is_plugin_active("xili-language/xili-language.php")) {
        echo "<div id='message' class='error'>";
        echo "<em>There is an error with Complete Lang Switcher:</em>
        Please <a href='plugin-install.php?tab=search&type=term&s=xili-language&plugin-search-input=Search+Plugins'>install and activate <strong>xili-language</strong></a>
        to make this plugin work.";
        echo "</div>";
    }
}

include("includes/locale.php");
include("includes/output.php");
include("includes/postfilters.php");

function debug_quick($arg1, $arg2) {
    print_r($arg2);

    return $arg1;
}

?>
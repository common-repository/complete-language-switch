<?php

/*
 * HOOKS AND FILTERS FOR LOCALE
 */

//action on init
add_action('init', 'cls_force_locale_wp');
//action on theme
add_action('template_redirect', 'cls_force_locale_theme');

//filter the lang
add_filter('locale', 'cls_set_locale');
//filter mo file
add_filter('load_textdomain_mofile', 'cls_block_non_locale');


/*
 * FUNCTIONS FOR LOCALE
 */

function cls_force_locale_wp() {
    $file_path = WP_CONTENT_DIR . "/languages/" . get_locale() . ".mo";
    load_textdomain("default", $file_path);
}

function cls_force_locale_theme() {
    $file = TEMPLATEPATH . '/language/' . get_locale() . ".mo";
    if (file_exists($file)) {
        load_textdomain("default", $file);
    }
}

function cls_set_locale() {
    cls_set_lang_session();

    return $_SESSION['cls_lang'];
}

function cls_set_lang_session() {
    if (!session_id()) {
        session_start();
    }

    //set default wp lang if non is set
    if (!isset($_SESSION['cls_lang'])) {
        $default = "en_US";

        if (strlen(WPLANG) > 0) {
            $default = WPLANG;
        }

        $_SESSION['cls_lang'] = $default;
    }

    //change the lang if needed
    if (isset($_GET['setlang']) && $_GET['setlang'] != $_SESSION['cls_lang']) {
        $_SESSION['cls_lang'] = $_GET['setlang'];
    }
}

function cls_block_non_locale($mofile) {
    if (strstr($mofile, get_locale())) {
        return $mofile;
    } else {
        return false;
    }
}

?>
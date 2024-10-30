<?php

/*
 * A function you can call in a template or hook to generate the flags.
 */

function cls_langs_html() {
    $options = get_option("xili_language_settings");

    $html = '
    <ul id="lang_nav">
    ';

    foreach ($options['languages_list'] as $value) {
        $locale = $value->name;
        $text = $value->description;

        $html .= '
        <li>
            <a href="/?setlang='.$locale.'"';

        if (get_locale() == $locale) {
            $html .= ' class="active"';
        }

        $html .='>
                <img src="' . plugins_url("complete-lang-switcher/flags/") . strtolower(substr($locale, 3, 2)) . '.png" /> '.$text.'
            </a>
        </li>
        ';
    }

    $html .= '
    </ul>
    ';

    echo $html;
}

?>
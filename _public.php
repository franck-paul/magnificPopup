<?php
/**
 * @brief magnific-popup, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul and contributors
 *
 * @copyright Franck Paul carnet.franck.paul@gmail.com
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('DC_RC_PATH')) {return;}

$core->addBehavior('publicHeadContent', ['magnificPopupPublic', 'publicHeadContent']);
$core->addBehavior('publicFooterContent', ['magnificPopupPublic', 'publicFooterContent']);

class magnificPopupPublic
{
    public static function publicHeadContent($core)
    {
        $core->blog->settings->addNameSpace('magnificpopup');
        if (!$core->blog->settings->magnificpopup->enabled) {
            return;
        }

        echo
        dcUtils::cssLoad($core->blog->getPF('magnific-popup/css/magnific-popup.css')) .
        dcUtils::jsLoad($core->blog->getPF('magnific-popup/js/magnific-popup.js'));
    }

    public static function publicFooterContent($core)
    {
        $core->blog->settings->addNameSpace('magnificpopup');
        if (!$core->blog->settings->magnificpopup->enabled) {
            return;
        }

        echo
        '<script type="text/javascript">' . "\n" .
        '$(document).ready(function() {' . "\n" .
        '$("div.post-content,div.post-excerpt").magnificPopup({' . "\n" .
        'delegate: \'a[href$=".jpg"],a[href$=".jpeg"],a[href$=".png"],a[href$=".gif"],a[href$=".webp"],a[href$=".JPG"],a[href$=".JPEG"],a[href$=".PNG"],a[href$=".GIF"],a[href$=".WEBP"]\', ' . "\n" .
        'type: \'image\', ' . "\n" .
        'tClose: \'' . __('Close (esc)') . '\', ' . "\n" .
        'gallery: {' . "\n" .
        'enabled: true,' . "\n" .
        'tPrev: \'' . __('Previous (Left arrow key)') . '\', ' . "\n" .
        'tNext: \'' . __('Next (Right arrow key)') . '\', ' . "\n" .
        'tCounter: \'<span class="mfp-counter">' . __('%curr% of %total%') . '</span>\', ' . "\n" .
            '}' . "\n" .
            '});' . "\n" .
            "});\n" .
            "</script>\n";
    }
}

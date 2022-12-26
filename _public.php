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
if (!defined('DC_RC_PATH')) {
    return;
}

class magnificPopupPublic
{
    public static function publicHeadContent()
    {
        if (!dcCore::app()->blog->settings->magnificpopup->enabled) {
            return;
        }

        echo
        dcUtils::cssModuleLoad('magnific-popup/css/magnific-popup.css') .
        dcUtils::jsModuleLoad('magnific-popup/js/magnific-popup.js') .
        dcUtils::jsJson('magnific_popup', [
            'animate'  => (bool) dcCore::app()->blog->settings->magnificpopup->animate,
            'escape'   => __('Close (esc)'),
            'previous' => __('Previous (Left arrow key)'),
            'next'     => __('Next (Right arrow key)'),
            'counter'  => __('%curr% of %total%'),
            'images'   => implode(',', array_map(
                fn ($value) => 'a[href$=".' . $value . '"],a[href$=".' . strtoupper($value) . '"]',
                ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'avif']
            )),
        ]) .
        dcUtils::jsModuleLoad('magnific-popup/js/public.js');
    }
}

dcCore::app()->addBehavior('publicHeadContent', [magnificPopupPublic::class, 'publicHeadContent']);

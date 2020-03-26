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
        dcUtils::jsLoad($core->blog->getPF('magnific-popup/js/magnific-popup.js')) .
        dcUtils::jsJson('magnific_popup', [
            'escape'   => __('Close (esc)'),
            'previous' => __('Previous (Left arrow key)'),
            'next'     => __('Next (Right arrow key)'),
            'counter'  => __('%curr% of %total%'),
            'images'   => implode(',', array_map(
                function ($value) {
                    return 'a[href$=".' . $value . '"],a[href$=".' . strtoupper($value) . '"]';
                },
                ['jpg', 'jpeg', 'png', 'gif', 'wepb', 'svg']))
        ]) .
        dcUtils::jsLoad($core->blog->getPF('magnific-popup/js/public.js'));
    }
}

<?php
/**
 * @brief magnificPopup, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul and contributors
 *
 * @copyright Franck Paul carnet.franck.paul@gmail.com
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

namespace Dotclear\Plugin\magnificPopup;

use dcCore;
use dcUtils;

class FrontendBehaviors
{
    public static function publicHeadContent()
    {
        $settings = dcCore::app()->blog->settings->get(My::id());
        if (!$settings->enabled) {
            return;
        }

        echo
        dcUtils::cssModuleLoad(My::id() . '/css/magnific-popup.css') .
        dcUtils::jsModuleLoad(My::id() . '/js/magnific-popup.js') .
        dcUtils::jsJson('magnific_popup', [
            'animate'  => (bool) $settings->animate,
            'escape'   => __('Close (esc)'),
            'previous' => __('Previous (Left arrow key)'),
            'next'     => __('Next (Right arrow key)'),
            'counter'  => __('%curr% of %total%'),
            'images'   => implode(',', array_map(
                fn ($value) => 'a[href$=".' . $value . '"],a[href$=".' . strtoupper($value) . '"]',
                ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'avif']
            )),
        ]) .
        dcUtils::jsModuleLoad(My::id() . '/js/public.js');
    }
}

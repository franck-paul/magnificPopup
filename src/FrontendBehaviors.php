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

use Dotclear\Helper\Html\Html;

class FrontendBehaviors
{
    public static function publicHeadContent(): string
    {
        $settings = My::settings();
        if (!$settings->enabled) {
            return '';
        }

        echo
        My::cssLoad('magnific-popup.css') .
        My::jsLoad('magnific-popup.js') .
        Html::jsJson('magnific_popup', [
            'animate'  => (bool) $settings->animate,
            'delay'    => (int) $settings->delay,
            'escape'   => __('Close (esc)'),
            'previous' => __('Previous (Left arrow key)'),
            'next'     => __('Next (Right arrow key)'),
            'counter'  => __('%curr% of %total%'),
            'images'   => implode(',', array_map(
                static fn ($value): string => 'a[href$=".' . $value . '"],a[href$=".' . strtoupper($value) . '"]',
                ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'avif']
            )),
        ]) .
        My::jsLoad('public.js');

        return '';
    }
}

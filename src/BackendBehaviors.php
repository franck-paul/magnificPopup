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

use Dotclear\App;
use Dotclear\Helper\Html\Form\Checkbox;
use Dotclear\Helper\Html\Form\Fieldset;
use Dotclear\Helper\Html\Form\Label;
use Dotclear\Helper\Html\Form\Legend;
use Dotclear\Helper\Html\Form\Note;
use Dotclear\Helper\Html\Form\Number;
use Dotclear\Helper\Html\Form\Para;

class BackendBehaviors
{
    public static function adminBlogPreferencesForm(): string
    {
        $settings = My::settings();

        echo
        (new Fieldset('magnificpopup'))
        ->legend((new Legend(__('magnificPopup'))))
        ->fields([
            (new Para())->items([
                (new Checkbox('magnific_popup_enabled', (bool) $settings->enabled))
                    ->value(1)
                    ->label((new Label(__('Enable magnificPopup'), Label::INSIDE_TEXT_AFTER))),
            ]),
            (new Para())->items([
                (new Checkbox('magnific_popup_animate', (bool) $settings->animate))
                    ->value(1)
                    ->label((new Label(__('Enable animation'), Label::INSIDE_TEXT_AFTER))),
            ]),
            (new Para())->items([
                (new Number('magnific_popup_delay', 0, 9_999, (int) $settings?->delay))
                    ->label((new Label(__('Popup removal delay (in milliseconds):'), Label::INSIDE_TEXT_BEFORE))),
            ]),
            (new Note())
                ->class('form-note')
                ->text(__('Set to 0 or leave empty to use the default value (300 milliseconds)')),
        ])
        ->render();

        return '';
    }

    public static function adminBeforeBlogSettingsUpdate(): string
    {
        $settings = My::settings();
        $settings->put('enabled', !empty($_POST['magnific_popup_enabled']), App::blogWorkspace()::NS_BOOL);
        $settings->put('animate', !empty($_POST['magnific_popup_animate']), App::blogWorkspace()::NS_BOOL);
        $settings->put('delay', (int) $_POST['magnific_popup_delay'], App::blogWorkspace()::NS_INT);

        return '';
    }
}

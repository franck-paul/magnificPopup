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
if (!defined('DC_CONTEXT_ADMIN')) {
    return;
}

// dead but useful code, in order to have translations
__('magnific-popup') . __('lightBox like effect on images using jquery responsive modal');

class magnificPopupBehaviors
{
    public static function adminBlogPreferencesForm($settings)
    {
        $settings->addNameSpace('magnificpopup');
        echo
        '<div class="fieldset"><h4 id="magnific-popup">magnific-popup</h4>' .
        '<p><label class="classic">' .
        form::checkbox('magnific_popup_enabled', '1', $settings->magnificpopup->enabled) .
        __('Enable magnific-popup') . '</label></p>' .
        form::checkbox('magnific_popup_animate', '1', $settings->magnificpopup->animate) .
        __('Enable animation') . '</label></p>' .
        '</div>';
    }

    public static function adminBeforeBlogSettingsUpdate($settings)
    {
        $settings->addNameSpace('magnificpopup');
        $settings->magnificpopup->put('enabled', !empty($_POST['magnific_popup_enabled']), 'boolean');
        $settings->magnificpopup->put('animate', !empty($_POST['magnific_popup_animate']), 'boolean');
    }
}

dcCore::app()->addBehavior('adminBlogPreferencesFormV2', [magnificPopupBehaviors::class, 'adminBlogPreferencesForm']);
dcCore::app()->addBehavior('adminBeforeBlogSettingsUpdate', [magnificPopupBehaviors::class, 'adminBeforeBlogSettingsUpdate']);

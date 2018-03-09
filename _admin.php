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

if (!defined('DC_CONTEXT_ADMIN')) {return;}

// dead but useful code, in order to have translations
__('magnific-popup') . __('lightBox like effect on images using jquery responsive modal');

$core->addBehavior('adminBlogPreferencesForm', array('magnificPopupBehaviors', 'adminBlogPreferencesForm'));
$core->addBehavior('adminBeforeBlogSettingsUpdate', array('magnificPopupBehaviors', 'adminBeforeBlogSettingsUpdate'));

class magnificPopupBehaviors
{
    public static function adminBlogPreferencesForm($core, $settings)
    {
        $settings->addNameSpace('magnificpopup');
        echo
        '<div class="fieldset"><h4>magnific-popup</h4>' .
        '<p><label class="classic">' .
        form::checkbox('magnific_popup_enabled', '1', $settings->magnificpopup->enabled) .
        __('Enable magnific-popup') . '</label></p>' .
            '</div>';
    }

    public static function adminBeforeBlogSettingsUpdate($settings)
    {
        $settings->addNameSpace('magnificpopup');
        $settings->magnificpopup->put('enabled', !empty($_POST['magnific_popup_enabled']), 'boolean');
    }
}

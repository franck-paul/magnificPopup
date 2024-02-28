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
use Dotclear\Core\Process;
use Exception;

class Install extends Process
{
    public static function init(): bool
    {
        return self::status(My::checkContext(My::INSTALL));
    }

    public static function process(): bool
    {
        if (!self::status()) {
            return false;
        }

        try {
            // Disable old plugin if exists
            $old_id = 'magnific-popup';
            if (App::plugins()->moduleExists($old_id)) {
                App::plugins()->deactivateModule($old_id);
            }

            $old_version = App::version()->getVersion(My::id());
            // Rename settings namespace
            if (version_compare((string) $old_version, '2.0', '<') && App::blog()->settings()->exists('magnificpopup')) {
                App::blog()->settings()->delWorkspace(My::id());
                App::blog()->settings()->renWorkspace('magnificpopup', My::id());
            }

            // Init
            $settings = My::settings();
            $settings->put('enabled', true, App::blogWorkspace()::NS_BOOL, '', false, true);
            $settings->put('animate', false, App::blogWorkspace()::NS_BOOL, '', false, true);
            $settings->put('delay', 300, App::blogWorkspace()::NS_INT, '', false, true);
        } catch (Exception $exception) {
            App::error()->add($exception->getMessage());
        }

        return true;
    }
}

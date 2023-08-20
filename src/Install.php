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
use dcNamespace;
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
            if (dcCore::app()->plugins->moduleExists($old_id)) {
                dcCore::app()->plugins->deactivateModule($old_id);
            }

            $old_version = dcCore::app()->getVersion(My::id());
            if (version_compare((string) $old_version, '2.0', '<')) {
                // Rename settings namespace
                if (dcCore::app()->blog->settings->exists('magnificpopup')) {
                    dcCore::app()->blog->settings->delNamespace(My::id());
                    dcCore::app()->blog->settings->renNamespace('magnificpopup', My::id());
                }
            }

            // Init
            $settings = dcCore::app()->blog->settings->get(My::id());
            $settings->put('enabled', true, dcNamespace::NS_BOOL, '', false, true);
            $settings->put('animate', false, dcNamespace::NS_BOOL, '', false, true);
        } catch (Exception $e) {
            dcCore::app()->error->add($e->getMessage());
        }

        return true;
    }
}

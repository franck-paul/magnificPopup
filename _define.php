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

$this->registerModule(
    'magnific-popup',
    'lightBox like effect on images using jquery responsive modal',
    'Franck Paul and contributors',
    '1.0',
    [
        'requires'    => [['core', '2.24']],
        'permissions' => dcCore::app()->auth->makePermissions([
            dcAuth::PERMISSION_ADMIN,
        ]),
        'type'     => 'plugin',
        'settings' => [
            'blog' => '#params.magnific-popup',
        ],

        'details'    => 'https://open-time.net/?q=magnific-popup',
        'support'    => 'https://github.com/franck-paul/magnific-popup',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/magnific-popup/master/dcstore.xml',
    ]
);

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
$this->registerModule(
    'magnificPopup',
    'lightBox like effect on images using jquery responsive modal',
    'Franck Paul and contributors',
    '3.0',
    [
        'requires'    => [['core', '2.28']],
        'permissions' => dcCore::app()->auth->makePermissions([
            dcAuth::PERMISSION_ADMIN,
        ]),
        'type'     => 'plugin',
        'settings' => [
            'blog' => '#params.magnificpopup',
        ],

        'details'    => 'https://open-time.net/?q=magnificPopup',
        'support'    => 'https://github.com/franck-paul/magnificPopup',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/magnificPopup/master/dcstore.xml',
    ]
);

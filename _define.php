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
    '4.8',
    [
        'date'        => '2025-02-09T08:11:51+0100',
        'requires'    => [['core', '2.28']],
        'permissions' => 'My',
        'type'        => 'plugin',
        'settings'    => [
            'blog' => '#params.magnificpopup',
        ],

        'details'    => 'https://open-time.net/?q=magnificPopup',
        'support'    => 'https://github.com/franck-paul/magnificPopup',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/magnificPopup/main/dcstore.xml',
    ]
);

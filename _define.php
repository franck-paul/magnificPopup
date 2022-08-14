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
    'magnific-popup',                                               // Name
    'lightBox like effect on images using jquery responsive modal', // Description
    'Franck Paul and contributors',                                 // Author
    '0.7.1',
    [
        'requires'    => [['core', '2.23']],                             // Dependencies
        'permissions' => 'admin',                                        // Permissions
        'type'        => 'plugin',                                       // Type
        'settings'    => [
            'blog' => '#params.magnific-popup',
        ],

        'details'    => 'https://open-time.net/?q=magnific-popup',       // Details URL
        'support'    => 'https://github.com/franck-paul/magnific-popup', // Support URL
        'repository' => 'https://raw.githubusercontent.com/franck-paul/magnific-popup/master/dcstore.xml',
    ]
);

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

if (!defined('DC_RC_PATH')) {return;}

$this->registerModule(
    "magnific-popup",                                               // Name
    "lightBox like effect on images using jquery responsive modal", // Description
    "Franck Paul and contributors",                                 // Author
    '0.4',                                                          // Version
    [
        'requires'    => [['core', '2.16']],                             // Dependencies
        'permissions' => 'admin',                                        // Permissions
        'type'        => 'plugin',                                       // Type
        'details'     => 'https://open-time.net/?q=magnific-popup',      // Details URL
        'support'     => 'https://github.com/franck-paul/magnificPopup', // Support URL
        'settings'    => [
            'blog' => '#params.magnific-popup'
        ]
    ]
);

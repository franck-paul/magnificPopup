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

$core->addBehavior('publicHeadContent', ['magnificPopupPublic', 'publicHeadContent']);
$core->addBehavior('publicFooterContent', ['magnificPopupPublic', 'publicFooterContent']);

class magnificPopupPublic
{
    public static function publicHeadContent($core)
    {
        $core->blog->settings->addNameSpace('magnificpopup');
        if (!$core->blog->settings->magnificpopup->enabled) {
            return;
        }

        echo
        dcUtils::cssLoad($core->blog->getPF('magnific-popup/css/magnific-popup.css')) .
        dcUtils::jsLoad($core->blog->getPF('magnific-popup/js/magnific-popup.js'));
    }

    public static function publicFooterContent($core)
    {
        $core->blog->settings->addNameSpace('magnificpopup');
        if (!$core->blog->settings->magnificpopup->enabled) {
            return;
        }

        $strEscape   = __('Close (esc)');
        $strPrevious = __('Previous (Left arrow key)');
        $strNext     = __('Next (Right arrow key)');
        $strCounter  = __('%curr% of %total%');
        $strImages   = implode(',', array_map(
            function ($value) {
                return 'a[href$=".' . $value . '"],a[href$=".' . strtoupper($value) . '"]';
            },
            ['jpg', 'jpeg', 'png', 'gif', 'wepb', 'svg']));

        $str = <<<EOT
<script type="text/javascript">
$(document).ready(function() {
    $("div.post-content,div.post-excerpt").magnificPopup({
        delegate: '$strImages',
        type: 'image',
        tClose: '$strEscape',
        gallery: {
            enabled: true,
            tPrev: '$strPrevious',
            tNext: '$strNext',
            tCounter: '<span class="mfp-counter">$strCounter</span>',
        }
    });
});
</script>
EOT;

        echo $str;
    }
}

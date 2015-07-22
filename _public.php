<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of magnific-popup, a plugin for Dotclear 2.
#
# Copyright (c) Franck Paul and contributors
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------

if (!defined('DC_RC_PATH')) { return; }

$core->addBehavior('publicHeadContent',array('magnificPopupPublic','publicHeadContent'));
$core->addBehavior('publicFooterContent',array('magnificPopupPublic','publicFooterContent'));

class magnificPopupPublic
{
	public static function publicHeadContent($core)
	{
		$core->blog->settings->addNameSpace('magnificpopup');
		if (!$core->blog->settings->magnificpopup->enabled) {
			return;
		}

		$url = $core->blog->getQmarkURL().'pf='.basename(dirname(__FILE__));
		echo
		'<link rel="stylesheet" type="text/css" href="'.$url.'/css/magnific-popup.css" />'."\n".
		'<script type="text/javascript" src="'.$url.'/js/magnific-popup.js"></script>'."\n";
	}

	public static function publicFooterContent($core)
	{
		$core->blog->settings->addNameSpace('magnificpopup');
		if (!$core->blog->settings->magnificpopup->enabled) {
			return;
		}

		echo
		'<script type="text/javascript">'."\n".
		"//<![CDATA[\n".
		'$(document).ready(function() {'."\n".
			'$("div.post-content").magnificPopup({'."\n".
				'delegate: \'a[href$=".jpg"],a[href$=".jpeg"],a[href$=".png"],a[href$=".gif"],a[href$=".JPG"],a[href$=".JPEG"],a[href$=".PNG"],a[href$=".GIF"]\', '."\n".
				'type: \'image\', '."\n".
				'tClose: \''.__('Close (esc)').'\', '."\n".
				'gallery: {'."\n".
					'enabled: true,'."\n".
					'tPrev: \''.__('Previous (Left arrow key)').'\', '."\n".
					'tNext: \''.__('Next (Right arrow key)').'\', '."\n".
					'tCounter: \'<span class="mfp-counter">'.__('%curr% of %total%').'</span>\', '."\n".
				'}'."\n".
			'});'."\n".
		"});\n".
		"\n//]]>\n".
		"</script>\n";
	}
}

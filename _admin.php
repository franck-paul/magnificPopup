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

if (!defined('DC_CONTEXT_ADMIN')) { return; }

// dead but useful code, in order to have translations
__('magnific-popup').__('lightBox like effect on images using jquery responsive modal');

$core->addBehavior('adminBlogPreferencesForm',array('magnificPopupBehaviors','adminBlogPreferencesForm'));
$core->addBehavior('adminBeforeBlogSettingsUpdate',array('magnificPopupBehaviors','adminBeforeBlogSettingsUpdate'));

class magnificPopupBehaviors
{
	public static function adminBlogPreferencesForm($core,$settings)
	{
		$settings->addNameSpace('magnificpopup');
		echo
		'<div class="fieldset"><h4>magnific-popup</h4>'.
		'<p><label class="classic">'.
		form::checkbox('magnific_popup_enabled','1',$settings->magnificpopup->enabled).
		__('Enable magnific-popup').'</label></p>'.
		'</div>';
	}

	public static function adminBeforeBlogSettingsUpdate($settings)
	{
		$settings->addNameSpace('magnificpopup');
		$settings->magnificpopup->put('enabled',!empty($_POST['magnific_popup_enabled']),'boolean');
	}
}

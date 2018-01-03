<?php
/**
 * @package     Thomisticus.Library
 * @subpackage  Helper
 *
 * @copyright   Copyright (C) 2017-2021 Igor Moraes. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

/**
 * Mail helper
 *
 * @package     Thomisticus.Library
 * @subpackage  Helper
 * @since       1.0
 */
abstract class ThomisticusHelperTemplate
{
	/**
	 * Returns the data of a specific template, already making its parameters an JRegistry's instance
	 *
	 * @param $data ['id' => 123]
	 *
	 * @return mixed
	 */
	public static function getTemplateStyleData($data)
	{
		if (empty($data)) {
			return false;
		}

		$template = ThomisticusHelperModel::select('#__template_styles', '*', $data, 'Object');

		if (!empty($template->params)) {
			$template->params = new JRegistry($template->params);
		}

		return $template;
	}
}

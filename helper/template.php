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
 * Template Helper
 *
 * @package     Thomisticus.Library
 * @subpackage  Helper
 * @since       1.0
 */
abstract class ThomisticusHelperTemplate
{

	/**
	 * Retrieves template's alias by active menu
	 *
	 * @return string|null  Template name on success, false on failure.
	 *
	 * @since version
	 */
	public static function getTemplateAliasByMenu()
	{
		$app  = JFactory::getApplication();
		$menu = $app->getMenu();

		if (!empty($menu)) {
			if ($menuActive = $menu->getActive()) {
				if ($idStyle = $menuActive->template_style_id) {
					return ThomisticusHelperTemplate::getTemplateStyle($idStyle)->template;
				}
			}
		}

		return false;
	}

	/**
	 * Method to get a single record of #__template_styles
	 *
	 * @param   integer $pk The id of the primary key.
	 *
	 * @return  mixed  Object on success, false on failure.
	 */
	public static function getTemplateStyle($pk = null)
	{
		$templateStyle = null;

		if (!empty($pk)) {
			$templateStyle = ThomisticusHelperModel::select('#__template_styles', ['id', 'template', 'client_id', 'home', 'title', 'params'], ['id' => $pk], 'Object');

			if (!empty($templateStyle->params)) {
				$templateStyle->params = new JRegistry($templateStyle->params);
			}

		}

		return $templateStyle;
	}
}

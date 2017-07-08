<?php
/**
 * @package     Thomisticus.Library
 * @subpackage  Helper
 *
 * @copyright   Copyright (C) 2017-2021 Igor Moraes. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

use Thomisticus\Utils\Arrays;

defined('_JEXEC') or die;

/**
 * Asset helper
 *
 * @package     Thomisticus.Library
 * @subpackage  Helper
 * @since       1.0
 */
abstract class ThomisticusHelperComponent
{
	/**
	 * Gets the item's edit permission for an user in a specific component.
	 *
	 * (Method overrided from Component Creator and generalized)
	 *
	 * @param  mixed $item          The item
	 * @param string $componentName The component name (will be picked up automatically from application if not provided)
	 *
	 * @return bool
	 */
	public static function canUserEdit($item, $componentName = '')
	{
		$user = JFactory::getUser();

		if (empty($componentName))
		{
			$componentName = JFactory::getApplication()->input->get('option');
		}

		if ($user->authorise('core.edit', $componentName) ||
			isset($item->created_by) && $item->created_by == $user->id && $user->authorise('core.edit.own', $componentName)
		)
		{
			return true;
		}

		return false;
	}
}

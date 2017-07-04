<?php
/**
 * @package     Thomisticus
 * @subpackage  Library
 *
 * @copyright   Copyright (C) 2017-2021 Igor Moraes. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

namespace Thomisticus\Helper;

use JFactory;

defined('_JEXEC') or die;

/**
 * Application helper class
 *
 */
class Component
{
	/**
	 * Gets the item's edit permission for an user in a specific component.
	 *
	 * (Method overrided from Component Creator and generalized)
	 *
	 * @param  mixed $item The item
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

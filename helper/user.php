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
 * Asset helper
 *
 * @package     Thomisticus.Library
 * @subpackage  Helper
 * @since       1.0
 */
abstract class ThomisticusHelperUser
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

		if (empty($componentName)) {
			$componentName = JFactory::getApplication()->input->get('option');
		}

		if (!$user->guest && ($user->authorise('core.edit', $componentName) || isset($item->created_by) && $item->created_by == $user->id && $user->authorise('core.edit.own', $componentName))) {
			return true;
		}

		return false;
	}

	/**
	 * Retrieves a list of all Joomla Usergroup's titles. But if provided $id, it'll retrieves this case and its sons.
	 *
	 * @param null|string|integer $idUsergroup Optional
	 *
	 * @return array in the format ['id' => 'title']
	 *
	 * @since version
	 */
	public static function getUserGroupList($idUsergroup = null)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		$query->select($db->quoteName(['id', 'title']))
		    ->from($db->quoteName('#__usergroups'));

		if (!empty($idUsergroup)) {
			$query->where($db->quoteName('id') . ' = '. $db->quote($idUsergroup) . ' OR ' . $db->quoteName('parent_id') . ' = ' . $idUsergroup);
		}

		$query->order('id ASC');

		$results = $db->setQuery($query)->loadObjectList();

		$groups = [];
		foreach ($results as $group) {
			$groups[$group->id] = $group->title;
		}

		return $groups;
	}

	/**
	 * Retrieves a base64 encoded url to be used as return after user authentication (&return=foo)
	 *
	 * @param string $url
	 */
	public static function generateReturnUrl($url)
	{
		return base64_encode(htmlspecialchars_decode($url));
	}

}

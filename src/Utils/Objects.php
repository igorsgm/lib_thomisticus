<?php
/**
 * @package     Thomisticus
 * @subpackage  Html
 *
 * @copyright   Copyright (C) 2017-2021 Igor Moraes. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

namespace Thomisticus\Utils;

defined('_JEXEC') or die;


class Objects
{
	/**
	 * Check if multiple properties exists in an object (even if it's null)
	 *
	 * @param \stdClass    $object     Object to be verified
	 * @param array|string $properties String array of properties or a single property
	 *
	 * @return bool true if all properties belongs to the object
	 */
	public static function propertyExists($object, $properties)
	{
		if (!is_array($properties))
		{
			return property_exists($object, $properties);
		}

		$allPropertiesExists = false;
		foreach ($properties as $property)
		{
			$allPropertiesExists = property_exists($object, $property);
		}

		return $allPropertiesExists;
	}
}

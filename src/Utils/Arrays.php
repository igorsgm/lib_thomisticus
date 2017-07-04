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


class Arrays
{
	/**
	 * Remove multiple elements in an array
	 *
	 * @param array $array            Array that will have the elements removed
	 * @param array $elementsToRemove Array with elements to be removed
	 *
	 * @return array
	 */
	public static function remove($array, $elementsToRemove)
	{
		return array_diff_key($array, array_flip($elementsToRemove));
	}

	/**
	 * Check if an array contains all elements from another array
	 *
	 * @param array $array            array that supposedly contains all elements
	 * @param bool  $arrayOnlyKeys    true to consider only array_keys
	 * @param array $subArray         array to be searched
	 * @param bool  $subArrayOnlyKeys true to consider only array_keys
	 *
	 * @return bool true if all elements|keys of $subArray are an element|key of $array
	 */
	public static function insideAnother($array, $arrayOnlyKeys = false, $subArray, $subArrayOnlyKeys = false)
	{
		if ($arrayOnlyKeys)
		{
			$array = array_keys($array);
		}

		if ($subArrayOnlyKeys)
		{
			$subArray = array_keys($subArray);
		}

		return count(array_intersect($subArray, $array)) == count($subArray);
	}
}

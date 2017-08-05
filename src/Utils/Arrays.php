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
	 * @param array $elementsToRemove Array with element keys to be removed
	 *
	 * @return array
	 */
	public static function remove($array, $elementsToRemove)
	{
		return array_diff_key($array, array_flip($elementsToRemove));
	}

	/**
	 * Remove multiple elements in an array by value
	 *
	 * @param array        $array    Array that will have the element removed
	 * @param array|string $toRemove Array with elements to be removed or single string (value) to be removed
	 *
	 * @return array
	 */
	public static function removeByValues($array, $toRemove)
	{
		if (is_array($toRemove))
		{
			$keysToRemove = array();
			foreach ($toRemove as $element)
			{
				if (($key = array_search($element, $array)) !== false)
				{
					array_push($keysToRemove, $key);
				}
			}

			$array = self::remove($array, $keysToRemove);
		}
		else
		{
			if (($key = array_search($toRemove, $array)) !== false)
			{
				unset($array[$key]);
			}
		}

		return $array;
	}

	/**
	 * Returns the first element in an array.
	 *
	 * @param  array $array
	 *
	 * @return mixed
	 */
	public static function first(array $array)
	{
		return reset($array);
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

	/**
	 * Checks if multiple keys exist in an array
	 *
	 * @param array        $array
	 * @param array|string $keys
	 *
	 * @read https://wpscholar.com/blog/check-multiple-array-keys-exist-php/
	 * @return bool
	 */
	public static function arrayKeysExist($array, $keys)
	{
		$count = 0;
		if (!is_array($keys))
		{
			$keys = func_get_args();
			array_shift($keys);
		}
		foreach ($keys as $key)
		{
			if (array_key_exists($key, $array))
			{
				$count++;
			}
		}

		return count($keys) === $count;
	}

	/**
	 * Checks if an array is multidimensional or not
	 *
	 * @param array $array
	 *
	 * @read https://pageconfig.com/post/checking-multidimensional-arrays-in-php
	 * @return bool
	 */
	public static function isMultiDimensional($array)
	{
		rsort($array);

		return isset($array[0]) && is_array($array[0]);
	}

	/**
	 * Replaces the name of an array of attributes belonging to a given array.
	 * Where the array key is the old name of the key and the value of the new name to be assigned
	 *
	 * @param array $item           The array to be treated
	 * @param array $fromTosColumns The array with old names (key) and new names (value)
	 *                              eg: array('oldAttrName' => 'newAttrName')
	 *
	 * @return array
	 */
	public static function treatFromToColumns($item, $fromTosColumns)
	{
		foreach ($fromTosColumns as $key => $value)
		{
			if (isset($item[$key]))
			{
				$item[$value] = $item[$key];
				unset($item[$key]);
			}
		}

		return $item;
	}


	/**
	 * Replaces the values of an attribute belonging to a given array, by the values present in an multidimensional array
	 * where key is the old value and the new value to be assigned
	 *
	 * @param array $item          The array to be treated
	 * @param array $fromTosValues The multidimensional array with column and old/new values
	 *                             eg: array('name' => array('Augustine' => 'Thomas'));
	 *
	 * @return array
	 */
	public static function treatFromToValues($item, $fromTosValues)
	{
		foreach ($fromTosValues as $column => $values)
		{
			foreach ($values as $oldValue => $newValue)
			{
				if ($item[$column] == $oldValue)
				{
					$item[$column] = $newValue;
				}
			}
		}

		return $item;
	}
}

<?php
/**
 * @package     Thomisticus
 * @subpackage  Html
 *
 * @copyright   Copyright (C) 2017-2021 Igor Moraes. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

namespace Thomisticus\Utils;


class ArrayHelper
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
}
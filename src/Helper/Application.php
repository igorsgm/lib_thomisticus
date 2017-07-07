<?php
/**
 * @package     Thomisticus
 * @subpackage  Library
 *
 * @copyright   Copyright (C) 2017-2021 Igor Moraes. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

namespace Thomisticus\Helper;

defined('_JEXEC') or die;

/**
 * Application helper class
 *
 */
class Application
{
	/**
	 * Thomisticus dummy method
	 *
	 * @param   mixed $bar Variable to output
	 *
	 * @return  void
	 */
	public function foo($bar)
	{
		echo '<pre>';
		var_dump($bar);
		echo '</pre>';
	}
}

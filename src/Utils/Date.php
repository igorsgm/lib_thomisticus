<?php
/**
 * @package     Thomisticus
 * @subpackage  Html
 *
 * @copyright   Copyright (C) 2017-2021 Igor Moraes. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

namespace Thomisticus\Utils;

use DateTime;
use JFactory;

defined('_JEXEC') or die;


class Date
{

	/**
	 * Retrieves current datetime according Joomla Global Settings
	 *
	 * @return string
	 *
	 * @since version
	 */
	public static function currentDateTime()
	{
		return JFactory::getDate('now', JFactory::getConfig()->get('offset'))->toSql(true);
	}

	/**
	 * Retrieves a formatted date
	 *
	 * @param string $date
	 * @param string $format eg: 'd/m/Y - H:i'
	 *
	 * @return false|string
	 */
	public static function formatDate($date, $format)
	{
		$date = str_replace('/', '-', $date);

		return date($format, strtotime($date));
	}
}

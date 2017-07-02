<?php
/**
 * @package     Thomisticus
 * @subpackage  Html
 *
 * @copyright   Copyright (C) 2017-2021 Igor Moraes. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

namespace Thomisticus\Utils;

use JFactory;

defined('_JEXEC') or die;


class Strings
{

	/**
	 * Sanitize string returning only numbers
	 *
	 * @return  boolean
	 */
	public static function onlyNumbers($number)
	{
		return preg_replace('/\D/', '', $number);
	}


	/**
	 * Returns a translation of Joomla Language String
	 *
	 * @param  string $extension
	 * @param  string $languageString
	 *
	 * @return string
	 *
	 */
	public static function getTranslation($extension, $languageString)
	{
		JFactory::getLanguage()->load($extension, JPATH_SITE);

		return \JText::_($languageString);
	}

	/**
	 * Returns a formatted string in the Brazilian currency
	 *
	 * @param string|integer $number
	 *
	 * @return string
	 */
	public static function toReais($number)
	{
		return 'R$ ' . number_format($number, 2, ',', '.');
	}
}

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
	 * Returns a masked string. Useful for formatting cpfs, cnpj, ceps, dates*
	 *
	 * @param string $val  value to be masked, eg: 12345678910
	 * @param string $mask mask format, eg: '000.000.000-00'
	 *
	 *
	 * @return string
	 */
	public static function mask($val, $mask)
	{
		$masked = '';
		$k      = 0;

		for ($i = 0; $i <= strlen($mask) - 1; $i++)
		{
			if ($mask[$i] == '0')
			{
				if (isset($val[$k]))
				{
					$masked .= $val[$k++];
				}
			}
			else
			{
				if (isset($mask[$i]))
				{
					$masked .= $mask[$i];
				}
			}
		}

		return $masked;
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

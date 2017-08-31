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

    /**
     * To verify if a haystack string contains a target string inside
     * (Case sensitive or not)
     *
     * @param string $string        string that supposedly contains the substring
     * @param string $subString     string to be searched
     * @param bool   $caseSensitive true to treat strings as case sensitive, false otherwise
     *
     * @return bool     true if $string contains $subString
     */
    public static function contains($string, $subString, $caseSensitive = true)
    {
        if (!$caseSensitive) {
            return stripos($string, $subString) !== false;
        }

        return strpos($string, $subString) !== false;
    }


    /**
     * Returns a word in a string through its position
     * Eg: getWord('Lorem ipsum dolor', 1); // returns 'Lorem'
     *
     * @param string          $string   String separated by space
     * @param string|int|null $position The number of the word you want to be returned (starting with 0).
     *                                  or 'last' to return the last word in the string
     *
     * @return string|boolean      false if $position does not exists
     */
    public static function getWord($string, $position = null)
    {
        $words = str_word_count($string, 1);

        if (empty($position) && $position != 0) {
            return $words;
        }

        return ($position === 'last') ? end($words) : (!empty($words[$position]) ? $words[$position] : false);
    }
}

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
     * Map of special non-ASCII characters and suitable ASCII replacement
     * characters.
     *
     * Part of the URLify.php Project <https://github.com/jbroadway/urlify/>
     *
     * @see https://github.com/jbroadway/urlify/blob/master/URLify.php
     */
    public static $mapsASCII = array(
        'de' => array(/* German */
            'Ä' => 'Ae', 'Ö' => 'Oe', 'Ü' => 'Ue', 'ä' => 'ae', 'ö' => 'oe', 'ü' => 'ue', 'ß' => 'ss',
            'ẞ' => 'SS'
        ),
        'latin' => array(
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A','Ă' => 'A', 'Æ' => 'AE', 'Ç' =>
            'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I',
            'Ï' => 'I', 'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' =>
            'O', 'Ő' => 'O', 'Ø' => 'O','Ș' => 'S','Ț' => 'T', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U',
            'Ý' => 'Y', 'Þ' => 'TH', 'ß' => 'ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' =>
            'a', 'å' => 'a', 'ă' => 'a', 'æ' => 'ae', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
            'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' =>
            'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 'ø' => 'o', 'ș' => 's', 'ț' => 't', 'ù' => 'u', 'ú' => 'u',
            'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 'ÿ' => 'y'
        ),
        'latin_symbols' => array(
            '©' => '(c)',
            '®' => '(r)'
        ),
        'el' => array(/* Greek */
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y'
        ),
        'tr' => array(/* Turkish */
            'ş' => 's', 'Ş' => 'S', 'ı' => 'i', 'İ' => 'I', 'ç' => 'c', 'Ç' => 'C', 'ü' => 'u', 'Ü' => 'U',
            'ö' => 'o', 'Ö' => 'O', 'ğ' => 'g', 'Ğ' => 'G'
        ),
        'ru' => array(/* Russian */
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            '№' => ''
        ),
        'uk' => array(/* Ukrainian */
            'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G', 'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g'
        ),
        'cs' => array(/* Czech */
            'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
            'ž' => 'z', 'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T',
            'Ů' => 'U', 'Ž' => 'Z'
        ),
        'pl' => array(/* Polish */
            'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
            'ż' => 'z', 'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'O', 'Ś' => 'S',
            'Ź' => 'Z', 'Ż' => 'Z'
        ),
        'ro' => array(/* Romanian */
            'ă' => 'a', 'â' => 'a', 'î' => 'i', 'ș' => 's', 'ț' => 't', 'Ţ' => 'T', 'ţ' => 't'
        ),
        'lv' => array(/* Latvian */
            'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
            'š' => 's', 'ū' => 'u', 'ž' => 'z', 'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i',
            'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z'
        ),
        'lt' => array(/* Lithuanian */
            'ą' => 'a', 'č' => 'c', 'ę' => 'e', 'ė' => 'e', 'į' => 'i', 'š' => 's', 'ų' => 'u', 'ū' => 'u', 'ž' => 'z',
            'Ą' => 'A', 'Č' => 'C', 'Ę' => 'E', 'Ė' => 'E', 'Į' => 'I', 'Š' => 'S', 'Ų' => 'U', 'Ū' => 'U', 'Ž' => 'Z'
        ),
        'vn' => array(/* Vietnamese */
            'Á' => 'A', 'À' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A', 'Ă' => 'A', 'Ắ' => 'A', 'Ằ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'Ặ' => 'A', 'Â' => 'A', 'Ấ' => 'A', 'Ầ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ậ' => 'A',
            'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a',
            'É' => 'E', 'È' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 'Ẹ' => 'E', 'Ê' => 'E', 'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E',
            'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e', 'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e',
            'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I', 'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',
            'Ó' => 'O', 'Ò' => 'O', 'Ỏ' => 'O', 'Õ' => 'O', 'Ọ' => 'O', 'Ô' => 'O', 'Ố' => 'O', 'Ồ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O', 'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O',
            'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o', 'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o',
            'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U', 'Ư' => 'U', 'Ứ' => 'U', 'Ừ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U',
            'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u',
            'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y', 'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y',
            'Đ' => 'D', 'đ' => 'd'
        ),
        'ar' => array(/* Arabic */
            'أ' => 'a', 'ب' => 'b', 'ت' => 't', 'ث' => 'th', 'ج' => 'g', 'ح' => 'h', 'خ' => 'kh', 'د' => 'd',
            'ذ' => 'th', 'ر' => 'r', 'ز' => 'z', 'س' => 's', 'ش' => 'sh', 'ص' => 's', 'ض' => 'd', 'ط' => 't',
            'ظ' => 'th', 'ع' => 'aa', 'غ' => 'gh', 'ف' => 'f', 'ق' => 'k', 'ك' => 'k', 'ل' => 'l', 'م' => 'm',
            'ن' => 'n', 'ه' => 'h', 'و' => 'o', 'ي' => 'y'
        ),
        'sr' => array(/* Serbian */
            'ђ' => 'dj', 'ј' => 'j', 'љ' => 'lj', 'њ' => 'nj', 'ћ' => 'c', 'џ' => 'dz', 'đ' => 'dj',
            'Ђ' => 'Dj', 'Ј' => 'j', 'Љ' => 'Lj', 'Њ' => 'Nj', 'Ћ' => 'C', 'Џ' => 'Dz', 'Đ' => 'Dj'
        ),
        'az' => array(/* Azerbaijani */
            'ç' => 'c', 'ə' => 'e', 'ğ' => 'g', 'ı' => 'i', 'ö' => 'o', 'ş' => 's', 'ü' => 'u',
            'Ç' => 'C', 'Ə' => 'E', 'Ğ' => 'G', 'İ' => 'I', 'Ö' => 'O', 'Ş' => 'S', 'Ü' => 'U'
        ),
        'fi' => array(/* Finnish */
            'ä' => 'a',
            'ö' => 'o'
        ),
        'fa'=>array( /* Farsi */
            'آ'=>'aa', 'ا' => 'a', 'ب' => 'b','پ'=>'p', 'ت' => 't', 'ث' => 'th', 'ج' => 'j','چ'=>'ch', 'ح' => 'h', 'خ' => 'kh', 'د' => 'd',
           'ذ' => 'z', 'ر' => 'r', 'ز' => 'z' , 'ژ'=>'zh','س' => 's', 'ش' => 'sh', 'ص' => 's','ض'=>'z', 'د' => 'd', 'ط' => 't',
           'ظ' => 'th', 'ع' => 'aa', 'غ' => 'gh', 'ف' => 'f', 'ق' => 'gh', 'ك' => 'k', 'گ'=>'g', 'ل' => 'l', 'م' => 'm',
           'ن' => 'n', 'ه' => 'h', 'و' => 'o', 'ي' => 'y'   ,'ی'=>'y' , 'ِ'=>'e' , 'ُ'=>'o' ,'َ'=>'a'
        )
    );

    /**
     * The character map for the designated language
     *
     * @see https://github.com/jbroadway/urlify/blob/master/URLify.php
     */
    private static $mapASCII = array();

    /**
     * The character list as a string.
     *
     * @see https://github.com/jbroadway/urlify/blob/master/URLify.php
     */
    private static $chars = '';

    /**
     * The character list as a regular expression.
     *
     * @see https://github.com/jbroadway/urlify/blob/master/URLify.php
     */
    private static $regex = '';

    /**
     * The current language
     *
     * @see https://github.com/jbroadway/urlify/blob/master/URLify.php
     */
    private static $language = '';

    /**
     * Basic rules of PT-BR singularization/pluralization to Inflector.
     * Used in singularize and pluralize
     * @see https://github.com/doctrine/inflector
     */
    public static $inflectorRulesPtBr = array(
        //singular     plural
        'ão' => 'ões',
        'ao' => 'oes',
        'ês' => 'eses',
        'es' => 'eses',
        'm'  => 'ns',
        'l'  => 'is',
        'r'  => 'res',
        'x'  => 'xes',
        'z'  => 'zes',
    );

    /**
     * Exceptions to the rules of PT-BR pluralization and singularization of Inflector.
     * Used in singularize and pluralize
     * @see https://github.com/doctrine/inflector
     */
    public static $inflectorExeptionsPtBr = array(
        'cidadão'  => 'cidadãos',
        'cidadao'  => 'cidadaos',
        'mão'      => 'mãos', 'mao'      => 'maos',
        'qualquer' => 'quaisquer',
        'campus'   => 'campi',
        'lápis'    => 'lápis', 'lapis'   => 'lapis',
        'ônibus'   => 'ônibus', 'onibus' => 'onibus',
    );


	/**
	 * Initializes the character map.
	 *
	 * Part of the URLify.php Project <https://github.com/jbroadway/urlify/>
	 *
	 * @see https://github.com/jbroadway/urlify/blob/master/URLify.php
	 */
	private static function initLanguageMap($language = '')
	{
		if (count(self::$mapASCII) > 0 && (($language == '') || ($language == self::$language))) {
			return;
		}

		// Is a specific map associated with $language?
		if (isset(self::$mapsASCII[$language]) && is_array(self::$mapsASCII[$language])) {
			// Move this map to end. This means it will have priority over others
			$m = self::$mapsASCII[$language];
			unset(self::$mapsASCII[$language]);
			self::$mapsASCII[$language] = $m;
		}

		// Reset static vars
		self::$language = $language;
		self::$mapASCII = array();
		self::$chars    = '';

		foreach (self::$mapsASCII as $map) {
			foreach ($map as $orig => $conv) {
				self::$mapASCII[$orig] = $conv;
				self::$chars           .= $orig;
			}
		}

		self::$regex = '/[' . self::$chars . ']/u';
	}

	/**
	 * Checks to see if a string is utf8 encoded.
	 *
	 * NOTE: This function checks for 5-Byte sequences, UTF8
	 *       has Bytes Sequences with a maximum length of 4.
	 *
	 * Written by Tony Ferrara <http://blog.ircmaxwell.com>
	 *
	 * @param  string $string The string to be checked
	 *
	 * @return boolean
	 */
	public static function seemsUtf8($string)
	{
		if (function_exists('mb_check_encoding')) {
			// If mbstring is available, this is significantly faster than using PHP regexps.
			return mb_check_encoding($string, 'UTF-8');
		}

		// @codeCoverageIgnoreStart
		return self::seemsUtf8Regex($string);
		// @codeCoverageIgnoreEnd
	}

	/**
	 * A non-Mbstring UTF-8 checker.
	 *
	 * @param $string
	 *
	 * @return bool
	 */
	protected static function seemsUtf8Regex($string)
	{
		// Obtained from http://stackoverflow.com/a/11709412/430062
		$regex = '/(
            [\xC0-\xC1] # Invalid UTF-8 Bytes
            | [\xF5-\xFF] # Invalid UTF-8 Bytes
            | \xE0[\x80-\x9F] # Overlong encoding of prior code point
            | \xF0[\x80-\x8F] # Overlong encoding of prior code point
            | [\xC2-\xDF](?![\x80-\xBF]) # Invalid UTF-8 Sequence Start
            | [\xE0-\xEF](?![\x80-\xBF]{2}) # Invalid UTF-8 Sequence Start
            | [\xF0-\xF4](?![\x80-\xBF]{3}) # Invalid UTF-8 Sequence Start
            | (?<=[\x0-\x7F\xF5-\xFF])[\x80-\xBF] # Invalid UTF-8 Sequence Middle
            | (?<![\xC2-\xDF]|[\xE0-\xEF]|[\xE0-\xEF][\x80-\xBF]|[\xF0-\xF4]|[\xF0-\xF4][\x80-\xBF]|[\xF0-\xF4][\x80-\xBF]{2})[\x80-\xBF] # Overlong Sequence
            | (?<=[\xE0-\xEF])[\x80-\xBF](?![\x80-\xBF]) # Short 3 byte sequence
            | (?<=[\xF0-\xF4])[\x80-\xBF](?![\x80-\xBF]{2}) # Short 4 byte sequence
            | (?<=[\xF0-\xF4][\x80-\xBF])[\x80-\xBF](?![\x80-\xBF]) # Short 4 byte sequence (2)
        )/x';

		return !preg_match($regex, $string);
	}

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

		for ($i = 0; $i <= strlen($mask) - 1; $i++) {
			if ($mask[$i] == '0') {
				if (isset($val[$k])) {
					$masked .= $val[$k++];
				}
			} else {
				if (isset($mask[$i])) {
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

	/**
	 * Transliterates characters to their ASCII equivalents.
	 *
	 * Part of the URLify.php Project <https://github.com/jbroadway/urlify/>
	 *
	 * @see https://github.com/jbroadway/urlify/blob/master/URLify.php
	 *
	 * @param  string $text     Text that might have not-ASCII characters
	 * @param  string $language Specifies a priority for a specific language.
	 *
	 * @return string Filtered string with replaced "nice" characters
	 */
	public static function downCode($text, $language = '')
	{
		self::initLanguageMap($language);

		if (self::seemsUtf8($text)) {
			if (preg_match_all(self::$regex, $text, $matches)) {
				for ($i = 0; $i < count($matches[0]); $i++) {
					$char = $matches[0][$i];
					if (isset(self::$mapASCII[$char])) {
						$text = str_replace($char, self::$mapASCII[$char], $text);
					}
				}
			}
		} else {
			// Not a UTF-8 string so we assume its ISO-8859-1
			$search = "\x80\x83\x8a\x8e\x9a\x9e\x9f\xa2\xa5\xb5\xc0\xc1\xc2\xc3\xc4\xc5\xc7\xc8\xc9\xca\xcb\xcc\xcd";
			$search .= "\xce\xcf\xd1\xd2\xd3\xd4\xd5\xd6\xd8\xd9\xda\xdb\xdc\xdd\xe0\xe1\xe2\xe3\xe4\xe5\xe7\xe8\xe9";
			$search .= "\xea\xeb\xec\xed\xee\xef\xf1\xf2\xf3\xf4\xf5\xf6\xf8\xf9\xfa\xfb\xfc\xfd\xff";
			$text   = strtr($text, $search, 'EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy');

			// These latin characters should be represented by two characters so
			// we can't use strtr
			$complexSearch  = array("\x8c", "\x9c", "\xc6", "\xd0", "\xde", "\xdf", "\xe6", "\xf0", "\xfe");
			$complexReplace = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
			$text           = str_replace($complexSearch, $complexReplace, $text);
		}

		return $text;
	}

	/**
	 * Converts all accent characters to ASCII characters.
	 *
	 * If there are no accent characters, then the string given is just
	 * returned.
	 *
	 * @param  string $string   Text that might have accent characters
	 * @param  string $language Specifies a priority for a specific language.
	 *
	 * @return string Filtered  string with replaced "nice" characters
	 */
	public static function removeAccents($string, $language = '')
	{
		if (!preg_match('/[\x80-\xff]/', $string)) {
			return $string;
		}

		return self::downCode($string, $language);
	}

	/**
	 * Adds an exception to $inflectorExeptionsPtBr array
	 *
	 * @param  string $singularWord Word in the singular
	 * @param  string $pluralWord   Word in the plural
	 *
	 * @return bool
	 */
	public static function addInflectorPtBrException($singularWord, $pluralWord)
	{
		self::$inflectorExeptionsPtBr[$singularWord] = $pluralWord;

		return true;
	}

	/**
	 * Adds a rule to $inflectorRulesPtBr array
	 *
	 * @param  string $singularSufix Singular word termination
	 * @param  string $pluralSufix   Plural word termination
	 *
	 * @return bool
	 */
	public static function addInflectorPtBrRule($singularSufix, $pluralSufix)
	{
		self::$inflectorRulesPtBr[$singularSufix] = $pluralSufix;

		return true;
	}

	/**
	 * Converts a pt-BR word from the singular to the plural
	 *
	 * You can use with regular expression catch phrase expression to convert all words from a string to the singular:
	 * $text = preg_replace_callback('#[A-ZÀ-Úa-zà-ú]+(?:-[A-ZÀ-Úa-zà-ú]+)*#', 'pluralize', $text);
	 *
	 * @param string $word Singular word to be parsed
	 *
	 * @return bool|string
	 */
	public static function pluralizePtBr($word)
	{
		// Does it belong to the $inflectorExeptionsPtBr ?
		if (array_key_exists($word, self::$inflectorExeptionsPtBr)) {
			return self::$inflectorExeptionsPtBr[$word];
		}

		// It's no exception .. But does it belongs to some rule?
		foreach (self::$inflectorRulesPtBr as $singular => $plural) {
			if (preg_match("({$singular}$)", $word)) {
				return preg_replace("({$singular}$)", $plural, $word);
			}
		}

		// Does not belong to exceptions or rules
		// If it does not end with "s", add one.
		return (substr($word, -1) !== 's') ? $word . 's' : $word;
	}

	/**
	 * Converts a pt-BR word from the plural to the singular
	 *
	 * You can use with regular expression catch phrase expression to convert all words from a string to the singular:
	 * $text = preg_replace_callback('#[A-ZÀ-Úa-zà-ú]+(?:-[A-ZÀ-Úa-zà-ú]+)*#', 'singularize', $text);
	 *
	 * @param string $word Plural word to be parsed
	 *
	 * @return bool|string
	 */
	public static function singularizePtBr($word)
	{
		// Does it belong to the $inflectorExeptionsPtBr ?
		if (in_array($word, self::$inflectorExeptionsPtBr)) {
			$invert = array_flip(self::$inflectorExeptionsPtBr);

			return $invert[$word];
		}

		// It's no exception .. But does it belongs to some rule?
		foreach (self::$inflectorRulesPtBr as $singular => $plural) {
			if (preg_match("({$plural}$)", $word)) {
				return preg_replace("({$plural}$)", $singular, $word);
			}
		}

		// Does not belong to exceptions or rules
		// Delete the last char only if it is an "s" at the end
		return (substr($word, -1) == 's') ? substr($word, 0, -1) : $word;
	}

	/**
	 * Returns everything after specific substring
	 *
	 * @param string $string
	 * @param string $substring
	 *
	 * @return bool|string  false if $substring does not exists in $string
	 */
	public static function getStringAfter($string, $substring)
	{
		return (($position = strpos($string, $substring)) !== false) ? substr($string, $position + strlen($substring)) : false;
	}

	/**
	 * Checks if it is a valid cpf
	 *
	 * @param string|integer $cpf
	 *
	 * @return bool
	 */
	public static function isValidCpf($cpf)
	{
		$cpf = self::onlyNumbers($cpf);

		if (strlen($cpf) == 11 && !in_array($cpf, ['00000000000', '11111111111', '22222222222', '33333333333', '44444444444', '55555555555', '66666666666', '77777777777', '88888888888', '99999999999'])) {

			for ($t = 9; $t < 11; $t++) {
				for ($d = 0, $c = 0; $c < $t; $c++) {
					$d += $cpf{$c} * (($t + 1) - $c);
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf{$c} != $d) {
					return false;
				}
			}

			return true;
		}

		return false;
	}

	/**
	 * Checks if it is a valid cnpj
	 *
	 * @param string|integer $cnpj
	 *
	 * @return bool
	 */
	public static function isValidCnpj($cnpj)
	{
		$cnpj = self::onlyNumbers($cnpj);

		if (strlen($cnpj) == 14) {

			// Validating first check digit
			for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++) {
				$sum += $cnpj{$i} * $j;
				$j   = ($j == 2) ? 9 : $j - 1;
			}
			$rest = $sum % 11;

			if ($cnpj{12} == ($rest < 2 ? 0 : 11 - $rest)) {

				// Validating second check digit
				for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++) {
					$sum += $cnpj{$i} * $j;
					$j   = ($j == 2) ? 9 : $j - 1;
				}

				$rest = $sum % 11;

				return $cnpj{13} == ($rest < 2 ? 0 : 11 - $rest);
			}
		}

		return false;
	}
}

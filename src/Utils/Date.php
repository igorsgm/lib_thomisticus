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
use DateTimeZone;
use JFactory;

defined('_JEXEC') or die;


class Date
{
	/**
	 * Retrieves formatted datetime according Joomla Global Settings
	 *
	 * @param $time
	 *
	 * @return string
	 */
	public static function getDate($time = 'now')
	{
		return JFactory::getDate($time, JFactory::getConfig()->get('offset'))->toSql(true);
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

	/**
	 * Checks if date is empty
	 *
	 * @param string $date
	 *
	 * @return bool
	 */
	public static function isEmpty($date)
	{
		return (empty($date) || $date === '0000-00-00' || $date === '0000-00-00 00:00:00');
	}


	/**
	 * Retrieves the difference between two dates in days
	 *
	 * @param string $dateStart Start date
	 * @param string $dateEnd   End date (if empty, current datetime will be considered)
	 *
	 * @see http://php.net/manual/en/class.dateinterval.php
	 *
	 * @return int
	 */
	public static function dateDiff($dateStart, $dateEnd = 'now')
	{
		if ($dateEnd == 'now') {
			$dateEnd = self::getDate();
		}

		$interval = date_diff(date_create($dateStart), date_create($dateEnd));

		return $interval->format('%a');
	}


	/**
	 * Check if a certain date is a holiday
	 *
	 * @param string $date Date (if empty, current datetime will be considered)
	 *
	 * @return bool
	 */
	public static function isHoliday($date = '')
	{
		if (self::isEmpty($date)) {
			$date = self::getDate();
		}

		//Alguns dos principais feriados nacionais
		$holidays = [
			'01-01', //Confraternização Universal',
			//'00-00', //Carnaval
			//'00-00', //Sexta-feira da Paixão //TODO implementar algoritmo para descobrir as outras datas
			//'00-00', //Páscoa
			'21-04', //Tiradentes
			'01-05', //Dia do Trabalhador
			//'00-00', //Corpus Christi
			'07-07', //Dia da Pátria
			'12-10', //Nossa Senhora Aparecida
			'02-11', //Finados
			'15-11', //Proclamação da República
			'25-12', //Natal
		];

		$dateEaster = self::findEaster(self::formatDate($date, 'Y'));
		$holidays[] = self::formatDate($dateEaster, 'd-m');

		return in_array(self::formatDate($date, 'd-m'), $holidays);
	}


	/**
	 * Finds the Easter date of a specific year
	 *
	 * @param int $year Specific year (if empty, current year will be considered)
	 *
	 * @see http://php.net/manual/en/function.easter-date.php
	 *
	 * @return string $date
	 */
	public static function findEaster($year = null)
	{
		if (is_null($year)) {
			$year = self::formatDate(self::getDate(), 'Y');
		}

		$date = new DateTime('now', new DateTimeZone('UTC'));
		$date->setTimestamp(easter_date($year));

		return $date->format('d-m-Y');
	}


	/**
	 * Number of weekends between two dates
	 *
	 * @param string $dateStart start date
	 * @param string $dateEnd   End date
	 *
	 * @see http://php.net/manual/pt_BR/calendar.constants.php
	 *
	 * @return int
	 */
	public static function countWeekends($dateStart = '', $dateEnd = '')
	{
		$numberOfWeekends = 0;

		if (self::isEmpty($dateStart)) {
			$date = self::getDate();
		}

		if (self::isEmpty($dateEnd)) {
			$date = self::getDate();
		}

		$datetimeStart = new DateTime($dateStart);
		$datetimeEnd   = new DateTime($dateEnd);

		if ($datetimeStart > $datetimeEnd) {
			$date          = $datetimeStart;
			$datetimeStart = $datetimeEnd;
			$datetimeEnd   = $date;
		}

		do {

			$day = jddayofweek(cal_to_jd(CAL_GREGORIAN, $datetimeStart->format('m'), $datetimeStart->format('d'), $datetimeStart->format('Y')), 0);

			//Sunday or Saturday
			if (($day === 0) || ($day === 6)) {
				$numberOfWeekends++;
				$datetimeStart->modify('+7 days'); //add +7 days
				continue;
			}

			$datetimeStart->modify('+1 day'); //add +1 day

		} while ($datetimeStart < $datetimeEnd);

		return $numberOfWeekends;
	}


	/**
	 * Check if the informed date is Saturday or Sunday (weekend)
	 *
	 * @param string $date Date to check
	 *
	 * @see http://php.net/manual/pt_BR/calendar.constants.php
	 *
	 * @return bool
	 */
	public static function isWeekend($date = '')
	{
		if (self::isEmpty($date)) {
			$date = self::getDate();
		}

		$day = jddayofweek(cal_to_jd(CAL_GREGORIAN, self::formatDate($date, 'm'), self::formatDate($date, 'd'), self::formatDate($date, 'Y')), 0);

		//Saturday or Sunday
		if (($day == 6) || ($day == 0)) {
			return true;
		}

		return false;
	}
}

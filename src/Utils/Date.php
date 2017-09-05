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
}

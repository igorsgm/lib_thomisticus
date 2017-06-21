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


class Ajax
{

	/**
	 * Check valid AJAX request
	 *
	 * @return  boolean
	 */
	public static function isAjaxRequest()
	{
		$app = \JFactory::getApplication();

		return strtolower($app->input->server->get('HTTP_X_REQUESTED_WITH', '')) == 'xmlhttprequest';
	}
}
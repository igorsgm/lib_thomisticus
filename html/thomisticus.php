<?php
/**
 * @package     Thomisticus.Library
 * @subpackage  Html
 *
 * @copyright   Copyright (C) 2017-2021 Igor Moraes. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */

defined('_JEXEC') or die;

/**
 * Html css class.
 *
 * @package     Thomisticus.Library
 * @subpackage  Html
 * @since       1.0
 */
abstract class JHtmlThomisticus
{
	/**
	 * Extension name to use in the asset calls
	 * Basically the media/com_xxxxx folder to use
	 */
	const EXTENSION = 'thomisticus';

	/**
	 * Array containing information for loaded files
	 *
	 * @var  array
	 */
	protected static $loaded = array();

	/**
	 * Load fontawesome 4.
	 *
	 * @return  void
	 */
	public static function fontawesome()
	{
		if (!empty(static::$loaded[__METHOD__]))
		{
			return;
		}

		ThomisticusHelperAsset::load('vendor/font-awesome/font-awesome.min.css', self::EXTENSION);

		static::$loaded[__METHOD__] = true;
	}

	/**
	 * Load BootstrapWizard
	 *
	 * @return  void
	 */
	public static function bootstrapWizard()
	{
		if (!empty(static::$loaded[__METHOD__]))
		{
			return;
		}

		ThomisticusHelperAsset::load('vendor/bootstrapWizard/jquery.bootstrap.wizard.min.js', self::EXTENSION);

		static::$loaded[__METHOD__] = true;
	}

	/**
	 * Load BootstrapWizard
	 *
	 * @return  void
	 */
	public static function formValidation()
	{
		if (!empty(static::$loaded[__METHOD__]))
		{
			return;
		}

		ThomisticusHelperAsset::load('vendor/formValidation/formValidation.min.css', self::EXTENSION);
		ThomisticusHelperAsset::load('vendor/formValidation/formValidation.min.js', self::EXTENSION);
		ThomisticusHelperAsset::load('vendor/formValidation/framework/bootstrap.min.js', self::EXTENSION);
		ThomisticusHelperAsset::load('vendor/formValidation/language/pt_BR.js', self::EXTENSION);

		static::$loaded[__METHOD__] = true;
	}

	public static function mask()
	{
		if (!empty(static::$loaded[__METHOD__]))
		{
			return;
		}

		ThomisticusHelperAsset::load('vendor/mask/jquery.mask.min.js', self::EXTENSION);

		static::$loaded[__METHOD__] = true;
	}

}

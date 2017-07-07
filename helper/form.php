<?php
/**
 * @package     Thomisticus.Library
 * @subpackage  Helper
 *
 * @copyright   Copyright (C) 2017-2021 Igor Moraes. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

use Thomisticus\Utils\Arrays;

defined('_JEXEC') or die;

/**
 * Form helper
 *
 * @package     Thomisticus.Library
 * @subpackage  Helper
 * @since       1.0
 */
abstract class ThomisticusHelperForm
{
	/**
	 * Upload multiple or single file of JForm and retrieves file name
	 *
	 * @param string $inputName   File input name (eg: if input form name is jform[image], enter "image")
	 * @param string $folderPath  Directory path that will store files - without URL! (eg: 'media/com_myextension/images/')
	 * @param string $maxFileSize Max file size allowed (eg: '2K', '2M') -> it will be automatically converted to bytes
	 * @param string $okMIMETypes Allowed MIME Types separated by comma (eg: 'image/jpg,image/jpeg,image/png')
	 *
	 * @return string
	 */
	public static function uploadFiles($inputName, $folderPath, $maxFileSize, $okMIMETypes)
	{
		$app = JFactory::getApplication();
		jimport('joomla.filesystem.file');

		$files        = $app->input->files->get('jform', array(), 'raw');
		$files        = $files[$inputName];
		$array        = $app->input->get('jform', array(), 'ARRAY');
		$files_hidden = $array[$inputName . '_hidden'];


		if (!Arrays::isMultiDimensional($files))
		{
			$singleFile = $files;
			unset($files);
			$files[0] = $singleFile;
		}

		$filesString = '';
		if ($files[0]['size'] > 0)
		{
			$oldFiles = explode(',', $files_hidden);

			//Delete existing files
			foreach ($oldFiles as $f)
			{
				JFile::delete($folderPath . $f);
			}

			foreach ($files as $file)
			{
				$fileName = '';

				// Checking errors
				if (isset($file['error']) && $file['error'] == 4)
				{
					$fileName = $array[$inputName];
				}
				elseif (ThomisticusHelperFile::checkServerFileErrors($file))
				{
					return false;
				}

				// Check for filetype and size
				if (ThomisticusHelperFile::validateFile($file, $maxFileSize, $okMIMETypes))
				{
					$fileName = ThomisticusHelperFile::treatFileName($file);

					$uploadPath = $folderPath . $fileName;
					$fileTemp   = $file['tmp_name'];

					ThomisticusHelperFile::uploadFile($uploadPath, $fileTemp);
				}

				if (!empty($fileName))
				{
					$filesString .= !empty($filesString) ? "," : "";
					$filesString .= $fileName;
				}
			}
		}
		elseif (isset($files_hidden))
		{
			$filesString = $files_hidden;
		}

		return $filesString;
	}
}

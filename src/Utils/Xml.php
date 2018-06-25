<?php
/**
 * @package     Thomisticus
 * @subpackage  Html
 *
 * @copyright   Copyright (C) 2017-2021 Igor Moraes. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

namespace Thomisticus\Utils;

use DOMElement;

defined('_JEXEC') or die;

class Xml extends \DOMDocument
{
	/**
	 * Constructs elements and texts from an array or string
	 * The array can contain an element's name in the index part and an element's text in the value part
	 *
	 * It can also creates an XML with the same element tagname on the same level
	 *
	 * Eg:
	 * <NODES>
	 *   <NODE>TEXT</NODE>
	 *   <NODE>
	 *     <FIELD>HELLO</FIELD>
	 *     <FIELD>WORLD</FIELD>
	 *   </NODE>
	 * </NODES>
	 *
	 * Array should look like:
	 *
	 * array (
	 *   "NODES" => array (
	 *     "NODE" => array (
	 *       0 => "TEXT"
	 *       1 => ARRAY (
	 *         "FIELD" => array (
	 *           0 => "HELLO"
	 *           1 => "WORLD"
	 *         )
	 *       )
	 *     )
	 *   )
	 * )
	 *
	 * @param                 $mixed
	 * @param DOMElement|null $domElement the element from where the array will be construct to
	 */
	public function fromMixed($mixed, DOMElement $domElement = null)
	{

		$domElement = is_null($domElement) ? $this : $domElement;

		if (is_array($mixed)) {
			foreach ($mixed as $index => $mixedElement) {

				if (is_int($index)) {
					if ($index == 0) {
						$node = $domElement;
					} else {
						$node = $this->createElement($domElement->tagName);
						$domElement->parentNode->appendChild($node);
					}
				} else {
					$node = $this->createElement($index);
					$domElement->appendChild($node);
				}

				$this->fromMixed($mixedElement, $node);

			}
		} else {
			$domElement->appendChild($this->createTextNode($mixed));
		}

	}
}

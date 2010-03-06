<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Andreas Schempp 2009
 * @author     Andreas Schempp <andreas@schempp.ch
 * @license    LGPL
 */


class LicenseWidget extends Widget
{
	/**
	 * Submit user input
	 * @var boolean
	 */
	protected $blnSubmitInput = true;

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_widget';
	
	
	/**
	 * Add specific attributes
	 * @param string
	 * @param mixed
	 */
	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
			case 'mandatory':
				$this->arrConfiguration['mandatory'] = $varValue ? true : false;
				break;

			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}
	
	
	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
        return sprintf('<div id="ctrl_%s" class="tl_checkbox_container%s">%s<input type="checkbox" name="%s" id="opt_%s" class="tl_checkbox" value="1"%s%s onfocus="Backend.getScrollOffset();" /> <label for="opt_%s">%s</label></div>',
						$this->strId,
						(strlen($this->strClass) ? ' ' . $this->strClass : ''),
						($this->varValue ? '' : $this->license[0] . '<br />'),
						$this->strName,
						$this->strId,
						(($this->varValue == 1) ? ' checked="checked"' : ''),
						$this->getAttributes(),
						$this->strId,
						$this->license[1]);
	}
}
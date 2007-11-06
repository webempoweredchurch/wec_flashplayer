<?php
/***************************************************************
* Copyright notice
*
* (c) 2006 Foundation for Evangelism
* All rights reserved
*
* This file is part of the Web-Empowered Church (WEC)
* (http://webempoweredchurch.org) ministry of the Foundation for Evangelism
* (http://evangelize.org). The WEC is developing TYPO3-based
* (http://typo3.org) free software for churches around the world. Our desire
* is to use the Internet to help offer new life through Jesus Christ. Please
* see http://WebEmpoweredChurch.org/Jesus.
*
* You can redistribute this file and/or modify it under the terms of the
* GNU General Public License as published by the Free Software Foundation;
* either version 2 of the License, or (at your option) any later version.
*
* The GNU General Public License can be found at
* http://www.gnu.org/copyleft/gpl.html.
*
* This file is distributed in the hope that it will be useful for ministry,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* This copyright notice MUST APPEAR in all copies of the file!
***************************************************************/

/** 
 * Wrapper class for the FlashObject Javascript library.
 *
 * @author		Web-Empowered Church Team <flashplayer@webempoweredchurch.org>
 */


/** 
 * Wrapper class for the FlashObject Javascript library.  Provides a PHP object
 * and method to generate client-side Javascript for embedding Flash movies.
 *
 * @author		Web-Empowered Church Team <flashplayer@webempoweredchurch.org>
 * @package		TYPO3
 * @subpackage	tx_wecflashplayer
 */
class tx_wecflashplayer_flashobject {
	
	var $flashObject;
	var $flashObjectVariables;
	var $flashObjectWrite;
	var $flashObjectPath;
	
	
	/*
	 * Constructor for the FlashObject.  Builds the main FlashObject in Javascript.
	 * @param	string	The path to the Flash movie.
	 * @param	string	The name of the Flash movie.
	 * @param	string	The width of the Flash movie.
	 * @param	string	The height of the Flash movie.
	 * @param	string	The version of the Flash Player required
	 * @param	string	The background color of the Flash movie.
	 * @param	string	The path to the FlashObject javascript.
	 */
	function tx_wecflashplayer_flashobject($flashMoviePath, $name, $width, $height, $version, $bgColor, $flashObjectPath) {
		$this->flashObjectVariables =array();
		$this->flashObjectPath = $flashObjectPath;
		
		$this->flashObject = "var fo = new FlashObject('".$flashMoviePath."', 'flash', '".$width."', '".$height."', '8', '".$bgColor."');";
	}
	
	/*
	 * Adds a variable to be passed to the Flash movie.
	 * @param	string	The name of the variable.
	 * @param	string	The value of the variable.
	 * @return	null
	 */
	function addVariable($var, $value) {
		$this->flashObjectVariables[] = "fo.addVariable(escape('".addslashes($var)."'), escape('".addSlashes($value)."'));";		
	}
	
	/*
	 * Adds a parameter to be passed to the Flash movie.
	 * @param	string	The name of the parameter.
	 * @param	string	The value of the parameter.
	 */
	function addParameter($var, $value) {
		$this->flashObjectVariables[] = "fo.addParam(escape('".addslashes($var)."'), escape('".addSlashes($value)."'));";		
	}
	
	/*
	 * Sets the DOM ID that FlashObject will write to.
	 * @param	string	 The ID to be replaced.
	 * @return	null
	 */
	function write($id) {
		$this->flashObjectWrite = "fo.write('".$id."');";
	}
	
	
	/*
	 * Generates the Javascript output for FlashObject.
	 * @return	string	Javascript output of FlashObject.
	 */
	function output() {
		
		$GLOBALS['TSFE']->additionalHeaderData['tx_wecflashplayer_flashobject'] = '<script type="text/javascript" src="'.$this->flashObjectPath.'swfobject.js"></script>';		
				
		$output .= $this->flashObject.chr(10);
		$output .= implode(chr(10), $this->flashObjectVariables).chr(10);
		$output .= $this->flashObjectWrite.chr(10);
		
		return t3lib_div::wrapJS($output);
	}
}



if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/wec_flashplayer/class.tx_wecflashplayer_flashobject.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/wec_flashplayer/class.tx_wecflashplayer_flashobject.php"]);
}

?>
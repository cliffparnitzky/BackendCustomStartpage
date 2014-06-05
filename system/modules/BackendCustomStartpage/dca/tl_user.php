<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2014 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2014
 * @author     Cliff Parnitzky
 * @package    BackendCustomStartpage
 * @license    LGPL
 */

/**
 * Adding the custom start page to the login pallet of the user
 */
$GLOBALS['TL_DCA']['tl_user']['palettes']['login'] .= ';{backendCustomStartpage_legend},backendCustomStartpage';

/**
 * Adding the fields
 */
$GLOBALS['TL_DCA']['tl_user']['fields']['backendCustomStartpage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user']['backendCustomStartpage'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_user_customStartPage', 'getBackendModules'),
	'reference'               => &$GLOBALS['TL_LANG']['MOD'],
	'eval'                    => array('tl_class'=>'w50', 'includeBlankOption'=>true)
);


/**
 * Class tl_user_customStartPage
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Cliff Parnitzky 2014
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class tl_user_customStartPage extends Backend
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User'); 
	}

	/**
	 * Returns all possible backend modules
	 */
	public function getBackendModules()
	{
		$arrayBackendModules = array();
		foreach ($GLOBALS['BE_MOD'] as $strGroup=>$arrModules)
		{
			foreach (array_keys($arrModules) as $strModule)
			{
				if ($this->User->hasAccess($strModule, 'modules'))
				{
					$arrayBackendModules[$strGroup][$strModule] = $strModule;
				}
			}
		}
		return $arrayBackendModules;
	}
}

?>
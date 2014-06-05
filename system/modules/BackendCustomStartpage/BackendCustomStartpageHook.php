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
 * Class BackendCustomStartpageHook
 *
 * Special hook implementation for redirect to the custom startpage
 * @copyright  Cliff Parnitzky 2014
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class BackendCustomStartpageHook extends Backend 
{
	/**
	 * Execute postLogin hook to redirect to the custom startpage
	 */
	public function redirectToCustomStartpage (User $objUser)
	{
		if ($objUser instanceof BackendUser && (strlen($objUser->backendCustomStartpage) > 0) && $objUser->hasAccess($objUser->backendCustomStartpage, 'modules'))
		{
			$this->redirect('contao/main.php?do=' . $objUser->backendCustomStartpage);
		}
	}
}
?>

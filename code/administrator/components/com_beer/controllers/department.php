<?php
/**
 * Business Enterprise Employee Repository (B.E.E.R)
 * 
 * @version		$Id$
 * @package		Beer
 * @copyright	Copyright (C) 2009 Nooku. All rights reserved.
 * @license 	GNU GPLv2 <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html>
 * @link     	http://www.nooku.org
 */

/**
 * Department Controller
 *
 * @package		Beer
 */
class BeerControllerDepartment extends BeerControllerAbstract
{
	/**
	 * Filter input values, modify request
	 *
	 * @params	Arguments
	 * @return 	void
	 */
	public function filterInput(ArrayObject $args)
	{
		$alias 			= KRequest::get('post.alias', 'ascii');
		$title 			= KRequest::get('post.title', 'string');
		$description	= KRequest::get('post.description', 'raw' );

		if(empty($alias)) {
			$alias = KRequest::get('post.title', 'ascii');
		}

		KRequest::set('post.alias', $alias);
		KRequest::set('post.description', $description);
	}
}
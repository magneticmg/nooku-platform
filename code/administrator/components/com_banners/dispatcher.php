<?php
/**
 * @version		$Id$
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Banners
 * @copyright	Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

/**
 * Banners Dispatcher Class
 *   
 * @author    	Jeremy Wilken <http://nooku.assembla.com/profile/gnomeontherun>
 * @category 	Nooku
 * @package     Nooku_Server
 * @subpackage  Banners
 */

class ComBannersDispatcher extends ComDefaultDispatcher
{
	public function _actionAuthorize(KCommandContext $context)
	{
	    $result = parent::_actionAuthorize($context);
	    
	    if(!JFactory::getUser()->authorize( 'com_weblinks', 'manage' ))
	    {
	        throw new KDispatcherException(JText::_('ALERTNOTAUTH'), KHttpResponse::FORBIDDEN);
            $result = false;
	    }
	    
	    return $result;
	}
}
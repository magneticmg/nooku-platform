<?php
/**
 * @version     $Id: pages.php 3030 2011-10-09 13:21:09Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Pages
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Component Loader
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Pages
 */

/*if (!JFactory::getUser()->authorize( 'com_pages', 'manage' )) {
    JFactory::getApplication()->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
}*/

echo KService::get('com://admin/pages.dispatcher')->dispatch();
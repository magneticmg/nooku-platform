<?php
/**
 * @version     $Id$
 * @package     Nooku_Server
 * @subpackage  Pages
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Menus Html View Class
 *   
 * @author    	Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @package     Nooku_Server
 * @subpackage  Pages
 */
class ComPagesViewMenusHtml extends ComDefaultViewHtml
{
    public function display()
    {
        $applications = array_keys($this->getIdentifier()->getApplications());
        $this->assign('applications', $applications);
        
        return parent::display();
    }
}
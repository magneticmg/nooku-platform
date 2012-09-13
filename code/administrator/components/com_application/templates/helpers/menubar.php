<?php
/**
 * @version     $Id: menubar.php 4813 2012-08-21 02:25:31Z johanjanssens $
 * @package     Nooku_Server
 * @subpackage  Application
 * @copyright   Copyright (C) 2007 - 2012 Johan Janssens. All rights reserved.
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Template Menubar Helper
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @package     Nooku_Server
 * @subpackage  Application
 */
class ComApplicationTemplateHelperMenubar extends KTemplateHelperAbstract
{
 	/**
     * Render the menubar
     *
     * @param   array   An optional array with configuration options
     * @return  string  Html
     */
    public function render($config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'attribs' => array('class' => array())
        ));
        
        $result = '';
        
        $menus = $this->getService('com://admin/pages.model.menus')
            ->application('admin')
            ->getList();
        
        $menu = $menus->find(array('slug' => 'menubar'));
        
        if(count($menu))
        {
            $pages  = $this->getService('application.pages')->find(array('pages_menu_id' => $menu->top()->id));
            $result = $this->getService('com://admin/pages.template.helper.list')->pages(array('pages' => $pages, 'attribs' => $config->attribs));
        }   

        return $result;
    }
}
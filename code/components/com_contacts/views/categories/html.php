<?php
/**
 * @version		$Id: html.php 3532 2012-04-02 12:00:49Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Weblinks
 * @copyright	Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

/**
 * Categories Html View
 *
 * @author    	Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category 	Nooku
 * @package     Nooku_Server
 * @subpackage  Contacts
 */
class ComContactsViewCategoriesHtml extends ComDefaultViewHtml
{
	public function display()
	{
		$params = JFactory::getApplication()->getParams();

		if ($params->get('image') != -1)
		{
			if($params->get('image_align') != "") {
			    $attribs['align'] = $params->get('image_align');
			}
			
			$attribs['hspace'] = 6;
			$attribs['title']  = JText::_('Web Links');

			$image['src']     = KRequest::base().'/images/stories/'.$params->get('image');
			$image['attribs'] = $attribs;
			
			$this->assign('image', $image);
		}

		$this->assign('params', $params);

		return parent::display();
	}
}
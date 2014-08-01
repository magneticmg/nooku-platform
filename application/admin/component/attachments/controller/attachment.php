<?php
/**
 * Nooku Platform - http://www.nooku.org/platform
 *
 * @copyright	Copyright (C) 2011 - 2013 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		git://git.assembla.com/nooku-framework.git for the canonical source repository
 */

use Nooku\Library;
use Nooku\Component\Attachments;

/**
 * Attachment Controller
 *
 * @author  Johan Janssens <http://github.com/johanjanssens>
 * @package Component\Attachments
 */
class AttachmentsControllerAttachment extends Attachments\ControllerAttachment
{
	protected function _initialize(Library\ObjectConfig $config)
	{
		$config->append(array(
            'behaviors' => array(
                'editable', 'persistable',
            ),
            'model' => 'com:attachments.model.attachments'
		));
		
		parent::_initialize($config);
	}
}
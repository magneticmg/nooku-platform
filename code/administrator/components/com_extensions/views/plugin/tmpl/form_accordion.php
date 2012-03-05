<?php 
/**
 * @version     $Id$
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Modules
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<? $group	= isset($group) ? $group : '_default' ?>

<? if($html = $params->render('params', $group)) : ?>
	<?= $html ?>
<? else : ?>
	<div style="text-align: center; padding: 5px;">
		<?= @text('There are no parameters for this item') ?>
	</div>
<? endif ?>

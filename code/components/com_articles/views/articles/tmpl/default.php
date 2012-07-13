<?php
/**
 * @version        $Id$
 * @package        Nooku_Server
 * @subpackage     Articles
 * @copyright      Copyright (C) 2009 - 2012 Timble CVBA and Contributors. (http://www.timble.net)
 * @license        GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link           http://www.nooku.org
 */
defined('KOOWA') or die('Restricted access');
?>


<? echo @template('list'); ?>

<? echo @helper('com://site/articles.template.helper.rss.link'); ?>

<? echo (count($articles) == $total) ? '' : @helper('paginator.pagination', array(
    'total'      => $total,
    'show_limit' => false)); ?>

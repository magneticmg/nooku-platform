<?php
/**
 * @package     Nooku_Server
 * @subpackage  Articles
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
?>

<!--
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://lib_koowa/css/koowa.css" />
-->
<?= @helper('behavior.sortable') ?>

<?= @template('com://admin/default.view.grid.toolbar'); ?>

<? if($articles->isTranslatable()) : ?>
    <ktml:module position="toolbar" content="append">
        <?= @helper('com://admin/languages.template.helper.listbox.languages') ?>
    </ktml:module>
<? endif ?>

<ktml:module position="sidebar">
    <?= @template('default_sidebar'); ?>
</ktml:module>

<ktml:module position="inspector">
    <?= @template('com://admin/activities.view.activities.simple', array('package' => 'articles', 'name' => 'article')); ?>
</ktml:module>

<form action="" method="get" class="-koowa-grid">
    <?= @template('default_scopebar'); ?>
    <table>
        <thead>
            <tr>
                <? if($state->category) : ?><th class="handle"></th><? endif ?>
                <th width="10">
                	 <?= @helper('grid.checkall') ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'title')) ?>
                </th>
                <th width="20">
                    <?= @helper('grid.sort', array('column' => 'published', 'title' => 'Published')) ?>
                </th>
                <? if($state->category) : ?>
                <th width="7%">
                    <?= @helper('grid.sort', array('title' => 'Order', 'column' => 'ordering')) ?>
                </th>
                <? endif; ?>
                <th width="20%">
                    <?= @helper('grid.sort', array('title' => 'Created', 'column' => 'created_on')) ?>
                </th>
                <? if($articles->isTranslatable()) : ?>
                    <th width="70">
                        <?= @text('Translation') ?>
                    </th>
                <? endif ?>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="7">
                    <?= @helper('paginator.pagination', array('total' => $total)) ?>
                </td>
            </tr>
        </tfoot>
        <tbody<? if($state->category) : ?> class="sortable"<? endif ?>>
        <? foreach($articles as $article) : ?>
            <tr data-readonly="<?= $article->getStatus() == 'deleted' ? '1' : '0' ?>">
                <? if($state->category) : ?><td class="handle"></td><? endif ?>
                <td align="center">
                    <?= @helper('grid.checkbox' , array('row' => $article)) ?>
                </td>
                <td>
                	<?if($article->getStatus() != 'deleted') : ?>
                    	<a href="<?= @route('view=article&id='.$article->id) ?>">
                            <?= @escape($article->title) ?>
                    	</a>
                     <? else : ?>
                     	<?= @escape($article->title); ?>
                     <? endif; ?>
                     <? if($article->access) : ?>
                         <span class="label label-important"><?= @text('Registered') ?></span>
                     <? endif; ?>
                </td>
                <td align="center">
                    <?= @helper('grid.enable', array('row' => $article, 'field' => 'published')) ?>
                </td>
                <? if($state->category) : ?>
                <td align="center">
                    <?= @helper('grid.order', array('row' => $article, 'total' => $total)) ?>
                </td>
                <? endif; ?>
                <td>
                    <?= @helper('date.humanize', array('date' => $article->created_on)) ?> by <a href="<?= @route('option=com_users&view=user&id='.$article->created_by) ?>">
                        <?= $article->created_by_name ?>
                    </a>
                </td>
                <? if($article->isTranslatable()) : ?>
                    <td>
                        <?= @helper('com://admin/languages.template.helper.grid.status', array(
                            'status'   => $article->translation_status,
                            'original' => $article->translation_original,
                            'deleted'  => $article->translation_deleted));
                        ?>
                    </td>
                <? endif ?>
            </tr>
        <? endforeach ?>
        </tbody>
    </table>
</form>
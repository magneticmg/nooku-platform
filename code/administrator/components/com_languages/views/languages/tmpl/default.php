<script src="media://lib_koowa/js/koowa.js" />
<style src="media://lib_koowa/css/koowa.css" />
<style src="media://com_languages/css/admin.css" />

<?= @template('com://admin/default.view.grid.toolbar') ?>

<form id="languages-form" action="" method="post" class="-koowa-grid">
    <?= @template('default_filter') ?>
	<table class="adminlist">
		<thead>
			<tr>
				<th width="10">
				    <?= @helper('grid.checkall') ?>
				</th>
				<th>
					<?= @helper('grid.sort', array('column' => 'name')) ?>
				</th>
				<th>
					<?= @helper('grid.sort', array('column' => 'native_name', 'title' => 'Native Name')) ?>
				</th>
				<th width="10%">
					<?= @helper('grid.sort', array('column' => 'iso_code', 'title' => 'ISO Code')) ?>
				</th>
                <th width="31px" nowrap="nowrap">
                    <?= @text('Flag') ?>
                </th>
                <th width="31px" nowrap="nowrap">
                	<?= @helper('grid.sort', array('column' => 'ordering')) ?>
                </th>
                <th width="50px" nowrap="nowrap">
                    <?= @text('Primary') ?>
                </th>
				<th width="15%" nowrap="nowrap">
					<?= @helper('grid.sort', array('column' => 'slug')) ?>
				</th>
				<th width="31px" nowrap="nowrap">
					<?= @helper('grid.sort', array('column' => 'enabled', 'title' => 'Published')) ?>
				</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="10">
					 <?= @helper('paginator.pagination', array('total' => $total)) ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<? foreach($languages as $language) : ?>
			<tr>
				<td align="center">
					<?= @helper('grid.checkbox', array('row' => $language)) ?>
				</td>
				<td>
					<a href="<?= @route('view=language&id='.$language->id); ?>"><?= $language->name ?></a>
				</td>
				<td>
					<?= $language->native_name ?>
				</td>
				<td align="center">
					<a  href="<?= @route('view=language&id='.$language->id) ?>"><?= $language->iso_code ?></a>
				</td>
                <td align="center">
                    <?= @helper('grid.flag', array('iso_code' => $language->iso_code)) ?>
                </td>
                <td align="center">
                	<?= @helper('grid.order', array('row' => $language, 'total' => $total)) ?>
                </td>
                <td align="center">
                    <? if($language->primary): ?>
                        <img src="templates/default/images/menu/icon-16-default.png" alt="<?= @text( 'Primary Language' ) ?>" />
                    <? endif ?>
                </td>
				<td align="center">
					<?= $language->slug ?>
				</td>
				<td align="center">
					<? if($language->primary) : ?>
                	 	<?= @text('n/a') ?>
                    <? else: ?>
                    	<?= @helper('grid.enable', array('row' => $language)) ?>    
                    <? endif ?>
				</td>
			</tr>
			<? endforeach ?>
		</tbody>
	</table>
</form>
<? /** $Id$ */ ?>
<? defined('KOOWA') or die('Restricted access'); ?>

<? @style(@$mediaurl.'/com_beer/css/grid.css'); ?>
<? @style(@$mediaurl.'/com_beer/css/beer_admin.css'); ?>

<form action="<?= @route()?>" method="post" name="adminForm">
	<input type="hidden" name="action" value="browse" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?= @$state->order; ?>" />
	<input type="hidden" name="filter_direction" value="<?= @$state->direction; ?>" />

	<table>
		<tr>
			<td align="left" width="100%">
				<?= @text('Filter'); ?>:
				<input type="text" name="search" id="search" value="<?= @$state->search;?>" class="text_area" onchange="document.adminForm.submit();" />
				<button onclick="this.form.submit();"><?= @text('Go')?></button>
				<button onclick="document.getElementById('search').value='';this.form.getElementById('beer_department_id').value='';this.form.getElementById('beer_office_id').value='';this.form.getElementById('enabled').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
			</td>
			<td nowrap="nowrap">
				<? $attribs = array('class' => 'inputbox', 'size' => '1', 'onchange' => 'submitform();');?>
				<?=@helper('admin::com.beer.helper.select.departments', @$state->beer_department_id, 'beer_department_id', $attribs, '', true) ?>
				<?=@helper('admin::com.beer.helper.select.offices', @$state->beer_office_id, 'beer_office_id', $attribs, '', true) ?>
				<?=@helper('admin::com.beer.helper.select.enabled',  @$state->enabled ); ?>
			</td>
		</tr>
	</table>

	<table class="adminlist" style="clear: both;">
		<thead>
			<tr>
				<th width="5">
					<?= @text('NUM'); ?>
				</th>
				<th width="20">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?= count(@$people); ?>);" />
				</th>
				<th>
					<?= @helper('grid.sort', 'Name', 'firstname', @$state->direction, @$state->order); ?>
				</th>
				<th>
					<?= @helper('grid.sort', 'Department', 'department', @$state->direction, @$state->order); ?>
				</th>
				<th>
					<?= @helper('grid.sort', 'Office', 'office', @$state->direction, @$state->order); ?>
				</th>
				<th>
					<?= @helper('grid.sort', 'Enabled', 'enabled', @$state->direction, @$state->order); ?>
				</th>
				<th>
					<?= @helper('grid.sort', 'ID', 'beer_person_id', @$state->direction, @$state->order); ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<? $i = 0; $m = 0; ?>
		<? foreach (@$people as $person) : ?>
			<tr class="<?= 'row'.$m; ?>">
				<td align="center">
					<?= $i + 1; ?>
				</td>
				<td align="center">
					<? // @helper('grid.checkedOut', $project, $i, $project->id); ?>
					<?= @helper('grid.id', $i, $person->id); ?>
				</td>
				<td>
					<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit Profile' );?>::<?= @$escape($person->name); ?>">
						<a href="<?= @route('view=person&layout=form&id='.$person->id)?>">
							<?= @$escape($person->name)?>
						</a>
					</span>
				</td>
				<td align="center">
					<?= $person->department?>
				</td>
				<td align="center">
					<?= $person->office?>
				</td>
				<td align="center" width="15px">
					<?= @helper('grid.enable', $person->enabled, $i)?>
				</td>
				<td align="center" width="1%">
					<?= $person->id?>
				</td>
			</tr>
		<? $i = $i + 1; $m = (1 - $m);?>
		<? endforeach; ?>

		<? if (!count(@$people)) : ?>
			<tr>
				<td colspan="8" align="center">
					<?= @text('No items found'); ?>
				</td>
			</tr>
		<? endif; ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="20">
					<?= @helper('pagination.limit', @$state->limit) ?>
					<?= @helper('pagination.pages', @$total, @$state->offset, @$state->limit) ?>
				</td>
			</tr>
		</tfoot>
	</table>
</form>
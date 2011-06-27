<div id="accordion">
	<h3><a href="#"><?php __('Eva Column Rules');?></a></h3>
	<div class="evaColumnRules index">
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>
				<tr>
						<th><?php echo $this->Paginator->sort('id');?></th>
						<th><?php echo $this->Paginator->sort('name');?></th>
						<th><?php echo $this->Paginator->sort('eva_model_column_id');?></th>
						<th><?php echo $this->Paginator->sort('deleted');?></th>
						<th><?php echo $this->Paginator->sort('deleted_date');?></th>
						<th><?php echo $this->Paginator->sort('created_by');?></th>
						<th><?php echo $this->Paginator->sort('modified_by');?></th>
						<th><?php echo $this->Paginator->sort('created');?></th>
						<th><?php echo $this->Paginator->sort('modified');?></th>
						<th class="actions"><?php __('Actions');?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				foreach ($evaColumnRules as $evaColumnRule):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="odd"';
					}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $i; ?>&nbsp;</td>
					<td><?php echo $evaColumnRule['EvaColumnRule']['name']; ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($evaColumnRule['EvaModelColumn']['name'], array('controller' => 'eva_model_columns', 'action' => 'view', $evaColumnRule['EvaModelColumn']['id'])); ?>
					</td>
					<td><?php echo $evaColumnRule['EvaColumnRule']['deleted']; ?>&nbsp;</td>
					<td><?php echo $evaColumnRule['EvaColumnRule']['deleted_date']; ?>&nbsp;</td>
					<td><?php echo $evaColumnRule['EvaColumnRule']['created_by']; ?>&nbsp;</td>
					<td><?php echo $evaColumnRule['EvaColumnRule']['modified_by']; ?>&nbsp;</td>
					<td><?php echo $evaColumnRule['EvaColumnRule']['created']; ?>&nbsp;</td>
					<td><?php echo $evaColumnRule['EvaColumnRule']['modified']; ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evaColumnRule['EvaColumnRule']['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaColumnRule['EvaColumnRule']['name'])); ?>
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evaColumnRule['EvaColumnRule']['id']),array('class'=>'action_table_edit_data_no_ajax','title'=>'edit '.$evaColumnRule['EvaColumnRule']['name'])); ?>
						<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evaColumnRule['EvaColumnRule']['id']), array('class'=>'action_table_delete_data_no_ajax'), sprintf(__('Are you sure you want to delete # %s?', true), $evaColumnRule['EvaColumnRule']['id'])); ?>
						<!--<a href="javascript:;" id="<?php //echo $evaColumnRule['EvaColumnRule']['id'];?>" class="action_table_delete_data" title="delete <?php //echo $evaColumnRule['EvaColumnRule']['name'];?>">Delete</a>-->
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
		?>	</p>

		<div class="paging">
			<?php echo $this->Paginator->prev(__('previous', true), array(), null, array('class'=>'disabled'));?>
		  	<?php echo $this->Paginator->numbers(array('separator'=>' '));?>
			<?php echo $this->Paginator->next(__('next', true), array(), null, array('class' => 'disabled'));?>
		</div>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Eva Column Rule', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?></li>
				<li><?php echo $this->Html->link(__('List Eva Model Columns', true), array('controller' => 'eva_model_columns', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Model Column', true), array('controller' => 'eva_model_columns', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Model Column Rule Details', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<!--<li><?php //echo $this->Html->link(__('New Eva Model Column Rule Detail', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'add'),array('class'=>'list_action_add_new_data')); ?> </li> -->
			</ul>
		</div>
	</div>
</div>
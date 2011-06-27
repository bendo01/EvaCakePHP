<div id="accordion">
	<h3><a href="#"><?php __('Eva Basic Rules');?></a></h3>
	<div class="evaBasicRules index">
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>	
				<tr>
						<th><?php echo $this->Paginator->sort('id');?></th>
						<th><?php echo $this->Paginator->sort('name');?></th>
						<th><?php echo $this->Paginator->sort('description');?></th>
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
					foreach ($evaBasicRules as $evaBasicRule):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="odd"';
						}
					?>
					<tr<?php echo $class;?>>
						<td><?php echo $i; ?>&nbsp;</td>
						<td><?php echo $evaBasicRule['EvaBasicRule']['name']; ?>&nbsp;</td>
						<td><?php echo $evaBasicRule['EvaBasicRule']['description']; ?>&nbsp;</td>
						<td><?php echo $evaBasicRule['EvaBasicRule']['deleted']; ?>&nbsp;</td>
						<td><?php echo $evaBasicRule['EvaBasicRule']['deleted_date']; ?>&nbsp;</td>
						<td><?php echo $evaBasicRule['EvaBasicRule']['created_by']; ?>&nbsp;</td>
						<td><?php echo $evaBasicRule['EvaBasicRule']['modified_by']; ?>&nbsp;</td>
						<td><?php echo $evaBasicRule['EvaBasicRule']['created']; ?>&nbsp;</td>
						<td><?php echo $evaBasicRule['EvaBasicRule']['modified']; ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evaBasicRule['EvaBasicRule']['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaBasicRule['EvaBasicRule']['name'])); ?>
							<?php //echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evaBasicRule['EvaBasicRule']['id']),array('class'=>'action_table_edit_data_no_ajax','title'=>'edit '.$evaBasicRule['EvaBasicRule']['name'])); ?>
							<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evaBasicRule['EvaBasicRule']['id']) ,array('class'=>'action_table_delete_data_no_ajax','title'=>'delete '.$evaBasicRule['EvaBasicRule']['name']), sprintf(__('Are you sure you want to delete # %s?', true), $evaBasicRule['EvaBasicRule']['id'])); ?>
							<!--<a href="javascript:;" id="<?php //echo $evaBasicRule['EvaBasicRule']['id'];?>" class="action_table_delete_data" title="delete <?php //echo $evaBasicRule['EvaBasicRule']['name'];?>">Delete</a>-->
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
				<!--<li><?php //echo $this->Html->link(__('New Eva Basic Rule', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?></li>-->
				<li><?php echo $this->Html->link(__('List Eva Model Column Rule Details', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Model Column Rule Detail', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			</ul>
		</div>
	</div>
</div>
<div id="accordion">
	<h3><a href="#"><?php __('Eva Model Column Rule Details');?></a></h3>
	<div class="evaModelColumnRuleDetails index">	
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>
				<tr>
						<th><?php echo $this->Paginator->sort('id');?></th>
						<th><?php echo $this->Paginator->sort('name');?></th>
						<th><?php echo $this->Paginator->sort('message');?></th>
						<th><?php echo $this->Paginator->sort('allowEmpty');?></th>
						<th><?php echo $this->Paginator->sort('required');?></th>
						<th><?php echo $this->Paginator->sort('last');?></th>
						<th><?php echo $this->Paginator->sort('on');?></th>
						<th><?php echo $this->Paginator->sort('eva_column_rule_id');?></th>
						<th><?php echo $this->Paginator->sort('eva_basic_rule_id');?></th>
						<th><?php echo $this->Paginator->sort('deleted');?></th>
						<th><?php echo $this->Paginator->sort('deleted_date');?></th>
						<th class="actions"><?php __('Actions');?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				foreach ($evaModelColumnRuleDetails as $evaModelColumnRuleDetail):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="odd"';
					}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $i; ?>&nbsp;</td>
					<td><?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['name']; ?>&nbsp;</td>
					<td><?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['message']; ?>&nbsp;</td>
					<td><?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['allowEmpty']; ?>&nbsp;</td>
					<td><?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['required']; ?>&nbsp;</td>
					<td><?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['last']; ?>&nbsp;</td>
					<td><?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['on']; ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($evaModelColumnRuleDetail['EvaColumnRule']['name'], array('controller' => 'eva_column_rules', 'action' => 'view', $evaModelColumnRuleDetail['EvaColumnRule']['id'])); ?>
					</td>
					<td>
						<?php echo $this->Html->link($evaModelColumnRuleDetail['EvaBasicRule']['name'], array('controller' => 'eva_basic_rules', 'action' => 'view', $evaModelColumnRuleDetail['EvaBasicRule']['id'])); ?>
					</td>
					<td><?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['deleted']; ?>&nbsp;</td>
					<td><?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['deleted_date']; ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['name'])); ?>
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['id']),array('class'=>'action_table_edit_data_no_ajax','title'=>'edit '.$evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['name'])); ?>
						<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['id']), array('class'=>'action_table_delete_data_no_ajax','title'=>'delete '.$evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['name']), sprintf(__('Are you sure you want to delete # %s?', true), $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['id'])); ?>
						<!--<a href="javascript:;" id="<?php //echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['id'];?>" class="action_table_delete_data" title="delete <?php //echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['name'];?>">Delete</a> -->
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
				<li><?php echo $this->Html->link(__('New Eva Model Column Rule Detail', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?></li>
				<li><?php echo $this->Html->link(__('List Eva Column Rules', true), array('controller' => 'eva_column_rules', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('List Eva Basic Rules', true), array('controller' => 'eva_basic_rules', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Column Rule', true), array('controller' => 'eva_column_rules', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Basic Rule', true), array('controller' => 'eva_basic_rules', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				
			</ul>
		</div>
	</div>
</div>
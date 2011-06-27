<div id="accordion">
	<h3><a href="#"><?php  __('Eva Column Rule');?></a></h3>
	<div class="evaColumnRules view">
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaColumnRule['EvaColumnRule']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaColumnRule['EvaColumnRule']['name']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Model Column'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($evaColumnRule['EvaModelColumn']['name'], array('controller' => 'eva_model_columns', 'action' => 'view', $evaColumnRule['EvaModelColumn']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaColumnRule['EvaColumnRule']['deleted']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaColumnRule['EvaColumnRule']['deleted_date']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaColumnRule['EvaColumnRule']['created_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaColumnRule['EvaColumnRule']['modified_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaColumnRule['EvaColumnRule']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaColumnRule['EvaColumnRule']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Eva Column Rule', true), array('action' => 'edit', $evaColumnRule['EvaColumnRule']['id']),array('class'=>'list_action_edit_new_data')); ?> </li>
				<li><?php echo $this->Html->link(__('Delete Eva Column Rule', true), array('action' => 'delete', $evaColumnRule['EvaColumnRule']['id']) ,array('class'=>'list_action_delete_new_data'), sprintf(__('Are you sure you want to delete # %s?', true), $evaColumnRule['EvaColumnRule']['id'])); ?>
					<!--<a href="#" class="list_action_delete_new_data">Delete Eva Column Rule</a>-->
				</li>
				<li><?php echo $this->Html->link(__('List Eva Column Rules', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Column Rule', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Model Columns', true), array('controller' => 'eva_model_columns', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>

				<li><?php echo $this->Html->link(__('List Eva Model Column Rule Details', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				
				<li><?php echo $this->Html->link(__('New Eva Model Column', true), array('controller' => 'eva_model_columns', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Model Column Rule Detail', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?></li>
			</ul>
		</div>
	</div>
	
</div>

<?php if (!empty($evaColumnRule['EvaModelColumnRuleDetail'])):?>
<div class="detail_accordion">
	<h3><a href="#"><?php __('Related Eva Model Column Rule Details');?></a></h3>
	<div class="related">	
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>
				<tr>
					<th><?php __('Id'); ?></th>
					<th><?php __('Name'); ?></th>
					<th><?php __('Message'); ?></th>
					<th><?php __('AllowEmpty'); ?></th>
					<th><?php __('Required'); ?></th>
					<th><?php __('Last'); ?></th>
					<th><?php __('On'); ?></th>
					<th><?php __('Eva Basic Rule Id'); ?></th>
					
					<th class="actions"><?php __('Actions');?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i = 0;
					foreach ($evaColumnRule['EvaModelColumnRuleDetail'] as $evaModelColumnRuleDetail):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="odd"';
						}
					?>
					<tr<?php echo $class;?>>
						<td><?php echo $i;?></td>
						<td><?php echo $evaModelColumnRuleDetail['name'];?></td>
						<td><?php echo $evaModelColumnRuleDetail['message'];?></td>
						<td><?php echo $evaModelColumnRuleDetail['allowEmpty'];?></td>
						<td><?php echo $evaModelColumnRuleDetail['required'];?></td>
						<td><?php echo $evaModelColumnRuleDetail['last'];?></td>
						<td><?php echo $evaModelColumnRuleDetail['on'];?></td>
						<td><?php echo $evaModelColumnRuleDetail['eva_basic_rule_id'];?></td>
						
						<td class="actions">
							<?php echo $this->Html->link(__('View', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'view', $evaModelColumnRuleDetail['id']),array('class'=>'action_table_view_data')); ?>
							<?php echo $this->Html->link(__('Edit', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'edit', $evaModelColumnRuleDetail['id']),array('class'=>'action_table_edit_data_no_ajax','title'=>'edit '.$evaModelColumnRuleDetail['name'])); ?>
							<?php echo $this->Html->link(__('Delete', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'delete', $evaModelColumnRuleDetail['id']), array('class'=>'action_table_delete_data_no_ajax'), sprintf(__('Are you sure you want to delete # %s?', true), $evaModelColumnRuleDetail['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?php endif; ?>

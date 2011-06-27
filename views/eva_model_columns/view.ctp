<div id="accordion">
	<h3><a href="#"><?php  __('Eva Model Column');?></a></h3>
	<div class="evaModelColumns view">
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['name']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alias'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['alias']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['type']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Length'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['length']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Model'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($evaModelColumn['EvaModel']['name'], array('controller' => 'eva_models', 'action' => 'view', $evaModelColumn['EvaModel']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('AllowNull'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['allowNull']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Primarykey'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['primarykey']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['deleted']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['deleted_date']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['created_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['modified_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumn['EvaModelColumn']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Eva Model Column', true), array('action' => 'edit', $evaModelColumn['EvaModelColumn']['id']),array('class'=>'list_action_edit_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('Delete Eva Model Column', true), array('action' => 'delete', $evaModelColumn['EvaModelColumn']['id']), array('class'=>'list_action_delete_new_data_no_ajax'), sprintf(__('Are you sure you want to delete # %s?', true), $evaModelColumn['EvaModelColumn']['id'])); ?> 
					<!--<a href="javascript:;" id="<?php //echo $evaModelColumn['EvaModelColumn']['id']; ?>" class="list_action_delete_new_data">Delete Eva Model Column</a>-->
				</li>
				<li><?php echo $this->Html->link(__('List Eva Model Columns', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Model Column', true), array('action' => 'add'),array('class'=>'list_action_add_new_data')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Models', true), array('controller' => 'eva_models', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>

				<li><?php echo $this->Html->link(__('List Eva Column Rules', true), array('controller' => 'eva_column_rules', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Column Rule', true), array('controller' => 'eva_column_rules', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				
			</ul>
		</div>
	</div>
	
</div>
<?php if (!empty($evaModelColumn['EvaColumnRule'])):?>
<div class="detail_accordion">
	<h3><a href="#"><?php __('Related Eva Column Rules');?></a></h3>
	<div class="related">
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>
				<tr>
					<th><?php __('Id'); ?></th>
					<th><?php __('Name'); ?></th>
					<th><?php __('Deleted'); ?></th>
					<th><?php __('Deleted Date'); ?></th>
					<th><?php __('Created By'); ?></th>
					<th><?php __('Modified By'); ?></th>
					<th><?php __('Created'); ?></th>
					<th><?php __('Modified'); ?></th>
					<th class="actions"><?php __('Actions');?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i = 0;
					foreach ($evaModelColumn['EvaColumnRule'] as $evaColumnRule):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="odd"';
						}
					?>
					<tr<?php echo $class;?>>
						<td><?php echo $i;?></td>
						<td><?php echo $evaColumnRule['name'];?></td>
						<td><?php echo $evaColumnRule['deleted'];?></td>
						<td><?php echo $evaColumnRule['deleted_date'];?></td>
						<td><?php echo $evaColumnRule['created_by'];?></td>
						<td><?php echo $evaColumnRule['modified_by'];?></td>
						<td><?php echo $evaColumnRule['created'];?></td>
						<td><?php echo $evaColumnRule['modified'];?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('View', true), array('controller' => 'eva_column_rules', 'action' => 'view', $evaColumnRule['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaColumnRule['name'])); ?>
							<?php echo $this->Html->link(__('Edit', true), array('controller' => 'eva_column_rules', 'action' => 'edit', $evaColumnRule['id']),array('class'=>'action_table_edit_data_no_ajax')); ?>
							<?php echo $this->Html->link(__('Delete', true), array('controller' => 'eva_column_rules', 'action' => 'delete', $evaColumnRule['id']), array('class'=>'action_table_delete_data_no_ajax','title'=>'delete '.$evaColumnRule['name']), sprintf(__('Are you sure you want to delete # %s?', true), $evaColumnRule['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Eva Column Rule', true), array('controller' => 'eva_column_rules', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax'));?> </li>
			</ul>
		</div>
		
	</div>
</div>
<?php endif; ?>

<div id="accordion">	
	<h3><a href=""><?php  __('Eva Db Connection');?></a></h3>
	<div class="evaDbConnections view">
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['name']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Driver'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['driver']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Host'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['host']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Login'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['login']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['password']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Database'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['database']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Schema'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['schema']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Port'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['port']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Persistent'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['persistent']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Application'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($evaDbConnection['EvaApplication']['title'], array('controller' => 'eva_applications', 'action' => 'view', $evaDbConnection['EvaApplication']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['deleted']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['deleted_date']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['created_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['modified_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaDbConnection['EvaDbConnection']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<br />
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Eva Db Connection', true), array('action' => 'edit', $evaDbConnection['EvaDbConnection']['id']),array('class'=>'list_action_edit_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('Delete Eva Db Connection', true), array('action' => 'delete', $evaDbConnection['EvaDbConnection']['id']),array('class'=>'list_action_delete_new_data_no_ajax'), sprintf(__('Are you sure you want to delete # %s?', true), $evaDbConnection['EvaDbConnection']['id'])); ?> 
				<a href="#" class="list_action_delete_new_data">Delete Eva Db Connection</a>
				</li>
				<li><?php echo $this->Html->link(__('List Eva Db Connections', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Db Connection', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Applications', true), array('controller' => 'eva_applications', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('List Eva Models', true), array('controller' => 'eva_models', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Application', true), array('controller' => 'eva_applications', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				
			</ul>
		</div>
	</div>
</div>
<?php if (!empty($evaDbConnection['EvaModel'])):?>
<div class="detail_accordion">
	<h3><a href="#"><?php __('Related Eva Models');?></a></h3>
	<div class="related">
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>
				<tr>
					<th><?php __('Id'); ?></th>
					<th><?php __('Name'); ?></th>
					<th><?php __('Alias'); ?></th>
					<th><?php __('Order'); ?></th>
					<th><?php __('PrimaryKey'); ?></th>
					<th><?php __('Recursive'); ?></th>
					<th><?php __('Table'); ?></th>
					<th><?php __('TablePrefix'); ?></th>
					<th><?php __('UseDbConfig'); ?></th>
					<th><?php __('UseTable'); ?></th>
					
					<th><?php __('Deleted'); ?></th>
					<th><?php __('Deleted Date'); ?></th>
					
					<th class="actions"><?php __('Actions');?></th>
				</tr>
			<thead>			
			<tbody>
				<?php
					$i = 0;
					foreach ($evaDbConnection['EvaModel'] as $evaModel):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="odd"';
						}
					?>
					<tr<?php echo $class;?>>
						<td><?php echo $i;?></td>
						<td><?php echo $evaModel['name'];?></td>
						<td><?php echo $evaModel['alias'];?></td>
						<td><?php echo $evaModel['order'];?></td>
						<td><?php echo $evaModel['primaryKey'];?></td>
						<td><?php echo $evaModel['recursive'];?></td>
						<td><?php echo $evaModel['table'];?></td>
						<td><?php echo $evaModel['tablePrefix'];?></td>
						<td><?php echo $evaModel['useDbConfig'];?></td>
						<td><?php echo $evaModel['useTable'];?></td>
						<td><?php echo $evaModel['deleted'];?></td>
						<td><?php echo $evaModel['deleted_date'];?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('View', true), array('controller' => 'eva_models', 'action' => 'view', $evaModel['id']),array('class'=>'action_table_view_data')); ?>
							<?php echo $this->Html->link(__('Edit', true), array('controller' => 'eva_models', 'action' => 'edit', $evaModel['id']),array('class'=>'action_table_edit_data_no_ajax')); ?>
							<?php echo $this->Html->link(__('Delete', true), array('controller' => 'eva_models', 'action' => 'delete', $evaModel['id']),array('class'=>'action_table_delete_data'), sprintf(__('Are you sure you want to delete # %s?', true), $evaModel['id'])); ?>
							<!--<a href="#" class="action_table_delete_data">Delete</a>-->
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			
		</table>
		
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax'));?> </li>
			</ul>
		</div>
		
	</div>
</div>
<?php endif; ?>
<div id="accordion">
	<h3><a href="#"><?php __('Eva Applications');?></a></h3>
	<div>
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaApplication['EvaApplication']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaApplication['EvaApplication']['name']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaApplication['EvaApplication']['title']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaApplication['EvaApplication']['description']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaApplication['EvaApplication']['deleted']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaApplication['EvaApplication']['deleted_date']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaApplication['EvaApplication']['created_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaApplication['EvaApplication']['modified_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaApplication['EvaApplication']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaApplication['EvaApplication']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<br />
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Eva Application', true), array('action' => 'edit', $evaApplication['EvaApplication']['id']),array('class'=>'list_action_edit_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('Delete Eva Application', true), array('action' => 'delete', $evaApplication['EvaApplication']['id']),array('class'=>'list_action_delete_new_data_no_ajax'), sprintf(__('Are you sure you want to delete # %s?', true), $evaApplication['EvaApplication']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Applications', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Application', true), array('action' => 'add'),array('class'=>'list_action_add_new_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('List Eva Db Connections', true), array('controller' => 'eva_db_connections', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('Create Eva Application', true), array('action' => 'create_eva_application',$evaApplication['EvaApplication']['id']),array('class'=>'generate-application-icon')); ?> </li>
				<!--<li><?php //echo $this->Html->link(__('Check Eva Application Sequence', true), array('action' => 'check_sequence_eva_application',$evaApplication['EvaApplication']['id']),array('class'=>'check-sequence-application-icon')); ?> </li>-->
				<li><?php echo $this->Html->link(__('New Eva Db Connection', true), array('controller' => 'eva_db_connections', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				
			</ul>
		</div>
	</div>
</div>
<?php if (!empty($evaApplication['EvaDbConnection'])):?>
<div class="detail_accordion">
	<h3><a href="#"><?php __('Related Eva Db Connections');?></a></h3>
	<div>
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
		<thead>
			<tr>
				<th><?php __('Id'); ?></th>
				<th><?php __('Name'); ?></th>
				<th><?php __('Driver'); ?></th>
				<th><?php __('Host'); ?></th>
				<th><?php __('Login'); ?></th>
				<th><?php __('Password'); ?></th>
				<th><?php __('Database'); ?></th>
				<th><?php __('Schema'); ?></th>
				<th><?php __('Port'); ?></th>
				<th><?php __('Persistent'); ?></th>
				<th><?php __('Deleted'); ?></th>
				<th><?php __('Deleted Date'); ?></th>
				<th class="actions"><?php __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i = 0;
				foreach ($evaApplication['EvaDbConnection'] as $evaDbConnection):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="odd"';
					}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $i;?></td>
					<td><?php echo $evaDbConnection['name'];?></td>
					<td><?php echo $evaDbConnection['driver'];?></td>
					<td><?php echo $evaDbConnection['host'];?></td>
					<td><?php echo $evaDbConnection['login'];?></td>
					<td><?php echo $evaDbConnection['password'];?></td>
					<td><?php echo $evaDbConnection['database'];?></td>
					<td><?php echo $evaDbConnection['schema'];?></td>
					<td><?php echo $evaDbConnection['port'];?></td>
					<td><?php echo $evaDbConnection['persistent'];?></td>
					<td><?php echo $evaDbConnection['deleted'];?></td>
					<td><?php echo $evaDbConnection['deleted_date'];?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('View', true), array('controller' => 'eva_db_connections', 'action' => 'view', $evaDbConnection['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaDbConnection['name'])); ?>
						
						<?php echo $this->Html->link(__('Edit', true), array('controller' => 'eva_db_connections', 'action' => 'edit', $evaDbConnection['id']),array('class'=>'action_table_edit_data_no_ajax','title'=>'edit '.$evaDbConnection['name'])); ?>
						<?php echo $this->Html->link(__('Delete', true), array('controller' => 'eva_db_connections', 'action' => 'delete', $evaDbConnection['id']), array('class'=>'action_table_delete_data_no_ajax','title'=>'delete '.$evaDbConnection['name']), sprintf(__('Are you sure you want to delete # %s?', true), $evaDbConnection['name'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		</table>
		
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Eva Db Connection', true), array('controller' => 'eva_db_connections', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax'));?> </li>
			</ul>
		</div>
		
	</div>
</div>
<?php endif; ?>
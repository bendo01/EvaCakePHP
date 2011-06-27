<div id="accordion">
	<h3><a href="#"><?php __('Eva Db Connections');?></a></h3>
	<div>
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('id');?></th>
					<th><?php echo $this->Paginator->sort('name');?></th>
					<th><?php echo $this->Paginator->sort('driver');?></th>
					<th><?php echo $this->Paginator->sort('host');?></th>
					<th><?php echo $this->Paginator->sort('login');?></th>
					<th><?php echo $this->Paginator->sort('password');?></th>
					<th><?php echo $this->Paginator->sort('database');?></th>
					<th><?php echo $this->Paginator->sort('schema');?></th>
					<th><?php echo $this->Paginator->sort('port');?></th>
					<th><?php echo $this->Paginator->sort('persistent');?></th>
					<th><?php echo $this->Paginator->sort('eva_application_id');?></th>
					<th><?php echo $this->Paginator->sort('deleted');?></th>
					<th><?php echo $this->Paginator->sort('deleted_date');?></th>
					<th class="actions"><?php __('Actions');?></th>
				</tr>
			<thead>
			<tbody>
					<?php
					$i = 0;
					foreach ($evaDbConnections as $evaDbConnection):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="odd"';
						}
					?>
					<tr<?php echo $class;?>>
						<td><?php echo $i; ?>&nbsp;</td>
						<td><?php echo $evaDbConnection['EvaDbConnection']['name']; ?>&nbsp;</td>
						<td><?php echo $evaDbConnection['EvaDbConnection']['driver']; ?>&nbsp;</td>
						<td><?php echo $evaDbConnection['EvaDbConnection']['host']; ?>&nbsp;</td>
						<td><?php echo $evaDbConnection['EvaDbConnection']['login']; ?>&nbsp;</td>
						<td><?php echo $evaDbConnection['EvaDbConnection']['password']; ?>&nbsp;</td>
						<td><?php echo $evaDbConnection['EvaDbConnection']['database']; ?>&nbsp;</td>
						<td><?php echo $evaDbConnection['EvaDbConnection']['schema']; ?>&nbsp;</td>
						<td><?php echo $evaDbConnection['EvaDbConnection']['port']; ?>&nbsp;</td>
						<td><?php echo $evaDbConnection['EvaDbConnection']['persistent']; ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($evaDbConnection['EvaApplication']['title'], array('controller' => 'eva_applications', 'action' => 'view', $evaDbConnection['EvaApplication']['id'])); ?>
						</td>
						<td><?php echo $evaDbConnection['EvaDbConnection']['deleted']; ?>&nbsp;</td>
						<td><?php echo $evaDbConnection['EvaDbConnection']['deleted_date']; ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evaDbConnection['EvaDbConnection']['id']),array('class'=>'action_table_view_data_no_ajax','title'=>'view '.$evaDbConnection['EvaDbConnection']['name'])); ?>
							<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evaDbConnection['EvaDbConnection']['id']),array('class'=>'action_table_edit_data_no_ajax','title'=>'edit '.$evaDbConnection['EvaDbConnection']['name'])); ?>
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evaDbConnection['EvaDbConnection']['id']),array('class'=>'action_table_delete_data','title'=>'delete '.$evaDbConnection['EvaDbConnection']['name'])); ?>
							<!--<a href="javascript:;" id="<?php //echo $evaDbConnection['EvaDbConnection']['id'];?>" class="action_table_delete_data" title="delete <?php //echo $evaDbConnection['EvaDbConnection']['name'];?>">Delete</a>-->
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
				<li><?php echo $this->Html->link(__('New Eva Db Connection', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?></li>
				<li><?php echo $this->Html->link(__('List Eva Applications', true), array('controller' => 'eva_applications', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Models', true), array('controller' => 'eva_models', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Application', true), array('controller' => 'eva_applications', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			</ul>
		</div>
	</div>
</div>
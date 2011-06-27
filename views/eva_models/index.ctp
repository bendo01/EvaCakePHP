<div id="accordion">
	<h3><a href="#"><?php __('Eva Models');?></a></h3>
	<div>
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>
				<tr>
						<th><?php echo $this->Paginator->sort('id');?></th>
						<th><?php echo $this->Paginator->sort('name');?></th>
						<th><?php echo $this->Paginator->sort('eva_db_connection_id');?></th>
						<th><?php echo $this->Paginator->sort('admin_section');?></th>
						<th><?php echo $this->Paginator->sort('alias');?></th>
						<th><?php echo $this->Paginator->sort('displayField');?></th>
						<th><?php echo $this->Paginator->sort('findQueryType');?></th>
						<th><?php echo $this->Paginator->sort('logTransactions');?></th>
						<th><?php echo $this->Paginator->sort('order');?></th>
						<th><?php echo $this->Paginator->sort('primaryKey');?></th>
						<th><?php echo $this->Paginator->sort('recursive');?></th>
						<th><?php echo $this->Paginator->sort('table');?></th>
						<th><?php echo $this->Paginator->sort('useDbConfig');?></th>
						<th><?php echo $this->Paginator->sort('useTable');?></th>
						
						<th class="actions"><?php __('Actions');?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				foreach ($evaModels as $evaModel):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="odd"';
					}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $i; ?>&nbsp;</td>
					<td><?php echo $evaModel['EvaModel']['name']; ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($evaModel['EvaDbConnection']['name'], array('controller' => 'eva_db_connections', 'action' => 'view', $evaModel['EvaDbConnection']['id'])); ?>
					</td>
					<td>
						<?php //echo $evaModel['EvaModel']['admin_section'];
							if($evaModel['EvaModel']['admin_section'] == 1){
								echo $this->Html->link('Admin Section Enabled', '#', array('class' => 'button_not_null_column'));
							}
							else{
								echo $this->Html->link('Admin Section Disabled', '#', array('class' => 'button_null_column'));
							}
						?>&nbsp;
					</td>
					<td><?php echo $evaModel['EvaModel']['alias']; ?>&nbsp;</td>
					<td><?php echo $evaModel['EvaModel']['displayField']; ?>&nbsp;</td>
					<td><?php echo $evaModel['EvaModel']['findQueryType']; ?>&nbsp;</td>
					<td>
						<?php //echo $evaModel['EvaModel']['logTransactions'];
							if($evaModel['EvaModel']['logTransactions'] == 1){
								echo $this->Html->link('logTransactions Enabled', '#', array('class' => 'button_not_null_column'));
							}
							else{
								echo $this->Html->link('logTransactions Disabled', '#', array('class' => 'button_null_column'));
							}
						?>&nbsp;
					</td>
					<td><?php echo $evaModel['EvaModel']['order']; ?>&nbsp;</td>
					<td><?php echo $evaModel['EvaModel']['primaryKey']; ?>&nbsp;</td>
					<td><?php echo $evaModel['EvaModel']['recursive']; ?>&nbsp;</td>
					<td><?php echo $evaModel['EvaModel']['table']; ?>&nbsp;</td>
					<td><?php echo $evaModel['EvaModel']['useDbConfig']; ?>&nbsp;</td>
					<td><?php echo $evaModel['EvaModel']['useTable']; ?>&nbsp;</td>
					
					<td class="actions">
						<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evaModel['EvaModel']['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaModel['EvaModel']['name'])); ?>
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evaModel['EvaModel']['id']),array('class'=>'action_table_edit_data_no_ajax','title'=>'edit '.$evaModel['EvaModel']['name'])); ?>
						<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evaModel['EvaModel']['id']) ,array('class'=>'action_table_delete_data_no_ajax','title'=>'delete '.$evaModel['EvaModel']['name']), sprintf(__('Are you sure you want to delete # %s?', true), $evaModel['EvaModel']['name'])); ?>
						<!--<a href="javascript:;" id="<?php //echo $evaModel['EvaModel']['id'];?>" class="action_table_delete_data" title="delete <?php //echo $evaModel['EvaModel']['name'];?>">Delete</a>-->
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
				<li><?php echo $this->Html->link(__('New Eva Model', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?></li>
				<li><?php echo $this->Html->link(__('List Eva Db Connections', true), array('controller' => 'eva_db_connections', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('List Eva Belong To Associations', true), array('controller' => 'eva_belong_to_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('List Eva Has And Belong To Many Associations', true), array('controller' => 'eva_has_and_belong_to_many_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('List Eva Has Many Associations', true), array('controller' => 'eva_has_many_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('List Eva Has One Associations', true), array('controller' => 'eva_has_one_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('List Eva Model Columns', true), array('controller' => 'eva_model_columns', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Belong To Association', true), array('controller' => 'eva_belong_to_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Has And Belong To Many Association', true), array('controller' => 'eva_has_and_belong_to_many_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Has Many Association', true), array('controller' => 'eva_has_many_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Has One Association', true), array('controller' => 'eva_has_one_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Db Connection', true), array('controller' => 'eva_db_connections', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Model Column', true), array('controller' => 'eva_model_columns', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				
			</ul>
		</div>		
	</div>
</div>
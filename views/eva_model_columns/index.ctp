<div id="accordion">
	<h3><a href="#"><?php __('Eva Model Columns');?></a></h3>
	<div class="evaModelColumns index">
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>
				<tr>
						<th><?php echo $this->Paginator->sort('id');?></th>
						<th><?php echo $this->Paginator->sort('eva_model_id');?></th>
						<th><?php echo $this->Paginator->sort('name');?></th>
						<th><?php echo $this->Paginator->sort('alias');?></th>
						<th><?php echo $this->Paginator->sort('type');?></th>
						<th><?php echo $this->Paginator->sort('length');?></th>
						<th><?php echo $this->Paginator->sort('allowNull');?></th>
						<th><?php echo $this->Paginator->sort('primarykey');?></th>
						<th><?php echo $this->Paginator->sort('deleted');?></th>
						<th><?php echo $this->Paginator->sort('deleted_date');?></th>
						<th class="actions"><?php __('Actions');?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				foreach ($evaModelColumns as $evaModelColumn):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="odd"';
					}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $i; ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($evaModelColumn['EvaModel']['name'], array('controller' => 'eva_models', 'action' => 'view', $evaModelColumn['EvaModel']['id'])); ?>
					</td>
					<td><?php echo $evaModelColumn['EvaModelColumn']['name']; ?>&nbsp;</td>
					<td><?php echo $evaModelColumn['EvaModelColumn']['alias']; ?>&nbsp;</td>
					<td><?php echo $evaModelColumn['EvaModelColumn']['type']; ?>&nbsp;</td>
					<td><?php echo $evaModelColumn['EvaModelColumn']['length']; ?>&nbsp;</td>
					
					<td><?php //echo $evaModelColumn['EvaModelColumn']['allowNull'];
							if($evaModelColumn['EvaModelColumn']['allowNull'] == 1){
								echo $this->Html->link('Not NULL', '#', array('class' => 'button_not_null_column'));
							}
							else{
								echo $this->Html->link('NULL', '#', array('class' => 'button_null_column'));
							}
						?>&nbsp;
					</td>
					<td>
						<?php //echo $evaModelColumn['EvaModelColumn']['primarykey']; 
							if($evaModelColumn['EvaModelColumn']['primarykey'] == 1){
								echo $this->Html->link('Primary Key', '#', array('class' => 'button_pk'));
							}
							else{
								echo $this->Html->link('Not Primary Key', '#', array('class' => 'button_not_pk'));
							}
						?>&nbsp;
					</td>
					<td><?php echo $evaModelColumn['EvaModelColumn']['deleted']; ?>&nbsp;</td>
					<td><?php echo $evaModelColumn['EvaModelColumn']['deleted_date']; ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evaModelColumn['EvaModelColumn']['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaModelColumn['EvaModelColumn']['name'])); ?>
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evaModelColumn['EvaModelColumn']['id']),array('class'=>'action_table_edit_data_no_ajax','title'=>'edit '.$evaModelColumn['EvaModelColumn']['name'])); ?>
						<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evaModelColumn['EvaModelColumn']['id']), array('class'=>'action_table_delete_data_no_ajax','title'=>'delete '.$evaModelColumn['EvaModelColumn']['name']), sprintf(__('Are you sure you want to delete # %s?', true), $evaModelColumn['EvaModelColumn']['id'])); ?>
						<!--<a href="javascript:;" id="<?php //echo $evaModelColumn['EvaModelColumn']['id'];?>" class="action_table_delete_data" title="delete <?php //echo $evaModelColumn['EvaModelColumn']['name'];?>">Delete</a>-->
					</td>
				</tr>
				<?php endforeach; ?>
			<tbody>
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
				<li><?php echo $this->Html->link(__('New Eva Model Column', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?></li>
				<li><?php echo $this->Html->link(__('List Eva Models', true), array('controller' => 'eva_models', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('List Eva Column Rules', true), array('controller' => 'eva_column_rules', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Column Rule', true), array('controller' => 'eva_column_rules', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			</ul>
		</div>
	</div>
</div>
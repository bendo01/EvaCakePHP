<div id="accordion">
	<h3><a href="#"><?php __('Eva Applications');?></a></h3>
	<div>
			<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
				<thead>	
					<tr>
							<th><?php echo $this->Paginator->sort('id');?></th>
							<th><?php echo $this->Paginator->sort('name');?></th>
							<th><?php echo $this->Paginator->sort('title');?></th>
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
						foreach ($evaApplications as $evaApplication):
							$class = null;
							if ($i++ % 2 == 0) {
								$class = ' class="odd"';
							}
						?>
						<tr<?php echo $class;?>>
							<td><?php //echo $evaApplication['EvaApplication']['id']; 
									echo $i;
								?>&nbsp;</td>
							<td><?php echo $evaApplication['EvaApplication']['name']; ?>&nbsp;</td>
							<td><?php echo $evaApplication['EvaApplication']['title']; ?>&nbsp;</td>
							<td><?php echo $evaApplication['EvaApplication']['description']; ?>&nbsp;</td>
							<td><?php echo $evaApplication['EvaApplication']['deleted']; ?>&nbsp;</td>
							<td><?php echo $evaApplication['EvaApplication']['deleted_date']; ?>&nbsp;</td>
							<td><?php echo $evaApplication['EvaApplication']['created_by']; ?>&nbsp;</td>
							<td><?php echo $evaApplication['EvaApplication']['modified_by']; ?>&nbsp;</td>
							<td><?php echo $evaApplication['EvaApplication']['created']; ?>&nbsp;</td>
							<td><?php echo $evaApplication['EvaApplication']['modified']; ?>&nbsp;</td>
							<td class="actions">
								<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evaApplication['EvaApplication']['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaApplication['EvaApplication']['name'])); ?>
								<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evaApplication['EvaApplication']['id']),array('class'=>'action_table_edit_data_no_ajax','title'=>'edit '.$evaApplication['EvaApplication']['name'])); ?>
								<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evaApplication['EvaApplication']['id']),array('class'=>'action_table_delete_data_no_ajax','title'=>'delete '.$evaApplication['EvaApplication']['name']), sprintf(__('Are you sure you want to delete # %s?', true), $evaApplication['EvaApplication']['name'])); ?>
								<!--<a href="javascript:;" id="<?php //echo $evaApplication['EvaApplication']['id'];?>" class="action_table_delete_data" title="delete <?php //echo $evaApplication['EvaApplication']['name'];?>">Delete</a> -->
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
					<li><?php echo $this->Html->link(__('New Eva Application', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?></li>
					<li><?php echo $this->Html->link(__('List Eva Db Connections', true), array('controller' => 'eva_db_connections', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
					<li><?php echo $this->Html->link(__('New Eva Db Connection', true), array('controller' => 'eva_db_connections', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				</ul>
			</div>
	</div>
</div>
<div id="accordion">
	<h3><a href="#"><?php __('Eva Has And Belong To Many Associations');?></a></h3>
	<div class="evaHasAndBelongToManyAssociations index">
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>
				<tr>
						<th><?php echo $this->Paginator->sort('id');?></th>
						<th><?php echo $this->Paginator->sort('name');?></th>
						<th><?php echo $this->Paginator->sort('eva_model_id');?></th>
						<th><?php echo $this->Paginator->sort('associated_model_id');?></th>
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
				foreach ($evaHasAndBelongToManyAssociations as $evaHasAndBelongToManyAssociation):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="odd"';
					}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $i; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['name']; ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($evaHasAndBelongToManyAssociation['EvaModel']['name'], array('controller' => 'eva_models', 'action' => 'view', $evaHasAndBelongToManyAssociation['EvaModel']['id'])); ?>
					</td>
					<td><?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['associated_model_id']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['description']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['deleted']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['deleted_date']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['created_by']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['modified_by']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['created']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['modified']; ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['name'])); ?>
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['id']),array('class'=>'action_table_edit_data_no_ajax','title'=>'edit '.$evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['name'])); ?>
						<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['id']) ,array('class'=>'action_table_delete_data_no_ajax','title'=>'delete '.$evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['name']), sprintf(__('Are you sure you want to delete # %s?', true), $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['id'])); ?>
						<!--<a href="javascript:;" id="<?php //echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['id'];?>" class="action_table_delete_data" title="delete <?php //echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['name'];?>">Delete</a>-->
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
				<li><?php echo $this->Html->link(__('New Eva Has And Belong To Many Association', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?></li>
				<li><?php echo $this->Html->link(__('List Eva Models', true), array('controller' => 'eva_models', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('List Eva Has And Belong To Many Association Details', true), array('controller' => 'eva_has_and_belong_to_many_association_details', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<!--
				<li><?php //echo $this->Html->link(__('New Eva Has And Belong To Many Association Detail', true), array('controller' => 'eva_has_and_belong_to_many_association_details', 'action' => 'add'),array('class'=>'list_action_add_new_data')); ?> </li>
				-->
			</ul>
		</div>
	</div>
</div>
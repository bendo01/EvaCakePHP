<div id="accordion">	
	<h3><a href="#"><?php __('Eva Has And Belong To Many Association Details');?></a></h3>
	<div class="evaHasAndBelongToManyAssociationDetails index">
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>
				<tr>
						<th><?php echo $this->Paginator->sort('id');?></th>
						<th><?php echo $this->Paginator->sort('name');?></th>
						<th><?php echo $this->Paginator->sort('eva_HABTM_id');?></th>
						<th><?php echo $this->Paginator->sort('className');?></th>
						<th><?php echo $this->Paginator->sort('joinTable');?></th>
						<th><?php echo $this->Paginator->sort('with');?></th>
						<th><?php echo $this->Paginator->sort('foreignKey');?></th>
						<th><?php echo $this->Paginator->sort('associationForeignKey');?></th>
						<th><?php echo $this->Paginator->sort('unique');?></th>
						<th><?php echo $this->Paginator->sort('conditions');?></th>
						<th><?php echo $this->Paginator->sort('fields');?></th>
						<th><?php echo $this->Paginator->sort('order');?></th>
						<th><?php echo $this->Paginator->sort('limit');?></th>
						<th><?php echo $this->Paginator->sort('offset');?></th>
						<th class="actions"><?php __('Actions');?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				foreach ($evaHasAndBelongToManyAssociationDetails as $evaHasAndBelongToManyAssociationDetail):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="odd"';
					}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $i; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['name']; ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociation']['name'], array('controller' => 'eva_has_and_belong_to_many_associations', 'action' => 'view', $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociation']['id'])); ?>
					</td>
					<td><?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['className']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['joinTable']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['with']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['foreignKey']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['associationForeignKey']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['unique']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['conditions']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['fields']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['order']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['limit']; ?>&nbsp;</td>
					<td><?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['offset']; ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['name'])); ?>
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['id']),array('class'=>'action_table_edit_data','title'=>'edit '.$evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['name'])); ?>
						<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['id'])); ?>
						<a href="javascript:;" id="<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['id'];?>" class="action_table_delete_data" title="delete <?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['name'];?>">Delete</a>
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
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
		  	<?php echo $this->Paginator->numbers(array('separator'=>' '));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
		</div>
		<div class="actions">
			<ul>
				<!--<li><?php //echo $this->Html->link(__('New Eva Has And Belong To Many Association Detail', true), array('action' => 'add'),array('class'=>'list_action_add_new_data')); ?></li>-->
				<li><?php echo $this->Html->link(__('List Eva Has And Belong To Many Associations', true), array('controller' => 'eva_has_and_belong_to_many_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Has And Belong To Many Association', true), array('controller' => 'eva_has_and_belong_to_many_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data')); ?> </li>
				
			</ul>
		</div>
	</div>
</div>
<div id="accordion">
	<h3><a href="#"><?php __('Eva Has One Association Details');?></a></h3>
	<div class="evaHasOneAssociationDetails index">
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>
				<tr>
						<th><?php echo $this->Paginator->sort('id');?></th>
						<th><?php echo $this->Paginator->sort('name');?></th>
						<th><?php echo $this->Paginator->sort('className');?></th>
						<th><?php echo $this->Paginator->sort('foreignKey');?></th>
						<th><?php echo $this->Paginator->sort('conditions');?></th>
						<th><?php echo $this->Paginator->sort('fields');?></th>
						<th><?php echo $this->Paginator->sort('order');?></th>
						<th><?php echo $this->Paginator->sort('eva_has_one_association_id');?></th>
						<th><?php echo $this->Paginator->sort('dependent');?></th>
						<th><?php echo $this->Paginator->sort('deleted');?></th>
						<th><?php echo $this->Paginator->sort('deleted_date');?></th>
						<th class="actions"><?php __('Actions');?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				foreach ($evaHasOneAssociationDetails as $evaHasOneAssociationDetail):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="odd"';
					}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['id']; ?>&nbsp;</td>
					<td><?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['name']; ?>&nbsp;</td>
					<td><?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['className']; ?>&nbsp;</td>
					<td><?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['foreignKey']; ?>&nbsp;</td>
					<td><?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['conditions']; ?>&nbsp;</td>
					<td><?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['fields']; ?>&nbsp;</td>
					<td><?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['order']; ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($evaHasOneAssociationDetail['EvaHasOneAssociation']['name'], array('controller' => 'eva_has_one_associations', 'action' => 'view', $evaHasOneAssociationDetail['EvaHasOneAssociation']['id'])); ?>
					</td>
					<td><?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['dependent']; ?>&nbsp;</td>
					<td><?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['deleted']; ?>&nbsp;</td>
					<td><?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['deleted_date']; ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['name'])); ?>
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['id']),array('class'=>'action_table_edit_data_no_ajax','title'=>'edit '.$evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['name'])); ?>
						<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['id']), array('class'=>'action_table_delete_data_no_ajax','title'=>'delete '.$evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['name']), sprintf(__('Are you sure you want to delete # %s?', true), $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['name'])); ?>
						<!--<a href="javascript:;" id="<?php //echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['id'];?>" class="action_table_delete_data" title="delete <?php //echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['name'];?>">Delete</a>-->
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
				<!--<li><?php //echo $this->Html->link(__('New Eva Has One Association Detail', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?></li>-->
				<li><?php echo $this->Html->link(__('List Eva Has One Associations', true), array('controller' => 'eva_has_one_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Has One Association', true), array('controller' => 'eva_has_one_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			</ul>
		</div>
	</div>
</div>
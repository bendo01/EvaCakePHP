<div id="accordion">	
	<h3><a href="#"><?php __('Eva Belong To Association Details');?></a></h3>
	<div class="evaBelongToAssociationDetails index">
		<table border="0" cellspacing="5" cellpadding="5" class="mylayout">
			<thead>
				<tr>
						<th><?php echo $this->Paginator->sort('id');?></th>
						<th><?php echo $this->Paginator->sort('name');?></th>
						<th><?php echo $this->Paginator->sort('className');?></th>
						<th><?php echo $this->Paginator->sort('foreignKey');?></th>
						<th><?php echo $this->Paginator->sort('conditions');?></th>
						<th><?php echo $this->Paginator->sort('eva_belong_to_association_id');?></th>
						<th><?php echo $this->Paginator->sort('type');?></th>
						<th><?php echo $this->Paginator->sort('fields');?></th>
						<th><?php echo $this->Paginator->sort('order');?></th>
						<th><?php echo $this->Paginator->sort('counterCache');?></th>
						<th><?php echo $this->Paginator->sort('counterScope');?></th>
						<th><?php echo $this->Paginator->sort('deleted');?></th>
						<th><?php echo $this->Paginator->sort('deleted_date');?></th>
						
						<th class="actions"><?php __('Actions');?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				foreach ($evaBelongToAssociationDetails as $evaBelongToAssociationDetail):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="odd"';
					}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $i; ?>&nbsp;</td>
					<td><?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['name']; ?>&nbsp;</td>
					<td><?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['className']; ?>&nbsp;</td>
					<td><?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['foreignKey']; ?>&nbsp;</td>
					<td><?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['conditions']; ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($evaBelongToAssociationDetail['EvaBelongToAssociation']['name'], array('controller' => 'eva_belong_to_associations', 'action' => 'view', $evaBelongToAssociationDetail['EvaBelongToAssociation']['id'])); ?>
					</td>
					<td><?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['type']; ?>&nbsp;</td>
					<td><?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['fields']; ?>&nbsp;</td>
					<td><?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['order']; ?>&nbsp;</td>
					<td><?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['counterCache']; ?>&nbsp;</td>
					<td><?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['counterScope']; ?>&nbsp;</td>
					<td><?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['deleted']; ?>&nbsp;</td>
					<td><?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['deleted_date']; ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['name'])); ?>
						<?php //echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['id']),array('class'=>'action_table_edit_data','title'=>'edit '.$evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['name'])); ?>
						<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['id'])); ?>
						<!--<a href="javascript:;" id="<?php //echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['id'];?>" class="action_table_delete_data" title="delete <?php //echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['name'];?>">Delete</a> -->
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
				<li><?php //echo $this->Html->link(__('New Eva Belong To Association Detail', true), array('action' => 'add'),array('class'=>'list_action_add_new_data')); ?></li>
				<li><?php echo $this->Html->link(__('List Eva Belong To Associations', true), array('controller' => 'eva_belong_to_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Belong To Association', true), array('controller' => 'eva_belong_to_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data')); ?> </li>
			</ul>
		</div>
	</div>
</div>
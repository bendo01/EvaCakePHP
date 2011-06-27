<div id="accordion">
	<h3><a href="#"><?php __('Eva Has Many Association Details');?></a></h3>
	<div class="evaHasManyAssociationDetails index">
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
						<th><?php echo $this->Paginator->sort('eva_has_many_association_id');?></th>
						<th><?php echo $this->Paginator->sort('offset');?></th>
						<th><?php echo $this->Paginator->sort('exclusive');?></th>
						<th><?php echo $this->Paginator->sort('finderQuery');?></th>
						<th><?php echo $this->Paginator->sort('limit');?></th>
						<th><?php echo $this->Paginator->sort('dependent');?></th>
						<th class="actions"><?php __('Actions');?></th>
				</tr>
			</thead>
			<tbody>
					<?php
					$i = 0;
					foreach ($evaHasManyAssociationDetails as $evaHasManyAssociationDetail):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="odd"';
						}
					?>
					<tr<?php echo $class;?>>
						<td><?php echo $i; ?>&nbsp;</td>
						<td><?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['name']; ?>&nbsp;</td>
						<td><?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['className']; ?>&nbsp;</td>
						<td><?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['foreignKey']; ?>&nbsp;</td>
						<td><?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['conditions']; ?>&nbsp;</td>
						<td><?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['fields']; ?>&nbsp;</td>
						<td><?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['order']; ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($evaHasManyAssociationDetail['EvaHasManyAssociation']['name'], array('controller' => 'eva_has_many_associations', 'action' => 'view', $evaHasManyAssociationDetail['EvaHasManyAssociation']['id'])); ?>
						</td>
						<td><?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['offset']; ?>&nbsp;</td>
						<td><?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['exclusive']; ?>&nbsp;</td>
						<td><?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['finderQuery']; ?>&nbsp;</td>
						<td><?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['limit']; ?>&nbsp;</td>
						<td><?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['dependent']; ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('View', true), array('action' => 'view', $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['id']),array('class'=>'action_table_view_data','title'=>'view '.$evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['name'])); ?>
							<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['id']),array('class'=>'action_table_edit_data','title'=>'edit '.$evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['name'])); ?>
							<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['id'])); ?>
							<a href="javascript:;" id="<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['id'];?>" class="action_table_delete_data" title="delete <?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['name'];?>">Delete</a>
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
				<!--<li><?php //echo $this->Html->link(__('New Eva Has Many Association Detail', true), array('action' => 'add'),array('class'=>'list_action_add_new_data')); ?></li>-->
				<li><?php echo $this->Html->link(__('List Eva Has Many Associations', true), array('controller' => 'eva_has_many_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Has Many Association', true), array('controller' => 'eva_has_many_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data')); ?> </li>
			</ul>
		</div>
	</div>
</div>
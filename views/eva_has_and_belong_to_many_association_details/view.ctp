<div id="accordion">
	<h3><a href="#"><?php  __('Eva Has And Belong To Many Association Detail');?></a></h3>
	<div class="evaHasAndBelongToManyAssociationDetails view">
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['name']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Has And Belong To Many Association'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociation']['name'], array('controller' => 'eva_has_and_belong_to_many_associations', 'action' => 'view', $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociation']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ClassName'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['className']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('JoinTable'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['joinTable']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('With'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['with']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ForeignKey'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['foreignKey']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('AssociationForeignKey'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['associationForeignKey']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unique'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['unique']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Conditions'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['conditions']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fields'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['fields']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['order']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Limit'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['limit']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Offset'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['offset']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('FinderQuery'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['finderQuery']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('DeleteQuery'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['deleteQuery']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('InsertQuery'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['insertQuery']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['deleted']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['deleted_date']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['created_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['modified_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<div class="actions">
			<ul>
				<!--<li><?php //echo $this->Html->link(__('Edit Eva Has And Belong To Many Association Detail', true), array('action' => 'edit', $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['id'])); ?> </li> -->
				<!--<li><?php //echo $this->Html->link(__('Delete Eva Has And Belong To Many Association Detail', true), array('action' => 'delete', $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $evaHasAndBelongToManyAssociationDetail['EvaHasAndBelongToManyAssociationDetail']['id'])); ?> </li> -->
				<li><?php echo $this->Html->link(__('List Eva Has And Belong To Many Association Details', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Has And Belong To Many Associations', true), array('controller' => 'eva_has_and_belong_to_many_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<!--
				<li><?php //echo $this->Html->link(__('New Eva Has And Belong To Many Association Detail', true), array('action' => 'add')); ?> </li>
				-->
				<li><?php echo $this->Html->link(__('New Eva Has And Belong To Many Association', true), array('controller' => 'eva_has_and_belong_to_many_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			</ul>
		</div>
	</div>
</div>
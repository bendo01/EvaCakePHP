<div id="accordion">
	<h3><a href="#"><?php  __('Eva Has One Association Detail');?></a></h3>
	<div class="evaHasOneAssociationDetails view">
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['name']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ClassName'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['className']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ForeignKey'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['foreignKey']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Conditions'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['conditions']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fields'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['fields']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['order']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Has One Association'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($evaHasOneAssociationDetail['EvaHasOneAssociation']['name'], array('controller' => 'eva_has_one_associations', 'action' => 'view', $evaHasOneAssociationDetail['EvaHasOneAssociation']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dependent'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['dependent']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['deleted']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['deleted_date']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['created_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['modified_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('List Eva Has One Associations', true), array('controller' => 'eva_has_one_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Has One Association', true), array('controller' => 'eva_has_one_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Has One Association Details', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<!--
				<li><?php //echo $this->Html->link(__('Edit Eva Has One Association Detail', true), array('action' => 'edit', $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['id'])); ?> </li>
				<li><?php //echo $this->Html->link(__('Delete Eva Has One Association Detail', true), array('action' => 'delete', $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $evaHasOneAssociationDetail['EvaHasOneAssociationDetail']['id'])); ?> </li>
				<li><?php //echo $this->Html->link(__('New Eva Has One Association Detail', true), array('action' => 'add')); ?> </li>
				-->
			</ul>
		</div>
	</div>
	
</div>
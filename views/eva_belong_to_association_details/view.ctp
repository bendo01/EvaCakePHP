<div id="accordion">
	<h3><a href="#"><?php  __('Eva Belong To Association Detail');?></a></h3>
	<div class="evaBelongToAssociationDetails view">
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['name']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ClassName'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['className']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ForeignKey'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['foreignKey']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Conditions'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['conditions']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Belong To Association'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($evaBelongToAssociationDetail['EvaBelongToAssociation']['name'], array('controller' => 'eva_belong_to_associations', 'action' => 'view', $evaBelongToAssociationDetail['EvaBelongToAssociation']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['type']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fields'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['fields']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['order']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CounterCache'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['counterCache']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CounterScope'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['counterScope']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['deleted']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['deleted_date']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['created_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['modified_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<div class="actions">
			<ul>
				<li><?php //echo $this->Html->link(__('Edit Eva Belong To Association Detail', true), array('action' => 'edit', $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['id'])); ?> </li>
				<li><?php //echo $this->Html->link(__('Delete Eva Belong To Association Detail', true), array('action' => 'delete', $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $evaBelongToAssociationDetail['EvaBelongToAssociationDetail']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Belong To Association Details', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<!-- <li><?php //echo $this->Html->link(__('New Eva Belong To Association Detail', true), array('action' => 'add')); ?> </li>-->
				<li><?php echo $this->Html->link(__('List Eva Belong To Associations', true), array('controller' => 'eva_belong_to_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Belong To Association', true), array('controller' => 'eva_belong_to_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li> 
			</ul>
		</div>
	</div>
	
</div>
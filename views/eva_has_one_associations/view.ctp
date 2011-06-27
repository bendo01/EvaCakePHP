<div id="accordion">
	<h3><a href="#"><?php  __('Eva Has One Association');?></a></h3>
	<div class="evaHasOneAssociations view">
	
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociation['EvaHasOneAssociation']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociation['EvaHasOneAssociation']['name']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociation['EvaHasOneAssociation']['description']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Model'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($evaHasOneAssociation['EvaModel']['name'], array('controller' => 'eva_models', 'action' => 'view', $evaHasOneAssociation['EvaModel']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Associated Model Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php //echo $evaHasOneAssociation['EvaHasOneAssociation']['associated_model_id']; ?>
				<?php echo $this->Html->link($evaHasOneAssociation['EvaHasOneAssociation']['associated_model_name'], array('controller' => 'eva_models', 'action' => 'view', $evaHasOneAssociation['EvaHasOneAssociation']['associated_model_id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociation['EvaHasOneAssociation']['deleted']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociation['EvaHasOneAssociation']['deleted_date']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociation['EvaHasOneAssociation']['created_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociation['EvaHasOneAssociation']['modified_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociation['EvaHasOneAssociation']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasOneAssociation['EvaHasOneAssociation']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Eva Has One Association', true), array('action' => 'edit', $evaHasOneAssociation['EvaHasOneAssociation']['id']),array('class'=>'list_action_edit_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('Delete Eva Has One Association', true), array('action' => 'delete', $evaHasOneAssociation['EvaHasOneAssociation']['id']), array('class'=>'list_action_delete_new_data_no_ajax'), sprintf(__('Are you sure you want to delete # %s?', true), $evaHasOneAssociation['EvaHasOneAssociation']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Has One Associations', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Has One Association', true), array('action' => 'add'),array('class'=>'list_action_add_new_data'),array('class'=>'list_action_add_new_data')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Models', true), array('controller' => 'eva_models', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Has One Association Details', true), array('controller' => 'eva_has_one_association_details', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_new_data'),array('class'=>'list_action_add_new_data')); ?> </li>
				<!--
				<li><?php //echo $this->Html->link(__('New Eva Has One Association Detail', true), array('controller' => 'eva_has_one_association_details', 'action' => 'add')); ?> </li>
				-->
			</ul>
		</div>
	</div>
	
</div>
<?php if (!empty($evaHasOneAssociation['EvaHasOneAssociationDetail'])):?>
<div class="detail_accordion">
	<h3><a href="#"><?php __('Related Eva Has One Association Details');?></a></h3>
	<div class="related">
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['name'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ClassName');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['className'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ForeignKey');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['foreignKey'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Conditions');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['conditions'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fields');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['fields'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['order'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Has One Association Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['eva_has_one_association_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dependent');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['dependent'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['deleted'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['deleted_date'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['created_by'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['modified_by'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['created'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasOneAssociation['EvaHasOneAssociationDetail']['modified'];?>
&nbsp;</dd>
		</dl>
	
	<!--
		<div class="actions">
			<ul>
				<li><?php //echo $this->Html->link(__('Edit Eva Has One Association Detail', true), array('controller' => 'eva_has_one_association_details', 'action' => 'edit', $evaHasOneAssociation['EvaHasOneAssociationDetail']['id'])); ?></li>
			</ul>
		</div>
	-->
	</div>
</div>
<?php endif; ?>	
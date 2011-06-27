<div id="accordion">
	<h3><a href="#"><?php  __('Eva Has Many Association');?></a></h3>
	<div class="evaHasManyAssociations view">
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociation['EvaHasManyAssociation']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociation['EvaHasManyAssociation']['name']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociation['EvaHasManyAssociation']['description']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Model'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($evaHasManyAssociation['EvaModel']['name'], array('controller' => 'eva_models', 'action' => 'view', $evaHasManyAssociation['EvaModel']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Associated Model'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php //echo $evaHasManyAssociation['EvaHasManyAssociation']['associated_model_id']; 
					echo $this->Html->link($evaHasManyAssociation['EvaHasManyAssociation']['associated_model_name'], array('controller' => 'eva_models', 'action' => 'view', $evaHasManyAssociation['EvaHasManyAssociation']['associated_model_id']));	
				?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociation['EvaHasManyAssociation']['deleted']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociation['EvaHasManyAssociation']['deleted_date']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociation['EvaHasManyAssociation']['created_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociation['EvaHasManyAssociation']['modified_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociation['EvaHasManyAssociation']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociation['EvaHasManyAssociation']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<br />
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Eva Has Many Association', true), array('action' => 'edit', $evaHasManyAssociation['EvaHasManyAssociation']['id']),array('class'=>'list_action_edit_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('Delete Eva Has Many Association', true), array('action' => 'delete', $evaHasManyAssociation['EvaHasManyAssociation']['id']), array('class'=>'list_action_delete_new_data'), sprintf(__('Are you sure you want to delete # %s?', true), $evaHasManyAssociation['EvaHasManyAssociation']['id'])); ?>
					<!--<a href="#" class="list_action_delete_new_data">Delete Eva Has Many Association</a>-->
					</li>
				<li><?php echo $this->Html->link(__('List Eva Has Many Associations', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Has Many Association', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Models', true), array('controller' => 'eva_models', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('List Eva Has Many Association Details', true), array('controller' => 'eva_has_many_association_details', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<!--
				<li><?php //echo $this->Html->link(__('New Eva Has Many Association Detail', true), array('controller' => 'eva_has_many_association_details', 'action' => 'add'),array('class'=>'list_action_add_new_data')); ?> </li>
				-->
				<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_new_data'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				
			</ul>
		</div>
	</div>
</div>
<?php if (!empty($evaHasManyAssociation['EvaHasManyAssociationDetail'])):?>
<div class="detail_accordion">
	<h3><a href="#"><?php __('Related Eva Has Many Association Details');?></a></h3>
	<div class="related">
	
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['name'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ClassName');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['className'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ForeignKey');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['foreignKey'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Conditions');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['conditions'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fields');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['fields'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['order'];?>
&nbsp;</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Offset');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['offset'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Exclusive');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['exclusive'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('FinderQuery');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['finderQuery'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Limit');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['limit'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dependent');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['dependent'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['deleted'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['deleted_date'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['created_by'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['modified_by'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['created'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasManyAssociation['EvaHasManyAssociationDetail']['modified'];?>
&nbsp;</dd>
		</dl>
		<!--
		<div class="actions">
			<ul>
				<li><?php //echo $this->Html->link(__('Edit Eva Has Many Association Detail', true), array('controller' => 'eva_has_many_association_details', 'action' => 'edit', $evaHasManyAssociation['EvaHasManyAssociationDetail']['id']),array('class'=>'list_action_edit_new_data')); ?></li>
			</ul>
		</div>
		-->
	</div>
</div>
<?php endif; ?>
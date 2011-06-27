<?php 
	//$evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['eva_has_and_belong_to_m'];
	//$evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['eva_has_and_belong_to_many_association_id'] = $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['eva_has_and_belong_to_m'];
	//unset($evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['eva_has_and_belong_to_m']);
	//pr($evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']);
?>

<div id="accordion">
	
		<h3><a href="#"><?php  __('Eva Has And Belong To Many Association');?></a></h3>
		<div>
			<dl><?php $i = 0; $class = ' class="altrow"';?>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['id']; ?>
					&nbsp;
				</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['name']; ?>
					&nbsp;
				</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Model'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo $this->Html->link($evaHasAndBelongToManyAssociation['EvaModel']['name'], array('controller' => 'eva_models', 'action' => 'view', $evaHasAndBelongToManyAssociation['EvaModel']['id'])); ?>
					&nbsp;
				</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Associated Model Id'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php //echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['associated_model_id']; ?>
					<?php echo $this->Html->link($evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['associated_model_name'], array('controller' => 'eva_models', 'action' => 'view', $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['associated_model_id'])); ?>
					&nbsp;
				</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['description']; ?>
					&nbsp;
				</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['deleted']; ?>
					&nbsp;
				</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['deleted_date']; ?>
					&nbsp;
				</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['created_by']; ?>
					&nbsp;
				</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['modified_by']; ?>
					&nbsp;
				</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['created']; ?>
					&nbsp;
				</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
					<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['modified']; ?>
					&nbsp;
				</dd>
			</dl>
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('Edit Eva Has And Belong To Many Association', true), array('action' => 'edit', $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['id']),array('class'=>'list_action_edit_new_data_no_ajax')); ?> </li>
					<li><?php echo $this->Html->link(__('Delete Eva Has And Belong To Many Association', true), array('action' => 'delete', $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['id']),array('class'=>'list_action_delete_new_data','title'=>'delete '.$evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['name']), sprintf(__('Are you sure you want to delete # %s?', true), $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociation']['id'])); ?> </li>
					<li><?php echo $this->Html->link(__('List Eva Has And Belong To Many Associations', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>

					<li><?php echo $this->Html->link(__('List Eva Models', true), array('controller' => 'eva_models', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>

					<li><?php echo $this->Html->link(__('List Eva Has And Belong To Many Association Details', true), array('controller' => 'eva_has_and_belong_to_many_association_details', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
					<li><?php echo $this->Html->link(__('New Eva Has And Belong To Many Association', true), array('action' => 'add'),array('class'=>'list_action_add_new_data')); ?> </li>

					<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_new_data')); ?> </li>
					<!--
					<li><?php //echo $this->Html->link(__('New Eva Has And Belong To Many Association Detail', true), array('controller' => 'eva_has_and_belong_to_many_association_details', 'action' => 'add')); ?> </li>
					-->
				</ul>
			</div>
		</div>
	
</div>
<?php if (!empty($evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail'])):?>
<div class="detail_accordion">
	<h3><a href="#"><?php __('Related Eva Has And Belong To Many Association Details');?></a></h3>
	<div class="related">
		
	
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Has And Belong To Many Association Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['eva_has_and_belong_to_many_association_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ClassName');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['className'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('JoinTable');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['joinTable'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('With');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['with'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ForeignKey');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['foreignKey'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('AssociationForeignKey');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['associationForeignKey'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unique');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['unique'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Conditions');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['conditions'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fields');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['fields'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['order'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Limit');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['limit'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Offset');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['offset'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('FinderQuery');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['finderQuery'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('DeleteQuery');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['deleteQuery'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('InsertQuery');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['insertQuery'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['deleted'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['deleted_date'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['created_by'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['modified_by'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['created'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['modified'];?>
&nbsp;</dd>
		</dl>
	
	<!--
		<div class="actions">
			<ul>
				<li><?php //echo $this->Html->link(__('Edit Eva Has And Belong To Many Association Detail', true), array('controller' => 'eva_has_and_belong_to_many_association_details', 'action' => 'edit', $evaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['id'])); ?></li>
			</ul>
		</div>-->
	</div>
</div>
<?php endif; ?>
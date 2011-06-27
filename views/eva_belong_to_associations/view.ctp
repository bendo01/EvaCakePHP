<div id="accordion">
	<h3><a href="#"><?php  __('Eva Belong To Association');?></a></h3>
	<div class="evaBelongToAssociations view">
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociation['EvaBelongToAssociation']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociation['EvaBelongToAssociation']['name']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Model'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($evaBelongToAssociation['EvaModel']['name'], array('controller' => 'eva_models', 'action' => 'view', $evaBelongToAssociation['EvaModel']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Associated Model Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php //echo $evaBelongToAssociation['EvaBelongToAssociation']['associated_model_id']; ?>
				<?php echo $this->Html->link($evaBelongToAssociation['EvaBelongToAssociation']['associated_model_name'], array('controller' => 'eva_models', 'action' => 'view', $evaBelongToAssociation['EvaBelongToAssociation']['associated_model_id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociation['EvaBelongToAssociation']['description']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociation['EvaBelongToAssociation']['deleted']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociation['EvaBelongToAssociation']['deleted_date']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociation['EvaBelongToAssociation']['created_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociation['EvaBelongToAssociation']['modified_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociation['EvaBelongToAssociation']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaBelongToAssociation['EvaBelongToAssociation']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Eva Belong To Association', true), array('action' => 'edit', $evaBelongToAssociation['EvaBelongToAssociation']['id']),array('class'=>'list_action_edit_new_data')); ?> </li>
				<li><?php echo $this->Html->link(__('Delete Eva Belong To Association', true), array('action' => 'delete', $evaBelongToAssociation['EvaBelongToAssociation']['id']), array('class'=>'list_action_delete_new_data_no_ajax','title'=> 'Delete '.$evaBelongToAssociation['EvaBelongToAssociation']['name']), sprintf(__('Are you sure you want to delete # %s?', true), $evaBelongToAssociation['EvaBelongToAssociation']['id'])); ?> 
					<!--<a href="javascript:;" id="<?php //echo $evaBelongToAssociation['EvaBelongToAssociation']['id']; ?>" class="list_action_delete_new_data">Delete Eva Belong To Association</a>-->
				</li>
				<li><?php echo $this->Html->link(__('List Eva Belong To Associations', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Belong To Association', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Models', true), array('controller' => 'eva_models', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('List Eva Belong To Association Details', true), array('controller' => 'eva_belong_to_association_details', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<!--<li><?php //echo $this->Html->link(__('New Eva Belong To Association Detail', true), array('controller' => 'eva_belong_to_association_details', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>-->		
			</ul>
		</div>
	</div>
</div>

<?php if (!empty($evaBelongToAssociation['EvaBelongToAssociationDetail'])):?>
<div class="detail_accordion">
	<h3><a href="#"><?php __('Related Eva Belong To Association Details');?></a></h3>
		<div class="related">
			<dl>	<?php $i = 0; $class = ' class="altrow"';?>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['id'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['name'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ClassName');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['className'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ForeignKey');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['foreignKey'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Conditions');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['conditions'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Belong To Association Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['eva_belong_to_association_id'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['type'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fields');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['fields'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['order'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CounterCache');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['counterCache'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CounterScope');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['counterScope'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['deleted'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['deleted_date'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['created_by'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['modified_by'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['created'];?>
	&nbsp;</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $evaBelongToAssociation['EvaBelongToAssociationDetail']['modified'];?>
	&nbsp;</dd>
			</dl>
	
		<!--
			<div class="actions">
				<ul>
					<li><?php //echo $this->Html->link(__('Edit Eva Belong To Association Detail', true), array('controller' => 'eva_belong_to_association_details', 'action' => 'edit', $evaBelongToAssociation['EvaBelongToAssociationDetail']['id'])); ?></li>
				</ul>
			</div>
		</div>
		-->
	</div>
</div>
<?php endif; ?>
<div id="accordion">
	<h3><a href="#"><?php  __('Eva Has Many Association Detail');?></a></h3>
	<div class="evaHasManyAssociationDetails view">
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['name']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ClassName'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['className']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ForeignKey'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['foreignKey']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Conditions'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['conditions']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fields'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['fields']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['order']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Has Many Association'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($evaHasManyAssociationDetail['EvaHasManyAssociation']['name'], array('controller' => 'eva_has_many_associations', 'action' => 'view', $evaHasManyAssociationDetail['EvaHasManyAssociation']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Offset'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['offset']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Exclusive'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['exclusive']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('FinderQuery'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['finderQuery']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Limit'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['limit']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dependent'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['dependent']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['deleted']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['deleted_date']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['created_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['modified_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<div class="actions">
			<ul>
				<!--<li><?php //echo $this->Html->link(__('Edit Eva Has Many Association Detail', true), array('action' => 'edit', $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['id'])); ?> </li> -->
				<!--<li><?php //echo $this->Html->link(__('Delete Eva Has Many Association Detail', true), array('action' => 'delete', $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $evaHasManyAssociationDetail['EvaHasManyAssociationDetail']['id'])); ?> </li> -->
				<li><?php echo $this->Html->link(__('List Eva Has Many Association Details', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<!--<li><?php //echo $this->Html->link(__('New Eva Has Many Association Detail', true), array('action' => 'add')); ?> </li>-->
				<li><?php echo $this->Html->link(__('List Eva Has Many Associations', true), array('controller' => 'eva_has_many_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<!--
				<li><?php //echo $this->Html->link(__('New Eva Has Many Association', true), array('controller' => 'eva_has_many_associations', 'action' => 'add')); ?> </li>-->
			</ul>
		</div>
	</div>
</div>
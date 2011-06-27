<div id="accordion">	
	<h3><a href="#"><?php  __('Eva Model Column Rule Detail');?></a></h3>
	<div class="evaModelColumnRuleDetails view">
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['name']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Message'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['message']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('AllowEmpty'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['allowEmpty']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Required'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['required']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['last']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('On'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['on']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Column Rule'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($evaModelColumnRuleDetail['EvaColumnRule']['name'], array('controller' => 'eva_column_rules', 'action' => 'view', $evaModelColumnRuleDetail['EvaColumnRule']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eva Basic Rule'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($evaModelColumnRuleDetail['EvaBasicRule']['name'], array('controller' => 'eva_basic_rules', 'action' => 'view', $evaModelColumnRuleDetail['EvaBasicRule']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['deleted']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted Date'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['deleted_date']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['created_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['modified_by']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<br />
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Eva Model Column Rule Detail', true), array('action' => 'edit', $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['id']),array('class'=>'list_action_edit_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('Delete Eva Model Column Rule Detail', true), array('action' => 'delete', $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['id']), array('class'=>'list_action_delete_new_data_no_ajax'), sprintf(__('Are you sure you want to delete # %s?', true), $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['id'])); ?>
					<!--<a href="javascript:;" id="<?php //echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['id'];?>" class="list_action_delete_new_data" title="delete <?php //echo $evaModelColumnRuleDetail['EvaModelColumnRuleDetail']['name'];?>">Delete</a> -->
				</li>
				<li><?php echo $this->Html->link(__('List Eva Model Column Rule Details', true), array('action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Model Column Rule Detail', true), array('action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Column Rules', true), array('controller' => 'eva_column_rules', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Basic Rules', true), array('controller' => 'eva_basic_rules', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				
				<li><?php echo $this->Html->link(__('New Eva Column Rule', true), array('controller' => 'eva_column_rules', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Basic Rule', true), array('controller' => 'eva_basic_rules', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				
			</ul>
		</div>
	</div>
	
</div>
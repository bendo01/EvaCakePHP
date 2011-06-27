<div id="accordion">
	<h3><a href="#"><?php __('Eva EvaModelColumnRuleDetail');?></a></h3>
	<div class="evaModelColumnRuleDetails form">
	<?php echo $this->Form->create('EvaModelColumnRuleDetail');?>
		<fieldset>
	 		<legend><?php __('Edit Eva Model Column Rule Detail'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name');
			echo $this->Form->input('message');
			echo $this->Form->hidden('allowEmpty',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('required',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('last',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('on');
			echo $this->Form->input('eva_column_rule_id',array('class'=>'jqui_select'));
			echo $this->Form->input('eva_basic_rule_id',array('class'=>'jqui_select'));
			echo $this->Form->hidden('deleted',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('deleted_date',array('type'=>'text','class'=>'jqui_datepicker'));
			echo $this->Form->input('created_by');
			echo $this->Form->input('modified_by');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('EvaModelColumnRuleDetail.id')), array('class'=>'list_action_delete_new_data_no_ajax'), sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('EvaModelColumnRuleDetail.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Eva Model Column Rule Details', true), array('action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax'));?></li>
			<li><?php echo $this->Html->link(__('List Eva Column Rules', true), array('controller' => 'eva_column_rules', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Column Rule', true), array('controller' => 'eva_column_rules', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('List Eva Basic Rules', true), array('controller' => 'eva_basic_rules', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Basic Rule', true), array('controller' => 'eva_basic_rules', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
		</ul>
	</div>
	</div>
</div>
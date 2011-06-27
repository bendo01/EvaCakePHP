<div id="accordion">
	<h3><a href="#"><?php __('Eva EvaColumnRule Form');?></a></h3>
	<div class="evaColumnRules form">
	<?php echo $this->Form->create('EvaColumnRule');?>
		<fieldset>
	 		<legend><?php __('Edit Eva Column Rule'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name');
			echo $this->Form->input('eva_model_column_id',array('class'=>'jqui_select'));
			echo $this->Form->hidden('deleted',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('deleted_date',array('type'=>'text','class'=>'jqui_datepicker'));
			echo $this->Form->input('created_by');
			echo $this->Form->input('modified_by');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	<div class="actions">
		<ul>

			<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('EvaColumnRule.id')), array('class'=>'list_action_delete_new_data_no_ajax'), sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('EvaColumnRule.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Eva Column Rules', true), array('action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax'));?></li>
			<li><?php echo $this->Html->link(__('List Eva Model Columns', true), array('controller' => 'eva_model_columns', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Model Column', true), array('controller' => 'eva_model_columns', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('List Eva Model Column Rule Details', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Model Column Rule Detail', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
		</ul>
	</div>
	</div>
</div>
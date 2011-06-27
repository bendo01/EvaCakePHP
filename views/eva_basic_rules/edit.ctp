<div id="accordion">
	<h3><a href="#"><?php __('Eva Basic Rule Form');?></a></h3>
	<div class="evaBasicRules form">
	<?php echo $this->Form->create('EvaBasicRule');?>
		<fieldset>
	 		<legend><?php __('Edit Eva Basic Rule'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name');
			echo $this->Form->input('description');
			echo $this->Form->hidden('deleted',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('deleted_date',array('type'=>'text','class'=>'jqui_datepicker'));
			echo $this->Form->input('created_by');
			echo $this->Form->input('modified_by');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	<div class="actions">
		<ul>

			<li><?php echo $this->Html->link(__('List Eva Basic Rules', true), array('action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax'));?></li>
			<li><?php echo $this->Html->link(__('List Eva Model Column Rule Details', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Model Column Rule Detail', true), array('controller' => 'eva_model_column_rule_details', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
		</ul>
	</div>
</div>
</div>
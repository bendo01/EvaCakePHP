<div id="accordion">
	<h3><a href="#"><?php __('Eva EvaModelColumn');?></a></h3>
	<div class="evaModelColumns form">
	<?php echo $this->Form->create('EvaModelColumn');?>
		<fieldset>
	 		<legend><?php __('Edit Eva Model Column'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name');
			echo $this->Form->input('alias');
			echo $this->Form->input('type',array('options'=>array('integer'=>'integer','string'=>'string','text'=>'text','float'=>'float','datetime'=>'datetime','date'=>'date','time'=>'time','binary'=>'binary','boolean'=>'boolean','number'=>'number','inet'=>'inet'),'class'=>'jqui_select'));
			echo $this->Form->input('length');
			echo $this->Form->input('eva_model_id',array('class'=>'jqui_select'));
			echo $this->Form->input('allowNull',array('class'=>'jqui_checkbox'));
			echo $this->Form->input('primarykey',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('deleted',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('deleted_date',array('type'=>'text','class'=>'jqui_datepicker'));
			echo $this->Form->input('created_by');
			echo $this->Form->input('modified_by');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('EvaModelColumn.id')), array('class'=>'list_action_delete_new_data_no_ajax'), sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('EvaModelColumn.name'))); ?></li>
			<li><?php echo $this->Html->link(__('List Eva Model Columns', true), array('action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax'));?></li>
			<li><?php echo $this->Html->link(__('List Eva Models', true), array('controller' => 'eva_models', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('List Eva Column Rules', true), array('controller' => 'eva_column_rules', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Column Rule', true), array('controller' => 'eva_column_rules', 'action' => 'add'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
		</ul>
	</div>
	</div>
</div>
<div id="accordion">
	<h3><a href="#"><?php __('Eva Db Connection Form');?></a></h3>
	<div class="evaDbConnections form">
	<?php echo $this->Form->create('EvaDbConnection');?>
		<fieldset>
	 		<legend><?php __('Add Eva Db Connection'); ?></legend>
		
			<?php
				echo $this->Form->input('name');
				//echo $this->Form->input('driver');
				echo $this->Form->input('driver',array('options'=>array('postgres'=>'PostgreSQL','mysql'=>'MySQL'),'class'=>'jqui_select'));
				echo $this->Form->input('host');
				echo $this->Form->input('login');
				echo $this->Form->input('password');
				echo $this->Form->input('database');
				echo $this->Form->input('schema');
			?>
		
			<?php
				echo $this->Form->input('port');
				echo $this->Form->input('persistent',array('class'=>'jqui_checkbox'));
				echo $this->Form->input('eva_application_id',array('class'=>'jqui_select'));
				echo $this->Form->hidden('deleted',array('class'=>'jqui_checkbox'));
				echo $this->Form->hidden('deleted_date',array('type'=>'text','class'=>'jqui_datepicker'));
				echo $this->Form->input('created_by');
				echo $this->Form->input('modified_by');
			?>
		
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('List Eva Db Connections', true), array('action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax'));?></li>
				<li><?php echo $this->Html->link(__('List Eva Applications', true), array('controller' => 'eva_applications', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Application', true), array('controller' => 'eva_applications', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('List Eva Models', true), array('controller' => 'eva_models', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			</ul>
		</div>
	</div>
</div>
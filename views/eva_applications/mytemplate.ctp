<div id="accordion">
	<h3><a href="#"><?php __('Eva Application Form');?></a></h3>
	<div class="evaApplications form">
	<?php echo $this->Form->create('EvaApplication');?>
		<fieldset>
	 		<legend><?php __('Add Eva Application'); ?></legend>
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('title');
			echo $this->Form->input('description');
			echo $this->Form->input('deleted',array('class'=>'jqui_checkbox'));
			echo $this->Form->input('deleted_date',array('type'=>'text','class'=>'jqui_datepicker'));
			echo $this->Form->input('created_by');
			echo $this->Form->input('modified_by');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('List Eva Applications', true), array('action' => 'index'),array('class'=>'list_action_add_list_data'));?></li>
				<li><?php echo $this->Html->link(__('List Eva Db Connections', true), array('controller' => 'eva_db_connections', 'action' => 'index'),array('class'=>'list_action_add_list_data')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Db Connection', true), array('controller' => 'eva_db_connections', 'action' => 'add'),array('class'=>'list_action_add_new_data')); ?> </li>
			</ul>
		</div>
	</div>
	
</div>
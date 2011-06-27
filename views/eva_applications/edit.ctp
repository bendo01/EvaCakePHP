<div id="accordion">
	<h3><a href="#"><?php __('Eva Application Form');?></a></h3>
	<div class="evaApplications form">
		<?php echo $this->Form->create('EvaApplication');?>
			<fieldset>
		 		<legend><?php __('Edit Eva Application'); ?></legend>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('name');
				echo $this->Form->input('title');
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
				<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('EvaApplication.id')), array('class'=>'list_action_delete_new_data_no_ajax'), sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('EvaApplication.name'))); ?></li>
				<li><?php echo $this->Html->link(__('List Eva Applications', true), array('action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax'));?></li>
				<li><?php echo $this->Html->link(__('List Eva Db Connections', true), array('controller' => 'eva_db_connections', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
				<li><?php echo $this->Html->link(__('New Eva Db Connection', true), array('controller' => 'eva_db_connections', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			</ul>
		</div>
	</div>
</div>
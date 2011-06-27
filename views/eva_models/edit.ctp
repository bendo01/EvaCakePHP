<div id="accordion">
	<h3><a href="#"><?php __('Eva Model Form');?></a></h3>
	<div class="evaModels form">
	<?php echo $this->Form->create('EvaModel');?>
		<fieldset>
	 		<legend><?php __('Edit Eva Model'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name');
			echo $this->Form->input('admin_section',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('alias');
			echo $this->Form->hidden('cacheQueries',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('cacheSources',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('displayField');
			echo $this->Form->hidden('findQueryType');
			echo $this->Form->hidden('logTransactions',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('order');
			echo $this->Form->hidden('primaryKey');
			echo $this->Form->hidden('recursive');
			echo $this->Form->hidden('table');
			echo $this->Form->hidden('tablePrefix');
			echo $this->Form->hidden('useDbConfig');
			echo $this->Form->hidden('useTable');
			echo $this->Form->input('eva_db_connection_id',array('class'=>'jqui_select'));
			echo $this->Form->hidden('deleted',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('deleted_date',array('type'=>'text','class'=>'jqui_datepicker'));
			echo $this->Form->input('created_by');
			echo $this->Form->input('modified_by');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	<div class="actions">
		<ul>

			<li><?php echo $this->Html->link(__('List Eva Models', true), array('action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax'));?></li>
			<li><?php echo $this->Html->link(__('List Eva Db Connections', true), array('controller' => 'eva_db_connections', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Db Connection', true), array('controller' => 'eva_db_connections', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('List Eva Belong To Associations', true), array('controller' => 'eva_belong_to_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Belong To Association', true), array('controller' => 'eva_belong_to_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('List Eva Has And Belong To Many Associations', true), array('controller' => 'eva_has_and_belong_to_many_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Has And Belong To Many Association', true), array('controller' => 'eva_has_and_belong_to_many_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('List Eva Has Many Associations', true), array('controller' => 'eva_has_many_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Has Many Association', true), array('controller' => 'eva_has_many_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('List Eva Has One Associations', true), array('controller' => 'eva_has_one_associations', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Has One Association', true), array('controller' => 'eva_has_one_associations', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('List Eva Model Columns', true), array('controller' => 'eva_model_columns', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Model Column', true), array('controller' => 'eva_model_columns', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
		</ul>
	</div>
	</div>
</div>
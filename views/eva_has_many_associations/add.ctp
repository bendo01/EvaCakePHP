<div id="accordion">
	<h3><a href="#"><?php __('Eva EvaHasManyAssociation Form');?></a></h3>
	<div class="evaHasManyAssociations form">
	<?php echo $this->Form->create('EvaHasManyAssociation');?>
		<fieldset>
	 		<legend><?php __('Add Eva Has Many Association'); ?></legend>
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('description');
			echo $this->Form->input('eva_model_id',array('class'=>'jqui_select'));
			echo $this->Form->input('associated_model_id',array('class'=>'jqui_select'));
			echo $this->Form->hidden('deleted',array('class'=>'jqui_checkbox'));
			echo $this->Form->hidden('deleted_date',array('type'=>'text','class'=>'jqui_datepicker'));
			echo $this->Form->input('created_by');
			echo $this->Form->input('modified_by');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('List Eva Has Many Associations', true), array('action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax'));?></li>
			<li><?php echo $this->Html->link(__('List Eva Models', true), array('controller' => 'eva_models', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('New Eva Model', true), array('controller' => 'eva_models', 'action' => 'add'),array('class'=>'list_action_add_new_data_no_ajax')); ?> </li>
			<li><?php echo $this->Html->link(__('List Eva Has Many Association Details', true), array('controller' => 'eva_has_many_association_details', 'action' => 'index'),array('class'=>'list_action_add_list_data_no_ajax')); ?> </li>
			<!--
			<li><?php //echo $this->Html->link(__('New Eva Has Many Association Detail', true), array('controller' => 'eva_has_many_association_details', 'action' => 'add')); ?> </li>-->
		</ul>
	</div>
	</div>
</div>
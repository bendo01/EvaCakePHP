<div class="evaHasOneAssociationDetails form">
<?php echo $this->Form->create('EvaHasOneAssociationDetail');?>
	<fieldset>
 		<legend><?php __('Add Eva Has One Association Detail'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('className');
		echo $this->Form->input('foreignKey');
		echo $this->Form->input('conditions');
		echo $this->Form->input('fields');
		echo $this->Form->input('order');
		echo $this->Form->input('eva_has_one_association_id',array('class'=>'jqui_select'));
		echo $this->Form->input('dependent',array('class'=>'jqui_checkbox'));
		echo $this->Form->input('deleted',array('class'=>'jqui_checkbox'));
		echo $this->Form->input('deleted_date',array('type'=>'text','class'=>'jqui_datepicker'));
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
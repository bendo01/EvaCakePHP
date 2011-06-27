<div class="evaHasManyAssociationDetails form">
<?php echo $this->Form->create('EvaHasManyAssociationDetail');?>
	<fieldset>
 		<legend><?php __('Add Eva Has Many Association Detail'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('className');
		echo $this->Form->input('foreignKey');
		echo $this->Form->input('conditions');
		echo $this->Form->input('fields');
		echo $this->Form->input('order');
		echo $this->Form->input('eva_has_many_association_id',array('class'=>'jqui_select'));
		echo $this->Form->input('offset');
		echo $this->Form->input('exclusive',array('class'=>'jqui_checkbox'));
		echo $this->Form->input('finderQuery');
		echo $this->Form->input('limit');
		echo $this->Form->input('dependent',array('class'=>'jqui_checkbox'));
		echo $this->Form->input('deleted',array('class'=>'jqui_checkbox'));
		echo $this->Form->input('deleted_date',array('type'=>'text','class'=>'jqui_datepicker'));
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
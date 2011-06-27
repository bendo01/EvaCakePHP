<div class="evaHasAndBelongToManyAssociationDetails form">
<?php echo $this->Form->create('EvaHasAndBelongToManyAssociationDetail');?>
	<fieldset>
 		<legend><?php __('Add Eva Has And Belong To Many Association Detail'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('eva_has_and_belong_to_many_association_id',array('class'=>'jqui_select'));
		echo $this->Form->input('className');
		echo $this->Form->input('joinTable');
		echo $this->Form->input('with');
		echo $this->Form->input('foreignKey');
		echo $this->Form->input('associationForeignKey');
		echo $this->Form->input('unique',array('class'=>'jqui_checkbox'));
		echo $this->Form->input('conditions');
		echo $this->Form->input('fields');
		echo $this->Form->input('order');
		echo $this->Form->input('limit');
		echo $this->Form->input('offset');
		echo $this->Form->input('finderQuery');
		echo $this->Form->input('deleteQuery');
		echo $this->Form->input('insertQuery');
		echo $this->Form->input('deleted',array('class'=>'jqui_checkbox'));
		echo $this->Form->input('deleted_date',array('type'=>'text','class'=>'jqui_datepicker'));
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
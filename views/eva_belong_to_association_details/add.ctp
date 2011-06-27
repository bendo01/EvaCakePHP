<div class="evaBelongToAssociationDetails form">
<?php echo $this->Form->create('EvaBelongToAssociationDetail');?>
	<fieldset>
 		<legend><?php __('Add Eva Belong To Association Detail'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('className');
		echo $this->Form->input('foreignKey');
		echo $this->Form->hidden('conditions');
		echo $this->Form->input('eva_belong_to_association_id',array('class'=>'jqui_select'));
		echo $this->Form->hidden('type');
		echo $this->Form->hidden('fields');
		echo $this->Form->hidden('order');
		echo $this->Form->hidden('counterCache');
		echo $this->Form->hidden('counterScope');
		echo $this->Form->hidden('deleted',array('class'=>'jqui_checkbox'));
		echo $this->Form->hidden('deleted_date',array('type'=>'text','class'=>'jqui_datepicker'));
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
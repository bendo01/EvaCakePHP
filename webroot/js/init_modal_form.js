// JavaScript Document
$(document).ready(function(){
	$('.jqui_datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
	$('input:submit').button();
	$('div.submit button, input:submit').button();
	$('div.actions ul li a.add_new_data').button({
		icons:{primary:'ui-icon-plus'}
	});
	//$('#EvaApplicationDeleted').button();
	$('table.mylayout tbody tr.odd td.actions a.action_table_view_data').button({
		text: false,
		icons:{primary:'ui-icon-info'}
	});
	$('table.mylayout tbody tr.odd td.actions a.action_table_edit_data').button({
		text: false,
		icons:{primary:'ui-icon-pencil'}
	});
	$('table.mylayout tbody tr.odd td.actions a.action_table_delete_data').button({
		text: false,
		icons:{primary:'ui-icon-circle-close'}
	});
	$('table.mylayout tbody tr td.actions a.action_table_view_data').button({
		text: false,
		icons:{primary:'ui-icon-info'}
	});
	$('table.mylayout tbody tr td.actions a.action_table_edit_data').button({
		text: false,
		icons:{primary:'ui-icon-pencil'}
	});
	$('table.mylayout tbody tr td.actions a.action_table_delete_data').button({
		text: false,
		icons:{primary:'ui-icon-circle-close'}
	});
});
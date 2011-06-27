// JavaScript Document
$(document).ready(function(){
	$("#treetable").acts_as_tree_table();
	//$('table.mytree tbody tr.altrow td.actions a').button();
	$('table.mytree tbody tr td.actions a.tree_view_info').button({
		text: false,
		icons:{primary:'ui-icon-info'}
	});
	$('table.mytree tbody tr td.actions a.action_table_edit_data').button({
		text: false,
		icons:{primary:'ui-icon-pencil'}
	});
	$('table.mytree tbody tr td.actions a.tree_move_up_info').button({
		text: false,
		icons:{primary:'ui-icon-arrowthick-1-n'}
	});
	$('table.mytree tbody tr td.actions a.tree_move_down_info').button({
		text: false,
		icons:{primary:'ui-icon-arrowthick-1-s'}
	});
	$('table.mytree tbody tr td.actions a.tree_disabled_info').button({
		text: false,
		icons:{primary:'ui-icon-bullet'}
	});
	$('table.mytree tbody tr td.actions a.tree_enabled_info').button({
		text: false,
		icons:{primary:'ui-icon-lightbulb'}
	});
	$('table.mytree tbody tr td.actions a.tree_delete_info').button({
		text: false,
		icons:{primary:'ui-icon-circle-close'}
	});
	$('div.addbutton a').button();
	$('div.navigator a').button();
});

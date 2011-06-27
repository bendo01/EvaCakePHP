// JavaScript Document
$(document).ready(function(){
	$('#site_info').addClass('ui-corner-tl');
	$('#site_info').addClass('ui-corner-tr');
	$('#menu_block').addClass('ui-corner-br');
	$('#menu_block').addClass('ui-corner-bl');
	$('div.EvaFrontPageIcons').addClass('ui-corner-all');
	$('ul.sf-menu > li:first').addClass('ui-corner-bl');
	
	/*form option*/
	$('input.jqui_checkbox').button();
	$('input.jqui_datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
	$('input:submit').button();
	$('input.jqui_checkbox').button();
	$('div.submit button, input:submit').button();
	$('select.jqui_select').selectmenu();
	
	$('div.actions ul li a.list_action_add_new_data').button({
		icons:{primary:'ui-icon-plus'}
	});
	$('div.actions ul li a.list_action_add_new_data_no_ajax').button({
		icons:{primary:'ui-icon-plus'}
	});
	$('div.actions ul li a.list_action_edit_new_data').button({
		icons:{primary:'ui-icon-pencil'}
	});
	$('div.actions ul li a.list_action_edit_new_data_no_ajax').button({
		icons:{primary:'ui-icon-pencil'}
	});
	$('div.actions ul li a.list_action_delete_new_data').button({
		icons:{primary:'ui-icon-circle-close'}
	});
	$('div.actions ul li a.list_action_delete_new_data_no_ajax').button({
		icons:{primary:'ui-icon-circle-close'}
	});
	$('div.actions ul li a.list_action_add_list_data').button({
		icons:{primary:'ui-icon-grip-solid-horizontal'}
	});
	$('div.actions ul li a.list_action_add_list_data_no_ajax').button({
		icons:{primary:'ui-icon-grip-solid-horizontal'}
	});
	$('table.mylayout tbody tr.odd td.actions a.action_table_view_data').button({
		text: false,
		icons:{primary:'ui-icon-info'}
	});
	$('table.mylayout tbody tr.odd td.actions a.action_table_view_data_no_ajax').button({
		text: false,
		icons:{primary:'ui-icon-info'}
	});
	$('table.mylayout tbody tr.odd td.actions a.action_table_edit_data').button({
		text: false,
		icons:{primary:'ui-icon-pencil'}
	});
	$('table.mylayout tbody tr.odd td.actions a.action_table_edit_data_no_ajax').button({
		text: false,
		icons:{primary:'ui-icon-pencil'}
	});
	$('table.mylayout tbody tr.odd td.actions a.action_table_delete_data').button({
		text: false,
		icons:{primary:'ui-icon-circle-close'}
	});
	
	$('table.mylayout tbody tr.odd td.actions a.action_table_delete_data_no_ajax').button({
		text: false,
		icons:{primary:'ui-icon-circle-close'}
	});
	
	$('table.mylayout tbody tr td.actions a.action_table_view_data').button({
		text: false,
		icons:{primary:'ui-icon-info'}
	});
	$('table.mylayout tbody tr td.actions a.action_table_view_data_no_ajax').button({
		text: false,
		icons:{primary:'ui-icon-info'}
	});
	$('table.mylayout tbody tr td.actions a.action_table_edit_data').button({
		text: false,
		icons:{primary:'ui-icon-pencil'}
	});
	$('table.mylayout tbody tr td.actions a.action_table_edit_data_no_ajax').button({
		text: false,
		icons:{primary:'ui-icon-pencil'}
	});
	$('table.mylayout tbody tr td.actions a.action_table_delete_data').button({
		text: false,
		icons:{primary:'ui-icon-circle-close'}
	});
	$('table.mylayout tbody tr td.actions a.action_table_delete_data_no_ajax').button({
		text: false,
		icons:{primary:'ui-icon-circle-close'}
	});
	/*special button*/
	$('div.actions ul li a.generate-application-icon').button({
		icons:{primary:'ui-icon-wrench'}
	});
	
	$('div.actions ul li a.check-sequence-application-icon').button({
		icons:{primary:'ui-icon-gear'}
	});
	/*table special button primary key*/
	$('table.mylayout tbody tr.odd td a.button_pk').button({
		text: false,
		icons:{primary:'ui-icon-key'}
	});
	$('table.mylayout tbody tr td a.button_pk').button({
		text: false,
		icons:{primary:'ui-icon-key'}
	});
	/*table special button not primary key*/
	$('table.mylayout tbody tr.odd td a.button_not_pk').button({
		text: false,
		icons:{primary:'ui-icon-document-b'}
	});
	$('table.mylayout tbody tr td a.button_not_pk').button({
		text: false,
		icons:{primary:'ui-icon-document-b'}
	});
	/*table special button not null*/
	$('table.mylayout tbody tr.odd td a.button_not_null_column').button({
		text: false,
		icons:{primary:'ui-icon-check'}
	});
	$('table.mylayout tbody tr td a.button_not_null_column').button({
		text: false,
		icons:{primary:'ui-icon-check'}
	});
	/*table special button null column*/
	$('table.mylayout tbody tr.odd td a.button_null_column').button({
		text: false,
		icons:{primary:'ui-icon-cancel'}
	});
	$('table.mylayout tbody tr td a.button_null_column').button({
		text: false,
		icons:{primary:'ui-icon-cancel'}
	});
	/*paginate option*/
	$('div.paging > span.disabled').button({ 
		disabled: true,
		icons:{primary:'ui-icon-seek-prev'}
	});
	$('div.paging > span > a.prev').button({
		icons:{primary:'ui-icon-seek-prev'},
	});
	$('div.paging > span.current').button();
	$('div.paging > span > a').button();
	$('div.paging > span > a.next').button({
		icons:{secondary:'ui-icon-seek-next'}
	});
	/*accordion option*/
	$('div#accordion').accordion({ autoHeight: false });
	$('div.detail_accordion').accordion({ autoHeight: false });
	
	/*qtip option for link title*/
	
	$('a[title]').qtip({
		position: {
		      corner: {
		         target: 'topMiddle',
		         tooltip: 'bottomMiddle'
		      }
		},
		style: { 
			name: 'cream',
			tip: 'bottomMiddle',
			textAlign: 'center',
			border: {
			   width: 1,
			   radius: 5
			},
		}
	});
	
	/*flash message handler*/
	if($('div#flashMessage').length != 0 && $('.form-error').length == 0){
		var flashMessageClass = $('div#flashMessage').attr('class');
		//alert(flashMessageClass);
		if(flashMessageClass=='success'){
			$.jGrowl($('div#flashMessage').text(),{ life: 5000 , theme: 'success'});
			$('div#flashMessage').remove();
		}
		else{
			$.jGrowl($('div#flashMessage').text(),{ life: 5000 , theme: 'error-message'});
			$('div#flashMessage').remove();
		}
	}
	
	if($('div#flashMessage').length != 0 && $('.form-error').length != 0){
		$.jGrowl($('div#flashMessage').text(),{ sticky: true , theme: 'message'});
		$('div#flashMessage').remove();	
		if($('.form-error').length != 0){
			$('.form-error').each(function(){
				var labelname = $(this).prev().text();
				var errormessage = $(this).next().text();
				$(this).next().hide();
				//$.jGrowl(labelname + ' ' + errormessage,{ sticky: true, theme: 'error-message'});
				$.jGrowl(errormessage,{ sticky: true, theme: 'error-message'});
			});
		}
		
	}
});
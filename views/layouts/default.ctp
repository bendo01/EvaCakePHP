<?php echo $this->Html->docType('xhtml11'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>

<?php echo $this->Html->charset(); 
	//pr($this->params);?>
<?php
	echo $this->Html->css(
		array(
				'/evacakephp/css/reset',
				'/evacakephp/css/jquery_ui/redmond/jquery-ui-1.8.11.custom',
				'/evacakephp/css/jquery_ui_add_ons_filament_group/jquery.ui.selectmenu',
				//'jquery_add_ons_erichynds/jquery.multiselect',
				//'jquery_add_ons_erichynds/jquery.multiselect.filter',
				'/evacakephp/css/init',
				'/evacakephp/css/text',
				'/evacakephp/css/jqgrid/ui.jqgrid',
				'/evacakephp/css/twitter_log/front',
				//'twitter_log/tipsy',
				'/evacakephp/css/superfish/superfish',
				'/evacakephp/css/jgrowl/jquery.jgrowl',
				'/evacakephp/css/fancybox/jquery.fancybox-1.3.4',
				//'colorbox/colorbox.css',
				'/evacakephp/css/markitup/skins/simple/style',
				'/evacakephp/css/markitup/sets/default/style',
				
		)
	);
	
	if($this->params['controller'] == 'eva_menus' && $this->params['plugin'] == 'evacakephp'){
		echo $this->Html->css(array(
			'/evacakephp/css/act_as_tree/jquery.acts_as_tree_table',
			'/evacakephp/css/act_as_tree/init_tree_table'
		));
	}
	
?>
<script type="text/javascript">
		var webroot = "<?php echo $this->webroot;?>";
</script>
<?php
	//main engine
	echo $this->Html->script(
		array(
				'/evacakephp/js/jquery/jquery',
				'/evacakephp/js/jquery_ui/jquery-ui-1.8.11.custom.min',
				'/evacakephp/js/jqgrid/i18n/grid.locale-en',
				'/evacakephp/js/jqgrid/jquery.jqGrid.min'
		)
	);
?>
<?php
	//jquery ui extend by filament group
	
	echo $this->Html->script(
		array(
				'/evacakephp/js/jquery_ui_add_ons_filament_group/jquery.ui.selectmenu'
		)
	);
	
	//jquery ui extend by erichynds
	/*
	echo $this->Html->script(
		array(
				'jquery_ui_add_ons_erichynds/jquery.multiselect.min',
				'jquery_ui_add_ons_erichynds/jquery.multiselect.filter.min'

		)
	);
	*/
?>

<?php
	//markitup pop and tipsy
	echo $this->Html->script(
		array(
				'/evacakephp/js/markitup/jquery.markitup',
				'/evacakephp/js/markitup/sets/set',
				'/evacakephp/js/jclock/jquery.jclock',
				'/evacakephp/js/jquery_pop/jquery.pop',
				'/evacakephp/js/jquery_tipsy/jquery.tipsy'
		)
	);
?>
<?php
	//superfish
	echo $this->Html->script(
		array(
				'/evacakephp/js/superfish/hoverIntent',
				'/evacakephp/js/superfish/superfish',
				'/evacakephp/js/superfish/supersubs'
		)
	);
?>
<?php
	//jquery qtip
	echo $this->Html->script(
		array(
				'/evacakephp/js/jquery_qtip/jquery.qtip-1.0.0-rc3.min',
				'/evacakephp/js/jquery_qtip/jquery.qtip.debug-1.0.0-rc3'
		)
	);
?>

<?php
	//fancybox
	echo $this->Html->script(
		array(
				'/evacakephp/js/fancybox/jquery.easing-1.3.pack',
				'/evacakephp/js/fancybox/jquery.mousewheel-3.0.4.pack',
				'/evacakephp/js/fancybox/jquery.fancybox-1.3.4.pack'
		)
	);
	//colorbox
	//echo $this->Html->script(
		//array(
			//'colorbox/jquery.colorbox-min.js'
		//)
	//);
?>

<?php
	//pr($this->params['controller']);
	//menu
	//pr($this->params);
	if($this->params['controller'] == 'eva_menus' && $this->params['plugin'] == 'evacakephp'){
		echo $this->Html->script(array(
			'/evacakephp/js/jquery_act_as_tree/jquery.acts_as_tree_table',
			'/evacakephp/js/jquery_act_as_tree/init_jquery_acts_as_tree_table'
		));
	}
	
?>

<?php
	//jgrowl
	echo $this->Html->script(
		array(
				'/evacakephp/js/jgrowl/jquery.jgrowl_minimized',
				'/evacakephp/js/modernizr/modernizr-1.7.min'
		)
	);
?>


<?php
	//init
	echo $this->Html->script(
		array(
				'/evacakephp/js/init',
				'/evacakephp/js/init_login',
				'/evacakephp/js/init_superfish'
		)
	);
?>
<script type="text/javascript">
$(document).ready(function(){
	jQuery.fn.log = function (msg) {
	      console.log("%s: %o", msg, this);
	      return this;
	};
	/*fancybox modal form*/
	
	$('a.list_action_add_new_data').fancybox({
	        'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'ajax',
			'autoDimensions'    : true,
			'autoScale'         : true,
			//'width'             : 600,
			//'height':1000,
			onComplete	        : function(){
				$('input.jqui_checkbox').button();
				$('input.jqui_datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
				$('select.jqui_select').selectmenu();
				$('.jqui_multipleselect').buttonset();
				//$('div.select > div.checkbox').button();
				//if user click submit button
				//$("#AddForm").bind('submit', function() {
				<?php echo '$("#'.Inflector::classify($this->params['controller']).'AddForm").bind("submit", function() {'; ?>
					//$.jGrowl("Stick this!", { sticky: true, theme: 'notice' });
					//console.log($(this).serializeArray());
					$.fancybox.showActivity();
					$.ajax({
						type	: 'POST',
						dataType: 'json',
						cache	: false,
						url		: "<?php
							if(isset($this->params['plugin'])){
								echo $this->webroot.$this->params['plugin'].DS.$this->params['controller'].DS;
							}
							else{
								echo $this->webroot.$this->params['controller'].DS;
							}
						?>ajax_add_validate",
						data	: $(this).serializeArray(),
						success: function(data) {
							$.fancybox.hideActivity();
							if(data == true){
								$.jGrowl('data succesfully added',{ life: 5000 , theme: 'success'});
								parent.$.fancybox.close();
							}
							else{
								$.jGrowl('the data cannot be safe',{ sticky: true, theme: 'error-message'});
								$.each(data,function(key, value){
									//$.jGrowl(key + ' ' + value,{ sticky: true, theme: 'error-message'});
									$.jGrowl(value,{ sticky: true, theme: 'error-message'});
								});
							}
						}
					});
					return false;
				});
			},
			onClosed           : function(){
				$('div.jGrowl').jGrowl("close");
			}
	});
	
	$('a.action_table_edit_data').fancybox({
	        'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'ajax',
			'autoDimensions'    : true,
			'autoScale'    : true,
			onComplete	        : function(){
				$('input.jqui_checkbox').button();
				$('input.jqui_datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
				$('select.jqui_select').selectmenu();
				$('.jqui_multipleselect').buttonset();
				//if user click submit button
				<?php echo '$("#'.Inflector::classify($this->params['controller']).'EditForm").bind("submit", function() {'; ?>
					//$.jGrowl("Stick this!", { sticky: true, theme: 'notice' });
					//console.log($(this).serializeArray());
					$.fancybox.showActivity();
					$.ajax({
						type	: 'POST',
						dataType: 'json',
						cache	: false,
						url		: "<?php
							if(isset($this->params['plugin'])){
								echo $this->webroot.$this->params['plugin'].DS.$this->params['controller'].DS;
							}
							else{
								echo $this->webroot.$this->params['controller'].DS;
							}
							
						?>ajax_edit_validate",
						data	: $(this).serializeArray(),
						success: function(data) {
							$.fancybox.hideActivity();
							if(data == true){
								$.jGrowl('data succesfully edited',{ life: 5000 , theme: 'success'});
								parent.$.fancybox.close();
							}
							else{
								$.jGrowl('the data cannot be safe',{ sticky: true, theme: 'error-message'});
								$.each(data,function(key, value){
									//$.jGrowl(key + ' ' + value,{ sticky: true, theme: 'error-message'});
									$.jGrowl(value,{ sticky: true, theme: 'error-message'});
								});
							}
						}
					});
					return false;
				});
			},
			onClosed           : function(){
				$("div.jGrowl").jGrowl("close");
			}
	});
	
	$('a.list_action_edit_new_data').fancybox({
	        'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'ajax',
			'autoDimensions'    : false,
			'autoScale'         : false,
			//'width':800,
			onComplete	        : function(){
				$('input.jqui_checkbox').button();
				$('input.jqui_datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
				$('select.jqui_select').selectmenu();
				$('.jqui_multipleselect').buttonset();
				//if user click submit button
				<?php echo '$("#'.Inflector::classify($this->params['controller']).'EditForm").bind("submit", function() {'; ?>
					//$.jGrowl("Stick this!", { sticky: true, theme: 'notice' });
					//console.log($(this).serializeArray());
					$.fancybox.showActivity();
					$.ajax({
						type	: 'POST',
						dataType: 'json',
						cache	: false,
						url		: "<?php
							if(isset($this->params['plugin'])){
								echo $this->webroot.$this->params['plugin'].DS.$this->params['controller'].DS;
							}
							else{
								echo $this->webroot.$this->params['controller'].DS;
							}
							
						?>ajax_edit_validate",
						data	: $(this).serializeArray(),
						success: function(data) {
							$.fancybox.hideActivity();
							if(data == true){
								$.jGrowl('data succesfully edited',{ life: 5000 , theme: 'success'});
								parent.$.fancybox.close();
							}
							else{
								$.jGrowl('the data cannot be safe',{ sticky: true, theme: 'error-message'});
								$.each(data,function(key, value){
									//$.jGrowl(key + ' ' + value,{ sticky: true, theme: 'error-message'});
									$.jGrowl(value,{ sticky: true, theme: 'error-message'});
								});
							}
						}
					});
					return false;
				});
			},
			onClosed           : function(){
				$('div.jGrowl').jGrowl("close");
			}
	});
	
	/* fancy box delete confirmation message */
	
	function fancyAlert(msg) {
	    jQuery.fancybox({
	        'modal' : true,
	        'content' : "<div style=\"margin:1px;width:240px;\">"+msg+"</div>"
	    });
	}

	function fancyConfirm(msg,delete_id,callback) {
	    var ret;
	    jQuery.fancybox({
	        modal : true,
	        content : "<div style=\"margin:1px;width:240px;\">"+msg+"<div style=\"text-align:right;margin-top:10px;\"><input id=\"fancyConfirm_cancel\" style=\"margin:3px;padding:0px;\" type=\"button\" value=\"Cancel\"><input id=\"fancyConfirm_ok\" style=\"margin:3px;padding:0px;\" type=\"button\" value=\"Ok\"></div></div>",
	        onComplete : function() {
	            jQuery('#fancyConfirm_cancel').click(function() {
	                ret = 'cancel'; 
	                $.fancybox.close();
	            })
	            jQuery('#fancyConfirm_ok').click(function() {
					$.fancybox.showActivity();
					$.ajax({
						type: "POST",
						url : "<?php
							if(isset($this->params['plugin'])){
								echo $this->webroot.$this->params['plugin'].DS.$this->params['controller'].DS;
							}
							else{
								echo $this->webroot.$this->params['controller'].DS;
							}
							
						?>ajax_delete_validate",
						data: {DeleteId:delete_id},
						success: function(response){
							if(response == 'true'){
								ret = true;
							}
							else{
								ret = false;
							}
						},
						error:function (XMLHttpRequest, textStatus, errorThrown) {
							ret = textStatus;
						}
					});
	                $.fancybox.close();
	            })
	        },
	        onClosed : function() {
	            //callback.call(this,ret);
				if (typeof callback == 'function'){ callback.call(this, ret); }
	        }
	    });
	}
	
	$('a.action_table_delete_data').click(function(){
		var delete_id = this.id;
		fancyConfirm('are you sure you want to delete?',delete_id,function(ret){
			if(ret == true){
				$.jGrowl('Delete Success',{ life: 5000, theme: 'success'});
			}
			else if(ret == false){
				$.jGrowl('Delete failed',{ life: 5000, theme: 'error-message'});
			}
			else if(ret == 'cancel'){
				$.jGrowl('Delete canceled',{ life: 5000, theme: 'notice'});
			}
			else{
				$.jGrowl(ret,{ life: 5000, theme: 'notice'});
			}
		});
	});
	
	$('a.list_action_delete_new_data').click(function(){
		fancyConfirm('are you sure you want to delete?',function(ret){
			if(ret == true){
				$.jGrowl('user click confirm',{ life: 5000, theme: 'success'});
			}
			else{
				$.jGrowl('user click cancel',{ life: 5000, theme: 'notice'});
			}
		});
	});
	
	/*
	$('a.list_action_add_new_data').colorbox({
		'maxWidth': '100%',
		'maxHeight': '100%',
		onComplete	        : function(){
			$('input.jqui_checkbox').button();
			$('input.jqui_datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
			$('select.jqui_select').multiselect({
			   multiple: false,
			   header: "Select an option",
			   noneSelectedText: "Select an Option",
			   minWidth:20,
			   selectedList: 1
			});
			//if user click submit button
			//$("#AddForm").bind('submit', function() {
			<?php echo '$("#'.Inflector::classify($this->params['controller']).'AddForm").bind("submit", function() {'; ?>
				//$.jGrowl("Stick this!", { sticky: true, theme: 'notice' });
				//console.log($(this).serializeArray());
				$.fancybox.showActivity();
				$.ajax({
					type	: 'POST',
					dataType: 'json',
					cache	: false,
					url		: "<?php
						if(isset($this->params['plugin'])){
							echo $this->webroot.$this->params['plugin'].DS.$this->params['controller'].DS;
						}
						else{
							echo $this->webroot.$this->params['controller'].DS;
						}
					?>ajax_add_validate",
					data	: $(this).serializeArray(),
					success: function(data) {
						$.fancybox.hideActivity();
						if(data == true){
							$.jGrowl('data succesfully added',{ life: 5000 , theme: 'success'});
							parent.$.fancybox.close();
						}
						else{
							$.jGrowl('the data cannot be safe',{ sticky: true, theme: 'error-message'});
							$.each(data,function(key, value){
								//$.jGrowl(key + ' ' + value,{ sticky: true, theme: 'error-message'});
								$.jGrowl(value,{ sticky: true, theme: 'error-message'});
							});
						}
					}
				});
				return false;
			});
		},
		onClosed           : function(){
			$('div.jGrowl').jGrowl("close");
		}
	});
	*/
});
</script>

<?php
	echo $scripts_for_layout;
?>
<?php $EvaIconPath = $this->webroot.'evacakephp/img/whiteboks.ico';?>
<?php echo $this->Html->meta('icon',$EvaIconPath); ?>
<title><?php echo $title_for_layout?></title>
</head>
<body>
<div id="container">
  <div class="clear"></div>
  <?php echo $this->element('header',array('cache' => false));?>
  <div class="clear"></div>
  <?php echo $this->element('loged_in');?>
  <div class="clear"></div>
  <?php echo $this->element('menu',array('cache' => false));?>
  <div class="clear"></div>
  <div id="content">
  <?php 
		echo $this->Session->flash();
		echo $this->Session->flash('auth');
		echo $content_for_layout;
  ?>
  </div>
  <div class="clear"></div>
  <?php echo $this->element('site_info',array('cache' => false));?>
  <div class="clear"></div>
  <?php echo $this->Js->writeBuffer(); // Write cached scripts ?>
  <?php //echo $this->element('sql_dump'); ?>
  <?php //print_r($this->params); ?>
</div>
</body>
</html>

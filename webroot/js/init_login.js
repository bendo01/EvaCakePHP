// JavaScript Document
$(document).ready(function(){
	$("fieldset#signin_menu").mouseup(function() {
		return false
	});
	$(document).mouseup(function(e) {
		if($(e.target).parent("a.signin").length==0) {
			$("a.signin").removeClass("menu-open");
			$("fieldset#signin_menu").hide();
		}
	});
	//$('#forgot_username_link').tipsy({gravity: 'w'});  
	$(".logged").click(function(e) {          
		e.preventDefault();
		$("#logged_menu").toggle();
		$(".logged").toggleClass("menu-open");
	});
	$(document).mouseup(function(e) {
		if($(e.target).parent("a.logged").length==0) {
			$(".logged").removeClass("menu-open");
			$("#logged_menu").hide();
		}
	});
	//$('.mytipsy').tipsy({gravity: 's'});
	
	
	var optionsjclock = {
        format: '%Y-%m-%d %H:%M:%S' // 24-hour
    } 
    /*clock*/
	$('#jclock').jclock(optionsjclock);
	/*
	$('#digiclock').jdigiclock();
	$("#jclock").click(function(e) {          
		e.preventDefault();
		$("#clock_menu").toggle();
		$(".clockWeather").toggleClass("menu-open-clock");
	});
	*/
	/*
	$(document).mouseup(function(e) {
		if($(e.target).parent("a.clockWeather").length==0) {
			$(".clockWeather").removeClass("menu-open-clock");
			$("#clock_menu").hide();
		}
	});
	*/
});
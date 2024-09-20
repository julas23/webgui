$(function(){

	// Accordion
	$("#accordion").accordion({ header: "h3" });

	// Tabs
	$('#tabs').tabs();

	$('#tabs-menu').tabs();

	$('#tabs-menu').click(function() {
	   $(this).hide("slide", { direction: "left" }, 400);
	});

	$("#accordion > li").click(function(){

		if(false == $(this).next().is(':visible')) {
			$('#accordion > ul').slideUp(300);
		}
		$(this).next().slideToggle(300);
	});

	$('#accordion > ul:eq(0)').show();

	$("#show-menu").hover(
	  function () {
		$("#accordion").show();
	  }
	);
	
	$("#env-content").hover(
	  function () {
		$("#accordion").hide();
	  }	
	);
	
	$('.web-trigger').toggle(function() {
	   $(this).attr("checked", true);  
	   $(".web-class").attr("checked", true);
	}, function() {
	   $(this).attr("checked", false); 
	   $(".web-class").attr("checked", false);
	});	
	
	
	$('.app-trigger').toggle(function() {
	   $(this).attr("checked", true);  
	   $(".app-class").attr("checked", true);
	}, function() {
	   $(this).attr("checked", false);  
	   $(".app-class").attr("checked", false);
	});	
});
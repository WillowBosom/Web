$(document).ready(function(e){
	$(".container a").click(function(e){
		e.preventDefault();
		var href = $(this).attr('href');
		$(".tudo").load(href + " .tudo");
	});
	$("#menutopo a").click(function(e){
		e.preventDefault();
		var href = $(this).attr('href');
		$(".tudo").load(href + " .conteudo");
	});

});


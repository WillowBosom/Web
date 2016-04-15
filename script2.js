$(document).ready(function(e){
	$(".about").click(function(e){
		e.preventDefault();
		var href=$(this).attr("href");
		$(".aPorraToda").load(href + " .conteudo");
		$(".menuPrincipal").hide();
});
	$(".ligacoes").click(function(e){
		e.preventDefault();
		var href=$(this).attr("href");
		$(".aPorraToda").load(href + " .conteudo");
		$(".menuPrincipal").hide();
	});
});

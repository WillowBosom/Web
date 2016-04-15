$(document).ready(function(e){
	$("#dialog-confirm").hide();
	/*$(".menuPrincipal a").click(function(e){
		e.preventDefault();
		var href = $(this).attr('href');
		$(".conteudo").load(href + ".conteudo");
 });*/


});

function dialogo(){
	$("#dialog-confirm").dialog({
		resizable: false,
		width:400,
		modal: true,
		buttons: {
			"Confirma": function() {
					
					var ok = true;
					var ok2 = false;
					var oknome1 = true;
					var oknome2 = false;
					var email = document.querySelector("#email").value;
					var nome = document.querySelector("#nome").value;

					//nome desu
					for (var j=0; j<nome.length; j++){
						if (nome[j] == " "){
							oknome2 = true;
						}
					}

					if(oknome2){
						nome = nome.split(" ");
						var nome1 = nome[0];
						var nome2 = nome[1];
					
						if( nome1.length < 3){
							oknome1 = false;
						}

						if (nome2.length < 4){
							oknome1 = false;
		
	 					} 


					}

					//email
					for (var i=0; i<email.length; i++){
							if (email[i] == "@"){
								ok2= true;
							}
					}

					if (ok2){
						email = email.split("@");
						var var1 = email[0];
					    var var2 = email[1];


						if( var1.length < 3){
							ok = false;
						}

						if (var2.length < 4){
							ok = false;
		
						} 


					}


						if ( !ok || !ok2 || !oknome1 || !oknome2){
							alert("Algum campo não foi preenchido corretamente");
						}	
				      
						$(this).dialog( "close" );
			},
			
				
				Cancelar: function() {
				$(this).dialog( "close" );
			}
		}
});
};

  

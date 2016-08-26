<?php
	require 'init.php';
    // pega o ID da URL
	$id = isset($_GET['id']) ? (int) $_GET['id']:null;
	// valida o ID
 	if (empty($id)){
	echo "ID para alteração não definido";
 	exit;
}
 	// busca os dados do usuário a ser editado
 	$PDO = db_connect();
 	$sql = "SELECT nomeFornecedor,dataFundacao,email FROM fornecedores WHERE idFornecedor = :id";
	$stmt = $PDO->prepare($sql);
 	$stmt->bindParam(':id' , $id , PDO::PARAM_INT);
 	$stmt->execute();
 	$fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);
 	/* se o método fetch () não retornar um array
 	significa que o ID não corresponde a um usuário válido */
 	if (!is_array($fornecedor))
 	{
 		echo "Nenhum fornecedor encontrado";
 		exit;
 	}
 	$dataOK = dateConvert( $fornecedor['dataFundacao']);
 ?>
 <!DOCTYPE html>
 <html lang="pt-br">
 	<head>
 		<title> Edição de dados </title>
 		<meta charset="utf-8">
        <link rel="stylesheet" href="css/cadastroclientes.css" type="text/css" />
        <link rel="stylesheet" href="css/clientes.css" type="text/css" />
        <link rel="stylesheet" href="css/index.css" type="text/css" />
        <link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />
        <script type="text/javascript" src="../jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../jquery-ui.js"></script>
        <script type="text/javascript" src="../jquery.maskedinput.js"></script>
		<script type="text/javascript" src ="../datepicker-pt-BR.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
 		<script>
 		$(document).ready(function(){
 			$("#data").mask ("99/99/9999");
 	});
 	
 	      	$(function(){
    			$("body").on("click", "#data", function(){
    			if (!$(this).hasClass("hasDatepicker")){
					$(this).datepicker({
						minDate: new Date(2000, 1 - 1, 1), 
						maxDate: 0,  	
						showOn: "button",
						buttonImage: "img/calendario.png",
						buttonImageOnly: true
					});
    			}
    			});
    	});
    	
 	</script>
 	<style>
    	.calend img{
    		max-width:30px;
    		max-height:30px;
    		width:auto;
    		height:auto;
    		position: relative;
    	}
    	</style>
 </head>
 <body>
		<div class="menu">          
			<ul>
				<li><img class="logo" src="img/logo-submarino.jpg"></img></li>
                <li><a href="index.php">HOME</a></li>
                <li><a href="clientes.php">CLIENTES</a></li>
                <li><a href="fornecedores.php">FORNECEDORES</a></li>
                <li><a href="sobre.php">SOBRE</a></li>
            </ul>
		</div>
	<div class="conteudo">
 	<form method ="post" name="formAltera" action ="editfornecedor.php" enctype="
		multipart/form-data">
 	<h1> Edição de dados </h1>
 	<table width="100%">
 		<tr>
 		<th width="18%">Nome</th>
 		<td width="82%"><input type="text" name="txtNome" value ="<?php echo $fornecedor['nomeFornecedor']?>"></td>
 		</tr>
 		<tr>
 			<th>Data de Nascimento</th>
 			<td class="calend"><input type="text" name="txtData" id="data" value="<?php echo	$dataOK ?>" readonly></td>
		</tr>
 		<tr>
 			<th> Email </th>
 			<td><input type="text" name="txtEmail" value="<?php echo $fornecedor['email']?>"></td>
 		</tr>
 		<tr>
 			<input type="hidden" name="id" value="<?php echo $id ?>">
 			<td><input type="submit" name="btnEnviar" class="btn btn-red" value="Alterar"></td>
 			<td><input type="reset" name="btnLimpar" class="btn btn-red" value="Limpar"></td>
 				</tr>
 			</table>
 		</form>
	</div>
		<div class="rodape">
			<p> COPYRIGHT - Caio L. e Sabrina </p>
		</div>
 	</body>
 </html>


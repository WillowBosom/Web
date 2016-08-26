<! Esse trabalho foi realizado por: Caio Lopes e Sabrina Marinho>

<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
     /* SQL para contar o total de registros */
    $sql_count = "SELECT COUNT (*) AS total FROM cliente2 ORDER BY nome ASC";
    // SQL para selecionar os registros
    $sql = " SELECT idCliente , nome , dataCad , foto FROM cliente2 ORDER BY nome
    ASC";
    // conta o total de registros
    $stmt_count = $PDO -> prepare($sql_count);
    $stmt_count -> execute();
    $total = $stmt_count -> fetchColumn();
    // seleciona os registros
    $stmt = $PDO -> prepare($sql);
    $stmt -> execute();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Submarino (china) </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/index.css" type="text/css" />
        <link rel="stylesheet" href="css/cadastroclientes.css" type="text/css" />
        <script type="text/javascript" src="../jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../jquery-ui.js"></script>
        <script type="text/javascript" src="../jquery.maskedinput.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		
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
			
		<div class="conteudo" id="sabrina">
			
		<img src="img/1.jpg">
		
		<div class="paragrafo1">
			<h4>No Submarino Viagens você encontra as melhores passagens aéreas para a sua viagem e paga em até 10x sem juros. O Submarino Viagens possui parceria com mais de 750 companhias aéreas e mais, por isso oferecemos os preços mais baixos e ofertas exclusivas.</h4> 
 		</div>


		<div class="conteudo2">
		<img src="img/2.jpg">
		</div>

		<div class="conteudo3">
	<h4> Além da facilidade de encontrar apassagem aérea dos seus sonhos, o Submarino Viagens ainda possui um time de atendimento vencedor do Prêmio ÉPOCA Reclame Aqui por seu serviço qualificado e eficiente. Com a gente, você tira todas as suas dúvidas e recebe as melhores dicas de viagens!

Viajar é uma ótima prática para descansar, conhecer diferentes culturas e se divertir. Encontre já a passagem aéreas ideal para a sua viagem.<h4>
		</div>
</div>



		</div>
		<div class="rodape">
			<p> COPYRIGHT - Caio L. e Sabrina </p>
		</div>
    </body>
</html>

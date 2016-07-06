<?php
	require_once 'init.php';
	include_once 'fornecedor.class.php';
	// pega os dados do formulário
	$id = isset($_POST['id']) ? $_POST['id']:null;
	$name = isset($_POST['txtNome']) ? $_POST['txtNome']:null;
	$dataFundacao = isset($_POST['txtData']) ? $_POST['txtData']:null;
	$email= isset($_POST['txtEmail']) ? $_POST['txtEmail']:null;
	// validação simples se campos estão vazios
	
	if (empty($name) || empty($dataFundacao) || empty($email)){
		echo "Campos devem ser preenchidos !!";
		exit;
	}
	// instancia objeto fornecedor
	$fornecedor = new Fornecedor($name , $dataFundacao, $email);
	// atualiza o BD
	$PDO = db_connect();
	$sql = "UPDATE fornecedores SET nomeFornecedor = :name , dataFundacao = :data , email = :email WHERE idFornecedor = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':name', $fornecedor->getNome());
	$stmt->bindParam(':data', $fornecedor->getDataFundacao());
	$stmt->bindParam(':email', $fornecedor->getEmail());
	$stmt->bindParam(':id', $id , PDO::PARAM_INT);

	if( $stmt->execute()){
		header('Location: index.php');
	}else{
		echo "Erro ao alterar";
		print_r( $stmt->errorInfo());
	}
?>

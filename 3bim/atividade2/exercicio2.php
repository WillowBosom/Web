<?php
	require_once 'Conteudo/init.php';
    // abre a conexão
    $PDO = db_connect();
     /* SQL para contar o total de registros */
    $sql_count = "SELECT COUNT(*) AS total FROM clientes ORDER BY nomeCliente ASC";
    // SQL para selecionar os registros
    $sql = "SELECT idCliente , nomeCliente , dataCadastro , email FROM clientes ORDER BY nomeCliente ASC";
    // conta o total de registros
    $stmt_count = $PDO->prepare($sql_count);
    $stmt_count->execute();
    $total = $stmt_count->fetchColumn();
    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
    
	
	require('fpdf/fpdf.php');
//	nãoSãoObigatórios(){
	$pdf = new FPDF('P', 'pt', 'A4');
	$pdf->SetTitle('Teste PDF1');
	$pdf->SetAuthor('Caio Lopes');
	$pdf->SetCreator('php '.phpVersion());
	$pdf->SetKeywords('php','pdf','e-vou-indefinidamente');
	$pdf->SetSubject('Como criar um PDF');
//	}

//	páginaEmSi(){
	while($cliente=$stmt->fetch(PDO::FETCH_ASSOC)):
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', '12');
	$pdf->Ln(20);//espaçamento (pula linha)
	$pdf->SetY(70);
	$pdf->SetX(355);
	$titulo='Varginha, '.date("d/m/y");
	$pdf->Write(20,$titulo);
	$pdf->Ln(20);
	$pdf->Ln(20);
	$texto = ('Prezado(a) Sr(a), '.$cliente['nomeCliente']);
	$texto = utf8_decode($texto);
	$pdf->SetX(30);
	$pdf->Write(0, $texto);
	$pdf->Ln(60);
	$p1=('Neste mês de aniversário, nossa loja está com promoções imperdíveis e selecionadas especialmete pra você.');
	$p1 = utf8_decode($p1);
	$pdf->SetX(80);
	$pdf->Write(15, $p1);
	$pdf->Ln(7);
	$p2=('Não perca essa oportunidade de realizar bons negócios.');
	$pdf->SetX(80);
	$p2 = utf8_decode($p2);
	$pdf->Write(30,$p2);
	$p3=('Faça-nos uma visita.');
	$pdf->Ln(20);
	$pdf->SetX(80);
	$p3 = utf8_decode($p3);
	$pdf->Write(20,$p3);
	$p4=('Cordialmente, ');
	$pdf->Ln(100);
	$pdf->Write(20,$p4);
	$p5=('Caio L. de Carvalho');
	$pdf->Ln(80);
	$pdf->Cell(510, 20, $p5, 0	, 1, 'C');
	$pdf->Ln(0);
	$p6=('Gerente Comercial');
	$pdf->Ln(0);
	$pdf->Cell(510, 20, $p6, 0	, 1, 'C');
	
	endwhile;
	$pdf->Output();
//	}
?>

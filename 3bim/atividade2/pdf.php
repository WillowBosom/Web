<?php
	require('fpdf/fpdf.php');
//	nãoSãoObigatórios(){
	$pdf = new FPDF('P', 'pt', 'A4');
	$pdf->SetTitle('Teste PDF1');
	$pdf->SetAuthor('Caio Lopes');
	$pdf->SetCreator('php '.phpVersion());
	$pdf->SetKeywords('php','pdf','e-vou-indefinidamente');
	$pdf->SetSubject('Como criar um PDF desu');
//	}
	
//	páginaEmSi(){
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', '12');
	$pdf->Ln(20);//espaçamento (pula linha)
	$pdf->SetFont('Courier', 'B', 16);
	$pdf->SetTextColor(50, 50, 100);
	$pdf->SetY(70);
	$pdf->SetX(260);
	$titulo='Título';
	$titulo=utf8_decode($titulo);
	$pdf->Write(30/*recuo a mais nessa linha para iniciar o parágrafo*/, $titulo);
	$pdf->Ln(30);
	$txt = str_repeat('Carol Viado ', 90);
	$txt=utf8_decode($txt);
	$pdf->SetTextColor(100, 50, 50);
	$pdf->SetFont('times', 'B', 14);
	$pdf->Write(20, $txt);
	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', 16);
	$texto = ('Título sem criatividade (borda)');
	$texto = utf8_decode($texto);
	$pdf->Cell(510, 20, $texto, 0, 1, 'C');
//	Cell(largura, altura, o q tem nela, estilo, se haverá quebra de linha, alinhamento
	$texto = 'Título com Borda';
	$texto = utf8_decode($texto);
	$pdf->Cell(510, 20, $texto, 1	, 1, 'C');
	$pdf->Ln(20);
	$pdf->SetFillColor(255, 120, 120);
	$pdf->Cell(170, 30, 'Alingment a esquerda', 1, 0, 'L', TRUE, 'www.teste.com');
	$pdf->SetFillColor(170, 255, 120);
	$pdf->Cell(170, 30, 'Alingment ao centro', 1, 0, 'C', TRUE, 'www.teste.com');
	$pdf->SetFillColor(100, 100, 255);
	$pdf->Cell(170, 30, 'Alingment a direita', 1, 0, 'R', TRUE, 'www.teste.com');
	$txt1 = str_repeat('Cell', 40);
	$txt2 = str_repeat('Multicell', 12);
	$pdf->Ln(20);
	$pdf->SetFont('Times', 'B', 14);
	$pdf->Cell(510, 20, $txt1, 0, 1, 'L', FALSE);
	$pdf->SetTextColor(50, 100, 50);
	$pdf->MultiCell(510, 20, $txt2, 0, 'L', FALSE);
	$pdf->Ln(10);
	$pdf->MultiCell(510, 20, $txt2, 1, 'L', FALSE);
	$pdf->Ln(20);
	$pdf->SetX(200);
	$pdf->MultiCell(340, 20, $txt2, 1, 'L', FALSE);
	$pdf->Output();
//	}
?>

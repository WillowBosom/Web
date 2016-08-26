
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


  // inclui classes necessárias
  spl_autoload_register(function ($class_name)
  {
    include 'html/'.$class_name.'.class.php';
  });

  // constroi matriz com os dados
	
	while($cliente=$stmt->fetch(PDO::FETCH_ASSOC)):
	$dados[] = array($cliente['nomeCliente'], $cliente['email'], dateConvert($cliente['dataCadastro']));
	endwhile;

  // *********************************************************
  // corrigir caracteres
  $html = new TElement('html');
  $html->lang = 'pt-br';
  //instancia seção head
  $head = new TElement('head');
  
  $meta = new TElement('meta');
  $meta->charset = 'utf-8';
  $head->add($meta);  
  
  /*$script = new TElement('script');
  $script->type = 'text/javascript';
  $script->src = 'Conteudo/js/index.js';
  $head->add($script);*/
  
  $html->add($head); //adiciona ao html
  $body = new TElement('body');
  
  $html->add($body);

  $div = new TElement('div');
  $div->class = 'conteudo';
  $body->add($div);
  
  // *********************************************************
  //instancia objeto-tabela
  $tabela = new TTable;
  //define algumas propriedades
  $tabela->width = 600;
  $tabela->border = 1;
  //instancia uma linha para o cabeçalho
  $cabecalho = $tabela->addRow();
  //define a cor de fundo
  $cabecalho->bgcolor = '#a0a0a0';
  //adiciona células
  $cabecalho->addCell('Nome');
  $cabecalho->addCell('Email');
  $cabecalho->addCell('Data de Cadasro');
  

  $i = 0;
  $total = 0;
  //percorre os dados
  foreach($dados as $pessoa)
  {
    // verifica qual cor utilizará para o fundo
    $bgcolor = ($i % 2) == 0 ? '#d0d0d0' : '#ffffff';
    // adiciona uma linha para os dados
    $linha = $tabela->addRow();
    $linha->bgcolor = $bgcolor;
    // adiciona as células
    $linha->addCell($pessoa[0]);
    $linha->addCell($pessoa[1]);
    $linha->addCell($pessoa[2]);
   // $x = $linha->addCell($pessoa[3]);
    //$x->align = 'right';

  }
  //instancia uma linha para o totalizador
  $linha = $tabela->addRow();
  //adiciona células
  /*$celula = $linha->addCell('Total');
  $celula->colspan = 3;
  $celula = $linha->addCell($total);
  $celula->bgcolor = '#a0a0a0';
  $celula->align = 'right';*/

  // exibe a tabela
  //$tabela->show();
  $div->add($tabela);
  $html->show();
?>


<?php
  // inclui classes necessárias
  spl_autoload_register(function ($class_name)
  {
    include 'html/'.$class_name.'.class.php';
  });
  //inicia o documento html
  $html = new TElement('html');

  $html->lang = 'pt-br';

  //instancia seção head
  $head = new TElement('head');
  $html->add($head); //adiciona ao html
  //define o título da página
  $title = new TElement('title');
  $title->add('Título da Página');
  $head->add($title); // adiciona ao head

  //adiciona o charset
  $meta = new TElement('meta');
  $meta->charset = 'utf-8';
  $head->add($meta);

  //inicia o body
  $body = new TElement('body');
  $body->bgcolor = '#ffffdd';
  $html->add($body);

  $center = new TElement('center');
  $body->add($center);

  // instancia um parágrafo
  $p = new TElement('p');
  $p->align = 'center';
  $p->add('Centro Federal de Educação Tecnológica de Minas Gerais');
  $center->add($p);

  // instancia uma imagem
  $img = new TElement('img');
  $img->src = 'images/img.png';
  $img->width = '120';
  $img->height = '120';
  $center->add($img);

  //instancia um separador horizontal
  $hr = new TElement('hr');
  $hr->width = '150';
  $hr->align = 'center';
  $center->add($hr);

  //instancia um link
  $a = new TElement('a');
  $a->href = 'http://varginha.cefetmg.br';
  $a->add('Visite o site da Unidade');
  $center->add($a);

  //instancia uma quebra de linhas
  $br = new TElement('br');
  $center->add($br);

  //instancia um botao
  $input = new TElement('input');
  $input->type = 'button';
  $input->value = 'clique aqui para saber ...';
  $input->onclick = "alert('Terceiro Informática 2016!!')";
  $center->add($input);

  // exibe o html com todos os seus elementos-filho
  $html->show();
?>

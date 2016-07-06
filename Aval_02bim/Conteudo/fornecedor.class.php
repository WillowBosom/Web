<?php
	class Fornecedor{
		private $nome;
		private $dataFundacao;
		private $email;
		
		public function __construct($nome, $dataFundacao, $email){
			$this->setNome($nome);
			$this->setDataFundacao($dataFundacao);
			$this->setEmail($email);
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getDataFundacao(){
			return $this->dataFundacao;
		}
		public function setDataFundacao($dataFundacao){
			$data = explode('/', $dataFundacao);
			$this->dataFundacao = "$data[2]-$data[1]-$data[0]";
		}
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		
		
	}
?>

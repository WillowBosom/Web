<?php
	class Cliente{
		private $nome;
		private $dataCadastro;
		private $email;
		
		public function __construct($nome, $dataCadastro, $email){
			$this->setNome($nome);
			$this->setDataCad($dataCadastro);
			$this->setEmail($email);
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getDataCad(){
			return $this->dataCadastro;
		}
		public function setDataCad($dataCadastro){
			$data = explode('/', $dataCadastro);
			$this->dataCadastro = "$data[2]-$data[1]-$data[0]";
		}
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		
		
	}
?>

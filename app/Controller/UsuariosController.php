<?php 
	
	class UsuariosController extends AppController {

		public $uses = array("Usuario");

		public function login(){

			if($this->request->is('post')) {

				$dados = $this->request->data;
				$email = $this->Usuario->findByEmail($dados['Usuario']['email']);
				
				if(empty($email)) {

					echo "<script>alert('Email não encontrado, por favor tente novamente.');</script>";

					echo "<script>window.location='/sgv';</script>";

					
				}
			}

		}
		
		public function add() {
			$this->Usuario->save($this->request->data);
		}
	}

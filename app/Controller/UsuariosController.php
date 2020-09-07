<?php 
	
	class UsuariosController extends AppController {

		public $uses = array("Usuario");

		public function login(){

			if($this->request->is('post')) {

				$dados = $this->request->data;

				//pr($dados);

				//$email = $this->Usuario->findByEmail($dados['Usuario']['email']);
				$email = $this->Usuario->query('
					select * from usuarios where email = '.$dados['Usuario']['email']);
				pr($email);
				/*
				if(empty($email)) {

					//echo "<script>alert('Email não encontrado, por favor tente novamente.');</script>";

					//echo "<script>window.location='/sgv';</script>";

					$this->redirect(array('action'=>'teste'));
				}*/
			}

		}
		
		public function teste() {
			$this->autoRender=false;
			pr('cai aqui');
		}
	}


?>


<?php 
	
	class UsuariosController extends AppController {

		public $uses = array("Usuario");

		public function login(){

			if($this->request->is('post')) {

				$dados = $this->request->data;
				$usuario = $this->Usuario->findByEmail($dados['Usuario']['email']);
				
				if(empty($usuario)) {
					echo "<script>alert('Email não encontrado, por favor tente novamente.');</script>";
					echo "<script>window.location='/sgv';</script>";

					
				}else{
					if($usuario['Usuario']['tipo']==0){
						$this->Session->write("admin",$usuario);
						$this->redirect("/admin/usuarios/index");
					}else if($usuario['Usuario']['tipo']==1){
						$this->Session->write("user",$usuario);
						$this->redirect("/user/usuarios/index");
					}
				}
			}

		}
		
		public function admin_index() {
			$this->layout = "default_admin";
			
		}

		public function user_index(){
			$this->layout = "default_user";
			
		}
	}

?>
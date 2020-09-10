<?php 
	
	class UsuariosController extends AppController {

		public $uses = array("Usuario");

		public function login(){

			if($this->request->is('post')) {

				$dados = $this->request->data;
				$usuario = $this->Usuario->findByEmail($dados['Usuario']['email']);
				$senha = $usuario["Usuario"]["senha"];
				
				//Verificacao de e-mail.
				//Se não encontrar, ele da um alerta e já retorna para a view default, para realização de um novo login
				//Se encontrar, cai no else e realiza as validações seguintes
				if(empty($usuario)) {
					echo "<script>alert('Email não encontrado, por favor tente novamente.');</script>";
					echo "<script>window.location='/sgv';</script>";

					
				}else{
				//Verificacao de senha
				//Se for igual, ele entra e verifica qual perfil o usuário detém, se for "tipo" = 0, significa que é admin
				//Se for "tipo" == 1, significa que é user/usuário comum da loja
					if($dados['Usuario']['senha']==$senha){
						if($usuario['Usuario']['tipo']==0){
							$this->Session->write("admin",$usuario);
							$this->redirect("/admin/dashboard/index");
						}else if($usuario['Usuario']['tipo']==1){
							$this->Session->write("user",$usuario);
							$this->redirect("/user/dashboard/index");
						}
					}else{
						echo "<script>alert('Senha incorreta, por favor tente novamente.');</script>";
						echo "<script>window.location='/sgv';</script>";						
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
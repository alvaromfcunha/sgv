<?php 
	
	class UsuariosController extends AppController {

		public $uses = array("Usuario");

		public function add(){
			
		}
		
	}

<<<<<<< HEAD
?>
=======
	public function add(){
		//register new user
		if($this->request->is('post')){
			pr($this->request->data)
		}
	}
	
}
>>>>>>> 9248a48741d318db54730db7f1486a31947f2513

<?php 
	
	class TesteController extends AppController {

		public $uses = array("Usuario","Parceiro","Estado");

		public function redirecionar($nome_banco = ''){
			$this->autoRender = false;
			$this->redirect(array("action" => "compra"));

		}

		public function compra($nome_banco){
			try {
				// $this->autoRender = false;
				$this->layout = 'default';
				$this->Session->write('nome_banco',$nome_banco);
				// $parceiros  = $this->Parceiro->find('all',array('conditions'=>array('Parceiro.venda_ecommerce'=>1)));
				$estados = $this->Parceiro->query("select 
													 Estado.id,
													 Estado.nome
													from parceiros p
													join cidades c on c.id = p.cidade_id
													join estados Estado on Estado.id = c.estado_id
													where p.venda_ecommerce = 1
													group by Estado.id
				");
			
			 	$array_estados = array();
			  	foreach ($estados as $key => $value) {
			    	$array_estados[$value['Estado']['id']] = $value['Estado']['nome'];
			  	}
			  	$array_todos_estados = $this->Estado->find('list');
			  	$array_validacoes = array(
			  		'1' => 'Presencial',
			  		'2' => 'Renovação Online',
			  		'3' => 'Video Conferencia'
			  	);
			  	$this->set('array_validacoes',$array_validacoes);
			  	$this->set('array_estados',$array_estados);
			  	$this->set('array_todos_estados',$array_todos_estados);
				
			} catch (Exception $e) {
				pr($e);
			}
			
		}

		
		public function atualiza_cidade(){
			$this->layout = 'ajax';

			$nome_banco = 'homologacao';
			$this->Session->write('nome_banco',$nome_banco);
			if (!empty(($this->request->data['Venda']['estado_id']))) {
				$estado_id = $this->request->data['Venda']['estado_id'];

				$cidades = $this->Parceiro->query("select 
													 Cidade.id,
													 Cidade.nome
													from parceiros p
													join cidades Cidade on Cidade.id = p.cidade_id
													where p.venda_ecommerce  =1
													and Cidade.estado_id = {$estado_id}
													group by Cidade.id
				");
				$array_cidades = array();
				foreach ($cidades as $key => $value) {
			    	$array_cidades[$value['Cidade']['id']] = $value['Cidade']['nome'];
			  	}
			  	$this->set('array_cidades',$array_cidades);	
			}else{
				$array_cidades = array();  	
			  	$this->set('array_cidades',$array_cidades);	
			}
			
		}

		public function atualiza_cidade_cliente() {
			$this->layout = 'ajax';
			$nome_banco = 'homologacao';
			$this->Session->write('nome_banco',$nome_banco);
			if (!empty(($this->request->data['inputEstado']))) {
				$estado_id = $this->request->data['inputEstado'];

				$cidades = $this->Parceiro->query("select 
													 Cidade.id,
													 Cidade.nome
													
													from cidades Cidade 
													where Cidade.estado_id = {$estado_id}
													group by Cidade.id
				");
				
				$array_cidades = array();
				foreach ($cidades as $key => $value) {
			    	$array_cidades[$value['Cidade']['id']] = $value['Cidade']['nome'];
			  	}
			  	$this->set('array_cidades',$array_cidades);	
			}else{
				$array_cidades = array();  	
			  	$this->set('array_cidades',$array_cidades);	
			}
		}

		public function atualiza_unidade(){
			$this->layout = 'ajax';
			
			
			if (!empty(($this->request->data['cidade_id']))) {
				$cidade_id = $this->request->data['cidade_id'];

				$unidades = $this->Parceiro->query("select * from parceiros where cidade_id = {$cidade_id} and venda_ecommerce = 1");

				$array_unidades = array();
				foreach ($unidades as $key => $value) {
					
			    	$array_unidades[$value['parceiros']['id']] = $value['parceiros']['nome'] .' - '.$value['parceiros']['endereco'] .' - '.$value['parceiros']['bairro'] ;
			  	}
			  	
			  	$this->set('array_unidades',$array_unidades);	
			}else{
				$array_unidades = array();  	
			  	$this->set('array_unidades',$array_unidades);	
			}
			
		}

	}

?>
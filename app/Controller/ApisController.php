<?php  
	
	class ApisController extends AppController {
		var $components = array("Util");
		public $uses = array("Produto","TipoCertificado","ModeloCertificado","Validade","TipoMidia","Cliente","Venda","ProdutoVenda","ConfiguracaoFinanceiro","Financeiro","Empresa","CompraFacilEmail","TipoValidacoe","CompraFacilConfiguracoe");


		public function retorna_modelos($token){
			$this->autoRender = false;
			if($token !='DropCode@2020'){
				return null;
			}
			$nome_banco = $this->Session->read('nome_banco');
			$modelos = $this->ModeloCertificado->find('all');
			$dados = array();

			foreach ($modelos as $modelo) {
				
				$dado = array(
					'value'	=> $modelo['ModeloCertificado']['id'],
					'nome'	=> $modelo['ModeloCertificado']['nome'],
					'img' 	=> $modelo['ModeloCertificado']['img']
				);

				array_push($dados, $dado);
			}
		
			return json_encode($dados);
		}

		public function retorna_dados_matriz(){
			$dados = $this->Empresa->find('all');

			for ($i=0; $i <count($dados) ; $i++) { 
				$dados[$i]['Empresa']['cnpj'] = $this->Util->TrataCnpjCpf($dados[$i]['Empresa']['cnpj']);
				$dados[$i]['Empresa']['telefone'] = $this->Util->TrataTelefone($dados[$i]['Empresa']['telefone']);
			}

			return $dados;
		}

		public function retorna_css(){
			$dados = $this->CompraFacilConfiguracoe->findByid(1);
			return $dados;
		}

		public function retorna_tipos($token){
			$this->autoRender = false;
			if($token !='DropCode@2020'){
				return null;
			}
			$nome_banco = $this->Session->read('nome_banco');
			
			$tipos = $this->TipoCertificado->find('all');
			$dados = array();

			foreach ($tipos as $tipo) {
				$dado = array(
					'value'	=> $tipo['TipoCertificado']['id'],
					'nome'	=> $tipo['TipoCertificado']['nome'],
					'img' 	=> $tipo['TipoCertificado']['img']
				);

				array_push($dados, $dado);
			}

			return json_encode($dados);
		}

		public function retorna_midias($token){
			$this->autoRender = false;
			if($token !='DropCode@2020'){
				return null;
			}
			
			$midias = $this->TipoMidia->find('all');
			$dados = array();

			foreach ($midias as $midia) {
				$dado = array(
					'value'	=> $midia['TipoMidia']['id'],
					'nome'	=> $midia['TipoMidia']['nome'],
					'img' 	=> $midia['TipoMidia']['img']
				);

				array_push($dados, $dado);
			}

		
		
			return json_encode($dados);

		}

		public function retorna_validades($token){
			$this->autoRender = false;
			if($token !='DropCode@2020'){
				return null;
			}
			$validades = $this->Validade->find('all');
			$dados = array();

			foreach ($validades as $validade) {
				
				$dado = array(
					'value'	=> $validade['Validade']['id'],
					'nome'	=> $validade['Validade']['nome']
				
				);

				array_push($dados, $dado);
			}
			return json_encode($dados);
		}

		public function retorna_produtos($token){
			$this->autoRender = false;	
			if($token !='DropCode@2020'){
				return null;
			}
		}

		public function buscar_produto(){
			// $this->autoRender =false;
			$this->layout = 'ajax';
			// $this->Session->write('nome_banco',$nome_banco);


			$tipo_validacoes_id			= $_POST['forma_validacao'];
			$tipo_certificados_id		= $_POST['tipo_escolhido'];
			$modelo_certificados_id		= $_POST['modelo_escolhido'];
			$tipo_midias_id				= $_POST['midia_escolhido'];
			$validades_id				= $_POST['validade_escolhido'];
			$validacao_presencial		= 1;
			$validacao_videoconferencia = 1;
			$validacao_renovacao_online = 1;
			$parceiro_id                = $_POST['unidade_id'];

			$produtos = $this->Produto->buscar_produto_compra_facil(
				
				$tipo_certificados_id,
				$modelo_certificados_id,
				$tipo_midias_id,$validades_id,
				$validacao_presencial,
				$validacao_videoconferencia,
				$validacao_renovacao_online,
				$parceiro_id
			);
			for ($i=0; $i <count($produtos) ; $i++) { 
				$produtos[$i]['ptv']['unitario'] = $this->Util->trataMoeda($produtos[$i]['ptv']['unitario']);
			}
			$this->set('produtos',$produtos);

		}

		public function finalizar_venda(){
			$this->autoRender = false;
			try {

				$nome_banco = $this->Session->read('nome_banco');
				$dados   = $_POST['array_cliente'];
				$cliente = $dados['cliente'];

				//Buscar o cliente
				$retorno = $this->buscar_cliente($dados);	
				if($retorno['status'] ==0){
					throw new Exception($retorno['mensagem']);
				}
				$cliente_id = $retorno['cliente_id'];
				$dados['cliente']['cliente_id'] = $cliente_id;

				//Cria a Venda 
				$retorno = $this->criar_venda($dados);
				if($retorno['status'] ==0){
					throw new Exception($retorno['mensagem']);
				}
				$venda_id      = $retorno['venda_id'];
				$total         = $retorno['total'];
				$data_validade = $retorno['data_validade'];

				//Cria o produto da Venda
				$retorno = $this->criar_produto_venda($venda_id,$dados['produto']['id'],$dados['validacao']['unidade_id']);
				if($retorno['status'] ==0){
					$this->Venda->delete($venda_id);
					throw new Exception($retorno['mensagem']);
				}
				$produto_venda_id = $retorno['produto_venda_id'];

				//Cria o financeiro			   
				$retorno = $this->criar_financeiro($venda_id,$cliente_id,$dados['validacao']['unidade_id'],$total,$data_validade);
				if($retorno['status'] ==0){
					$this->Venda->delete($venda_id);
					$this->ProdutoVenda->delete($produto_venda_id);
					throw new Exception($retorno['mensagem']);
				}
				$financeiro_id = $retorno['financeiro_id'];

				//Gerar Boleto
				$token 	 = 'DropCode@2020';
				$retorno = $this->criar_boleto($token,$nome_banco,$venda_id);
				$retorno = json_decode($retorno,true);

				if($retorno['status'] ==0){
					$this->Venda->delete($venda_id);
					$this->ProdutoVenda->delete($produto_venda_id);
					$this->Financeiro->delete($financeiro_id);

					throw new Exception($retorno['mensagem']);
				}

				//Vincular boleto a venda e o financeiro
				$id_boleto  = $retorno['id_boleto'];
				$url_boleto = $retorno['url_boleto'];
				$retorno    = $this->vincular_boleto($venda_id,$financeiro_id,$id_boleto,$url_boleto); 

				$this->enviar_email($venda_id);

				if($retorno['status'] ==0){
					throw new Exception($retorno['mensagem']);
				}
				$retorno = array(
			        "status" 	 => 1,
			        "venda_id"   => $venda_id,
			        "url_boleto" => $url_boleto
			    );

				return json_encode($retorno);

			} catch (Exception $e) {
				$retorno = array(
			        "status" 	 => 0,
			        "mensagem"   => $e->getMessage()
			        
			    );				
				return json_encode($retorno);
			}
			
			

			// return $cliente;
			
		}

		private function buscar_cliente($dados){
			$this->autoRender = false;
			$cliente    = $this->Cliente->findByCnpjcpf($dados['cliente']['cnpjcpf']);
			$retorno = array(
				'status' 		=> 1,
				'mensagem'	 	=> '',
				'cliente_id'	=> 0
			);
			try {
				if (!empty($cliente)) {
					$cliente_id = $cliente['Cliente']['id'];		
				}else{
					$cliente_id = null;
				}
				
				$this->Cliente->set(array(
		            'id'	 		=>$cliente_id,
		            'cnpjcpf'		=>$dados['cliente']['cnpjcpf'],
		            'razaosocial'	=>$dados['cliente']['nome'],
		           	'email'	 		=>$dados['cliente']['email'],
		           	'rua'	 		=>$dados['cliente']['endereco'],
		           	'numero' 		=>$this->Util->TrataCaracter($dados['cliente']['numero']),
		           	'bairro' 		=>$dados['cliente']['bairro'],
		           	'cep'	 		=>$this->Util->TrataCaracter($dados['cliente']['cep']),
		           	'cidade_id'		=>$dados['cliente']['cidade_id'],
		           	'estado_id'		=>$dados['cliente']['estado_id'],
		           	'telefone'		=>$dados['cliente']['telefone'],
		           	'tipopjcpf_id' 	=>$dados['cliente']['tipo_pj_pf'],
		           	'tipocliente_id'=> 1,
		           	'parceiro_id'   =>$dados['validacao']['unidade_id']
		            ));
	        	$this->Cliente->save();

				$cliente_id = $this->Cliente->id;	
				$retorno['cliente_id'] = $cliente_id; 
			} catch (Exception $e) {
				$retorno['status'] = 0;
				$retorno['cliente_id'] = 0;
				$retorno['mensagem'] = $e->getMessage();
			}
			
			
			return $retorno;

		}

		private function  criar_venda($dados){
			$this->autoRender = false;
			$retorno = array(
				'status' 		=> 1,
				'mensagem'	 	=> '',
				'venda_id'		=> 0,
				'total'			=> 0,
				'data_validade' => 0,
			);
			try{
				$produto_id  	= $dados['produto']['id'];
				$parceiro_id 	= $dados['validacao']['unidade_id'];
				$retorno_preco	= $this->Produto->buscar_preco($produto_id,$parceiro_id); 
				$dia_validade   = 3;
				$created        = date('Y-m-d');
				$data_validade  = date('Y-m-d', strtotime("+".$dia_validade." day ",strtotime($created))); 

				$nova_venda = array(
					"Venda" => array(
						"id"         		 => null,
						"confirmado"         => 0,
						"cliente_id"         => $dados['cliente']['cliente_id'],
						"total"              => $retorno_preco,
						"parceiro_id"        => $parceiro_id,
						"contadore_id"       => 0,
						"ecommerce"          => 1,
						"vencimento_boleto"	 => $data_validade,
						"tipo_validacoes_id" => $dados['validacao']['validacao'],
						"contadore_id" 		 => $dados['validacao']['contador_id']
					)
				);
				
				if($this->Venda->save($nova_venda)){
					$venda_id = $this->Venda->id;
					$retorno['venda_id'] 		 = $venda_id; 
					$retorno['total'] 	 		 = $retorno_preco; 
					$retorno['data_validade'] 	 = $data_validade; 
				}else{
					throw new Exception("Erro ao gerar a venda, favor entrar em contato com a Autoridade de Registro");	
				}

			}catch (Exception $e) {
				$retorno['status'] = 0;
				$retorno['cliente_id'] = 0;
				$retorno['mensagem'] = $e->getMessage();
			}
			return $retorno;
		}

		private function criar_produto_venda($venda_id,$produto_id,$parceiro_id){
			$this->autoRender = false;
			$retorno = array(
				'status' 			=> 1,
				'produto_venda_id' 	=> 0,
				'mensagem'	 		=> ''
			);
			try{
				$retorno_preco	= $this->Produto->buscar_preco($produto_id,$parceiro_id); 

				$novo_prod_venda = array(
					"ProdutoVenda" => array(
						"venda_id" => $venda_id,
						"produto_id" => $produto_id,
						"quantidade" => 1,
						"unitario" => $retorno_preco,
						"total" => $retorno_preco,
						"validade" => "0000-00-00"
					)
				);
				
				if($this->ProdutoVenda->save($novo_prod_venda)){
					$produto_venda_id = $this->ProdutoVenda->id;
					$retorno['produto_venda_id'] = $produto_venda_id; 
				}else{
					throw new Exception("Erro ao gerar o produto da venda, favor entrar em contato com a Autoridade de Registro");	
				}

			}catch (Exception $e) {
				$retorno['status'] = 0;
				$retorno['mensagem'] = $e->getMessage();
			}
			return $retorno;

		}

		private function criar_financeiro($venda_id,$cliente_id,$parceiro_id,$total,$data_vencimento){
			$this->autoRender = false;
			$retorno = array(
				'status' 			=> 1,
				'financeiro_id' 	=> 0
			);
			try {
				$configFinanceiro = $this->ConfiguracaoFinanceiro->find("all",array("conditions"=>array(
                      						"ConfiguracaoFinanceiro.parceiro_id"=>$parceiro_id,
                      						"ConfiguracaoFinanceiro.tipo"=>0)));

				if(!empty($configFinanceiro)){

					$novo_financeiro = array(
						'Financeiro' => array(
	                  	'id'                 => null,
	                  	'tipo'               => 3,
	                  	'conta_bancaria_id'  => 1,
	                  	'receita_despesa_id' => $configFinanceiro[0]["ConfiguracaoFinanceiro"]["receita_despesa_id"],
	                  	'centro_de_custo_id' => $configFinanceiro[0]["ConfiguracaoFinanceiro"]["centro_de_custo_id"],
	                  	'forma_pagamento_id' => 1,
	                  	'valor'              => $total,
	                  	'total'              => $total,
	                  	'desconto'           => 0,
	                  	'juros'              => 0,
	                  	'data_vencimento'    => $data_vencimento,
	                  	'venda_id'           => $venda_id,
	                  	'usuario_id'         => 0,
	                  	'parceiro_id'        => $parceiro_id,
	                  	'cliente_id'         => $cliente_id,
	                  	'parcelas'           => 1
	                	)
	            	);

					if($this->Financeiro->save($novo_financeiro)){
						$financeiro_id				= $this->Financeiro->id;
						$retorno['financeiro_id'] 	= $financeiro_id;
					}else{
						throw new Exception("Erro ao gerar o financeiro da venda, favor entrar em contato com a Autoridade de Registro");	
					}
				}
				//                      							
			} catch (Exception $e) {
				$retorno['status'] = 0;
				$retorno['mensagem'] = $e->getMessage();
			}
			return $retorno;
			
		}

		private function vincular_boleto($venda_id,$financeiro_id,$id_boleto,$url_boleto){
			$this->autoRender = false;
			$retorno = array(
				'status' 			=> 1
			);
			try {
				
				$this->Venda->id = $venda_id;
				$this->Venda->saveField('id_boleto',$id_boleto);
				$this->Venda->saveField('url_boleto',$url_boleto);

				$this->Financeiro->id = $financeiro_id;
				$this->Financeiro->saveField('id_boleto',$id_boleto);
				$this->Financeiro->saveField('url_boleto',$url_boleto);

			} catch (Exception $e) {
				$retorno['status'] = 0;
				$retorno['mensagem'] = $e->getMessage();
			}
			return $retorno;
		}

		private function criar_boleto($token,$nome_banco,$venda_id){
			$this->autoRender = false;

			try {
				//$link = 'https://erpsigep.com.br/';
				$link = 'localhost/';
				$url  = $link . "Ar/Ecommerce/gerar_boleto_compra_facil/{$token}/{$nome_banco}/{$venda_id}";
				

				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => $url,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_POSTFIELDS => "",
				));

				$retorno = curl_exec($curl);

				$err = curl_error($curl);

				curl_close($curl);	
			} catch (Exception $e) {
				$retorno = array(
					'status' 			=> 0,
					'mensagem'	 		=> $e->getMessage()
				);
			}
			
			
			return $retorno;
			
		}

		public function enviar_email($venda_id){
			
			$this->autoRender = false;
	        $nome_banco = $this->Session->read("nome_banco");
	         
	        $venda    			= $this->Venda->busca_venda_email($venda_id);
	        
	        $tipo_validacoes_id 	= $venda[0]['v']['tipo_validacoes_id'];
	        $tipo_validacao     	= $this->TipoValidacoe->findByid($tipo_validacoes_id);
 			$compra_facil_email_id  = $tipo_validacao['TipoValidacoe']['compra_facil_email_id'];

			$empresa    = $this->Empresa->findByid(1);

	        $dados = $this->CompraFacilEmail->findByid($compra_facil_email_id);
	        
	        
	        
	        $conteudo = $dados["CompraFacilEmail"]["conteudo"];
	        $assunto  = $dados["CompraFacilEmail"]["assunto"];
	        $email    = 'mendes.kleber@hotmail.com';

	        if(empty($assunto)){
	            $assunto = "Instruções para compra fácil.";
	        }

	        
	        $cliente     = $venda[0]["c"]["razaosocial"];
	        $produto     = $venda[0]["p"]["nome"];
	        $venda_id    = $venda[0]["v"]["id"];
	        $link_boleto = $venda[0]["v"]["url_boleto"];
	    	
	        $link = "<a href=".$link_boleto." target='_blank'>".$link_boleto."</a>";

	        $conteudo = str_replace("@produto", $produto, $conteudo);
	        $conteudo = str_replace("@cliente", $cliente, $conteudo);
	        $conteudo = str_replace("@numero_pedido", $venda_id, $conteudo);
	        $conteudo = str_replace("@link_boleto", $link, $conteudo);

	        $logo = WWW_ROOT."files/{$nome_banco}/parceiro/empresa/logo/1.jpg";

	        if(file_exists($logo)){
	            $logo = "https://erpsigep.com.br/Ar/files/{$nome_banco}/parceiro/empresa/logo/1.jpg";
	        }else{
	            $logo = "";
	        }
	        // $logo = 'https://is4-ssl.mzstatic.com/image/thumb/Purple113/v4/ee/91/eb/ee91ebc6-f7e6-2fa2-356e-d5930900691b/AppIcon-0-0-1x_U007emarketing-0-0-0-7-0-0-sRGB-0-0-0-GLES2_U002c0-512MB-85-220-0-0.png/1200x630wa.png';
	        try {
	            
	            App::uses('CakeEmail', 'Network/Email');
	            $Email = new CakeEmail('sendgrid');
	            $Email->to($email);
	            $Email->subject ($assunto);
	            $Email->viewVars(array(
	                'conteudo' => $conteudo,
	                'logo' => $logo,
	                'empresa' => $empresa["Empresa"]["nome"]
	            ));
	            $Email->emailFormat('html');
	            $Email->Template('email_layout_compra_facil',null);
	            $Email->send();
	            return 0;
	            // $this->Session->setFlash(__("E-mail de exemplo enviado com sucesso.\nVerifique sua caixa de entrada."), "success-box", array("class"=>"alert-success"));
	            // $this->redirect(array("action" => "video_conferencia"));

	        } catch (Exception $e) {
	            
	            $this->Session->setFlash(__("Erro ao salvar: ".$e->getMessage()), "success-box", array("class"=>"alert-danger"));
	            // $this->redirect(array("action" => "video_conferencia"));

	        }
		}

	}

?>
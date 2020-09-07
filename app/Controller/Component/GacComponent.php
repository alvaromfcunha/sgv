<?php  
	
	class GacComponent extends Component {

		public function ListarProdutos(){

			$response = $this->DadosAutenticacao();
			
			if($response["status"]==1){

				$client = $response["client"];

				$dadosListarProdutos = array(
		            'p_autenticacao' => array(
		              'CHAVE' => $response["chave"],
		              'KEY'   => $response["key"]
		            )
		    	);

				$responseGac = $client->ListarProduto($dadosListarProdutos);
				$produtosGac = array();
				$listaDeProdutos = array();

				if(isset($responseGac->ListarProdutoResult->Produto)){

					$produtosGac = json_decode(json_encode($responseGac),true);

					foreach ($produtosGac["ListarProdutoResult"]["Produto"] as $key => $value) {
						
						if(!empty($value["NomeProduto"])){
							$listaDeProdutos[$value["IdProduto"]] = $value["NomeProduto"];
						}

					}

					$retorno = array(
						"status" => 1,
						"produtos" => $listaDeProdutos
					);

				}else{

					$retorno = array(
						"status" => 0,
						"erro" => "Não conseguimos recuperar os produtos do e-GAC.<br>Tente novamente mais tarde."
					);

				}

			}else{

				$retorno = array(
					"status" => 0,
					"erro" => $response["erro"]
				);

			}

			return $retorno;

		}

		public function ListarTipoLogradouro(){

			$response = $this->DadosAutenticacao();
			
			if($response["status"]==1){

				$client = $response["client"];

				$dadosListarTipoLogradouro = array(
		            'p_autenticacao' => array(
		              'CHAVE' => $response["chave"],
		              'KEY'   => $response["key"]
		            )
		    	);

				$responseGac = $client->ListarTipoLogradouro($dadosListarTipoLogradouro);

				if(isset($responseGac->ListarTipoLogradouroResult->TipoLogradouro)){

					$tipos = json_decode(json_encode($responseGac),true);

					$retorno = array(
						"status" => 1,
						"logradouros" => $tipos["ListarTipoLogradouroResult"]["TipoLogradouro"]
					);

				}else{

					$retorno = array(
						"status" => 0,
						"erro" => "Não conseguimos recuperar os tipos de logradouros do e-GAC.<br>Tente novamente mais tarde."
					);

				}

			}else{

				$retorno = array(
					"status" => 0,
					"erro" => $response["erro"]
				);

			}

			return $retorno;

		} 

		public function ListarCidade($uf = ""){

			$response = $this->DadosAutenticacao();
			
			if($response["status"]==1){

				$client = $response["client"];

				$dadosListarCidade = array(
		            "p_autenticacao" => array(
		              "CHAVE" => $response["chave"],
		              "KEY"   => $response["key"]
		            ),
		            "p_uf" => $uf
		    	);

				$responseGac = $client->ListarCidade($dadosListarCidade);

				$listaDeCidades = array();
				if(isset($responseGac->ListarCidadeResult->Cidade)){

					$cidades = json_decode(json_encode($responseGac),true);

					foreach ($cidades["ListarCidadeResult"]["Cidade"] as $key => $value) {
						
						if(!empty($value["IdCidade"])){
							$listaDeCidades[$value["IdCidade"]] = $value["NomeCidade"];
						}

					}

					$retorno = array(
						"status" => 1,
						"cidades" => $listaDeCidades
					);

				}else{

					$retorno = array(
						"status" => 0,
						"erro" => "Não conseguimos recuperar as cidades do e-GAC.<br>Tente novamente mais tarde."
					);

				}

			}else{

				$retorno = array(
					"status" => 0,
					"erro" => $response["erro"]
				);

			}

			return $retorno;

		} 

		function GerarPedido($proposta_id = 0, $forma_pagamento = 1){
			
			$Empresa  = ClassRegistry::init("Empresa");
			$Proposta = ClassRegistry::init("Proposta");

			$proposta = $Proposta->findByid($proposta_id);
			$empresa  = $Empresa->findByid($proposta["Proposta"]["empresa_id"]);

			if($empresa["Empresa"]["ambiente"]=="homologacao"){

				$retorno = array(
		    		"status" => 1,
		    		"dados" => array(
		    			"NumeroPedidoVenda" => "100040307",
		    			"LinkBoleto" => "http://localhost/proposta"
		    		)
		    	);

				return $retorno;

			}

			$response = $this->DadosAutenticacao();
			
			if($response["status"]==1){

				$client 		 = $response["client"];
				
				$Usuario         = ClassRegistry::init("Usuario");
				$Cliente         = ClassRegistry::init("Cliente");
				$Logradouro      = ClassRegistry::init("Logradouro");
				$Cidade          = ClassRegistry::init("Cidade");
				$ProdutoProposta = ClassRegistry::init("ProdutoProposta");

				$proposta = $Proposta->findByid($proposta_id);
				$usuario  = $Usuario->findByid($proposta["Proposta"]["usuario_id"]);

				$CHAVE = $empresa["Empresa"]["egac_chave"];
				$KEY   = $empresa["Empresa"]["egac_key"];

				if(!empty($usuario["Usuario"]["egac_cod_vendedor"])){
					$COD_VENDEDOR = $usuario["Usuario"]["egac_cod_vendedor"];
				}else{
					$COD_VENDEDOR = $empresa["Empresa"]["egac_cod_vendedor"];
				}

				/* Produtos */

				$produtosProposta = $ProdutoProposta->find("all", array("conditions"=>array(
					"ProdutoProposta.proposta_id" => $proposta_id
				)));

				$produtosGac = array();

				for ($i=0; $i <count($produtosProposta) ; $i++) { 
						
					if($produtosProposta[$i]["ProdutoProposta"]["desconto"]>0){

						$desconto   = $produtosProposta[$i]["ProdutoProposta"]["desconto"];
						$unitario   = $produtosProposta[$i]["ProdutoProposta"]["unitario"];
						$quantidade = $produtosProposta[$i]["ProdutoProposta"]["quantidade"];
						$unitario   = $unitario - ($unitario*($desconto/100));

					}else{

						$unitario   = $produtosProposta[$i]["ProdutoProposta"]["unitario"];
						$quantidade = $produtosProposta[$i]["ProdutoProposta"]["quantidade"];

					}

					$produto = array(
						"IdProduto"  => $produtosProposta[$i]["Produto"]["produto_gac_id"],
						"Preco"      => $unitario,
						"QtdProduto" => $quantidade
					);

					array_push($produtosGac, $produto);

				}

				/* Cliente */

				$cliente = $Cliente->findByid($proposta["Proposta"]["cliente_id"]);

				if($cliente["Cliente"]["tipo"]==1){
					$tipoPessoa = "F";
				}else{
					$tipoPessoa = "J";
				}

				$logradouro = $Logradouro->findByid($cliente["Cliente"]["logradouro_id"]);
				$id_tipo_logradouro = $logradouro["Logradouro"]["id_tipo_logradouro"];

				$cidade = $Cidade->findByid($cliente["Cliente"]["cidade_id"]);
				$egac_cidade_id = $cidade["Cidade"]["egac_cidade_id"];

				if($forma_pagamento==2){
					$p_isCriarBoleto = 0;
					$p_isCartaoIugu  = 1;
				}else{
					$p_isCriarBoleto = 1;
					$p_isCartaoIugu  = 0;
				}

				$dadosSalvarCompra = array(
		            'p_autenticacao' => array(
		              	'CHAVE' => $CHAVE,
		              	'KEY'   => $KEY
		            ),
		            'compra' => array(
		              	'CodigoVendedor' => $COD_VENDEDOR,
		              	'Produtos' => array(
		              		'Produto' => $produtosGac
		              	),
		              	'Cliente' => array(
			                'TipoPessoa'         => $tipoPessoa,
			                'NumeroDocumento'    => $cliente["Cliente"]["cnpjcpf"],
			                'NomeCliente'        => $cliente["Cliente"]["razaosocial"],
			                'CEP'                => $cliente["Cliente"]["cep"],
			                'TipoLogradouro' => array(
			                    'TipoLogradouro' => array(
			                        'IdTipoLogradouro' => $id_tipo_logradouro
			                    )
			                ),
			                'Endereco' => $cliente["Cliente"]["endereco"],
			                'Numero'   => $cliente["Cliente"]["numero"],
			                'Bairro'   => $cliente["Cliente"]["bairro"],
			                'Cidade' => array(
			                    'Cidade' => array(
			                        'IdCidade' => $egac_cidade_id,
			                        'UF' => $cidade["Estado"]["sigla"]
			                    )
			                ),
			                'Complemento'    => $cliente["Cliente"]["complemento"],
			                'Ddd'            => $cliente["Cliente"]["ddd_telefone"],
			                'NumeroTelefone' => $cliente["Cliente"]["numero_telefone"],
			                'Email'          => $cliente["Cliente"]["email"],
		              	),
		              	'TipoCompra' => 'COMPLETA',
		              	'EnviarEmailCliente' => false
		            ),
		            'p_isCriarBoleto' => $p_isCriarBoleto, // Boolean
		            'p_isCartaoIugu' => $p_isCartaoIugu
			    );
	    		
			    $response = $client->SalvarCompra($dadosSalvarCompra);
			    $response = json_decode(json_encode($response),true);

			    if(isset($response["SalvarCompraResult"])){

			    	if(isset($response["SalvarCompraResult"]["NumeroPedidoVenda"])){

			    		$retorno = array(
				    		"status" => 1,
				    		"dados" => $response["SalvarCompraResult"]
				    	);

			    	}elseif(isset($response["SalvarCompraResult"]["ListaMensagem"])){

			    		$retorno = array(
				    		"status" => 0,
				    		"erro" => $response["SalvarCompraResult"]["ListaMensagem"]["Valor"].": ".$response["SalvarCompraResult"]["ListaMensagem"]["Texto"]
				    	);

			    	}else{

			    		$retorno = array(
				    		"status" => 0,
				    		"erro" => $response
				    	);

			    	}

			    }else{

			    	$retorno = array(
			    		"status" => 0,
			    		"erro" => $response
			    	);

			    }

			}else{

				$retorno = array(
					"status" => 0,
					"erro" => $response["erro"]
				);

			}

			return $retorno;

		}
		
	    public function ConsultarPedido($pedido = 0){

	    	$response = $this->DadosAutenticacao();
	    	if($response["status"]==1){

	    		$client = $response["client"];

	    		$dados = array(
	    			"p_autenticacao" => array(
	    				"CHAVE" => $response["chave"],
	    				"KEY" => $response["key"]
	    			),
	    			"numeroPedidoVenda" => $pedido
	    		);

	    		pr($client->ConsultarCompra($dados));

	    	}

	    }

		private function DadosAutenticacao(){

			$Empresa = ClassRegistry::init("Empresa");

			$empresa = $Empresa->findByid(1);

			$wsdl         = $empresa["Empresa"]["egac_wsdl"];
		    $chave        = $empresa["Empresa"]["egac_chave"];
		    $key          = $empresa["Empresa"]["egac_key"];
		    $cod_vendedor = $empresa["Empresa"]["egac_cod_vendedor"];

		    try {
		    	
		    	$client = new SoapClient($wsdl, array(
                    "trace" => 1,
                    'exceptions' => 1,
                    "stream_context" => stream_context_create(
                        array(
                            'ssl' => array(
                                'verify_peer'       => false,
                                'verify_peer_name'  => false,
                            )
                        )
                    )
                ));

		    	if($client){

		    		$retorno = array(
		    			"status" 		=> 1,
		    			"client" 		=> $client,
		    			"chave" 		=> $chave,
		    			"key" 			=> $key,
		    			"cod_vendedor" 	=> $cod_vendedor
		    		);

		    		return $retorno;

		    	}else{

		    		$retorno = array(
		    			"status" => 0,
		    			"erro" => "Ocorreu um problema ao tentar autenticar com o e-GAC."
		    		);

		    		return $retorno;

		    	}

		    } catch (Exception $e) {
		    	
		    	$retorno = array(
	    			"status" => 0,
	    			"erro" => "Ocorreu um problema ao tentar autenticar com o e-GAC: ".$e->getMessage()
	    		);

	    		return $retorno;

		    } catch (SoapFault $e){

		    	$retorno = array(
	    			"status" => 0,
	    			"erro" => "Ocorreu um problema ao tentar autenticar com o e-GAC: ".$e->getMessage()
	    		);

	    		return $retorno;

		    }

		}

	}

?>
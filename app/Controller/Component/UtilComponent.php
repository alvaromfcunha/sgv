<?php  
	
	class UtilComponent extends Component {

		function TrataCaracter($palavra = ""){

	    	$palavra = str_replace(".", "", $palavra);   
            $palavra = str_replace("-", "", $palavra);	
            $palavra = str_replace("/", "", $palavra);	
            $palavra = str_replace("(", "", $palavra);	
            $palavra = str_replace(")", "", $palavra);
            $palavra = str_replace(" ", "", $palavra);
            $palavra = str_replace('"', "", $palavra);
            return $palavra;

	    }	

	    function TrataMoeda($valor = 0){

	    	$valor =  number_format($valor, 2, ',', '.');
            return $valor;	

	    }

		function TrataData($data = ""){

	    	if($data=="0000-00-00"||$data=="0000-00-00 00:00:00"||empty($data)){
	    		return "00-00-0000";
	    	}

	    	$data = date('d/m/Y', strtotime($data));
            return $data;	

	    }

	    function TrataDataHora($data = ""){

	    	$data = date('d/m/Y H:i', strtotime($data));
            return $data;

	    }

	    function TrataDataBanco($data = ""){

	    	$data = str_replace("/","-",$data);
	    	$data = date('Y-m-d', strtotime($data));
            return $data;

	    }

	    function TrataDataHoraBanco($data = ""){

	    	$data = str_replace("/","-",$data);
	    	$data = date('Y-m-d H:i:s', strtotime($data));
            return $data;	

	    }

	    function TrataCaixaAlta($texto = ""){

	    	$texto =  mb_strtoupper($texto);
	    	return $texto;

	    }

	    function TrataTelefone($texto = ""){

	    	$texto = str_replace(" ","",$texto);
 			$texto = str_replace("(","",$texto);
 			$texto = str_replace(")","",$texto);
 			$texto = str_replace("-","",$texto);
 			$tamanho = strlen($texto);
            
            if($tamanho < 8 || $tamanho > 11){
            	return $texto;
            }
            if($tamanho ==11){
            	$mascara = "(##) #####-####";
            }else if($tamanho ==8){
            	$mascara = "####-####";
            }else if($tamanho ==9){
            	$mascara = "#####-####";
            }else{
            	$mascara = "(##) ####-####";
            }
  
		    for($i=0;$i<strlen($texto);$i++){
		        $mascara[strpos($mascara,"#")] = $texto[$i];
    		}

    		return $mascara;

	    }

	    function TrataCnpjCpf($texto = ""){

	    	$cnpj = "##.###.###/####-##";
	    	$cpf = "###.###.###-##";

	    	if(strlen($texto)==14){

			    for($i=0;$i<strlen($texto);$i++){
			        $cnpj[strpos($cnpj,"#")] = $texto[$i];
	    		}

	    		return $cnpj;

	    	}elseif(strlen($texto)==11){

	    		for($i=0;$i<strlen($texto);$i++){
			        $cpf[strpos($cpf,"#")] = $texto[$i];
	    		}

	    		return $cpf;
	    	}else{
	    		return $texto;
	    	}

	    }

	    function TrataVirgulaPonto($valor = ""){

	    	$valor = str_replace(",", ".", $valor);
	    	$valor = str_replace(".", ".", $valor);
            return $valor;	

	    }

	    function TirarAcentos($string){
		    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç|Ç)/"),explode(" ","a A e E i I o O u U n N C c"),$string);
		}

	}

?>
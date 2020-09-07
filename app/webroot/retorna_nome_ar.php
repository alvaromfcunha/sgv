<?php  	
	
	function nomes(){
		$nomes = array(
			'DropCode' => 'homologacao',
        	



    	);
    	return $nomes;
	}

	function retorna_nome($chave){

        $nome_ar = nomes();
        
        if(isset($nome_ar[$chave])){
            $nome_ar = $nome_ar[$chave];
        }else{
            $nome_ar = "";
        }

        return $nome_ar;

	}

	function retorna_nome_all(){
		$nome_ar = nomes();
        return $nome_ar;

	}

?>
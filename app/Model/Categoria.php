<?php  
	
	class Categoria extends AppModel {

		public $name = "Categoria";
		public $displayField = "nome";

		public $validate = array(
			"nome" => array(
				"rule1" => array(
					"rule" => array("notBlank"),
					"message" => "O nome da categoria é obrigatório preencher."
				)
			)
		);

		public function beforeFind($queryData = array()){

			$sessao = $this->sessaoAtiva();
			if(!empty($sessao) && $sessao["Usuario"]["tipo"]!=0){
				$queryData["conditions"][$this->alias.".empresa_id"] = $sessao["Usuario"]["empresa_id"];
			}

			return $queryData;

		}
		
	}

?>
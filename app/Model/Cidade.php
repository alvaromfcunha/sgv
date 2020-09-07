<?php  
	
	class Cidade extends AppModel {

		public $name = "Cidade";
		public $displayField = "nome";

		public $belongsTo = array("Estado");

	}

?>
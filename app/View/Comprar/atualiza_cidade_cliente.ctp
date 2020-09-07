<?php  
  echo $this->Form->input('cidade_cliente', array('id'=>'inputCidade','options' => $array_cidades, 'class' => 'standardSelect form-control', 'label' => 'Cidade','empty' => 'Selecione...' ,'style'=>'text-transform: uppercase','onchange' =>'habilitar_botao_1()','required'=>'required')); 
?>
                        
<script>
    $(document).ready(function() {
        $(".standardSelect").chosen({
            no_results_text: "Não encontramos nenhum item!",
            width: "100%"
        });
    });

</script>


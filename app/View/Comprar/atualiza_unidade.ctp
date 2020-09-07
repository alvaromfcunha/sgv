<?php  
  echo $this->Form->input('unidade_id', array('id'=>'unidade_id','options' => $array_unidades, 'class' => 'standardSelect form-control', 'label' => 'Unidade de atendimento','empty' => 'Selecione...' ,'style'=>'text-transform: uppercase','onchange' =>'habilitar_botao_1()')); 
?>
                        
<script>
    $(document).ready(function() {
        $(".standardSelect").chosen({
            no_results_text: "Não encontramos nenhum item!",
            width: "100%"
        });
    });
    
</script>


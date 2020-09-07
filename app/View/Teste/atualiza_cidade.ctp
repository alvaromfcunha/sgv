<?php  
  echo $this->Form->input('cidade_id', array('id'=>'cidade','options' => $array_cidades, 'class' => 'standardSelect form-control', 'label' => 'Cidade','empty' => 'Selecione...' ,'style'=>'text-transform: uppercase','onchange' =>'habilitar_botao_1()')); 
?>
                        
<script>
    $(document).ready(function() {
        $(".standardSelect").chosen({
            no_results_text: "Não encontramos nenhum item!",
            width: "100%"
        });
    });
    $().chosen().change(

      $('#cidade').on('change', function(){ 
        $.ajax({
          async:true, 
          type:'post', 
          complete:function(request, json) {
            $('#unidade').html(request.responseText); 
            habilitar_botao_1()
          }, 
          url:'<?php echo $this->Html->url(array("controller"=>"Teste","action"=>"atualiza_unidade")) ?>', 
          data:$('#cidade').serialize()

        })
        
      })

    );
</script>


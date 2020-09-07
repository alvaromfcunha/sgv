<?php
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
    if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
        $mobile = 1;
    }else{
        $mobile = 0;
    }

?>
<div class="row setup-content" id="div_step-1">
    <div class="col-md-12">      
                <?php echo $this->Form->create('Venda',array("enctype"=>"multipart/form-data","id"=>"formulario-vendas"));
                      echo $this->Form->input('estado_id', array('id'=>'estado','options' => $array_estados, 'class' => 'standardSelect form-control', 'label' => 'Estado','empty' => 'Selecione...' ,'style'=>'text-transform: uppercase')); 
                ?>
                <div id='pro'> 
                  <?php  
                    echo $this->Form->input('cidade_id',array('id'=>'cidade' ,'type'=>'text','label' => 'Cidade','class' => 'form-control','readonly ' => 'true','value'=>'Selecione o estado.'));
                  ?>
                </div>
                <div id='unidade'> 
                  <?php  
                    echo $this->Form->input('unidade',array('id'=>'unidade_id', 'type'=>'text','label' => 'Unidade de Atendimento','class' => 'form-control','readonly ' => 'true','value'=>'Selecione o estado e a Cidade.'));
                  ?>
                </div>
                <?php 
                    echo $this->Form->input('forma_validacao',array('id'=>'forma_validacao','options' => $array_validacoes,'label' => 'Validação','class' => 'form-control','value'=>'Selecione o tipo de validacao.', 'onchange' =>'habilitar_botao_1()'));
                ?>  
                <?php 
                    echo $this->Form->end();
                 ?>
                <br>
            <button id='botao_1' class="btn btn-danger nextBtn btn-lg pull-right" type="button" onclick='buscar_produto()' disabled>Próximo</button>
            
    </div>
</div>


<script type="text/javascript">
     $(function(){
    $().chosen().change(
      $('#estado').on('change', function(){ 
        $.ajax({
          async:true, 
          type:'post', 
          complete:function(request, json) {
            $('#pro').html(request.responseText); 
            
          }, 
          url:'<?php echo $this->Html->url(array("controller"=>"Teste","action"=>"atualiza_cidade")) ?>', 
          data:$('#estado').serialize()

        })
      })
    );
  });
</script>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Compra Facil</strong>
            </div>
            <div class="card-body">

                <div>
                    <div class="card-body">
                        <div class="card-title">
                         
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Launch demo modal
                        </button>

                        </div>
                        <br><br>
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleciona o local da validação.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create('Venda',array("enctype"=>"multipart/form-data","id"=>"formulario-vendas"));
              echo $this->Form->input('estado_id', array('id'=>'estado','options' => $array_estados, 'class' => 'standardSelect form-control', 'label' => 'Estado','empty' => 'Selecione...' ,'style'=>'text-transform: uppercase')); 
        ?>
        <div id='pro'> 
          <?php  
            echo $this->Form->input('cidade_id',array('type'=>'text','label' => 'Cidade','class' => 'form-control','id'=>'unitario','readonly ' => 'true','value'=>'Selecione o estado.'));
          ?>
        </div>
        <div id='unidade'> 
          <?php  
            echo $this->Form->input('unidade',array('type'=>'text','label' => 'Unidade de Atendimento','class' => 'form-control','id'=>'unitario','readonly ' => 'true','value'=>'Selecione o estado e a Cidade.'));
          ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Selecionar</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(function(){


    $().chosen().change(

      $('#estado').bind('change', function(){ 
        console.log($('#estado').serialize());
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
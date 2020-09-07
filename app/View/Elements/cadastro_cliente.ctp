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
<!-- Cadastro de Cliente -->
<div class="row setup-content" id="div_step-3">
    <div class="col-md-12">
      
        <!-- <form method="post" action="#"  onsubmit='return btnClick();'>  -->
        <form method="post" action="#" onsubmit="return validaForm(this);" id='formulario_cliente'>

        <div class="form-row">
            <div class="form-group col-md-4">
            <?php 
                echo $this->Form->input('tipo_cliente', array('id'=>'inputTipoCliente','class' => 'form-control','options'=>array('1'=>'Fisica','2'=>'Juridica'), 'label' => 'Digite Seu CPF/CNPJ','style'=>'text-transform: uppercase','onchange'=>'mudar_label()')); 
            ?>
            </div>
            <div class="form-group col-md-8" >
                <label for="inputCnpjcpf" id="cnpjcpf">Digite seu CPF (Somente números)</label>
                <input name="data[Venda][cnpjcpf]" class="cpf_cnpj form-control" style="text-transform: uppercase" type="text" required id='inputCnpjcpf' maxlength="11"  >
            </div> 
        </div>  

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNomeCliente" id="nome">Nome </label>
                <input name="data[Venda][razaosocial]" class="form-control" style="text-transform: uppercase" type="text" id='inputNomeCliente' placeholder ='Seu nome' required>
            </div>
            
            <div class="form-group col-md-3">
                <label for="inputTelefone" >Telefone </label>
                <input name="data[Venda][telefone]" class="tel form-control" style="text-transform: uppercase" type="text" id='inputTelefone' placeholder='(xx) xxxx-xxxx' required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail" >Email </label>
                <input name="data[Venda][email]" class="form-control" style="text-transform: uppercase" type="email" id='inputEmail' placeholder='email@gmail.com' required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-2">
              <label for="inputCEP">CEP</label>
              <input type="text" class="form-control cep" id="inputCEP" required>
            </div>
            <div class="form-group col-md-4">
              
              <?php 
                echo $this->Form->input('inputEstado', array('id'=>'inputEstado','options' => $array_todos_estados, 'class' => 'standardSelect form-control', 'label' => 'Estado','empty' => 'Selecione...' ,'style'=>'text-transform: uppercase','required'=>'required')); 
               ?>
            </div>    
            <div class="form-group col-md-6">
              <div id='cidade_cliente'> 
                  <label for="inputCity">Cidade</label>
              <input type="text" class="form-control" id="inputCity">
              </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEndereco" >Endereço </label>
                <input name="data[Venda]['endereco']" class="form-control" style="text-transform: uppercase" type="text" id='inputEndereco' placeholder ='Alameda das flores' required>
            </div>
            
            <div class="form-group col-md-3">
                <label for="inputNumero" >Número </label>
                <input name="data[Venda][numero]" class="form-control" style="text-transform: uppercase" type="text" id='inputNumero' placeholder='342' required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputBairro" >Bairro </label>
                <input name="data[Venda][email]" class="form-control" style="text-transform: uppercase" type="text" id='inputBairro' placeholder='Centro' required>
            </div>
        </div>                                  
                  
          
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" >Próximo</button>
            <button onclick='voltar_3()' class="btn btn-info btn-lg pull-left" type="button" >Voltar</button>

        </form>
    </div>
</div>
        
<script type="text/javascript">
    
    

    $(function(){
        $().chosen().change(
          $('#inputEstado').on('change', function(){  
            $.ajax({
              async:true, 
              type:'post', 
              complete:function(request, json) {
                $('#cidade_cliente').html(request.responseText); 
                
              }, 
              url:'<?php echo $this->Html->url(array("controller"=>"Teste","action"=>"atualiza_cidade_cliente")) ?>', 
              data:$('#inputEstado').serialize()

            })
          })
        );

   
      });

    
</script>



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

<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot ?>compra_rapida/style.css">

<style type="text/css">

a.disabled {
  pointer-events: none;
  cursor: default;
}
body{ 
    margin-top:40px; 
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <center><strong class="card-title">Compra Facil</strong></center>
            </div>
            <div class="card-body">

                <div>
                    <div class="card-body">
                        <div class="container">
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                        <p>Validação</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#div_step-2" id='step-2' type="button" class=" btn btn-default btn-circle" disabled="disabled">2</a>
                                        

                                        <p>Produto</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#div_step-3" id='step-3' type="button" class=" btn btn-default btn-circle" disabled="disabled">3</a>
                                        <p>Cadastro</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-4" type="button" class=" btn btn-default btn-circle" disabled="disabled">4</a>
                                        <p>Detalhes</p>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="row setup-content" id="step-1">
                                    <div class="col-md-12">
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
                                </div>
                                
                                <div class="row setup-content" id="div_step-2">
                                    <div class="col-md-12">
                                        
                                            
                                            <!-- infoco -->
                                            <div class='col-md-1'></div>
                                             <div id="align" class="row">
                                                <?php if($mobile==0){ ?>
                                                <div id="alinhamento" class="col-md-3 bd">
                                                <?php }else{ ?>
                                                <div id="alinhamento" style="height: 345px;" class="col-md-2 bd">
                                                <?php } ?>

                                                    <div>
                                                        <h3 class="e3"><b>Modelo <p class="glyphicon glyphicon-share-alt"></p></b></h3>
                                                    </div>

                                                    <div id="catPF" class="e2" >
                                                        <input type="radio" id="cpf" name="modelo" value="1" 
                                                         onclick='buscar_produto()' checked/>
                                                        <label><img id="cat" src="<?php echo $this->webroot ?>compra_rapida/Imagens/cat.png">&nbsp;&nbsp;e-CPF</label>
                                                    </div>
                                                    
                                                    <div id="catPJ" class="e2">
                                                        <input  type="radio" id="cnpj" name="modelo" value="2" 
                                                        onclick='buscar_produto()' />
                                                        <label ><img id="cat" src="<?php echo $this->webroot ?>/compra_rapida/Imagens/cat.png">&nbsp;&nbsp;e-CNPJ</label>
                                                    </div>

                                                    <div id="catNFe" class="e2">
                                                        <input  type="radio" id="nfe" name="modelo" value="3" 
                                                        onclick='buscar_produto()' />
                                                        <label ><img id="cat" src="<?php echo $this->webroot ?>compra_rapida/Imagens/cat.png">&nbsp;&nbsp;NF-e</label>
                                                    </div>

                                                    <div id="catOAB" class="e2">
                                                        <input  type="radio" id="oab" name="Modelo" value="4" 
                                                        onclick='buscar_produto()' />
                                                        <label ><img id="cat" src="<?php echo $this->webroot ?>compra_rapida/Imagens/cat.png">&nbsp;&nbsp;OAB/CRC/CRM</label>
                                                    </div>

                                                    <div id="catOAB" class="e2">
                                                        <input  type="radio" id="oab" name="Modelo" value="5" 
                                                        onclick='buscar_produto()' />
                                                        <label ><img id="cat" src="<?php echo $this->webroot ?>compra_rapida/Imagens/cat.png">&nbsp;&nbsp;Mobile/Bird</label>
                                                    </div>

                                                </div> <!-- fim div categoria class md2 -->

                                                <?php if($mobile==0){ ?>
                                                <div id="alinhamento" class="col-md-2 bd">
                                                <?php }else{ ?>
                                                <div id="alinhamento" style="height: 175px;" class="col-md-2 bd">
                                                <?php } ?>

                                                    <div>
                                                        <h3 class="e3"><b>Tipo <p class=" glyphicon glyphicon-share-alt"></p></b> </h3>
                                                    </div>

                                                    <div id="modA1" class="e2">
                                                        <input  type="radio" id="a1" name="tipo" value="1" 
                                                         onclick='buscar_produto()'checked />
                                                        <label ><img id="cartao2" src="<?php echo $this->webroot ?>compra_rapida/Imagens/a1.png">&nbsp;&nbsp;A1</label>
                                                    </div>
                                                    
                                                    <div id="modA3" class="e2">
                                                        <input  type="radio" id="a3" name="tipo" value="2" 
                                                        onclick='buscar_produto()' />
                                                        <label ><img id="tokenC" src="<?php echo $this->webroot ?>compra_rapida/Imagens/token_e_cartao.png">&nbsp;&nbsp;A3</label> 
                                                    </div>

                                                </div> <!-- fim div modelo class md2 -->

                                                <?php if($mobile==0){ ?>
                                                <div id="alinhamento" class="col-md-2 bd">
                                                <?php }else{ ?>
                                                <div id="alinhamento" style="height: 295px;" class="col-md-2 bd">
                                                <?php } ?>

                                                    <div>
                                                        <h3 class="e3"><b>MÍDIA <span class="glyphicon glyphicon-share-alt"></span></b></h3>
                                                    </div>

                                                    <div id="midSoft" class="e2">
                                                        <input  type="radio" id="software" name="midia" value="1" 
                                                         onclick='buscar_produto()' checked/>
                                                        <label ><img id="cartao2" src="<?php echo $this->webroot ?>compra_rapida/Imagens/a1.png">&nbsp;&nbsp;Sem Midia</label>
                                                    </div>

                                                    <div id="midToken" class="e2">
                                                        <input type="radio" id="token" name="midia" value="2"
                                                        onclick='buscar_produto()' />
                                                        <label><img id="token2" src="<?php echo $this->webroot ?>compra_rapida/Imagens/token.png">&nbsp;&nbsp;Token</label>
                                                    </div>
                                                    
                                                    <div id="midCartao" class="e2">
                                                        <input  type="radio" id="cartao" name="midia" value="3" 
                                                        onclick='buscar_produto()' />
                                                        <label ><img id="cartao2" src="<?php echo $this->webroot ?>compra_rapida/Imagens/cartao.png">&nbsp;&nbsp;Cartão sem leitora</label> 
                                                    </div>

                                                    <div id="midLeitora" class="e2">
                                                        <input  type="radio" id="c_leitora" name="midia" value="4"
                                                        onclick='buscar_produto()' />
                                                        <label ><img id="cartaoLeitora" src="<?php echo $this->webroot ?>compra_rapida/Imagens/token_e_cartao.png">&nbsp;&nbsp;Cartão c/ leitora</label>
                                                    </div>
                                                    
                                                    

                                                </div> <!-- fim div midia class md2 -->

                                                <?php if($mobile==0){ ?>
                                                <div id="alinhamento" class="col-md-2 bd">
                                                <?php }else{ ?>
                                                <div id="alinhamento" style="height: 225px;" class="col-md-2 bd">
                                                <?php } ?>

                                                    <div>
                                                        <h3 class="e3"><b>VALIDADE <p class=" glyphicon glyphicon-share-alt"></p></b> </h3>
                                                    </div>

                                                    <div id="val12" class="e2">
                                                        <input  type="radio" id="12meses" name="validade" value="1" 
                                                         onclick='buscar_produto()' checked/>
                                                        <label > 12 meses</label>
                                                    </div>

                                                    <div id="val24" class="e2">
                                                        <input  type="radio" id="24meses" name="validade" value="2" 
                                                        onclick='buscar_produto()' />
                                                        <label > 18 meses</label> 
                                                    </div>   

                                                    <div id="val24" class="e2">
                                                        <input  type="radio" id="24meses" name="validade" value="3" 
                                                        onclick='buscar_produto()' />
                                                        <label > 24 meses</label> 
                                                    </div>

                                                    <div id="val36" class="e2">
                                                        <input  type="radio" id="36meses" name="validade" value="428571429"
                                                        onclick='buscar_produto()' />
                                                        <label > 36 meses</label>
                                                    </div>
                                                </div>  <!-- fim div validade class md2 -->

                                                <?php if($mobile==0){ ?>
                                                <div id="alinhamento" class="col-md-3    bd">
                                                <?php }else{ ?>
                                                <div id="alinhamento" style="height: 225px;" class="col-md-2 bd">
                                                <?php } ?>

                                                    <div>
                                                        <h3 class="e3"><b>Produtos <p class=" glyphicon glyphicon-share-alt"></p></b> </h3>
                                                    </div>
                                                    <div id='trocar'></div> 
                                                   
                                                    
                                                    
                                                </div>  <!-- fim div validade class md2 -->

                                                

                                                

                                                <input id="preco_produto" type="hidden" name="preco" value="0">
                                                <input id="preco_delivery" type="hidden" name="p.delivery" value="0">

                                            </div>
                                            <!-- infoco -->
                
                                            <button id='botao_2' class="btn btn-danger nextBtn btn-lg pull-right" type="button"  disabled>Próximo</button>

                                        
                                    </div>
                                </div>

                                <!-- Cadastro de Cliente -->
                                <div class="row setup-content" id="div_step-3">
                                    <div class="col-md-12">
                                      
                                        <!-- <form method="post" action="#"  onsubmit='return btnClick();'>  -->
                                        <form method="post" action="#" onsubmit="return validaForm(this);">

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                            <?php 
                                                echo $this->Form->input('tipo_cliente', array('id'=>'inputTipoCliente','class' => 'form-control','options'=>array('0'=>'Fisica','1'=>'Juridica'), 'label' => 'Digite Seu CPF/CNPJ','style'=>'text-transform: uppercase','onchange'=>'mudar_label()')); 
                                            ?>
                                            </div>
                                            <div class="form-group col-md-8" >
                                                <label for="inputCnpjcpf" id="cnpjcpf">Digite seu CPF (Somente números)</label>
                                                <input name="data[Venda][cnpjcpf]" class="cpf_cnpj form-control" style="text-transform: uppercase" type="text" required id='inputCnpjcpf' maxlength="11" >
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
                                                <input name="data[Venda][email]" class="form-control" style="text-transform: uppercase" type="text" id='inputEmail' placeholder='email@gmail.com' required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                              <label for="inputCEP">CEP</label>
                                              <input type="text" class="form-control cep" id="inputCEP" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                              
                                              <?php 
                                                echo $this->Form->input('inputEstado', array('id'=>'inputEstado','options' => $array_todos_estados, 'class' => 'standardSelect form-control', 'label' => 'Estado','empty' => 'Selecione...' ,'style'=>'text-transform: uppercase')); 
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
                                          

                                        </form>
                                    </div>
                                </div>
                                <br>

                                <div class="row setup-content" id="step-4">
                                    <h4><small><b>Detalhes Emissão</b></small></h4>
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">Unidade Emissora</th>
                                          <th scope="col">Cidade / Estado</th>
                                          <th scope="col">Tipo de Validacao</th>
                                          <th scope="col">Produto</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td id='tdUnidade'  >AR WSD</td>
                                          <td id='tdCidade'   >Santa Rita do Sapucai / MG</td>
                                          <td id='tdValidacao'>Presencial</td>
                                          <td id='tdProduto'  >A1 CNPJ - R$ 181,00</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <br>
                                    <br>
                                    <h4><small><b>Detalhes Cliente</b></small></h4>
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">CPF/CNPJ</th>
                                          <th scope="col">Cidade / Estado</th>
                                          <th scope="col">Razao Social</th>
                                          <th scope="col">E-mail</th>
                                          <th scope="col">Telefone</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td id='tdCnpjCpf' >104.338.766-89</td>
                                          <td id='tdCidadeCliente' >Santa Rita do Sapucai / MG</td>
                                          <td id='tdRazaoSocial' >Kleber Mendes</td>
                                          <td id='tdEmail' >mendes.kleber@hotmail.com</td>
                                          <td id='tdTelefone'>(35) 99178-0353</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Finalizar Venda</button>
                                </div>    

                            
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $this->webroot ?>js/valida_ao_sair_do_campo.js"></script>
<script src="<?php echo $this->webroot ?>js/valida_cpf_cnpj.js"></script>

<script type="text/javascript">
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});




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


    var array_cliente = {
      'validacao' : {
          'unidade_id'      : '1',
          'unidade_nome'    : '',
          'validacao'       : '2'
      },
      'produto' : {
          'id'      : '1',
          'nome'    : '',
      },
      'cliente' : {
          'tipo_pj_pf' : '1',
          'cnpjcpf'    : '10433876689',
          'nome'       : 'Kleber Mendes',
          'telefone'   : '35991780353',
          'email'      : 'mendes.kleber@hotmail.com',
          'cep'        : '37540000',
          'estado_id'  : '1',
          'cidade_id'  : '1',
          'endereco'   : 'Rua Comendador Custorio Ribeiro',
          'numero'     : '12',
          'bairro'           : 'centro'
      },
    };
    function buscar_produto(){

        var forma_validacao = document.getElementById("forma_validacao").value;
        // console.log(forma_validacao);

        var unidade_id = document.getElementById("unidade_id").value;
        // console.log('unidade :'+unidade_id);
        
        var modelo           = document.getElementsByName("modelo");
        var modelo_escolhido = 0;
        for (var i = 0; i < modelo.length; i++) {
            if (modelo[i].checked) {
                modelo_escolhido = modelo[i].value;
            }
        }

        var tipo        = document.getElementsByName("tipo");
        tipo_escolhido  = 0;
        for (var i = 0; i < tipo.length; i++) {
            if (tipo[i].checked) {
                tipo_escolhido = tipo[i].value;
            }
        }

        var midia           = document.getElementsByName("midia");
        var midia_escolhido = 0;
        for (var i = 0; i < midia.length; i++) {
            if (midia[i].checked) {
                midia_escolhido = midia[i].value;
            }
        }

        var validade            = document.getElementsByName("validade");
        var validade_escolhido  = 0;
        for (var i = 0; i < validade.length; i++) {
            if (validade[i].checked) {
                validade_escolhido = validade[i].value;
            }
        }

        var host        = 'localhost';    
        var nome_banco  = 'homologacao';
        $.ajax({
            async:true, 
            type:'post', 
            data:{
                forma_validacao     : forma_validacao,
                modelo_escolhido    : modelo_escolhido,
                tipo_escolhido      : tipo_escolhido,
                midia_escolhido     : midia_escolhido,
                validade_escolhido  : validade_escolhido,
                unidade_id          : unidade_id    
            },
            url:'http://localhost/Ar/CompraFacil/buscar_produto/homologacao',

            complete:function(request, json) {
               
                var response = request.responseText;
                $('#trocar').html(response) ;
                desabilitar_botao_2()   

            }
        })     
    }
    function mudar_label(){
        var tipo_cliente = document.getElementById('inputTipoCliente').value;
        if (tipo_cliente ==0) {
            document.getElementById("cnpjcpf").innerHTML = 'Digite seu CPF (Somente números)';
            document.getElementById("nome").innerHTML = 'Nome';
            document.getElementById("inputCnpjcpf").maxLength = 11;

        }else{
            document.getElementById("cnpjcpf").innerHTML = 'Digite seu CNPJ (Somente números)';
            document.getElementById("nome").innerHTML = 'Razão Social';
            document.getElementById("inputCnpjcpf").maxLength = 14;
        }
    }

    function habilitar_botao_1(){
        var estado          = document.getElementById("estado").value;
        var cidade          = document.getElementById("cidade").value;
        var unidade_id      = document.getElementById("unidade_id").value;
        var forma_validacao = document.getElementById("forma_validacao").value;

        if (estado && cidade && unidade_id){
            // habilitando o botao, mudando a cor dele e ativando a proxima step
            document.getElementById('botao_1').classList.add('btn-primary')
            document.getElementById('botao_1').classList.remove('btn-danger')
            document.getElementById('step-2').classList.remove('disabled')
            document.getElementById("botao_1").disabled = false;
            
            setar_dados_step_1();



        }else{
            document.getElementById('botao_1').classList.add('btn-danger')
            document.getElementById('botao_1').classList.remove('btn-primary')
            document.getElementById('step-2').classList.add('disabled')
            document.getElementById("botao_1").disabled = true;

        }
    }

    function desabilitar_botao_2(){
        document.getElementById('botao_2').classList.add('btn-danger')
        document.getElementById('botao_2').classList.remove('btn-primary')
        document.getElementById('step-3').classList.add('disabled')
        document.getElementById("botao_2").disabled = true;
    }

    function habilitar_botao_2(){
        document.getElementById('botao_2').classList.remove('btn-danger')
        document.getElementById('botao_2').classList.add('btn-primary')
        document.getElementById('step-3').classList.remove('disabled')
        document.getElementById("botao_2").disabled = false;
        setar_dados_step_2();
    }

function validaForm(frm) {

    setar_dados_step_3();
    return false;
}

function setar_dados_step_1(){
    if (document.getElementById('unidade_id')) {
        var select_unidade = document.getElementById('unidade_id');
        if (select_unidade.options[select_unidade.selectedIndex]) {
            var unidade_nome = select_unidade.options[select_unidade.selectedIndex].text;
            var unidade_id   = select_unidade.options[select_unidade.selectedIndex].value;
            array_cliente['validacao']['unidade_nome']  = unidade_nome;
            array_cliente['validacao']['unidade_id']    = unidade_id;        
        };
        
    };
    

    if (document.getElementById('estado')) {
        var select_estado = document.getElementById('estado');
        var estado = select_estado.options[select_estado.selectedIndex].text;    
    };
    
    if (document.getElementById('cidade')) {
        var select_cidade = document.getElementById('cidade');
        var cidade = select_cidade.options[select_cidade.selectedIndex].text;    
    };
    

    array_cliente['validacao']['unidade_nome']  = unidade_nome;
    array_cliente['validacao']['unidade_id']    = unidade_id;

    var select_validacao = document.getElementById('forma_validacao');
    var validacao = select_validacao.options[select_validacao.selectedIndex].text;    

    document.getElementById("tdUnidade").innerHTML = array_cliente['validacao']['unidade_nome'];
    document.getElementById("tdCidade").innerHTML =  cidade +'/'+estado;
    document.getElementById("tdValidacao").innerHTML = validacao;
}

function setar_dados_step_2(){
    var produtos           = document.getElementsByName("produtos");

    var produto_id      = 0;
    var produto_nome    = '';
    for (var i = 0; i < produtos.length; i++) {
        if (produtos[i].checked) {
            produto_id = produtos[i].value;
            produto_nome      = produtos[i].id;
        }
    }    
    array_cliente['produto']['id']      = produto_id;
    array_cliente['produto']['nome']    = produto_nome,
    
    document.getElementById("tdProduto").innerHTML = array_cliente['produto']['nome'];
}

function setar_dados_step_3(){
    array_cliente['cliente']['tipo_pj_pf']  = document.getElementById("inputTipoCliente").value;
    array_cliente['cliente']['cnpjcpf']     = document.getElementById("inputCnpjcpf").value;
    array_cliente['cliente']['nome']        = document.getElementById("inputNomeCliente").value;
    array_cliente['cliente']['telefone']    = document.getElementById("inputTelefone").value;
    array_cliente['cliente']['email']       = document.getElementById("inputEmail").value;
    array_cliente['cliente']['cep']         = document.getElementById("inputCEP").value;
    array_cliente['cliente']['estado_id']   = document.getElementById("inputEstado").value;
    array_cliente['cliente']['cidade_id']   = document.getElementById("inputCidade").value;
    array_cliente['cliente']['endereco']    = document.getElementById("inputEndereco").value;
    array_cliente['cliente']['numero']      = document.getElementById("inputNumero").value;
    array_cliente['cliente']['bairro']      = document.getElementById("inputBairro").value;
    
    

    if (document.getElementById('inputEstado')) {
        var select_estado = document.getElementById('inputEstado');
        var nome_estado = select_estado.options[select_estado.selectedIndex].text;    
    };
    
    if (document.getElementById('inputCidade')) {
        var select_cidade = document.getElementById('inputCidade');
        var nome_cidade = select_cidade.options[select_cidade.selectedIndex].text;    
    };

    document.getElementById("tdCnpjCpf").innerHTML = array_cliente['cliente']['cnpjcpf'];
    document.getElementById("tdCidadeCliente").innerHTML = nome_cidade+'/'+nome_estado;
    document.getElementById("tdRazaoSocial").innerHTML = array_cliente['cliente']['nome'] ;
    document.getElementById("tdEmail").innerHTML = array_cliente['cliente']['email'];
    document.getElementById("tdTelefone").innerHTML = array_cliente['cliente']['telefone'];
}

    jQuery(function($){
        $(".cep").mask("99999-999");
        $(".dataNascimento").mask("99-99-9999");
        $.mask.definitions['~']='[+-]';
        //Inicio Mascara Telefone
        $('.tel').focusout(function(){
            var phone, element;
            element = $(this);
            element.unmask();
            phone = element.val().replace(/\D/g, '');
            if(phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        }).trigger('focusout');
    });

    


</script>


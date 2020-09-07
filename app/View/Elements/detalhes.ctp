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





<div class="row setup-content" id="div_step-4">
  <div class="col-md-12">
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
          <td id='tdUnidade'  ></td>
          <td id='tdCidade'   ></td>
          <td id='tdValidacao'></td>
          <td id='tdProduto'  ></td>
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
          <td id='tdCnpjCpf' ></td>
          <td id='tdCidadeCliente' ></td>
          <td id='tdRazaoSocial' ></td>
          <td id='tdEmail' ></td>
          <td id='tdTelefone'></td>
        </tr>
      </tbody>
    </table>
   
   
  <div id='div_retorno_erro' class="alert alert-danger btn-block" role="alert" hidden='true'>
     <center><b><p id='retorno'></p></b></center>
  </div>
   
  <div id='div_retorno_certo' class="alert btn-block" role="alert" hidden='true'>
     
  </div>
  
  <button id='botao_gerar_venda' class="btn btn-primary nextBtn btn-lg pull-right" type="button" onclick=' gerar_venda()' >Finalizar Venda</button>

  <button onclick='voltar_4()' id='botao_voltar'  class="btn btn-info btn-lg pull-left" type="button" >Voltar</button>
   
   </div>
</div>   

<script type="text/javascript">
  function gerar_venda(){
     
     document.getElementById('botao_gerar_venda').innerHTML = 'Aguarde um instante, estamos gerando seu boleto <i class="fa-spin fa fa-spinner">';
     document.getElementById("botao_gerar_venda").disabled = true;
     document.getElementById("botao_voltar").disabled = true;
     document.getElementById('div_retorno_erro').hidden = true;
     console.log(array_cliente);
     $.ajax({
            async:true, 
            type:'post', 
            data:{
                array_cliente     : array_cliente,
                
            },
            url:'/loja/Apis/finalizar_venda',

            complete:function(request, json) {
               
                var response = request.responseText;
                var retorno  = JSON.parse(response);
                if (retorno['status']==0){
                  $('#retorno').html(retorno['mensagem'] + " Favor verificar e tentar gerar a o pedido novamente.") ;
                  document.getElementById('div_retorno_erro').hidden = false;
                  document.getElementById("botao_gerar_venda").disabled = false;
                  document.getElementById("botao_voltar").disabled = false;
                  document.getElementById('botao_gerar_venda').innerHTML = 'Finalizar Venda';
                  
                }else{
                  console.log(retorno);
                  document.getElementById("botao_gerar_venda").hidden = true; 
                  document.getElementById("botao_voltar").hidden = true; 

                  document.getElementById('div_retorno_certo').innerHTML = `
                    <p style="color:black;" >Seu pedido numero :#` +retorno["venda_id"]+`  foi gerado com sucesso.</p>
                    <p style="color:black;" >Em instantes voce ira receber um e-mail com instruções para finalizar o atendimento.</p>
                    <p style="color:black;" >Abaixo segue o botao para a geração do boleto .</p>
                    <p style="color:black;">Agradeçemos a preferencia.</p>
                    <a href=` +retorno["url_boleto"]+` class='btn btn-info nextBtn btn-block'  target="_blank">Boleto</a>
                  `
                  document.getElementById('div_retorno_certo').hidden = false;
                  
                };


                // $('#finalizar_venda').html(response) ;
                // desabilitar_botao_2()   

            }
      })
  }
</script>


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
            navListItems.removeClass('botao_personalizado').addClass('btn-default');
            $item.addClass('btn-primary');
            $item.addClass('botao_personalizado');

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


    // var array_cliente = {
    //   'validacao' : {
    //       'unidade_id'      : '',
    //       'unidade_nome'    : '',
    //       'validacao'       : ''
    //   },
    //   'produto' : {
    //       'id'      : '',
    //       'nome'    : '',
    //   },
    //   'cliente' : {
    //       'tipo_pj_pf' : '',
    //       'cnpjcpf'    : '',
    //       'nome'       : '',
    //       'telefone'   : '',
    //       'email'      : '',
    //       'cep'        : '',
    //       'estado_id'  : '',
    //       'cidade_id'  : '',
    //       'endereco'   : '',
    //       'numero'     : '',
    //       'bairro'     : ''
    //   },
    // };
    var array_cliente = {
      'validacao' : {
          'unidade_id'      : '1',
          'unidade_nome'    : 'wsd',
          'validacao'       : '1',
          'contador_id'     : '0' 
      },
      'produto' : {
          'id'      : '2',
          'nome'    : '',
      },
      'cliente' : {
          'tipo_pj_pf' : '1',
          'cnpjcpf'    : '10433876689',
          'nome'       : 'Kleber Mendes Silva',
          'telefone'   : '3534713262',
          'email'      : 'mendes.kleber@hotmail.com',
          'cep'        : '09390500',
          'estado_id'  : '1',
          'cidade_id'  : '45',
          'endereco'   : 'Comendador Custodio Ribeiro',
          'numero'     : '123',
          'bairro'     : 'Centro'
      },
    };
    function buscar_produto(){

        var forma_validacao = document.getElementById("forma_validacao").value;
        
        array_cliente['validacao']['validacao'] = forma_validacao;
        array_cliente['validacao']['contador_id'] = contador_id;
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
            url:'/loja/Apis/buscar_produto',

            complete:function(request, json) {
               
                var response = request.responseText;
                $('#trocar').html(response) ;
                desabilitar_botao_2()   

            }
        })     
    }
    function mudar_label(){
        var tipo_cliente = document.getElementById('inputTipoCliente').value;
        if (tipo_cliente ==1) {
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
        if (select_unidade.selectedIndex) {
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

    
    if (!document.getElementById("inputEstado").value) {
        alert('Seleciona o estado para continar.')
        return
    };
    if (!document.getElementById("inputCidade").value) {
        alert('Seleciona a cidade para continuar')
        return
    };

    

    document.getElementById('step-4').classList.remove('disabled');
    
    document.getElementById('step-3').classList.remove('btn-primary');
    document.getElementById('step-4').classList.add('btn-primary');
    document.getElementById('step-3').classList.remove('botao_personalizado');
    document.getElementById('step-4').classList.add('botao_personalizado');

    document.getElementById('div_step-3').setAttribute("style", "display:none");
    document.getElementById('div_step-4').setAttribute("style", "display:flex");

    
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

function voltar_2(){
    // console.log('voltar_2');
    document.getElementById('step-2').classList.remove('btn-primary');
    document.getElementById('step-1').classList.add('btn-primary');
    document.getElementById('step-2').classList.remove('botao_personalizado');
    document.getElementById('step-1').classList.add('botao_personalizado');



    document.getElementById('div_step-2').setAttribute("style", "display:none");
    document.getElementById('div_step-1').setAttribute("style", "display:flex");    
}

function voltar_3(){
    // console.log('voltar_3');
    document.getElementById('step-3').classList.remove('btn-primary');
    document.getElementById('step-2').classList.add('btn-primary');
    document.getElementById('step-3').classList.remove('botao_personalizado');
    document.getElementById('step-2').classList.add('botao_personalizado');

    document.getElementById('div_step-3').setAttribute("style", "display:none");
    document.getElementById('div_step-2').setAttribute("style", "display:flex");    
}

function voltar_4(){
    // console.log('voltar_4');
    document.getElementById('step-4').classList.remove('btn-primary');
    document.getElementById('step-3').classList.add('btn-primary');
    document.getElementById('step-4').classList.remove('botao_personalizado');
    document.getElementById('step-3').classList.add('botao_personalizado');

    document.getElementById('div_step-4').setAttribute("style", "display:none");
    document.getElementById('div_step-3').setAttribute("style", "display:flex");    
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



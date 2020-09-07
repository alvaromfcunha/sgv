    $(function(){

        $(".cpf_cnpj").on("blur", function(){

            // O CPF ou CNPJ
            var cpf_cnpj = $(this).val();
            // Testa a validação
            if ( cpf_cnpj == '' ){

            } else if ( valida_cpf_cnpj( cpf_cnpj ) && numeros_iguais( cpf_cnpj ) ) {
                //Função é usada a view onde consta o formulario
                valida_cpf_cnpj_view(1)
            } else {
                //Função é usada a view onde consta o formulario
                valida_cpf_cnpj_view(0)
            }
            
        });
    
    });

    function numeros_iguais(cpf_cnpj){

        cpf_cnpj = cpf_cnpj.replace(/[^0-9]/g, '');
        
        if
        (  cpf_cnpj == 11111111111 || 
           cpf_cnpj == 22222222222 ||
           cpf_cnpj == 33333333333 || 
           cpf_cnpj == 44444444444 ||
           cpf_cnpj == 55555555555 || 
           cpf_cnpj == 66666666666 ||
           cpf_cnpj == 77777777777 || 
           cpf_cnpj == 88888888888 ||
           cpf_cnpj == 99999999999 || 
           cpf_cnpj == 00000000000
        )
        {
            return false
        }
        else
        {
            return true
        }
    }

    
  function valida_cpf_cnpj_view(valor){

    if ( valor == 0 ){ 

      alert("CPF ou CNPJ inválido!");
      $cpf_cnpj = document.getElementById("cnpjcpf");
      $("#cnpjcpf").val("");
      setTimeout(function() {$cpf_cnpj.focus();}, 0);

      $("#btn_salvar").prop("disabled",true);

    }

    
  }

    
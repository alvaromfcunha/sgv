var url = document.location.protocol+"//"+location.host;
const path = location.pathname;

if(path=='/user/home'||path=='/user/home/'){
	var url = document.location.protocol+"//"+location.host+'/user';

}else if(path=='/contador/home'||path=='/contador/home/'){
	var url = document.location.protocol+"//"+location.host+'/contador';

}




var id_produto = 4;
var cupom_desc = 0;
var valor_delivery = 0;

function verifica_termo(){

	if(document.getElementById('regulamento').checked==true){
		document.getElementById('btn_continuar').disabled = false;

	}else{
		document.getElementById('btn_continuar').disabled = true;

	}

}

function categoria(tipo){

	if(tipo=='cpf'){

		document.getElementById('catOAB').style.display='block';
		document.getElementById('catNFe').style.display='block';

    	// document.getElementById('catCRC').style.display='block';
    	// document.getElementById('catCRM').style.display='block';

	    document.getElementById('midRenov').style.display='block';
	    document.getElementById('midToken').style.display='block';
	    document.getElementById('midCartao').style.display='block';
	    document.getElementById('midLeitora').style.display='block';
	    document.getElementById('catOAB').style.display='block';
	    document.getElementById('val24').style.display='block';
	    document.getElementById('val36').style.display='block';

    	//---------------TIRANDO TODOS OS DISPLAY NONE DO PADRÃO DO SITE!!-------------

    	document.getElementById('modA1').hidden = false;
    	document.getElementById('modA1').disabled = false;

	    //MUDEI
	    document.getElementById('a1').disabled = false;
	    document.getElementById('a1').checked = true;
	    document.getElementById('a3').checked = false;
	    document.getElementById('a3').disabled = false;  

	    document.getElementById('catPF').checked = true;
	    document.getElementById('catPJ').disabled = false;
	    document.getElementById('catNFe').disabled = false;
	    document.getElementById('catOAB').disabled = false;

	    // document.getElementById('catCRC').disabled = false; 
	    // document.getElementById('catCRM').disabled = false;

	    document.getElementById('midSoft').hidden = true;
	    document.getElementById('midToken').checked = true;  
	    document.getElementById('midCartao').disabled = false;
	    document.getElementById('midLeitora').disabled = false;
	    document.getElementById('midRenov').disabled = false;
	    document.getElementById("midToken").hidden = false;
	    document.getElementById("midCartao").hidden = false;
	    document.getElementById("midLeitora").hidden = false;
	    document.getElementById("midRenov").hidden = false;
	    document.getElementById('token').checked = true;
	    document.getElementById('val12').checked = true;
	    document.getElementById('val24').disabled = false;
	    document.getElementById('val36').disabled = false;
	    document.getElementById('val12').hidden = false;
	    document.getElementById('36meses').checked = true;

	}else if(tipo=='cnpj'){

		document.getElementById('a1').disabled = false;
		document.getElementById('a3').disabled = false;
		document.getElementById('catOAB').style.display='block';
		document.getElementById('catNFe').style.display='block';

	    // document.getElementById('catCRC').style.display='block';
	    // document.getElementById('catCRM').style.display='block';

	    document.getElementById('midRenov').style.display='block';
	    document.getElementById('midToken').style.display='block';
	    document.getElementById('midCartao').style.display='block';
	    document.getElementById('midLeitora').style.display='block';
	    document.getElementById('catOAB').style.display='block';
	    document.getElementById('val24').style.display='block';
	    document.getElementById('val36').style.display='block';

	    //---------------------------------------TIRANDO TODOS OS DISPLAY NONE DO PADRÃO DO SITE!!------------------------------------------

	    document.getElementById('modA1').hidden = false;
	    document.getElementById('modA1').disabled = false;
	    document.getElementById('a3').checked = true;
	    document.getElementById('catPF').checked = true;
	    document.getElementById('catPJ').disabled = false;
	    document.getElementById('catNFe').disabled = false;
	    document.getElementById('catOAB').disabled = false;

	    // document.getElementById('catCRC').disabled = false; 
	    // document.getElementById('catCRM').disabled = false;

	    document.getElementById('midSoft').hidden = true;
	    document.getElementById('midToken').checked = true;  
	    document.getElementById('midCartao').disabled = false;
	    document.getElementById('midLeitora').disabled = false;
	    document.getElementById('midRenov').disabled = false;
	    document.getElementById("midToken").hidden = false;
	    document.getElementById("midCartao").hidden = false;
	    document.getElementById("midLeitora").hidden = false;
	    document.getElementById("midRenov").hidden = false;
	    document.getElementById('token').checked = true;
	    document.getElementById('val12').checked = true;
	    document.getElementById('val24').disabled = false;
	    document.getElementById('val36').disabled = false;
	    document.getElementById('val12').hidden = false;
	    document.getElementById('36meses').checked = true;

	}else if(tipo=='nfe'){

		document.getElementById('a1').disabled = false;
		document.getElementById('a3').disabled = false;

		document.getElementById('catOAB').style.display='block';

	    // document.getElementById('catCRC').style.display='block';
	    // document.getElementById('catCRM').style.display='block';

	    document.getElementById('midRenov').style.display='none';
	    document.getElementById('midToken').style.display='block';
	    document.getElementById('midCartao').style.display='block';
	    document.getElementById('midLeitora').style.display='block';
	    document.getElementById('catOAB').style.display='block';
	    document.getElementById('val24').style.display='none';
	    document.getElementById('val36').style.display='block';

	    //----------TIRANDO TODOS OS DISPLAY NONE DO PADRÃO DO SITE!!--------------

	    document.getElementById('modA1').disabled = false;
	    document.getElementById('modA1').hidden = false;

	    document.getElementById('a3').checked = true;
	    document.getElementById('catPF').checked = true;
	    document.getElementById('catPJ').disabled = false;
	    document.getElementById('catNFe').disabled = false;
	    document.getElementById('catOAB').disabled = false;

	    // document.getElementById('catCRC').disabled = false;
	    // document.getElementById('catCRM').disabled = false;

	    document.getElementById('midSoft').hidden = true;
	    document.getElementById('midToken').checked = true;
	    document.getElementById('token').checked = true;  
	    document.getElementById('midCartao').disabled = false;
	    document.getElementById('midLeitora').disabled = false;
	    document.getElementById('midRenov').disabled = false;
	    document.getElementById("midToken").hidden = false;
	    document.getElementById("midCartao").hidden = false;
	    document.getElementById("midLeitora").hidden = false;
	    document.getElementById("midRenov").hidden = false;
	    document.getElementById('token').checked = true;
	    document.getElementById('val12').hidden = true;
	    document.getElementById('val24').hidden = true;
	    document.getElementById('val36').disabled = false;
	    document.getElementById('36meses').checked = true;

	}else if(tipo=='oab'){

		document.getElementById('val24').style.display='';
		document.getElementById('midRenov').style.display='block';
		document.getElementById('midCartao').style.display='block';
		document.getElementById('midLeitora').style.display='block';

		document.getElementById('modA1').hidden = true;
		document.getElementById('modA3').checked = true;
		document.getElementById('catPF').disabled = false;
		document.getElementById('catPJ').disabled = false;
		document.getElementById('catNFe').disabled = false;
		document.getElementById('catOAB').checked = true;

	    // document.getElementById('catCRC').disabled = false;
	    // document.getElementById('catCRM').disabled = false;

	    document.getElementById('midSoft').hidden = true;
	    document.getElementById('token').checked = true;
	    document.getElementById('midCartao').hidden = true;
	    document.getElementById('midLeitora').hidden = true;
	    document.getElementById('midRenov').hidden = true ;
	    document.getElementById('val12').hidden = true;
	    document.getElementById('val24').hidden = true;
	    document.getElementById('val36').checked = true;
	    document.getElementById('36meses').checked = true;

	}else if(tipo=='crc'){

		/*
	    document.getElementById('val24').style.display='none';
	    document.getElementById('midRenov').style.display='none';
	    document.getElementById('midCartao').style.display='none';
	    document.getElementById('midLeitora').style.display='none';

	    document.getElementById('modA1').hidden = true;
	    document.getElementById('modA3').checked = true;
	    document.getElementById('catPF').disabled = false;
	    document.getElementById('catPJ').disabled = false;
	    document.getElementById('catNFe').disabled = false;
	    document.getElementById('catOAB').checked = true;
	    document.getElementById('catCRC').disabled = false;
	    document.getElementById('catCRM').disabled = false;
	    document.getElementById('midSoft').hidden = true;
	    document.getElementById('token').checked = true;
	    document.getElementById('midCartao').hidden = true;
	    document.getElementById('midLeitora').hidden = true;
	    document.getElementById('midRenov').hidden = true ;
	    document.getElementById('val12').hidden = true;
	    document.getElementById('val24').hidden = true;
	    document.getElementById('val36').checked = true;
	    document.getElementById('36meses').checked = true;
	   	*/

	}else if(tipo=='crm'){

		/*
	    document.getElementById('val24').style.display='none';
	    document.getElementById('midRenov').style.display='none';
	    document.getElementById('midCartao').style.display='none';
	    document.getElementById('midLeitora').style.display='none';

	    document.getElementById('modA1').hidden = true;
	    document.getElementById('modA3').checked = true;
	    document.getElementById('catPF').disabled = false;
	    document.getElementById('catPJ').disabled = false;
	    document.getElementById('catNFe').disabled = false;
	    document.getElementById('catOAB').checked = true;
	    document.getElementById('catCRC').disabled = false;
	    document.getElementById('catCRM').disabled = false;
	    document.getElementById('midSoft').hidden = true;
	    document.getElementById('token').checked = true;
	    document.getElementById('midCartao').hidden = true;
	    document.getElementById('midLeitora').hidden = true;
	    document.getElementById('midRenov').hidden = true ;
	    document.getElementById('val12').hidden = true;
	    document.getElementById('val24').hidden = true;
	    document.getElementById('val36').checked = true;
	    document.getElementById('36meses').checked = true;
		*/

  	}

  	comprar();

}// fim funcao categoria


function modelo(ano){

	if(ano=='A1'){

		document.getElementById('a1').disabled = true;
		document.getElementById('a1').checked = true;
		document.getElementById('modA3').hidden = false;
		document.getElementById('a3').disabled = false;
		document.getElementById('catPF').checked = true;
		document.getElementById('catPJ').disabled = false;
		document.getElementById('catNFe').hidden = false;
		document.getElementById('catOAB').disabled = false;

	    // document.getElementById('catCRC').disabled = false;
	    // document.getElementById('catCRM').disabled = false;

	    document.getElementById('midSoft').hidden = false;
	    document.getElementById('midSoft').disabled = false;
	    document.getElementById('software').checked = true;
	    document.getElementById('val12').disabled = false;
	    document.getElementById('12meses').checked = true;

	    document.getElementById('catNFe').style.display='block';
	    document.getElementById('catOAB').style.display='block';

	    // document.getElementById('catCRC').style.display='none';
	    // document.getElementById('catCRM').style.display='none';

	    document.getElementById('midRenov').style.display='none';
	    document.getElementById('midToken').style.display='none';
	    document.getElementById('midCartao').style.display='none';
	    document.getElementById('midLeitora').style.display='none';
	    document.getElementById('val36').style.display='none';
	    document.getElementById('val24').style.display='none';

	} 

	if(ano=='A3'){

		document.getElementById('catNFe').style.display='block';
		document.getElementById('catOAB').style.display='block';

	    // document.getElementById('catCRC').style.display='block';
	    // document.getElementById('catCRM').style.display='block';

	    document.getElementById('midRenov').style.display='block';
	    document.getElementById('midToken').style.display='block';
	    document.getElementById('midCartao').style.display='block';
	    document.getElementById('midLeitora').style.display='block';
	    document.getElementById('catOAB').style.display='block';
	    document.getElementById('val24').style.display='block';
	    document.getElementById('val36').style.display='block';

	    //----------TIRANDO TODOS OS DISPLAY NONE DO PADRÃO DO SITE!!--------------

	    document.getElementById("modA1").hidden = false;
	    document.getElementById('a1').disabled = false;
	    document.getElementById('modA3').checked = true;
	    document.getElementById('a3').disabled = true;
	    document.getElementById('catPF').checked = true;
	    document.getElementById('catPJ').disabled = false;
	    document.getElementById('catNFe').disabled = false;
	    document.getElementById('catOAB').disabled = false;

	    // document.getElementById('catCRC').disabled = false; 
	    // document.getElementById('catCRM').disabled = false;

	    document.getElementById('midSoft').hidden = true;
	    document.getElementById('midToken').checked = true;  
	    document.getElementById('midCartao').disabled = false;
	    document.getElementById('midLeitora').disabled = false;
	    document.getElementById('midRenov').disabled = false;
	    document.getElementById("midToken").hidden = false;
	    document.getElementById("midCartao").hidden = false;
	    document.getElementById("midLeitora").hidden = false;
	    document.getElementById("midRenov").hidden = false;
	    document.getElementById('token').checked = true;
	    document.getElementById('val12').checked = true;
	    document.getElementById('val24').disabled = false;
	    document.getElementById('val36').disabled = false;
	    document.getElementById('36meses').checked = true;

	}

	comprar();

}// Fim da função "Modelo()"


function comprar(tipo){

	cupom_desc  = 0;
	cpf         = document.getElementById('cpf').checked;
	cnpj        = document.getElementById('cnpj').checked;
	nfe         = document.getElementById('nfe').checked;
	oab         = document.getElementById('oab').checked;
  	/*
  	crc         = document.getElementById('crc').checked;
  	crm         = document.getElementById('crm').checked;
  	*/
  	a1          = document.getElementById('a1').checked;
  	a3          = document.getElementById('a3').checked;
  	software    = document.getElementById('software').checked;
  	token       = document.getElementById('token').checked;
  	cartao      = document.getElementById('cartao').checked;
  	c_leitora   = document.getElementById('c_leitora').checked;
  	renovacao   = document.getElementById('renovacao').checked;
  	m12         = document.getElementById('12meses').checked;
  	m24         = document.getElementById('24meses').checked;
  	m36         = document.getElementById('36meses').checked;
  	infoco      = document.getElementById('infoco').checked;

  	if(document.getElementById('delivery')!=null){
  		delivery = document.getElementById('delivery').checked;
  	}

  	if(cpf==true){

	  	if(a1==true){

	  		id_produto = 4;

	  	}

	  	if(a3==true){

	  		if(m12==true){

	  			if(token==true){

	  				id_produto = 7;

	  			}else if(cartao==true){

	  				id_produto = 5;

	  			}else if(c_leitora==true){

	  				id_produto = 6;

	  			}else if(renovacao==true){

	  				id_produto = 14;

	  			}

	  		}

	  		if(m24==true){

	  			if(token==true){

	  				id_produto = 10;

	  			}else if(cartao==true){

	  				id_produto = 8;

	  			}else if(c_leitora==true){

	  				id_produto = 9;

	  			}else if(renovacao==true){

	  				id_produto = 15;

	  			}

	  		}

	  		if(m36==true){

	  			if(token==true){

	  				id_produto = 11;

	  			}else if(cartao==true){

	  				id_produto = 70;

	  			}else if(c_leitora==true){

	  				id_produto= 12;

	  			}else if(renovacao==true){

	  				id_produto = 16;

	  			}

	  		}

	  	}

  	}// fim if CPF.


  	if(cnpj==true){

	  	if(a1==true){

	  		id_produto = 17;

	  	}

	  	if(a3==true){

	  		if(m12==true){

	  			if(token==true){

	  				id_produto = 20;

	  			}else if(cartao==true){

	  				id_produto = 18;

	  			}else if(c_leitora==true){

	  				id_produto = 19;

	  			}else if(renovacao==true){

	  				id_produto = 27;

	  			}

	  		}

	  		if(m24==true){

	  			if(token==true){

	  				id_produto = 23;

	  			}else if(cartao==true){

	  				id_produto = 21;

	  			}else if(c_leitora==true){

	  				id_produto = 13;

	  			}else if(renovacao==true){

	  				id_produto = 44;

	  			}

	  		}

	  		if(m36==true){

	  			if(token==true){

	  				id_produto = 26;

	  			}else if(cartao==true){

	  				id_produto = 24;

	  			}else if(c_leitora==true){

	  				id_produto = 22;

	  			}else if(renovacao==true){

	  				id_produto = 29;

	  			}

	  		}

	  	}

  	} //fim cnpj


  	if(nfe==true){

	  	if(a1==true){

	  		id_produto = 30;

	  	}

	  	if(a3==true){

	  		if(m36==true){

	  			if(token==true){

	  				id_produto = 39;

	  			}else if(cartao==true){

	  				id_produto = 37;

	  			}else if(c_leitora==true){

	  				id_produto = 38;

	  			}

	  		}

	  	}

  	} // fim nfe


  	if(oab==true){

	  	if(a3==true){

	  		if(m36==true){

	  			if(token==true){

	  				id_produto = 54;     

	  			}else if(cartao==true){

	  				id_produto = 52;

	  			}else if(c_leitora==true){

	  				id_produto = 45;

	  			}else if(renovacao==true){

	  				id_produto = 43;

	  			}

	  		}

	  	}

  	} // fim oab

  	/*
  	if(crc==true){

	    if(a3==true){

	      if(m36==true){

	        if(token==true){

	          id_produto = 54;

	        }

	      }

	    }

  	} // fim crc

  	if(crm==true){

	    if(a3==true){

	      if(m36==true){

	        if(token==true){

	          id_produto = 54;

	        }

	      }

	    }

  	} //fim crm
	*/

  	$.ajax({

	  	method: "get",
	  	url: url+"/api/retornaProduto/"+id_produto,
	  	beforeSend: function(data){

	  		document.getElementById('btn').disabled = true;

	  		$.LoadingOverlay("show", {
	  			image       : "",
	  			fontawesome : "fa fa-refresh fa-spin"
	  		});

	  	},

  		success: function(data){

  			var obj = JSON.parse(data);

	  		if(obj==0){

	  			$('#selectCity').modal('show');
	  			$.LoadingOverlay("hide");
	  			return false;

	  		}

  			document.getElementById('preco_produto').value = obj['0']['pt']['preco'];

  			delivery = document.getElementById('preco_delivery').value;
  			valor_final = obj['0']['pt']['preco'];

  			if(document.getElementById('delivery')!=null && document.getElementById('delivery').checked==true){

  				valor_final = parseFloat(obj['0']['pt']['preco']) + parseFloat(delivery);
  				document.getElementById('preco_produto').value = valor_final;

  			}else if(document.getElementById('infoco').checked==true){

  				valor_final = obj['0']['pt']['preco'];
  				document.getElementById('preco_produto').value = valor_final;

  			}

	  		if(document.getElementById('delivery')!=null && document.getElementById('delivery').checked==true){

	  			if(document.getElementById('delivery')!=null){
	  				document.getElementById('delivery').disabled=true;
	  			}
	  			document.getElementById('infoco').disabled=false;

	  		}else{

	  			if(document.getElementById('delivery')!=null){
	  				document.getElementById('delivery').disabled=false;
	  			}
	  			document.getElementById('infoco').disabled=true;

	  		}

  			document.getElementById("mostrar").innerHTML = obj['0']['p']['nome'];
  			document.getElementById('produto').innerHTML = converteFloatMoeda(valor_final);
  			document.getElementById('btn').disabled = false;

  			$.LoadingOverlay("hide");

  		},
	  	complete: function(){

	  		document.getElementById('btn').disabled = false;
	  		$.LoadingOverlay("hide");

	  	}

  	}); 

}// Fim da função "Comprar()"

function converteFloatMoeda(valor){

	var inteiro = null, decimal = null, c = null, j = null;
	var aux = new Array();
	valor = ""+valor;
	c = valor.indexOf(".",0);

  	//encontrou o ponto na string
  	if(c > 0){
    	//separa as partes em inteiro e decimal
    	inteiro = valor.substring(0,c);
    	decimal = valor.substring(c+1,valor.length);

	}else{

		inteiro = valor;
	}

  	//pega a parte inteiro de 3 em 3 partes
  	for (j = inteiro.length, c = 0; j > 0; j-=3, c++){
  		aux[c]=inteiro.substring(j-3,j);
  	}

  	//percorre a string acrescentando os pontos
  	inteiro = "";

  	for(c = aux.length-1; c >= 0; c--){
  		inteiro += aux[c]+' ';
  	}

  	//retirando o ultimo ponto e finalizando a parte inteiro 

  	inteiro = inteiro.substring(0,inteiro.length-1);  

  	decimal = parseInt(decimal);

  	if(isNaN(decimal)){

  		decimal = "00";

  	}else{

  		decimal = ""+decimal;
  		if(decimal.length === 1){
  			decimal = decimal+"0";
  		}
  	}

  	valor = "R$ "+inteiro+","+decimal;

  	return valor;
}


function aplicar_cupom(){

	produto = document.getElementById("preco_produto").value;

	if(cupom_desc==0){

		$.ajax({
			method: "get",
			url: url+"/api/retornaCupom/"+cupom_desconto.value+"/"+produto,    
			success: function(data){

				var obj = data;

				if(obj == 1){

					alert('CUPOM INSERIDO NÃO EXISTE!');
					cupom_desconto.value = "";
					return 1;

				}else if(obj == 2) {

					alert ('CUPOM VENCIDO!');
					cupom_desconto.value = "";
					return 2;

				}else if(obj == 3){

					alert('CUPOM INATIVO!');
					cupom_desconto.value = "";
					return 3;

				} 

				obj=obj.trim();
				document.getElementById("produto").innerHTML = converteFloatMoeda(obj); 
				document.getElementById('preco_produto').value =(obj);    

			}

		});

		cupom_desc = 1;

	}else{

		alert('O PEDIDO JÁ POSSUI UM CUPOM APLICADO!');
		cupom_desconto.value = "";

	}

}

function delivery_(tipo){

	$.ajax({
		method: "get",
		url: url+"/api/retornaDelivery",
		success: function(data){

			var obj = data;    
			document.getElementById('preco_delivery').value = obj;
			comprar();

		}

	});    

}

$(document).ready(function() {
	comprar();
});


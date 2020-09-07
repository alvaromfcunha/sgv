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

    $modelos = $this->requestAction('apis/retorna_modelos/DropCode@2020');
    $modelos = json_decode($modelos,true);

    $tipos = $this->requestAction('apis/retorna_tipos/DropCode@2020');
    $tipos = json_decode($tipos,true);    

    $midias = $this->requestAction('apis/retorna_midias/DropCode@2020');
    $midias  = json_decode($midias,true);    
    
    $validades = $this->requestAction('apis/retorna_validades/DropCode@2020');
    $validades  = json_decode($validades,true);    
?>

<div class="row setup-content" id="div_step-2">
    <div class="col-md-12">
         <div id="align" class="row">
            <div class='col-md-1'>
            </div>

            <div class="col-md-2 bd">
            
                <h3 class="e3"><b>Modelo <p class="glyphicon glyphicon-share-alt"></p></b></h3>
                <?php for ($i=0; $i <count($modelos) ; $i++) { ?>
                    <div class="frb frb-default">
                        <input type="radio"  name="modelo" value="<?php echo $modelos[$i]['value'] ?>" 
                         id="modelo_<?php echo $modelos[$i]['value'] ?>" 
                         onclick='buscar_produto()'  <?php if ($i ==0){ ?> checked <?php } ?> hidden
                         />
                        <label for="modelo_<?php echo $modelos[$i]['value'] ?>"> 
                            <span class="frb-description"><?php echo $modelos[$i]['nome']?>.</span>
                        </label>
                    </div>
                <? } ?>
            </div> 

            <div  class="col-md-2 bd">
            
                <h3 class="e3"><b>Tipo <p class=" glyphicon glyphicon-share-alt"></p></b> </h3>

                <?php for ($i=0; $i <count($tipos) ; $i++) { ?>
                    <div class="frb frb-default">
                        <input type="radio"  name="tipo" value="<?php echo $tipos[$i]['value'] ?>" 
                        id="tipo_<?php echo $tipos[$i]['value'] ?>" 
                         onclick='buscar_produto()'  <?php if ($i ==0){ ?> checked <?php } ?>
                         />
                        <label for="tipo_<?php echo $tipos[$i]['value'] ?>"> 
                            <span class="frb-description"><?php echo $tipos[$i]['nome']?>.</span>
                        </label>
                    </div>
                <? } ?>

            </div> <!-- fim div modelo class md2 -->

            
            <div class="col-md-2 bd">
                
                <h3 class="e3"><b>Mídia <span class="glyphicon glyphicon-share-alt"></span></b></h3>

                <?php for ($i=0; $i <count($midias) ; $i++) { ?>
                    <div class="frb frb-default">
                        <input type="radio"  name="midia" value="<?php echo $midias[$i]['value'] ?>" 
                        id="midia_<?php echo $midias[$i]['value'] ?>" 
                         onclick='buscar_produto()'  <?php if ($i ==0){ ?> checked <?php } ?>
                         />

                        <label for="midia_<?php echo $midias[$i]['value'] ?>"> 
                            <span class="frb-description"><?php echo $midias[$i]['nome']?>.</span>
                        </label>
                    </div>
                <? } ?>

            </div> 

            
            <div class="col-md-2 bd">
                
                <h3 class="e3"><b>Validade <p class=" glyphicon glyphicon-share-alt"></p></b> </h3>

                <?php for ($i=0; $i <count($validades) ; $i++) { ?>
                     <div class="frb frb-default">
                         <input type="radio"  name="validade" value="<?php echo $validades[$i]['value'] ?>" 
                         id="validade<?php echo $validades[$i]['value'] ?>" 
                         onclick='buscar_produto()'  <?php if ($i ==0){ ?> checked <?php } ?>
                         />

                        <label for="validade<?php echo $validades[$i]['value'] ?>"> 
                            <span class="frb-description"><?php echo $validades[$i]['nome']?>.</span>
                        </label>
                    </div>
                <? } ?>

            </div>  

            <?php if($mobile==0){ ?>
                <div class="col-md-3 bd">
            <?php }else{ ?>
                <div class="col-md-2 bd">
            <?php } ?>

                
                    <h3 class="e3"><b>Produtos <p class=" glyphicon glyphicon-share-alt"></p></b> </h3>
                
                <div id='trocar'></div> 
               
            </div>  <!-- fim div validade class md2 -->

            <input id="preco_produto" type="hidden" name="preco" value="0">
            <input id="preco_delivery" type="hidden" name="p.delivery" value="0">

        </div>
            <button id='botao_2' class="btn btn-danger nextBtn btn-lg pull-right" type="button"  disabled>Próximo</button>
            <button onclick='voltar_2()' class="btn btn-info btn-lg pull-left" type="button" >Voltar</button>
        </div>
    </div>
</div>      

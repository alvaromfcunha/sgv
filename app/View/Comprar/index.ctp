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
    $css      = $this->RequestAction('apis/retorna_css');
    $link_img = 'http://localhost/Ar/files/homologacao/compra_facil/logo.png';
    if ($contador != 0 ) {
        $contador_id = $contador['Contadore']['id'];
    }else{
        $contador_id = 0;
    }

?>
<script type="text/javascript">
    var contador_id = <?php echo $contador_id  ?>
</script>
<style type="text/css">
    .botao_personalizado{
        background-color:<?php echo $css['CompraFacilConfiguracoe']['cor_step'] ?>!important;
        border-color:<?php echo $css['CompraFacilConfiguracoe']['cor_step'] ?> !important;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot ?>compra_rapida/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot ?>compra_rapida/steps.css">

<div class="row" style='margin-left:0px;margin-right:0px'>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color:white">
                

                <div class='row'>
                    <div class='col-md-3'>
                        
                        <br>
                        <img class="img-fluid" src="<?php echo $link_img ?>" alt="" style="margin-left:75px;max-width:250px"> 
                    </div>
                    <div class='col-md-9'>
                        <p style='color:<?php echo $css['CompraFacilConfiguracoe']['cor_fonte_header'] ?>'>
                            <?php echo $css['CompraFacilConfiguracoe']['texto_1'] ?>
                        </p>
                        <p style='color:<?php echo $css['CompraFacilConfiguracoe']['cor_fonte_header'] ?>'>
                            <?php echo $css['CompraFacilConfiguracoe']['texto_2'] ?>
                        </p>
                        <p style='color:<?php echo $css['CompraFacilConfiguracoe']['cor_fonte_header'] ?>'>
                            <?php echo $css['CompraFacilConfiguracoe']['texto_3'] ?>
                        </p>
                        
                    </div>
                </div>
                <?php if ($contador !=0){ ?>
                    <div class='row'>
                    
                        <div class='col-md-3'>
                            
                        </div>
                        <div class='col-md-9'>
                            <p style='color:<?php echo $css['CompraFacilConfiguracoe']['cor_fonte_header'] ?>'>
                                <b>Indicado por </b>:<?php echo $contador['Contadore']['nome'] ?> 
                                <br> 
                                <b>E-mail :</b><?php echo $contador['Contadore']['email'] ?> 
                            </p>        
                            
                        </div>
                    </div>    
                <?php } ?>
                
            </div>

            <div class="card-body">

                
                    
                        <div class="container">
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#div_step-1" id='step-1' type="button" class="btn btn-primary btn-circle botao_personalizado">1</a>
                                        <p>Validação</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#div_step-2" id='step-2'  type="button" class="disabled btn btn-default btn-circle" disabled="disabled">2</a>
                                        

                                        <p>Produto</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#div_step-3" id='step-3' type="button" class="disabled btn btn-default btn-circle" disabled="disabled">3</a>
                                        <p>Cadastro</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#div_step-4" id='step-4' type="button" class="disabled btn btn-default btn-circle" disabled="disabled">4</a>
                                        <p>Detalhes</p>
                                    </div>
                                </div>
                            </div>
                            
                            <?php echo $this->element("validacao"); ?>                                        
                            <?php echo $this->element("categoria_produtos"); ?>                                    
                            <?php echo $this->element("cadastro_cliente"); ?>    
                            <?php echo $this->element("detalhes"); ?>    
                        </div> 
                    
                
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $this->webroot ?>js/valida_ao_sair_do_campo.js"></script>
<script src="<?php echo $this->webroot ?>js/valida_cpf_cnpj.js"></script>
<script src="<?php echo $this->webroot ?>js/compra_facil.js"></script>



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
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot ?>compra_rapida/steps.css">

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
                            
                            <?php echo $this->element("validacao"); ?>                                        
                            <?php echo $this->element("categoria_produtos"); ?>                                    
                            <?php echo $this->element("cadastro_cliente"); ?>    
                            <?php echo $this->element("detalhes"); ?>    
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $this->webroot ?>js/valida_ao_sair_do_campo.js"></script>
<script src="<?php echo $this->webroot ?>js/valida_cpf_cnpj.js"></script>
<script src="<?php echo $this->webroot ?>js/compra_facil.js"></script>

<script type="text/javascript">

    


</script>


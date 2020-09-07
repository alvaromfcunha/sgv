<!DOCTYPE html>
<html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Compra Facil Sigep</title>
    <meta name="description" content="Compra Facil Sigep">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="apple-touch-icon" href="<?php echo $this->webroot ?>img/favicon2.ico">
    <link rel="shortcut icon" href="<?php echo $this->webroot ?>img/favicon2.ico"> -->

    <link rel="stylesheet" href="<?php echo $this->webroot ?>assets/css/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot ?>assets/css/bootstrap@4.1.3/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot ?>assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo $this->webroot ?>assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot ?>assets/css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="<?php echo $this->webroot ?>assets/css/fullcalendar@3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $this->webroot ?>assets/css/component-chosen.min.css">

    <script src="//code.jquery.com/jquery-3.3.1.js"></script>
    
    <script src="https://erpsigep.com.br/Ar/js/jquery.maskedinput-1.4.1.js"></script>
    <style>
        #weatherWidget .currentDesc {
            color: #ffffff!important;
        }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
        .minusculo {
            text-transform: lowercase!important;
        }
    </style>

    <?php  
        // $sessao = $this->RequestAction("usuarios/sessao");
    ?>

</head>

<body>  
    <?php echo $this->Flash->render(); ?>
    <!-- <?php echo $this->fetch('content'); ?> -->
    <!-- /#right-panel -->
            <div class="container">
                <div class='row'>
                    <div>
                      <div class="col-md-12">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                          <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                              
                              <div class="col-md-10">
                                <div class="p-5">
                                  <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                  </div>
                                  <form class="user">
                                    <div class="form-group">
                                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                      <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                      </div>
                                    </div>
                                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                                      Login
                                    </a>
                                    <hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                      <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a>
                                  </form>
                                  <hr>
                                  <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                  </div>
                                  <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                    </div>
                </div>
            </div>
    
    <!-- Scripts -->
    <script src="<?php echo $this->webroot ?>assets/js/popper.js@1.14.4/dist/popper.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/bootstrap@4.1.3/dist/bootstrap.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/main.js"></script>

   
</body>


</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo $this->webroot ?>assets_compra_facil/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot ?>assets_compra_facil/vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo $this->webroot ?>assets_compra_facil/css/style.css">

    <script src="//code.jquery.com/jquery-3.3.1.js"></script>

</head>

<body>

    <div class="main">

        <div class="container">
    <?php echo $this->Flash->render(); ?>
    <?php echo $this->fetch('content'); ?>        </div>

    </div>

    <!-- JS -->
    <script src="<?php echo $this->webroot ?>assets_compra_facil/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets_compra_facil/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets_compra_facil/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets_compra_facil/vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets_compra_facil/vendor/minimalist-picker/dobpicker.js"></script>
    <script src="<?php echo $this->webroot ?>assets_compra_facil/vendor/nouislider/nouislider.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets_compra_facil/vendor/wnumb/wNumb.js"></script>
    <script src="<?php echo $this->webroot ?>assets_compra_facil/js/main.js"></script>

    <!-- imports Kleber -->
   <!--  -->


    

    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="<?php echo $this->webroot ?>assets/css/fullcalendar@3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $this->webroot ?>assets/css/component-chosen.min.css">

    <script src="//code.jquery.com/jquery-3.3.1.js"></script>

     <!-- Scripts -->
    <script src="<?php echo $this->webroot ?>assets/js/popper.js@1.14.4/dist/popper.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/bootstrap@4.1.3/dist/bootstrap.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="<?php echo $this->webroot ?>assets/js/chart.js@2.7.3/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="<?php echo $this->webroot ?>assets/js/chartist@0.11.0/chartist.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="<?php echo $this->webroot ?>assets/js/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/flot-pie@1.0.0/jquery.flot.pie.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/flot-spline@0.0.1/jquery.flot.spline.min.js"></script>

    <script src="<?php echo $this->webroot ?>assets/js/moment@2.22.2/moment.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/fullcalendar@3.9.0/fullcalendar.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/init/fullcalendar-init.js"></script>
    
    <script src="<?php echo $this->webroot ?>assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo $this->webroot ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>

    <script src="<?php echo $this->webroot ?>assets/js/lib/chosen/chosen.jquery.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $(".standardSelect").chosen({
                no_results_text: "Não encontramos nenhum item!",
                width: "100%"
            });
        });
    </script>



</html>
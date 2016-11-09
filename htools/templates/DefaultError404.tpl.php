<?php
	$this->assign('title','Htools | File Not Found');
	$this->assign('nav','home');

	$this->display('_Header.tpl.php');
?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        Htools
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    
    <script src="assets/javascripts/1.3.0/adminflare-demo-init.min.js" type="text/javascript"></script>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        // Include Bootstrap stylesheet 
        document.write('<link href="assets/css/' + DEMO_ADMINFLARE_VERSION + '/' + DEMO_CURRENT_THEME + '/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" id="bootstrap-css">');
        // Include AdminFlare stylesheet 
        document.write('<link href="assets/css/' + DEMO_ADMINFLARE_VERSION + '/' + DEMO_CURRENT_THEME + '/adminflare.min.css" media="all" rel="stylesheet" type="text/css" id="adminflare-css">');


    </script>

    <script src="assets/javascripts/1.3.0/modernizr-jquery.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/1.3.0/adminflare-demo.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/1.3.0/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/1.3.0/adminflare.min.js" type="text/javascript"></script>

    <section class="row-fluid">
            <div class="well widget-pie-charts">
                <h3 class="box-header">
                    Visão Geral
                </h3>
                <div class="box no-border non-collapsible">
                    <div class="span2 pie-chart">
                        <div id="easy-pie-chart-1" data-percent="10">
                            10
                        </div>
                        <div class="caption">
                            Logados
                        </div>
                    </div>
                    
                    <div class="span2 pie-chart">
                        <div id="easy-pie-chart-2" data-percent="100">
                            100
                        </div>
                        <div class="caption">
                           Usuário 
                        </div>
                    </div>

                    <div class="span2 pie-chart">
                        <div id="easy-pie-chart-3" data-percent="91">
                            91MB
                        </div>
                        <div class="caption">
                            Consumo
                        </div>
                    </div>

                    <div class="span2 pie-chart">
                        <div id="easy-pie-chart-4" data-percent="82">
                            752MB
                        </div>
                        <div class="caption">
                            Used RAM
                        </div>
                    </div>

                    <div class="span2 pie-chart">
                        <div id="easy-pie-chart-5" data-percent="35">
                            35%
                        </div>
                        <div class="caption">
                            Processor Load
                        </div>
                    </div>

                </div>
            </div>
        </section>

<?php
	$this->display('_Footer.tpl.php');
?>
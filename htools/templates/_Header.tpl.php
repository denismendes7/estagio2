<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-Frame-Options" content="deny">
        <base href="<?php $this->eprint($this->ROOT_URL); ?>" />
        <title><?php $this->eprint($this->title); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Htools" />
        <meta name="author" content="phreeze builder | phreeze.com" />


        <!-- Le styles -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="styles/style.css" rel="stylesheet" />
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" />
        <!--[if IE 7]>
        <link rel="stylesheet" href="bootstrap/css/font-awesome-ie7.min.css">
        <![endif]-->
        <link href="bootstrap/css/datepicker.css" rel="stylesheet" />
        <link href="bootstrap/css/timepicker.css" rel="stylesheet" />
        <link href="bootstrap/css/bootstrap-combobox.css" rel="stylesheet" />
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

         <!-- Le fav and touch icons -->
      <!-- <link rel="shortcut icon" href="images/htools.icon" />-->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon1.ico">
     <!--   <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" /> -->


        <script type="text/javascript" src="scripts/libs/LAB.min.js"></script>
        <script type="text/javascript">
            $LAB.script("scripts/libs/jquery-1.8.2.min.js").wait()
                .script("bootstrap/js/bootstrap.min.js")
                .script("bootstrap/js/bootstrap-datepicker.js")
                .script("bootstrap/js/bootstrap-timepicker.js")
                .script("bootstrap/js/bootstrap-combobox.js")
                .script("scripts/libs/underscore-min.js").wait()
                .script("scripts/libs/underscore.date.min.js")
                .script("scripts/libs/backbone-min.js")
                .script("scripts/app.js")
                .script("scripts/model.js").wait()
                .script("scripts/view.js").wait()
        </script>


    
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
<style type="text/css">
        /* ======================================================================= */
        /* Server Statistics */
        .well.widget-pie-charts .box {
            margin-bottom: -20px;
        }

        /* ======================================================================= */
        /* Why AdminFlare */
        #why-adminflare ul {
            position: relative;
            padding: 0 10px;
            margin: 0 -10px;
        }

        #why-adminflare ul:nth-child(2n) {
            background: rgba(0, 0, 0, 0.02);
        }

        #why-adminflare li {
            padding: 8px 10px;
            list-style: none;
            font-size: 14px;
            padding-left: 23px;
        }

        #why-adminflare li i {
            color: #666;
            font-size: 14px;
            margin: 3px 0 0 -23px;
            position: absolute;
        }


        /* ======================================================================= */
        /* Supported Browsers */
        #supported-browsers header { color: #666; display: block; font-size: 14px; }
            
        #supported-browsers header strong { font-size: 18px; }

        #supported-browsers .span10 { margin-bottom: -15px; text-align: center; }

        #supported-browsers .span10 div {
            margin-bottom: 15px;
            margin-right: 15px;
            display: inline-block;
            width: 120px;
        }

        #supported-browsers .span10 div:last-child { margin-right: 0; }

        #supported-browsers .span10 img { height: 40px; width: 40px; }

        #supported-browsers .span10 span { line-height: 40px; font-size: 14px; font-weight: 600; }
        
        @media (max-width: 767px) {
            #supported-browsers header { text-align: center; margin-bottom: 20px; }
        }

        /* ======================================================================= */
        /* Status panel */
        .status-example { line-height: 0; position:relative; top: 22px }
    </style>
    
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('a[rel=tooltip]').tooltip();

            // Easy Pie Charts
            var easyPieChartDefaults = {
                animate: 2000,
                scaleColor: false,
                lineWidth: 12,
                lineCap: 'square',
                size: 100,
                trackColor: '#e5e5e5'
            }
            $('#easy-pie-chart-1').easyPieChart($.extend({}, easyPieChartDefaults, {
                barColor: '#3da0ea'
            }));
            $('#easy-pie-chart-2').easyPieChart($.extend({}, easyPieChartDefaults, {
                barColor: '#e7912a'
            }));
            $('#easy-pie-chart-3').easyPieChart($.extend({}, easyPieChartDefaults, {
                barColor: '#bacf0b'
            }));
            $('#easy-pie-chart-4').easyPieChart($.extend({}, easyPieChartDefaults, {
                barColor: '#4ec9ce'
            }));
            $('#easy-pie-chart-5').easyPieChart($.extend({}, easyPieChartDefaults, {
                barColor: '#ec7337'
            }));
            $('#easy-pie-chart-6').easyPieChart($.extend({}, easyPieChartDefaults, {
                barColor: '#f377ab'
            }));
            // Visits Chart
            var visitsChartData = [{
                // Visits
                label: 'Visits',
                data: [
                    [6, 1300],
                    [7, 1600],
                    [8, 1900],
                    [9, 2100],
                    [10, 2500],
                    [11, 2200],
                    [12, 2000],
                    [13, 1950],
                    [14, 1900],
                    [15, 2000]
                ]
            }, {
                // Returning Visits
                label: 'Returning Visits',
                data: [
                    [6, 500],
                    [7, 600],
                    [8, 550],
                    [9, 600],
                    [10, 800],
                    [11, 900],
                    [12, 800],
                    [13, 850],
                    [14, 830],
                    [15, 1000]
                ],
                filledPoints: true
            }];
            $('#visits-chart').simplePlot(visitsChartData, {
                series: {
                    points: {
                        show: true,
                        radius: 5
                    },
                    lines: {
                        show: true
                    }
                },
                xaxis: {
                    tickDecimals: 2
                },
                yaxis: {
                    tickSize: 1000
                }
            }, {
                height: 205,
                tooltipText: "y + ' visitors at ' + x + '.00h'"
            });
            // Comments Tab
            $('.comment-remove').click(function () {
                bootbox.confirm("Are you sure?", function (result) {
                    alert("Confirm result: " + result);
                });
                return false;
            });
            // New Users Tab
            $('#tab-users a').tooltip();
        });
    </script>
    


</head>

<body>

<header class="navbar navbar-fixed-top" id="main-navbar">
        <div class="navbar-inner">
            <div class="container">
                <a class="logo" href="#"><img alt="Af_logo" src="images/ht.png" width="155" height="80"></a>

                <a class="btn nav-button collapsed" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-reorder"></span>
                </a>

                <div class="nav-collapse collapse">
                   
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle usermenu" data-toggle="dropdown">
                                <img alt="Avatar" src="assets/images/avatar.png">
                                <?php $this->eprint($this->currentUser->Username);?>
                         <ul class="dropdown-menu">
                                <li <?php if ($this->nav=='roles') { echo 'class="active"'; } ?>><a href="./roles"><span class="icon-edit"></span>Roles</a></li>
                                <li <?php if ($this->nav=='users') { echo 'class="active"'; } ?>><a href="./users"><span class="icon-group"></span>Users</a></li>
                                <li <?php if ($this->nav=='Login') { echo 'class="active"'; } ?>><a href="./logout"><span class="icon-signout">Logout</a></li>
                        </ul>
                                </li>
                            </ul>
                   </div>
            </div>
        </div>
    </header>

   
    <a class="brand" href="index.html">

  
        <figure><img src="images/htoolimg.png" alt="Htools" title="Hootls Inicio" width="1000" height="80"/></figure>
</a>
  
        <div class="navbar-inner"></div>

<div class="container">
            <a data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
       

<nav id="left-panel">
        <div id="left-panel-content">
        <ul>

            <li class="active"><a href="#"><span class="icon-dashboard"></span>View</a></li>  
        
            <li <?php if ($this->nav=='usuarios') { echo 'class="active"'; } ?>><a href="./usuarios"><span class="icon-user"></span>Cadastro Usuarios</a></li>

            <li <?php if ($this->nav=='concentradores') { echo 'class="active"'; } ?>><a href="./concentradores"><span class="icon-rss"></span>Cadastro RB</a></li>

            <li <?php if ($this->nav=='empresas') { echo 'class="active"'; } ?>><a href="./empresas"><span class="icon-cog"></span>Cadastro Empresas</a></li>
                   

            <li <?php if ($this->nav=='acessos') { echo 'class="active"'; } ?>><a href="./acessos"><span class=" icon-spinner"></span>Perfil de Acesso</a></li>

            <li <?php if ($this->nav=='pfacebooks') { echo 'class="active"'; } ?>><a href="./pfacebooks"><span class=" icon-facebook-sign"></span>Perfil de Facebook</a></li>

    <!--        <li <?php if ($this->nav=='perfilsmses') { echo 'class="active"'; } ?>><a href="./perfilsmses"><span class="icon-cog"></span>Perfil de SMS</a></li>-->

        </ul>

        </div>
</nav>  

</div>

</body>

</html>
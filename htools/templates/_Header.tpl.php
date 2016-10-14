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
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />

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





</head>

<body>

    <div id="wrapper">
    <a class="navbar-header" href="index.html">

                	<figure><img src="images/ht.png" alt="Htools" title="Hootls Inicio" width="200" height="20" /></figure>
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0">

     <div class="navbar-header">  

	

		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

                		</a>
                	</div>
           </div>



 <!-- <ul class="nav navbar-top-links navbar-right">
	  <li class="dropdown">
	    <a href="#" ><i class="fa fa-sign-out fa-fw"></i>Login
	     <ul class="dropdown-menu">
	          	<li><a href="./loginform">Login</a></li>
		<li class="divider"></li>
		<li><a href="./secureuser">Example User Page <i class="icon-lock"></i></a></li>
		<li><a href="./secureadmin">Example Admin Page <i class="icon-lock"></i></a></li>
	     </ul>
	    </li>
      </ul>

     </div>
    </li>
  </ul> -->
 </nav>
</div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Pesquise...">
                                <span class="input-group-btn">                   </span>
                            </div>
                            <!-- /input-group -->
                        </li>



                       <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Visão Geral </a>
                        </li>
                     <li>
		 <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Cadastros<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
			<li <?php if ($this->nav=='usuarios') { echo 'class="active"'; } ?>><a href="./usuarios">Cadastro de Usuarios</a></li>
			<li <?php if ($this->nav=='concentradores') { echo 'class="active"'; } ?>><a href="./concentradores">Cadastro deConcentradors</a></li>
			<li <?php if ($this->nav=='empresas') { echo 'class="active"'; } ?>><a href="./empresas">Cadastro de Empresas</a></li>
               	    </ul>

                      </li>
	<ul class="nav">
		<li class="dropdown">
	 	    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Perfil<span class="fa arrow"></span></a>
		       <ul class="nav nav-second-level">
			<li <?php if ($this->nav=='acessos') { echo 'class="active"'; } ?>><a href="./acessos">Perfil de Acessos</a></li>
			<li <?php if ($this->nav=='pfacebooks') { echo 'class="active"'; } ?>><a href="./pfacebooks">Perfil Facebook</a></li>
			<li <?php if ($this->nav=='perfilsmses') { echo 'class="active"'; } ?>><a href="./perfilsmses">Perfil Sms</a></li>

		       </ul>
		</li>
	</ul>
	<ul class="nav">
		<li class="dropdown">
	 	    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Configurações<span class="fa arrow"></span></a>
		       <ul class="nav nav-second-level">

			<li <?php if ($this->nav=='roles') { echo 'class="active"'; } ?>><a href="./roles">Roles</a></li>
			<li <?php if ($this->nav=='users') { echo 'class="active"'; } ?>><a href="./users">Users</a></li>
		       </ul>
		</li>
	</ul>




	<ul class="nav">
		<li class="dropdown">
			<a href="#" ><i class="fa fa-chart-o fa-fw"></i>Login<span class="fa arrow"></span></a>
			<ul class="dropdown-menu">
				<ul class="nav nav-second-level">

            <li <?php if ($this->nav=='Login') { echo 'class="active"'; } ?>><a href="./loginform">Login</a></li>
           
            <li <?php if ($this->nav=='Example User Page') { echo 'class="active"'; } ?>><a href="./secureuser">Example Users Page</a></li>
            <li <?php if ($this->nav=='Example Admin Page ') { echo 'class="active"'; } ?>><a href="./secureadmin">Example Admin Page</a></li>


				</ul>
			</li>
		</ul>

	</li>
</ul>
</ul>


						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>


       </div>

</div>





<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
<ul class="nav navbar-top-links navbar-right"> </ul>


<!-- PARTE  -->
			   <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    		 <!-- Bootstrap Core CSS -->
<!-- o que da erro -->
<!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</body>

</html>
<?php
	$this->assign('title','Login');
	$this->assign('nav','secure');

	#$this->display('_Header.tpl.php');
?>

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
        <!-- link login -->
        <link media="all" type="text/css" rel="stylesheet" href="assets/login/css/m-styles.min.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/login/css/login.css">
  <script src="assets/login/js/jquery.js"></script>

  <script type="text/javascript" src="assets/login/js/jquery.backstretch.min.js"></script>
  <script src="assets/login/js/jqueryform.js"></script>
  <script src="assets/login/js/validate.js"></script>
  <script src="assets/login/js/login.js"></script>

<div class="container">

	<?php if ($this->feedback) { ?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<?php $this->eprint($this->feedback); ?>
		</div>
	<?php } ?>

	<!-- #### this view/tempalate is used for multiple pages.  the controller sets the 'page' variable to display differnet content ####  -->

<?php if ($this->page == 'login') { ?>

        <form class="well" method="post" action="login">
            <fieldset>
            <legend>Informe seu usu&aacute;rio e senha</legend>
                <div class="control-group">
                <input id="username" name="username" type="text" placeholder="Usu&aacute;rio..." />
                </div>
                <div class="control-group">
                <input id="password" name="password" type="password" placeholder="Senha..." />
                </div>
                <div class="control-group">
                <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </fieldset>
        </form>

    <?php } ?>

</div> <!-- /container -->

<?php
    $this->display('_Footer.tpl.php');
?>
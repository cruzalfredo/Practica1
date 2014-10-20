<html lang="es">
<head >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body role="document">
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container">
    <div class="navbar-header">
        </div></div></div>

<div class="container theme-showcase" role="main">
<div class='jumbotron' align='center'>
    <h1> Practica 1:<br>"Sistema para una escuela." </h1>
<?php
echo"    <p >".utf8_decode($_REQUEST['msg'])."</p>";
?>
    <form id="frm" action="Validar.php" method="post" target="_self">
    <p><input type="text" name="user" value="" placeholder="Usuario"></p>
    <p><input type="password" name="psw" value="" placeholder="Contraseña"></p>
    <button type="submit" class="btn btn-lg btn-success">Ingresar</button>
    </form>
</div>
    </div>
</body>

<?php
require('footer.php');
?>
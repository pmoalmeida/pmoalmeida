<?php
if (isset($_GET["id"])){
	$_SESSION['id'] = $_GET["id"];
	require 'DAL.php';
	$dal = new DAL();
	$result = $dal->getNoticia($_SESSION['id']);
	if (mysqli_num_rows($result) == 0){
		echo 'Article not found!';
		$_SESSION['Data'] = '';
	    $_SESSION['Titulo'] = '';
	    $_SESSION['Conteudo'] = -1;
		$_SESSION['URL'] = 0;
	    $_SESSION['Categoria'] = '';
		$_SESSION['Video'] = ' ';
	}
	else {
	
	while ($row=mysqli_fetch_row($result))
    {
	$_SESSION['Data'] = $row[1];
	$_SESSION['Conteudo'] = $row[2];
	$_SESSION['Titulo'] = $row[3];
	$_SESSION['URL'] = $row[4];
	$_SESSION['Categoria'] = $row[5];
	$_SESSION['Video'] = $row[6];
    }
  // Free result set
  mysqli_free_result($result);
}

}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>pmoalmeida - The Exciting Corner</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
					<li>
						<a class="page-scroll" href="#news">News</a>
					</li>
                    <li>
                        <a class="page-scroll" href="#services">Technology</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contacts</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


	
	<section id="news">
			<div class="container">
			
			<center>
			<a href="index.html#news">Back</a><br><br>
			<h2><?php echo $_SESSION['Titulo']; ?></h2>
			<h3><a href="search.php?tag=<?php echo $_SESSION['Categoria']; ?>"><?php echo $_SESSION['Categoria']; ?></a></h3>
			<?php echo $_SESSION['Data']; ?><br>
			<?php echo $_SESSION['Conteudo']; ?> <br><br>
			<?php if (!empty($_SESSION['Video'])) {
				echo "<iframe width='560' height='315' src='" . $_SESSION['Video'] . "' frameborder='0' allowfullscreen></iframe>";
			} 
			?>
			<br><br>
			<?php echo "<img src='http://pmoalmeida.site50.net/uploads/". $_SESSION["URL"] . "'><br><br>"; ?>
		</center>
	</div>
	</section>
	

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>

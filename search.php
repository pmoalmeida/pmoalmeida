<?php
if (isset($_GET["tag"])){
	$_SESSION['tag'] = $_GET["tag"];
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
				News about <u><?php echo $_SESSION['tag']; ?></u>
	<?php
									require 'DAL.php';
									$dal = new DAL();
									$result = $dal->getNoticiasbyTag($_SESSION['tag']);
									
									if ($result->num_rows > 0) {
										
										while($row = $result->fetch_assoc()) {
											if($row["URL"] != '')
											{
												$url = "<a href='view.php?id=" . $row["IDNoticia"] . "'><img src='http://pmoalmeida.site50.net/uploads/". $row["URL"] . "' width='450' height='350'></a><br><br>";
											}
											if(strlen($row['Conteudo'])>150){
												$conteudo = substr($row['Conteudo'],0,149);
												echo "<h3>" . $row["Titulo"]. "</h3> <a href='#'> " . $row["Categoria"] . "</a><br>" . $row["Data"] . "<br>" . $conteudo . "... &nbsp<a href='view.php?id=" . $row["IDNoticia"] . "'>Read more</a>" . "<br><br>";
												echo $url . "<br>";
													
											}
											else {
												echo "<h3>" . $row["Titulo"]. "</h3> <a href='#'> " . $row["Categoria"] . "</a><br> " . $row["Data"] . "<br>" . $row['Conteudo'] . "<br><br>";
												echo $url;
											}
											
											
											
										}
									} else {
										echo "<center>No news yet! :(</center>";
									}
	?>				
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

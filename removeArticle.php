<?php
	session_start();
?>

<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Impact:400|Overlock:400|Allerta+Stencil:700,400">

<link href='/static/forms/client/css/1404371006-formview_st_ltr.css' type='text/css' rel='stylesheet'>

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Allerta+Stencil" />

<title>The Exciting Corner - Back Office</title>
</head>
<meta itemprop="description" content="The Exciting Corner - Back Office">
<body>
<div>
<br>&nbsp;
<center>
<div class="menu3">
    <a href="index.html">Home</a>
	 <a href="menu.php">Panel</a>
    <a href="logout.php">Logout</a>
</div>
<br>
<br>
<font face="Allerta Stencil">
<?php 
	if ($_SESSION['loggedin'] == 1){

?>
<h1>Remove article</h1><br>
<br>
<div>
<form action="" method="post">
<font size="4" color="#855155">ID of the article to remove: </font>
<br>
<input type="text" size="11" name="idNot"><br>
<center><input type="submit" name="submit" value="REMOVE" style="font-weight:bold"></center>
</form><br>
</div>
</font><br>
<br>
<br>
<div id="res">
<?php
require 'DAL.php';
		$dal = new DAL();
		$result = $dal->getNoticias();
		if ($result->num_rows > 0) 
		{
										
		while($row = $result->fetch_assoc()) {
			echo "ID - " . $row["IDNoticia"]. "<br>" . $row["Data"] . "<br>Titulo - " . $row["Titulo"] . "<br><br>";
				if($row["URL"] != '')
				{
				   echo "<img src='http://pmoalmeida.site50.net/uploads/". $row["URL"] . "' width='400' height='350'><br><br><br>";
				}
				echo "<hr>";
				                             }
		}
		
		if(isset($_POST['submit'])){
		$id = $_POST["idNot"];
		$flag = $dal->removeNot($id);
		/*$connection = ssh2_connect('ftp.centrodia-va.comlu.com/', 22);
		ssh2_auth_password($connection, 'a5811542', 'loladamix1');
		$sftp = ssh2_sftp($connection);
		$fileToDelete = '/public_html/uploads/' . $flag ;
		ssh2_sftp_unlink($sftp, $fileToDelete);*/
		if(!empty($flag)){
		$file = 'public_html/uploads/' . $flag ;
		$ftp_server = 'ftp.pmoalmeida1.site50.net';
		$conn_id = ftp_connect($ftp_server);
	    $login_result = ftp_login($conn_id, 'a6345358' , 'loladamix1');

		if (ftp_delete($conn_id, $file)) {
			echo "$file deleted successful\n";
		} else {
		echo "could not delete $file\n";
		}

		// close the connection
		ftp_close($conn_id);
		}
	    echo '<h2><font color="green">Article removed successfully!</font></h2>';
		echo '<script type="text/javascript">window.scrollTo(0,document.body.scrollHeight);</script>';
		header('Refresh: 3; URL=http://pmoalmeida.site50.net/removeArticle.php');
		die();	 
} ?>
</div>

<?php 
} 
else {
	echo 'No admin rights! <a href="login.php">Login</a> onto our back office!';
}
?>
<br>
<br>
</center>
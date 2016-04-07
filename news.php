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
<?php 
	if ($_SESSION['loggedin'] == 1){

?>
<font face="Allerta Stencil">
<h1>New article</h1><br>
<div id="res">
<?php 
require 'DAL.php';
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST['submit'])){
    $titulo = $_POST['titulo'];
    $cat = $_POST['categoria'];
	$conteudo = $_POST['conteudo'];
	if($_FILES["fileToUpload"]["tmp_name"] != ''){
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
       // echo "Ficheiro nao e uma imagem";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "File already exists!";
    $uploadOk = 0;
}
// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Ficheiro demasiado grande.";
    $uploadOk = 0;
}*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, .JPG, .JPEG, .PNG & .GIF files only.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, the upload went wrong!";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<br><br><br>File ". basename( $_FILES["fileToUpload"]["name"]). " has been successfully uploaded!<br>";
    } else {
        echo "There was an error.";
    }
	
	}
	}
	
	
	$dal = new DAL();
	$cat1 = htmlentities($cat);
	$conteudo1 = htmlentities($conteudo);
	$titulo1 = htmlentities($titulo);
	$video = $_POST['video'];
	$dal->insertArticle($cat1, $conteudo1, $titulo1, $_FILES["fileToUpload"]["name"], $video);
	//header('Location: http://app-teste.comuv.com/thank_you.php');
	echo '<h2><font color="green">Your new article has been created!</h2>' ;
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    
}
?>
</div>
<br>
<br>
<div>
<form action="" method="post" enctype="multipart/form-data">
<font size="4" color="#855155">Title: </font><font size="4" color="red">*</font>
<br>
  <input type="text" size="45" name="titulo"><br>&nbsp;<br>&nbsp;
 <font size="4" color="#855155">Category </font><font size="4" color="red">*</font><br>
 <input type="text" size="35" name="categoria"><br>&nbsp;<br>
 <font size="4" color="#855155">Content: </font><font size="4" color="red">*</font><br>
  <textarea rows="20" name="conteudo" cols="75"></textarea>
  <br>
  <font size="4" color="#855155">Video URL: </font><br>
  <input type="text" size="50" name="video"><br><br>
  <br>
  Image for the article:
  <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
<center><input type="submit" name="submit" value="CRIAR" style="font-weight:bold"></center>
</form><br>
</div>
</font><br><br>
</center>
<?php 
} 
else {
	echo 'No admin rights! <a href="login.php">Login</a> onto our back office!';
	
}
?>
<p/>
<p/>
<br>
<p/>
<p/>
<p/>
</div>
</body>
</html> 
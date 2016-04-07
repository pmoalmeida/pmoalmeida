<?php

class DAL {
	
    private $DB_NAME = 'a6345358_pmoa';
    private $DB_HOST = 'mysql4.000webhost.com';
    private $DB_USER = 'a6345358_pmoa';
    private $DB_PASS = 'loladamix1';

  /*  function database_connection() {
		session_start();
        mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
        mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());

        return $mysqli;
    }*/

    function insertNoticia($conteudo, $titulo, $url, $cat) {

		session_start();
        $mysql_host = "mysql4.000webhost.com";
		$mysql_database = "a6345358_pmoa";
		$mysql_user = "a6345358_pmoa";
		$mysql_password = "loladamix1";
		/*mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("MySQL Error: " . mysql_error());
        mysql_select_db($mysql_database) or die("MySQL Error: " . mysql_error());*/

      /*$autor = mysql_real_escape_string($_POST['autor']);
		$data = date('Y-m-d G:i:s');
		$conteudo = mysql_real_escape_string($_POST['conteudo']);
		$titulo = mysql_real_escape_string($_POST['titulo']);*/
		// Create connection
        $conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		//$data = date('Y-m-d G:i:s');
        $sqlquery = "INSERT INTO Noticias (Data, Conteudo, Titulo, URL, Categoria ) values (,now(),'$conteudo','$titulo', '$cat')";
        //$result = mysql_query($sqlquery);
		
		if ($conn->query($sqlquery) === TRUE) {
           return $result;
        } 
		
		$conn->close();
		
        return null;
    }
	
	/* function login($username, $password) {
	 
		session_start();
		$mysql_host = "mysql12.000webhost.com";
		$mysql_database = "a5811542_cdia";
		$mysql_user = "a5811542_cdia";
		$mysql_password = "loladamix1";
		mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("MySQL Error: " . mysql_error());
        mysql_select_db($mysql_database) or die("MySQL Error: " . mysql_error());
	    
		$result = 0;
		$username1 = mysql_real_escape_string($username);
		$password1 = mysql_real_escape_string($password);
		//$password = md5(mysql_real_escape_string($_POST['password']));
		$tipo = $this->getTipo($username, $password);
		$checklogin = mysql_query("SELECT * FROM Users WHERE Username = '" . $username . "' AND Password = '" . $password . "' LIMIT 1");
		if($checklogin->num_rows > 0)
		{
			$row = mysql_fetch_assoc($checklogin);
			$email = $row['Email'];
			$result = 1;
		}
		
		if ($result == 1){
		    $_SESSION['Username'] = $username;
			$_SESSION['LoggedIn'] = 1;	
			$_SESSION['Tipo'] = $tipo;
		}
		
        return $result;
    }*/
	
	
	
	
	function getNoticias(){
	
    $mysql_host = "mysql4.000webhost.com";
	$mysql_database = "a6345358_pmoa";
	$mysql_user = "a6345358_pmoa";
	$mysql_password = "loladamix1";
	$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
        if (mysqli_connect_errno()) {
            die('Could not connect: ' . mysqli_connect_error());
        }
	
	 if ($mysqli) {
            //$sqlquery = "SELECT * FROM Noticias ORDER BY 'IDNoticia' DESC";
			$sqlquery= "SELECT * FROM Noticias ORDER BY `Noticias`.`IDNoticia` DESC";
            $result = $mysqli->query($sqlquery);

            if (!$result) {
                die('Could not execute query insert:' . mysqli_error($mysqli));
            }

            return $result;
        }

        return null;
	
	}
	
	function getNoticia($id) {

        $mysql_host = "mysql4.000webhost.com";
	$mysql_database = "a6345358_pmoa";
	$mysql_user = "a6345358_pmoa";
	$mysql_password = "loladamix1";
	$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);

        if ($mysqli) {
            $sqlquery = "SELECT * FROM Noticias WHERE IDNoticia=" . $id;
            $result = $mysqli->query($sqlquery);

            if (!$result) {
                die('Could not execute query insert:' . mysqli_error($mysqli));
            }

            return $result;
        }

        return null;
    }
	
	function getNoticiasByTag($tag) {

        $mysql_host = "mysql4.000webhost.com";
	$mysql_database = "a6345358_pmoa";
	$mysql_user = "a6345358_pmoa";
	$mysql_password = "loladamix1";
	$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);

        if ($mysqli) {
            $sqlquery = "SELECT * FROM Noticias WHERE Categoria='" . $tag . "'";
            $result = $mysqli->query($sqlquery);

            if (!$result) {
                die('Could not execute query insert:' . mysqli_error($mysqli));
            }

            return $result;
        }

        return null;
    }
	
	function insertArticle($cat, $conteudo, $titulo, $url, $vid) {

		session_start();
       $mysql_host = "mysql4.000webhost.com";
	$mysql_database = "a6345358_pmoa";
	$mysql_user = "a6345358_pmoa";
	$mysql_password = "loladamix1";
		/*mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("MySQL Error: " . mysql_error());
        mysql_select_db($mysql_database) or die("MySQL Error: " . mysql_error());*/

      /*$autor = mysql_real_escape_string($_POST['autor']);
		$data = date('Y-m-d G:i:s');
		$conteudo = mysql_real_escape_string($_POST['conteudo']);
		$titulo = mysql_real_escape_string($_POST['titulo']);*/
		// Create connection
        $conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		//$data = date('Y-m-d G:i:s');
        $sqlquery = "INSERT INTO Noticias (Categoria, Data, Conteudo, Titulo, URL, Video ) values ('$cat',now(),'$conteudo','$titulo', '$url', '$vid')";
        //$result = mysql_query($sqlquery);
		
		if ($conn->query($sqlquery) === TRUE) {
           return $result;
        } 
		
		$conn->close();
		
        return null;
    }
	
	function removeNot($id){
		session_start();
		 $mysql_host = "mysql4.000webhost.com";
	$mysql_database = "a6345358_pmoa";
	$mysql_user = "a6345358_pmoa";
	$mysql_password = "loladamix1";
		$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
		
		mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("MySQL Error: " . mysql_error());
		$query = "SELECT URL FROM Noticias WHERE IDNoticia=" . $id;
		$result = $mysqli->query($query);
		if ($result->num_rows > 0) {
    
          while($row = $result->fetch_assoc()) {
              $url = $row["URL"];
           }
		 }  
		$result = 0;
		if ($mysqli) {
			
			$sqlquery= "DELETE FROM Noticias WHERE IDNoticia =" . $id ;
            $remove = $mysqli->query($sqlquery);
			$result = 1;
            if (!$remove) {
                die('Could not execute query insert:' . mysqli_error($mysqli));
            }
        }	
        return $url;
	}
   
    
}
?>  






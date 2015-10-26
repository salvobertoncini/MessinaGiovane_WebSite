<?php
		session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : SimpleWork 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140225

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Messina Giovane</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="../index.php">Messina Giovane</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="../index.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="../chisiamo.html" accesskey="2" title="">Chi Siamo</a></li>
				<li><a href="../statuto.html" accesskey="3" title="">Statuto</a></li>
				<li><a href="../galleria.php" accesskey="4" title="">Galleria</a></li>
				<li><a href="../direttivo.html" accesskey="5" title="">Direttivo</a></li>
				<li><a href="../contatti.html" accesskey="6" title="">Contatti</a></li>
			</ul>
		</div>
	</div>

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">	
		<?php


		// controlliamo che sia stato inviato un id numerico alla pagina
		if(isset($_GET['id'])&&(is_numeric($_GET['id']))){
		  // valorizziamo la variabile relativa all'id dell'articolo e includiamo il file di configurazione
		  $art_id = $_GET['id'];
		  @include "../config.php";

		  // selezioniamo dalla tabella i dati relativi all'articolo
		  $sql = "SELECT id_posts,id_users,title_posts,data_posts,articles_posts FROM posts WHERE id_posts='$art_id'";
		  $query = @mysql_query($sql) or die (mysql_error());

		  // se per quell'id esiste un articolo..
		  if(mysql_num_rows($query) > 0){
		    // ...estraiamo i dati e mostriamoli a video
		    $row = mysql_fetch_array($query) or die (mysql_error());
		    $autore = stripslashes($row['id_users']);
		    $titolo = stripslashes($row['title_posts']);
		    $data = $row['data_posts'];
		    $articolo = ($row['articles_posts']);

		  	$nomecognomeSQL = "SELECT name_users, surname_users FROM users WHERE id_users = '".$autore."'";
			$queryAutore = @mysql_query($nomecognomeSQL) or die (mysql_error());
			if(mysql_num_rows($queryAutore) > 0)
			        if ($riga = mysql_fetch_array($queryAutore)) {
			          $nome_autore = $riga['name_users'];
			          $cognome_autore    = $riga['surname_users'];
			        }
		   


		    echo "<div class=\"title\"><h2>".$titolo."</h2></div><p>" . $articolo . "</p><br><br>";
		    $data = preg_replace('/^(.{4})-(.{2})-(.{2})$/','$3-$2-$1', $data);
		    echo "Scritto da <b>". $nome_autore . " " .$cognome_autore. "</b>";
		    echo " | Articolo postato il <b>" . $data . "</b>"."<div id=\"fb-root\"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = \"//connect.facebook.net/it_IT/all.js#xfbml=1\";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>

<div id='social'>
				<div class=\"fb-share-button\" data-href=\"articolo.php?id=".$art_id."\" data-width=\"200\" data-type=\"button\"></div>";

			echo " <a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-lang=\"it\" data-count=\"none\">Tweet</a></div>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
						  
		    // link alla pagina dei commenti  
		    //echo "<br><a href=\"insert_comment.php?id=$art_id\">Invia un commento</a><br><br>";

		    // visualizzianmo tutti i commenti
		    /*$sql_com = "SELECT com_autore, com_testo FROM commenti WHERE com_art='$art_id'";
		    $query_com = @mysql_query($sql_com) or die (mysql_error());
		    if(mysql_num_rows($query_com) > 0){
		      echo "Commenti:<br>";
		      while($row_com = mysql_fetch_array($query_com)){
		        $com_autore = stripslashes($row_com['com_autore']);
		        $com_testo = stripslashes($row_com['com_testo']);
		        echo $com_testo . "<br>";
		        echo "Inserito da <b>". $com_autore . "</b>";
		        echo "<hr>"; 
		      } 
		    }*/
		  }
		}else{
		  // se per l'id non esiste un articolo..
		  echo "Nessun articolo trovato.";
		}
		?>
		</div>
		

		<div id="sidebar">
			<ul class="style1">
				<li class="first">
					<h3>Seguici su Facebook</h3>
					<p><iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fassociazionemessinagiovane&amp;width&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:290px;" allowTransparency="true"></iframe></p>
				</li>
				<li>
					<h3>Seguici su Twitter</h3>
					<p><a class="twitter-timeline" width="300" href="https://twitter.com/messinagiovane" data-widget-id="561153836635926528">Tweets by @messinagiovane</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
				</li>
			</ul>
			
		</div>
	</div>
</div>
<div id="copyright" class="container">
	<p>&copy; Salvo Bertoncini. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> | 
		<a href="/login/main_login.php">CMS</a></p>
</div>
</body>
</html>

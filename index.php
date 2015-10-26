<?php
session_start();
// includiamo il file di configurazione
@include "config.php";

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
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>

<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.php">Messina Giovane</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="index.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="chisiamo.html" accesskey="2" title="">Chi Siamo</a></li>
				<li><a href="statuto.html" accesskey="3" title="">Statuto</a></li>
				<li><a href="galleria.php" accesskey="4" title="">Galleria</a></li>
				<li><a href="direttivo.html" accesskey="5" title="">Direttivo</a></li>
				<li><a href="contatti.html" accesskey="6" title="">Contatti</a></li>
			</ul>
		</div>
	</div>
	<div id="header-featured">
		<div id="banner-wrapper">
			<div id="banner" class="container">
				<h2>Benvenuto nella nostra pagina</h2>
				<p>Messina Giovane è una associazione Universitaria Socio Culturale nata nel 2009. La compongono studenti universitari dell'Ateneo Messinese che mirano alla valorizzazione della propria città, di quanto essa già offre e potrà offrire in futuro alle nuove generazioni. </p>

				<!--<strong>SimpleWork</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p> -->
				<a href="chisiamo.html" class="button">Scopri di più</a> </div>
		</div>
	</div>
</div>
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			
			<?php

			// includiamo la pagina contenente il codice per la creazione delle anteprime
			@include "articoli/anteprima.php";

			// estraiamo i dati relativi agli articoli dalla tabella
			$sql = "SELECT * FROM posts ORDER BY id_posts DESC";
			$query = @mysql_query($sql) or die (mysql_error());

			//verifichiamo che siano presenti records
			if(mysql_num_rows($query) > 0){
			  // se la tabella contiene records mostriamo tutti gli articoli attraverso un ciclo
			  while($row = mysql_fetch_array($query)){
			    $art_id = $row['id_posts'];
			    $autore = stripslashes($row['id_users']);
			    $titolo = stripslashes($row['title_posts']);
			    $data = $row['data_posts'];
			    $articolo = $row['articles_posts'];


				$nomecognomeSQL = "SELECT name_users, surname_users FROM users WHERE id_users = '".$autore."'";
				$queryAutore = @mysql_query($nomecognomeSQL) or die (mysql_error());
				if(mysql_num_rows($queryAutore) > 0)
				        if ($riga = mysql_fetch_array($queryAutore)) {
				          $nome_autore = $riga['name_users'];
				          $cognome_autore = $riga['surname_users'];
				        }
			   	?>



			   	<?php

			    //valorizziamo una variabili con il link all'intero articolo
			    $link = " <br><a href=\"\articoli\articolo.php?id=".$art_id."\">Leggi tutto</a>";

			    echo "<div class=\"title\"><h2><a href=\"\articoli\articolo.php?id=$art_id\">".$titolo."</a></h2></div>";
			   
			    // creaimo l'anteprima che mostra le prime 100 parole di ogni singolo articolo
			    // per farlo utilizzo una funzione che vi presenterò più avanti
			    echo "<p>".@anteprima($articolo, 100, $link)."</p>"; 
			    echo "<br><br>";
			   
			    // formattiamo la data nel formato europeo
			    $data = preg_replace('/^(.{4})-(.{2})-(.{2})$/','$3-$2-$1', $data);

			    // stampiamo una serie di informazioni
			    echo  "<p>Scritto da <b>". $nome_autore . " " . $cognome_autore . "</b>";
			    echo  " | Articolo postato il <b>" . $data . "</b></p>";
			    //echo  "| Commenti: "; 
			  
			    // mostriamo il numero di commenti relativi ad ogni articolo
			    /*$conta = "SELECT COUNT(com_id) as conta from commenti WHERE com_art = '$art_id'";
			    $conto = @mysql_query ($conta);
			    $tot = @mysql_fetch_array ($conto);
			    echo $sum2 = $tot['conta'];*/
			    //echo "<hr>"; 
			  } 
			}
			else{
			  // se in tabella non ci sono records...
			  echo "Nessun articolo presente.";
			
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
			<!--<div id="stwo-col">
				<div class="sbox1">
					<h2>Etiam rhoncus</h2>
					<ul class="style2">
						<li><a href="#">Semper quis egetmi dolore</a></li>
						<li><a href="#">Quam turpis feugiat dolor</a></li>
						<li><a href="#">Amet ornare hendrerit lectus</a></li>
						<li><a href="#">Quam turpis feugiat dolor</a></li>
					</ul>
				</div>
				<div class="sbox2">
					<h2>Integer gravida</h2>
					<ul class="style2">
						<li><a href="#">Semper quis egetmi dolore</a></li>
						<li><a href="#">Quam turpis feugiat dolor</a></li>
						<li><a href="#">Consequat lorem phasellus</a></li>
						<li><a href="#">Amet turpis feugiat amet</a></li>
					</ul>
				</div>
			</div>-->
		</div>
	</div>
</div>
<div id="copyright" class="container">
	<p>&copy; Salvo Bertoncini. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> | 
		<a href="/login/main_login.php">CMS</a></p>
</div>
</body>
</html>

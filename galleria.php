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
<title>Galleria </title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script src="http://www.messinagiovane.org/galleria/galleria-1.4.2.min.js"></script>
<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>

<style type="text/css">
.galleria{ responsive:true; width:700px; height:500px;}
</style>

<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.php">Messina Giovane</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="chisiamo.html" accesskey="2" title="">Chi Siamo</a></li>
				<li><a href="statuto.html" accesskey="3" title="">Statuto</a></li>
				<li class="current_page_item"><a href="galleria.php" accesskey="4" title="">Galleria</a></li>
				<li><a href="direttivo.html" accesskey="5" title="">Direttivo</a></li>
				<li><a href="contatti.html" accesskey="6" title="">Contatti</a></li>
			</ul>
		</div>
	</div>
</div>

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
					<h2>Gallery</h2>
						<span class="byline">Alcune Foto degli eventi di Messina Giovane</span> 
			</div>


		<div class="galleria">
            	<?php
						@include 'config.php';
						$sql = "SELECT id_images, name_images FROM images ORDER BY id_images DESC";
						$result = @mysql_query($sql) or die (mysql_error ());

						// se per quell'id esiste un articolo..
						if(mysql_num_rows($result) > 0){
						// ...estraiamo i dati e mostriamoli a video

						echo "<div class=\"galleria\">";
						while ($row = @mysql_fetch_array($result))
						{
							$id = $row['id_images'];
						 	$nome = $row['name_images'];
						 	echo /*<a href=\"upload\show.php?id=".$id."\">*/"<img src=\"upload\show.php?id=".$id."\">";/*</a>&nbsp&nbsp";*/
						}
						echo "</div>";

						}else{
								  // se per l'id non esiste un articolo..
								  echo "Nessuna immagine trovata.";
								}
						?>

        </div>
        <script>
            Galleria.loadTheme('http://www.messinagiovane.org/galleria/themes/classic/galleria.classic.min.js');
            Galleria.run('.galleria');
        </script>



					<!-- <div id="slider">
				<a href="#" class="button previous-button"><span class="icon icon-double-angle-left"></span></a>
				<a href="#" class="button next-button"><span class="icon icon-double-angle-right"></span></a>
				<div class="viewer">
					<div class="reel">


					</div>
				</div>
			</div>

		 ******************************************************************************************************************
				
			<script type="text/javascript">
				$('#slider').slidertron({
					viewerSelector: '.viewer',
					reelSelector: '.viewer .reel',
					slidesSelector: '.viewer .reel .slide',
					advanceDelay: 3000,
					speed: 'slow',
					navPreviousSelector: '.previous-button',
					navNextSelector: '.next-button',
					slideLinkSelector: '.link'
				});
			</script>

		****************************************************************************************************************** -->
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
			<!-- <div id="stwo-col">
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
			</div> -->
		</div>
		</div>		

	</div>
</div>
<div id="copyright" class="container">
	<p>&copy; Salvo Bertoncini. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> | 
		<a href="/login/main_login.php">CMS</a></p>
</div>
</body>
</html>

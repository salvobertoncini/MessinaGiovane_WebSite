<?php
session_start();
$username=$_SESSION["username_users"];
$password=$_SESSION["password_users"];
if($username==NULL OR $password==NULL)
  header("location:../login/main_login.php");
include("../config.php"); // includere la connessione al database
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
<title>Blog Managemant</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="http://www.messinagiovane.org/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="http://www.messinagiovane.org/fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<body>

<br />

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
				<tr>
					<td colspan="3" align="center"><strong>Gestione Contenuti </strong></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><br /></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><a href="http://www.messinagiovane.org/upload/insert_post.php">Inserimento Contenuti</a></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><br /></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><a href="http://www.messinagiovane.org/gestione/update_post.php">Modifica Post</a></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><a href="http://www.messinagiovane.org/gestione/delete_post.php">Elimina Post</a></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><br /></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><a href="http://www.messinagiovane.org/gestione/delete_image.php">Elimina Immagine</a></td>
				</tr>
				<tr>
					<td  colspan="3" align="center"><br /><a href="http://www.messinagiovane.org/gestione/logout.php">Logout</a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
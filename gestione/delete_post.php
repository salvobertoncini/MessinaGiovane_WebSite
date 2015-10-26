<?php
session_start();
$username=$_SESSION["username_users"];
$password=$_SESSION["password_users"];
if($username==NULL OR $password==NULL)
  header("location:../login/main_login.php");
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
<title>Blog: Elimina Post</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<body>

<h1>Elimina un articolo</h1>

<?php


$id_up_post = isset($_POST['id']) ? $_POST['id'] : '';

//includiamo il file di configurazione
@include "../config.php";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>

<form enctype="multipart/form-data" action="delete_post.php" method="post">
<select name="id" >
<?php
$sql = "SELECT id_posts, title_posts, articles_posts FROM posts ORDER BY id_posts DESC ";
  $results = $conn->query($sql);
  if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
      $titolo = $row['title_posts'];
      $id = $row['id_posts'];
      $articolo= $row['articles_posts']; 
      echo '<option value="'.$id.'">'.$titolo.'</option>';
    }
  }
    echo '</select>';?>

  <input name="submit" type="submit" value="Seleziona Articolo">
</form>
<br /><br />

<?php



if(isset($_POST['title_posts']) || isset($_POST['articles_posts']))
{
  $title_post = $_POST['title_posts'];
  $articles_post = $_POST['articles_posts'];
  $id_up_post = $_POST['id_post'];
  echo $id_up_post;
  $sql = "DELETE FROM posts WHERE id_posts = '$id_up_post'";
  $results = $conn->query($sql);
  echo "Eliminato";
}

if (isset($id_up_post)){
$sql = "SELECT title_posts, articles_posts FROM posts WHERE id_posts = '$id_up_post'";
  $results = $conn->query($sql);
  if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
      $titolo_up = $row['title_posts'];
      $articolo_up = $row['articles_posts'];
    }
  }
}
$titolo_up = isset($titolo_up) ? $titolo_up : '';
$articolo_up = isset($articolo_up) ? $articolo_up : '';

if (isset($_FILES['file']))
{
  //update();
}
?>
<form enctype="multipart/form-data" action="delete_post.php" method="post">
  Titolo:<br />
	<input name="title_posts" type="text" size="30" value= <?php echo "\"" . $titolo_up . "\""; ?> >

<br />
  Articolo:<br />
	<textarea name="articles_posts" cols="40" rows="10"><?php echo $articolo_up; ?></textarea><br />

  <input type="hidden" name="id_post" value="<?php echo $id_up_post; ?>">
  <br />
	<input name="submit" type="submit" value="Elimina Articolo">
</form>
<br /><a href="../gestione/manage.php">Torna a Gestione</a>
</body>
</html>
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
<title>Blog: Inserimento Contenuti</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="http://www.messinagiovane.org/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="http://www.messinagiovane.org/fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<body>

<h1>Inserisci un articolo</h1>
<?php

//includiamo il file di configurazione
@include "../config.php";
@include "upload_file.php";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
/*
if(!$_SESSION['logged']){
header("location:main_login.php");
}
*/
$nomecognome = "SELECT id_users, name_users, surname_users FROM users WHERE username_users = '".$_SESSION['username_users']."'";
$result = $conn->query($nomecognome);
      if ($result->num_rows > 0) 
        if ($row = $result->fetch_assoc()) {
          $nome_autore = $row['name_users'];
          $cognome_autore    = $row['surname_users'];
          $id_autore = $row['id_users'];
        }


echo "<br />
Hello, Mr. <b>".$nome_autore." ".$cognome_autore."<br /><br />
";

if(!$conn)
  die("Connection Failed: " . mysqli_connect_error());

$immagine = isset($_POST['images']) ? $_POST['images'] : '';

//valorizziamo le variabili con i dati ricevuti dal form
if(isset($_POST['submit'])){

  if(isset($_POST['title_posts'])){
    $titolo = addslashes($_POST['title_posts']);
  }
  if(isset($_POST['articles_posts'])){
    $articolo = addslashes($_POST['articles_posts']);
  }

  // popoliamo i campi della tabella articoli con i dati ricevuti dal form
  $sql = "INSERT INTO posts (id_users, title_posts, articles_posts, data_posts) VALUES ('$id_autore', '$titolo', '$articolo', now())";

  // se l'inserimento ha avuto successo inviamo una notifica
  if (@mysql_query($sql) or die (mysql_error())){
    echo "Articolo inserito con successo. <br /><a href=\"insert_post.php\">Torna Indietro</a>";
  } 
}else{
  // se non sono stati inviati dati dal form mostriamo il modulo per l'inserimento
  ?>
<form action="insert_post.php" method="post">
            Autore:<br>
            <strong><?php echo $nome_autore." ".$cognome_autore; ?><br /></strong>
Titolo:<br>
<input name="title_posts" type="text" size="30"><br>
Articolo:<br>
<?php  echo '<textarea name="articles_posts" cols="40" rows="10">'.htmlspecialchars($immagine).'</textarea><br>'; ?>
<input name="submit" type="submit" value="Invia">
</form>
  <?php
}

if (isset($_FILES['file']))
{
  upload();
}
?>
<h3>Upload Immagini</h3>
<form enctype="multipart/form-data" action="insert_post.php" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="300000"/>
  <input type="hidden" name="idUtente" value=<?php echo '"'.$id_autore.'"'?> >
  <input type="file" name="file" size="40"/>
  <input type="submit" value="Upload" />
</form>
<h3>Seleziona immagine da Gallery</h3>
<?php echo '<form enctype="multipart/form-data" action="insert_post.php" method="post">'; ?>
  <select name="images">
    <?php
      $sql = "SELECT name_images,id_images FROM images ORDER BY id_images DESC ";
      $results = $conn->query($sql);
      if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
          $nome_immagine = $row['name_images'];
          $id_immagine    = $row['id_images'];
          echo "<option value='<img src=\"\\upload\\show.php?id=".$id_immagine." width=\"600\" height=\"450\" \"><br/>'>".$nome_immagine."</option>";
        }
        # code...
      }

    ?>

  </select>
  <input type="submit" value="Inserisci Immagine" />
</form>
<br /><a href="../gestione/manage.php">Torna a Gestione</a>

</body>
</html>
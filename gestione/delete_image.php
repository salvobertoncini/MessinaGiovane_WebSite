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
<title>Blog: Elimina Immagine</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<body>
<h1>Elimina Immagine</h1>

<?php


if(isset($_POST['images']))
  $id_img_up = $_POST['images'];
else
  $id_img_up = '';

if(isset($_POST['isDeleted']))
  $isDeleted = $_POST['isDeleted'];
else
  $isDeleted = false;

echo $id_img_up;

//includiamo il file di configurazione
@include "../config.php";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>

<h3>Seleziona immagine da Gallery</h3>
<?php echo '<form enctype="multipart/form-data" action="delete_image.php" method="post">'; ?>
  <select name="images">
    <?php
      $sql = "SELECT name_images,id_images FROM images ORDER BY id_images DESC ";
      $results = $conn->query($sql);
      if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
          $nome_immagine = $row['name_images'];
          $id_immagine    = $row['id_images'];
          echo '<option value="'.$id_immagine.'">'.$nome_immagine.'</option>';
        }
      }
    ?>

  </select>
    <input type="submit" value="Inserisci Anteprima Immagine" />

<br /><br />
</form>

<form enctype="multipart/form-data" action="delete_image.php" method="post">
  <?php
    echo '<a href="../upload/show.php?id='.$id_img_up.'">'.'<img width="100" height="100" src="../upload/show.php?id='.$id_img_up.'"></a>';
  ?>
  <input type="hidden" name="images" value="<?php echo $id_img_up; ?>">
  <input type="hidden" name="isDeleted" value="true">
  <br />
  <input name="submit" type="submit" value="Elimina Immagine">
</form>

<?php



if(isset($_POST['images']) && $isDeleted)
{
  $id_img_up = $_POST['images'];
  echo $id_img_up;
  $sql = "DELETE FROM images WHERE id_images = '$id_img_up'";
  $results = $conn->query($sql);
  echo "Eliminato";
}

if (isset($id_img_up)){
$sql = "SELECT name_images, id_images FROM images WHERE id_images = '$id_img_up'";
  $results = $conn->query($sql);
  if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
          $nome_up = $row['name_images'];
          $id_up    = $row['id_images'];
    }
  }
}
$nome_up = isset($nome_up) ? $nome_up : '';
$id_up = isset($id_up) ? $id_up : '';

if (isset($_FILES['file']))
{
  //update();
}
?>

<br /><a href="../gestione/manage.php">Torna a Gestione</a>
</body>
</html>
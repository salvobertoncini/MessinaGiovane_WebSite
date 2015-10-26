<?php
function upload()
{
  $result = false;
  $immagine = '';
  $size = 0;
  $type = '';
  $nome = '';
  $max_size = 300000;
  $result = @is_uploaded_file($_FILES['file']['tmp_name']);
  if (!$result)
  {
    echo "Impossibile eseguire l'upload.";
    return false;
  }else{
    $size = $_FILES['file']['size'];
    if ($size > $max_size)
    {
      echo "Il file è troppo grande.";
      return false;
    }
    $id_utenteloggato = $_POST['idUtente'];
    $type = $_FILES['file']['type'];
    $nome = $_FILES['file']['name'];
    $immagine = @file_get_contents($_FILES['file']['tmp_name']);
    $immagine = addslashes ($immagine);
    @include 'config.php';
    $sql = "INSERT INTO images (name_images, size_images, type_images, image_images, id_users) VALUES ('$nome','$size','$type','$immagine', '$id_utenteloggato')";
    $result = @mysql_query ($sql) or die (mysql_error());
    return true;
  }
}
?>
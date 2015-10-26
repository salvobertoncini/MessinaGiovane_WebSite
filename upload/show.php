<?php

if (isset($_GET['id']))
{
  $id_images = @intval($_GET['id']);
  @include '../config.php';
  $sql = "SELECT id_images,type_images,image_images FROM images WHERE id_images='$id_images'";
  $result = @mysql_query($sql) or die(mysql_error ());
  $row = @mysql_fetch_array($result);
  $id_img = $row['id_images'];
  $type = $row['type_images'];
  $img = $row['image_images'];
  if (!$id_img)
  {
    echo "Id sconosciuto";
  }else{
    @header ("Content-type: ".$type);
    echo $img;
  }
}else{
  echo "Impossibile soddisfare la richiesta.";
}
?>
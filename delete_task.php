<?php

include("db.php");

if(isset($_GET['id_licencia'])) {
  $id_licencia = $_GET['id_licencia'];
  $query = "DELETE FROM licencia WHERE id_licencia = $id_licencia";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'License Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>

<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $sexo = $_POST['sexo'];
  $edad = $_POST['edad'];
  $fecha_de_nacimiento = $_POST['fecha_de_nacimiento'];
  $query = "INSERT INTO licencia(nombre, apellidos, sexo, edad, fecha_de_nacimiento) VALUES ('$nombre', '$apellidos', '$sexo', '$edad', '$fecha_de_nacimiento')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'License Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>

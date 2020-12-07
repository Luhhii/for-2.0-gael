<?php
include("db.php");
$nombre = '';
$apellidos= '';
$sexo = '';
$edad = '';
$fecha_de_nacimiento = '';

if  (isset($_GET['id_licencia'])) {
  $id_licencia = $_GET['id_licencia'];
  $query = "SELECT * FROM licencia WHERE id_licencia=$id_licencia";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 4) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellidos = $row['apellidos'];
    $sexo = $row['sexo'];
    $edad = $row['edad'];
    $fecha_de_nacimiento = $row['fecha_de_nacimiento'];
  }
}

if (isset($_POST['update'])) {
  $id_licencia = $_GET['id_licencia'];
  $nombre= $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $sexo= $_POST['sexo'];
  $edad= $_POST['edad'];
  $fecha_de_nacimiento= $_POST['fecha_de_nacimiento'];

  $query = "UPDATE licencia set nombre = '$nombre', apellidos = '$apellidos',
   sexo = '$sexo', edad = '$edad', fecha_de_nacimiento = '$fecha_de_nacimiento' WHERE id_licencia=$id_licencia";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'License Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id_licencia=<?php echo $_GET['id_licencia']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="nombre">
        </div>
        <div class="form-group">
          <input name="Material" type="text" class="form-control" value="<?php echo $apellidos; ?>" placeholder="apellidos">
        </div>
        <div class="form-group">
          <input name="sexo" type="text" class="form-control" value="<?php echo $sexo; ?>" placeholder="sexo">
        </div>
        <div class="form-group">
          <input name="edad" type="number" class="form-control" value="<?php echo $edad; ?>" placeholder="edad">
        </div>
        <div class="form-group">
          <input name="fecha_de_nacimiento" type="date" class="form-control" value="<?php echo $fecha_de_nacimiento; ?>" placeholder="Fecha de nacimiento">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

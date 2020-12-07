<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="apellidos" class="form-control" placeholder="apellidos" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="sexo" class="form-control" placeholder="Tipo de mueble" autofocus>
          </div>
          <div class="form-group">
            <input type="number" name="edad" class="form-control" placeholder="edad" autofocus>
          </div>
          <div class="form-group">
            <input type="date" name="fecha_de_nacimiento" class="form-control" placeholder="fecha_de_nacimiento" autofocus>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>nombre</th>
            <th>apellidos</th>
            <th>sexo</th>
            <th>edad</th>
            <th>fecha_de_nacimiento</th>
    
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM licencia";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellidos']; ?></td>
            <td><?php echo $row['sexo']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td><?php echo $row['fecha_de_nacimiento']; ?></td>
      
            <td>
              <a href="edit.php?id_licencia=<?php echo $row['id_licencia']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id_licencia=<?php echo $row['id_licencia']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

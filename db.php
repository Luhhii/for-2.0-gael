<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'bd_tramitelicencia'
) or die(mysqli_error($mysqli));

?>

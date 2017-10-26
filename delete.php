<?php
require 'database.php';

if (isset($_POST['delete'])){
   $statement = $pdo->prepare("DELETE FROM to_do WHERE id = :id");
   $statement->execute(array(
   ':id' => $_POST['delete'] ));
   header('Location: index.php');
}
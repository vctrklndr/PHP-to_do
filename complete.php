<?php
require 'database.php';

if (isset($_POST['completed'])){
    $statement = $pdo->prepare("UPDATE to_do SET completed = 1 WHERE to_do.id = :id");
    $statement->execute(array(
    ':id' => $_POST['completed'] ));
    header('Location: index.php');
}
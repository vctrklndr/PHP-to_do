<?php
if ( isset($_POST['title'])) {
    $sql = "INSERT INTO to_do (title, createdBy) VALUES (:title, :createdBy)";
    $statement = $pdo->prepare($sql);
    $statement->execute(array(
        ':title' => $_POST['title'],
        ':createdBy' => $_POST['createdBy']
        ));
    $_SESSION ['success']='<div class="new_post_message"><h3>There\'s new stuff to do!</h3></div>';
}
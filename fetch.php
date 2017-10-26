<?php
$statement = $pdo->prepare("SELECT * FROM to_do ORDER BY Id DESC");
$statement -> execute();
$to_do = $statement -> fetchAll(PDO::FETCH_ASSOC);
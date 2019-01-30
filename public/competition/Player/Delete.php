<?php
require_once ('../../../config.php');
require_once ('../../../common.php');

try {
    $connection = new \PDO($host, $user, $password, $options);
    
    $id = $_GET['Id'];
    // echo $playerId;
    $sql = "DELETE FROM Player WHERE Id = :Id";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':Id', $id, PDO::PARAM_INT);
    $statement->execute();
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}                           
//return;
header("Location: Index.php");
<?php
require_once ('../../../config.php');
require_once ('../../../common.php');

try {
    $connection = new \PDO($host, $user, $password, $options);
    
    $id = $_GET['Id'];
    echo $id;
    $sql = "DELETE FROM Liga WHERE Id = :Id";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':Id', $id, PDO::PARAM_INT);
    $statement->execute();
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}                           

header("Location: Index.php");
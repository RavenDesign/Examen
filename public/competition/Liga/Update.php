<?php
require ('../../../config.php');
require ('../../../common.php');
$updateUser = array(
"Id" => escape($_POST['Id']),
"Name" => escape($_POST['Name']),
"Year"  => escape($_POST['Year']),
"IsInPlanning" => escape($_POST['IsInPlanning'] == '0' ? false : true));
// print_r($newUser);


$sql = "UPDATE Liga set Name = :Name, Year = :Year, IsInPlanning = :IsInPlanning WHERE Id = :Id";
// echo $insertSql;

try {
    $connection = new \PDO($host, $user, $password, $options);
    $statement = $connection->prepare($sql);
    $statement->execute($updateUser);
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}
header("Location: ReadingOne.php?Id={$updateUser['Id']}");
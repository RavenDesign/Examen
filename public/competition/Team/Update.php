<?php
require ('../../../config.php');
require ('../../../common.php');
$updateUser = array(
"Id" => escape($_POST['Id']),
"Name" => escape($_POST['Name']),
"Location" => escape($_POST['Location']),
"Score" => escape($_POST['Score']));
// print_r($newUser);


$sql = "UPDATE Team set Name = :Name, Location = :Location, Score = :Score WHERE Id = :Id";
// echo $insertSql;

try {
    $connection = new \PDO($host, $user, $password, $options);
    $statement = $connection->prepare($sql);
    $statement->execute($updateUser);
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}
header("Location: ReadingOne.php?Id={$updateUser['Id']}");
<?php
require ('../../../config.php');
require ('../../../common.php');
$updateUser = array(
"Id" => escape($_POST['Id']),
"Date" => escape($_POST['Date']),
"Time" => escape($_POST['Time']),
"Status"  => escape($_POST['Status']),
"ScoreHome"  => escape($_POST['ScoreHome']),
"ScoreVisitors"  => escape($_POST['ScoreVisitors'])
);

// print_r($newUser);


$sql = "UPDATE Game set Date = :Date, Time = :Time, Status = :Status, ScoreHome = :ScoreHome, ScoreVisitors = :ScoreVisitors WHERE Id = :Id";
// echo $insertSql;

try {
    $connection = new \PDO($host, $user, $password, $options);
    $statement = $connection->prepare($sql);
    $statement->execute($updateUser);
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}
header("Location: ReadingOne.php?Id={$updateUser['Id']}");
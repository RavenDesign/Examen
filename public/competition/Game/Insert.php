<?php
require_once ('../../../config.php');
require_once ('../../../common.php');

$newUser = array(
	"Date" => escape($_POST['Date']),
	"Time" => escape($_POST['Time']),
	"Status"  => escape($_POST['Status']),
	"ScoreHome"  => escape($_POST['ScoreHome']),
	"ScoreVisitors"  => escape($_POST['ScoreVisitors'])
);
print_r($newUser);


$insertSql = "insert into Game (Date, Time, Status, ScoreHome, ScoreVisitors) values (:Date, :Time, :Status, :ScoreHome, :ScoreVisitors)";
// echo $insertSql;

try {
    $connection = new \PDO($host, $user, $password, $options);
    $statement = $connection->prepare($insertSql);
    $statement->execute($newUser);
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}
header("Location: Index.php");
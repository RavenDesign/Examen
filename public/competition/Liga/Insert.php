<?php
require_once ('../../../config.php');
require_once ('../../../common.php');

$newUser = array(
	"Name" => escape($_POST['Name']),
	"Year"  => escape($_POST['Year']),
	"IsInPlanning" => $_POST['IsInPlanning'] == '0' ? 0 : 1
);
print_r($newUser);


$insertSql = "insert into Liga (Name, Year, IsInPlanning) values (:Name, :Year, :IsInPlanning)";
// echo $insertSql;

try {
    $connection = new \PDO($host, $user, $password, $options);
    $statement = $connection->prepare($insertSql);
    $statement->execute($newUser);
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}
header("Location: Index.php");
<?php
require ('../../../config.php');
require ('../../../common.php');


    $newUser = array(
    	"Name" => escape($_POST['Name']),
    	"Location"  => escape($_POST['Location']),
    	"Score"     => escape($_POST['Score'])
    	
    );

    $insertSql = "insert into Team (Name, Location, Score) values (:Name, :Location, :Score)";
 

    try {
        $connection = new \PDO($host, $user, $password, $options);
        $statement = $connection->prepare($insertSql);
        $statement->execute($newUser);
    } catch (\PDOException $e) {
        $sqlErrorMessage = "Er is iets fout gelopen: {$e->getMessage()}";
    }

header("Location: Index.php");
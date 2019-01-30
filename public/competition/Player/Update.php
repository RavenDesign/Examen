<?php
require ('../../../config.php');
require ('../../../common.php');
// var_dump($_POST);
// anders dan Tania, wij escapen in het begin zodat
// de waarde al 'veilig' is vooraleer naar de database te sturen
$updateUser = array(
	"FirstName" => escape($_POST['FirstName']),
	"LastName"  => escape($_POST['LastName']),
	"Email"     => escape($_POST['Email']),
	"Address1"  => escape($_POST['Address1']),
	"Address2"  => escape($_POST['Address2']),
   	"PostalCode"  => escape($_POST['PostalCode']),
   	"City"  => escape($_POST['City']),
   	"Country"  => escape($_POST['Country']),
   	"Phone"  => escape($_POST['Phone']),
   	"Birthday"  => escape($_POST['Birthday']),
   	"TeamId"  => escape($_POST['TeamId']),
    "Id" => $_POST['Id']
);
var_dump($updateUser);
$sqlUpdate = "UPDATE Player SET FirstName = :FirstName, LastName = :LastName, Email = :Email, Address1 = :Address1, Address2 = :Address2, PostalCode = :PostalCode, City = :City, Country = :Country, Phone = :Phone, Birthday = :Birthday, TeamId = :TeamId WHERE Id = :Id";

try {
    $connection = new \PDO($host, $user, $password, $options);
    $statementx = $connection->prepare($sqlUpdate);
    $statementx->execute($updateUser);
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}
// return;
header("Location: ReadingOne.php?Id={$updateUser['Id']}");

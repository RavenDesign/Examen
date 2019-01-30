<?php
require ('../../../config.php');
require ('../../../common.php');

// anders dan Tania, wij escapen in het begin zodat
// de waarde al 'veilig' is vooraleer naar de database te sturen
$newUser = array(
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
   	"TeamId"  => escape($_POST['TeamId'])
);

// volgende regel gebuik je op te debuggen (manuele breakpoint)
// print_r($new_user);
// niet veilige manier, gevoelig voor SQL injectie
// $insertSql = "insert into users (firstname, lastname, email) values ('{$new_user['firstname']}', '{$new_user['lastname']}', '{$new_user['email']}')";
// echo $insertSql;

// nu met parameters, is veilig
$insertSql = "insert into Player (FirstName, LastName, Email, Address1, Address2, PostalCode, City, Country, Phone, Birthday, TeamId) values (:FirstName, :LastName, :Email, :Address1, :Address2, :PostalCode, :City, :Country, :Phone, :Birthday, :TeamId)";
// echo $insertSql;

try {
    $connection = new \PDO($host, $user, $password, $options);
    $statement = $connection->prepare($insertSql);
    $statement->execute($newUser);
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}
header("Location: Index.php");
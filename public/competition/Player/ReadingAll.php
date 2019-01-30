<?php
require_once ('../../../config.php');
require_once ('../../../common.php');

try {
    $connection = new \PDO($host, $user, $password, $options);
    
    $sqlSelect = "SELECT Player.Id AS PlayerId, FirstName, LastName,
    Name from Player INNER JOIN Team ON TeamId = Team.Id";
    $statementReadingAll = $connection->prepare($sqlSelect);
    $statementReadingAll->execute();
    $resultReadingAll = $statementReadingAll->fetchAll();
    echo 'aantal rijen ' . $statementReadingAll->rowCount();
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}                           


if ($resultReadingAll && $statementReadingAll->rowCount() > 0) { 
?>
        <table>
            <thead>
                <tr>
                    
                    <th>Select</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Team</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultReadingAll as $row) { 
	?>
                <tr>
                    <td><a class="icon-arrow-right" href="ReadingOne.php?Id=<?php echo $row['PlayerId'];?>"><span class="screen-reader-text">Lees rij</span></a></td>
                    <td><?php echo $row["FirstName"]; ?></td>
                    <td><?php echo $row["LastName"]; ?><td>
                    <td><?php echo $row["Name"]; ?><td>
     
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <blockquote>Geen spelers gevonden.</blockquote>
        <?php 
        } 
  ?>
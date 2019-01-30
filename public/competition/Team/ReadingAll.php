<?php
require_once ('../../../config.php');
require_once ('../../../common.php');

try {
    $connection = new \PDO($host, $user, $password, $options);
    
    $sqlSelect = "SELECT * from Team";
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
                    <th>Name</th>
                    <th>Location</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultReadingAll as $row) { 
	?>
                <tr>
                   <td><?php echo escape($row["id"]); ?></td>
                    <td><a class="icon-arrow-right" href="ReadingOne.php?Id=<?php echo escape($row["Id"]); ?>"><span class="screen-reader-text">Lees rij</span></a></td>
                    <td><?php echo escape($row["Name"]); ?></td>
                    <td><?php echo escape($row["Location"]); ?><td>
                    <td><?php echo escape($row["Score"]); ?></td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <blockquote>Geen teams gevonden.</blockquote>
        <?php 
        } 
  ?>
<?php
require ('../../../config.php');
require ('../../../common.php');

// lees alle teams in
try {
    $connection = new \PDO($host, $user, $password, $options);
    
    $sqlSelect = "SELECT Id, Name FROM Team";
    $statementReadingAll = $connection->prepare($sqlSelect);
    $statementReadingAll->execute();
    $teamList = $statementReadingAll->fetchAll();
    // var_dump($teamList);
    echo 'aantal rijen in team ' . $statementReadingAll->rowCount();
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}  

// de te updaten rij ophalen
$id = $_GET['Id'];
$sql = "SELECT Player.Id as PlayerId, FirstName, LastName, Email, Address1, Address2, PostalCode, City, Country, Phone, Birthday, Team.Name as TeamName, Team.Id AS TeamId FROM Player INNER JOIN Team ON Player.TeamId = Team.Id WHERE Player.Id = :Id";
// echo $insertSql;

try {
    $connection = new \PDO($host, $user, $password, $options);
    $statement = $connection->prepare($sql);
    $statement->bindParam(':Id', $id, PDO::PARAM_INT);
    $statement->execute();
    $player = $statement->fetch(PDO::FETCH_ASSOC);
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}

include ('../../template/header.php'); 
?>
<main>
    <article>
        <header class="command-bar">
            <h2>Liga</h2>
            <nav>
                <button type="submit" value="update" form="form" name="submit" class="icon-floppy-disk"><span class="screen-reader-text">Update</span></button></a>
                <a class="icon-cross" href="Index.php"><span class="screen-reader-text">Cancel</span></a>

            </nav>
        </header>
             <!-- form>(label+input:text)*6 -->
            <form action="Update.php" method="post" id="form">
               <fieldset>
                    <input type="hidden" name="Id" id="Id"
                            value="<?php echo $player['PlayerId'];?>">
                  
                    <div>
                        <label for="FirstName">Voornaam</label>
                        <input type="text" name="FirstName" id="FirstName"
                            value="<?php echo $player['FirstName'];?>">
                    </div>
                    <div>
                        <label for="LastName">Familienaam</label>
                        <input type="text" name="LastName" id="LastName"
                            value="<?php echo $player['LastName'];?>">
                    </div>
                    <div>
                        <label for="Email">E-mail</label>
                        <input type="Email" name="Email" id="Email"
                            value="<?php echo $player['Email'];?>">
                    </div>
                    <div>
                        <label for="Address1">Adres 1</label>
                        <input type="text" name="Address1" id="Address1"
                            value="<?php echo $player['Address1'];?>">
                    </div>
                    <div>
                        <label for="Address2">Adres 2</label>
                        <input type="text" name="Address2" id="Address2"
                            value="<?php echo $player['Address2'];?>">
                    </div>
                    <div>
                        <label for="PostalCode">Postcode</label>
                        <input type="text" name="PostalCode" id="PostalCode"
                            value="<?php echo $player['PostalCode'];?>">
                    </div>
                    <div>
                        <label for="City">Stad</label>
                        <input type="text" name="City" id="City"
                            value="<?php echo $player['City'];?>">
                    </div>
                     <div>
                        <label for="Country">Land</label>
                        <input type="text" name="Country" id="Country"
                            value="<?php echo $player['Country'];?>">
                    </div>   
                     <div>
                        <label for="Phone">Tel</label>
                        <input type="text" name="Phone" id="Phone"
                            value="<?php echo $player['Phone'];?>">
                    </div>
                   <div>
                        <label for="Birthday">Geboortedatum</label>
                        <input type="date" name="Birthday" id="Birthday" required
                            value="<?php echo $player['Birthday'];?>">
                    </div>
                    <div>
                        <label for="TeamId">Team</label>
                        <select id="TeamId" name="TeamId">
                            <?php
                                if ($teamList) {
                                    foreach ($teamList as $teamRow) {
                            ?>
                                    <option value="<?php echo $teamRow['Id'];?>"
                                       <?php echo $teamRow['Id'] === $player['TeamId'] ? 'SELECTED' : '';?>>
                                        <?php echo $teamRow['Name'];?>
                                    </option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
            </fieldset>
        </form>
        <div id="feedback">
            <?php 
               if (isset($_POST['submit']) && $statement) {
                    echo $newUser['Name'] . ' is toegevoegd.<br/>';
                }
                echo $sqlErrorMessage;
            ?>
        </div>
    </article>
    <aside>
        <?php include('ReadingAll.php');?>
    </aside>
    </main>
    
<?php include ('../../template/footer.php'); ?>

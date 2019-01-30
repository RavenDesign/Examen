<?php
require ('../../../config.php');
require ('../../../common.php');

$id = $_GET['Id'];
$sql = "SELECT Player.Id as PlayerId, FirstName, LastName, Email, Address1, Address2, PostalCode, City, Country, Phone, Birthday, Team.Name as TeamName FROM Player INNER JOIN Team ON Player.TeamId = Team.Id WHERE Player.Id = :Id";
// echo $insertSql;

try {
    $connection = new \PDO($host, $user, $password, $options);
    $statement = $connection->prepare($sql);
    $statement->bindParam(':Id', $id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
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
                <a class="icon-plus" href="InsertingOne.php"><span class="screen-reader-text">Inserting</span></a>
                <a class="icon-pencil" href="UpdatingOne.php?Id=<?php echo $id;?>"><span class="screen-reader-text">Updating</span></a>
                <a class="icon-bin" href="Delete.php?Id=<?php echo $id;?>"><span class="screen-reader-text">Updating</span></a>
                <a class="icon-cross" href="Index.php"><span class="screen-reader-text">Cancel</span></a>
            </nav>
        </header>
             <!-- form>(label+input:text)*6 -->
            <form action="" method="post">
               <fieldset>
                    <div>
                        <label>Voornaam</label>
                        <label><?php echo $result ? $result['FirstName'] : ''?>
                    </div>
                    <div>
                        <label>Familienaam</label>
                        <label><?php echo $result ? $result['LastName'] : ''?>
                    </div>
                    <div>
                        <label>E-mail</label>
                        <label><?php echo $result ? $result['Email'] : ''?>
                    </div>
                    <div>
                        <label for="Address1">Adres 1</label>
                        <label><?php echo $result ? $result['Address1'] : ''?>
                    </div>
                    <div>
                        <label>Adres 2</label>
                        <label><?php echo $result ? $result['Address2'] : ''?>
                    </div>
                    <div>
                        <label>Postcode</label>
                        <label><?php echo $result ? $result['PostalCode'] : ''?>
                    </div>
                    <div>
                        <label>Stad</label>
                         <label><?php echo $result ? $result['City'] : ''?>
                    </div>
                     <div>
                        <label>Land</label>
                        <label><?php echo $result ? $result['Country'] : ''?>
                    </div>   
                     <div>
                        <label>Tel</label>
                        <label><?php echo $result ? $result['Phone'] : ''?>
                    </div>
                   <div>
                        <label for="Birthday">Geboortedatum</label>
                        <label><?php echo $result ? $result['Birthday'] : ''?>
                    </div>
                    <div>
                        <label>Team</label>
                        <label><?php echo $result ? $result['TeamName'] : ''?>
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

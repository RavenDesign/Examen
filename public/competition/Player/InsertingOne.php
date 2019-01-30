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

include ('../../template/header.php'); 
?>
<main>
    <article>
        <header class="command-bar">
            <h2>Liga</h2>
            <nav>
                <button type="submit" value="insert" form="form" name="submit" class="icon-floppy-disk"><span class="screen-reader-text">Insert</span></button></a>
                <a class="icon-cross" href="Index.php"><span class="screen-reader-text">Cancel</span></a>
            </nav>
        </header>
             <!-- form>(label+input:text)*6 -->
            <form action="Insert.php" method="post" id="form">
               <fieldset>
                    <div>
                        <label for="FirstName">Voornaam</label>
                        <input type="text" name="FirstName" id="FirstName" required>
                    </div>
                    <div>
                        <label for="LastName">Familienaam</label>
                        <input type="text" name="LastName" id="LastName" required>
                    </div>
                    <div>
                        <label for="email">E-mail</label>
                        <input type="email" name="Email" id="Email">
                    </div>
                    <div>
                        <label for="Address1">Adres 1</label>
                        <input type="text" name="Address1" id="Address1">
                    </div>
                    <div>
                        <label for="Address2">Adres 2</label>
                        <input type="text" name="Address2" id="Address2">
                    </div>
                    <div>
                        <label for="PostalCode">Postcode</label>
                        <input type="text" name="PostalCode" id="PostalCode">
                    </div>
                    <div>
                        <label for="City">Stad</label>
                        <input type="text" name="City" id="City">
                    </div>
                     <div>
                        <label for="Country">Land</label>
                        <input type="text" name="Country" id="Country">
                    </div>   
                     <div>
                        <label for="Phone">Tel</label>
                        <input type="text" name="Phone" id="Phone">
                    </div>
                   <div>
                        <label for="Birthday">Geboortedatum</label>
                        <input type="date" name="Birthday" id="Birthday" required>
                    </div>
                    <div>
                        <label for="TeamId">Team</label>
                        <select id="TeamId" name="TeamId">
                            <option style="display:none;"></option>
                            <?php
                                if ($teamList) {
                                    foreach ($teamList as $teamRow) {
                            ?>
                                    <option value="<?php echo $teamRow['Id'];?>">
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


if (isset($_POST['submit'])) {
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
}

include ('../../template/header.php'); 
?>
<main>
    <article>
        <header class="command-bar">
            <h2>Liga</h2>
            <nav>
                <button type="submit" value="insert" form="form" name="submit" class="icon-floppy-disk"><span class="screen-reader-text">Insert</span></button></a>
                <a class="icon-cross" href="Index.php"><span class="screen-reader-text">Cancel</span></a>

            </nav>
        </header>
             <!-- form>(label+input:text)*6 -->
            <form action="" method="post">
               <fieldset>
                    <div>
                        <label for="FirstName">Voornaam</label>
                        <input type="text" name="FirstName" id="FirstName">
                    </div>
                    <div>
                        <label for="LastName">Familienaam</label>
                        <input type="text" name="LastName" id="LastName">
                    </div>
                    <div>
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div>
                        <label for="Address1">Adres 1</label>
                        <input type="text" name="Address1" id="Address1">
                    </div>
                    <div>
                        <label for="Address2">Adres 2</label>
                        <input type="text" name="Address2" id="Address2">
                    </div>
                    <div>
                        <label for="PostalCode">Postcode</label>
                        <input type="text" name="PostalCode" id="PostalCode">
                    </div>
                    <div>
                        <label for="City">Stad</label>
                        <input type="text" name="City" id="City">
                    </div>
                     <div>
                        <label for="Country">Land</label>
                        <input type="text" name="Country" id="Country">
                    </div>   
                     <div>
                        <label for="Phone">Tel</label>
                        <input type="text" name="Phone" id="Phone">
                    </div>
                   <div>
                        <label for="Birthday">Geboortedatum</label>
                        <input type="date" name="Birthday" id="Birthday">
                    </div>
                    <div>
                        <label for="TeamId">Team</label>
                        <select id="TeamId" name="TeamId">
                            <?php
                                if ($teamList) {
                                    foreach ($teamList as $teamRow) {
                            ?>
                                    <option value="<?php echo $teamRow['Id'];?>">
                                        <?php echo $teamRow['Name'];?>
                                    </option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                 
                    <input type="submit" value="Verzenden" name="submit">
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

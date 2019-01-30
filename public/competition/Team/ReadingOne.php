<?php 
require ('../../../config.php');
require ('../../../common.php');

try {
    $id = $_GET['Id'];
    $connection = new \PDO($host, $user, $password, $options);
    
     $sqlSelect = "SELECT * from Team WHERE Id = :Id";
    $statement = $connection->prepare($sqlSelect);
    $statement->bindParam(':Id', $id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
} catch (\PDOException $e) {
    echo "Er is iets fout gelopen: {$e->getMessage()}";
}                           




include ('../../template/header.php'); ?>


<main>
    <article>
        <header class="command-bar">
            <h2>Team</h2>
            <nav>
                <a class="icon-pencil" href="UpdatingOne.php?Id=<?php echo escape($result['Id']);?>"><span class="screen-reader-text">Updating</span></a>
                <a class="icon-plus" href="InsertingOne.php"><span class="screen-reader-text">Inserting</span></a>
              <a class="icon-bin" href="Delete.php?Id=<?php echo escape($result['Id']);?>"><span class="screen-reader-text">Updating</span></a>
                <a class="icon-cross" href="Index.php"><span class="screen-reader-text">Cancel</span></a>



            </nav>
        </header>
        <fieldset>
            <div id="feedback">
  <?php if (isset($_POST['submit']) && $statement) {
    echo $newUser['Team'] . ' is toegevoegd';
}
?>

            </div>
            <!-- form>(label+input:text)*6 -->
            <form action="" method="post" id="">
                <input type="hidden" name="Id" id="Id" value="<?php echo $result['Id'];?>"/>
                <div>
                    <label for="Name">Name</label>
                    <input type="text" name="Name" id="Name" readonly
                        value="<?php echo $result['Name'];?>">
                </div>
                <div>
                    <label for="Location">Location</label>
                    <input type="text" name="Location" id="Location" readonly
                        value="<?php echo $result['Location'];?>">
                </div>
                <div>
                    <label for="Score">Score</label>
                    <input type="text" name="Score" id="Score" readonly
                        value="<?php echo $result['Score'];?>">
               </div>
            </form>

        </fieldset>
    </article>
    <aside>
        <?php include('ReadingAll.php');?>
    </aside>
</main>
<?php include ('../../template/footer.php'); ?>



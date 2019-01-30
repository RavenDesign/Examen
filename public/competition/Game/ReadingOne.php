<?php 
require ('../../../config.php');
require ('../../../common.php');

try {
    $id = $_GET['Id'];
    //PDO statement -> Fetching the next row that fits to the given statements
    // http://php.net/manual/en/pdostatement.fetch.php
    $connection = new \PDO($host, $user, $password, $options);
    
    $sqlSelect = "SELECT * from Game WHERE Id = :Id";
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
            <h2>Game</h2>
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
    echo $newUser['Game'] . ' is toegevoegd';
}
?>

            </div>
            <!-- form>(label+input:text)*6 -->
            <form action="" method="post" id="">
                <input type="hidden" name="Id" id="Id" value="<?php echo $result['Id'];?>"/>
                <div>
                    <label for="Date">Date</label>
                    <input type="Date" name="Date" id="Date" readonly
                        value="<?php echo $result['Date'];?>">
                </div>
                <div>
                    <label for="Time">Time</label>
                    <input type="Time" name="Time" id="Time" readonly
                        value="<?php echo $result['Time'];?>">
                </div>
                <div>
                    <label for="Status">Status</label>
                    <input type="text" name="Status" id="Status" readonly
                        value="<?php echo $result['Status'];?>">
                </div>
                <div>
                    <label for="ScoreHome">Score Home</label>
                    <input type="text" name="ScoreHome" id="ScoreHome" readonly
                        value="<?php echo $result['ScoreHome'];?>">
                </div>
                <div>
                    <label for="ScoreVisitors">Score Visitors</label>
                    <input type="text" name="ScoreVisitors" id="ScoreVisitors" readonly
                        value="<?php echo $result['ScoreVisitors'];?>">
                </div>
                
            </form>

        </fieldset>
    </article>
    <aside>
        <?php include('ReadingAll.php');?>
    </aside>
</main>
<?php include ('../../template/footer.php'); ?>



<?php 
require ('../../../config.php');
require ('../../../common.php');

try {
    $id = $_GET['Id'];
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
            <h2>Liga</h2>
            <nav>
                <button type="submit" form="form" name="submit" value="update" class="icon-floppy-disk"><span class="screen-reader-text">Update</span></button>
               <a class="icon-cross" href="Index.php"><span class="screen-reader-text">Cancel</span></a>
            </nav>
        </header>
        <fieldset>
            <div id="feedback">
  <?php if (isset($_POST['submit']) && $statement) {
    echo $newUser['Name'] . ' is toegevoegd';
}
?>

            </div>
            <!-- form>(label+input:text)*6 -->
             <form action="Update.php" method="post" id="form">
                <input type="hidden" name="Id" id="Id" value="<?php echo $result['Id'];?>"/>
                <div>
                    <label for="Date">Date</label>
                    <input type="Date" name="Date" id="Date"
                        value="<?php echo $result['Date'];?>">
                </div>
                 <div>
                    <label for="Time">Date</label>
                    <input type="Time" name="Time" id="Time"
                        value="<?php echo $result['Time'];?>">
                </div>
                <div>
                    <label for="Status">Status</label>
                    <input type="text" name="Status" id="Status"
                        value="<?php echo $result['Status'];?>">
                </div>
                <div>
                    <label for="ScoreHome">Score Home</label>
                    <input type="text" name="ScoreHome" id="ScoreHome"
                        value="<?php echo $result['ScoreHome'];?>">
                </div>
                <div>
                    <label for="ScoreVisitors">Score Visitors</label>
                    <input type="text" name="ScoreVisitors" id="ScoreVisitors"
                        value="<?php echo $result['ScoreVisitors'];?>">
                </div>
            </form>
        </fieldset>
    </article>
    <aside>
    <aside>
        <?php include('ReadingAll.php');?>
    </aside>
    </aside>
</main>
<?php include ('../../template/footer.php'); ?>

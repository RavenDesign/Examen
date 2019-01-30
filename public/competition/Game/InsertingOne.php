<?php 

include ('../../template/header.php'); ?>


<main>
    <article>
        <header class="command-bar">
            <h2>Game</h2>
            <nav>
                <button type="submit" value="insert" form="form" name="submit" class="icon-floppy-disk"><span class="screen-reader-text">Insert</span></button></a>
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
            <form action="Insert.php" method="post" id="form">
                <div>
                    <label for="Date">Date</label>
                    <input type="Date" name="Date" id="Date" required>
                </div>
                <div>
                    <label for="Time">Time</label>
                    <input type="Time" name="Time" id="Time" required>
                </div>
                <div>
                    <label for="Status">Status</label>
                    <input type="text" name="Status" id="Status">
                </div>
                <div>
                    <label for="ScoreHome">Score Home</label>
                    <input type="text" name="ScoreHome" id="ScoreHome">
                </div>
                <div>
                    <label for="ScoreVisitors">Score Visitors</label>
                    <input type="text" name="ScoreVisitors" id="ScoreVisitors">
                </div>
                
            </form>

        </fieldset>
    </article>
    <aside>
        <?php include('ReadingAll.php');?>
    </aside>
</main>
<?php include ('../../template/footer.php'); ?>

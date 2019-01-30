<?php 

include ('../../template/header.php'); ?>


<main>
    <article>
        <header class="command-bar">
            <h2>Liga</h2>
            <nav>
                <button type="submit" value="insert" form="form" name="submit" class="icon-floppy-disk"><span class="screen-reader-text">Insert</span></button></a>
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
            <form action="Insert.php" method="post" id="form">
                <div>
                    <label for="Name">Naam</label>
                    <input type="text" name="Name" id="Name" required>
                </div>
                <div>
                    <label for="Year">Jaar</label>
                    <input type="text" name="Year" id="Year">
                </div>
                <div>
                    <label for="IsInPlanning">Gepland?</label>
                    <input type="radio" name="IsInPlanning" id="IsInPlanningYes" value="1"><label>Ja</label>
                    <input type="radio" name="IsInPlanning" id="IsInPlanningNo" value="0"><label>Nee</label>
                </div>
            </form>

        </fieldset>
    </article>
    <aside>
        <?php include('ReadingAll.php');?>
    </aside>
</main>
<?php include ('../../template/footer.php'); ?>

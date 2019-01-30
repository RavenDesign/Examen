<?php

include ('../../template/header.php'); 
?>

<main>
    <article>
        <header class="command-bar">
            <h2>Team</h2>
            <nav>
                <button type="submit" value="insert" form="form" name="submit" class="icon-floppy-disk"><span class="screen-reader-text">Insert</span></button></a>
                <a class="icon-cross" href="Index.php"><span class="screen-reader-text">Cancel</span></a>

            </nav>
        </header>
             <!-- form>(label+input:text)*6 -->
         
               <fieldset>
                   <form action="Insert.php" method="post" id="form">
                   <div>
                        <label for="Name">Naam</label>
                        <input type="text" name="Name" id="Name" required>
                    </div>
                    <div>
                        <label for="Location">Locatie</label>
                        <input type="text" name="Location" id="Location" required>
                    </div>
                    <div>
                        <label for="Score">Score</label>
                        <input type="text" name="Score" id="Score" required>
                    </div>
                   
                </fieldset>
            </form>
            <div id="feedback">
                <?php 
                   if (isset($_POST['submit']) && $statement) {
                        echo $newUser['Team'] . ' is toegevoegd.<br/>';
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

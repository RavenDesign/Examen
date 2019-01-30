<?php 

//The require_once statement is identical to require except PHP will check if the file has already been included, 
//and if so, not include (require) it again
require_once ('../../../config.php');
require_once ('../../../common.php');



include ('../../template/header.php'); ?>


<main>
	<article>
		<header class="command-bar">
			<h2>Game</h2>
			<nav>
				<a class="icon-plus" href="InsertingOne.php"><span class="screen-reader-text">Inserting</span></a>
			</nav>
		</header>
		<fieldset>

		</fieldset>
	</article>
	<aside>

		<?php include('ReadingAll.php');?>

	</aside>
</main>
<?php include ('../../template/footer.php'); ?>

<?php
?>
<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width">
                <link rel="stylesheet" type="text/css" href="style.css" />
                <title>Games</title>
        </head>
        <body>
                <header>
                        <?php include "menu.php"; ?>
                </header>
                <main>
                        <section class='won_rock_paper_scissors'>
                                <h1>Rock Paper Scissors</h1>
				<?php echo(view_errors($errors)); ?>
			<?php 
			foreach($_SESSION['RockPaperScissors']->history as $key=>$value){
				echo("<br/> $value");
			}
			?> </br>

			<?php echo "<br> You won: {$_SESSION["RockPaperScissors"]->getMyWins()} I won: {$_SESSION["RockPaperScissors"]->getCpuWins()}"; ?> </br>

			<form method="post">
			<?php
		       		if ($_SESSION["RockPaperScissors"]->getMyWins() == 5) {	
			?>
					<h1>You WON!!</h1>
			<?php
				}
			?>
			<?php
                                if ($_SESSION["RockPaperScissors"]->getCpuWins() == 5) {
                        ?>
                                        <h1>I WON!!</h1>
                        <?php
                                }
			?>

			Play again?
			<input type="submit" name="submit" value="yes" />
			<input type="submit" name="submit" value="no" />
			</form>

                        </section>
                        <section class='stats'>
                                <h1>Stats</h1>
                                <table>
                                <tr> <td> <b> Rock Paper Scissors wins: </b> </td> <td> <?=$_SESSION['win2']?> </td> </tr>
                                </table>
                        </section>
                </main>
                <footer>
                        A project by Ryan Oakley
                </footer>
        </body>
</html>

<?php
	$_REQUEST['guess']=!empty($_REQUEST['guess']) ? $_REQUEST['guess'] : '';
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
                        <section class='rock_paper_scissors'>
                                <h1>Rock Paper Scissors</h1>
                                <?php echo(view_errors($errors)); ?> 

			<?php 
			foreach($_SESSION['RockPaperScissors']->history as $key=>$value){
				echo("<br/> $value");
			}
			if($_SESSION["RockPaperScissors"]->getState()=="correct"){ 
			?>
				<form method="post">
					<input type="submit" name="submit" value="start again" />
				</form>
			<?php 
				} 
			?>

			<?php if($_SESSION["RockPaperScissors"]->getState()!="correct"){ ?>
			<form method="post", action="index.php">
				</br>
                                <?php echo "You won: {$_SESSION["RockPaperScissors"]->getMyWins()} I won: {$_SESSION["RockPaperScissors"]->getCpuWins()}"; ?> </br>
                                <input type="submit" name="submit" value="rock" />
                                <input type="submit" name="submit" value="paper" />
                                <input type="submit" name="submit" value="scissors" />
                        </form>
			<?php } ?>

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

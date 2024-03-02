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
                        <section class='guess game'>
                                <h1>Guess Game</h1>
                                <?php if($_SESSION["GuessGame"]->getState()!="correct"){ ?>
				<form method="post">
					<input type="text" name="guess" value="<?php echo($_REQUEST['guess']); ?>" /> <input type="submit" name="submit" value="guess" />
				</form>
			<?php } ?>
		
			<?php echo(view_errors($errors)); ?> 

			<?php 
			foreach($_SESSION['GuessGame']->history as $key=>$value){
				echo("<br/> $value");
			}
			if($_SESSION["GuessGame"]->getState()=="correct"){ 
			?>
				<form method="post">
					<input type="submit" name="submit" value="start again" />
				</form>
			<?php 
			} 
			?>
                        </section>
                        <section class='stats'>
                                <h1>Stats</h1>
                                <table>
                                <tr> <td> <b> Guess Game wins: </b> </td> <td> <?=$_SESSION['win1']?> </td> </tr>
                                </table>
                        </section>
                </main>
                <footer>
                        A project by Ryan Oakley
                </footer>
        </body>
</html>

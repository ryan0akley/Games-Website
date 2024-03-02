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
                        <section class='stats-by-game'>
                                <h1>Stats By Game</h1>
				<table>
				<tr> <td> <b> Guess Game wins: </b> </td> <td> <?=$_SESSION['win1']?> </td> </tr>
				<tr> <td> <b> Rock Paper Scissors wins: </b> </td> <td> <?=$_SESSION['win2']?> </td> </tr>
				</table>
                        </section>
                        <section class='summary-stats'>
                                <h1>Summary Stats</h1>
				<table>
				<tr> <td> <b> Total wins: </b> </td> <td> <?=$_SESSION['win1'] + $_SESSION['win2']?> </td> </tr>
				</table>
                        </section>
                </main>
                <footer>
                        A project by Ryan Oakley
                </footer>
        </body>
</html>

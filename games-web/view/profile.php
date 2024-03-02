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
                        <section class='profile'>
				<h1><?=$_SESSION['user']?></h1>
				<img src=<?=$_SESSION['pfp']?> width="200" height="200"> <br/>

				<table class="details">
				<tr><td class="tags"> <i><?=$_SESSION['tags']?></i> </td></tr>
				<tr><td> <b>My favourite animal:</b> <?=$_SESSION['animal']?> </td></tr>
				<tr><td> <b>Fun fact about me:</b> <?=$_SESSION['fact']?> </td></tr>
                                </table>
                        </section>
                        <section class='stats'>
                                <h1>Stats</h1>
                                <table>
                                <tr> <td> <b> Guess Game wins: </b> </td> <td> <?=$_SESSION['win1']?> </td> </tr>
                                <tr> <td> <b> Rock Paper Scissors wins: </b> </td> <td> <?=$_SESSION['win2']?> </td> </tr>
                                </table>
                        </section>
                </main>
                <footer>
                        A project by Ryan Oakley
                </footer>
        </body>
</html>

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
                                <h1>Frogs</h1>
				<section class='frog-set'>
					<?php $positions = $_SESSION['Frogs']->getPositions(); ?>
					<?php for ($i = 0; $i < count($positions); $i++) { ?>

						<?php if ($positions[$i] != "") { ?>
							<a href="?c=<?=$positions[$i]?>"><img src=<?=$positions[$i]?> width="42px" height="42px" /></a>
						<?php } else {?>
							<div style="width: 42px; height: 42px; border: 0px;"></div>
						<?php } ?>
					<!-- <a href="?c=y1"><img src="view/imgs/yellowFrog.gif" width="42" height="42" /></a> -->
					<?php } ?>
				</section>
                        <section class='stats'>
                        </section>
                </main>
                <footer>
                        A project by Ryan Oakley
                </footer>
        </body>
</html>

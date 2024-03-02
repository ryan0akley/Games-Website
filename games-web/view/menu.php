<?php
        $class1="label-card";
        $class2="label-card";
        $class3="label-card";
        $class4="label-card";
        $class5="label-card";
	$class6="label-card";

        if ($_SESSION['state']=="all_stats") { $class1 = "selected-label-card"; }
        else if ($_SESSION['state']=="play_guessgame" || $_SESSION['state']=="won_guessgame") { $class2 = "selected-label-card"; }
        else if ($_SESSION['state']=="play_rock_paper_scissors" || $_SESSION['state']=="won_rock_paper_scissors") { $class3 = "selected-label-card"; }
        else if ($_SESSION['state']=="play_frogs") { $class4 = "selected-label-card"; }
	else if ($_SESSION['state']=="profile") { $class5 = "selected-label-card"; }
?>
<section class="menu">
	<nav>
		<div class="<?=$class1?>">
                	<a href="?q=all_stats">All Stats</a>
                </div>
                <div class="<?=$class2?>" >
                	<a href="?q=play_guessgame">Guess Game</a>
                </div>
                <div class="<?=$class3?>" >
                	<a href="?q=play_rock_paper_scissors">Rock Paper Scissors</a>
                </div>
                <div class="<?=$class4?>" >
                	<a href="?q=play_frogs">Frogs</a>
                </div>
               	<div class="<?=$class5?>" >
                	<a href="?q=profile">Profile</a>
                </div>
                <div class="<?=$class6?>" >
                	<a href="?q=login">Logout</a>
                </div>
	</nav>
</section>

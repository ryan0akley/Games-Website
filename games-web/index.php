<?php
	ini_set('display_errors', 'On');
	require_once "lib/lib.php";
	require_once "model/GuessGame.php";
	require_once "model/RockPaperScissors.php";
	require_once "model/Frogs.php";

	session_save_path("sess");
	session_start(); 

	$dbconn = db_connect();

	$errors=array();
	$view="";

	$current_q = '';

	/* controller code */

	/* local actions, these are state transforms */
	if(!isset($_SESSION['state'])){
		$_SESSION['state']='login';
		$current_q = 'login';
	}

	if (isset($_GET['q'])) {
		if ($current_q != $_GET['q']) {

			if ($_SESSION['state']=="won_guessgame") { //when clicking to new tab while won, reset game
                                $_SESSION["GuessGame"]=new GuessGame();
			}
			else if ($_SESSION['state']=="won_rock_paper_scissors") { //when clicking to new tab while won, reset game
                                $_SESSION["RockPaperScissors"]=new RockPaperScissors();
                        }
			else if ($_SESSION['state']=="play_frogs") { //when clicking to new tab, reset game
                                $_SESSION["Frogs"]=new Frogs();
                        }

			$_SESSION['state'] = $_GET['q'];
			$current_q = $_GET['q'];
		}
	}

	switch($_SESSION['state']){
		case "login":
			// the view we display by default
			$view="login.php";

			// check if submit or not
			if(empty($_REQUEST['submit']) || $_REQUEST['submit']!="login"){
				break;
			}

			// validate and set errors
			if(empty($_REQUEST['user']))$errors[]='user is required';
			if(empty($_REQUEST['password']))$errors[]='password is required';
			if(!empty($errors))break;

			// perform operation, switching state and view if necessary
			if(!$dbconn){
				$errors[]="Can't connect to db";
				break;
			}
			$query = "SELECT * FROM appuser WHERE userid=$1 and password=$2;";
                	$result = pg_prepare($dbconn, "", $query);

                	$result = pg_execute($dbconn, "", array($_REQUEST['user'], $_REQUEST['password']));
                	if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
				$_SESSION['user']=$_REQUEST['user'];
				$_SESSION['pfp'] = $row['pfp'];
				$_SESSION['tags'] = $row['tags'];
				$_SESSION['animal'] = $row['animal'];
				$_SESSION['fact'] = $row['fact'];
				$_SESSION['win1'] = $row['win1'];
				$_SESSION['win2'] = $row['win2'];
				$_SESSION['win3'] = $row['win3'];

				$_SESSION['GuessGame']=new GuessGame();
				$_SESSION['RockPaperScissors']=new RockPaperScissors();
				$_SESSION['Frogs']=new Frogs();

				$_SESSION['state']='all_stats';
				$view="all_stats.php";
			} else {
				$errors[]="invalid login";
			}
			break;

		case "register":
			$view="register.php";			

			if(empty($_REQUEST['submit']) || $_REQUEST['submit']!="Register"){
                                break;
			}

			if(empty($_REQUEST['new_user'])) {$errors[]='New username is required';}
			else {
				//check if userid exists
				$query = "SELECT * FROM appuser WHERE userid=$1";
                        	$result = pg_prepare($dbconn, "", $query);

				$result = pg_execute($dbconn, "", array($_REQUEST['new_user']));
				if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
					$errors[]='Username already exists';
				}
			}
			if(empty($_REQUEST['new_password']))$errors[]='New password is required';

			if($_REQUEST['new_password']!=$_REQUEST['verify_password'])$errors[]='Verified password does not match';

			if(empty($_POST['pfp']))$errors[]='Profile picture is required';

			$tags = "";
			if (!isset($_POST['tag'])) {
				$errors[]='At least one profile tag is required';
			} else {
				foreach ($_POST['tag'] as $tag) {
					// concatenate tages
					$tags = $tags . " " . $tag;
				}
			}

			if(empty($_POST['fun_fact']))$errors[]='Fun fact is required';

			if(!empty($errors))break;

			$pfp = '';
			if($_POST['pfp']=='pfp1')$pfp='view\imgs\wide_cat.jpg';
			if($_POST['pfp']=='pfp2')$pfp='view\imgs\tarens.jpg';
			if($_POST['pfp']=='pfp3')$pfp='view\imgs\cat.jpg';
			if($_POST['pfp']=='pfp4')$pfp='view\imgs\gregg.jpg';
			if($_POST['pfp']=='pfp5')$pfp='view\imgs\space.jpg';

			$query = "INSERT INTO appuser (userid, password, pfp, tags, animal, fact, win1, win2, win3) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9)";
			$result = pg_prepare($dbconn, "", $query);

			$result = pg_execute($dbconn, "", array($_REQUEST['new_user'], $_REQUEST['new_password'], $pfp, $tags, $_POST['animal'], $_POST['fun_fact'], 0, 0, 0));

			$errors[]='Welcome!';
			break;

		case "play_guessgame":
			$view="play_guessgame.php";

			// check if submit or not
			if(empty($_REQUEST['submit'])||$_REQUEST['submit']!="guess"){
				break;
			}

			// validate and set errors
			if(!is_numeric($_REQUEST["guess"]))$errors[]="Guess must be numeric.";
			if(!empty($errors))break;

			// perform operation, switching state and view if necessary
			$_SESSION["GuessGame"]->makeGuess($_REQUEST['guess']);
			if($_SESSION["GuessGame"]->getState()=="correct"){
				$_SESSION['state']="won_guessgame";
				$view="won_guessgame.php";
			}
			$_REQUEST['guess']="";

			break;

		case "won_guessgame":
			// the view we display by default
			$view="play_guessgame.php";

			// check if submit or not
			if(empty($_REQUEST['submit'])||$_REQUEST['submit']!="start again"){
				$errors[]="Invalid request";
				$view="won_guessgame.php";
			}

			// validate and set errors
			if(!empty($errors))break;


			// perform operation, switching state and view if necessary

			if ($_REQUEST['submit']=="start again") {
				$_SESSION["GuessGame"]=new GuessGame();
				$_SESSION['state']="play_guessgame";
				$view="play_guessgame.php";
			}

			break;

		case "all_stats":
			$view="all_stats.php";
			break;

		case "play_rock_paper_scissors":
			$view="play_rock_paper_scissors.php";

			if(empty($_REQUEST['submit']) || ($_REQUEST['submit']!="rock" && $_REQUEST['submit']!="paper" && $_REQUEST['submit']!="scissors")){
				break;
			}

			if(!empty($errors))break;

			$_SESSION["RockPaperScissors"]->makeGuess($_REQUEST['submit']);
			if($_SESSION["RockPaperScissors"]->getState()=="correct"){
				$_SESSION['state']="won_rock_paper_scissors";
				$view="won_rock_paper_scissors.php";
			}

                        break;

		case "won_rock_paper_scissors":
			$view="play_rock_paper_scissors.php";

			if(empty($_REQUEST['submit']) || ($_REQUEST['submit']!="yes" && $_REQUEST['submit']!="no")){
				$errors[]="Invalid request";
				$view="won_rock_paper_scissors.php";
			}

			if(!empty($errors))break;

			if ($_REQUEST['submit']=="yes") {
				$_SESSION["RockPaperScissors"]=new RockPaperScissors();
				$_SESSION['state']="play_rock_paper_scissors";
				$view="play_rock_paper_scissors.php";
			}
			else if ($_REQUEST['submit']=="no") {
				$_SESSION['RockPaperScissors']->history[] = "oh ok :(";
				$view="won_rock_paper_scissors.php";
			}

			break;

		case "play_frogs":
			$view="play_frogs.php";

			if(!isset($_GET['c'])){
                                break;
                        }

			$_SESSION["Frogs"]->moveFrog($_GET['c']);

			break;

		case "profile":
			$view="profile.php";
			break;

		case "unavailable":
			$view="unavailable.php";
			break;
	}
	require_once "view/$view";
?>

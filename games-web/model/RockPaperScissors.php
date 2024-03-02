<?php

class RockPaperScissors {
	public $secretChoice = 0;
	public $numGuesses = 0;
	public $history = array();
	public $state = "";

	public $myChoice = "";
	public $cpuChoice = "";

	public $myWins = 0;
	public $cpuWins = 0;

	public function __construct() {
		$this->secretChoice = rand(1,3); /* rock = 1, paper = 2, scissors = 3 */
    	}
	
	public function makeGuess($guess){
		$this->numGuesses++;
		$guessDigit = 1;

		$this->secretChoice = rand(1,3); /* rock = 1, paper = 2, scissors = 3 */

		if ($guess == 'rock') { $guessDigit = 1; }
		else if ($guess == 'paper') { $guessDigit = 2; }
		else { $guessDigit = 3; }

		if ($guessDigit == 1) { $this->myChoice = "rock"; }
		else if ($guessDigit == 2) { $this->myChoice = "paper"; }
		else { $this->myChoice = "scissors"; }

		if ($this->secretChoice == 1) { $this->cpuChoice = "rock"; }
                else if ($this->secretChoice == 2) { $this->cpuChoice = "paper"; }
                else { $this->cpuChoice = "scissors"; }

		if(($guessDigit == 1 && $this->secretChoice == 3) || ($guessDigit == 2 && $this->secretChoice == 1) || ($guessDigit == 3 && $this->secretChoice == 2)){ /* winning conditions */
			$this->history[]="Round #{$this->numGuesses}, you chose {$this->myChoice}, I chose {$this->cpuChoice}, you won.";
			$this->myWins++;
		} else if(($guessDigit == 1 && $this->secretChoice == 2) || ($guessDigit == 2 && $this->secretChoice == 3) || ($guessDigit == 3 && $this->secretChoice == 1)){ /* losing conditions */
			$this->history[]="Round #{$this->numGuesses}, you chose {$this->myChoice}, I chose {$this->cpuChoice}, I won.";
			$this->cpuWins++;
		} else {
			$this->history[]="Round #{$this->numGuesses}, you chose {$this->myChoice}, I chose {$this->cpuChoice}, tie game.";
		}

		if ($this->myWins == 5 || $this->cpuWins == 5) {
			$this->state = "correct";
		}
	}

	public function getState(){
		return $this->state;
	}

	public function getMyWins(){
                return $this->myWins;
	}
	public function getCpuWins(){
                return $this->cpuWins;
        }
}
?>


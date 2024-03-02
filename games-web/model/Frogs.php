<?php

class Frogs {

	public $yellowFrog0 = "view/imgs/yellowFrog0.gif";
	public $yellowFrogPos0 = 0;
	public $yellowFrog1 = "view/imgs/yellowFrog1.gif";
	public $yellowFrogPos1 = 1;
	public $yellowFrog2 = "view/imgs/yellowFrog2.gif";
	public $yellowFrogPos2 = 2;

	public $greenFrog0 = "view/imgs/greenFrog0.gif";
	public $greenFrogPos0 = 4;
	public $greenFrog1 = "view/imgs/greenFrog1.gif";
	public $greenFrogPos1 = 5;
	public $greenFrog2 = "view/imgs/greenFrog2.gif";
	public $greenFrogPos2 = 6;

	public $positions = array("view/imgs/yellowFrog0.gif", "view/imgs/yellowFrog1.gif", "view/imgs/yellowFrog2.gif", "", "view/imgs/greenFrog0.gif", "view/imgs/greenFrog1.gif", "view/imgs/greenFrog2.gif");

	public $current_c = "";

	public function moveFrog($frog) {

	if ($this->current_c != $frog) {

        $this->current_c = $frog;

        for ($i = 0; $i <= 2; $i++) {

        if ($frog == $this->{'yellowFrog' . $i}) {
                if ($this->{'yellowFrogPos' . $i} <= 5 && $this->positions[$this->{'yellowFrogPos' . $i} + 1] == "") { //next space empty
                        $this->positions[$this->{'yellowFrogPos' . $i} + 1] = $this->{'yellowFrog' . $i}; //set frog in empty space
                        $this->positions[$this->{'yellowFrogPos' . $i}] = ""; //set old frog's space to empty
                        $this->{'yellowFrogPos' . $i} = $this->{'yellowFrogPos' . $i} + 1; //set frog's new position
                }
                 //If next space not empty, then jump over frog if possible
                else if ($this->{'yellowFrogPos' . $i} <= 4 && $this->positions[$this->{'yellowFrogPos' . $i} + 2] == "") {
                        $this->positions[$this->{'yellowFrogPos' . $i} + 2] = $this->{'yellowFrog' . $i};
                        $this->positions[$this->{'yellowFrogPos' . $i}] = "";
                        $this->{'yellowFrogPos' . $i} = $this->{'yellowFrogPos' . $i} + 2;
                }
        }

        if ($frog == $this->{'greenFrog' . $i}) {
                if ($this->{'greenFrogPos' . $i} >= 1 && $this->positions[$this->{'greenFrogPos' . $i} - 1] == "") {
                        $this->positions[$this->{'greenFrogPos' . $i} - 1] = $this->{'greenFrog' . $i};
                        $this->positions[$this->{'greenFrogPos' . $i}] = "";
                        $this->{'greenFrogPos' . $i} = $this->{'greenFrogPos' . $i} - 1;
                }

                else if ($this->{'greenFrogPos' . $i} >= 2 && $this->positions[$this->{'greenFrogPos' . $i} - 2] == "") {
                        $this->positions[$this->{'greenFrogPos' . $i} - 2] = $this->{'greenFrog' . $i};
                        $this->positions[$this->{'greenFrogPos' . $i}] = "";
                        $this->{'greenFrogPos' . $i} = $this->{'greenFrogPos' . $i} - 2;
                }
	}

	}

	}

	}

	public function getPositions() {
		return $this->positions;
	}
}



?>

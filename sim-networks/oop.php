<?php
error_reporting(0);

class Car {
	private $engineState = "stop";
	private $speed = 0;
	
	public function engineStart() {
		$this->engineState = "start";
	}
	
	public function engineStop() {
		$this->engineState = "stop";
	}
	
	public function speedUp() {
		if ($this->engineState === "stop") {
			throw new Exception('Need start engine');
		}
		
		$this->speed += 10;
	}
	
	public function speedDown() {
		if ($this->speed === 0) {
			throw new Exception('Speed is min');
		}
		
		$this->speed -= 10;
	}
	
	public function getCurrentSpeed() {
		return $this->speed;
	}
}

$honda = new Car();
echo $honda->getCurrentSpeed();
echo '<br>';
try {
	$honda->speedUp();
} catch (Exception $e) {
    echo $e->getMessage(), "<br>";
}
echo $honda->getCurrentSpeed();
echo '<br>';
try {
	$honda->speedDown();
} catch (Exception $e) {
    echo $e->getMessage(), "<br>";
}
echo $honda->getCurrentSpeed();
echo '<br>';
echo '===============';
echo '<br>';
$honda->engineStart();
echo $honda->getCurrentSpeed();
echo '<br>';
try {
	$honda->speedDown();
} catch (Exception $e) {
    echo $e->getMessage(), "<br>";
}
echo $honda->getCurrentSpeed();
echo '<br>';
try {
	$honda->speedUp();
} catch (Exception $e) {
    echo $e->getMessage(), "<br>";
}
try {
	$honda->speedUp();
} catch (Exception $e) {
    echo $e->getMessage(), "<br>";
}
echo $honda->getCurrentSpeed();
echo '<br>';
echo '===============';
echo '<br>';
try {
	$honda->speedDown();
} catch (Exception $e) {
    echo $e->getMessage(), "<br>";
}
echo $honda->getCurrentSpeed();
echo '<br>';
try {
	$honda->speedDown();
} catch (Exception $e) {
    echo $e->getMessage(), "<br>";
}
echo $honda->getCurrentSpeed();
echo '<br>';
try {
	$honda->speedDown();
} catch (Exception $e) {
    echo $e->getMessage(), "<br>";
}
echo $honda->getCurrentSpeed();
echo '<br>';
echo '===============';
echo '<br>';
$honda->engineStop();
try {
	$honda->speedUp();
} catch (Exception $e) {
    echo $e->getMessage(), "<br>";
}
echo $honda->getCurrentSpeed();
echo '<br>';

?>
<?php
set_time_limit(0);

require_once '/home/pi/.composer/vendor/autoload.php';

use lepiaf\SerialPort\SerialPort;
use lepiaf\SerialPort\Parser\SeparatorParser;
use lepiaf\SerialPort\Configure\TTYConfigure;
use lepiaf\SerialPort\Exception\LogicException;

$form = $_POST(['form']);
$tab = json_decode($form);

foreach ($tab as $row) {
	$type = $row['type'];
	$options = $row['options'];


	switch ($type) {
		case 'avancer':
			avancer($pas);
			break;
		case 'mesure':
			mesure($pas);
			break;
		case 'reculer':
			reculer($pas);
			break;
		case 'goder':		
			goder($pas);
			break;
		case 'photo':
			photo($pas);				
	}
}

try {
	$serialPort = new SerialPort(new SeparatorParser(";"), new TTYConfigure());
	$serialPort->open('/dev/ttyACM0');
} catch (LogicException $e) {
	echo $e->getMessage();
	die();
}

while ($data = $serialPort->read()) {
	echo $data."\n"; // exemple de valeur : "102,2,0"
}

// $serialPort->write($order);

$serialPort->close();


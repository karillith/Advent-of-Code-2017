<?php 

/*////////////
Reminder to self: add notes about this process here
/*////////////

// 11137 38.825 seconds

$configurations = array();

// $first_config = array(0, 2, 7, 0);
$first_config = array(14, 0, 15, 12, 11, 11, 3, 5, 1, 6, 8, 4, 9, 1, 8, 4);
$config = $first_config;
$repeated_flag = false;

while (!$repeated_flag) {
	// echo count($configurations) . "\n";
// while (count($configurations) < 15) {
	$configurations[] = $config;
	$max_key = find_max_key($config);
	$max_value = $config[$max_key];

	// echo "$max_key is max key and $max_value is max value\n";
	// exit;

	$config[$max_key] = 0;

	for ($i=($max_key+1); $i <= ($max_key+$max_value); $i++) { 
		// echo "$i\n";
		$config[$i % sizeof($config)]++;
	}

	$repeated_flag = search_configurations($config, $configurations);
}
// print_r($configurations[14]);
echo count($configurations) . "\n";

function find_max_key($config) {
	// print_r($config);
	$max_value = 0;
	$max_key = '';
	foreach ($config as $key => $value) {
		// var_dump($value);
		// var_dump($max_value);
		// echo "$value is value and $max_value is max value\n";
		if ($value > $max_value) {
			$max_key = $key;
			$max_value = $value;
		}
	}
	return $max_key;
}

function search_configurations($current_config, $configurations) {

	for ($i=0; $i < count($configurations); $i++) { 
		if ($current_config == $configurations[$i]) {
			echo "there's an infinite loop at {$i}!\n";
			print_r($configurations[$i]);
			print_r($current_config);
			return true;
		}
	}
	return false;
	// foreach ($configurations as $configuration) {
	// 	if ($current_config == $configuration) {
	// 		return true;
	// 	}
	// }
	// return false;
}

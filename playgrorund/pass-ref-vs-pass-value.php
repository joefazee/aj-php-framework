<?php

$x = 10;

function add(&$y) {
	$y++;
}


$data = [1,2,3,4,5];

$multiples = array_map(function($item) {
		return $item * 2;
}, $data);

print_r($multiples );


function map2(array &$items) {
	for($i=0; $i < count($items); $i++) {
		$items[$i] = $items[$i] * 2;
	}

}

print_r($data);
map2($data);
print_r($data);

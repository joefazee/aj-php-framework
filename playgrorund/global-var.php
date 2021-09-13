<?php

$x = 10;

function add() {
	global $x;
	$x++;
	echo $x;
}

add();
echo $x;

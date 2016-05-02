<?php

require "vender/autoload.php";

$consoles = [
	"nintendo NX",
	"playstation 4.5",
	"Xbox One v2"
];

$bla = collect($consoles)
	->reverse()
	->map(function($console)) 
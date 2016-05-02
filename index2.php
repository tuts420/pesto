<?php

require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB;
$db->addConnection([
    'driver'    => 'mysql',
    'database'  => 'consoles',
    'username'  => 'root',
    'password'  => '',
    'host'      => 'localhost',
    'charset'   => 'latin1',
    'collation' => 'latin1_swedish_ci',
    'prefix'    => ''
]);

$db->setAsGlobal();

$db->schema()->dropifExists('classics');

$db->schema()->create('classics', function ($table) {
	$table->string('name');
	$table->string('image');
});

$consoles = [
	[
	"name" => "gameboy",
	 "image" => "http://www2.arnes.si/~oscefk1s/lv/rom/nik/nintendo-game-boy-1st-gen-3ge-800.jpg"
	
	],
	[
	"name" => "playstation 3",
	 "image" => "https://images-na.ssl-images-amazon.com/images/G/01/videogames/detail-page/B004XABXY0.04.lg.jpg"
	
	],
	[
	"name" => "Xbox One",
	 "image" => "http://static1.gamespot.com/uploads/original/1534/15343359/2823737-6174472236-26119.jpg"
	
	]
];

$db->table('classics')->insert($consoles);

$classics = $db->table('classics')->get();

foreach($classics as $classic) {
	print "<img src=" . $classic->image . ">";
}
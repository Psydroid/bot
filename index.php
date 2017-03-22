<?php
// Initial checkup.

if(!file_exists('config.php')){
	if(file_exists('setup.php')){
		die(header("Location: setup.php"));
	}
	http_response_code(500);
	die("Config file not found. Please configure or reinstall.");
}

$config = require 'config.php';
$web = file_get_contents("templates/render.html");

$main = file_get_contents("templates/webhook.html");

$web = str_replace(
	["%%TITLE%%", "%%BOTNAME%%", "%%MENU%%", "%%MAIN%%"],
	["Dashboard", $config['bot']['name'], "", $main],
	$web
);

echo $web;

?>

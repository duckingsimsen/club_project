<?php
    header('Content-Type: text/html; charset=utf-8');

	$db = new mysqli("localhost","root","tlatms2033!","assem"); 
	$db -> set_charset("utf8");

	function db($cdb)
	{
		global $db;
		return $db -> query($cdb);
	}
?>
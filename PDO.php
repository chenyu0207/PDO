<?php

// $db = new PDO("mysql:host=127.0.0.1;port=3306;dbname=test;charset=utf8", "root", "root");
$db = new PDO("pgsql:host=192.168.10.2;port=5432;dbname=shops;", "postgres", "postgres");

// Return an array of available PDO drivers,If no drivers are available, it returns an empty array.
// dump($db->getAvailableDrivers());

$title = '%Save on Amazon%';

// query runs a standard SQL statement and requires you to properly escape all data to avoid SQL Injections and other issues.
$sql = "select * from article where title like :title";
// $statement = $db->query("select * from article where title like :title");
$statement = $db->prepare($sql);
$statement->execute([':title' => $title]);
$res = $statement->fetchall();
dump($res);

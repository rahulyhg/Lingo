<?php
require __DIR__ . '/../vendor/autoload.php';

$dibi = new Dibi\Connection([
	'driver' => 'sqlite3',
	'database' => __DIR__ . '/../sqlitedb/lingo.sdb'
]);

/*CREATE TABLE `book` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`title` CHAR(255) NOT NULL,
	`user_id` INTEGER NOT NULL
);

CREATE TABLE `sentence` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`book_id` INTEGER NOT NULL,
	`user_id` INTEGER NOT NULL,
	`translation` CHAR(255) NOT NULL,
	`note` CHAR(255) NOT NULL
);

CREATE TABLE `part` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`sentence_id` INTEGER NOT NULL,
	`user_id` INTEGER NOT NULL,
	`original` CHAR(255) NOT NULL,
	`translation` CHAR(255) NOT NULL
);

CREATE TABLE `user` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`username` CHAR(255) NOT NULL,
	`password` CHAR(255) NOT NULL
);*/


$dibi->query('CREATE TABLE `user` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`username` CHAR(255) NOT NULL,
	`password` CHAR(255) NOT NULL
)');
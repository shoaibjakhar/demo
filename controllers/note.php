<?php

$heading = "Note";


$config = require 'config.php';
$db = new Database($config['database']);

$note = $db->query('Select * from notes where id = :id', [':id' => $_GET['id']])->findOrFail();

$currentUserId = 4;
authorize($note['user_id'] === $currentUserId);

require 'views/note.view.php';
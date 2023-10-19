<?php

$heading = "My Notes";


$config = require 'config.php';
$db = new Database($config['database']);

$notes = $db->query('Select * from notes where user_id = 4')->get();

require 'views/notes.view.php';
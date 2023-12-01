<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if(! Validator::email($email)) {
    $errors['email'] = "Please provide a valid email.";
}

if(! Validator::string($password, 7, 255)) {
    $errors['password'] = "Please provide a valid password.";
}

if(! empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors
    ]);
    exit();
}

$user = $db->query("Select * from users where email = :email", [
    'email' => $email
])->find();

if($user) {
    if(password_verify($password, $user['password'])) {
        login($user);

        header('location: /');
        exit();
    }
}


return view('session/create.view.php', [
    'errors' => [
        'email' => "No matching account found for that email address and password."
    ]
]);
exit();

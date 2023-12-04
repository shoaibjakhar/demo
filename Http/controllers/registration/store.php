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
    $errors['password'] = "Password should be atleast 7 characters.";
}

$user = $db->query("Select * from users where email = :email", [
    'email' => $email
])->find();

if($user) {
    $errors['email'] = "Email already exists.";
}

if(! empty($errors)) {
    view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO users (`email`, `password`) Values (:email, :password)", [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);

login($user);

header('location: /');
exit();
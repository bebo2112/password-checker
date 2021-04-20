<?php


if (isset($_POST['password'])) {

    $password = $_POST['password'];
    $errors = array();


    // Check If Password Is Less Than 8 Chars
    if (strlen($password) < 8) array_push($errors, "Password must have at least 8 characters");


    // Check If Password Contains a Capital
    if (!preg_match('/[A-Z]/', $password)) array_push($errors, "Password must include at least 1 capital letter");


    // Check If Password Contains a Lowercase
    if (!preg_match('/[a-z]/', $password)) array_push($errors, "Password must include at least 1 lowercase letter");


    // Check If Password Contains a Number
    if (!preg_match('~[0-9]+~', $password)) array_push($errors, "Password must include at least 1 number");


    // Check If Password Contains a Symbol
    if (!preg_match('/[\'^£$%&*()}{!@#~?><>,|=_+¬-]/', $password)) array_push($errors, "Password must include at least 1 special character");


    // Check If Password Matches Bad Password Dictionary
    $bad_passwords = array();
    $bad_passwords = explode("\n", file_get_contents("./bad-password-dictionary.txt"));
    if(in_array($password, $bad_passwords)) array_push($errors, "Password is too easy");


    if (!empty($errors)) {
        header("Location: ./?error&errors=" . urlencode(serialize($errors)));
    } else {
        header("Location: ./?success");
    }
} else {
    header("Location: ./");
    exit();
}

<?php

require_once 'utils/session.php';
require_once 'classes/DB.php';
require_once 'classes/UserTable.php';
start_session();

try {
    $formdata = array();
    $errors = array();

    $input_method = INPUT_POST;

    //---------------------------------------------------------------------------------------------
    // validate email address
    //---------------------------------------------------------------------------------------------
    $formdata['email'] = filter_input($input_method, "email", FILTER_SANITIZE_EMAIL);
    if ($formdata['email'] === NULL || $formdata['email'] === FALSE) {
        $errors['email'] = "Email required";
    }
    $formdata['email'] = filter_var($formdata['email'], FILTER_VALIDATE_EMAIL);
    if ($formdata['email'] === FALSE) {
        $errors['email'] = "Valid email required";
    }

    //---------------------------------------------------------------------------------------------
    // validate passwords
    //---------------------------------------------------------------------------------------------
    $formdata['password'] = filter_input($input_method, "password", FILTER_SANITIZE_STRING);
    if ($formdata['password'] === NULL || $formdata['password'] === FALSE) {
        $errors['password'] = "Password required";
    }

    //---------------------------------------------------------------------------------------------
    // if there are no errors so far then check if the email address and password are correct
    //---------------------------------------------------------------------------------------------
    if (empty($errors)) {
        $email = $formdata['email'];
        $password = $formdata['password'];

        $connection = DB::getInstance();
        $userTable = new UserTable($connection);
        $user = $userTable->getUserByEmail($email);
		
		
        if ($user == null) {
            $errors['email'] = "Email is not registered";
        }
        else {
			$role = $user['role'];
			$name = $user['name'];
            $hash = $user['password'];
            $password = $password;
            if (!password_verify($password, $hash)) {
                $errors['password'] = "Password is incorrect";
            }
        }
    }

    //---------------------------------------------------------------------------------------------
    // if there any errors then throw an exception
    //---------------------------------------------------------------------------------------------
    if (!empty($errors)) {
        throw new Exception("There were errors. Please fix them.");
    }

    //---------------------------------------------------------------------------------------------
    // if we get here there were no errors so login the user
    //---------------------------------------------------------------------------------------------
    $_SESSION['role'] = $role;
	$_SESSION['name'] = $name;


    //---------------------------------------------------------------------------------------------
    // redirect the user to their home page
    //---------------------------------------------------------------------------------------------
    header('Location: home.php');
}
catch (Exception $ex) {
    //---------------------------------------------------------------------------------------------
    // if there is an exception then show the login form which will display any error messages
    //---------------------------------------------------------------------------------------------
    $errorMessage = $ex->getMessage();
    require 'login_form.php';
}
?>

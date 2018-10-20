<?php
require_once 'utils/session.php';
require_once 'classes/DB.php';
require_once 'classes/UserTable.php';
start_session();

try {
    $formdata = array();
    $errors = array();

    $input_method = INPUT_POST;
    //validate name
    if (!isset($_POST['name']) || ($_POST['name'] === "")) {
    $errors['name']="Username needs to be set";
} else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($name != $_POST['name']) {
        $errors['name']="used illegal charactars)";
    } else {
        $formdata['name']=$name;
    }
}
    $formdata['name'] = filter_input($input_method, "name", FILTER_SANITIZE_STRING);
    if ($formdata['name'] === NULL || $formdata['name'] === FALSE) {
    $errors['name'] = "Name required";
    }
    $formdata['name'] = filter_var($formdata['name'], FILTER_SANITIZE_STRING);
    if ($formdata['name'] === FALSE) {
		$errors['name'] = "Valid name required required";
    }
    //---------------------------------------------------------------------------------------------
    // validate email address
    //---------------------------------------------------------------------------------------------
    $formdata['email'] = filter_input($input_method, "email", FILTER_SANITIZE_EMAIL);
    if ($formdata['email'] === NULL || $formdata['email'] === FALSE) {
        $errors['email'] = "Email required";
    }
    $formdata['email'] = filter_var($formdata['email'], FILTER_VALIDATE_EMAIL);
    if ($formdata['email'] === FALSE) {
        $errors['email'] = "Valid email required required";
    }

    //---------------------------------------------------------------------------------------------
    // validate passwords
    //---------------------------------------------------------------------------------------------
    $havePasswords = TRUE;
    $formdata['password'] = filter_input($input_method, "password", FILTER_SANITIZE_STRING);
    $formdata['cpassword'] = filter_input($input_method, "cpassword", FILTER_SANITIZE_STRING);
    if ($formdata['password'] === NULL || $formdata['password'] === FALSE) {
        $errors['password'] = "Password required";
        $havePasswords = FALSE;
    }
    if ($formdata['cpassword'] === NULL || $formdata['cpassword'] === FALSE) {
        $errors['cpassword'] = "Confirm password required";
        $havePasswords = FALSE;
    }
    if ($havePasswords && $formdata['password'] !== $formdata['cpassword']) {
        $errors['password'] = "Passwords must match";
    }

   

   //validate role
    if (!isset($_POST['role'])) {
		echo ("<p> role needs to be selected</p>");
	} else {
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS);
        $validroles = array("user", "admin");
        if (!in_array($role, $validroles)) {
            $errors['role'] = "Invalid role";
        } 
        $formdata['role']=  $role;
    }

    //---------------------------------------------------------------------------------------------
    // if there are no errors so far then check if the email address is already registered
    //---------------------------------------------------------------------------------------------
    if (empty($errors)) {
        $name = $formdata['name'];
        $email = $formdata['email'];
        $password = $formdata['password'];
        $cpassword = $formdata['cpassword'];
        $role = $formdata['role'];

        $connection = DB::getInstance();
        $userTable = new UserTable($connection);
        $user = $userTable->getUserByEmail($email);

        if ($user != null) {
            $errors['email'] = "Email already registered";
        }
    }

    //---------------------------------------------------------------------------------------------
    // if there any errors then throw an exception
    //---------------------------------------------------------------------------------------------
    if (!empty($errors)) {
        throw new Exception("There were errors. Please fix them.");
    }

    //---------------------------------------------------------------------------------------------
    // if we get here there were no errors so register and login the user
    //---------------------------------------------------------------------------------------------
	
	
    $password = password_hash($password, PASSWORD_DEFAULT);
    $id = $userTable->insertUser($name, $email, $password, $role);
    $user = $userTable->getUserByEmail($email);
    $_SESSION['user'] = $user;

    //---------------------------------------------------------------------------------------------
    // redirect the user to their home page
    //---------------------------------------------------------------------------------------------
    header('Location: home.php');
}
catch (Exception $ex) {
    //---------------------------------------------------------------------------------------------
    // if there is an exception then show the register form which will display any error messages
    //---------------------------------------------------------------------------------------------
    require 'register_form.php';
}
?>

<?php
require_once 'utils/session.php';
require_once 'classes/DB.php';
require_once 'classes/UserTable.php';
print_r($_POST);
echo '<pre>';

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

   //validate role
    if (!isset($_POST['role'])) {
		echo ("<p> role needs to be selected</p>");
	} else {
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS);
        $validroles = array("user", "staff", "admin");
        if (!in_array($role, $validroles)) {
            $errors['role'] = "Invalid role";
        } 
        $formdata['role']=  $role;
    }

    //---------------------------------------------------------------------------------------------
    // if there are no errors so far then check if the email address is already registered
    //---------------------------------------------------------------------------------------------
    if (empty($errors)) {
		$id = $_POST['id'];
        $name = $formdata['name'];
        $email = $formdata['email'];
        $role = $formdata['role'];

        $connection = DB::getInstance();
        $userTable = new UserTable($connection);
        $user = $userTable->updateUser($id, $name, $email, $role);

        
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
	//echo '<pre>';
	//print_r($formdata);
	//echo '</pre>';
	//die("validation ok");
    //---------------------------------------------------------------------------------------------
    // redirect the user to their home page
    //---------------------------------------------------------------------------------------------
    header('Location: home.php');
}
catch (Exception $ex) {
    //---------------------------------------------------------------------------------------------
    // if there is an exception then show the register form which will display any error messages
    //---------------------------------------------------------------------------------------------
    $errorMessage = $ex->getMessage();
    require 'updateUserForm.php';
}
?>

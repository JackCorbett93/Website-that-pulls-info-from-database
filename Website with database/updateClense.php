<?php
// echo ("hello");
require_once 'classes/DB.php';
require_once 'classes/UserTable.php';
require_once 'classes/productclass.php';
//print_r($_POST);
//echo '<pre>';
$errors=array();
$formdata=array();

if (!isset($_POST['name']) || ($_POST['name'] === "")) {
    $errors['name']="name needs to be set";
} else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($name != $_POST['name']) {
        $errors['name']="used illegal charactars)";
    } else {
        $formdata['name']=$name;
    }
}
if (!isset($_POST['description']) || ($_POST['description'] === "")) {
    $errors['name']="name needs to be set";
} else {
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($description != $_POST['description']) {
        $errors['description']="used illegal charactars)";
    } else {
        $formdata['description']=$description;
    }
}
if (!isset($_POST['dimensions']) || ($_POST['dimensions'] === "")) {
    $errors['dimensions']="dimensions needs to be set";
} else {
    $dimensions = filter_input(INPUT_POST, 'dimensions', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($dimensions != $_POST['dimensions']) {
        $errors['dimensions']="used illegal charactars)";
    } else {
        $formdata['dimensions']=$dimensions;
    }
}
if (!isset($_POST['category'])) {
    echo ("<p> category needs to be selected</p>");
} else {
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($category != $_POST['category']) {
        $errors['category']="The category contains illegal char";
    } else {
        $validOperatingSystem = array(
            "chair",
            "table",
            "lighting",
            "other"
        );
        if (!in_array($category, $validOperatingSystem)) {
            $errors['category']="The selected category was invalid";
        } else {
            $formdata['category']=$category;
        }
    }
}
if (!isset($_POST['price']) || ($_POST['price'] === "")) {
    echo ("<p> Price needs to be set</p>");
} else {
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($price != $_POST['price']) {
        $errors['price']="used incorrect char price";
    } else {
        $formdata['price']=$price;
    }
}



if(empty($errors)){

$id = $_POST['id'];
$name = $_POST['name'];
$des = $_POST['description'];
$dim = $_POST['dimensions'];
$category = $_POST['category'];
$price = $_POST['price'];
$image = -1;


$product = new Product($id, $name, $des, $dim, $category, $price, $image);

$connection = DB::getInstance();

$gateway = new UserTable($connection);

$id = $gateway ->updateProduct($product);
header("Location: index.php");
}else{
	require'updateProduct.php';
	//header("Location: index.html");
}

?>
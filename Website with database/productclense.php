<?php
require_once 'classes/DB.php';
require_once 'classes/UserTable.php';
require_once 'classes/productclass.php';

try {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        throw new Exception('Invalid request');
    }

	$errors=array();
	$formdata=array();

	$fileUploadError = array();
	$fileUploadError[1] = "The uploaded file exceeds the upload_max_filesize.";
	$fileUploadError[2] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
	$fileUploadError[3] = "The uploaded file was only partially uploade.";
	$fileUploadError[4] = "No file was uploaded.";
	$fileUploadError[6] = "Missing a temporary folder.";
	$fileUploadError[7] = "Failed to write file to disk.";
	$fileUploadError[8] = "A PHP extension stopped the file upload.";

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
		$errors['description']="description needs to be set";
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
		$errors['price']= "Price needs to be set";
	} else {
		$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
		if ($price != $_POST['price']) {
			$errors['price']="used incorrect chair price";
		} else {
			$formdata['price']=$price;
		}
	}
    if (!isset($_FILES["filename"])) {
        $errors['filename'] = "Filename required";
    }   
    else if ($_FILES['filename']['error'] !== 0) {
        $errors['filename'] = $fileUploadError[$_FILES['filename']['error']];
    }

	if(!empty($errors)){
		throw new Exception("There are form validation errors.");
	}
		
	if (!is_uploaded_file($_FILES["filename"]["tmp_name"])) {
		$errors['filename'] = "Filename is not an uploaded file";
		throw new Exception("Filename is not an uploaded file");
	}

	$imageInfo = getimagesize($_FILES["filename"]["tmp_name"]);
	if ($imageInfo === false) {
		$errors['filename'] = "File is not an image.";
		throw new Exception("File is not an image.");
	}

	$width = $imageInfo[0];
	$height = $imageInfo[1];
	$sizeString = $imageInfo[3];
	$mime = $imageInfo['mime'];

	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["filename"]["name"]);
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	if (!file_exists($target_dir)) {
		mkdir($target_dir, 0755, true);
	}
	if (file_exists($target_file)) {
		$errors['filename'] = "Sorry, file already exists.";
		throw new Exception("Sorry, file already exists.");
	}

	if ($_FILES["filename"]["size"] > 1024 * 1024 * 10) {
		$errors['filename'] = "Sorry, your file is too large.";
		throw new Exception("Sorry, your file is too large.");
	}

	if ($imageFileType != "jpg" &&
			$imageFileType != "png" &&
			$imageFileType != "jpeg" &&
			$imageFileType != "gif")
	{
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
	}

	if (!move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
		$errors['filename'] = "Sorry, there was an error uploading your file.";
		throw new Exception("Sorry, there was an error uploading your file.");
	}
	
	$id = -1;
	$name = $formdata['name'];
	$des = $formdata['description'];
	$dim = $formdata['dimensions'];
	$category = $formdata['category'];
	$price = $formdata['price'];
	$image = $target_file;

	$product = new Product($id, $name, $des, $dim, $category, $price, $image);

	$connection = DB::getInstance();

	$gateway = new UserTable($connection);

	$new = $gateway->insertProduct($product);
	
	//echo '<pre>';
	//print_r($_POST);
	//print_r($_FILES);
	//print_r($errors);
	//print_r($formdata);
	//echo '</pre>';
	//die();

	header("Location: index.php");
}
catch (Exception $e){
	require'addproduct.php';
}
?>

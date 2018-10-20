<?php

require_once 'classes/DB.php';
require_once 'classes/UserTable.php';
require_once 'utils/session.php';


if (!isset($_GET['id'])) {
	die("Illegal request");
	}
	$id = $_GET['id'];
		$connection = DB::getInstance();
        $gateway = new UserTable($connection);

		$row = $gateway->getProductById($id);
		if (!$row) {
						die("Illegal request");
					}
					$url = $row['image'];
					$name = $row['name'];
					$des = $row['description'];
					$dim = $row['dimensions'];
					$price = $row['price'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
		
    </head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php require 'utils/header.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php require 'utils/toolbar.php'; ?>
                </div>
            </div>
			<div class="container" id="main">
			<div class="col-lg-6">
			<div class="row">
			<h2> <?php echo $name; ?> </h2>
			<div class="col-md-4">
			<img src=" <?php echo $url; ?>" id="pimage" />
			</div>
			</div>
			<div class="row">
			<p> <?php echo $des; ?> </p>
			</div>
			<div class="row">
			<h4> Dimensions: </h4><p> <?php echo $dim; ?> </p>
			</div>
			<div class="row">
			<h4> Price: </h4><p>€ <?php echo $price; ?> </p>
			</div>
			<div class="row">
			<?php
			if (is_logged_in() & $_SESSION['role']=="admin") {
            echo '<button type="button" class="btn btn-success btn-s"><a href="updateProduct.php?id='.$row['id'].'">Update</a></button>';
            echo '<button type="button" class="btn btn-danger btn-s"><a class="remove"  href="removeProduct.php?id='.$row['id'].'">Remove</a></button> ';
		   }
		  
			?>
			</div>
			</div>
			<div class="row">
             <?php require 'utils/Form.php'; ?>
            </div>
            <div class="row">
             <?php require 'utils/footer.php'; ?>
            </div>
        </div>
    </body>
</html>
 
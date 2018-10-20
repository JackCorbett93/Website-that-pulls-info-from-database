<?php

require_once 'classes/DB.php';
require_once 'classes/UserTable.php';
if (!isset($_GET['category'])) {
	die("Illegal request");
	}
	$category = $_GET['category'];
		$connection = DB::getInstance();
        $gateway = new UserTable($connection);

		$products = $gateway->getProductByCategory($category);
		//echo '<pre>';
		//print_r($row);
		//echo '</pre>';
		//die("");
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
			<div class="table-responsive">
			<table class="table">
				<tr>
				<th></th>
				<th></th>
				</tr>
				<?php
				foreach ($products as $row) {
					echo '<tr>';
					//echo '<td>'.$row['name'].'</td>';
					//echo '<td>'.$row['description'].'</td>';
					echo '<td>' . '<a href="productpage.php?id=' . $row['id'] . '">' . '<img src="' . $row['image'] . '" id="cimage"/>' . '</a>' . '</td>';
					//echo '<td>' . '<a href="productpage.php?id=' . $row['id'] . '">' . '<img src="' . $row['image'] . '"/>' . '</a>' . '</td>';
					//echo '<td>' . '<button type="button" class="btn btn-info btn-s"><a href="viewProgammer.php?id=' . $row['id'] . '">View</a> </button>' . '<button type="button" class="btn btn-success btn-s"><a href="updateProgrammerForm.php?id=' . $row['id'] . '">Update</a></button> ' . '<button type="button" class="btn btn-danger btn-s"><a class="remove"  href="removeProgrammer.php?id=' . $row['id'] . '">Remove</a> </button>' . '</td>';
					echo '</tr>';
				}
				?>
			</table>
                <div class="col-lg-12">
                    <?php require 'utils/footer.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>
 
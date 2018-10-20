<?php

require_once 'classes/DB.php';
require_once 'classes/UserTable.php';
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
					$id = $row['id'];
					$url = $row['image'];
					$name = $row['name'];
					$des = $row['description'];
					$dim = $row['dimensions'];
					$cat = $row['category'];
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
            <div class="row">
                <div class="col-lg-12">
                    <form id="myForm" method="POST" action="updateClense.php">
                     <div class="form-group">
                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>" />
                     </div>
					 <div class="form-group">
                        <label for="name" >Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?> " />
						<div class="error" id="1"> <?php if (isset($errors) && isset($errors['name'])) 
						{ echo $errors['name']; 
						} ?></div>
                     </div>
					 <div class="form-group">
                        <label for="description" >description</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo $des; ?>" />
						<div class="error" id="2"> <?php if (isset($errors) && isset($errors['description']))
						{ echo $errors['description']; 
						} ?></div>
                     </div>
					 <div class="form-group">
                        <label for="dimensions" >dimensions</label>
                        <input type="text" class="form-control" id="dimensions" name="dimensions" value="<?php echo $dim; ?>" />
						<div class="error" id="3"> <?php if (isset($errors) && isset($errors['dimensions'])) { echo $errors['dimensions']; } ?></div>
                     </div>
					 <div class="input-group-xl">
                        <label for="category" >category</label>
						<span class="input-group-addon">
                        <input type="radio" class="input-group-addon" id="category" name="category" value="chair" <?php if ($cat == 'chairs') echo 'checked="checked"' ?> >Chair </input>
						<input type="radio" class="input-group-addon" id="category" name="category" value="table" <?php if ($cat == 'table') echo 'checked="checked"' ?>>Table </input>
						<input type="radio" class="input-group-addon" id="category" name="category" value="lighting" <?php if ($cat == 'lighting') echo 'checked="checked"' ?>>Lighting </input>
						<input type="radio" class="input-group-addon" id="category" name="category" value="other" <?php if ($cat == 'other') echo 'checked="checked"' ?>>Other </input>
						</span>
						<div class="error" id="4"> <?php if (isset($errors) && isset($errors['category'])) { echo $errors['category']; } ?></div>
                     </div>
					 <div class="form-group">
                        <label for="price" >Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>" />
						<div class="error" id="5"> <?php if (isset($errors) && isset($errors['price'])) { echo $errors['price']; } ?></div>
                     </div>
					 <button type="submit" class="btn btn-default" id="submitBtn">Submit</button>
					 </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php require 'utils/footer.php'; ?>
                </div>
            </div>
        </div>
		<script type="text/javascript"  src="js/formvalidation.js"></script>
    </body>
</html>

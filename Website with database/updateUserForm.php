<?php 
require_once 'classes/DB.php';
require_once 'classes/UserTable.php';
if (!isset($_GET['id'])) {
	die("Illegal request");
	}
	$id = $_GET['id'];
		$connection = DB::getInstance();
        $gateway = new UserTable($connection);

		$row = $gateway->getUserById($id);
		if (!$row) {
						die("illegal request");
					}
					$id = $row['id'];
					$name = $row['name'];
					$email = $row['email'];
					$role = $row['role'];
					
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
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
                    <h2>Update Form</h2>
                    <?php
                    if (isset($errorMessage))
                        echo '<p class="error">'.$errorMessage.'</p>';
                    ?>
                    <form action="updateUser.php" method="POST" role="form" class="form-horizontal">
					<div class="form-group">
                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>" />
                     </div>
                       <div class="form-group">
                            <div class="col-lg-3 form-label">
                                <label for="name" class="form-control-label">Name: </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text"
                                       id="name"
                                       class="form-control"
                                       name="name"
                                       value="<?php echo $name; ?>"
                                       />
                            </div>
                            <div class="col-lg-3">
                                <span class="error">
                                    <?php if (isset($errors['name'])) echo $errors['name']; ?>
                                </span>
                            </div>
                        </div>
					   <div class="form-group">
                            <div class="col-lg-3 form-label">
                                <label for="email" class="form-control-label">Email: </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text"
                                       id="email"
                                       class="form-control"
                                       name="email"
                                       value="<?php echo $email; ?>"
                                       />
                            </div>
                            <div class="col-lg-3">
                                <span class="error">
                                    <?php if (isset($errors['email'])) echo $errors['email']; ?>
                                </span>
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-lg-3 form-label">
                                <label for="role">Choose Role: </label>
                            </div>
                            <div class="col-lg-6">
                                <select type='role'
                                        id='role'
                                        class="form-control"
                                        name='role'
                                       >
									   <option value="user" id='role' <?php if ($role == 'user') echo 'selected="selected"' ?> >User</option>
									   <option value="staff" id='role' <?php if ($role == 'staff') echo 'selected="selected"' ?>>Staff</option>
									   <option value="admin" id='role' <?php if ($role == 'admin') echo 'selected="selected"' ?>>Admin</option>
									   </select>
                            </div>
                            <div class="col-lg-3">
                                <span class="error">
                                    <?php if (isset($errors['role'])) echo $errors['role']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-6">
                                <input type="submit"
                                       class="form-control btn btn-default"
                                       value="Register"
                                       />
                                <p><a href="updateUser.php" class="btn btn-link">update</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php require 'utils/footer.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>

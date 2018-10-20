<!DOCTYYPE html>
<?php
require_once 'classes/DB.php';
require_once 'classes/UserTable.php';

		$connection = DB::getInstance();
        $gateway = new UserTable($connection);

		$users = $gateway->getAllusers();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title></title>
			<?php require 'utils/styles.php'; ?>
			<?php require 'utils/scripts.php'; ?>

			<script type="text/javascript">
			//checks to see if the user wants to delete
				window.onload = function () {
				var deleteLinks = document.getElementsByClassName("remove");
				for (var i = 0; i != deleteLinks.length; i++) {
				var link = deleteLinks[i];
				link.addEventListener("click", function (event) {
				var deleteConfirmed = confirm("Delete this? can't be reversed!");
				if (!deleteConfirmed) {
				event.preventDefault();
				}
				});
				}
				}
			</script>
			<meta charset="UTF-8">
				<title></title>

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
							<h2> Viewing Users </h2>
							<div class="table-responsive">
								<table class="table">
									<tr class="info">
										<th>Name</th>
										<th>Email</th>
										<th>Role</th>
										<th>Options</th>
									</tr>
								</div>
								
								<?php
								//loops through all rows and gives each a update and remove button
									foreach ($users as $row) {
										echo '<tr>';
										echo'<td>' .$row['name']. '</td>';
										echo'<td>' .$row['email']. '</td>';
										echo'<td>' .$row['role']. '</td>';
										echo '<td>' . '<button type="button" class="btn btn-success btn-s"><a href="updateUserForm.php?id='.$row['id'].'">Update</a></button> ';
										echo '<button type="button" class="btn btn-danger btn-s"><a class="remove"  href="removeUser.php?id='.$row['id'].'">Remove</a></button> ';
										echo '</tr>';
										}
								?>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<?php require 'utils/footer.php'; ?>
						</div>
					</div>
				</div>
				<link href="css/bootstrap.min.css" rel="stylesheet"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<!-- Include all compiled plugins (below), or include individual files as needed -->
				<script type="text/javascript" src="js/bootstrap.min.js"></script>
			</body>
		</html>
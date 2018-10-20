<!DOCTYPE html>
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
						<form id="myForm" method="POST" action="productclense.php" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" class="form-control" name="id" id="id" value="" />
							</div>
							<div class="form-group">
								<label for="name" >Name</label>
								<input type="text" class="form-control" id="name" name="name" value=" " />
								<div class="error" id="1"> <?php if (isset($errors) && isset($errors['name'])) 
						{ echo $errors['name']; } ?>
						</div>
							</div>
							<div class="form-group">
								<label for="description" >description</label>
								<input type="text" class="form-control" id="description" name="description" value="" />
								<div class="error" id="2"> <?php if (isset($errors) && isset($errors['description']))
						{ echo $errors['description']; 
						} ?></div>
							</div>
							<div class="form-group">
								<label for="dimensions" >dimensions</label>
								<input type="text" class="form-control" id="dimensions" name="dimensions" value="" />
								<div class="error" id="3"> <?php if (isset($errors) && isset($errors['dimensions'])) { echo $errors['dimensions']; } ?></div>
							</div>
							<div class="input-group-xl">
								<label for="category" >category</label>
								<span class="input-group-addon">
									<input type="radio" class="input-group-addon" id="category" name="category" value="chair" >Chair </input>
									<input type="radio" class="input-group-addon" id="category" name="category" value="table">Table </input>
									<input type="radio" class="input-group-addon" id="category" name="category" value="lighting">Lighting </input>
									<input type="radio" class="input-group-addon" id="category" name="category" value="other">Other </input>
								</span>
								<div class="error" id="4"> <?php if (isset($errors) && isset($errors['category'])) { echo $errors['category']; } ?></div>
							</div>
							<div class="form-group">
								<label for="price" >Price</label>
								<input type="text" class="form-control" id="price" name="price" value="" />
								<div class="error" id="5"> <?php if (isset($errors) && isset($errors['price'])) { echo $errors['price']; } ?></div>
							</div>
							<div class="form-group">
								<input type="hidden" name="MAX_FILE_SIZE" value="999999" />
								<div class="row">
									<div class="label">
										<label for="filename">Select image to upload:</label>
									</div>
									<div class="control">
										<input type="file" name="filename" id="filename">
										</div>

									</div>
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
		
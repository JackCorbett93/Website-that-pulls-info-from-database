<nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav">
        <?php
        require_once 'utils/session.php';
		//shows off diffent link depending on if a user is logged in or if they are admin
        if (!is_logged_in()) {
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="login_form.php">Login</a></li>';
			echo '<li><a href="category.php?category=table">Tables</a></li>';
			echo '<li><a href="category.php?category=chair">Chairs</a></li>';
			echo '<li><a href="category.php?category=others">Others</a></li>';
			echo '<li><a href="category.php?category=lighting">Lighting</a></li>';
        }
        else if ($_SESSION['role']=="admin") {
            echo '<li><a href="home.php">Home</a></li>';
			echo '<li><a href="addProduct.php">add Product</a></li>';
            echo '<li><a href="viewUsers.php">Users</a></li>';
            echo '<li><a href="category.php?category=table">Tables</a></li>';
			echo '<li><a href="category.php?category=chair">Chairs</a></li>';
			echo '<li><a href="category.php?category=others">Others</a></li>';
			echo '<li><a href="category.php?category=lighting">Lighting</a></li>';
            echo '<li><a href="logout.php">Logout</a></li>';
        }
		else if ($_SESSION['role']=="user") {
            echo '<li><a href="home.php">Home</a></li>';
            echo '<li><a href="category.php?category=table">Tables</a></li>';
			echo '<li><a href="category.php?category=chair">Chairs</a></li>';
			echo '<li><a href="category.php?category=others">Others</a></li>';
			echo '<li><a href="category.php?category=lighting">Lighting</a></li>';
            echo '<li><a href="logout.php">Logout</a></li>';
        }
        ?>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>

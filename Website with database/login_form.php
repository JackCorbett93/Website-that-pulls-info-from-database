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
                    <h2>Login Form </h2>
					<h5>admin username: jack@iadt.ie, password: iadt</h5>
                    <?php
                    if (isset($errorMessage))
                        echo '<p class="error">$errorMessage</p>';
                    ?>
                    <form action="login.php" method="POST" role="form" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-3 form-label">
                                <label for="email" class="control-label">Email: </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text"
                                       id="email"
                                       class="form-control"
                                       name="email"
                                       value=""
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
                                <label for="password" class="control-label">Password: </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="password"
                                       id="password"
                                       class="form-control"
                                       name="password"
                                       value=""
                                       />
                            </div>
                            <div class="col-lg-3">
                                <span class="error">
                                    <?php if (isset($errors['password'])) echo $errors['password']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-6">
                                <input type="submit"
                                       class="form-control btn btn-default"
                                       value="Login"
                                       />
                                <p><a href="register_form.php" class="btn btn-link">Register</a></p>
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

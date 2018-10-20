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
                    <h2>Register Form</h2>
                    <?php
                    if (isset($errorMessage))
                        echo '<p class="error">'.$errorMessage.'</p>';
                    ?>
                    <form action="register.php" method="POST" role="form" class="form-horizontal">
                       <div class="form-group">
                            <div class="col-lg-3 form-label">
                                <label for="name" class="form-control-label">Name: </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text"
                                       id="name"
                                       class="form-control"
                                       name="name"
                                       value=""
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
                                <label for="password">Password: </label>
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
                            <div class="col-lg-3 form-label">
                                <label for="cpassword">Confirm Password: </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="password"
                                       id="cpassword"
                                       class="form-control"
                                       name="cpassword"
                                       value=""
                                       />
                            </div>
                            <div class="col-lg-3">
                                <span class="error">
                                    <?php if (isset($errors['cpassword'])) echo $errors['cpassword']; ?>
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
									   <option value="user" id='role' >User</option>
									   <option value="admin" id='role'>Admin</option>
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
                                <p><a href="login_form.php" class="btn btn-link">Login</a></p>
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

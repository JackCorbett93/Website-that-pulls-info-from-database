<?php
require_once 'utils/session.php';

if (!is_logged_in()) {
    header("Location: login_form.php");
}
else {
	session_unset();

	header("Location: login_form.php");
}
?>

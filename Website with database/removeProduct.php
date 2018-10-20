<?php

require_once 'classes/DB.php';
require_once 'classes/UserTable.php';

if (!isset($_GET['id'])) {
	die("Illegal request");
	}
		$id = $_GET['id'];
		$connection = DB::getInstance();
        $gateway = new UserTable($connection);

		$gateway->deleteproduct($id);
		header('home.php');
					
?>
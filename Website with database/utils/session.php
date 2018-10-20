<?php

function is_logged_in() {
    start_session();
	//passes in the users name and what role they are eg admin, user etc
    return (isset($_SESSION['role']));
	return (isset($_SESSION['name']));
}

function start_session() {
    $id = session_id();
    if ($id === "") {
        session_start();
    }
}

?>

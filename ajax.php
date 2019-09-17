<?php
session_start();

if (!empty($_POST['value'])) {
	
	if (!isset($_SESSION['lg'])) {
		$_SESSION['lg'] = $_POST['value'];
	} else {
		unset($_SESSION['lg']);
		$_SESSION['lg'] = $_POST['value'];
	}

	echo json_encode($_SESSION['lg']);
}
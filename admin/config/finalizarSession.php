<?php
session_start();
	$_COOKIE["PHPSESSID"] = array();
	$_SESSION = array();

	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}

	session_destroy();

	/*echo '<meta http-equiv="pragma" content="no-cache">';*/
	header("Location: ../index.php");
	echo '<meta http-equiv="pragma" content="no-cache">';
?>
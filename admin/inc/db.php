<?php

	$db = mysqli_connect("localhost", "root", "", "ssb275");

	if ( $db ){
		// echo "Database Conneted";
	}
	else{
		die("MySQLi Error " . mysqli_error($db));
	}

?>
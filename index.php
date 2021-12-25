<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>modules</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">

<?php
		  

		
		require_once __DIR__.'\dbConn.php';
		require_once __DIR__.'\paginateClass.php';

		$test = new Pagination($db, 2, "users"); // passing db connection and limit of items per page (LIMIT) and table name
		
		
?>
</body>
<style type="text/css" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></style>
</html>
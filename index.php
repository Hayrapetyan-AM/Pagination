<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>modules</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-success" style="font-size: 30px;">

<?php
		  

		
		require_once __DIR__.'\dbConn.php';
		require_once __DIR__.'\paginateClass.php';

		$test = new Pagination($db, 3);
		$table = "tasks";
		$test->Paginate($table);
		
?>
</body>
<style type="text/css" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></style>
</html>
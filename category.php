<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Customer Page</title>
</head>
<body>
    <header>
        <h1>Admin Category Page</h1>
    </header>
    <main>
<center><a href="add2.php" class='btn btn-success'>INSERT CATEGORY</a><center><br><br>
        <table border=1>
                <thead>
                    <tr>
				<th>CUSTOMER _ID</th>
				<th>CUSTOMER NAME</th>
				<th>Update</th>
				<th>Delete</th>
					</tr>
                </thead>
                <tbody>
					<?php
    $mongoConnection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $database = "web_practice";
    $collection = "category";
	$filter = [];
    $options = [];
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $mongoConnection->executeQuery("$database.$collection", $query);
	
    foreach ($cursor as $product) {
		echo"<tr>";
		echo "<td>".$product->cat_id."</td>";
        echo "<td>".$product->name."</td>";
		
    ?>

		<td><a href="upd_cat.php?cat_id=<?php echo $product->cat_id;?>" class="btn btn-primary">UPDATE</a>
		<td><a href="rmv_cat.php?cat_id=<?php echo $product->cat_id;?>" class="btn btn-danger">DELETE</a>
		</tr>
	<?php
    }
    ?>
                </tbody>
            </table>
    </main>
    <footer>
        <p>&copy; 2023 flora</p>
    </footer>
</body>
</html>

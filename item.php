<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><!-- Create this CSS file for styling -->
    
</head>
<body>
    <header>
        <h1>Admin Product Page</h1>
    </header>
<br><br>

<center><a href="add.php" class='btn btn-success'>INSERT ITEM</a>
<a href="highest_price.php" class='btn btn-success'>EXPENSIVE PRODUCT</a><center><br><br>
        <table border=1>
                <thead>
                <tr>
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Cat_id</th>
				<th>Price</th>
				<th>Stock</th>
				<th>DIscription</th>
				<th>Image_url</th>
				<th>Update</th>
				<th>Delete</th>
				</tr>
                </thead>
                <tbody>
                    <?php
    $mongoConnection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $database = "web_practice";
    $collection = "item";
	$filter = [];
    $options = [];
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $mongoConnection->executeQuery("$database.$collection", $query);
	
    foreach ($cursor as $product) {
		echo"<tr>";
		echo "<td>".$product->_id."</td>";
		echo "<td>".$product->name."</td>";
        echo "<td>".$product->category_id."</td>";
        echo "<td>".$product->price."</td>";
		echo "<td>".$product->stock."</td>";
		echo  "<td>".$product->description."</td>";
		echo  "<td>".$product->image_url."</td>";
	?>

		<td><a href="upd_item.php?p_id=<?php echo $product->_id;?>" class="btn btn-primary">UPDATE</a>
		<td><a href="rmv_item.php?p_id=<?php echo $product->_id;?>" class="btn btn-danger">DELETE</a>
		</tr>
<?php
    }
    ?>
                </tbody>
            </table>
    <footer>
        <p>&copy; 2023 Flora</p>
    </footer>
</body>
</html>

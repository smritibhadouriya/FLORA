<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Order Page</title>
</head>
<body>
    <header>
        <h1>Admin Order Page</h1>
    </header>
    <main>
		<center><a href="higest_order.php" class='btn btn-success'>Highest Order</a>
			<a href="recent_order.php" class='btn btn-success'>Recent Order</a></center><br><br>
        <table border=1>
                <thead>
                    <tr>
						<th>ORDER _ID</th>
						<th>PRODUCT_ID</th>
						<th>EMAIL-ID</th>
						<th>USER_ADD</th>
						<th>Order_date</th>
						<th>TOTAL_AMT</th>
					</tr>
                </thead>
                <tbody>
                    <?php
	$mongoConnection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$database = "web_practice";
    $collection = "order";
	$filter = [];
    $options = [];
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $mongoConnection->executeQuery("$database.$collection", $query);
	
    foreach ($cursor as $product) {
		echo"<tr>";
		echo "<td>".$product->_id."</td>";
        echo "<td>".$product->product_id."</td>";
        echo "<td>".$product->cust_email."</td>";
		echo "<td>".$product->address."</td>";
		echo "<td>".$product->date."</td>";
		echo  "<td>".$product->total_amt."</td>";
		echo "</tr>";
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

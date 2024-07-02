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
        <h1>Admin Customer Page</h1>
    </header>
    <main> 
		<center><a href="near_customer.php" class='btn btn-success'>NEAR DELIVERY</a>
			<a href="recent_customer.php" class='btn btn-success'>RECENT CUSTOMER</a></center><br><br>

        <table border=1>
                <thead>
                    <tr>
						<th>CUSTOMER _ID</th>
						<th>CUSTOMER NAME</th>
						<th>EMAIL-ID</th>
						<th>PHONE</th>
						<th>PASSWORD</th>
					</tr>
                </thead>
                <tbody>
                    <?php
	$mongoConnection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$database = "web_practice";
    $collection = "customer";
	$filter = [];
    $options = [];
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $mongoConnection->executeQuery("$database.$collection", $query);
	
    foreach ($cursor as $product) {
		echo"<tr>";
		echo "<td>".$product->_id."</td>";
        echo "<td>".$product->username."</td>";
        echo "<td>".$product->email."</td>";
		echo "<td>".$product->phone."</td>";
		echo  "<td>".$product->password."</td>";
		echo "</tr>";
    }
    ?>
                </tbody>
            </table>
    </main>
    <footer>
        <p>&copy; 2023 Flora</p>
    </footer>
</body>
</html>

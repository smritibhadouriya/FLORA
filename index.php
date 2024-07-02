<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: pink;
            color: black;
            text-align: center;
            padding: 20px 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .welcome-message {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .summary-stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
        }

        .stat {
            text-align: center;
        }

        .quick-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .action-button {
            background-color: pink;
            color: black;
            padding: 15px 30px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            margin: 10px;
            text-align: center;
        }

        .action-button:hover {
            background-color: #555;
        }

        .recent-activity {
            margin-top: 20px;
        }
		
	footer {
		text-align: center;
		padding: 10px;
		background-color:pink;
		color: black;
	}
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
    </div>
<?php
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
?>
<div class="alert alert-simple text-center" role="alert">
<h4>NOTIFICATION</h4>
</div>
<div class="alert alert-success text-center" role="alert">
<h4><?php
$database= 'web_practice';
$collection = 'customer';

$command1= new MongoDB\Driver\Command([
    'count' => $collection,
]);

try {
    $cursor = $manager->executeCommand($database, $command1);
    $response = current($cursor->toArray());

    $custCount = $response->n;
		echo "WE HAVE ".$custCount ." CUSTOMER";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
</h4>
</div>
<div class="alert alert-danger text-center" role="alert">
<h4><?php
$databaseName = 'web_practice';
$collectionName = 'order';

$command = new MongoDB\Driver\Command([
    'count' => $collectionName,
]);

try {
    $cursor = $manager->executeCommand($databaseName, $command);
    $response = current($cursor->toArray());

    $orderCount = $response->n;
		echo "WE DELEVERED ". $orderCount ." ORDER";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
</h4>
</div>


    <div class="container">
        <div class="welcome-message"></i>DATE : <?php $t=time();
									echo(date("d-m-y",$t));
							?></i></div>
        <div class="summary-stats">
            <div class="stat">
                <h2>Total Products</h2> 
                <h5><?php
$database = 'web_practice';
$collection2= 'item';

$command2= new MongoDB\Driver\Command([
    'count' => $collection2,
]);

try {
    $cursor = $manager->executeCommand($databaseName, $command2);
    $response = current($cursor->toArray());

    $productount = $response->n;
		echo  $productount ;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?></h5>
            </div>
            <div class="stat">
                <h2>Total Orders</h2>
                <h5><?php
$databaseName = 'web_practice';
$collectionName = 'order';

$command = new MongoDB\Driver\Command([
    'count' => $collectionName,
]);

try {
    $cursor = $manager->executeCommand($databaseName, $command);
    $response = current($cursor->toArray());

    $orderCount = $response->n;
		echo  $orderCount ;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
</h5>
            </div>
            <div class="stat">
                <h2>Total Customers</h2>
                <h5><?php
$database= 'web_practice';
$collection = 'customer';

$command1= new MongoDB\Driver\Command([
    'count' => $collection,
]);

try {
    $cursor = $manager->executeCommand($database, $command1);
    $response = current($cursor->toArray());

    $custCount = $response->n;
		echo $custCount;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?></h5>
            </div>
        </div>
        <div class="quick-actions">
            <a href="order.php" class="action-button">Order Detail</a>
            <a href="customer.php" class="action-button">Customer Detail</a>
            <a href="item.php" class="action-button">Item Detail</a>
			<a href="category.php" class="action-button">Category Detail</a>
        </div>
        <div class="recent-activity">
            <!-- Display recent activity here -->
        </div>
    </div>
<footer>
        <p>&copy; 2023 Flora</p>
</footer>
</body>
</html>

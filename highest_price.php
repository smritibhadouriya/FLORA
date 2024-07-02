<link rel="stylesheet" href="form.css">
<?php
// Create a MongoDB client
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Define the query
$query = new MongoDB\Driver\Query([],['sort' => ['price' =>-1], 'limit' => 5]);

// Execute the query
$cursor = $manager->executeQuery("web_practice.item", $query);

// Loop through the results
foreach ($cursor as $document) {
    echo "<form>";
    echo "Product: " . $document->name . "<br>";
    echo "Price: " . $document->price . "<br>";
   echo "</form>";
}

?>

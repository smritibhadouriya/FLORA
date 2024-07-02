<link rel="stylesheet" href="form.css">
<?php
// Create a MongoDB client
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Define the query
$query = new MongoDB\Driver\Query([],['sort' => ['price' =>-1], 'limit' => 5]);

// Execute the query
$cursor = $manager->executeQuery("web_practice.order", $query);

// Loop through the results
foreach ($cursor as $document) {
    echo "<form>";
    echo "Customer Email id: " . $document->cust_email. "<br>";
    echo "Total Price Of Order: " . $document->total_amt. "<br>";
   echo "</form>";
}
?>

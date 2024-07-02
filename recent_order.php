<link rel="stylesheet" href="form.css">
<?php
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query = new MongoDB\Driver\Query([], ['sort' => ['timestamp' => -1], 'limit' => 3]);
$cursor = $manager->executeQuery('web_practice.order', $query);
$recentCustomers = [];
foreach ($cursor as $document) {
?>
    <form>
        <p>Total Amount: <?php echo $document->total_amt; ?></p>
        <p>Email: <?php echo $document->cust_email; ?></p>
        <p>Customer Address:<?php echo $document->
address; ?></p>
		<p>Product Id:<?php echo $document->product_id; ?></p>
		<p>Date :<?php echo $document->date; ?></p>
    </form>
<?Php
}
?>
<link rel="stylesheet" href="form.css">
<?php
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query = new MongoDB\Driver\Query([],['add'=>'valsad']);
$cursor = $manager->executeQuery('web_practice.order', $query);
$recentCustomers = [];
foreach ($cursor as $document) {
?>
    <form>
        <p>Email: <?php echo $document->cust_email; ?></p>
    </form>
<?Php
}
?>
<link rel="stylesheet" href="form.css">
<?php
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query = new MongoDB\Driver\Query([], ['sort' => ['timestamp' => -1], 'limit' => 3]);
$cursor = $manager->executeQuery('web_practice.customer', $query);
$recentCustomers = [];
foreach ($cursor as $document) {
?>
    <form>
        <p>Name: <?php echo $document->username; ?></p>
        <p>Email: <?php echo $document->email; ?></p>
        <p>Phone:<?php echo $document->phone; ?></p>
		<p>Password:<?php echo $document->password; ?></p>
    </form>
<?Php
}
?>
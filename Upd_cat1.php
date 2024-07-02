<?php
$id = $_POST['hpid'];
$name = $_POST['catname'];

$cn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$bulkWrite = new MongoDB\Driver\BulkWrite;
$bulkWrite->update(['cat_id' => $id], ['$set' => ['name' => $name]]);
$result = $cn->executeBulkWrite('web_practice.category', $bulkWrite);

if ($result) {
    header("Location: cat_update.php");
    exit;
} else {
    echo "Failed to update category.";
}
?>

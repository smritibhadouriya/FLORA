<?php
$id = $_POST['hdpid'];
$name = $_POST['pdname'];
$cat_id = $_POST['pdcat'];
$price = $_POST['pdprice'];
$stock = $_POST['pdstock'];
$des = $_POST['pddis'];
$image = $_POST['pdimg'];

$cn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$bulkWrite = new MongoDB\Driver\BulkWrite;
$bulkWrite->update(['_id' => new MongoDB\BSON\ObjectID($id)], ['$set' => [
    'name' => $name,
    'category_id' => $cat_id,
    'price' => $price,
    'stock' => $stock,
    'description' => $des,
    'image_url' => $image
]]);
$result = $cn->executeBulkWrite('web_practice.item', $bulkWrite);

if ($result) {
    header("Location: item_updated.php");
    exit;
} else {
    echo "Failed to update item.";
}
?>

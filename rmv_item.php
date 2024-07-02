<?php
$pid=$_GET['p_id'];
$id = new MongoDB\BSON\ObjectID($pid);
$cn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$bw = new MongoDB\Driver\BulkWrite;
$bw->delete(['_id' =>$id]);
$cn->executeBulkWrite('web_practice.item', $bw);
header("location:item_remove.php");
?>

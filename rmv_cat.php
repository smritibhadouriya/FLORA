<?php
$cid=$_GET['cat_id'];
$cn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$bw = new MongoDB\Driver\BulkWrite;
$bw->delete(['cat_id' =>$cid]);
$cn->executeBulkWrite('web_practice.category', $bw);
header("location:cat_remove.php");
?>

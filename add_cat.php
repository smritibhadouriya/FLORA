<?php
$cid=$_POST['cat'];
$cname=$_POST['catname'];
$cn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$bw = new MongoDB\Driver\BulkWrite;
$doc = ['cat_id'=>$cid,'name'=>"$cname"];
$bw->insert($doc);
$cn->executeBulkWrite('web_practice.category', $bw);
if($cn==TRUE)
{
	header("location:cat_insert.php");
}


?>

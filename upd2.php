<?php
$id=$_POST['hdpid'];
$name=$_POST['cname'];
$cn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$bw = new MongoDB\Driver\BulkWrite;
//_id,name,category_id,price,stock,description,image_url
$bw->update(['cat_id' => "$id"], ['$set' => ['name' => "$name",'category_id'=>"$cat_id",'price'=>"$price"
'stock'=>"$stock",'description'=>"$des",'image_url'=>"$image"]]);
$cn->executeBulkWrite('web_practice.item', $bw); 
if($cn==TRUE)
{
	header("location:updated.php");
}
?>

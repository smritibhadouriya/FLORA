<?php
$pname=$_POST['pdnme'];
//pdnme,pdcat,pdprice,pdstock,pddis,pdimg
$pdcat=$_POST['pdcat'];
$pdprice=$_POST['pdprice'];
$pdstock=$_POST['pdstock'];
$pddis=$_POST['pddis'];
$pdimg=$_POST['pdimg'];
$cn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$bw = new MongoDB\Driver\BulkWrite;
$doc = ['name'=>"$pdcat",'category_id'=>"$pdcat",'price'=>$pdprice,'stock'=>$pdstock,'discription'=>"$pddis",'image_url'=>"$pdimg"];
$bw->insert($doc);
$cn->executeBulkWrite('web_practice.item', $bw);
if($cn==TRUE)
{
	header("location:item_insert.php");
}


?>

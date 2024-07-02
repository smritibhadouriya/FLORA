<?php
$pid = $_GET['p_id'];
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$collectionName = 'web_practice.item';
$idToFind = new MongoDB\BSON\ObjectID($pid);
$query = new MongoDB\Driver\Query(['_id' => $idToFind]);
$cursor = $manager->executeQuery($collectionName, $query);
$document = current($cursor->toArray());
if ($document) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/bootstrap.css">
	<link rel="stylesheet" href="form.css">
</head>
<body>
    <form method="post" action="upd_item1.php">
	<center>
	<h2>UPDATE ITEM</h2>
	<div class="mb-3">
	Product Name :
	<input type="text" name="pdname" value="<?php echo $document->name ?>"><br><br>
	<input type="hidden" name="hdpid" value="<?php echo $document->_id ?>">
</div>
	<div class="mb-3">
	Cat_id :
	<input type="text" name="pdcat" value="<?php echo $document->category_id ?>"><br><br>
</div>
	<div class="mb-3">
	Price :
	<input type="number" name="pdprice" value="<?php echo $document->price ?>"><br><br>
</div>
	<div class="mb-3">
	Stock:
	<input type="number" name="pdstock" value="<?php echo $document->stock ?>"><br><br>
	</div>
	Discription :
	<textarea name="pddis" rows="5" cols="50"><?php echo $document->description ?></textarea><br><br>
	<div class="mb-3">
	Image name :
	<input type="text" name="pdimg" value="<?php echo $document->image_url ?>"><br><br>
	</div>
	<input type="submit" name="ok" value="submit">
	</center>
	</form>
<script src="path/to/bootstrap.js"></script>
</body>
</html>
<?php } ?>

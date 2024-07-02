<?php
$cid = $_GET['cat_id'];
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$collectionName = 'web_practice.category';
$query = new MongoDB\Driver\Query(['cat_id' => $cid]);
$cursor = $manager->executeQuery($collectionName, $query);
$document = current($cursor->toArray());
if ($document) {
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="form.css">
</head>
<body>
<form method="post" action="upd_cat1.php">
<center>
<h2>UPDATE CATEGORY</h2>
 <div class="mb-3">
Category_id :
<input type="number" name="cat"  disabled value="<?php echo $document->cat_id ?>"><br><br>
<input type="hidden" name="hpid" value="<?php echo $document->cat_id ?>">
</div>
<div class="mb-3">
Category_name:
<input type="text" name="catname" value="<?php echo $document->name ?>"><br><br>
</div>
<input type="submit" name="ok" value="ok">
</center>
</form>
</body>
</html>
<?php } ?>

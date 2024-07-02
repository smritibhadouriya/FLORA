
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="form.css">
</head>
<body>
    <form method="post" action="add_item.php">
	<center>
	<h2>ADD ITEM</h2>
	<div class="mb-3">
	Product Name:
	<input type="text" name="pdnme"><br><br>
</div>
	<div class="mb-3">
	Cat_id :
	<input type="text" name="pdcat"><br><br>
</div>
	<div class="mb-3">
	Price :
	<input type="number" name="pdprice"><br><br>
</div>
	<div class="mb-3">
	Stock:
	<input type="number" name="pdstock"><br><br>
	</div>
	<div class="mb-3">
	Discription :
	<input type="text" name="pddis" max="255"><br><br>
	</div>
	<div class="mb-3">
	Image name :
	<input type="text" name="pdimg"><br><br>
	</div>
	<input type="submit" name="ok" value="submit">
	</center>
	</form>
<script src="path/to/bootstrap.js"></script>
</body>
</html>


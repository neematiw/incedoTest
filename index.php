<?php // Include Store Class for calculating price
include("store.php");



if(!empty($_POST['product_txt'])){
	$storeObj = Store::createInstance(); 
	$price = $storeObj->calculatePrice($_POST['product_txt']);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>php demo</title>
</head>
<body>
<?php if(!empty($price)){ 
echo '<span>Price: $'.$price. '</span>';
} ?>
<h1>ENTER PRODUCTS FOR CHECKOUT</h1>
<form method="post" action="index.php">
  <input type="text" name="product_txt" />
  <button type="submit" name="submit">Submit</button>
</form>

</body>
</html>
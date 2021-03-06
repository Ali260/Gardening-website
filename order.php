<?php
if (isset($_POST['bouquet'])) {
	$color = array();
	$quantity = array();
	$image = array();
	foreach ($_POST AS $key => $value) {
		if (strpos($key, 'color_') === 0) {
			$color[substr($key, 6)] = $value;
		} elseif (strpos($key, 'qty_') === 0) {
			$quantity[substr($key, 4)] = $value;
		}
		if (strpos($key, 'image_') === 0) {
			$image[substr($key, 6)] = $value;
		}
	}
$price = array(
    'Calla_Lilies' => 3,
    'Sunflowers' => 3,
    'Iris' => 2,
    'Peruvian_Lilies' => 2,
    'Daffodils_(Narcissus)' => 2,
    'Gerbera_Daisies' => 3,
    'Dendrobium_Orchid' => 4,
    'Roses' => 3,
    'Lilies' => 3,
    'Tulips' => 2,
    'Lilac' => 4,
    'Daisies' => 1
    );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Order Details - Hansel and Petal</title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link href="styles/handp.css" rel="stylesheet" type="text/css">
</head>

<body class="no_col_2">
<div id="site">
<?php require 'includes/pagetop.php'; ?>
    <div id="content">
        <div id="breadcrumbs" class="reset menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="bouquet.php">Build a Bouquet</a></li>
                <li>Order Details</li>
            </ul>
        </div>
        <div id="col_1" role="main">
            <h1 class="inline_block">Your Order</h1>
            <?php if (!isset($quantity) || array_sum($quantity) === 0) { ?>
            <p>Your basket is empty.</p>
            <?php } else { ?>
            <p>Please check the details of your order.</p>
				<table id="order_details">
				    <tr>
				        <th scope="col">&nbsp;</th>
				        <th scope="col">Item</th>
				        <th scope="col">Color</th>
				        <th scope="col">Quantity</th>
				        <th scope="col">Cost</th>
			        </tr>
                    <?php foreach ($quantity AS $flowername => $amount):
					if ($amount > 0) :
					?>
				    <tr>
				        <td><img src="images/<?php
                        if (isset($color[$flowername])) {
							echo $color[$flowername];
						} else {
							echo $image[$flowername];
						}
						?>.jpg" alt="" width="80" height="80"/></td>
				        <td><?php echo str_replace('_', ' ', $flowername); ?></td>
				        <td>&nbsp;</td>
				        <td><?php echo $amount; ?></td>
				        <td>$</td>
			        </tr>
                    <?php 
					endif;
					endforeach; ?>
			    </table>
            <div id="order_buttons">
            <form method="post">
                <span><input class="btn alt" value="Cancel Order" name="cancel" id="cancel" type="submit"></span>
                <span><input class="btn checkout" value="Confirm Order" type="submit"></span>
            </form>
            </div>
            <?php } ?>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>
</div>
<script src="js/jquery-1.10.2.min.js"></script> 
<script src="js/scripts.js"></script>
</body>
</html>
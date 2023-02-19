<?php
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/config.inc.php";
    $orders = getOrders();
    if (!$orders){
        echo "No pending orders";
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Incoming Orders</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../inc/style.css" />
</head>
<body>
<h1>Incoming Orders:</h1>
<?php
foreach ($orders as $order){?>
<hr>
<h2>Order number: <?= $order["orderid"] ?> </h2>
<p><b>Customer</b>: <?= $order["name"] ?></p>
<p><b>Email</b>: <?= $order["email"] ?> </p>
<p><b>Phone</b>: <?= $order["phone"] ?> </p>
<p><b>Delivery address</b>: <?= $order["address"] ?> </p>
<p><b>Order Placement Date</b>: <?php
    $date = $order["date"];
    echo date("d-m-Y h:i", $date);
    ?> </p>
<?php }
?>

<h3>Purchased goods:</h3>
<table border="1" cellpadding="5" cellspacing="0" width="90%">
<tr>
	<th>N п/п</th>
	<th>Name</th>
	<th>Author</th>
	<th>Year published</th>
	<th>Price, usd</th>
	<th>Quantity</th>
</tr>
    <?php
    $i = 1;
    $sum = 0;
    foreach ($orders as $order){
        $goods = $order["goods"];
    }
    foreach ($goods as $item){
        ?> <tr>
            <td><?= $i++?></td>
            <td><?= $item['title']?></td>
            <td><?= $item['author']?></td>
            <td><?= $item['pubyear']?></td>
            <td><?= $item['price']?></td>
            <td><?= $item['quantity']?></td>
                </a></td> </tr> <?php
        $sum += $item['price'] * $item['quantity'];
    }
    ?>
</table>
<p>Total:<?= $sum ?> usd</p>

</body>
</html>
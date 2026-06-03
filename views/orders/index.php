<h2>Stock Orders / Transactions</h2>
<a href="index.php?controller=order&action=create">New Transaction</a>
<table>
    <tr><th>ID</th><th>Product</th><th>Quantity</th><th>Type</th><th>Date</th></tr>
    <?php foreach($orders as $o): ?>
    <tr>
        <td><?php echo $o['id']; ?></td>
        <td><?php echo $o['product_name']; ?></td>
        <td><?php echo $o['quantity']; ?></td>
        <td><?php echo $o['order_type']; ?></td>
        <td><?php echo $o['order_date']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
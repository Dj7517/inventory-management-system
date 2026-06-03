<h2>Products</h2>
<a href="index.php?controller=product&action=create">Add New Product</a>
<table>
    <tr><th>ID</th><th>Name</th><th>SKU</th><th>Stock</th><th>Price</th><th>Supplier</th></tr>
    <?php foreach($products as $p): ?>
    <tr>
        <td><?php echo $p['id']; ?></td>
        <td><?php echo $p['name']; ?></td>
        <td><?php echo $p['sku']; ?></td>
        <td><?php echo $p['stock']; ?></td>
        <td><?php echo $p['price']; ?></td>
        <td><?php echo $p['supplier_name']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>